<?php

namespace Database\Seeders;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enrollments')->delete();
//        DB::table('enrollments')->insert(
//            [
//                'student_id' => 1,
//                'courseable_id' => SupportingCourse::first()->id,
//                'courseable_type' => 'App\Models\Course\SupportingCourse',
//                'date' => now(),
//            ]);
//
//        DB::table('enrollments')->insert(
//            [
//                'student_id' => 1,
//                'courseable_id' => LanguageCourse::first()->id,
//                'courseable_type' => 'App\Models\Course\LanguageCourse',
//                'date' => now(),
//            ]);
//
//        DB::table('enrollments')->insert(
//            [
//                'student_id' => 1,
//                'courseable_id' => IntensiveCourse::first()->id,
//                'courseable_type' => 'App\Models\Course\IntensiveCourse',
//                'date' => now(),
//            ]);
        Enrollment::factory()->count(20)->create();
    }
}
