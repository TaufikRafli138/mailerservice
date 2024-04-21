<?php

namespace App\Http\Controllers;

use App\Models\LogPusherActivity;
use App\Models\User;
use App\Traits\ApiResponsesTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponsesTrait;

    public function register(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            $user = User::create([
                'name' => strtoupper($fields['name']),
                'email' => $fields['email'],
                'password' => Hash::make($fields['password'])
            ]);
            self::sendOtp($fields['email'], strtoupper($fields['name']));
            return $this->successResponse('User successfully register!', [], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(Request $request)
    {
        try {

            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // ==============================
            $user = User::where('email', $credentials['email'])->first();
            if ($user !== null && isset ($user['otp']) && $user['otp'] !== null) {
                return $this->errorResponse('Please Confirm Your Account First!', Response::HTTP_UNAUTHORIZED);
            }
            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Email or password are incorrect.'],
                ]);
            }
            // ==========================================================
            $token = $user->createToken('authToken')->plainTextToken;

            $data = [
                'user' => [
                    'id_user' => $user->id_user,
                    'name' => $user->name,
                    'email' => $user->email,
                    'photo_profile' => $user->photo_profile !== null ? $user['photo_profile'] : null,
                    'role' => $user->role
                ],
                'access_token' => $token,
            ];
            return $this->successResponse('User successfully login!', $data, Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function forbiddenUnauthenticated()
    {
        return $this->errorResponse('Not Authenticated!', Response::HTTP_UNAUTHORIZED);
    }

    public function sendOtp($email, $name)
    {
        $mailControll = new MailController;
        $otpNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $existEmail = User::sendOtpToDatabase($otpNumber, $email);
        if (!$existEmail) {
            return $this->errorResponse('No email Match for your input', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $username = str_replace(' ', '_', $name);
        $credential = "{$username}\${$email}";
        $mailControll->emailActivateAccount($otpNumber, $email, $name, base64_encode($credential));
        User::sendOtpToDatabase($otpNumber, $email);
    }

    public function activateAccount(Request $request)
    {
        try {
            $parts = explode("$", base64_decode($request->input('credential')));
            $request['name'] = str_replace('_', ' ', $parts[0]);
            $request['email'] = $parts[1];
            $existOTP = User::confirmYourAccount($request);
            if ($existOTP) {

                LogPusherActivity::caseAfterRegister($existOTP);

                $user = User::where('email', $request['email'])->first();
                $token = $user->createToken('authToken')->plainTextToken;
                $data = [
                    'user' => [
                        'id_user' => $user->id_user,
                        'name' => $user->name,
                        'email' => $user->email,
                        'photo_profile' => $user->photo_profile !== null ? $user['photo_profile'] : null,
                        'role' => $user->role
                    ],
                    'access_token' => $token,
                ];
                if ($token) {
                    return $this->successResponse('Success Confirm Your Account', $data, Response::HTTP_OK);
                }
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function forgotPassword(Request $request)
    {
        $mailControll = new MailController;
        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
            $user_id = $existingUser['id_user'];
            $name = $existingUser['name'];
            $password = $existingUser['password'];
        }
        $username = str_replace(' ', '_', $name);
        $credential = "{$username}\${$request['email']}\${$request['password']}";
        $mailControll->emailResetPassword($request['email'], $name, base64_encode($credential));
        return $this->successResponse('Successfully Request Password', ['credential' => base64_encode($credential)], Response::HTTP_OK);
    }

    public function confirmCredential(Request $request)
    {
        try {
            $decodedCredential = mb_convert_encoding(base64_decode($request['credential']), 'UTF-8', 'UTF-8');
            $parts = explode("$", $decodedCredential);
            $request['name'] = str_replace('_', ' ', $parts[0]);
            $request['email'] = $parts[1];
            $existingUser = User::where('name', $request['name'])->where('email', $request['email'])->first();
            if (!$existingUser) {
                return $this->errorResponse('User Not Found', Response::HTTP_NOT_FOUND);
            } else {
                return $this->successResponse('Successfully Request Credential Confirm', $request['credential'], Response::HTTP_OK);
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function changeYourPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'credential' => 'required',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'code' => 1,
                    'message' => $validator->errors()->first(),
                ], Response::HTTP_BAD_REQUEST);
            }

            $parts = explode("$", base64_decode($request->input('credential')));
            $request['name'] = str_replace('_', ' ', $parts[0]);
            $request['email'] = $parts[1];
            $request['password'] = $parts[2];
            $existingUser = User::where('name', $request['name'])->where('email', $request['email'])->first();

            if (!$existingUser) {
                return $this->errorResponse('User Not Found', Response::HTTP_NOT_FOUND);
            }
            $newPassword = $request->input('new_password');
            $existingUser->password = Hash::make($newPassword);
            $existingUser->save();
            return $this->successResponse('Successfully Updated Your Password', [], Response::HTTP_OK);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            if (str_contains($errorMessage, 'invalid input syntax for type integer')) {
                return $this->errorResponse('Tidak dapat memenuhi permintaan anda, Terdapat salah input untuk tipe data yang tidak seharusnya. silahkan cek inputan anda', Response::HTTP_BAD_REQUEST);
            }

            return $this->errorResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
