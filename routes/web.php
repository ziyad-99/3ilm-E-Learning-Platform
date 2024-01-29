<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BBBController;
use App\Http\Controllers\BranchFilterController;
use App\Http\Controllers\ChargilyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Course\IntensiveCourseController;
use App\Http\Controllers\Course\LanguageCourseController;
use App\Http\Controllers\Course\SupportingCourseController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubscriptionCCPController;
use App\Http\Controllers\WaitingListController;
use App\Http\Controllers\WattingListController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

//################################## Route Welcome ################################################

    Route::get('/', [WelcomeController::class, 'index'])->middleware('guest')->name('welcome');

    Route::get('/admin/welcome', [WelcomeController::class, 'index'])->middleware('auth:admin')->name('admin.welcome');

//################################## Route Student ################################################

    Route::group(['middleware' => 'student_phone_verify'], function () {

        Route::get('/dashboard/student', [StudentController::class, 'index'])
            ->middleware(['auth'])->name('dashboard.student');

        Route::get('/student/my_courses', [StudentController::class, 'myCourse'])
            ->middleware(['auth'])->name('student.mycourse');

        Route::get('/student/my_course_from_notification/{subscription_id}', [StudentController::class, 'myCourseFromNotification'])
            ->middleware(['auth'])->name('student.myCourseFromNotifications');

        Route::get('/student/zoom/{slug}', [StudentController::class, 'zoomPage'])
            ->middleware(['auth'])->name('student.zoom');

        Route::get('/student/specificZoom/{session_id}', [StudentController::class, 'specificZoom'])
            ->middleware(['auth'])->name('student.specificZoom');

        Route::get('/student/specificZoomFromNotification/{session_id}', [StudentController::class, 'specificZoomFromNotification'])
            ->middleware(['auth'])->name('student.specificZoomFromNotification');

        Route::get('/student/resource_download/{filename}', [StudentController::class, 'resourceDownload'])
            ->middleware(['auth'])->name('student.resourceDownload');

        Route::get('/student/take_quiz/{quiz_id}', [QuizController::class, 'takeQuiz'])
            ->middleware(['auth'])->name('student.takeQuiz');

        Route::post('/student/upload_quiz/', [QuizController::class, 'uploadQuiz'])
            ->middleware(['auth'])->name('student.uploadQuiz');

        Route::get('/student/read_notification', [StudentController::class, 'readNotification'])
            ->middleware(['auth'])->name('student.readNotification');

        Route::post('/student/active_subscription_code', [StudentController::class, 'activeSubscriptionCode'])
            ->middleware(['auth'])->name('student.activeSubscriptionCode');

        Route::post('/student/upload_ccp_imag', [SubscriptionCCPController::class, 'uploadCCPimag'])
            ->middleware(['auth'])->name('student.uploadCCPimag');

        Route::get('/studnet/language_course/test_link', [LanguageCourseController::class, 'testLinkLanguageCourse'])
            ->middleware(['auth'])->name('student.testLinkLanguageCourse');

    });

    Route::get('/student/profile', [StudentController::class, 'profile'])
        ->middleware(['auth'])->name('student.profile');

    Route::post('/student/update/profile', [StudentController::class, 'updateProfile'])
        ->middleware(['auth'])->name('student.updateProfile');

    Route::get('/student/password', [StudentController::class, 'password'])
        ->middleware(['auth'])->name('student.password');

    Route::post('/student/change/password', [StudentController::class, 'changePassword'])
        ->middleware(['auth'])->name('student.changePassword');

    Route::get('/student/social_media', [StudentController::class, 'socialMedia'])
        ->middleware(['auth'])->name('student.socialMedia');

