<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            UserSeeder::class,
//            InstructorSeeder::class,
//            SupportingCourseSeeder::class,
//            LanguageCourseSeeder::class,
//            IntensiveCourseSeeder::class,
//            EnrollmentSeeder::class,
//            NotificationSeeder::class,
//            GroupSeeder::class,
//            SessionSeeder::class,
//            WaitingListSeeder::class,
//            RessourceSeeder::class,
//            QuizSeeder::class,
//            QuestionSeeder::class,
//            DiscussionSeeder::class,
//            AdminSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
