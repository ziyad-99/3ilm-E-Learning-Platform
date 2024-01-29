<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'superAdmin',
            'guard_name' => 'admin'
        ]);

        ///assign permissions to super Admin role
        $permissionsNames = [
            'show_role', 'add_role', 'edit_role', 'delete_role',
            'show_admins', 'add_admins', 'edit_admins', 'delete_admins',
            'show_supporting_courses', 'add_supporting_courses', 'edit_supporting_courses', 'delete_supporting_courses', 'add_student_supporting_courses', 'change_status_supporting_courses', 'change_enrollment_status_supporting_courses',
            'show_languages_courses', 'add_languages_courses', 'edit_languages_courses', 'delete_languages_courses', 'add_student_languages_courses', 'change_status_languages_courses', 'change_enrollment_status_languages_courses',
            'show_intensive_courses', 'add_intensive_courses', 'edit_intensive_courses', 'delete_intensive_courses', 'add_student_intensive_courses', 'change_status_intensive_courses', 'change_enrollment_status_intensive_courses',
            'show_groups', 'add_groups', 'edit_groups', 'delete_groups',
            'show_student', 'add_student', 'edit_student', 'delete_student', 'change_status_student',
            'show_instructor', 'add_instructor', 'edit_instructor', 'delete_instructor', 'change_status_instructor',
            'show_contact_us', 'replay_contact_us', 'delete_contact_us',
            'show_course_subscription', 'accept_course_subscription',
            'show_subscriptions_codes', 'generate_subscriptions_codes',
            'show_financial_reports',
            'send_notifications',
            'show_ccp_subscriptions', 'accept_ccp_subscriptions', 'delete_ccp_subscriptions',
        ];
        $role->syncPermissions($permissionsNames);

        // create Super Admin
        $user = Admin::factory()->create([
            'name' => 'Super Admin',
            'address' => 'el-oued',
            'email' => '3ilm@souf.academy',
            'email_verified_at' => now(),
            'phone' => '0500000000',
            'state' => 'el-oued',
            'role' => 'superAdmin',
            'password' => Hash::make('123456789'), // password
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole($role);
    }
}