//############################################ Route Instructor #########################################################

    Route::group(['middleware' => 'instructor_phone_verify'], function () {

        Route::get('/dashboard/instructor', [InstructorController::class, 'index'])
            ->middleware(['auth:instructor'])->name('dashboard.instructor');

        Route::get('/instructor/my_courses', [InstructorController::class, 'myCourse'])
            ->middleware(['auth:instructor'])->name('instructor.mycourse');

        Route::get('/instructor/courseGroup', [InstructorController::class, 'courseGroup'])
            ->middleware(['auth:instructor'])->name('instructor.courseGroup');

        Route::get('/instructor/zoom', [InstructorController::class, 'zoomPage'])
            ->middleware(['auth:instructor'])->name('instructor.zoom');

        Route::get('/instructor/specificZoom', [InstructorController::class, 'specificZoom'])
            ->middleware(['auth:instructor'])->name('instructor.specificZoom');

        Route::get('/instructor/resources_container', [RessourceController::class, 'resourcesContainer'])
            ->middleware(['auth:instructor'])->name('instructor.resourcesContainer');

        Route::get('/instructor/resource/{session_id}', [RessourceController::class, 'resource'])
            ->middleware(['auth:instructor'])->name('instructor.resource');

        Route::post('/instructor/store_resource/', [RessourceController::class, 'storeResource'])
            ->middleware(['auth:instructor'])->name('instructor.storeResource');

        Route::get('/instructor/resource_delete/{id}', [RessourceController::class, 'resourceDelete'])
            ->middleware(['auth:instructor'])->name('instructor.resourceDelete');

        Route::get('/instructor/resource_download/{filename}', [RessourceController::class, 'resourceDownload'])
            ->middleware(['auth:instructor'])->name('instructor.resourceDownload');

        Route::get('/instructor/quiz_container', [QuizController::class, 'quizContainer'])
            ->middleware(['auth:instructor'])->name('instructor.quizContainer');

        Route::get('/instructor/add_quiz/{session_id}', [QuizController::class, 'addQuiz'])
            ->middleware(['auth:instructor'])->name('instructor.addQuiz');

        Route::post('/instructor/store_quiz', [QuizController::class, 'storeQuiz'])
            ->middleware(['auth:instructor'])->name('instructor.storeQuiz');

        Route::get('/instructor/add_question', [QuestionController::class, 'addQuestion'])
            ->middleware(['auth:instructor'])->name('instructor.addQuestion');

        Route::post('/instructor/store_question', [QuestionController::class, 'storeQuestion'])
            ->middleware(['auth:instructor'])->name('instructor.storeQuestion');

    });

    Route::get('/instructor/profile', [InstructorController::class, 'profile'])
        ->middleware(['auth:instructor'])->name('instructor.profile');

    Route::post('/instructor/update/profile', [InstructorController::class, 'updateProfile'])
        ->middleware(['auth:instructor'])->name('instructor.updateProfile');

    Route::get('/instructor/password', [InstructorController::class, 'password'])
        ->middleware(['auth:instructor'])->name('instructor.password');

    Route::post('/instructor/change/password', [InstructorController::class, 'changePassword'])
        ->middleware(['auth:instructor'])->name('instructor.changePassword');

    Route::get('/instructor/social_media', [InstructorController::class, 'socialMedia'])
        ->middleware(['auth:instructor'])->name('instructor.socialMedia');

    Route::get('/instructor/read_notification', [InstructorController::class, 'readNotification'])
        ->middleware(['auth:instructor'])->name('instructor.readNotification');


