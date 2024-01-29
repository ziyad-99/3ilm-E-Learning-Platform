<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Http\Requests\Auth\InstructorLoginRequest;
use App\Models\Instructor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('website.admin.auth.signin');
    }

    public function store(AdminLoginRequest $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }

        return redirect()->back()->withErrors(['name' => (trans('auth.failed'))]);
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
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

        // checking email
        if (Instructor::where('email', $request->email)->get())
            return redirect()->back()->withErrors(['name' => (trans('auth.throttle'))]);

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
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login/admin');
    }
}
