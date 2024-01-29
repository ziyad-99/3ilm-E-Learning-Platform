@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.Edit Role') }}
@endsection

@section('content')
    <div class="bg-[#f5f5f5]">
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/admin.Edit Role') }}</span>
            </h4>

            <form class="w-full" action="{{ route('admin.updateRole') }}" method="post">
                @csrf
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex flex-wrap ">
                        <div class=" w-full md:w-7/12">

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2  text-lg ">{{ trans('admin/admin.Role name') }}</p>
                                <input class="inputtext fontp" type="text" name="name"
                                       placeholder="{{ trans('admin/admin.Role name') }}" value="{{ $role->name }}"
                                       required/>
                            </div>
                            <input name="role_id" value="{{ $role->id }}" required hidden>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg">{{ trans('admin/admin.Roles') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_role"
                                                       value="show_role">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.add') }}
                                                <input type="checkbox" name="add_role"
                                                       value="add_role">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Edit') }}
                                                <input type="checkbox" name="edit_role"
                                                       value="edit_role">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete') }}
                                                <input type="checkbox" name="delete_role"
                                                       value="delete_role">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg ">{{ trans('admin/admin.admins') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_admins" value="show_admins">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.add') }}
                                                <input type="checkbox" name="add_admins" value="add_admins">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Edit') }}
                                                <input type="checkbox" name="edit_admins" value="edit_admins">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete') }}
                                                <input type="checkbox" name="delete_admins" value="delete_admins">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg ">{{ trans('admin/admin.Supporting Courses') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_supporting_courses"
                                                       value="show_supporting_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.add') }}
                                                <input type="checkbox" name="add_supporting_courses"
                                                       value="add_supporting_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Edit') }}
                                                <input type="checkbox" name="edit_supporting_courses"
                                                       value="edit_supporting_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete') }}
                                                <input type="checkbox" name="delete_supporting_courses"
                                                       value="delete_supporting_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Change The Courses Status') }}
                                                <input type="checkbox" name="change_status_supporting_courses"
                                                       value="change_status_supporting_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Add students') }}
                                                <input type="checkbox" name="add_student_supporting_courses"
                                                       value="add_student_supporting_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Change the enrollment status') }}
                                                <input type="checkbox"
                                                       name="change_enrollment_status_supporting_courses"
                                                       value="change_enrollment_status_supporting_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg ">{{ trans('admin/admin.Languages Courses') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_languages_courses"
                                                       value="show_languages_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.add') }}
                                                <input type="checkbox" name="add_languages_courses"
                                                       value="add_languages_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Edit') }}
                                                <input type="checkbox" name="edit_languages_courses"
                                                       value="edit_languages_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete') }}
                                                <input type="checkbox" name="delete_languages_courses"
                                                       value="delete_languages_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Change The Courses Status') }}
                                                <input type="checkbox" name="change_status_languages_courses"
                                                       value="change_status_languages_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Add students') }}
                                                <input type="checkbox" name="add_student_languages_courses"
                                                       value="add_student_languages_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Change the enrollment status') }}
                                                <input type="checkbox"
                                                       name="change_enrollment_status_languages_courses"
                                                       value="change_enrollment_status_languages_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg ">{{ trans('admin/admin.Intensive Courses') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_intensive_courses"
                                                       value="show_intensive_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.add') }}
                                                <input type="checkbox" name="add_intensive_courses"
                                                       value="add_intensive_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Edit') }}
                                                <input type="checkbox" name="edit_intensive_courses"
                                                       value="edit_intensive_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete') }}
                                                <input type="checkbox" name="delete_intensive_courses"
                                                       value="delete_intensive_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Change The Courses Status') }}
                                                <input type="checkbox" name="change_status_intensive_courses"
                                                       value="change_status_intensive_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Add students') }}
                                                <input type="checkbox" name="add_student_intensive_courses"
                                                       value="add_student_intensive_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Change the enrollment status') }}
                                                <input type="checkbox"
                                                       name="change_enrollment_status_intensive_courses"
                                                       value="change_enrollment_status_intensive_courses">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg ">{{ trans('admin/admin.Groups') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_groups" value="show_groups">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.add') }}
                                                <input type="checkbox" name="add_groups" value="add_groups">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Edit') }}
                                                <input type="checkbox" name="edit_groups" value="edit_groups">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete') }}
                                                <input type="checkbox" name="delete_groups" value="delete_groups">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg ">{{ trans('admin/admin.Students') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_student" value="show_student">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.add') }}
                                                <input type="checkbox" name="add_student" value="add_student">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Edit') }}
                                                <input type="checkbox" name="edit_student" value="edit_student">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete') }}
                                                <input type="checkbox" name="delete_student" value="delete_student">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Change Status Student') }}
                                                <input type="checkbox" name="change_status_student"
                                                       value="change_status_student">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg ">{{ trans('admin/admin.Instructors') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_instructor" value="show_instructor">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.add') }}
                                                <input type="checkbox" name="add_instructor" value="add_instructor">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Edit') }}
                                                <input type="checkbox" name="edit_instructor" value="edit_instructor">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete') }}
                                                <input type="checkbox" name="delete_instructor"
                                                       value="delete_instructor">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Change Status instructor') }}
                                                <input type="checkbox" name="change_status_instructor"
                                                       value="change_status_instructor">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg ">{{ trans('admin/admin.Contact us') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_contact_us" value="show_contact_us">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.replay on messages') }}
                                                <input type="checkbox" name="replay_contact_us"
                                                       value="replay_contact_us">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete message') }}
                                                <input type="checkbox" name="delete_contact_us"
                                                       value="delete_contact_us">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg">{{ trans('admin/admin.The Courses Subscriptions') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_course_subscription"
                                                       value="show_course_subscription">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Accept the subscriptions') }}
                                                <input type="checkbox" name="accept_course_subscription"
                                                       value="accept_course_subscription">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg">{{ trans('admin/admin.Subscriptions Codes') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_subscriptions_codes"
                                                       value="show_subscriptions_codes">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Generate Subscriptions Codes') }}
                                                <input type="checkbox" name="generate_subscriptions_codes"
                                                       value="generate_subscriptions_codes">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg">{{ trans('admin/admin.Financial reports') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_financial_reports"
                                                       value="show_financial_reports">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg">{{ trans('admin/admin.Notifications') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Send notifications') }}
                                                <input type="checkbox" name="send_notifications"
                                                       value="send_notifications">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-lg">{{ trans('admin/admin.CCP Subscriptions') }}</p>
                                <div class="DaysContainer">
                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.show') }}
                                                <input type="checkbox" name="show_ccp_subscriptions"
                                                       value="show_ccp_subscriptions">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Accept CCP subscriptions') }}
                                                <input type="checkbox" name="accept_ccp_subscriptions"
                                                       value="accept_ccp_subscriptions">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="permission">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.delete') }}
                                                <input type="checkbox" name="delete_ccp_subscriptions"
                                                       value="delete_ccp_subscriptions">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit"
                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class=" text-white font-bold text-sm">{{ trans('admin/admin.Edit Role') }}</span>
                    </button>
                </div>
            </form>

            <script>
                var permissions = @json($permissions ?? []);

                // Get all checkboxes
                const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                // Iterate over each checkbox
                checkboxes.forEach((checkbox) => {
                    // Check if the checkbox name is in the permissions array
                    if (permissions.includes(checkbox.name)) {
                        checkbox.checked = true; // Check the checkbox
                    }
                });
            </script>

            <style>
                .DaysContainer {
                    display: flex;
                    flex-wrap: wrap;
                }

                .DaysContainer > div {
                    flex: 10 10 calc(10%); /* Distribute space for three divs in a row, considering margin */
                    margin-right: 20px;
                    margin-bottom: 20px; /* Space between rows */
                }

                /* Additional styling for individual divs if needed */

            </style>
        </div>
    </div>
    </div>

    <div onclick="openNav()"
         class="  gg4255 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[10] fixed"></div>
    <div class="  gg422 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[1000] fixed">
        <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="72.5" cy="72.5" r="69.5" stroke="#37F807" stroke-width="6"/>
            <path d="M44 74.7767L61.4349 92L108 46" stroke="#37F807" stroke-width="10.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </div>
@endsection


@section('js')
    <script>
        addEventListener("DOMContentLoaded", (event) => {


            function openPop(gg42) {
                document.querySelector(gg42).classList.add('flex');
                document.querySelector(gg42).classList.remove('hidden');
                document.body.classList.add("overflow-hidden");
                document.body.style.height = "100vh";
                document.body.style.position = "fixed";
                document.body.style.width = "100%";
                gg22.classList.add("block");
                gg22.classList.remove("hidden");
            }

            function closePop(gg42) {
                document.querySelector(gg42).classList.remove('flex');
                document.querySelector(gg42).classList.add('hidden');
                document.body.classList.remove("overflow-hidden");
                document.body.style.height = "100%";
                document.body.style.position = "relative";
                document.body.style.width = "100%";

                gg22.classList.remove("block");
                gg22.classList.add("hidden");


            }
        });
        let gg22 = document.querySelector(".gg422");

        function openNav() {
            document.querySelector("#sidebaradmin").classList.toggle('hidden');
            document.querySelector(".gg4255").classList.toggle('hidden');
        }

        function removedone() {
            gg22.classList.remove('flex');
            gg22.classList.add('hidden');

        }

        function Done() {
            gg22.classList.add('flex');
            gg22.classList.remove('hidden');
            setTimeout(removedone, 2000);
        }

        let qqqs = document.querySelectorAll(".qqq");

        function setMouse(e, d) {
            if (e) {
                d.classList.remove("md:w-20");
                d.classList.add("w-56");
                d.style.width = "14rem"
                for (let i = 0; i < qqqs.length; i++) {
                    qqqs[i].classList.remove("md:w-0");
                    qqqs[i].classList.add("w-36");
                }

            } else {
                d.classList.remove("w-56")
                d.classList.add("md:w-20")
                d.style.width = "5rem"
                for (let i = 0; i < qqqs.length; i++) {
                    qqqs[i].classList.add("md:w-0");
                    qqqs[i].classList.remove("w-36");
                }
            }
        }

        function dropdown(name) {
            document.getElementById(name).classList.toggle("show");
        }

        let arr = document.querySelectorAll(".select1");

        window.addEventListener('click', function (e) {

            for (let i = 0; i < arr.length; i++) {
                if (arr[i].parentElement.children[0].contains(e.target)) {
                } else {
                    arr[i].classList.remove('show')

                }
            }


        });

        function dropdownfun(name) {
            name.nextElementSibling.classList.toggle("show");

        }

        function dropdownfun2(name) {
            document.getElementById(name).classList.toggle("show");

        }

    </script>
    <script src="{{ asset('website/admin/js/choices.min.js') }}"></script>
    <script src="{{ asset('website/admin/js/choices.js') }}"></script>
@endsection
