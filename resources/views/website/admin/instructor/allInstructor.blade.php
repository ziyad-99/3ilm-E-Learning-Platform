@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/allIntructors.instructor_panel') }}
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/allIntructors.instructor_panel') }}</span>
            </h4>

            <form action="" method="post">
                @csrf
                <div class="w-full  mb-4 max-w-full px-3 flex-0">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 d  rounded-2xl bg-clip-border">
                        <div
                            class="border-x-gray/12.5 flex items-center  justify-between rounded-t-2xl border-b-0 border-solid p-6">

                            <div class="md:w-8/12 flex gap-2">

                                <div class="md:w-4/12 flex gap-2">
                                    <select class="inputtext select1" name="courseType" id="courseType">
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.SelectCourseType') }}</option>
                                        <option
                                            value="supportingCourse">{{ trans('admin/admin.SupportingCourse') }}</option>
                                        <option
                                            value="languagesCourse">{{ trans('admin/admin.LanguagesCourse') }}</option>
                                        <option
                                            value="intensiveCourse">{{ trans('admin/admin.IntensiveCourse') }}</option>
                                    </select>
                                </div>

                                <div class="md:w-4/12 gap-2" id="supportingCourseLevels" style="display: none;">
                                    <select class="inputtext" name="supportingCourseLevel"
                                            id="supportingCourseLevelValue">
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.SelectLevel') }}</option>
                                        <option value="High School">{{ trans('admin/admin.HighSchool') }}</option>
                                        <option
                                            value="Secondary School">{{ trans('admin/admin.SecondarySchool') }}</option>
                                        <option value="Primary School">{{ trans('admin/admin.PrimarySchool') }}</option>
                                    </select>
                                </div>

                                <div class="md:w-2/12 gap-2" id="highSchoolYears" style="display: none;">
                                    <select class="inputtext" name="high_school_year">
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.SelectYear') }}</option>
                                        <option value="1as">{{ trans('admin/admin.1as') }}</option>
                                        <option value="2as">{{ trans('admin/admin.2as') }}</option>
                                        <option value="3as">{{ trans('admin/admin.3as') }}</option>
                                    </select>
                                </div>

                                <div class="md:w-2/12 gap-2" id="secondarySchoolYears" style="display: none;">
                                    <select class="inputtext" name="secondary_school_year">
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.SelectYear') }}</option>
                                        <option value="1am">{{ trans('admin/admin.1am') }}</option>
                                        <option value="2am">{{ trans('admin/admin.2am') }}</option>
                                        <option value="3am">{{ trans('admin/admin.3am') }}</option>
                                        <option value="4am">{{ trans('admin/admin.4am') }}</option>
                                    </select>
                                </div>

                                <div class="md:w-2/12 gap-2" id="primarySchoolYears" style="display: none;">
                                    <select class="inputtext" name="primary_school_year">
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.SelectYear') }}</option>
                                        <option value="1ap">{{ trans('admin/admin.1ap') }}</option>
                                        <option value="2ap">{{ trans('admin/admin.2ap') }}</option>
                                        <option value="3ap">{{ trans('admin/admin.3ap') }}</option>
                                        <option value="4ap">{{ trans('admin/admin.4ap') }}</option>
                                        <option value="5ap">{{ trans('admin/admin.5ap') }}</option>
                                    </select>
                                </div>

                                <div class="md:w-2/12 gap-2" id="languagesCourseLevels" style="display: none;">
                                    <select class="inputtext" name="languagesCourseLevel"
                                            id="languagesCourseLevelValue">
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.SelectLevel') }}</option>
                                        <option value="Beginner">{{ trans('admin/admin.Beginner') }}</option>
                                        <option value="Intermediate">{{ trans('admin/admin.Intermediate') }}</option>
                                        <option value="Advanced">{{ trans('admin/admin.Advanced') }}</option>
                                    </select>
                                </div>

                                <div class="md:w-2/12 gap-2" id="intensiveCourseLevels" style="display: none;">
                                    <select class="inputtext" name="intensiveCourseLevel"
                                            id="intensiveCourseLevelValue">
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.SelectLevel') }}</option>
                                        <option value="Beginner">{{ trans('admin/admin.Beginner') }}</option>
                                        <option value="Intermediate">{{ trans('admin/admin.Intermediate') }}</option>
                                        <option value="Advanced">{{ trans('admin/admin.Advanced') }}</option>
                                    </select>
                                </div>

                                <button type="submit"
                                        class=" btn items-center justify-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] flex px-6">
                                <span class="text-white font-bold text-sm">
                                    {{ trans('admin/admin.Filter') }}
                                </span>
                                </button>
                            </div>
            </form>

            @can('add_instructor')
                <a href="{{ route('admin.addInstructor') }}"
                   class=" btn items-center mt-5 justify-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] flex px-6">
                            <span
                                class=" text-white font-bold text-sm ">{{ trans('admin/allIntructors.add_instructor') }}</span>
                </a>
            @endcan

        </div>
        <div>
            <div id="ajax_search_result">
                <table class="table admin" datatable id="datatable-search-list">
                    <thead>
                    <tr class="bg-orange/30">
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allIntructors.Image') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allIntructors.Name') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allIntructors.Phone Number') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allIntructors.Wilaya') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allIntructors.Status') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allIntructors.Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($instructors as $instructor)
                        <tr>
                            <td>
                                <div class="text-white text-sm flex gap-2 font-semibold w-[100px] ">
                                    <img class="h-auto  w-12 object-contain relative"
                                         src="{{ asset('images/profiles/'.$instructor->photo) }}"/>
                                </div>
                            </td>

                            <td class="text-sm font-medium text-black34 fontp leading-normal">
                                {{ $instructor->firstName }}
                            </td>

                            <td class="text-sm font-normal text-black34 fontp leading-normal">
                                {{ $instructor->phone }}
                            </td>

                            <td class="text-sm font-normal text-black34 fontp leading-normal">
                                {{ $instructor->state }}
                            </td>

                            <td class="text-sm font-normal text-black34 fontp leading-normal">
                                <div class=" w-full mt-4">
                                    @can('change_status_instructor')
                                        <form
                                            action="{{ route('admin.activeOrDisableInstructor', ['instructor_id' => $instructor->id]) }}"
                                            method="post">
                                            @csrf
                                            <select class="inputtext " name="status" onchange="this.form.submit()">
                                                <option value="1"
                                                    {{ $instructor->status == 1 ? 'selected' : ''}}>
                                                    {{ trans('admin/editInstructor.active') }}
                                                </option>

                                                <option
                                                    value="0" {{ $instructor->status == 0 ? 'selected' : ''}}>
                                                    {{ trans('admin/admin.Disabled') }}
                                                </option>
                                            </select>
                                        </form>
                                    @endcan
                                </div>
                            </td>

                            <td class="text-sm font-normal leading-normal">
                                <div class="relative text-sm group justify-end gap-2 flex font-semibold ">

                                    @can('edit_instructor')
                                        <a href="{{ route('admin.instructorProfile', ['instructor_id' => $instructor->id]) }}"
                                           type="button" onclick="openPop('.flexsss23')"
                                           class=" rounded-2xl w-10 h-10 items-center justify-center flex  bg-gray/20">
                                            <svg class="w-5 h-5 fill-gray/50" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15 22.75H9C3.57 22.75 1.25 20.43 1.25 15V9C1.25 3.57 3.57 1.25 9 1.25H11C11.41 1.25 11.75 1.59 11.75 2C11.75 2.41 11.41 2.75 11 2.75H9C4.39 2.75 2.75 4.39 2.75 9V15C2.75 19.61 4.39 21.25 9 21.25H15C19.61 21.25 21.25 19.61 21.25 15V13C21.25 12.59 21.59 12.25 22 12.25C22.41 12.25 22.75 12.59 22.75 13V15C22.75 20.43 20.43 22.75 15 22.75Z"
                                                    fill="#7e7e7e"/>
                                                <path
                                                    d="M8.50002 17.69C7.89002 17.69 7.33002 17.47 6.92002 17.07C6.43002 16.58 6.22002 15.87 6.33002 15.12L6.76002 12.11C6.84002 11.53 7.22002 10.78 7.63002 10.37L15.51 2.49C17.5 0.499998 19.52 0.499998 21.51 2.49C22.6 3.58 23.09 4.69 22.99 5.8C22.9 6.7 22.42 7.58 21.51 8.48L13.63 16.36C13.22 16.77 12.47 17.15 11.89 17.23L8.88002 17.66C8.75002 17.69 8.62002 17.69 8.50002 17.69ZM16.57 3.55L8.69002 11.43C8.50002 11.62 8.28002 12.06 8.24002 12.32L7.81002 15.33C7.77002 15.62 7.83002 15.86 7.98002 16.01C8.13002 16.16 8.37002 16.22 8.66002 16.18L11.67 15.75C11.93 15.71 12.38 15.49 12.56 15.3L20.44 7.42C21.09 6.77 21.43 6.19 21.48 5.65C21.54 5 21.2 4.31 20.44 3.54C18.84 1.94 17.74 2.39 16.57 3.55Z"
                                                    fill="#7e7e7e"/>
                                                <path
                                                    d="M19.85 9.83003C19.78 9.83003 19.71 9.82003 19.65 9.80003C17.02 9.06003 14.93 6.97003 14.19 4.34003C14.08 3.94003 14.31 3.53003 14.71 3.41003C15.11 3.30003 15.52 3.53003 15.63 3.93003C16.23 6.06003 17.92 7.75003 20.05 8.35003C20.45 8.46003 20.68 8.88003 20.57 9.28003C20.48 9.62003 20.18 9.83003 19.85 9.83003Z"
                                                    fill="#7e7e7e"/>
                                            </svg>


                                        </a>
                                    @endcan

                                    @can('delete_instructor')
                                        <a id="deleteInstructor"
                                           href="{{ route('admin.deleteInstructor', ['instructor_id'=>$instructor->id]) }}"
                                           type="button" onclick="openPop('.flexsss24')"
                                           class=" rounded-2xl w-10 h-10 items-center justify-center flex  bg-red-500/20">

                                            <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24"
                                                 fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21 6.73C20.98 6.73 20.95 6.73 20.92 6.73C15.63 6.2 10.35 6 5.12 6.53L3.08 6.73C2.66 6.77 2.29 6.47 2.25 6.05C2.21 5.63 2.51 5.27 2.92 5.23L4.96 5.03C10.28 4.49 15.67 4.7 21.07 5.23C21.48 5.27 21.78 5.64 21.74 6.05C21.71 6.44 21.38 6.73 21 6.73Z"
                                                    fill="#ef4444"/>
                                                <path
                                                    d="M8.5 5.72C8.46 5.72 8.42 5.72 8.37 5.71C7.97 5.64 7.69 5.25 7.76 4.85L7.98 3.54C8.14 2.58 8.36 1.25 10.69 1.25H13.31C15.65 1.25 15.87 2.63 16.02 3.55L16.24 4.85C16.31 5.26 16.03 5.65 15.63 5.71C15.22 5.78 14.83 5.5 14.77 5.1L14.55 3.8C14.41 2.93 14.38 2.76 13.32 2.76H10.7C9.64 2.76 9.62 2.9 9.47 3.79L9.24 5.09C9.18 5.46 8.86 5.72 8.5 5.72Z"
                                                    fill="#ef4444"/>
                                                <path
                                                    d="M15.21 22.75H8.79C5.3 22.75 5.16 20.82 5.05 19.26L4.4 9.19C4.37 8.78 4.69 8.42 5.1 8.39C5.52 8.37 5.87 8.68 5.9 9.09L6.55 19.16C6.66 20.68 6.7 21.25 8.79 21.25H15.21C17.31 21.25 17.35 20.68 17.45 19.16L18.1 9.09C18.13 8.68 18.49 8.37 18.9 8.39C19.31 8.42 19.63 8.77 19.6 9.19L18.95 19.26C18.84 20.82 18.7 22.75 15.21 22.75Z"
                                                    fill="#ef4444"/>
                                                <path
                                                    d="M13.66 17.25H10.33C9.92 17.25 9.58 16.91 9.58 16.5C9.58 16.09 9.92 15.75 10.33 15.75H13.66C14.07 15.75 14.41 16.09 14.41 16.5C14.41 16.91 14.07 17.25 13.66 17.25Z"
                                                    fill="#ef4444"/>
                                                <path
                                                    d="M14.5 13.25H9.5C9.09 13.25 8.75 12.91 8.75 12.5C8.75 12.09 9.09 11.75 9.5 11.75H14.5C14.91 11.75 15.25 12.09 15.25 12.5C15.25 12.91 14.91 13.25 14.5 13.25Z"
                                                    fill="#ef4444"/>
                                            </svg>

                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class=" w-full ">
                {{ $instructors->links('vendor.pagination.soufacademy_pagenation') }}
            </div>
        </div>
    </div>
    </div>
    </div>
    <div onclick="openNav()"
         class="  gg4255 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[10] fixed"></div>
    <div
        class="  gg422 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[1000] fixed">
        <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="72.5" cy="72.5" r="69.5" stroke="#37F807" stroke-width="6"/>
            <path d="M44 74.7767L61.4349 92L108 46" stroke="#37F807" stroke-width="10.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </div>
    </div>
