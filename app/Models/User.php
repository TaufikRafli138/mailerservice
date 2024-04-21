<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleUserTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use DateTime;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'email',
        'name',
        'password',
        'photo_profile',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => RoleUserTypes::class,
    ];

    public function jobRequisitionUserApplied()
    {
        return $this->hasMany(JobRequisitionUserApplied::class, 'id_user');
    }

    public function userDetailDocument()
    {
        return $this->hasMany(UserDetailDocument::class, 'id_user');
    }

    public function userDetailLicense()
    {
        return $this->hasMany(UserDetailLicense::class, 'id_user');
    }

    public function userDetailLicensePilot()
    {
        return $this->hasMany(UserDetailLicensePilot::class, 'id_user');
    }
    public function userDetailExperience()
    {
        return $this->hasMany(UserDetailExperience::class, 'id_user');
    }

    public function userDetailTraining()
    {
        return $this->hasMany(UserDetailTraining::class, 'id_user');
    }

    public function userDetailEducation()
    {
        return $this->hasMany(UserDetailEducation::class, 'id_user');
    }

    public function userDetailSocialMedia()
    {
        return $this->hasMany(UserDetailSocialMedia::class, 'id_user');
    }

    public function userDetailFamily()
    {
        return $this->hasMany(UserDetailFamily::class, 'id_user');
    }

    public function userDetailLanguage()
    {
        return $this->hasMany(UserDetailLanguage::class, 'id_user');
    }

    public function userDetail()
    {
        return $this->hasOne(UserDetail::class, 'id_user');
    }

    public function dataPilotRating()
    {
        return $this->hasmany(UserDetailPilotRate::class, 'id_user');
    }

    public function dataDocument()
    {
        return $this->hasMany(UserDetailDocument::class, 'id_user');
    }

    public function bankAccount()
    {
        return $this->hasMany(UserDetailBankAccount::class, 'id_user');
    }

    public function bpjs()
    {
        return $this->hasMany(UserDetailBpjs::class, 'id_user');
    }

    public static function getSpecificRecord($userId)
    {
        return self::with([
            'userDetail.city.province.country',
            'userDetail.permanentCity.province.country',
            'bankAccount',
            'bpjs',
            'userDetail.religion',
            'userDetail.nationality',
            'userDetail.placeOfBirth',
            'userDetailLicensePilot.country',
            'userDetailExperience.country',
            'userDetailExperience.employmentStatus',
            'userDetailTraining.country',
            'userDetailEducation.major',
            'userDetailEducation.degree',
            'userDetailSocialMedia',
            'userDetailLicense.country',
            'userDetailFamily',
            'userDetailLanguage.languages',
            'dataPilotRating',
            'dataDocument.userDetailDocumentType',
        ])
            ->where('id_user', $userId)
            ->first();
    }

    public static function processPhotoProfile($result)
    {
        if ($result['photo_profile'] !== null) {
            $result['photo_profile'] = url("/api/v1/files/photo-profile?whereIsMyImage={$result['photo_profile']}");
        }
    }

    public static function processDocumentUrls($documents)
    {
        foreach ($documents as $document) {
            if ($document['data_path'] !== null) {
                $document['data_path'] = url("/api/v1/document-member/docs?what-doc={$document['id_user_detail_document_type']}&where-doc={$document['data_path']}");
            }
        }
    }

    public static function getUserDetail($id_user)
    {
        $userDetail = self::with([
            'userDetail',
            'bankAccount',
            'bpjs',
            'userDetail.religion',
            'userDetail.nationality',
            'userDetail.placeOfBirth:id_city,name_city',
            'userDetail.city:id_city,id_province,name_city',
            'userDetail.permanentCity:id_city,id_province,name_city',
        ])
            ->where('id_user', $id_user)
            ->first();
        return $userDetail;
    }

    public static function updateUserDetail($req)
    {
        $user = self::find($req->user()->id_user);
        $userDetail = UserDetail::where('id_user', $req->user()->id_user)->with('user')->first();
        $bankAccount = UserDetailBankAccount::where('id_user', $req->user()->id_user)->first();

        $user->update($req->all());
        $userDetail = UserDetail::updateOrCreate(['id_user' => $req->user()->id_user], $req->all());
        $bankAccount = UserDetailBankAccount::updateOrCreate(['id_user' => $req->user()->id_user], $req->all());

        $user->bpjs()->updateOrCreate(['bpjs_type' => 'BPJS_K'], ['bpjs_number_id' => $req['bpjs_k']]);
        $user->bpjs()->updateOrCreate(['bpjs_type' => 'BPJS_TK'], ['bpjs_number_id' => $req['bpjs_tk']]);

        return $userDetail->refresh();
    }

    public static function sendOtpToDatabase($otp, $idUser)
    {
        $existingUser = self::where('email', $idUser)->first();

        if (!$existingUser) {
            return false;
        }
        $existingUser->otp = $otp;
        $existingUser->save();
        return true;
    }

    public static function confirmYourAccount($request)
    {
        $existingUser = self::where('email', $request['email'])->where('name', $request['name'])->first();
        if (!$existingUser) {
            return false;
        }
        $existingUser->otp = null;
        $existingUser->save();
        return $existingUser;
    }
    public static function getLastLogin($request)
    {
        $result = self::where('role', 'candidate')->orderBy('id_user', 'ASC')->get();
        if ($result) {
            $datanya = $result->map(function ($item) use ($request) {
                $lastLogIn = DB::table('personal_access_tokens')
                    ->where('tokenable_id', $item['id_user'])
                    ->orderBy('id', 'DESC')
                    ->first();
                if ($lastLogIn) {
                    $item['last_login'] = date('d/m/Y', strtotime($lastLogIn->created_at));
                    self::processPhotoProfile($item);
                    $item['counting_job'] = JobRequisitionUserApplied::where('id_user', $item->id_user)->count();
                    if (!empty($request['start_registration']) && !empty($request['end_registration'])) {
                        if (
                            DateTime::createFromFormat('d/m/Y', $item->created_at->format('d/m/Y')) >= DateTime::createFromFormat('d/m/Y', $request['start_registration'])
                            && DateTime::createFromFormat('d/m/Y', $item->created_at->format('d/m/Y')) <= DateTime::createFromFormat('d/m/Y', $request['end_registration'])
                        ) {
                            if (!empty($request['start_login']) && !empty($request['end_login'])) {
                                if (
                                    DateTime::createFromFormat('d/m/Y', $item['last_login']) >= DateTime::createFromFormat('d/m/Y', $request['start_login'])
                                    && DateTime::createFromFormat('d/m/Y', $item['last_login']) <= DateTime::createFromFormat('d/m/Y', $request['end_login'])
                                ) {
                                    if ($item['counting_job'] != 0) {
                                        return self::formatMappingUsers($item);
                                    }
                                }
                            } else {
                                if ($item['counting_job'] != 0) {
                                    return self::formatMappingUsers($item);
                                }
                            }
                        }
                    } else {
                        if ($item['counting_job'] != 0) {
                            return self::formatMappingUsers($item);
                        }
                    }
                }
            })->toArray();
            $datanya = array_values(array_filter($datanya));
        }
        return $datanya;
    }

    public static function formatMappingUsers($result)
    {
        return [
            'id_user' => $result->id_user,
            'photo_profile' => $result->photo_profile,
            'name' => $result->name,
            'email' => $result->email,
            'registered' => $result->created_at->format('d/m/Y'),
            'last_login' => $result->last_login,
            'applied_job' => $result->counting_job,
        ];
    }

    public static function deleteUserProgress($idUser)
    {
        if (!is_array($idUser)) {
            $idUser = [$idUser];
        }

        $result = self::with('jobRequisitionUserApplied.jobRequisitionUserAppliedProcess')
            ->where('role', 'candidate')
            ->whereIn('id_user', $idUser)
            ->orderBy('id_user', 'ASC')
            ->get();

        if ($result->isNotEmpty()) {
            foreach ($result as $item) {
                $hapusDataApplied = JobRequisitionUserApplied::where('id_user', $item['id_user'])->get();
                if ($hapusDataApplied->isNotEmpty()) {
                    foreach ($hapusDataApplied as $appliedItem) {
                        $hapusDataProgress = JobRequisitionUserAppliedProcess::where('id_job_requisition_user_applied', $appliedItem['id_job_requisition_user_applied']);
                        $hapusDataProgress->delete();
                    }
                    $hapusDataApplied->each(function ($appliedItem) {
                        $appliedItem->delete();
                    });
                }
            }
        }

        return true;
    }

    public static function getUserDataListAccess()
    {
        $myQuery = self::with(['userDetail'])->get();
        $dataMapping = $myQuery->map(function ($item) {
            self::processPhotoProfile($item);
            return self::formatMappingUserRole($item);
        });
        return $dataMapping;
    }

    public static function formatMappingUserRole($result)
    {
        $userDetail = $result->userDetail;
        return [
            'id_user' => $result->id_user,
            'nik' => $userDetail && $userDetail->nik !== null ? $userDetail->nik : 'No data',
            'photo_profile' => $result->photo_profile,
            'name' => $result->name,
            'email' => $result->email,
            'role' => $result->role,
        ];
    }


    public static function updateUserRole($id_user, $role)
    {
        $findUser = self::find($id_user);
        $findUser->update(['role' => $role]);
        return true;
    }
    public static function groupingDataLang($userDetailLanguages)
    {
        $desiredSkills = ['Listening', 'Speaking', 'Writing'];
        $groupedUserLanguages = $userDetailLanguages->groupBy('id_language')->map(function ($languageGroup) use ($desiredSkills) {
            $existingSkills = $languageGroup->pluck('skill')->toArray();
            $missingSkills = array_diff($desiredSkills, $existingSkills);
            foreach ($missingSkills as $missingSkill) {
                $languageGroup->push((object) [
                    'skill' => $missingSkill,
                    'skill_level' => '-',
                ]);
            }
            return [
                'id_user_detail_language' => $languageGroup->first()->id_user_detail_language,
                'id_user' => $languageGroup->first()->id_user,
                'id_language' => $languageGroup->first()->id_language,
                'name_language' => $languageGroup->first()->languages->name_language,
                'description' => $languageGroup->first()->description,
                'skill' => $languageGroup->map(function ($language) {
                    return [
                        'skill' => $language->skill,
                        'skill_level' => $language->skill_level ?: '-',
                    ];
                }),
            ];
        })->values();

        return $groupedUserLanguages;
    }



}
