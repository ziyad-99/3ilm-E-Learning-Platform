<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Enrollment;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Instructor;
use App\Models\SubscriptionCCP;
use App\Models\SubscriptionCode;
use App\Models\User;
use App\Models\WaitingList;
use App\Notifications\ApproveSubscription;
use App\Notifications\SpecificInstructor;
use App\Notifications\SpecificStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;

//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function index()
    {
        $admins_number = Admin::all()->count();
        $instructor_number = Instructor::all()->count();
        $student_number = User::all()->count();
        $courses_number = SupportingCourse::all()->count() + IntensiveCourse::all()->count() + LanguageCourse::all()->count();
        $requests_enrollment = WaitingList::where('status', 0)->get()->count();
        $all_enrollments = Enrollment::all()->count();

        return view('website.admin.dashboard', compact(
            'admins_number',
            'instructor_number',
            'student_number',
            'courses_number',
            'requests_enrollment',
            'all_enrollments',
        ));
    }

    //########################################  Admin functions #########################################################

    public function allAdmins()
    {
        $admins = Admin::paginate(6);

        return view('website.admin.admin.allAdmins', compact('admins'));
    }

    public function addAdmin()
    {
        $roles = Role::all();
        return view('website.admin.admin.addAdmin', compact('roles'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'phone' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'state' => $request->state,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        //assign the role to the new admin
        $admin->assignRole($request->role);

        return back()->with('message_add_new_admin', trans('website/messages.Your have added a new admin'));
    }

    public function editAdmin($admin_id)
    {
        $admin = Admin::find($admin_id);
        $roles = Role::all();
        return view('website.admin.admin.editAdmin', compact('admin', 'roles'));
    }

    public function updateAdmin(Request $request)
    {
        $admin = Admin::find($request->admin_id);

        //remove the old role to the new admin
        $admin->removeRole($admin->role);

        //assign the new role to the new admin
        $admin->assignRole($request->role);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->state = $request->state;
        $admin->role = $request->role;

        if ($admin->password != $request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->back()->with('message_add_new_admin', trans('website/messages.Your have update this admin'));
    }

    public function adminDelete(Request $request)
    {
        $admin = Admin::find($request->admin_id);
        $admin->delete();

        return redirect()->back()->with('message_admin_delete', trans('website/messages.you have delete Admin'));
    }


    //########################################  Courses functions #########################################################

    public function coursesPanel()
    {
        return view('website.admin.coures.couressPanel');
    }

    public function allSupportingCourses()
    {
        $sup_courses = SupportingCourse::paginate(10);

        return view('website.admin.coures.supportingCourse.allSupportingCourse', compact('sup_courses'));
    }

    public function addSupportingCourse()
    {
        $instructors = Instructor::all();
        return view('website.admin.coures.supportingCourse.addSupportingCoures', compact('instructors'));
    }

    public function storeSupportingCourse(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'title_fr' => 'required',

            'instructor_id' => 'required|exists:instructors,id', // Assuming instructors table
            'paymentType' => 'required', // Ensures a payment type is selected
            'percentage' => 'required_if:paymentType,percentage|min:0|max:100', // Required if payment type is percentage
            'perSession' => 'required_if:paymentType,perSession', // Required if payment type is perSession

            'level' => 'required',
            'high_school_year' => 'required_if:level,High School',
            'secondary_school_year' => 'required_if:level,Secondary School',
            'primary_school_year' => 'required_if:level,Primary School',
            'numberSessions' => 'required|integer|min:1',
            'frameTime' => 'required|numeric|min:0.5',
//            'branch_en' => 'required',
//            'branch_ar' => 'required',
//            'branch_fr' => 'required',
            'price' => 'required|numeric|min:0',
            'startDate' => 'required|date',
            'status' => 'required|in:0,1',
            'description_en' => 'required',
            'description_fr' => 'required',
            'description_ar' => 'required',
            'img' => 'image|mimes:jpeg,png', // Example image validation (optional)
        ]);

        $course = new SupportingCourse();

        if ($request->level === 'High School') {
            $levelEn = 'High School'; // Generate English level
            $levelFr = 'Lycée'; // Generate French level
            $levelAr = 'ثانوي'; // Arabic level
        }
        if ($request->level === 'Secondary School') {
            $levelEn = 'Secondary School'; // Generate English level
            $levelFr = 'école secondaire'; // Generate French level
            $levelAr = 'متوسط'; // Arabic level
        }
        if ($request->level === 'Primary School') {
            $levelEn = 'Primary School'; // Generate English level
            $levelFr = 'école primaire'; // Generate French level
            $levelAr = 'إبتدائي'; // Arabic level
        }

        //prepare the branch translation
        if ($request->has('branch')) {
            $branch = $request->branch;
            switch ($branch) {
                case "Common Stem Science and Technology":
                    $branch_en = $branch;
                    $branch_ar = "جذع مشترك علوم و تكنولوجيا";
                    $branch_fr = "Science et technologie de la tige commune";
                    break;
                case "Common Trunk Arabic Literature":
                    $branch_en = $branch;
                    $branch_ar = "جذع مشترك أدب عربي";
                    $branch_fr = "Tronc commun Littérature arabe";
                    break;
                case "Experimental Science":
                    $branch_en = $branch;
                    $branch_ar = "علوم تجريبية";
                    $branch_fr = "Sciences Expérimentales";
                    break;
                case "Mathematics Technician":
                    $branch_en = $branch;
                    $branch_ar = "تقني رياضي";
                    $branch_fr = "Technicien en Mathématiques";
                    break;
                case "Mathematics":
                    $branch_en = $branch;
                    $branch_ar = "رياضيات";
                    $branch_fr = "Mathématiques";
                    break;
                case "Management and Economics":
                    $branch_en = $branch;
                    $branch_ar = "تسيير و إقتصاد";
                    $branch_fr = "Gestion et Economie";
                    break;
                case "Foreign Languages":
                    $branch_en = $branch;
                    $branch_ar = "لغات أجنبية";
                    $branch_fr = "Langue étrangère";
                    break;
                case "Literature and Philosophy":
                    $branch_en = $branch;
                    $branch_ar = "أداب و فلسفة";
                    $branch_fr = "Littérature et Philosophie";
                    break;
                default:
                    return $branch == null;
            }
        }

        //store photo in folder
        if ($request->hasFile('img')) {
            $file_extention = $request->img->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/courses';

            $request->img->move($path, $file_name);
            $course->img = $file_name;
        }

        $course->title = ['en' => $request->title_en, 'ar' => $request->title_ar, 'fr' => $request->title_fr];
        $course->status = $request->status;
        $course->description = ['en' => $request->description_en, 'ar' => $request->description_ar, 'fr' => $request->description_fr];

        $course->instructor_id = $request->instructor_id;

        $course->paymentType = $request->paymentType;
        $paymentType = $request->paymentType;
        if ($paymentType == 'percentage') {
            $course->percentage = $request->percentage;
            $course->perSession = null;
        } else {
            $course->perSession = $request->perSession;
            $course->percentage = null;
        }

        // Convert the input (seconds to hours) to a time format
        $frameTime = Carbon::createFromTimestampUTC($request->frameTime * 3600)->format('H:i:s');
        $course->frameTime = $frameTime;

        $course->startDate = $request->startDate;
        $course->numberSessions = $request->numberSessions;
        $course->price = $request->price;
        $course->level = ['en' => $levelEn, 'ar' => $levelAr, 'fr' => $levelFr];

        if ($request->has('branch'))
            $course->branch = ['en' => $branch_en, 'ar' => $branch_ar, 'fr' => $branch_fr];

        $uniqueIdentifier = uniqid();
        $course->slug = Str::slug($request->title_en . $uniqueIdentifier);

        if ($request->level === 'High School')
            $course->year = $request->high_school_year;

        if ($request->level === 'Secondary School')
            $course->year = $request->secondary_school_year;

        if ($request->level === 'Primary School')
            $course->year = $request->primary_school_year;

        $course->save();

        return back()->with('message_add_new_admin', trans('website/messages.Your have added a new Supporting Course'));
    }

    public function editSupportingCourse(Request $request)
    {
        $instructors = Instructor::all();

        $sup_course = SupportingCourse::find($request->course_id);

        return view('website.admin.coures.supportingCourse.editSupportingCoures', compact('instructors', 'sup_course'));
    }

    public function updateSupportingCourse(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',

            'instructor_id' => 'required',
            'paymentType' => 'required', // Ensures a payment type is selected
            'percentage' => 'required_if:paymentType,percentage|min:0|max:100', // Required if payment type is percentage
            'perSession' => 'required_if:paymentType,perSession', // Required if payment type is perSession

            'level' => 'required',
            'numberSessions' => 'required|numeric|min:1',
            'frameTime' => 'required|numeric|min:0.5',
//            'branch_en' => 'required',
//            'branch_ar' => 'required',
//            'branch_fr' => 'required',
            'price' => 'required|numeric|min:0',
            'startDate' => 'required|date',
            'status' => 'required|in:0,1',
            'description_en' => 'required',
            'description_fr' => 'required',
            'description_ar' => 'required',
            'img' => 'image|mimes:jpeg,png', // Example image validation (optional)
        ]);

        $course = SupportingCourse::find($request->sup_course_id);

        if ($request->level === 'High School') {
            $levelEn = 'High School'; // Generate English level
            $levelFr = 'Lycée'; // Generate French level
            $levelAr = 'ثانوي'; // Arabic level
        }
        if ($request->level === 'Secondary School') {
            $levelEn = 'Secondary School'; // Generate English level
            $levelFr = 'école secondaire'; // Generate French level
            $levelAr = 'متوسط'; // Arabic level
        }
        if ($request->level === 'Primary School') {
            $levelEn = 'Primary School'; // Generate English level
            $levelFr = 'école primaire'; // Generate French level
            $levelAr = 'إبتدائي'; // Arabic level
        }

        //prepare the branch translation
        if ($request->has('branch')) {
            $branch = $request->branch;
            switch ($branch) {
                case "Common Stem Science and Technology":
                    $branch_en = $branch;
                    $branch_ar = "جذع مشترك علوم و تكنولوجيا";
                    $branch_fr = "Science et technologie de la tige commune";
                    break;
                case "Common Trunk Arabic Literature":
                    $branch_en = $branch;
                    $branch_ar = "جذع مشترك أدب عربي";
                    $branch_fr = "Tronc commun Littérature arabe";
                    break;
                case "Experimental Science":
                    $branch_en = $branch;
                    $branch_ar = "علوم تجريبية";
                    $branch_fr = "Sciences Expérimentales";
                    break;
                case "Mathematics Technician":
                    $branch_en = $branch;
                    $branch_ar = "تقني رياضي";
                    $branch_fr = "Technicien en Mathématiques";
                    break;
                case "Mathematics":
                    $branch_en = $branch;
                    $branch_ar = "رياضيات";
                    $branch_fr = "Mathématiques";
                    break;
                case "Management and Economics":
                    $branch_en = $branch;
                    $branch_ar = "تسيير و إقتصاد";
                    $branch_fr = "Gestion et Economie";
                    break;
                case "Foreign Languages":
                    $branch_en = $branch;
                    $branch_ar = "لغات أجنبية";
                    $branch_fr = "Langue étrangère";
                    break;
                case "Literature and Philosophy":
                    $branch_en = $branch;
                    $branch_ar = "أداب و فلسفة";
                    $branch_fr = "Littérature et Philosophie";
                    break;
                default:
                    return $branch == null;
            }
        }

        //save photo in folder
        if ($request->hasFile('img')) {
            $file_extention = $request->img->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/courses';

            $request->img->move($path, $file_name);
            $course->img = $file_name;
        }

        $course->title = ['en' => $request->title_en, 'ar' => $request->title_ar, 'fr' => $request->title_fr];
        $course->description = ['en' => $request->description_en, 'ar' => $request->description_ar, 'fr' => $request->description_fr];

        $course->instructor_id = $request->instructor_id;
        $course->paymentType = $request->paymentType;
        $paymentType = $request->paymentType;
        if ($paymentType == 'percentage') {
            $course->percentage = $request->percentage;
            $course->perSession = null;
        } else {
            $course->perSession = $request->perSession;
            $course->percentage = null;
        }

        $course->status = $request->status;

        // Convert the input (seconds to hours) to a time format
        $frameTime = Carbon::createFromTimestampUTC($request->frameTime * 3600)->format('H:i:s');
        $course->frameTime = $frameTime;

