<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;


class InstructorRestPasswordViaOTPController extends Controller
{
    public function resetPasswordType()
    {
        return view('website.auth.instructorForgotPassword.reset-password-type');
    }

    public function chooseResetPasswordType(Request $request)
    {
        $request->validate([
            'restType' => 'required',
        ]);

        if ($request->restType == 'email') {

            return redirect()->route('instructor.showForgotForm');

        } else {

            return view('website.auth.instructorForgotPassword.phone-forgot-password');

        }
    }

    public function store(Request $request)
    {
        $instructor = Instructor::where('phone', $request->phone)
            ->first();

        if ($instructor == null) {
            throw ValidationException::withMessages([
                'phone' => trans('auth.The phone number you entered is not connected with any account'),
            ]);
        } elseif ($instructor->rest_password_code == null && $instructor->rest_password_code_expired_at == null) {

            $rest_password_code = rand(10000, 99999);
            $rest_password_code_expired_at = now()->addMinutes(15);

            $instructor->rest_password_code = $rest_password_code;
            $instructor->rest_password_code_expired_at = $rest_password_code_expired_at;
            $instructor->save();

            // Remove the leading zero and add '213' at the beginning
            $phoneNumber = '213' . substr($instructor->phone, 1);

            //smsPro Source
            $source = '3ilm.dz';

            //disable the SSL
            $client = new Client([
                'verify' => false, // Disable SSL verification (use with caution)
            ]);

            //send otp code
            $client->request('GET', 'https://smsapi.icosnet.com:8443/bulksms/bulksms', [
                'query' => [
                    'username' => 'ASOUFTT',
                    'password' => 'SMS3805',
                    'message' => 'Rest Password code :' . $rest_password_code,
                    'source' => $source,
                    'destination' => $phoneNumber,
                    'type' => 0,
                    'dlr' => 0,
                ],
            ]);
        }

        return view('website.auth.instructorForgotPassword.submit-code', ['phone' => $request->phone]);
    }

    public function verifyRestPasswordCode(Request $request)
    {
        $instructor = Instructor::where('phone', $request->phone)
            ->first();

        if ($instructor == null) {

            throw ValidationException::withMessages([
                'phone' => trans('auth.The phone number you entered is not connected with any account'),
            ]);

        } elseif ($instructor->rest_password_code == $request->code && $instructor->rest_password_code_expired_at >= now()) {

            return view('website.auth.instructorForgotPassword.phone-reset-password', ['phone' => $request->phone]);

        } elseif ($instructor->rest_password_code_expired_at < now()) {

            throw ValidationException::withMessages([
                'phone' => trans('auth.The code you entered expired'),
            ]);

        } elseif ($instructor->rest_password_code != $request->code) {

            throw ValidationException::withMessages([
                'phone' => trans('auth.The code you entered is incorrect'),
            ]);

        }
    }

    public function phoneResetPassword(Request $request)
    {
        $request->validate([
            'phone' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $instructor = Instructor::where('phone', $request->phone)
            ->first();

        if ($instructor == null) {

            throw ValidationException::withMessages([
                'phone' => trans('auth.The phone number you entered is not connected with any account'),
            ]);

        } else {

            if ($instructor->rest_password_code_expired_at >= now()) {

                $instructor->password = Hash::make($request->password);
                $instructor->save();

                return redirect()->route('login')->with('success', trans('auth.your password change it successfully'));

            } else {

                return view('website.auth.instructorForgotPassword.phone-reset-password', ['phone' => $request->phone])
                    ->withErrors([trans('auth.The code you entered expired')]);
            }

        }
    }

    public function generateNewCode(Request $request)
    {
        $instructor = Instructor::where('phone', $request->phone)
            ->first();

        if ($instructor == null) {

            throw ValidationException::withMessages([
                'phone' => trans('auth.The phone number you entered is not connected with any account'),
            ]);
        } else {

            $rest_password_code = rand(10000, 99999);
            $rest_password_code_expired_at = now()->addMinutes(15);

            $instructor->rest_password_code = $rest_password_code;
            $instructor->rest_password_code_expired_at = $rest_password_code_expired_at;
            $instructor->save();

            // Remove the leading zero and add '213' at the beginning
            $phoneNumber = '213' . substr($instructor->phone, 1);

            //smsPro Source
            $source = '3ilm.dz';

            //disable the SSL
            $client = new Client([
                'verify' => false, // Disable SSL verification (use with caution)
            ]);

            //send otp code
            $client->request('GET', 'https://smsapi.icosnet.com:8443/bulksms/bulksms', [
                'query' => [
                    'username' => 'ASOUFTT',
                    'password' => 'SMS3805',
                    'message' => 'Rest Password code :' . $rest_password_code,
                    'source' => $source,
                    'destination' => $phoneNumber,
                    'type' => 0,
                    'dlr' => 0,
                ],
            ]);
        }
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
