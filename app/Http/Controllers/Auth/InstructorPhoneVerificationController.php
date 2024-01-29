<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InstructorPhoneVerificationController extends Controller
{
    public function create()
    {
        return view('website.auth.instructorPhoneVerification.verify-phone');
    }

    public function store(Request $request)
    {
        $instructor = auth('instructor')->user();

        //check if the code expired or not
        if ($instructor->expired_at == null) {

            $code = rand(10000, 99999);
            $expired_at = now()->addMinutes(1);

            $instructor->code = $code;
            $instructor->expired_at = $expired_at;
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
                    'message' => 'Verification code :' . $code,
                    'source' => $source,
                    'destination' => $phoneNumber,
                    'type' => 0,
                    'dlr' => 0,
                ],
            ]);
        }

        return view('website.auth.instructorPhoneVerification.submit-code');
    }

    public function generateNewCode(Request $request)
    {
        $instructor = auth('instructor')->user();

        $code = rand(10000, 99999);
        $expired_at = now()->addMinutes(1);

        $instructor->code = $code;
        $instructor->expired_at = $expired_at;
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
                'message' => 'Verification code :' . $code,
                'source' => $source,
                'destination' => $phoneNumber,
                'type' => 0,
                'dlr' => 0,
            ],
        ]);

        return redirect()->back();
    }

    public function verifyPhoneNumber(Request $request)
    {
        $instructor = auth('instructor')->user();

        if ($request->code == $instructor->code && $instructor->expired_at >= now()) {

            $instructor->phone_verified_at = now();
            $instructor->save();

            Alert::success(trans('auth.your phone number verified'), trans('website/website.You can start using the platform'));

            return redirect()->route('dashboard.instructor');

        } elseif ($instructor->expired_at < now()) {

            return redirect()->back()->with('warning', trans('auth.The code was expired'));

        } elseif ($instructor->phone_verified_at == null) {

            return redirect()->back()->with('warning', trans('auth.the code you entered is incorrect'));

        } else {

            return redirect()->route('welcome')->with('success', trans('auth.your phone number already verified'));

        }


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