//        $course->frameTime = $request->frameTime;
        $course->startDate = $request->startDate;
        $course->numberSessions = $request->numberSessions;
        $course->price = $request->price;
        $course->level = ['en' => $levelEn, 'ar' => $levelAr, 'fr' => $levelFr];

        if ($request->level === 'High School')
            $course->year = $request->high_school_year;

        if ($request->level === 'Secondary School')
            $course->year = $request->secondary_school_year;

        if ($request->level === 'Primary School')
            $course->year = $request->primary_school_year;

//        $course->branch = ['en' => $request->branch_en, 'ar' => $request->branch_ar, 'fr' => $request->branch_fr];

        if ($request->has('branch'))
            $course->branch = ['en' => $branch_en, 'ar' => $branch_ar, 'fr' => $branch_fr];
        $course->slug = Str::slug($request->title_en);

        $course->save();

        return redirect()->route('admin.allSupportingCourses')->with('success', trans('website/messages.Your have updated Supporting Course'));
    }

    public function deleteSupportingCourse(Request $request)
    {
        $sup_course = SupportingCourse::find($request->course_id);

        //delete groups
        $sup_course->groups()->delete();

        //delete enrollments
        $sup_course->enrollments()->delete();

        //delete waitingList
        $sup_course->waitingList()->delete();

        File::delete('images/courses/' . $sup_course->img);
        $sup_course->delete();

        return redirect()->route('admin.allSupportingCourses')->with('warning', trans('website/messages.Your have delete Supporting Course'));
    }

    public function allIntensiveCourses()
    {
        $inten_courses = IntensiveCourse::paginate(10);

        return view('website.admin.coures.intensiveCourse.allIntensiveCourse', compact('inten_courses'));
    }

    public function addIntensiveCourse()
    {
        $instructors = Instructor::all();
        return view('website.admin.coures.intensiveCourse.addIntensiveCoures', compact('instructors'));
    }

    public function storeIntensiveCourse(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'title_fr' => 'required',

            'instructor_id' => 'required',
            'paymentType' => 'required', // Ensures a payment type is selected
            'percentage' => 'required_if:paymentType,percentage|min:0|max:100', // Required if payment type is percentage
            'perSession' => 'required_if:paymentType,perSession', // Required if payment type is perSession

            'level' => 'required',
            'numberSessions' => 'required|numeric|min:1',
            'frameTime' => 'required|numeric|min:0.5',
            'price' => 'required|numeric|min:0',
            'startDate' => 'required|date',
            'status' => 'required|in:0,1',
            'description_en' => 'required',
            'description_fr' => 'required',
            'description_ar' => 'required',
            'img' => 'image|mimes:jpeg,png', // Example image validation (optional)
        ]);

        $course = new IntensiveCourse();

        if ($request->level === 'Beginner') {
            $levelEn = 'Beginner'; // Generate English level
            $levelFr = 'débutant'; // Generate French level
            $levelAr = 'مبتدئ'; // Arabic level
        }
        if ($request->level === 'Intermediate') {
            $levelEn = 'Intermediate'; // Generate English level
            $levelFr = 'intermédiaire'; // Generate French level
            $levelAr = 'متوسط'; // Arabic level
        }
        if ($request->level === 'Advanced') {
            $levelEn = 'Advanced'; // Generate English level
            $levelFr = 'avancé'; // Generate French level
            $levelAr = 'محترف'; // Arabic level
        }

        //save photo in folder
        if ($request->hasFile('img')) {
            $file_extention = $request->img->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/courses';

            $request->img->move($path, $file_name);
            $course->img = $file_name;
        }

        $course->title = ['en' => $request->title_en, 'ar' => $request->title_ar, 'fr' => $request->title_fr];
        $course->description = ['en' => $request->description_en, 'ar' => $request->description_ar, 'fr' => $request->description_fr];

        $course->instructor_id = $request->instructor_id;
        $course->paymentType = $request->paymentType;
        $paymentType = $request->paymentType;
        if ($paymentType == 'percentage') {
            $course->percentage = $request->percentage;
            $course->perSession = null;
        } else {
            $course->perSession = $request->perSession;
            $course->percentage = null;
        }

        $course->status = $request->status;

        // Convert the input (seconds to hours) to a time format
        $frameTime = Carbon::createFromTimestampUTC($request->frameTime * 3600)->format('H:i:s');
        $course->frameTime = $frameTime;

        $course->startDate = $request->startDate;
        $course->numberSessions = $request->numberSessions;
        $course->price = $request->price;
        $course->level = ['en' => $levelEn, 'ar' => $levelAr, 'fr' => $levelFr];

        $uniqueIdentifier = uniqid();
        $course->slug = Str::slug($request->title_en . $uniqueIdentifier);

        $course->save();

        return back()->with('success', trans('website/messages.Your have added a new Intensive Course'));
    }

    public function editIntensiveCourse(Request $request)
    {
        $instructors = Instructor::all();

        $inten_course = IntensiveCourse::find($request->course_id);


        return view('website.admin.coures.intensiveCourse.editIntensiveCoures', compact('instructors', 'inten_course'));
    }

    public function updateIntensiveCourse(Request $request)
    {
        $request->validate([
            'inten_course_id' => 'required|numeric', // Validate the hidden input
            'title_en' => 'required',
            'title_ar' => 'required',
            'title_fr' => 'required',

            'instructor_id' => 'required|exists:instructors,id', // Make sure instructor_id exists in the 'instructors' table
            'paymentType' => 'required', // Ensures a payment type is selected
            'percentage' => 'required_if:paymentType,percentage|min:0|max:100', // Required if payment type is percentage
            'perSession' => 'required_if:paymentType,perSession', // Required if payment type is perSession

            'level' => 'required|in:Beginner,Intermediate,Advanced', // Validate against predefined options
            'numberSessions' => 'required|numeric|min:1',
            'frameTime' => 'required|numeric|min:0.5',
            'price' => 'required|numeric|min:0',
            'startDate' => 'required|date',
            'status' => 'required|in:0,1', // Assuming status can only be 0 or 1
            'description_en' => 'required',
            'description_ar' => 'required',
            'description_fr' => 'required',
            'img' => 'image|mimes:jpeg,png|max:2048', // Validate image format and size
        ]);

        $course = IntensiveCourse::find($request->inten_course_id);

        if ($request->level === 'Beginner') {
            $levelEn = 'Beginner'; // Generate English level
            $levelFr = 'débutant'; // Generate French level
            $levelAr = 'مبتدئ'; // Arabic level
        }
        if ($request->level === 'Intermediate') {
            $levelEn = 'Intermediate'; // Generate English level
            $levelFr = 'intermédiaire'; // Generate French level
            $levelAr = 'متوسط'; // Arabic level
        }
        if ($request->level === 'Advanced') {
            $levelEn = 'Advanced'; // Generate English level
            $levelFr = 'avancé'; // Generate French level
            $levelAr = 'محترف'; // Arabic level
        }

        //save photo in folder
        if ($request->hasFile('img')) {
            $file_extention = $request->img->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/courses';

            $request->img->move($path, $file_name);
            $course->img = $file_name;
        }

        $course->title = ['en' => $request->title_en, 'ar' => $request->title_ar, 'fr' => $request->title_fr];
        $course->description = ['en' => $request->description_en, 'ar' => $request->description_ar, 'fr' => $request->description_fr];

        $course->instructor_id = $request->instructor_id;
        $course->paymentType = $request->paymentType;
        $paymentType = $request->paymentType;
        if ($paymentType == 'percentage') {
            $course->percentage = $request->percentage;
            $course->perSession = null;
        } else {
            $course->perSession = $request->perSession;
            $course->percentage = null;
        }

        $course->status = $request->status;

        // Convert the input (seconds to hours) to a time format
        $frameTime = Carbon::createFromTimestampUTC($request->frameTime * 3600)->format('H:i:s');
        $course->frameTime = $frameTime;

        $course->startDate = $request->startDate;
        $course->numberSessions = $request->numberSessions;
        $course->price = $request->price;
        $course->level = ['en' => $levelEn, 'ar' => $levelAr, 'fr' => $levelFr];
        $course->slug = Str::slug($request->title_en);

        $course->save();

        return redirect()->route('admin.allIntensiveCourses')->with('success', trans('website/messages.Your have update intensive Course'));
    }

    public function deleteIntensiveCourse(Request $request)
    {
        $inten_course = IntensiveCourse::find($request->course_id);

        //delete groups
        $inten_course->groups()->delete();

        //delete enrollments
        $inten_course->enrollments()->delete();

        //delete waitingList
        $inten_course->waitingList()->delete();

        File::delete('images/courses/' . $inten_course->img);
        $inten_course->delete();

        return redirect()->route('admin.allIntensiveCourses')->with('warning', trans('website/messages.Your have delete intensive Courses'));
    }

    public function allLanguageCourses()
    {
        $lang_courses = LanguageCourse::paginate(10);

        return view('website.admin.coures.languagesCourse.allLanguagesCourse', compact('lang_courses'));
    }

    public function addLanguageCourse()
    {
        $instructors = Instructor::all();
        return view('website.admin.coures.languagesCourse.addLanguagesCoures', compact('instructors'));
    }

    public function storeLanguageCourse(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'title_fr' => 'required',
            'instructor_id' => 'required',
            'paymentType' => 'required', // Ensures a payment type is selected
            'percentage' => 'required_if:paymentType,percentage|min:0|max:100', // Required if payment type is percentage
            'perSession' => 'required_if:paymentType,perSession', // Required if payment type is perSession

            'level' => 'required',
            'numberSessions' => 'required|numeric|min:1',
            'frameTime' => 'required|numeric|min:0.5',
            'price' => 'required|numeric|min:0',
            'startDate' => 'required|date',
            'status' => 'required|in:0,1',
            'description_en' => 'required',
            'description_fr' => 'required',
            'description_ar' => 'required',
            'img' => 'image|mimes:jpeg,png', // You can customize the image validation rules
        ]);

        $course = new LanguageCourse();


        if ($request->level === 'Beginner') {
            $levelEn = 'Beginner'; // Generate English level
            $levelFr = 'débutant'; // Generate French level
            $levelAr = 'مبتدئ'; // Arabic level
        }
        if ($request->level === 'Intermediate') {
            $levelEn = 'Intermediate'; // Generate English level
            $levelFr = 'intermédiaire'; // Generate French level
            $levelAr = 'متوسط'; // Arabic level
        }
        if ($request->level === 'Advanced') {
            $levelEn = 'Advanced'; // Generate English level
            $levelFr = 'avancé'; // Generate French level
            $levelAr = 'محترف'; // Arabic level
        }

        //save photo in folder
        if ($request->hasFile('img')) {
            $file_extention = $request->img->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/courses';

            $request->img->move($path, $file_name);
            $course->img = $file_name;
        }

        $course->title = ['en' => $request->title_en, 'ar' => $request->title_ar, 'fr' => $request->title_fr];
        $course->description = ['en' => $request->description_en, 'ar' => $request->description_ar, 'fr' => $request->description_fr];

        $course->instructor_id = $request->instructor_id;
        $course->paymentType = $request->paymentType;
        $paymentType = $request->paymentType;
        if ($paymentType == 'percentage') {
            $course->percentage = $request->percentage;
            $course->perSession = null;
        } else {
            $course->perSession = $request->perSession;
            $course->percentage = null;
        }

        $course->status = $request->status;

        // Convert the input (seconds to hours) to a time format
        $frameTime = Carbon::createFromTimestampUTC($request->frameTime * 3600)->format('H:i:s');
        $course->frameTime = $frameTime;

        $course->startDate = $request->startDate;
        $course->numberSessions = $request->numberSessions;
        $course->price = $request->price;
        $course->level = ['en' => $levelEn, 'ar' => $levelAr, 'fr' => $levelFr];

        //check if the request has testlink
        if ($request->has('testlink'))
            $course->testlink = $request->testlink;

        $uniqueIdentifier = uniqid();
        $course->slug = Str::slug($request->title_en . $uniqueIdentifier);

        $course->save();

        return redirect()->route('admin.allLanguagesCourses')->with('success', trans('website/messages.Your have added a new Languages Course'));
    }

    public function editLanguageCourse(Request $request)
    {
        $instructors = Instructor::all();
        $lang_course = LanguageCourse::find($request->course_id);

        return view('website.admin.coures.languagesCourse.editLanguagesCoures', compact('instructors', 'lang_course'));
    }

    public function updateLanguageCourse(Request $request)
    {
        $request->validate([
            'inten_course_id' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
            'title_fr' => 'required',
            'instructor_id' => 'required',
            'paymentType' => 'required', // Ensures a payment type is selected
            'percentage' => 'required_if:paymentType,percentage|min:0|max:100', // Required if payment type is percentage
            'perSession' => 'required_if:paymentType,perSession', // Required if payment type is perSession

            'level' => 'required',
            'numberSessions' => 'required|numeric|min:1',
            'frameTime' => 'required|numeric|min:0.5',
            'price' => 'required|numeric|min:0',
            'startDate' => 'required|date',
            'status' => 'required|in:0,1',
            'description_en' => 'required',
            'description_fr' => 'required',
            'description_ar' => 'required',
            'img' => 'image|mimes:jpeg,png', // Customize image validation rules as needed
        ]);

        $course = LanguageCourse::find($request->inten_course_id);

        if ($request->level === 'Beginner') {
            $levelEn = 'Beginner'; // Generate English level
            $levelFr = 'débutant'; // Generate French level
            $levelAr = 'مبتدئ'; // Arabic level
        }
        if ($request->level === 'Intermediate') {
            $levelEn = 'Intermediate'; // Generate English level
            $levelFr = 'intermédiaire'; // Generate French level
            $levelAr = 'متوسط'; // Arabic level
        }
        if ($request->level === 'Advanced') {
            $levelEn = 'Advanced'; // Generate English level
            $levelFr = 'avancé'; // Generate French level
            $levelAr = 'محترف'; // Arabic level
        }

        //save photo in folder
        if ($request->hasFile('img')) {
            $file_extention = $request->img->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/courses';

            $request->img->move($path, $file_name);
            $course->img = $file_name;
        }


        $course->title = ['en' => $request->title_en, 'ar' => $request->title_ar, 'fr' => $request->title_fr];
        $course->description = ['en' => $request->description_en, 'ar' => $request->description_ar, 'fr' => $request->description_fr];

        $course->instructor_id = $request->instructor_id;
        $course->paymentType = $request->paymentType;
        $paymentType = $request->paymentType;
        if ($paymentType == 'percentage') {
            $course->percentage = $request->percentage;
            $course->perSession = null;
        } else {
            $course->perSession = $request->perSession;
            $course->percentage = null;
        }

        $course->status = $request->status;

        // Convert the input (seconds to hours) to a time format
        $frameTime = Carbon::createFromTimestampUTC($request->frameTime * 3600)->format('H:i:s');
        $course->frameTime = $frameTime;

        $course->startDate = $request->startDate;
        $course->numberSessions = $request->numberSessions;
        $course->price = $request->price;
        $course->level = ['en' => $levelEn, 'ar' => $levelAr, 'fr' => $levelFr];

        //check if the request has testlink
        if ($request->has('testlink'))
            $course->testlink = $request->testlink;

        $course->slug = Str::slug($request->title_en);

        $course->save();

        return redirect()->route('admin.allLanguagesCourses')->with('success', trans('website/messages.Your have update Language Course'));
    }

    public function deleteLanguageCourse(Request $request)
    {
        $lang_course = LanguageCourse::find($request->course_id);

        //delete groups
        $lang_course->groups()->delete();

        //delete enrollments
        $lang_course->enrollments()->delete();

        //delete waitingList
        $lang_course->waitingList()->delete();


        File::delete('images/courses/' . $lang_course->img);
        $lang_course->delete();

        return redirect()->route('admin.allLanguagesCourses')->with('warning', trans('website/messages.Your have delete Language Course'));
    }

    public function activeOrDisableCourse(Request $request)
    {
        if ($request->courseType === 'supCourse') {
            $supCourse = SupportingCourse::find($request->course_id);

            $supCourse->status = $request->status;
            $supCourse->save();

            return redirect()->back()->with('success', trans('website/messages.status changed successfully'));
        }

        if ($request->courseType === 'intenCourse') {
            $intenCourse = IntensiveCourse::find($request->course_id);

            $intenCourse->status = $request->status;
            $intenCourse->save();

            return redirect()->back()->with('success', trans('website/messages.status changed successfully'));
        }

        if ($request->courseType == 'langCourse') {
            $langCourse = LanguageCourse::find($request->course_id);

            $langCourse->status = $request->status;
            $langCourse->save();

            return redirect()->back()->with('success', trans('website/messages.status changed successfully'));
        }
    }

    public function searchByStudentName(Request $request)
    {
        if ($request->ajax()) {
            $searchByStudentName = $request->searchByStudentName;

            $data = User::where('firstName', 'like', "%{$searchByStudentName}%")->orderby('id', 'ASC')->get();

            return view('website.admin.coures.searchByStudentName', ['data' => $data]);
        }
    }

    public function addStudentToCourse(Request $request)
    {
        // check if the student is enrolled
        if ($this->isEnroll($request->studentId, $request->courseId, $request->courseType))
            return redirect()->back()->with('warning', trans('website/messages.this student is already enrolled in this course'));

        if ($request->courseType === 'supportingCourse') {
            Enrollment::create([
                'student_id' => $request->studentId,
                'courseable_type' => 'App\Models\Course\SupportingCourse',
                'courseable_id' => $request->courseId,
                'group_id' => $request->group_id,
                'date' => now(),
                'startDate' => now(),
                'endDate' => now()->addMonths(1),
            ]);

            //check the student is member in group
            $isMember = GroupMember::where('student_id', $request->studentId)
                ->where('group_id', $request->group_id)->first();
            if (!$isMember)
                //add the student to his group
                GroupMember::create([
                    'group_id' => $request->group_id,
                    'student_id' => $request->studentId
                ]);

            return redirect()->back()->with('success', trans('website/messages.the student add successfully'));
        }

        if ($request->courseType === 'languageCourse') {
            Enrollment::create([
                'student_id' => $request->studentId,
                'courseable_type' => 'App\Models\Course\LanguageCourse',
                'courseable_id' => $request->courseId,
                'group_id' => $request->group_id,
                'date' => now(),
                'startDate' => now(),
                'endDate' => now()->addMonths(1),
            ]);

            //check the student is member in group
            $isMember = GroupMember::where('student_id', $request->studentId)
                ->where('group_id', $request->group_id)->first();
            if (!$isMember)
                //add the student to his group
                GroupMember::create([
                    'group_id' => $request->group_id,
                    'student_id' => $request->studentId
                ]);

            return redirect()->back()->with('success', trans('website/messages.the student add successfully'));
        }

        if ($request->courseType === 'intensiveCourse') {
            Enrollment::create([
                'student_id' => $request->studentId,
                'courseable_type' => 'App\Models\Course\IntensiveCourse',
                'courseable_id' => $request->courseId,
                'group_id' => $request->group_id,
                'date' => now(),
                'startDate' => now(),
                'endDate' => now()->addMonths(1),
            ]);

            //check the student is member in group
            $isMember = GroupMember::where('student_id', $request->studentId)
                ->where('group_id', $request->group_id)->first();
            if (!$isMember)
                //add the student to his group
                GroupMember::create([
                    'group_id' => $request->group_id,
                    'student_id' => $request->studentId
                ]);

            return redirect()->back()->with('success', trans('website/messages.the student add successfully'));
        }
    }

    public function isEnroll($studentId, $courseId, $courseType)
    {
        $student = User::find($studentId);

        if ($courseType === 'supportingCourse')
            $courseType = 'App\Models\Course\SupportingCourse';

        if ($courseType === 'languageCourse')
            $courseType = 'App\Models\Course\LanguageCourse';

        if ($courseType === 'intensiveCourse')
            $courseType = 'App\Models\Course\IntensiveCourse';

        $isEnroll = $student->enrollments()
            ->where('student_id', $studentId)
            ->where('courseable_type', $courseType)
            ->where('courseable_id', $courseId)
            ->where('endDate', '>=', now())
            ->first();

        return $isEnroll;
    }

    public function deleteStudentFromCourse(Request $request)
    {
        $enrollment = Enrollment::find($request->enrollment_id);

        $groupMember = GroupMember::where('group_id', $enrollment->group_id)
            ->where('student_id', $enrollment->student_id)
            ->first();

        //delete the member group
        $groupMember->delete();

        //disable the enrollment
        $enrollment->status = 0;
        $enrollment->save();

        return redirect()->back()->with('success', trans('website/messages.the enrollment deleted successfully'));
    }

    public function activeOrDisableEnrollment(Request $request)
    {
        $enrollment = Enrollment::find($request->enrollment_id);

        $enrollment->status = $request->enrollmentStatus;
        $enrollment->save();

        return redirect()->back()->with('success', trans('website/messages.the status of enrollment is change it '));
    }

    //########################################  Student functions #########################################################

    public function ajaxFilterStudentByCourse(Request $request)
    {
        $enrollments = Enrollment::all();
        $students = [];

        if ($request->courseType === "supportingCourse") {
            // get the supporting course enrollments
            $sup_courses_Enrollments = $enrollments
                ->where('courseable_type', 'App\Models\Course\SupportingCourse');

            //check if there are no level or year field
            if (!$request->has('supportingCourseLevel') && !$request->has('high_school_year')
                && !$request->has('secondary_school_year')
                && !$request->has('primary_school_year')) {
                foreach ($sup_courses_Enrollments as $enrollment) {
                    $students [] = $enrollment->user;
                }
            }

            //check if there are level field
            if ($request->has('supportingCourseLevel') && (!$request->has('high_school_year')
                    && !$request->has('secondary_school_year')
                    && !$request->has('primary_school_year'))) {
                foreach ($sup_courses_Enrollments as $enrollment) {

                    //check if the course level equal the level filter
                    $courseLevel = $enrollment->courseable->getTranslations()['level']['en'];
                    if ($courseLevel == $request->supportingCourseLevel) {
                        $students [] = $enrollment->user;
                    }
                }
            }

            //check if there are level and year field
            if ($request->has('supportingCourseLevel') && ($request->has('high_school_year')
                    || $request->has('secondary_school_year')
                    || $request->has('primary_school_year'))) {
                foreach ($sup_courses_Enrollments as $enrollment) {

                    //check if the course level equal the level filter and year course equal the year filter
                    $courseLevel = $enrollment->courseable->getTranslations()['level']['en'];
                    $courseYear = $enrollment->courseable->year;
                    if ($courseLevel == $request->supportingCourseLevel && $courseYear == $request->high_school_year
                        || $courseYear == $request->secondary_school_year
                        || $courseYear == $request->primary_school_year) {
                        $students [] = $enrollment->user;
                    }
                }
            }
        }

        if ($request->courseType === "languagesCourse") {
            // get the languages course enrollments
            $lang_courses_Enrollments = $enrollments
                ->where('courseable_type', 'App\Models\Course\LanguageCourse');

            //check if there are no level or year field
            if (!$request->has('languagesCourseLevel')) {
                foreach ($lang_courses_Enrollments as $enrollment) {
                    $students [] = $enrollment->user;
                }
            }

            //check if there are level field
            if ($request->has('languagesCourseLevel')) {
                foreach ($lang_courses_Enrollments as $enrollment) {

                    //check if the course level equal the level filter
                    $courseLevel = $enrollment->courseable->getTranslations()['level']['en'];
                    if ($courseLevel == $request->languagesCourseLevel) {
                        $students [] = $enrollment->user;
                    }
                }
            }
        }

        if ($request->courseType === "intensiveCourse") {
            // get the intensive course enrollments
            $inten_courses_Enrollments = $enrollments
                ->where('courseable_type', 'App\Models\Course\IntensiveCourse');

            //check if there are no level or year field
            if (!$request->has('intensiveCourseLevel')) {
                foreach ($inten_courses_Enrollments as $enrollment) {
                    $students [] = $enrollment->user;
                }
            }

            //check if there are level field
            if ($request->has('intensiveCourseLevel')) {
                foreach ($inten_courses_Enrollments as $enrollment) {

                    //check if the course level equal the level filter
                    $courseLevel = $enrollment->courseable->getTranslations()['level']['en'];
                    if ($courseLevel == $request->intensiveCourseLevel) {
                        $students [] = $enrollment->user;
                    }
                }
            }
        }

        //Removes duplicate student from an array
        $students = array_unique($students, SORT_REGULAR);

        return view('website.admin.student.ajaxFilterStudentByCourse', compact('students'));
    }

    public function allStudents()
    {
        $students = User::paginate(10);

        return view('website.admin.student.allStudents', compact('students'));
    }

    public function addStudent()
    {
        return view('website.admin.student.addStudent');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'photo' => ['image'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'state' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'bio' => ['required', 'string'],
        ]);

        if ($request->hasFile('photo')) {
            $file_extention = $request->photo->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/profiles';

            $request->photo->move($path, $file_name);
        }

        User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'state' => $request->state,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
            'bio' => $request->bio,