//################################## Route Admin ######################################################

    Route::get('/all_roles', [RoleController::class, 'index'])
        ->middleware(['auth:admin'])->name('admin.allRoles');

    Route::get('/add_role', [RoleController::class, 'create'])
        ->middleware(['auth:admin'])->name('admin.addRole');

    Route::post('/store_role', [RoleController::class, 'store'])
        ->middleware(['auth:admin'])->name('admin.storeRole');

    Route::get('/edit_role', [RoleController::class, 'editRole'])
        ->middleware(['auth:admin'])->name('admin.editRole');

    Route::post('/update_role', [RoleController::class, 'updateRole'])
        ->middleware(['auth:admin'])->name('admin.updateRole');

    Route::get('/delete_role', [RoleController::class, 'deleteRole'])
        ->middleware(['auth:admin'])->name('admin.deleteRole');


    Route::get('/dashboard/admin', [AdminController::class, 'index'])
        ->middleware(['auth:admin'])->name('dashboard.admin');

    Route::get('/admin/all_admins', [AdminController::class, 'allAdmins'])
        ->middleware(['auth:admin'])->name('admin.allAdmins');

    Route::get('/admin/add_admin', [AdminController::class, 'addAdmin'])
        ->middleware(['auth:admin'])->name('admin.addAdmins');

    Route::post('/admin/add_admin', [AdminController::class, 'storeAdmin'])
        ->middleware(['auth:admin'])->name('admin.storeAdmin');

    Route::get('/admin/edit_admin/{admin_id}', [AdminController::class, 'editAdmin'])
        ->middleware(['auth:admin'])->name('admin.editAdmin');

    Route::post('/admin/update_admin', [AdminController::class, 'updateAdmin'])
        ->middleware(['auth:admin'])->name('admin.updateAdmin');

    Route::get('/admin/admin_delete/{admin_id}', [AdminController::class, 'adminDelete'])
        ->middleware(['auth:admin'])->name('admin.adminDelete');

    Route::get('/admin/courses_panel', [AdminController::class, 'coursesPanel'])
        ->middleware(['auth:admin'])->name('admin.coursesPanel');

    Route::get('/admin/all_supporting_courses', [AdminController::class, 'allSupportingCourses'])
        ->middleware(['auth:admin'])->name('admin.allSupportingCourses');

    Route::get('/admin/add_supporting_course', [AdminController::class, 'addSupportingCourse'])
        ->middleware(['auth:admin'])->name('admin.addSupportingCourse');

    Route::post('/admin/store_supporting_course', [AdminController::class, 'storeSupportingCourse'])
        ->middleware(['auth:admin'])->name('admin.storeSupportingCourse');

    Route::get('/admin/edit_supporting_course/{course_id}', [AdminController::class, 'editSupportingCourse'])
        ->middleware(['auth:admin'])->name('admin.editSupportingCourse');

    Route::post('/admin/update_supporting_course', [AdminController::class, 'updateSupportingCourse'])
        ->middleware(['auth:admin'])->name('admin.updateSupportingCourse');

    Route::get('/admin/delete_supporting_course/{course_id}', [AdminController::class, 'deleteSupportingCourse'])
        ->middleware(['auth:admin'])->name('admin.deleteSupportingCourse');

    Route::get('/admin/all_intensive_courses', [AdminController::class, 'allIntensiveCourses'])
        ->middleware(['auth:admin'])->name('admin.allIntensiveCourses');

    Route::get('/admin/add_intensive_course', [AdminController::class, 'addIntensiveCourse'])
        ->middleware(['auth:admin'])->name('admin.addIntensiveCourse');

    Route::post('/admin/store_intensive_course', [AdminController::class, 'storeIntensiveCourse'])
        ->middleware(['auth:admin'])->name('admin.storeIntensiveCourse');

    Route::get('/admin/edit_intensive_course/{course_id}', [AdminController::class, 'editIntensiveCourse'])
        ->middleware(['auth:admin'])->name('admin.editIntensiveCourse');

    Route::post('/admin/update_intensive_course', [AdminController::class, 'updateIntensiveCourse'])
        ->middleware(['auth:admin'])->name('admin.updateIntensiveCourse');

    Route::get('/admin/delete_intensive_course/{course_id}', [AdminController::class, 'deleteIntensiveCourse'])
        ->middleware(['auth:admin'])->name('admin.deleteIntensiveCourse');

    Route::get('/admin/all_languages_courses', [AdminController::class, 'allLanguageCourses'])
        ->middleware(['auth:admin'])->name('admin.allLanguagesCourses');

    Route::get('/admin/add_language_course', [AdminController::class, 'addLanguageCourse'])
        ->middleware(['auth:admin'])->name('admin.addLanguageCourse');

    Route::post('/admin/store_language_course', [AdminController::class, 'storeLanguageCourse'])
        ->middleware(['auth:admin'])->name('admin.storeLanguageCourse');

    Route::get('/admin/edit_language_course/{course_id}', [AdminController::class, 'editLanguageCourse'])
        ->middleware(['auth:admin'])->name('admin.editLanguageCourse');

    Route::post('/admin/update_language_course', [AdminController::class, 'updateLanguageCourse'])
        ->middleware(['auth:admin'])->name('admin.updateLanguageCourse');

    Route::get('/admin/delete_language_course/{course_id}', [AdminController::class, 'deleteLanguageCourse'])
        ->middleware(['auth:admin'])->name('admin.deleteLanguageCourse');

    Route::post('/admin/active_or_disable_course/{courseType}/{course_id}', [AdminController::class, 'activeOrDisableCourse'])
        ->middleware(['auth:admin'])->name('admin.activeOrDisableCourse');

    Route::post('/admin/search_by_student_name', [AdminController::class, 'searchByStudentName'])
        ->middleware(['auth:admin'])->name('admin.searchByStudentName');

    Route::post('/admin/add_student_to_course', [AdminController::class, 'addStudentToCourse'])
        ->middleware(['auth:admin'])->name('admin.addStudentToCourse');

    Route::get('/admin/delete_student_from_course', [AdminController::class, 'deleteStudentFromCourse'])
        ->middleware(['auth:admin'])->name('admin.deleteStudentFromCourse');

    Route::post('/admin/active_or_disable_enrollment', [AdminController::class, 'activeOrDisableEnrollment'])
        ->middleware(['auth:admin'])->name('admin.activeOrDisableEnrollment');

    Route::post('/admin/filter_student_by_course', [AdminController::class, 'ajaxFilterStudentByCourse'])
        ->middleware(['auth:admin'])->name('admin.ajaxFilterStudentByCourse');

    Route::post('/admin/filter_instructor_by_course', [AdminController::class, 'ajaxFilterInstructorByCourse'])
        ->middleware(['auth:admin'])->name('admin.ajaxFilterInstructorByCourse');


    Route::post('/admin/filter_course', [AdminController::class, 'ajaxFilterCourse'])
        ->middleware(['auth:admin'])->name('admin.ajaxFilterCourse');

    Route::get('/admin/all_students', [AdminController::class, 'allStudents'])
        ->middleware(['auth:admin'])->name('admin.allStudents');

    Route::get('/admin/add_student', [AdminController::class, 'addStudent'])
        ->middleware(['auth:admin'])->name('admin.addStudent');

    Route::post('/admin/store_student', [AdminController::class, 'storeStudent'])
        ->middleware(['auth:admin'])->name('admin.storeStudent');

    Route::get('/admin/student_profile/{student_id}', [AdminController::class, 'studentProfile'])
        ->middleware(['auth:admin'])->name('admin.studentProfile');

    Route::get('/admin/edit_student_profile/{student_id}', [AdminController::class, 'editStudentProfile'])
        ->middleware(['auth:admin'])->name('admin.editStudentProfile');

    Route::post('/admin/update_student_profile', [AdminController::class, 'updateStudentProfile'])
        ->middleware(['auth:admin'])->name('admin.updateStudentProfile');

    Route::get('/admin/delete_student/{student_id}', [AdminController::class, 'deleteStudent'])
        ->middleware(['auth:admin'])->name('admin.deleteStudent');

    Route::post('/admin/active_or_disable_student/{student_id}', [AdminController::class, 'activeOrDisableStudent'])
        ->middleware(['auth:admin'])->name('admin.activeOrDisableStudent');

    Route::get('/admin/all_instructor', [AdminController::class, 'allInstructor'])
        ->middleware(['auth:admin'])->name('admin.allInstructor');

    Route::get('/admin/add_instructor', [AdminController::class, 'addInstructor'])
        ->middleware(['auth:admin'])->name('admin.addInstructor');

    Route::post('/admin/store_instructor', [AdminController::class, 'storeInstructor'])
        ->middleware(['auth:admin'])->name('admin.storeInstructor');

    Route::get('/admin/instructor_profile/{instructor_id}', [AdminController::class, 'instructorProfile'])
        ->middleware(['auth:admin'])->name('admin.instructorProfile');

    Route::get('/admin/edit_instructor_profile/{instructor_id}', [AdminController::class, 'editInstructorProfile'])
        ->middleware(['auth:admin'])->name('admin.editInstructorProfile');

    Route::post('/admin/update_instructor_profile', [AdminController::class, 'updateInstructorProfile'])
        ->middleware(['auth:admin'])->name('admin.updateInstructorProfile');

    Route::get('/admin/delete_instructor/{instructor_id}', [AdminController::class, 'deleteInstructor'])
        ->middleware(['auth:admin'])->name('admin.deleteInstructor');

    Route::post('/admin/active_or_disable_instructor/{instructor_id}', [AdminController::class, 'activeOrDisableInstructor'])
        ->middleware(['auth:admin'])->name('admin.activeOrDisableInstructor');

    Route::get('/admin/all_contact_us', [AdminController::class, 'allContactUs'])
        ->middleware(['auth:admin'])->name('admin.allContactUs');

    Route::get('/admin/delete_contact_us/{contact_us_id}', [AdminController::class, 'deleteContactUs'])
        ->middleware(['auth:admin'])->name('admin.deleteContactUs');

    Route::get('/admin/reply_contact_us/{contact_us_id}', [AdminController::class, 'replyContactUs'])
        ->middleware(['auth:admin'])->name('admin.replyContactUs');

    Route::post('/admin/reply', [AdminController::class, 'reply'])
        ->middleware(['auth:admin'])->name('admin.reply');

    Route::get('/admin/all_subscriptions', [AdminController::class, 'allSubscriptions'])
        ->middleware(['auth:admin'])->name('admin.all_subscriptions');

    Route::get('/admin/subscription_panel/{subscription_id}', [AdminController::class, 'subscriptionPanel'])
        ->middleware(['auth:admin'])->name('admin.subscriptionPanel');

    Route::get('/admin/subscription_notification/{subscription_id}', [AdminController::class, 'subscriptionPanelFromNotification'])
        ->middleware(['auth:admin'])->name('admin.subscriptionPanelFromNotification');

    Route::post('/admin/approve_subscription', [AdminController::class, 'approveSubscription'])
        ->middleware(['auth:admin'])->name('admin.approveSubscription');

    Route::post('/admin/filter_subscription_by_course', [AdminController::class, 'ajaxFilterSubscriptionByCourse'])
        ->middleware(['auth:admin'])->name('admin.ajaxFilterSubscriptionByCourse');

    Route::get('/admin/financial_panel', [AdminController::class, 'financialPanel'])
        ->middleware(['auth:admin'])->name('admin.financialPanel');

    Route::get('/admin/instructor_financial', [AdminController::class, 'instructorFinancial'])
        ->middleware(['auth:admin'])->name('admin.instructorFinancial');

    Route::get('/admin/courses_financials', [AdminController::class, 'coursesFinancials'])
        ->middleware(['auth:admin'])->name('admin.coursesFinancials');

    Route::get('/admin/languages_courses_financials', [AdminController::class, 'languagesCoursesFinancials'])
        ->middleware(['auth:admin'])->name('admin.languagesCoursesFinancials');

    Route::get('/admin/supporting_courses_financials', [AdminController::class, 'supportingCoursesFinancials'])
        ->middleware(['auth:admin'])->name('admin.supportingCoursesFinancials');

    Route::get('/admin/intensive_courses_financials', [AdminController::class, 'intensiveCoursesFinancials'])
        ->middleware(['auth:admin'])->name('admin.intensiveCoursesFinancials');

    Route::get('/admin/notification', [AdminController::class, 'notification'])
        ->middleware(['auth:admin'])->name('admin.notification');

    Route::post('/admin/store_notification', [AdminController::class, 'storeNotification'])
        ->middleware(['auth:admin'])->name('admin.storeNotification');

    Route::get('/admin/all_subscription_codes', [AdminController::class, 'allSubscriptionCodes'])
        ->middleware(['auth:admin'])->name('admin.allSubscriptionCodes');

    Route::get('/admin/create_subscription_code', [AdminController::class, 'createSubscriptionCode'])
        ->middleware(['auth:admin'])->name('admin.createSubscriptionCode');

    Route::post('/admin/store_subscription_code', [AdminController::class, 'storeSubscriptionCode'])
        ->middleware(['auth:admin'])->name('admin.storeSubscriptionCode');

    Route::post('/admin/ajax_filter_subscription_codes', [AdminController::class, 'ajaxFilterSubscriptionCodes'])
        ->middleware(['auth:admin'])->name('admin.ajaxFilterSubscriptionCodes');

    Route::get('/admin/all_ccp_subscription', [SubscriptionCCPController::class, 'allCCPSubscription'])
        ->middleware(['auth:admin'])->name('admin.allCCPSubscription');

    Route::get('/admin/delete_ccp_subscription/{ccp_subscription_id}', [SubscriptionCCPController::class, 'deleteCCPSubscription'])
        ->middleware(['auth:admin'])->name('admin.deleteCCPSubscription');

    Route::post('/admin/add_balance', [AdminController::class, 'addBalance'])
        ->middleware(['auth:admin'])->name('admin.addBalance');

    Route::get('/admin/all_groups', [GroupController::class, 'allGroups'])
        ->middleware(['auth:admin'])->name('admin.allGroups');

    Route::get('/admin/add_group', [GroupController::class, 'addGroup'])
        ->middleware(['auth:admin'])->name('admin.addGroup');

    Route::post('/admin/store_group', [GroupController::class, 'storeGroup'])
        ->middleware(['auth:admin'])->name('admin.storeGroup');

    Route::get('/admin/edit_group/{group_id}', [GroupController::class, 'editGroup'])
        ->middleware(['auth:admin'])->name('admin.editGroup');

    Route::post('/admin/update_group/', [GroupController::class, 'updateGroup'])
        ->middleware(['auth:admin'])->name('admin.updateGroup');

    Route::get('/admin/delete_group/{group_id}', [GroupController::class, 'deleteGroup'])
        ->middleware(['auth:admin'])->name('admin.deleteGroup');

    Route::post('/admin/ajaxFilter_group/', [GroupController::class, 'ajaxFilterGroup'])
        ->middleware(['auth:admin'])->name('admin.ajaxFilterGroup');

