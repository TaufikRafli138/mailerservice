<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvenueMailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\JobRequisitionController;
use App\Http\Controllers\LookupController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;
use App\Models\JobRequisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/avenue-service')->group(function () {
    Route::prefix('/send-email')->group(function () {
        Route::get('/', [AvenueMailController::class, 'testing']);
        Route::post('/fan-letter', [AvenueMailController::class, 'sendFanLetter']);
        Route::post('/mail-contact-management', [AvenueMailController::class, 'sendAboutUS']);

        // Route::post('/background-check', [MailController::class, 'emailBackgroundCheck'])->name('email.bg-check');
        // Route::post('/offering', [MailController::class, 'emailOffering'])->name('email.offering');
        // Route::post('/job-req', [MailController::class, 'emailJobRequisition'])->name('email.job-req');
        // Route::post('/reset-password', [MailController::class, 'emailResetPassword'])->name('email.reset-pass');
        // Route::post('/otp', [MailController::class, 'emailOTP'])->name('email.otp');
    });
});

// Route::prefix('/v1')->group(function () {
//     Route::get('/', function () {
//         return 'Server running successfully!';
//     });

//     Route::prefix('/career')->group(function () {
//         Route::get('/', [UserController::class, 'indexingDataCareer'])->name('career.getList');
//         Route::get('/detail-career', [UserController::class, 'getDetailJobs'])->name('career.getDetail');
//     });

//     Route::prefix('/files')->group(function () {
//         Route::get('/photo-profile', [UserDetailController::class, 'getProfilePhoto']);
//     });

//     Route::get('/export-excel', [UserController::class, 'exportToExcel'])->name('candidate.getSpecificRecord'); //  << Temporary endpoint, this endpoint purposes for testing on browser which does not require a bearer token  --
//     Route::get('/export-dashboard-excel', [DashboardController::class, 'exportDashboardJobRequisition'])->name('candidate.getSpecificRecord'); //  << Temporary endpoint, this endpoint purposes for testing on browser which does not require a bearer token  --
//     Route::get('/export-recruited-excel', [DashboardController::class, 'exportRecruitedCandidate'])->name('candidate.getSpecificRecord'); //  << Temporary endpoint, this endpoint purposes for testing on browser which does not require a bearer token  --

//     Route::prefix('/auth')->group(function () {
//         Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
//         Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
//         Route::get('not-authenticated', [AuthController::class, 'forbiddenUnauthenticated'])->name('auth.forbidden');
//         Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('otp.send');
//         Route::post('/active-account', [AuthController::class, 'activateAccount'])->name('otp.confirm');
//         Route::get('/confirm-credential', [AuthController::class, 'confirmCredential'])->name('credential.confirm');
//         Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.forgot');
//         Route::post('/change-password', [AuthController::class, 'changeYourPassword'])->name('password.forgot');
//     });

//     Route::prefix('/lookup-public')->group(function () {
//         Route::get('/data-employment-status', [LookupController::class, 'getDataEmploymentStatus']);
//     });

//     Route::middleware('auth:sanctum')->group(function () {
//         Route::get('/whoami', function (Request $request) {
//             return $request->user();
//         })->name('auth.me');

//         Route::post('/change-password', [UserController::class, 'changePasswordUser']);
//         Route::get('/status-notification', [UserController::class, 'getLatestNotificationStatus']);
//         Route::post('/change-notification', [UserController::class, 'updateNotification']);

//         Route::prefix('/notifications')->group(function () {
//             Route::get('/', [UserController::class, 'showNotification'])->name('notification.showNotification');
//             Route::post('/mark-notification', [UserController::class, 'markRead'])->name('notification.markRead');
//             Route::get('/mark-selected', [UserController::class, 'markRead'])->name('notification.markAllRead');
//         });

