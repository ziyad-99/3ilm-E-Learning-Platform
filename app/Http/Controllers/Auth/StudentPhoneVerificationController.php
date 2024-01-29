<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class StudentPhoneVerificationController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('website.auth.studentPhoneVerification.verify-phone');
    }

    public function store(Request $request)
    {
        $student = auth()->user();

        //check if the code expired or not
        if ($student->expired_at <= now() || $student->expired_at == null) {

            $code = rand(10000, 99999);
            $expired_at = now()->addMinutes(15);

            $student->code = $code;
            $student->expired_at = $expired_at;
            $student->save();

            //smsPro Source
            $source = '3ilm.dz';

            // Remove the leading zero and add '213' at the beginning
            $phoneNumber = '213' . substr($student->phone, 1);

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

        return view('website.auth.studentPhoneVerification.submit-code');
    }

    public function generateNewCode(Request $request)
    {
        $student = auth()->user();

        $code = rand(10000, 99999);
        $expired_at = now()->addMinutes(15);

        $student->code = $code;
        $student->expired_at = $expired_at;
        $student->save();

        // Remove the leading zero and add '213' at the beginning
        $phoneNumber = '213' . substr($student->phone, 1);

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
        $student = auth()->user();

        if ($request->code == $student->code && $student->expired_at >= now()) {

            $student->phone_verified_at = now();
            $student->save();

            Alert::success(trans('auth.your phone number verified'), trans('website/website.You can start using the platform'));

            return redirect()->route('dashboard.student');

        } elseif ($student->expired_at < now()) {

            return redirect()->back()->with('warning', trans('auth.The code was expired'),);

        } elseif ($student->phone_verified_at == null) {

            return redirect()->back()->with('warning', trans('auth.The code you entered is incorrect'),);

        } else {

            return redirect()->back()->with('success', trans('auth.your phone number already verified'),);

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