//################################## Route Static page #######################################################

    Route::get('/contact_us', [ContactController::class, 'create'])->name('contact.create');

    Route::post('/contact_create', [ContactController::class, 'store'])->name('contact.store');

    Route::get('/terms&privacy', function () {
        return view('website.terms&privacy');
    })->name('terms&privacy');

    Route::get('/about_us', function () {
        return view('website.aboutUs');
    })->name('aboutUs');

//################################## Supporting Courses #########################################################

    Route::get('/supporting_courses', [SupportingCourseController::class, 'index'])->name('all_supporting_course.index');

    Route::get('/supporting_courses/details/{slug}', [SupportingCourseController::class, 'corseDetails'])->name('supporting_course.details');

    Route::get('/request_enroll', [WaitingListController::class, 'store'])
        ->middleware('auth')->name('request.enroll');

//################################## Languages Courses ############################################

    Route::get('/languages_courses', [LanguageCourseController::class, 'index'])->name('all_languages_courses.index');

    Route::get('/languages_courses/details/{slug}', [LanguageCourseController::class, 'corseDetails'])->name('languages_course.details');

##################################### Intensive Courses ############################################

    Route::get('/intensive_courses', [IntensiveCourseController::class, 'index'])->name('all_intensive_courses.index');

    Route::get('/intensive_courses/details/{slug}', [IntensiveCourseController::class, 'corseDetails'])->name('intensive_course.details');