//         Route::prefix('/lookup')->group(function () {
//             Route::get('/data-country', [LookupController::class, 'getCountry']);
//             Route::get('/data-language', [LookupController::class, 'getDataLanguage']);
//             Route::get('/data-employment-status', [LookupController::class, 'getDataEmploymentStatus']);
//             Route::get('/data-religion', [LookupController::class, 'getReligion']);
//             Route::get('/data-province', [LookupController::class, 'getProvince']);
//             Route::get('/data-city', [LookupController::class, 'getCity']);
//             Route::get('/data-fakultas', [LookupController::class, 'getFakultasDetail'])->name('getListFakultas');

//             Route::prefix('/master')->group(function () {
//                 Route::get('/div', [LookupController::class, 'getMasterDiv']);
//                 Route::get('/emp', [LookupController::class, 'getMasterEmp']);
//                 Route::get('/unit', [LookupController::class, 'getUnitByDivision']);
//                 Route::get('/job-group', [LookupController::class, 'getJobGroup']);
//             });
//         });

//         Route::prefix('/job-applied')->group(function () {
//             Route::get('/', [UserController::class, 'getJobsApplied'])->name('jobsApplied.getList');
//         });

//         Route::prefix('/career')->group(function () {
//             Route::get('/question-jobs', [UserController::class, 'getQuestion'])->name('career.getQuestion');
//             Route::post('/apply-this-jobs/{id_jobs}', [UserController::class, 'applyJob'])->name('career.applyJobs');
//         });

//         Route::prefix('/general')->group(function () {
//             Route::get('/', [UserDetailController::class, 'getUserDetail']);
//             Route::post('/', [UserDetailController::class, 'updateUserDetail']);
//         });

//         Route::prefix('/family-member')->group(function () {
//             Route::get('/', [UserDetailController::class, 'getFamilyMemberDetail'])->name('familyMember.getList');
//             Route::post('/', [UserDetailController::class, 'updateDataFamilyMember'])->name('familyMember.updateFamilyMember');
//         });

//         Route::prefix('/pilot-rating')->group(function () {
//             Route::get('/', [UserDetailController::class, 'getLatestPilotRating'])->name('pilotRating.listRating');
//             Route::post('/', [UserDetailController::class, 'updatePilotRatingData'])->name('pilotRating.updateRating');
//         });

//         Route::prefix('/educational-data')->group(function () {
//             Route::get('/', [UserDetailController::class, 'getEducationalHistory'])->name('educational.list');
//             Route::post('/', [UserDetailController::class, 'updateDataEducation'])->name('educational.listUpdate');
//         });

//         Route::prefix('/training')->group(function () {
//             Route::get('/', [UserDetailController::class, 'getDataTraining'])->name('training.index');
//             Route::post('/', [UserDetailController::class, 'updateDataTraining'])->name('training.update');
//         });

//         Route::prefix('/license')->group(function () {
//             Route::post('/', [UserDetailController::class, 'updateDataLicense'])->name('license.update');
//             Route::get('/', [UserDetailController::class, 'getDataLicense'])->name('license.index');
//         });

//         Route::prefix('/social-media')->group(function () {
//             Route::get('/', [UserDetailController::class, 'getSocialMedia'])->name('social-media.index');
//             Route::post('/', [UserDetailController::class, 'updateSocialMedia'])->name('social-media.update');
//         });

//         Route::prefix('/experience-language')->group(function () {
//             Route::post('/', [UserDetailController::class, 'updateDataExperience']);
//             Route::get('/', [UserDetailController::class, 'getDataExperienceAndLanguage']);
//         });

//         Route::prefix('/documents')->group(function () {
//             Route::get('/', [UserDetailController::class, 'indexingDataDocument'])->name('document.getList');
//             Route::post('/', [UserDetailController::class, 'uploadFiles'])->name('document.updateList');
//             Route::get('/list-type-docs', [UserDetailController::class, 'getListTypeDocs']);
//             Route::post('/remove-docs', [UserDetailController::class, 'removeFileDocs']);
//         });

//         Route::prefix('/files')->group(function () {
//             Route::get('/get-file', [FileController::class, 'getFile']);
//         });

