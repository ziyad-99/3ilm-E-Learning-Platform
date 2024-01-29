<?php

namespace App\Http\Controllers;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Enrollment;
use App\Models\Group;
use App\Models\Session;
use App\Models\User;
use App\Notifications\CreateMeeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use BigBlueButton\Parameters\CreateMeetingParameters;
use Illuminate\Support\Facades\Notification;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use Illuminate\Support\Facades\Auth;

class BBBController extends Controller
{
    public function createSession(Request $request)
    {
        if ($request->courseType === 'supportingCourse') {
            $courseType = 'supportingCourse';
            $course = SupportingCourse::where('slug', $request->slug)->first();
        }

        if ($request->courseType === 'languagesCourse') {
            $courseType = 'languagesCourse';
            $course = LanguageCourse::where('slug', $request->slug)->first();
        }

        if ($request->courseType === 'intensiveCourse') {
            $courseType = 'intensiveCourse';
            $course = IntensiveCourse::where('slug', $request->slug)->first();
        }

        return view('website.instructor.session.createSession', compact('courseType', 'course'));
    }

    public function storeMeeting(Request $request)
    {
//        return $request;
        $request->validate([
            'meetingName' => 'required|string|max:255',
            'group_id' => 'required|exists:groups,id',
            'startTime' => 'required|date_format:H:i',
            'startDate' => 'required|date',
        ]);

        if ($request->courseType === 'supportingCourse') {

            // Merge startTime and startDate strings
            $dateTimeString = $request->startDate . ' ' . $request->startTime;

            // Parse the combined string into a Carbon instance
            $startTime = Carbon::parse($dateTimeString)->format('Y-m-d H:i:s');

            //get course info
            $course = SupportingCourse::where('slug', $request->slug)->first();

            //get the last session of group
            $group_id = $request->group_id;
            $group = Group::find($group_id);
            $all_session = $group->sessions;

            //create the meeting
            $meetingId = uniqid();
            $sessionName = $request->meetingName . ' ' . $all_session->count() + 1;

            //store meeting info in session table
            $session = Session::create([
                'name' => $sessionName,
                'courseable_id' => $course->id,
                'courseable_type' => 'App\Models\Course\SupportingCourse',
                'group_id' => $request->group_id,
//                'meetingID' => $meetingId,
                'startDate' => $startTime,
            ]);

            //notify user who enroll in this course session was created
            $this->notifySpecificUser($course->id, $request->courseType, $session->id);

            return redirect()->route('instructor.mycourse')->with('success', trans('website/messages.you have create new session'));
        }

        if ($request->courseType === 'intensiveCourse') {

            // Merge startTime and startDate strings
            $dateTimeString = $request->startDate . ' ' . $request->startTime;

            // Parse the combined string into a Carbon instance
            $startTime = Carbon::parse($dateTimeString)->format('Y-m-d H:i:s');

            //get course info
            $course = IntensiveCourse::where('slug', $request->slug)->first();

            //get the last session of group
            $group_id = $request->group_id;
            $group = Group::find($group_id);
            $all_session = $group->sessions;

            //create the meeting
            $meetingId = uniqid();
            $sessionName = $request->meetingName . ' ' . $all_session->count() + 1;

            //store meeting info in database
            $session = Session::create([
                'name' => $sessionName,
                'courseable_id' => $course->id,
                'courseable_type' => 'App\Models\Course\IntensiveCourse',
                'group_id' => $request->group_id,
//                'meetingID' => $meetingId,
                'startDate' => $startTime,
            ]);

            //notify user who enroll in this course session was created
            $this->notifySpecificUser($course->id, $request->courseType, $session->id);

            return redirect()->route('instructor.mycourse')->with('success', trans('website/messages.you have create new session'));
        }

        if ($request->courseType === 'languagesCourse') {

            // Merge startTime and startDate strings
            $dateTimeString = $request->startDate . ' ' . $request->startTime;

            // Parse the combined string into a Carbon instance
            $startTime = Carbon::parse($dateTimeString)->format('Y-m-d H:i:s');

            //get course info
            $course = LanguageCourse::where('slug', $request->slug)->first();

            //get the last session of group
            $group_id = $request->group_id;
            $group = Group::find($group_id);
            $all_session = $group->sessions;

            //generate session name and meeting id
            $meetingId = uniqid();
            $sessionName = $request->meetingName . ' ' . $all_session->count() + 1;

            //store meeting info in database
            $session = Session::create([
                'name' => $sessionName,
                'courseable_id' => $course->id,
                'courseable_type' => 'App\Models\Course\LanguageCourse',
                'group_id' => $request->group_id,
//                'meetingID' => $meetingId,
                'startDate' => $startTime,
            ]);

            //notify user who enroll in this course session was created
            $this->notifySpecificUser($course->id, $request->courseType, $session->id);

            return redirect()->route('instructor.mycourse')->with('success', trans('website/messages.you have create new session'));
        }
    }

