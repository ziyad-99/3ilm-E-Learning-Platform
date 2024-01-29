<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InstructorPhoneNumberVerification
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
        $instructor = auth('instructor')->user();

        if ($instructor->phone != null && $instructor->phone_verified_at == null) {

            Alert::info(trans('auth.Verify phone number'), trans('auth.Thanks For Sign up'));

            return redirect()->route('instructor.instructorPhoneVerification');
        }

        if ($instructor->phone == null && $instructor->state == null && $instructor->gender == null) {

            Alert::info(trans('website/website.Please complete your profile'),
                trans('admin/studentPanel.bio') . trans('website/website.and') . trans('website/signup.phone_number') . trans('website/website.and') . trans('admin/editStudent.state') . trans('website/website.and') . trans('website/studentProfile.gender'));

            return redirect()->route('instructor.profile');
        }

        return $next($request);
    }
}
