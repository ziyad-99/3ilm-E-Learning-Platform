<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\InstructorLoginRequest;
use App\Models\Instructor;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon\Carbon;

class AuthInstructorController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(InstructorLoginRequest $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::INSTRUCTOR);
        }

        return redirect()->back()->withErrors(['name' => (trans('auth.failed'))]);

    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:instructors'],
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:instructors'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'state' => ['required', 'string', 'max:255'],
        ]);

        $instructor = Instructor::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'state' => $request->state,
        ]);

        // checking password
        if (!$request->password == $request->password_confirmation)
            return redirect()->back()->withErrors(['name' => (trans('auth.password'))]);

//        // checking email
//        if (Instructor::where('email', $request->email)->get())
//            return redirect()->back()->withErrors(['name' => (trans('auth.throttle'))]);

        event(new Registered($instructor));

        Auth::guard('instructor')->login($instructor);

        return redirect(RouteServiceProvider::INSTRUCTOR);
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

    public function destroy(Request $request)
    {
        Auth::guard('instructor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showForgotForm()
    {
        return view('website.auth.instructorForgotPassword.forgot-password');
    }

    public function showRestLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:instructors,email'
        ]);

        $token = \Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        $action_link = route('instructor.showRestForm', ['token' => $token, 'email' => $request->email]);
        $body = "you have received a request to rest your password from <br>3ilm</br> account associated with " . $request->email
            . " you can rest your password by clicking the link below " . $action_link;

        \Mail::send('email-forgot', ['action-link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from('contact@souf.pre-vieweb.com', env('app_name'));
            $message->to($request->email)
                ->subject('Rest Password');
        });

        return back()->with('success', 'we have sent your password rest link');
    }

    public function showRestForm(Request $request, $token = null)
    {
        return view('website.auth.instructorForgotPassword.reset-password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function passwordRest(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:instructors,email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token])
            ->first();

        if (!$check_token) {
            return redirect()->back()->with('warning', 'the token expired');
        } else {
            Instructor::where('email', $request->email)->update(
                ['password' => Hash::make($request->password)]
            );

            DB::table('password_resets')
                ->where(['email' => $request->email,])
                ->delete();

            return redirect()->route('login')->with('success', 'you have update password');
        }
    }
}
