<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\FacebookProvider;
use Laravel\Socialite\Two\GoogleProvider;

class SocialiteLoginController extends Controller
{
    public function redirect($provider)
    {
        if ($provider == 'google')
            return $this->buildGoogleProvider();
        else
            return $this->buildStudentFacebookProvider();
    }

    public function callback($provider)
    {
        $provider_student = $this->getUserProvider($provider);

        $student = User::where([
            'provider' => $provider,
            'provider_id' => $provider_student->id,
        ])->first();

        //check if the email is exists
        $emailExists = User::where('email', $provider_student->email)->first();

        if ($emailExists) {
            //login and redirect to home page
            Auth::guard('web')->login($emailExists);
            return redirect(RouteServiceProvider::HOME);
        }

        //register the student is not registered
        if (!$student && !$emailExists) {

            //check if provider
            if ($provider == 'google')

                $student = User::create([
                    'firstName' => $provider_student->user['given_name'],
                    'lastName' => $provider_student->user['family_name'],
                    'email' => $provider_student->email,
                    'password' => Hash::make(Str::random(8)),
                    'provider' => $provider,
                    'provider_id' => $provider_student->id,
                    'provider_token' => $provider_student->token,
                ]);

            else {

                //divide the full name
                $dividedName = $this->divideFullName($provider_student->name);

                $student = User::create([
                    'firstName' => $dividedName['firstName'],
                    'lastName' => $dividedName['lastName'],
                    'email' => $provider_student->email,
                    'password' => Hash::make(Str::random(8)),
                    'provider' => $provider,
                    'provider_id' => $provider_student->id,
                    'provider_token' => $provider_student->token,
                ]);
            }

            //login and redirect to home page
            Auth::guard('web')->login($student);
            return redirect(RouteServiceProvider::HOME);
        }
    }

    public function redirectInstructor($provider)
    {
        if ($provider == 'google')
            return $this->buildInstrucrotGoogleProvider();
        else
            return $this->buildInstructorFacebookProvider();
    }

    public function callbackInstructor($provider)
    {
        $provider_instructor = $this->getInstructorUserProvider($provider);

        $instructor = Instructor::where([
            'provider' => $provider,
            'provider_id' => $provider_instructor->id,
        ])->first();

        //check if the email is exists
        $emailExists = Instructor::where('email', $provider_instructor->email)->first();

        if ($emailExists) {
            //login and redirect to home page
            Auth::guard('instructor')->login($emailExists);
            return redirect(RouteServiceProvider::HOME);
        }

        //register the instructor is not registered
        if (!$instructor && !$emailExists) {

            //check if provider
            if ($provider == 'google')

                $instructor = Instructor::create([
                    'firstName' => $provider_instructor->user['given_name'],
                    'lastName' => $provider_instructor->user['family_name'],
                    'email' => $provider_instructor->email,
                    'password' => Hash::make(Str::random(8)),
                    'provider' => $provider,
                    'provider_id' => $provider_instructor->id,
                    'provider_token' => $provider_instructor->token,
                ]);

            else {

                //divide the full name
                $dividedName = $this->divideFullName($provider_instructor->name);

                $instructor = Instructor::create([
                    'firstName' => $dividedName['firstName'],
                    'lastName' => $dividedName['lastName'],
                    'email' => $provider_instructor->email,
                    'password' => Hash::make(Str::random(8)),
                    'provider' => $provider,
                    'provider_id' => $provider_instructor->id,
                    'provider_token' => $provider_instructor->token,
                ]);
            }

            //login and redirect to home page
            Auth::guard('instructor')->login($instructor);
            return redirect(RouteServiceProvider::INSTRUCTOR);
        }
    }

    public function buildGoogleProvider()
    {
        return Socialite::buildProvider(
            GoogleProvider::class, [
                'client_id' => env('GOOGLE_CLIENT_ID'),
                'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                'redirect' => env('GOOGLE_STUDENT_REDIRECT_URL'),
                'default_graph_version' => 'v3.3',
            ]
        )->redirect();
    }

    public function getUserProvider($provider)
    {
//        if ($provider == 'google')
            return Socialite::buildProvider(
                GoogleProvider::class, [
                    'client_id' => env('GOOGLE_CLIENT_ID'),
                    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                    'redirect' => env('GOOGLE_STUDENT_REDIRECT_URL'),
                    'default_graph_version' => 'v3.3',
                ]
            )->user();
//        else
//            return Socialite::buildProvider(
//                FacebookProvider::class, [
//                    'client_id' => env('FACEBOOK_CLIENT_ID'),
//                    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
//                    'redirect' => env('FACEBOOK_STUDENT_REDIRECT_URL'),
//                    'default_graph_version' => 'v3.3',
//                ]
//            )->user();
    }

    public function buildInstrucrotGoogleProvider()
    {
        return Socialite::buildProvider(
            GoogleProvider::class, [
                'client_id' => env('GOOGLE_CLIENT_ID'),
                'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                'redirect' => env('GOOGLE_INSTRUCTOR_REDIRECT_URL'),
                'default_graph_version' => 'v3.3',
            ]
        )->redirect();
    }

    public function getInstructorUserProvider($provider)
    {
        if ($provider == 'google')
            return Socialite::buildProvider(
                GoogleProvider::class, [
                    'client_id' => env('GOOGLE_CLIENT_ID'),
                    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                    'redirect' => env('GOOGLE_INSTRUCTOR_REDIRECT_URL'),
                    'default_graph_version' => 'v3.3',
                ]
            )->user();
        else
            return Socialite::buildProvider(
                FacebookProvider::class, [
                    'client_id' => env('FACEBOOK_CLIENT_ID'),
                    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
                    'redirect' => env('FACEBOOK_INSTRUCTOR_REDIRECT_URL'),
                    'default_graph_version' => 'v3.3',
                ]
            )->user();
    }

    public function buildStudentFacebookProvider()
    {
        return Socialite::buildProvider(
            FacebookProvider::class, [
                'client_id' => env('FACEBOOK_CLIENT_ID'),
                'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
                'redirect' => env('FACEBOOK_STUDENT_REDIRECT_URL'),
                'default_graph_version' => 'v3.3',
            ]
        )->redirect();
    }

    public function buildInstructorFacebookProvider()
    {
        return Socialite::buildProvider(
            FacebookProvider::class, [
                'client_id' => env('FACEBOOK_CLIENT_ID'),
                'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
                'redirect' => env('FACEBOOK_INSTRUCTOR_REDIRECT_URL'),
                'default_graph_version' => 'v3.3',
            ]
        )->redirect();
    }

    public function divideFullName($fullName): array
    {
        // Split the full name into an array of words
        $words = explode(' ', $fullName);

        // Extract the first and last names
        $firstName = $words[0]; // First word
        $lastName = isset($words[1]) ? $words[1] : ''; // Second word (if available)

        return [
            'firstName' => $firstName,
            'lastName' => $lastName
        ];
    }
}
