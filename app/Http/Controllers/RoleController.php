<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('website.admin.roleAndPermission.role.allRole', compact('roles'));
    }

    public function create()
    {
        return view('website.admin.roleAndPermission.role.addRole');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // get all the permissions selecteds
        $selectedPermissions = [];
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
        foreach ($permissionsNames as $permissionsName) {
            if ($request->has($permissionsName)) {
                // Checkbox is selected, add its value to the array
                $selectedPermissions[] = $request->input($permissionsName);
            }
        }

        // create role and add the permissions
        $role = Role::create([
            'name' => $request->name,
        ]);
        $role->syncPermissions($selectedPermissions);

        return redirect()->back()->with('success', trans('admin/admin.The role add successfully'));
    }

    public function editRole(Request $request)
    {
        //get the role
        $role = Role::findById($request->role_id);

        // get the role permissions and remove it
        $permissions = $role->permissions->pluck('name');

        return view('website.admin.roleAndPermission.role.editRole', compact('role', 'permissions'));
    }

    public function updateRole(Request $request)
    {
        //get the role
        $role = Role::findById($request->role_id);

        // get all the permissions selected
        $selectedPermissions = [];
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

        foreach ($permissionsNames as $permissionsName) {
            if ($request->has($permissionsName)) {
                // Checkbox is selected, add its value to the array
                $selectedPermissions [] = $request->input($permissionsName);
            }
        }

        // get the role permissions and remove it
        $permissions = $role->permissions;
        $role->revokePermissionTo($permissions);

        // add the new permissions
        $role->syncPermissions($selectedPermissions);

        //update the role name
        $role->name = $request->name;
        $role->save();

        return redirect()->back()->with('success', trans('admin/admin.The role was updated successfully'));
    }

    public function deleteRole(Request $request)
    {
        $role = Role::findById($request->role_id);

        $role->delete();

        return redirect()->back()->with('warning', trans('admin/admin.The role deleted successfully'));
    }
}
