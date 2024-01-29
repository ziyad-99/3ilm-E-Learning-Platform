<?php

namespace Database\Seeders;

use App\Models\Course\SupportingCourse;
use App\Models\Session;
use BigBlueButton\Parameters\CreateMeetingParameters;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        //get course info
//        $course = SupportingCourse::first();
//        $sessions = $course->sessions;
//
//        //create the meeting
//        $meetingId = uniqid();
//        $meetingName = 'session ' . $sessions->count() + 1;
//
//        $meetingParams = new CreateMeetingParameters($meetingId, $meetingName);
//        $meetingParams->setRecord(true);
//        $meetingParams->setLogoutURL('https://souf.pre-vieweb.com/soufacademy_last11/public/');
//        $meetingParams->setEndCallbackUrl('https://souf.pre-vieweb.com/soufacademy_last11/public/');
//
//        $meetInfo = \Bigbluebutton::create($meetingParams);

        DB::table('sessions')->delete();
//        DB::table('sessions')->insert(
//            [
//                'name' => $meetingName,
//                'courseable_id' => $course->id,
//                'courseable_type' => 'App\Models\Course\SupportingCourse',
//                'meetingID' => $meetingId,
//                'attendeePW' => $meetInfo['attendeePW'],
//                'moderatorPW' => $meetInfo['moderatorPW'],
//                'startDate' => now(),
////                'logoutURL',
////                'endCallbackUrl',
////                'recordedLink',
//                'status' => 1,
//            ]
//        );
//
//        Session::factory()->count(20)->create();
    }
}
