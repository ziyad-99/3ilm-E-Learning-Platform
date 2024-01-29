<?php

use App\Http\Controllers\Auth\AuthAdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\AuthInstructorController;
use App\Http\Controllers\Auth\InstructorPhoneVerificationController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Auth\StudentResetPasswordViaOTPController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\InstructorRestPasswordViaOTPController;
use App\Http\Controllers\Auth\StudentPhoneVerificationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')->name('register.student');


//##################################### Route Student ##############################################

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest')->name('login.user');

//Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout.user');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout.student');

//##################################################################################################

//################################## Route Instructor ##############################################

Route::post('/login/Instructor', [AuthInstructorController::class, 'store'])->middleware('guest')->name('login.instructor');

Route::post('/logout/instructor', [AuthInstructorController::class, 'destroy'])->middleware('auth:instructor')->name('logout.instructor');

Route::post('/register/instructor', [AuthInstructorController::class, 'storeRegister'])
    ->middleware('guest')->name('register.instructor');

Route::get('password/forgot', [AuthInstructorController::class, 'showForgotForm'])
    ->name('instructor.showForgotForm');

Route::post('password/forgot-link', [AuthInstructorController::class, 'showRestLink'])
    ->name('instructor.showRestLink');

Route::get('password/rest/{token}', [AuthInstructorController::class, 'showRestForm'])
    ->name('instructor.showRestForm');

Route::post('password/rest', [AuthInstructorController::class, 'passwordRest'])
    ->name('instructor.passwordRest');

//#####################################################################################################################

//################################## Route Admin ######################################################################

Route::get('/login/admin', [AuthAdminController::class, 'create'])->middleware('guest')->name('login.adminCreate');

Route::post('/login/admin', [AuthAdminController::class, 'store'])->middleware('guest')->name('login.admin');

Route::post('/logout/admin', [AuthAdminController::class, 'destroy'])->middleware('auth:admin')->name('logout.admin');

//######################################################################################################################


Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout.student');


//################################## Student phone validation ################################################

Route::get('/student/phone_verification', [StudentPhoneVerificationController::class, 'create'])
    ->middleware('auth')->name('student.studentPhoneVerification');

Route::get('/student/generate_code', [StudentPhoneVerificationController::class, 'store'])
    ->middleware('auth')->name('student.generateCode');

Route::get('/student/generate_new_code', [StudentPhoneVerificationController::class, 'generateNewCode'])
    ->middleware('auth')->name('student.generateNewCode');

Route::post('/student/verify_phone_number', [StudentPhoneVerificationController::class, 'verifyPhoneNumber'])
    ->middleware('auth')->name('student.verifyPhoneNumber');
//######################################################################################################################


//################################## Instructor phone validation #######################################################

Route::get('/instructor/phone_verification', [InstructorPhoneVerificationController::class, 'create'])
    ->middleware('auth:instructor')->name('instructor.instructorPhoneVerification');

Route::get('/instructor/generate_code', [InstructorPhoneVerificationController::class, 'store'])
    ->middleware('auth:instructor')->name('instructor.generateCode');

Route::get('/instructor/generate_new_code', [InstructorPhoneVerificationController::class, 'generateNewCode'])
    ->middleware('auth:instructor')->name('instructor.generateNewValidationCode');

Route::post('/instructor/verify_phone_number', [InstructorPhoneVerificationController::class, 'verifyPhoneNumber'])
    ->middleware('auth:instructor')->name('instructor.verifyPhoneNumber');
//######################################################################################################################


//################################## Student phone rest Password #######################################################

Route::get('/reset_password_type', [StudentResetPasswordViaOTPController::class, 'resetPasswordType'])
    ->middleware('guest')->name('password.resetPasswordType');

Route::get('/choose_reset_password_type', [StudentResetPasswordViaOTPController::class, 'chooseResetPasswordType'])
    ->middleware('guest')->name('password.chooseResetPasswordType');

Route::get('/forgot-password-phone', [StudentResetPasswordViaOTPController::class, 'store'])
    ->middleware('guest')->name('password.forgotPasswordPhone');

Route::get('/verify_rest_password_code', [StudentResetPasswordViaOTPController::class, 'verifyRestPasswordCode'])
    ->middleware('guest')->name('password.verifyRestPasswordCode');

Route::get('/phone-reset-password', [StudentResetPasswordViaOTPController::class, 'phoneResetPassword'])
    ->middleware('guest')->name('password.phoneResetPassword');

Route::get('/phone_generate_new_code', [StudentResetPasswordViaOTPController::class, 'generateNewCode'])
    ->middleware('guest')->name('password.generateNewCode');

//######################################################################################################################


//################################## Instructor phone rest Password ################################################

Route::get('/instructor_reset_password_type', [InstructorRestPasswordViaOTPController::class, 'resetPasswordType'])
    ->middleware('guest')->name('instructor.resetPasswordType');

Route::get('/instructor_choose_reset_password_type', [InstructorRestPasswordViaOTPController::class, 'chooseResetPasswordType'])
    ->middleware('guest')->name('instructor.chooseResetPasswordType');

Route::get('/instructor_forgot-password-phone', [InstructorRestPasswordViaOTPController::class, 'store'])
    ->middleware('guest')->name('instructor.forgotPasswordPhone');

Route::get('/instructor_verify_rest_password_code', [InstructorRestPasswordViaOTPController::class, 'verifyRestPasswordCode'])
    ->middleware('guest')->name('instructor.verifyRestPasswordCode');

Route::get('/instructor_phone-reset-password', [InstructorRestPasswordViaOTPController::class, 'phoneResetPassword'])
    ->middleware('guest')->name('instructor.phoneResetPassword');

Route::get('/instructor_phone_generate_new_code', [InstructorRestPasswordViaOTPController::class, 'generateNewCode'])
    ->middleware('guest')->name('instructor.generateNewCode');

//#####################################################################################################################


//############################################ Google auth ##############################################################

Route::get('/auth/{provider}/redirect', [SocialiteLoginController::class, 'redirect'])
    ->name('auth.socialite.redirect');

Route::get('/auth/{provider}/callback', [SocialiteLoginController::class, 'callback'])
    ->name('auth.socialite.callback');


Route::get('/auth/{provider}/instructor/redirect', [SocialiteLoginController::class, 'redirectInstructor'])
    ->name('auth.socialite.instructor.redirect');

Route::get('/auth/{provider}/instructor/callback', [SocialiteLoginController::class, 'callbackInstructor'])
    ->name('auth.socialite.instructor.callback');

//#####################################################################################################################


//Route::middleware('guest')->group(function () {
//    Route::get('register', [RegisteredUserController::class, 'create'])
//                ->name('register');
//
//    Route::post('register', [RegisteredUserController::class, 'store']);
//
//    Route::get('login', [AuthenticatedSessionController::class, 'create'])
//                ->name('login');
//
//    Route::post('login', [AuthenticatedSessionController::class, 'store']);
//
//    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//                ->name('password.request');
//
//    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//                ->name('password.email');
//
//    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
//                ->name('password.reset');
//
//    Route::post('reset-password', [NewPasswordController::class, 'store'])
//                ->name('password.update');
//});
//
//Route::middleware('auth')->group(function () {
//    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
//                ->name('verification.notice');
//
//    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//                ->middleware(['signed', 'throttle:6,1'])
//                ->name('verification.verify');
//
//    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                ->middleware('throttle:6,1')
//                ->name('verification.send');
//
//    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//                ->name('password.confirm');
//
//    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
//
//    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//                ->name('logout');
//});