@endsection


@section('js')
    <script>
        var courseTypeSelect = document.getElementById('courseType');

        var supportingCourseLevels = document.getElementById('supportingCourseLevels');
        var supportingCourseLevelValue = document.getElementById('supportingCourseLevelValue');

        var highSchoolYears = document.getElementById('highSchoolYears');
        var secondarySchoolYears = document.getElementById('secondarySchoolYears');
        var primarySchoolYears = document.getElementById('primarySchoolYears');

        var languagesCourseLevels = document.getElementById('languagesCourseLevels');
        var languagesCourseLevelValue = document.getElementById('languagesCourseLevelValue');

        var intensiveCourseLevels = document.getElementById('intensiveCourseLevels');
        var intensiveCourseLevelValue = document.getElementById('intensiveCourseLevelValue');

        courseTypeSelect.addEventListener('change', function () {
            if (this.value === 'supportingCourse') {
                supportingCourseLevels.style.display = 'block';
                supportingCourseLevels.setAttribute('required', 'required');
            } else {
                supportingCourseLevels.style.display = 'none';
                supportingCourseLevels.removeAttribute('required');
                supportingCourseLevelValue.value = "";
                highSchoolYears.style.display = 'none';
                secondarySchoolYears.style.display = 'none';
                primarySchoolYears.style.display = 'none';
            }

            if (this.value === 'languagesCourse') {
                languagesCourseLevels.style.display = 'block';
                languagesCourseLevels.setAttribute('required', 'required');

                // Set the value of the select element to an empty string to remove the selected value
                document.querySelector('select[name="high_school_year"]').value = '';
                document.querySelector('select[name="secondary_school_year"]').value = '';
                document.querySelector('select[name="primary_school_year"]').value = '';
            } else {
                languagesCourseLevels.style.display = 'none';
                languagesCourseLevels.removeAttribute('required');
                languagesCourseLevelValue.value = "";
            }

            if (this.value === 'intensiveCourse') {
                intensiveCourseLevels.style.display = 'block';
                intensiveCourseLevels.setAttribute('required', 'required');

                // Set the value of the select element to an empty string to remove the selected value
                document.querySelector('select[name="high_school_year"]').value = '';
                document.querySelector('select[name="secondary_school_year"]').value = '';
                document.querySelector('select[name="primary_school_year"]').value = '';
            } else {
                intensiveCourseLevels.style.display = 'none';
                intensiveCourseLevels.removeAttribute('required');
                intensiveCourseLevelValue.value = "";
            }
        });

        supportingCourseLevelValue.addEventListener('change', function () {
            if (this.value === 'High School') {
                highSchoolYears.style.display = 'block';
                highSchoolYears.setAttribute('required', 'required');
            } else {
                highSchoolYears.style.display = 'none';
                highSchoolYears.removeAttribute('required');

                // Set the value of the select element to an empty string to remove the selected value
                document.querySelector('select[name="high_school_year"]').value = '';
            }

            if (this.value === 'Secondary School') {
                secondarySchoolYears.style.display = 'block';
                secondarySchoolYears.setAttribute('required', 'required');
            } else {
                secondarySchoolYears.style.display = 'none';
                secondarySchoolYears.removeAttribute('required');

                // Set the value of the select element to an empty string to remove the selected value primarySchoolYears
                document.querySelector('select[name="secondary_school_year"]').value = '';
            }

            if (this.value === 'Primary School') {
                primarySchoolYears.style.display = 'block';
                primarySchoolYears.setAttribute('required', 'required');
            } else {
                primarySchoolYears.style.display = 'none';
                primarySchoolYears.removeAttribute('required');

                // Set the value of the select element to an empty string to remove the selected value
                document.querySelector('select[name="primary_school_year"]').value = '';
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('form').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = $(this).serialize(); // Serialize all form data

                $.ajax({
                    url: "{{ route('admin.ajaxFilterInstructorByCourse') }}", // Get the form's action attribute
                    type: "post", // Get the form's method attribute
                    datatype: "html",
                    cashe: false,
                    data: formData, // Use the serialized form data
                    success: function (data) {
                        $("#ajax_search_result").html(data);
                        console.log(data); // For example, you can log the response data
                    },
                    error: function () {
                        // Handle error here
                    }
                });
            });
        });
    </script>
@endsection
