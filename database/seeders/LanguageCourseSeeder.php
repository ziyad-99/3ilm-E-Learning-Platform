<?php

namespace Database\Seeders;

use App\Models\Course\LanguageCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language_courses')->delete();
        LanguageCourse::factory()->count(20)->create();
    }
}
