<?php

namespace Database\Seeders;

use App\Models\Course\IntensiveCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntensiveCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intensive_courses')->delete();
        IntensiveCourse::factory()->count(20)->create();
    }
}