//################################## Filter ##################################################

    Route::get('/levelFilter/{courses}/{level}', [FilterController::class, 'leveFilter'])->name('level.filter');
    Route::get('/branchFilter/{courses}/{branch}', [FilterController::class, 'branchFilter'])->name('branch.filter');
    Route::get('/yearFilter/{courses}/{year}', [FilterController::class, 'yearFilter'])->name('yearFilter');

    Route::post('/course_filter', [FilterController::class, 'courseFilter'])->name('courseFilter');


//################################## Payments ##################################################

    Route::get('/student/subscription', [ChargilyController::class, 'subscription'])
        ->middleware(['auth'])->name('student.subscription');

    Route::post('student/e-pay', [ChargilyController::class, 'ePay'])->name('student.ePay');
    Route::get('student/backUrl', [ChargilyController::class, 'backUrl'])->name('student.backUrl');
    Route::post('/webhook', [ChargilyController::class, 'webhook'])->name('student.webhook');

//    Route::get('student/successfully', [ChargilyController::class, 'paymentsSuccessfully'])
//        ->middleware('auth')->name('payments.successfully');

//################################## Group Routing ####################################################

    Route::get('/testgroup', [GroupController::class, 'test'])->name('test.group');


//################################## Waiting List ################################################

    Route::get('/show_waitingList', [WaitingListController::class, 'showWaitingList'])
        ->middleware('auth')->name('show.waitingList');

    Route::get('/accept', [WaitingListController::class, 'accept'])
        ->middleware('auth')->name('accept');

