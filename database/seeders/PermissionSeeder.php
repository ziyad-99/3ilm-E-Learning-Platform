<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        DB::table('permissions')->insert(
            [
                [
                    'name' => 'show_role',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'add_role',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'edit_role',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'delete_role',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_admins',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'add_admins',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'edit_admins',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'delete_admins',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_supporting_courses',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'add_supporting_courses',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'edit_supporting_courses',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'delete_supporting_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_languages_courses',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'add_languages_courses',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'edit_languages_courses',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'delete_languages_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_intensive_courses',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'add_intensive_courses',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'edit_intensive_courses',
                    'guard_name' => 'admin',
                ],
                [
                    'name' => 'delete_intensive_courses',
                    'guard_name' => 'admin',
                ],


                [
                    'name' => 'add_student_supporting_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'add_student_languages_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'add_student_intensive_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_groups',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'add_groups',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'edit_groups',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'delete_groups',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_student',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'add_student',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'edit_student',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'delete_student',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_instructor',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'add_instructor',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'edit_instructor',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'delete_instructor',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_contact_us',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'replay_contact_us',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_course_subscription',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'accept_course_subscription',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_subscriptions_codes',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'generate_subscriptions_codes',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_financial_reports',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'send_notifications',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'show_ccp_subscriptions',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'accept_ccp_subscriptions',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'delete_contact_us',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'change_status_supporting_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'change_status_languages_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'change_status_intensive_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'change_status_student',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'change_status_instructor',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'delete_ccp_subscriptions',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'change_enrollment_status_supporting_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'change_enrollment_status_languages_courses',
                    'guard_name' => 'admin',
                ],

                [
                    'name' => 'change_enrollment_status_intensive_courses',
                    'guard_name' => 'admin',
                ],
            ],
        );
    }
}