    public function notifySpecificUser($courseId, $courseType, $sessionId)
    {
        $users = [];

        if ($courseType === 'supportingCourse') {
            $course = SupportingCourse::find($courseId);

            $session = Session::find($sessionId);

            //get the students of the group
            $members = $session->group->members;
            foreach ($members as $member) {
                $users [] = $member->user;
            }
        }

        if ($courseType === 'languagesCourse') {
            $course = LanguageCourse::find($courseId);

            $session = Session::find($sessionId);

            //get the students of the group
            $members = $session->group->members;
            foreach ($members as $member) {
                $users [] = $member->user;
            }
        }

        if ($courseType === 'intensiveCourse') {
            $course = IntensiveCourse::find($courseId);

            $session = Session::find($sessionId);

            //get the students of the group
            $members = $session->group->members;
            foreach ($members as $member) {
                $users [] = $member->user;
            }
        }

        Notification::send($users, new CreateMeeting($course->title, $session->name, $session->startDate, $session->id));
    }

    public function startMeeting(Request $request)
    {
        //get the session info
        $session = Session::find($request->session_id);

        //check if meeting is ended
        if ($session->status) {

            //check if the meeting was created
            if ($session->meetingID == null) {

                //generate meetingID
                $meetingID = uniqid();

                //create the meeting
                $meetingParams = new CreateMeetingParameters($meetingID, $session->name);
                $meetingParams->setRecord(true);
//                $meetingParams->setAutoStartRecording(true);
                $meetingParams->setEndCallbackUrl(env('BBB_END_URL'));
                $meetingParams->setMeetingEndedURL(env('BBB_END_URL') . $meetingID);
                $meetingParams->setLogoutURL(env('BBB_LOG_OUT_URL'));
//                $meetingParams->isAllowModsToEjectCameras();
                $meetingParams->setWelcome('مرحبا بك في منصة علم لتعليم عن بعد');
//                $meetingParams->setLockSettingsDisablePublicChat(true);
                $meetingParams->setEndWhenNoModeratorDelayInMinutes(5);
                $meetingParams->setDuration(20000);
//                $meetingParams->setRecord(true);
//                $meetingParams->setMaxParticipants(10);
//                $meetingParams->setModeratorOnlyMessage('Moderator message');
                $meetingParams->setAutoStartRecording(true);
//                $meetingParams->setMuteOnStart(true);

                $meetInfo = \Bigbluebutton::create($meetingParams);

                //save the passwords moderator and attendee in the session
                $session->meetingID = $meetInfo['meetingID'];
                $session->attendeePW = $meetInfo['attendeePW'];
                $session->moderatorPW = $meetInfo['moderatorPW'];
                $session->save();

                //start the meeting after created
                $url = \Bigbluebutton::start([
                    'meetingID' => $session->meetingID,
                    'meetingName' => $session->name,
                    'moderatorPW' => $session->moderatorPW, //moderator password set here
                    'attendeePW' => $session->attendeePW, //attendee password here
                    'userName' => Auth::guard('instructor')->user()->firstName,//for join meeting
                    'redirect' => true // only want to create and meeting and get join url then use this parameter
                ]);
                return redirect()->to($url);

            } else {
                //meeting status
                $isRunning = Bigbluebutton::isMeetingRunning($session->meetingID);
                if ($isRunning)
                    return redirect()->to(
                        Bigbluebutton::join([
                            'meetingID' => $session->meetingID,
                            'userName' => Auth::guard('instructor')->user()->firstName,
                            'password' => $session->moderatorPW, //which user role want to join set password here
                        ])
                    );
            }
        } else {
//            return redirect()->back()->with('warning', trans('website/messages.Session was ended'));
            return $this->sessionWasEnded();
        }
    }