//################################## BBB Routes ################################################

    Route::get('/instructor/create_session', [BBBController::class, 'createSession'])
        ->name('instructor.createSession');

    Route::post('/instructor/create_meeting', [BBBController::class, 'storeMeeting'])
        ->name('instructor.storeMeeting');

    Route::get('/instructor/start_meeting', [BBBController::class, 'startMeeting'])
        ->name('instructor.startMeeting');

    Route::get('/refresh-view', function () {
        return view('website.instructor.myCourses');
    });

    Route::get('/student/start_specific_meeting', [BBBController::class, 'startSpecificMeeting'])
        ->name('instructor.startSpecificMeeting');

    Route::get('/student/join_meeting/{session_id}', [BBBController::class, 'studentJoinMeeting'])
        ->name('student.joinMeeting');

    Route::get('/student/recorde_link/{meeting_id}', [BBBController::class, 'recordeLink'])
        ->name('student.recordeLink');

    Route::get('/instructor/end_meeting/', [BBBController::class, 'endMeeting'])
        ->name('instructor.endMeeting');

    Route::get('/instructor/logout_meeting', [BBBController::class, 'logoutMeeting'])
        ->name('instructor.logoutMeeting');

//################################## Courses Forms Testing ################################################

    Route::get('/testForm', [SupportingCourseController::class, 'create'])->name('testForm');
    Route::post('/testFormstore', [SupportingCourseController::class, 'store'])->name('testFormStore');

    Route::get('/testFormLanguages', [LanguageCourseController::class, 'create'])->name('testFormLanguages');
    Route::post('/testFormLanguagesstore', [LanguageCourseController::class, 'store'])->name('testFormLanguagesStore');

    Route::get('/testFormIntensive', [IntensiveCourseController::class, 'create'])->name('testFormIntensive');
    Route::post('/testFormIntensivestore', [IntensiveCourseController::class, 'store'])->name('testFormIntensiveStore');

    require __DIR__ . '/auth.php';

});
