<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StudentPhoneNumberVerification
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $student = auth()->user();

        if ($student->phone != null && $student->phone_verified_at == null) {

            Alert::info(trans('auth.Verify phone number'), trans('auth.Thanks For Sign up'));

            return redirect()->route('student.studentPhoneVerification');
        }

        if ($student->phone == null && $student->state == null && $student->gender == null) {

            Alert::info(trans('website/website.Please complete your profile'),
                trans('admin/studentPanel.bio') . trans('website/website.and') . trans('website/signup.phone_number') . trans('website/website.and') . trans('admin/editStudent.state') . trans('website/website.and') . trans('website/studentProfile.gender'));

            return redirect()->route('student.profile');
        }

        return $next($request);
    }
}