    public function startSpecificMeeting(Request $request)
    {
        if ($request->courseType === 'supportingCourse') {

            //get the session
            $session = Session::find($request->session_id);

            //check if meeting is running or not
            $status = $this->isMeetingRunning($session->meetingID);

            // join if the meeting running
            if ($status) {
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $session->meetingID,
                        'userName' => Auth::guard('instructor')->user()->firstName,
                        'password' => $session->moderatorPW, //which user role want to join set password here
                    ])
                );
            } else {
                //check if the session was ended
                if ($session->status) {
                    $url = \Bigbluebutton::start([
                        'meetingID' => $session->meetingID,
                        'meetingName' => $session->name,
                        'moderatorPW' => $session->moderatorPW, //moderator password set here
                        'attendeePW' => $session->attendeePW, //attendee password here
                        'userName' => Auth::guard('instructor')->user()->firstName,//for join meeting
                        'redirect' => true // only want to create and meeting and get join url then use this parameter
                    ]);
                    return redirect()->to($url);
                } else {
                    //if the meeting is ended
//                    return redirect()->back()->with('warning', trans('website/messages.The last session was ended'));
                    return $this->sessionWasEnded();
                }
            }
        }

        if ($request->courseType === 'languagesCourse') {

            //get the session
            $session = Session::find($request->session_id);

            //check if meeting is running or not
            $status = $this->isMeetingRunning($session->meetingID);

            // join if the meeting running
            if ($status) {
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $session->meetingID,
                        'userName' => Auth::guard('instructor')->user()->firstName,
                        'password' => $session->moderatorPW, //which user role want to join set password here
                    ])
                );
            } else {
                //check if the session was ended
                if ($session->status) {
                    $url = \Bigbluebutton::start([
                        'meetingID' => $session->meetingID,
                        'meetingName' => $session->name,
                        'moderatorPW' => $session->moderatorPW, //moderator password set here
                        'attendeePW' => $session->attendeePW, //attendee password here
                        'userName' => Auth::guard('instructor')->user()->firstName,//for join meeting
                        'redirect' => true // only want to create and meeting and get join url then use this parameter
                    ]);
                    return redirect()->to($url);
                } else {
                    //if the meeting is ended
//                    return redirect()->back()->with('warning', trans('website/messages.The last session was ended'));
                    return $this->sessionWasEnded();
                }
            }
        }

        if ($request->courseType === 'intensiveCourse') {

            //get the session
            $session = Session::find($request->session_id);

            //check if meeting is running or not
            $status = $this->isMeetingRunning($session->meetingID);

            // join if the meeting running
            if ($status) {
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $session->meetingID,
                        'userName' => Auth::guard('instructor')->user()->firstName,
                        'password' => $session->moderatorPW, //which user role want to join set password here
                    ])
                );
            } else {
                //check if the session was ended
                if ($session->status) {
                    $url = \Bigbluebutton::start([
                        'meetingID' => $session->meetingID,
                        'meetingName' => $session->name,
                        'moderatorPW' => $session->moderatorPW, //moderator password set here
                        'attendeePW' => $session->attendeePW, //attendee password here
                        'userName' => Auth::guard('instructor')->user()->firstName,//for join meeting
                        'redirect' => true // only want to create and meeting and get join url then use this parameter
                    ]);
                    return redirect()->to($url);
                } else {
                    //if the meeting is ended
//                    return redirect()->back()->with('warning', trans('website/messages.The last session was ended'));
                    return $this->sessionWasEnded();
                }
            }
        }
    }

    public function studentJoinMeeting(Request $request)
    {
        $session = Session::find($request->session_id);

        //check session is ended
        if ($session->status == 0)
//            return redirect()->back()->with('warning', trans('website/messages.Session was ended'));

            return $this->sessionWasEnded();

        // Get the current time as a Carbon instance
        $now = Carbon::now();

        // Assuming $session->startDate is a string in "Y-m-d H:i:s" format
        $startDate = Carbon::parse($session->startDate);

        //check if the time now is greater than the startDate
        if ($now->gte($startDate)) {

            //check if the meeting is created
            if ($session->meetingID == null) {
//                return redirect()->back()->with('warning', trans('website/messages.the session not started yet'));

                return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                    <p class="btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class="text-white font-bold text-sm">
                            <strong>' . trans('website/messages.the session not started yet') . '</strong>
                            <br>
                            <a href="" onclick="window.top.location.reload();">' . trans('website/website.(Please Refresh The page)') . '</a>
                        </span>
                    </p>
                </div>';

            } else {
                return redirect()->to(
                    Bigbluebutton::join([
                        'meetingID' => $session->meetingID,
                        'userName' => Auth::guard('web')->user()->firstName,
                        'password' => $session->attendeePW, //which user role want to join set password here
                    ])
                );
            }
        } else {
            // Split the $startDate into date and time components
            list($dateString, $timeString) = explode(' ', $startDate);

            // Create Carbon instances for date and time
            $date = Carbon::parse($dateString)->format('Y-m-d');
            $time = Carbon::parse($timeString)->format('H:i:s');

//            return redirect()->back()->with('warning', trans('website/messages.the session start on ') . $date . trans('website/messages. at ') . $time);

            $time = Carbon::createFromFormat('H:i:s', $timeString)->format('H:i');

            return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                    <p class="btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class="text-white font-bold text-sm">
                            <strong>' . trans('website/messages.the session start on ') . $date . trans('website/messages. at ') . $time . '</strong>
                            <br>
                        </span>
                            <a href="" onclick="window.top.location.reload();">' . trans('website/website.(Please Refresh The page)') . '</a>
                    </p>
                </div>';
        }
    }

    public function recordeLink(Request $request)
    {
        $recorde = \Bigbluebutton::getRecordings([
            'meetingID' => $request->meeting_id,
        ]);

        //check if recorde is Empty
        $isRecorded = $recorde->has("0");

        if ($isRecorded)
            return redirect($recorde[0]['playback']['format']['url']);
        else
//            return redirect()->back()->with('warning', trans('website/messages.There are no recorde in this session'));

            return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                        <p class="btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                            <span class="text-white font-bold text-sm">
                                <strong>' . trans("website/messages.you have logged out from session") . '</strong>
                                <br>
                                <a href="" onclick="window.top.location.reload();">' . trans('website/website.(Please Refresh The page)') . '</a>
                            </span>
                        </p>
                    </div>';
    }

    public function endMeeting(Request $request)
    {
        //change the session status to ended
        $session = Session::where('meetingID', $request->meetingID)->first();
        $session->status = 0;

        //get the recorde and store the link
        $recorde = \Bigbluebutton::getRecordings([
            'meetingID' => $request->meeting_id,
        ]);
        //check if recorde is Empty
        $isRecorded = $recorde->has("0");
        if ($isRecorded)
            $session->recordedLink = $recorde[0]['playback']['format']['url'];
        else
            $session->recordedLink = null;

        $session->save();
    }

    public function logoutMeeting()
    {

//        return redirect()->route('instructor.mycourse')->with('warning', trans('website/messages.you have logged out from session'));

        return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                    <p class="btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class="text-white font-bold text-sm">
                            <strong>' . trans("website/messages.you have logged out from session") . '</strong>
                        <br>
                            <a href="" onclick="window.top.location.reload();">' . trans('website/website.(Please Refresh The page)') . '</a>
                        </span>
                    </p>
                </div>';
    }

    public function isMeetingRunning(string $meetingID)
    {
        //check if meeting is running
        $status = Bigbluebutton::isMeetingRunning([
            'meetingID' => $meetingID,
        ]);

        return $status;
    }

    public function sessionWasEnded()
    {
        return '<div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                    <p class="btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class="text-white font-bold text-sm">
                            <strong>' . trans('website/messages.The last session was ended') . '</strong>
                            <br>
                            <a href="" onclick="window.top.location.reload();">' . trans('website/website.(Please Refresh The page)') . '</a>
                        </span>
                    </p>
                </div>';
    }
}
