<?php

namespace Database\Seeders;

use App\Models\Course\SupportingCourse;
use App\Models\Instructor;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SupportingCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('supporting_courses')->delete();
//        DB::table('supporting_courses')->insert(
//            [
//                'title' => ['en' => $titleEn, 'ar' => $titleAr, 'fr' => $titleFr],
//                'description' => ['en' => $descEn, 'ar' => $descAr, 'fr' => $descFr],
//                'instructor_id' => Instructor::first()->id,
//                'status' => 1,
//                'price' => 800,
//                'level' => ['en' => $levelEn, 'ar' => $levelAr, 'fr' => $levelFr],
//                'numberSessions' => 12,
//                'branch' => ['en' => $branchEn, 'ar' => $branchAr, 'fr' => $branchFr],
////            'frameTime' => $this->faker->randomElement([7, 154, 300, 30, 12, 4, 120]),
//                'frameTime' => '010000',
//                'startDate' => '2024-05-12',
//                'slug' => Str::slug($titleEn),
//            ]
//        );
        SupportingCourse::factory()->count(20)->create();
    }
}