//         Route::prefix('/send-email')->group(function () {
//             Route::post('/progress', [MailController::class, 'emailRecruitmentProgress'])->name('email.progress');
//             Route::post('/background-check', [MailController::class, 'emailBackgroundCheck'])->name('email.bg-check');
//             Route::post('/offering', [MailController::class, 'emailOffering'])->name('email.offering');
//             Route::post('/job-req', [MailController::class, 'emailJobRequisition'])->name('email.job-req');
//             Route::post('/reset-password', [MailController::class, 'emailResetPassword'])->name('email.reset-pass');
//             Route::post('/otp', [MailController::class, 'emailOTP'])->name('email.otp');
//         });

//         Route::prefix('/cms')->group(function () {
//             Route::prefix('/candidate')->group(function () {
//                 Route::get('/count-process', [UserController::class, 'countAllByNameProcess'])->name('candidate.countingValue');
//                 Route::get('/get-all-data', [UserController::class, 'getRecordOfAll'])->name('candidate.getAllRecord');
//                 Route::get('/candidate-get-record', [UserController::class, 'getSpecificRecordOfCandidate'])->name('candidate.getSpecificRecord');
//                 Route::get('/selection-process', [UserController::class, 'getSelectionProcess'])->name('candidate.getSpecificRecord');
//                 Route::get('/export-excel', [UserController::class, 'exportToExcel'])->name('candidate.getSpecificRecord');
//                 Route::post('/send-mail-progress', [UserController::class, 'sendToEmailCandidate'])->name('candidate.getSpecificRecord');
//                 Route::get('/export-excel', [UserController::class, 'exportToExcel'])->name('candidate.getSpecificRecord');
//             });

//             Route::prefix('/user')->group(function () {
//                 Route::get('/', [UserController::class, 'getAllUser'])->name('user.getAllUser');
//                 Route::get('/delete', [UserController::class, 'deleteUser'])->name('candidate.deleteUser');
//                 Route::get('/candidate-get-record', [UserController::class, 'getSpecificRecordOfCandidate'])->name('candidate.getSpecificRecord');
//                 Route::get('/export-excel', [UserController::class, 'exportToExcel'])->name('candidate.getSpecificRecord');
//             });

//             Route::prefix('/job-requisition')->group(function () {
//                 Route::get('/', [JobRequisitionController::class, 'getAllJobRequisition'])->name('user.getAllUser');
//                 Route::post('/', [JobRequisitionController::class, 'createJobRequisition'])->name('user.getAllUser');
//                 Route::get('/get-detail', [JobRequisitionController::class, 'getDetailOfJobRequisition'])->name('candidate.deleteUser');
//                 Route::get('/get-count', [JobRequisitionController::class, 'getCountOfJobRequisition'])->name('candidate.getSpecificRecord');
//                 Route::get('/get-candidate', [JobRequisitionController::class, 'getDetailOfJobRequisition'])->name('candidate.deleteUser');
//                 Route::get('/change-status', [JobRequisitionController::class, 'changeStatusOfJobReq'])->name('candidate.getSpecificRecord');
//             });

//             Route::prefix('/dashboard')->group(function () {
//                 Route::get('/', [DashboardController::class, 'getJobListing'])->name('user.getAllUser');
//                 Route::get('/get-recruited', [DashboardController::class, 'getListOfRecruitedCandidate'])->name('user.getAllUser');
//                 Route::get('/delete', [UserController::class, 'deleteUser'])->name('candidate.deleteUser');
//                 Route::get('/candidate-get-record', [UserController::class, 'getSpecificRecordOfCandidate'])->name('candidate.getSpecificRecord');
//                 Route::get('/export-excel', [UserController::class, 'exportToExcel'])->name('candidate.getSpecificRecord');
//             });

//             Route::prefix('/user-role')->group(function () {
//                 Route::get('/', [UserController::class, 'getUserDataList'])->name('user.getAllUser');
//                 Route::post('/', [UserController::class, 'updateRoleOfUser'])->name('user.updateRoleOfUser');
//             });
//         });
//     });
// });