//            'photo' => $file_name,
            'remember_token' => Str::random(10),
        ]);

        return redirect()->route('admin.allStudents')->with('success', trans('website/messages.Your have added a new Student'));
    }

    public function studentProfile(Request $request)
    {
        $student = User::find($request->student_id);

        return view('website.admin.student.studentPanel', compact('student'));
    }

    public function editStudentProfile(Request $request)
    {
        $student = User::find($request->student_id);

        return view('website.admin.student.editStudent', compact('student'));
    }

    public function updateStudentProfile(Request $request)
    {
        $request->validate([
            'photo' => ['image'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->student_id)],
            'phone' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($request->student_id)],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'state' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'bio' => ['required', 'string'],
        ]);

        $student = User::find($request->student_id);

        // check if the request has photo
        if ($request->hasFile('photo')) {
            $file_extention = $request->photo->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/profiles';

            $request->photo->move($path, $file_name);
            $student->photo = $file_name;
        }

        // check if the password is not equal the password_confirmation
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', trans('website/messages.the password is not the same'));
        } else {

            // check if the password is the same in the database
            if (!Hash::check($request->password, $student->password) && !empty($request->password)) {
                $student->password = Hash::make($request->password);
                $student->save();
            }
        }

        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->state = $request->state;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->bio = $request->bio;

        $student->save();

        return redirect()->route('admin.allStudents')->with('success', trans('website/messages.Your have edit Student'));
    }

    public function deleteStudent(Request $request)
    {
        $student = User::find($request->student_id);

        File::delete('images/profiles/' . $student->img);
        $student->delete();

        return redirect()->route('admin.allStudents')->with('warning', trans('website/messages.Your have delete a Student'));
    }

    public function activeOrDisableStudent(Request $request)
    {
        $student = User::find($request->student_id);

//        return $student;

        $student->status = $request->status;
        $student->save();

        return redirect()->back()->with('success', trans('website/messages.status changed successfully'));
    }

    //########################################  Instructor functions #########################################################

    public function ajaxFilterInstructorByCourse(Request $request)
    {
        $instructors = [];

        if ($request->courseType === "supportingCourse") {

            // get the supporting courses
            $sup_courses = SupportingCourse::all();

            //check if there are no level or year field
            if (!$request->has('supportingCourseLevel') && !$request->has('high_school_year')
                && !$request->has('secondary_school_year')
                && !$request->has('primary_school_year')) {
                foreach ($sup_courses as $cours) {
                    $instructors [] = $cours->instructor;
                }
            }

            //check if there are level field
            if ($request->has('supportingCourseLevel') && (!$request->has('high_school_year')
                    && !$request->has('secondary_school_year')
                    && !$request->has('primary_school_year'))) {
                foreach ($sup_courses as $course) {
                    $instructors [] = $course->instructor;
                }
            }

            //check if there are level and year field
            if ($request->has('supportingCourseLevel') && ($request->has('high_school_year')
                    || $request->has('secondary_school_year')
                    || $request->has('primary_school_year'))) {
                foreach ($sup_courses as $course) {

                    //check if the course level equal the level filter and year course equal the year filter
                    $courseLevel = $course->getTranslations()['level']['en'];
                    $courseYear = $course->year;
                    if ($courseLevel == $request->supportingCourseLevel && $courseYear == $request->high_school_year
                        || $courseYear == $request->secondary_school_year
                        || $courseYear == $request->primary_school_year) {
                        $instructors [] = $course->instructor;
                    }
                }
            }
        }

        if ($request->courseType === "languagesCourse") {

            // get the languages courses
            $lang_courses = LanguageCourse::all();

            //check if there are no level or year field
            if (!$request->has('languagesCourseLevel')) {
                foreach ($lang_courses as $cours) {
                    $instructors [] = $cours->instructor;
                }
            }

            //check if there are level field
            if ($request->has('languagesCourseLevel')) {
                foreach ($lang_courses as $cours) {

                    //check if the course level equal the level filter
                    $courseLevel = $cours->getTranslations()['level']['en'];
                    if ($courseLevel == $request->languagesCourseLevel) {
                        $instructors [] = $cours->instructor;
                    }
                }
            }
        }

        if ($request->courseType === "intensiveCourse") {

            // get the intensive courses
            $inten_courses = IntensiveCourse::all();

            //check if there are no level or year field
            if (!$request->has('intensiveCourseLevel')) {
                foreach ($inten_courses as $cours) {
                    $instructors [] = $cours->instructor;
                }
            }

            //check if there are level field
            if ($request->has('intensiveCourseLevel')) {
                foreach ($inten_courses as $cours) {

                    //check if the course level equal the level filter
                    $courseLevel = $cours->getTranslations()['level']['en'];
                    if ($courseLevel == $request->intensiveCourseLevel) {
                        $instructors [] = $cours->instructor;
                    }
                }
            }
        }

        //Removes duplicate student from an array
        $instructors = array_unique($instructors, SORT_REGULAR);

        return view('website.admin.instructor.ajaxFilterIntructorByCourse', compact('instructors'));
    }

    public function allInstructor()
    {
        $instructors = Instructor::paginate(10);

        return view('website.admin.instructor.allInstructor', compact('instructors'));
    }

    public function addInstructor()
    {
        return view('website.admin.instructor.addInstructor');
    }

    public function storeInstructor(Request $request)
    {

        $request->validate([
            'photo' => ['image'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:instructors'],
            'phone' => ['required', 'string', 'max:255', 'unique:instructors'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'state' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'bio' => ['required', 'string'],
        ]);

        if ($request->hasFile('photo')) {
            $file_extention = $request->photo->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/profiles';

            $request->photo->move($path, $file_name);
        }


        Instructor::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'state' => $request->state,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
            'bio' => $request->bio,
//            'photo' => $file_name,
            'remember_token' => Str::random(10),
        ]);

        return redirect()->route('admin.allInstructor')->with('success', trans('website/messages.Your have added a new Instructor'));
    }

    public function InstructorProfile(Request $request)
    {
        $instructor = Instructor::find($request->instructor_id);

        return view('website.admin.instructor.InstructorPanel', compact('instructor'));
    }

    public function editInstructorProfile(Request $request)
    {
        $instructor = Instructor::find($request->instructor_id);

        return view('website.admin.instructor.editInstructor', compact('instructor'));
    }

    public function updateInstructorProfile(Request $request)
    {
        $request->validate([
            'photo' => ['image'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('instructors')->ignore($request->instructor_id)],
            'phone' => ['required', 'string', 'max:255', Rule::unique('instructors')->ignore($request->instructor_id)],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'state' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'bio' => ['required', 'string'],
        ]);

        $instructor = Instructor::find($request->instructor_id);

        // check if the request has photo
        if ($request->hasFile('photo')) {
            $file_extention = $request->photo->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/profiles';

            $request->photo->move($path, $file_name);
            $instructor->photo = $file_name;
        }

        // check if the password is not equal the password_confirmation
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', trans('website/messages.the password is not the same'));
        } else {

            // check if the password is the same in the database
            if (!Hash::check($request->password, $instructor->password) && !empty($request->password)) {
                $instructor->password = Hash::make($request->password);
                $instructor->save();
            }
        }

        $instructor->firstName = $request->firstName;
        $instructor->lastName = $request->lastName;
        $instructor->email = $request->email;
        $instructor->phone = $request->phone;
        $instructor->state = $request->state;
        $instructor->address = $request->address;
        $instructor->gender = $request->gender;
        $instructor->status = $request->status;
        $instructor->bio = $request->bio;

        $instructor->save();

        return redirect()->route('admin.allInstructor')->with('success', trans('website/messages.Your have edit Instructor'));
    }

    public function deleteInstructor(Request $request)
    {
        $instructor = Instructor::find($request->instructor_id);

        File::delete('images/profiles/' . $instructor->photo);
        $instructor->delete();

        return redirect()->route('admin.allInstructor')->with('warning', trans('website/messages.Your have delete a Instructor'));
    }

    public function activeOrDisableInstructor(Request $request)
    {
        $instructor = Instructor::find($request->instructor_id);

        $instructor->status = $request->status;
        $instructor->save();

        return redirect()->back()->with('success', trans('website/messages.status changed successfully'));
    }

    //########################################  Contact us functions #########################################################

    public function allContactUs()
    {
        $all_contact_us = Contact::all();

        return view('website.admin.contactUs.contactUs', compact('all_contact_us'));
    }

    public function deleteContactUs(Request $request)
    {
        $contact_us = Contact::find($request->contact_us_id);

        $contact_us->delete();

        return redirect()->back()->with('warning', trans('website/messages.contact us deleted '));
    }

    public function replyContactUs(Request $request)
    {
        $contact_us = Contact::find($request->contact_us_id);

        return view('website.admin.contactUs.contactUsReplay', compact('contact_us'));
    }

    public function reply(Request $request)
    {
        $details = [
            'email' => $request->email,
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to($details['email'])->send(new ContactMail($details));
        return redirect()->back()->with('success', trans('website/messages.The message sent successfully'));
    }

    //########################################  Subscriptions functions ##################################################

    public function allSubscriptions()
    {
        $subscriptions = WaitingList::all();

        return view('website.admin.subscription.allSubscription', compact('subscriptions'));
    }

    public function subscriptionPanel(Request $request)
    {
        $subscription = WaitingList::find($request->subscription_id);

        return view('website.admin.subscription.subscriptionPanel', compact('subscription'));
    }

    public function subscriptionPanelFromNotification(Request $request)
    {
        //get the notification id and change the read_at column to now
        $notifyId = DB::table('notifications')
            ->where('data->subscription_id', $request->subscription_id)
            ->where('notifiable_id', Auth::guard('admin')->id())
            ->where('notifiable_type', 'App\Models\Admin')
            ->pluck('id');

//        return $notifyId;

        if (!$notifyId->isEmpty()) {
            $notification = DB::table('notifications')->where('id', $notifyId)->get();
            $read_at = $notification[0]->read_at;
            if ($read_at == null)
                DB::table('notifications')->where('id', $notifyId)->update(['read_at' => now()]);
        }

//        $subscription = WaitingList::find($request->subscription_id);
//        return view('website.admin.subscription.subscriptionPanel', compact('subscription'));

        return redirect()->back();

    }

    public function approveSubscription(Request $request)
    {
        $subscription = WaitingList::find($request->subscription_id);

        //check if already approved
        $enrollments = Enrollment::where('student_id', $subscription->student_id)
            ->where('courseable_type', $subscription->courseable_type)
            ->where('courseable_id', $subscription->courseable_id)
            ->get();

        //check if the subscription approved
        if ($subscription->status == 0) {
            //check if the enrollments is not empty
            if (!$enrollments->isEmpty()) {

                //get the endDate of the last enrollment
                $enrollment_endDate = $enrollments->last()->endDate;

                //check if the endDate more or eq Now
                if ($enrollment_endDate >= now())
                    return redirect()->back()->with('warning', trans('website/messages.This subscription is already approved ended at ') . $enrollment_endDate);
                else
                    //check if the student balance more or eq course price multiply by monthsNumber
                    if ($subscription->student->balance >= $subscription->courseable->price * $subscription->monthsNumber) {

                        //approve the subscription
                        $enrollment = Enrollment::create([
                            'student_id' => $subscription->student_id,
                            'courseable_id' => $subscription->courseable_id,
                            'courseable_type' => $subscription->courseable_type,
                            'group_id' => $request->group_id,
                            'date' => now(),
                            'startDate' => now(),
                            'endDate' => now()->addMonths($subscription->monthsNumber),
                        ]);

                        //check the student is member in group
                        $isMember = GroupMember::where('student_id', $subscription->student_id)->where('group_id', $request->group_id)->first();
                        if (!$isMember)
                            //add the student to group
                            GroupMember::create([
                                'student_id' => $subscription->student_id,
                                'group_id' => $request->group_id,
                            ]);

                        //sub the course price from student balance
                        $subscription->student->balance = $subscription->student->balance - $subscription->courseable->price * $subscription->monthsNumber;
                        $subscription->student->save();

                        //make the request enrollment approved
                        $subscription->status = 1;
                        $subscription->save();

                        if (!$isMember)
                            //approve notification
                            $this->approveNotification($subscription->student->id, $subscription->courseable->title, $subscription->id);

                        return redirect()->back()->with('success', trans('website/messages.Your have approve this subscription'));
                    } else {
                        return redirect()->back()->with('error', trans('website/messages.this student can not enroll in this course his balance is less '));
                    }
            } else {
                //check if the student balance more or eq course price multiply by monthsNumber
                if ($subscription->student->balance >= $subscription->courseable->price * $subscription->monthsNumber) {

                    //approve the subscription
                    $enrollment = Enrollment::create([
                        'student_id' => $subscription->student_id,
                        'courseable_id' => $subscription->courseable_id,
                        'courseable_type' => $subscription->courseable_type,
                        'group_id' => $request->group_id,
                        'date' => now(),
                        'startDate' => now(),
                        'endDate' => now()->addMonths($subscription->monthsNumber),
                    ]);

                    //check the student is member in group
                    $isMember = GroupMember::where('student_id', $subscription->student_id)->where('group_id', $request->group_id)->first();
                    if (!$isMember)
                        //add the student to group
                        GroupMember::create([
                            'student_id' => $subscription->student_id,
                            'group_id' => $request->group_id,
                        ]);

                    //sub the course price from student balance
                    $subscription->student->balance = $subscription->student->balance - $subscription->courseable->price * $subscription->monthsNumber;
                    $subscription->student->save();

                    //make the request enrollment approved
                    $subscription->status = 1;
                    $subscription->save();

                    if (!$isMember)
                        //approve notification
                        $this->approveNotification($subscription->student->id, $subscription->courseable->title, $subscription->id);

                    return redirect()->back()->with('success', trans('website/messages.Your have approve this subscription'));
                } else {
                    return redirect()->back()->with('error', trans('website/messages.this student can not enroll in this course his balance is less '));
                }
            }
        } else {
            return redirect()->back()->with('warning', 'This subscription is already approved ended at ' . $enrollments->last()->endDate);
        }


        //repeated Code
        if ($subscription->courseable_type === 'App\Models\Course\SupportingCourse') {

            //check if already approved
            $enrollments = Enrollment::where('student_id', $subscription->student_id)
                ->where('courseable_type', $subscription->courseable_type)
                ->where('courseable_id', $subscription->courseable_id)
                ->get();

            //check if the subscription approved
            if ($subscription->status == 0) {
                //check if the enrollments is not empty
                if (!$enrollments->isEmpty()) {

                    //get the endDate of the last enrollment
                    $enrollment_endDate = $enrollments->last()->endDate;

                    //check if the endDate more or eq Now
                    if ($enrollment_endDate >= now())
                        return redirect()->back()->with('warning', 'This subscription is already approved ended at ' . $enrollment_endDate);
                    else
                        //check if the student balance more or eq course price multiply by monthsNumber
                        if ($subscription->student->balance >= $subscription->courseable->price * $subscription->monthsNumber) {

                            //approve the subscription
                            $enrollment = Enrollment::create([
                                'student_id' => $subscription->student_id,
                                'courseable_id' => $subscription->courseable_id,
                                'courseable_type' => $subscription->courseable_type,
                                'group_id' => $request->group_id,
                                'date' => now(),
                                'startDate' => now(),
                                'endDate' => now()->addMonths($subscription->monthsNumber),
                            ]);

                            //check the student is member in group
                            $isMember = GroupMember::where('student_id', $subscription->student_id)->where('group_id', $request->group_id)->first();
                            if (!$isMember)
                                //add the student to group
                                GroupMember::create([
                                    'student_id' => $subscription->student_id,
                                    'group_id' => $request->group_id,
                                ]);

                            //sub the course price from student balance
                            $subscription->student->balance = $subscription->student->balance - $subscription->courseable->price * $subscription->monthsNumber;
                            $subscription->student->save();

                            //make the request enrollment approved
                            $subscription->status = 1;
                            $subscription->save();

                            if (!$isMember)
                                //approve notification
                                $this->approveNotification($subscription->student->id, $subscription->courseable->title, $subscription->id);

                            return redirect()->back()->with('success', 'Your have approve this subscription');
                        } else {
                            return redirect()->back()->with('error', 'this student can not enroll in this course his balance is less ');
                        }
                } else {
                    //check if the student balance more or eq course price multiply by monthsNumber
                    if ($subscription->student->balance >= $subscription->courseable->price * $subscription->monthsNumber) {

                        //approve the subscription
                        $enrollment = Enrollment::create([
                            'student_id' => $subscription->student_id,
                            'courseable_id' => $subscription->courseable_id,
                            'courseable_type' => $subscription->courseable_type,
                            'group_id' => $request->group_id,
                            'date' => now(),
                            'startDate' => now(),
                            'endDate' => now()->addMonths($subscription->monthsNumber),
                        ]);

                        //check the student is member in group
                        $isMember = GroupMember::where('student_id', $subscription->student_id)->where('group_id', $request->group_id)->first();
                        if (!$isMember)
                            //add the student to group
                            GroupMember::create([
                                'student_id' => $subscription->student_id,
                                'group_id' => $request->group_id,
                            ]);

                        //sub the course price from student balance
                        $subscription->student->balance = $subscription->student->balance - $subscription->courseable->price * $subscription->monthsNumber;
                        $subscription->student->save();

                        //make the request enrollment approved
                        $subscription->status = 1;
                        $subscription->save();

                        if (!$isMember)
                            //approve notification
                            $this->approveNotification($subscription->student->id, $subscription->courseable->title, $subscription->id);

                        return redirect()->back()->with('success', 'Your have approve this subscription');
                    } else {
                        return redirect()->back()->with('error', 'this student can not enroll in this course his balance is less ');
                    }
                }
            } else {
                return redirect()->back()->with('warning', 'This subscription is already approved ended at ' . $enrollments->last()->endDate);
            }
        }

        if ($subscription->courseable_type === 'App\Models\Course\LanguageCourse') {

            //check if already approved
            $enrollment = Enrollment::where('student_id', $subscription->student_id)
                ->where('courseable_type', $subscription->courseable_type)
                ->where('courseable_id', $subscription->courseable_id)
                ->get();
            if (!$enrollment->isEmpty())
                return redirect()->back()->with('warning', trans('website/messages.This subscription is already approved'));

            //check if the student balance more or eq course price multiply by monthsNumber
            if ($subscription->student->balance >= $subscription->courseable->price * $subscription->monthsNumber) {

                //approve the subscription
                Enrollment::create([
                    'student_id' => $subscription->student_id,
                    'courseable_id' => $subscription->courseable_id,
                    'courseable_type' => $subscription->courseable_type,
                    'group_id' => $request->group_id,
                    'date' => now(),
                ]);

                //add the student to group
                GroupMember::create([
                    'student_id' => $subscription->student_id,
                    'group_id' => $request->group_id,
                ]);

                $subscription->student->balance = $subscription->student->balance - $subscription->courseable->price * $subscription->monthsNumber;
                $subscription->student->save();

                //make the request enrollment approved
                $subscription->status = 1;
                $subscription->save();

                //approve notification
                $this->approveNotification($subscription->student->id, $subscription->courseable->title, $subscription->id);

                return redirect()->back()->with('success', trans('website/messages.you website/messages.Your have approve this subscription'));
            } else {
                return redirect()->back()->with('error', trans('website/messages.this student can not enroll in this course his balance is less '));
            }
        }

        if ($subscription->courseable_type === 'App\Models\Course\IntensiveCourse') {

            //check if the student balance more or eq course price multiply by monthsNumber
            if ($subscription->student->balance >= $subscription->courseable->price * $subscription->monthsNumber) {

                //check if already approved
                $enrollment = Enrollment::where('student_id', $subscription->student_id)
                    ->where('courseable_type', $subscription->courseable_type)
                    ->where('courseable_id', $subscription->courseable_id)
                    ->get();
                if (!$enrollment->isEmpty())
                    return redirect()->back()->with('warning', trans('website/messages.This subscription is already approved'));

                //approve the subscription
                Enrollment::create([
                    'student_id' => $subscription->student_id,
                    'courseable_id' => $subscription->courseable_id,
                    'courseable_type' => $subscription->courseable_type,
                    'group_id' => $request->group_id,
                    'date' => now(),
                ]);

                //add the student to group
                GroupMember::create([
                    'student_id' => $subscription->student_id,
                    'group_id' => $request->group_id,
                ]);

                $subscription->student->balance = $subscription->student->balance - $subscription->courseable->price * $subscription->monthsNumber;
                $subscription->student->save();

                //make the request enrollment approved
                $subscription->status = 1;
                $subscription->save();

                //approve notification
                $this->approveNotification($subscription->student->id, $subscription->courseable->title, $subscription->id);

                return redirect()->back()->with('success', trans('website/messages.Your have approve this subscription'));
            } else {
                return redirect()->back()->with('error', trans('website/messages.this student can not enroll in this course his balance is less '));
            }
        }
    }

    public function approveNotification($student_id, $courseTitle, $subscription_id)
    {
        $student = User::find($student_id);
        Notification::send($student, new ApproveSubscription($courseTitle, $subscription_id, $student_id));
    }

    public function ajaxFilterSubscriptionByCourse(Request $request)
    {
        $all_subscriptions = WaitingList::all();
        $subscriptions = [];

        if ($request->courseType === "supportingCourse") {
            // get the supporting course subscriptions
            $all_subscriptions = $all_subscriptions
                ->where('courseable_type', 'App\Models\Course\SupportingCourse');

            //check if there are no level or year field
            if (!$request->has('supportingCourseLevel') && !$request->has('high_school_year')
                && !$request->has('secondary_school_year')
                && !$request->has('primary_school_year')) {
                foreach ($all_subscriptions as $subscription) {
                    $subscriptions [] = $subscription;
                }
            }

            //check if there are level field
            if ($request->has('supportingCourseLevel') && (!$request->has('high_school_year')
                    && !$request->has('secondary_school_year')
                    && !$request->has('primary_school_year'))) {
                foreach ($all_subscriptions as $subscription) {

                    //check if the course level equal the level filter
                    $courseLevel = $subscription->courseable->getTranslations()['level']['en'];
                    if ($courseLevel == $request->supportingCourseLevel) {
                        $subscriptions [] = $subscription;
                    }
                }
            }

            //check if there are level and year field
            if ($request->has('supportingCourseLevel') && ($request->has('high_school_year')
                    || $request->has('secondary_school_year')
                    || $request->has('primary_school_year'))) {
                foreach ($all_subscriptions as $subscription) {

                    //check if the course level equal the level filter and year course equal the year filter
                    $courseLevel = $subscription->courseable->getTranslations()['level']['en'];
                    $courseYear = $subscription->courseable->year;
                    if ($courseLevel == $request->supportingCourseLevel && $courseYear == $request->high_school_year
                        || $courseYear == $request->secondary_school_year
                        || $courseYear == $request->primary_school_year) {
                        $subscriptions [] = $subscription;
                    }
                }
            }
        }

        if ($request->courseType === "languagesCourse") {
            // get the languages course enrollments
            $all_subscriptions = $all_subscriptions
                ->where('courseable_type', 'App\Models\Course\LanguageCourse');

            //check if there are no level or year field
            if (!$request->has('languagesCourseLevel')) {
                foreach ($all_subscriptions as $subscription) {
                    $subscriptions [] = $subscription;
                }
            }

            //check if there are level field
            if ($request->has('languagesCourseLevel')) {
                foreach ($all_subscriptions as $subscription) {

                    //check if the course level equal the level filter
                    $courseLevel = $subscription->courseable->getTranslations()['level']['en'];
                    if ($courseLevel == $request->languagesCourseLevel) {
                        $subscriptions [] = $subscription;
                    }
                }
            }
        }

        if ($request->courseType === "intensiveCourse") {
            // get the intensive course enrollments
            $all_subscriptions = $all_subscriptions
                ->where('courseable_type', 'App\Models\Course\IntensiveCourse');

            //check if there are no level or year field
            if (!$request->has('intensiveCourseLevel')) {
                foreach ($all_subscriptions as $subscription) {
                    $subscriptions [] = $subscription;
                }
            }

            //check if there are level field
            if ($request->has('intensiveCourseLevel')) {
                foreach ($all_subscriptions as $subscription) {

                    //check if the course level equal the level filter
                    $courseLevel = $subscription->courseable->getTranslations()['level']['en'];
                    if ($courseLevel == $request->intensiveCourseLevel) {
                        $subscriptions [] = $subscription;
                    }
                }
            }
        }

        //Removes duplicate student from an array
        $subscriptions = array_unique($subscriptions, SORT_REGULAR);

        return view('website.admin.subscription.ajaxFilterSubscriptionByCourses', compact('subscriptions'));
    }

    //########################################  Financial functions ##################################################

    public function financialPanel()
    {
        $instructors = Instructor::all();

        $randomSupportingCourse = SupportingCourse::all();
        if (!$randomSupportingCourse->isEmpty()) {
            $randomSupportingCourse = SupportingCourse::all()->random();
        }

        $randomIntensiveCourse = IntensiveCourse::all();
        if (!$randomIntensiveCourse->isEmpty()) {
            $randomIntensiveCourse = IntensiveCourse::all()->random();
        }

        $randomLanguagesCourse = LanguageCourse::all();
        if (!$randomLanguagesCourse->isEmpty()) {
            $randomLanguagesCourse = LanguageCourse::all()->random();
        }


        $enrollmentsLast12Months = $this->enrollmentsLast12Months();
        $enrollmentsLast5Years = $this->enrollmentsLast5Years();
        $totalEarnedThisMonth = $this->totalEarnedThisMonth();
        $earningLast7Days = $this->earningLast7Days();
        $enrollmentsLastMonth = $this->enrollmentsLastMonth();
        $enrollmentsLastYear = $this->enrollmentsLastYear();
        $allSupportingCoursesEarning = $this->allSupportingCoursesEarning();
        $allLanguagesCoursesEarning = $this->allLanguagesCoursesEarning();
        $allIntensiveCoursesEarning = $this->allIntensiveCoursesEarning();

        return view('website.admin.financial.financialPanel',
            compact('randomSupportingCourse',
                'instructors',
                'randomIntensiveCourse',
                'randomLanguagesCourse',
                'enrollmentsLast12Months',
                'enrollmentsLast5Years',
                'totalEarnedThisMonth',
                'earningLast7Days',
                'enrollmentsLastMonth',
                'enrollmentsLastYear',
                'allSupportingCoursesEarning',
                'allLanguagesCoursesEarning',
                'allIntensiveCoursesEarning'));
    }

    public function instructorFinancial()
    {
        $instructors = Instructor::all();

        $totalCourses = SupportingCourse::all()->count() + IntensiveCourse::all()->count() + LanguageCourse::all()->count();
        $totalInstructors = Instructor::all()->count();
        $totalEarnings = $this->totalEarnings();

        return view('website.admin.financial.instructor.instructorsFinancial',
            compact('totalCourses',
                'totalInstructors',
                'totalEarnings',
                'instructors'));
    }

    public function coursesFinancials()
    {
        $totalCourses = SupportingCourse::all()->count() + IntensiveCourse::all()->count() + LanguageCourse::all()->count();
        $totalEnrolled = Enrollment::all()->count();
        $totalEarnings = $this->totalEarnings();

        $allSupportingCourses = SupportingCourse::all();
        $allIntensiveCourses = IntensiveCourse::all();
        $allLanguagesCourses = LanguageCourse::all();

        return view('website.admin.financial.courses.coursesFinancial',
            compact('totalCourses',
                'totalEnrolled',
                'totalEarnings',
                'allSupportingCourses',
                'allIntensiveCourses',
                'allLanguagesCourses'));
    }

    public function languagesCoursesFinancials()
    {
        $langCourses = LanguageCourse::all();

        $totalCourses = $langCourses->count();

        $totalEnrolled = Enrollment::where('courseable_type', 'App\Models\Course\LanguageCourse')
            ->get()
            ->count();


        $totalEarnings = 0;
        foreach ($langCourses as $course) {
            $courseEarned = $course->enrollments()->count() * $course->price;

            $totalEarnings += $courseEarned;
        }

        return view('website.admin.financial.courses.languagesCoursesFinancial', compact('totalCourses', 'totalEnrolled', 'totalEarnings', 'langCourses'));
    }

    public function supportingCoursesFinancials()
    {
        $supCourses = SupportingCourse::all();

        $totalCourses = $supCourses->count();

        $totalEnrolled = Enrollment::where('courseable_type', 'App\Models\Course\SupportingCourse')
            ->get()
            ->count();

        $totalEarnings = 0;
        foreach ($supCourses as $course) {
            $courseEarned = $course->enrollments()->count() * $course->price;

            $totalEarnings += $courseEarned;
        }

        return view('website.admin.financial.courses.supportingCoursesFinancial',
            compact('totalCourses', 'totalEnrolled', 'totalEarnings', 'supCourses'));
    }

    public function intensiveCoursesFinancials()
    {
        $intenCourses = IntensiveCourse::all();

        $totalCourses = $intenCourses->count();

        $totalEnrolled = Enrollment::where('courseable_type', 'App\Models\Course\IntensiveCourse')
            ->get()
            ->count();

        $totalEarnings = 0;
        foreach ($intenCourses as $course) {
            $courseEarned = $course->enrollments()->count() * $course->price;

            $totalEarnings += $courseEarned;
        }

        return view('website.admin.financial.courses.intensiveCoursesFinancial',
            compact('totalCourses', 'totalEnrolled', 'totalEarnings', 'intenCourses'));
    }

    public function enrollmentsLast12Months()
    {
        $now = Carbon::now()->addMonth();

        //empty array
        $enrollmentsLast12Months = [];

        for ($i = 0; $i < 12; $i++) {
            $now = $now->subMonth(); // get date

            $monthName = $now->format('F'); // get month name
            $monthNumber = $now->format('n'); // get month number
            $yearNumber = $now->format('Y'); // get year number

            //get the number od the enrollments of each month
            $monthEnrollment = DB::table('enrollments')
                ->whereMonth('created_at', $monthNumber)
                ->whereYear('created_at', $yearNumber)
                ->get()
                ->count();

            //store the month enrollments
            $enrollmentsLast12Months[$yearNumber . '-' . $monthName] = $monthEnrollment;
        }
        return $enrollmentsLast12Months;
    }

    public function enrollmentsLast5Years()
    {
        $now = Carbon::now()->addYear();

        //empty array
        $enrollmentsLast5Years = [];

        for ($i = 0; $i < 5; $i++) {
            $now = $now->subYear(); // get date

            $yearNumber = $now->format('Y'); // get year number

            //get the number od the enrollments of each month
            $monthEnrollment = DB::table('enrollments')
                ->whereYear('created_at', $yearNumber)
                ->get()
                ->count();

            //store the month enrollments
            $enrollmentsLast5Years[$yearNumber] = $monthEnrollment;
        }
        return $enrollmentsLast5Years;
    }

    public function totalEarnedThisMonth()
    {
        //get the date od today
        $now = Carbon::now();

        $monthNumber = $now->format('n'); // get month number

        // get the courses
        $supCourses = SupportingCourse::all();
        $intenCourses = IntensiveCourse::all();
        $langCourses = LanguageCourse::all();

        //get total earning in last month
        $totalEarnedThisMonth = 0;

        foreach ($supCourses as $course) {
            $courseEarned = $course->enrollments()
                    ->whereMonth('created_at', $monthNumber)
                    ->count() * $course->price;

            $totalEarnedThisMonth = $totalEarnedThisMonth + $courseEarned;
        }

        foreach ($intenCourses as $course) {
            $courseEarned = $course->enrollments()
                    ->whereMonth('created_at', $monthNumber)
                    ->count() * $course->price;

            $totalEarnedThisMonth = $totalEarnedThisMonth + $courseEarned;
        }

        foreach ($langCourses as $course) {
            $courseEarned = $course->enrollments()
                    ->whereMonth('created_at', $monthNumber)
                    ->count() * $course->price;

            $totalEarnedThisMonth = $totalEarnedThisMonth + $courseEarned;
        }

        return $totalEarnedThisMonth;
    }

    public function earningLast7Days()
    {
        $supCourses = SupportingCourse::all();
        $intenCourse = IntensiveCourse::all();
        $langCourse = LanguageCourse::all();

        $now = Carbon::now()->addDay();

        //empty array
        $earningLast7Days = 0;

        for ($i = 0; $i < 7; $i++) {
            $now = $now->subDay(); // get date

            $dayNumber = $now->day; // get the day
            $monthNumber = $now->format('n'); // get month number
            $yearNumber = $now->format('Y'); // get year number

            foreach ($supCourses as $cours) {
                $courseEnrolments = $cours->enrollments()
                    ->whereDay('created_at', $dayNumber)
                    ->whereMonth('created_at', $monthNumber)
                    ->whereYear('created_at', $yearNumber)
                    ->count();

                $earningLast7Days = $earningLast7Days + $courseEnrolments * $cours->price;
            }

            foreach ($langCourse as $cours) {
                $courseEnrolments = $cours->enrollments()
                    ->whereDay('created_at', $dayNumber)
                    ->whereMonth('created_at', $monthNumber)
                    ->whereYear('created_at', $yearNumber)
                    ->count();

                $earningLast7Days = $earningLast7Days + $courseEnrolments * $cours->price;
            }

            foreach ($intenCourse as $cours) {
                $courseEnrolments = $cours->enrollments()
                    ->whereDay('created_at', $dayNumber)
                    ->whereMonth('created_at', $monthNumber)
                    ->whereYear('created_at', $yearNumber)
                    ->count();

                $earningLast7Days = $earningLast7Days + $courseEnrolments * $cours->price;
            }
        }

        return $earningLast7Days;
    }

    public function enrollmentsLastMonth()
    {
        $supCourses = SupportingCourse::all();
        $intenCourse = IntensiveCourse::all();
        $langCourse = LanguageCourse::all();

        // Get the date 30 days ago from today
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $enrollmentsLastMonth = 0;

        foreach ($supCourses as $cours) {
            $courseEnrolments = $cours->enrollments()
                ->where('created_at', '>=', $thirtyDaysAgo)
                ->count();

            $enrollmentsLastMonth = $enrollmentsLastMonth + $courseEnrolments;
        }

        foreach ($intenCourse as $cours) {
            $courseEnrolments = $cours->enrollments()
                ->where('created_at', '>=', $thirtyDaysAgo)
                ->count();

            $enrollmentsLastMonth = $enrollmentsLastMonth + $courseEnrolments;
        }

        foreach ($langCourse as $cours) {
            $courseEnrolments = $cours->enrollments()
                ->where('created_at', '>=', $thirtyDaysAgo)
                ->count();

            $enrollmentsLastMonth = $enrollmentsLastMonth + $courseEnrolments;
        }

        return $enrollmentsLastMonth;
    }

    public function enrollmentsLastYear()
    {
        $supCourses = SupportingCourse::all();
        $intenCourse = IntensiveCourse::all();
        $langCourse = LanguageCourse::all();

        // Get the date 30 days ago from today
        $thirtyDaysAgo = Carbon::now()->subYear();

        $enrollmentsLastYear = 0;

        foreach ($supCourses as $cours) {
            $courseEnrolments = $cours->enrollments()
                ->where('created_at', '>=', $thirtyDaysAgo)
                ->count();

            $enrollmentsLastYear = $enrollmentsLastYear + $courseEnrolments;
        }

        foreach ($intenCourse as $cours) {
            $courseEnrolments = $cours->enrollments()
                ->where('created_at', '>=', $thirtyDaysAgo)
                ->count();

            $enrollmentsLastYear = $enrollmentsLastYear + $courseEnrolments;
        }

        foreach ($langCourse as $cours) {
            $courseEnrolments = $cours->enrollments()
                ->where('created_at', '>=', $thirtyDaysAgo)
                ->count();

            $enrollmentsLastYear = $enrollmentsLastYear + $courseEnrolments;
        }

        return $enrollmentsLastYear;
    }

    public function allSupportingCoursesEarning()
    {
        $supCourses = SupportingCourse::all();

        $supportingCourseEarning = 0;
        foreach ($supCourses as $cours) {
            $courseEnrolments = $cours->enrollments()->count();
            $supportingCourseEarning = $supportingCourseEarning + ($courseEnrolments * $cours->price);
        }
        return $supportingCourseEarning;
    }

    public function allLanguagesCoursesEarning()
    {
        $langCourses = LanguageCourse::all();

        $languagesCourseEarning = 0;
        foreach ($langCourses as $cours) {
            $courseEnrolments = $cours->enrollments()->count();
            $languagesCourseEarning = $languagesCourseEarning + ($courseEnrolments * $cours->price);
        }
        return $languagesCourseEarning;
    }

    public function allIntensiveCoursesEarning()
    {
        $intenCourses = IntensiveCourse::all();

        $intensiveCourseEarning = 0;
        foreach ($intenCourses as $cours) {
            $courseEnrolments = $cours->enrollments()->count();
            $intensiveCourseEarning = $intensiveCourseEarning + ($courseEnrolments * $cours->price);
        }
        return $intensiveCourseEarning;
    }

    public function totalEarnings()
    {
        // get the courses
        $supCourses = SupportingCourse::all();
        $intenCourses = IntensiveCourse::all();
        $langCourses = LanguageCourse::all();

        //get total earning in last month
        $totalEarnings = 0;

        foreach ($supCourses as $course) {
            $courseEarned = $course->enrollments()->count() * $course->price;

            $totalEarnings = $totalEarnings + $courseEarned;
        }

        foreach ($intenCourses as $course) {
            $courseEarned = $course->enrollments()->count() * $course->price;

            $totalEarnings = $totalEarnings + $courseEarned;
        }

        foreach ($langCourses as $course) {
            $courseEarned = $course->enrollments()->count() * $course->price;

            $totalEarnings = $totalEarnings + $courseEarned;
        }

        return $totalEarnings;
    }

//########################################  Notification functions ##################################################

    public function notification()
    {
        $students = User::all();
        $instructors = Instructor::all();

        $notifications = \App\Models\Notification::whereIn('type',
            ['App\Notifications\SpecificInstructor', 'App\Notifications\SpecificStudent'])
            ->orderBy('created_at', 'desc') // Order by 'created_at' in descending order
            ->get();

        $supCourses = SupportingCourse::all();
        $intenCourses = IntensiveCourse::all();
        $langCourses = LanguageCourse::all();

        return view('website.admin.notification.notification',
            compact('students',
                'instructors',
                'supCourses',
                'intenCourses',
                'langCourses',
                'notifications'));
    }

    public function storeNotification(Request $request)
    {
        $request->validate([
            'notification' => 'required|string', // Validation for the notification message
            'student_ids.*' => 'nullable|numeric', // Replace 'student_ids' with the appropriate checkbox name
            'instructor_ids.*' => 'nullable|numeric', // Replace 'instructor_ids' with the appropriate checkbox name
            'supCourse_group_ids.*' => 'nullable|numeric', // Replace 'supCourse_group_ids' with the appropriate checkbox name
            'intenCourse_group_ids.*' => 'nullable|numeric', // Replace 'intenCourse_group_ids' with the appropriate checkbox name
            'langCourse_group_ids.*' => 'nullable|numeric', // Replace 'langCourse_group_ids' with the appropriate checkbox name
            'supCourse_ids.*' => 'nullable|numeric', // Replace 'supCourse_ids' with the appropriate checkbox name
            'intenCourse_ids.*' => 'nullable|numeric', // Replace 'intenCourse_ids' with the appropriate checkbox name
            'langCourse_ids.*' => 'nullable|numeric', // Replace 'langCourse_ids' with the appropriate checkbox name
        ]);

        // Get all input data from the request
        $data = $request->all();

        // Initialize empty arrays to store student and instructor and courses IDs
        $studentIds = [];
        $instructorIds = [];
        $supCourseGroupIds = [];
        $intenCourseGroupIds = [];
        $langCourseGroupIds = [];

        // Loop through the input data and check for selected checkboxes
        foreach ($data as $key => $value) {
            if (strpos($key, 'student_id') === 0) {
                $studentIds[$key] = $value;
            }

            if (strpos($key, 'instructor_id') === 0) {
                $instructorIds[$key] = $value;
            }

            if (strpos($key, 'supCourse_group_id') === 0) {
                $supCourseGroupIds[$key] = $value;
            }

            if (strpos($key, 'intenCourse_group_id') === 0) {
                $intenCourseGroupIds[$key] = $value;
            }

            if (strpos($key, 'langCourse_group_id') === 0) {
                $langCourseGroupIds[$key] = $value;
            }
        }

        //get students and instructors of supporting Groups
        $groups = Group::whereIn('id', $supCourseGroupIds)->get();
        foreach ($groups as $group) {
            foreach ($group->members as $member) {
                $studentIds [] = $member->user->id;
            }
            $instructorIds [] = $group->courseable->instructor->id;
        }

        //get students and instructors of intensive Groups
        $groups = Group::whereIn('id', $intenCourseGroupIds)->get();
        foreach ($groups as $group) {
            foreach ($group->members as $member) {
                $studentIds [] = $member->user->id;
            }
            $instructorIds [] = $group->courseable->instructor->id;
        }

        //get students and instructors of languages Groups
        $groups = Group::whereIn('id', $langCourseGroupIds)->get();
        foreach ($groups as $group) {
            foreach ($group->members as $member) {
                $studentIds [] = $member->user->id;
            }
            $instructorIds [] = $group->courseable->instructor->id;
        }

        $this->notificationSpecificStudents($studentIds, $request->notification);
        $this->notificationSpecificInstructor($instructorIds, $request->notification);

        return redirect()->back()->with('success', trans('website/messages.The notification set successfully'));
    }

    private function notificationSpecificStudents($studentIds, $specificNotificcation)
    {
        $students = User::whereIn('id', $studentIds)->get();
        Notification::send($students, new SpecificStudent($specificNotificcation));
    }

    private function notificationSpecificInstructor($instructorIds, $specificNotificcation)
    {
        $instructors = Instructor::whereIn('id', $instructorIds)->get();
        Notification::send($instructors, new SpecificInstructor($specificNotificcation));
    }

    //########################################  Subscription Codes functions #########################################################

    public function allSubscriptionCodes()
    {
        $subscriptionsCodes = SubscriptionCode::all();

        return view('website.admin.subscriptionCode.allSubscriptionCodes', compact('subscriptionsCodes'));
    }

    public function createSubscriptionCode()
    {
        return view('website.admin.subscriptionCode.addSubscriptionCode');
    }

    public function storeSubscriptionCode(Request $request)
    {
        $request->validate([
            'specificBalance' => 'required_without:amount|nullable|numeric',
            'amount' => 'required_without:specificBalance|nullable', // Validate only if specificBalance is null
            'codesQuantity' => 'required|numeric',
        ], [
            'amount.required_without' => 'The amount field is required when specific balance is not provided.',
            'specificBalance.required_without' => 'The specific balance field is required when amount is not selected.',
        ]);

        for ($i = 1; $i <= $request->codesQuantity; $i++) {
            do {
                $subscriptionCode = Str::random(15);
            } while (SubscriptionCode::where('code', $subscriptionCode)->exists());

            //check if specificBalance is null
            if ($request->specificBalance != null)
                SubscriptionCode::create([
                    'code' => $subscriptionCode,
                    'balance' => $request->specificBalance,
                ]);
            else
                SubscriptionCode::create([
                    'code' => $subscriptionCode,
                    'balance' => $request->amount,
                ]);
        }

        return redirect()->back()->with('success', trans('website/messages.you have create ') . $request->codesQuantity . trans('website/messages. Subscription Code'));
    }

    public function addBalance(Request $request)
    {
        $request->validate([
            'ccp_subscription_id' => 'required',
            'student_id' => 'required|exists:users,id', // Assuming students table
            'balance' => 'required|numeric|min:0',
        ]);

        $student = User::find($request->student_id);
        $student->balance += $request->balance;
        $student->save();

        $ccp_subscription = SubscriptionCCP::find($request->ccp_subscription_id);
        $ccp_subscription->status = 1;
        $ccp_subscription->save();

        return redirect()->back()->with('success', trans('website/messages.amount added successfully'));
    }

    public function ajaxFilterSubscriptionCodes(Request $request)
    {
        if ($request->has('status') && $request->has('amount') && $request->specificBalance == null)

            $subscriptionsCodes = SubscriptionCode::where('balance', $request->amount)
                ->where('status', $request->status)
                ->get();

        elseif ($request->has('status') && $request->amount === 'specificAmount' && $request->specificBalance != null)

            $subscriptionsCodes = SubscriptionCode::where('balance', $request->specificBalance)
                ->where('status', $request->status)
                ->get();

        return view('website.admin.subscriptionCode.ajaxFilterSubscriptionCodesByAmount', compact('subscriptionsCodes'));
    }

############################################## ajax filter search ########################################################

    public function ajaxFilterCourse(Request $request)
    {
        if ($request->courseType === 'supportingCourse') {

            //filter just by level
            if ($request->has('supportingCourseLevel') && !$request->has('high_school_year')
                && !$request->has('secondary_school_year') && !$request->has('primary_school_year') && !$request->has('branch')) {
                $sup_courses = SupportingCourse::where('level->en', $request->supportingCourseLevel)->get();
            }

            //search by level and year
            if ($request->has('supportingCourseLevel') && ($request->has('high_school_year')
                    || $request->has('secondary_school_year') || $request->has('primary_school_year')) && !$request->has('branch')) {

                //get the level
                $level = $request->supportingCourseLevel;

                //get the year inserted in request
                if ($request->has('high_school_year')) {
                    $year = $request->high_school_year;
                } elseif ($request->has('secondary_school_year')) {
                    $year = $request->secondary_school_year;
                } elseif ($request->has('primary_school_year')) {
                    $year = $request->primary_school_year;
                }

                $sup_courses = SupportingCourse::where('level->en', $level)
                    ->where('year', $year)
                    ->get();
            }

            //search by level and year and branch
            if ($request->has('supportingCourseLevel') && ($request->has('high_school_year')
                    || $request->has('secondary_school_year') || $request->has('primary_school_year')) && $request->has('branch')) {

                //get the level
                $level = $request->supportingCourseLevel;

                //get the year inserted in request
                if ($request->has('high_school_year')) {
                    $year = $request->input('high_school_year');
                } elseif ($request->has('secondary_school_year')) {
                    $year = $request->input('secondary_school_year');
                } elseif ($request->has('primary_school_year')) {
                    $year = $request->input('primary_school_year');
                }

                //get the branch from request
                $branch = $request->branch;

                $sup_courses = SupportingCourse::where('level->en', $level)
                    ->where('year', $year)
                    ->where('branch->en', $branch)
                    ->get();
            }

            return view('website.admin.coures.supportingCourse.ajaxFilterCourse', compact('sup_courses'));
        }

        if ($request->courseType == 'languagesCourse') {
            //search by level
            if ($request->has('languagesCourseLevel')) {
                $level = $request->languagesCourseLevel;
                $lang_courses = LanguageCourse::where('level->en', $level)
                    ->get();
                return view('website.admin.coures.languagesCourse.ajaxFilterCourse', compact('lang_courses'));
            }
        }

        if ($request->courseType == 'intensiveCourse') {
            //search by level
            if ($request->has('intensiveCourseLevel')) {
                $level = $request->intensiveCourseLevel;
                $inten_courses = IntensiveCourse::where('level->en', $level)
                    ->get();
                return view('website.admin.coures.intensiveCourse.ajaxFilterCourse', compact('inten_courses'));
            }
        }
    }
}
