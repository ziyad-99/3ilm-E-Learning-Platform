@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/allSubscriptions.subscription_panel') }}
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl  lg:leading-[120%] ">
                <span>{{ trans('admin/allSubscriptions.subscription_panel') }}</span>
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

        </div>
        <div>
            <div id="ajax_search_result">
                <table class="table admin" datatable id="datatable-search-list">
                    <thead>
                    <tr class="bg-orange/30">
                        <th class="font-bold uppercase text-orange text-xxs opacity-70"></th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allSubscriptions.name') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allSubscriptions.email') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allSubscriptions.subject') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.CourseType') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allSubscriptions.time') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/addAdmin.status') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($subscriptions as $subscription)
                        <tr>
                            <td class="text-sm font-medium text-black34 fontp flex items-center leading-normal">
                                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                                    {{ $loop->iteration }}
                                </a>
                            </td>

                            <td class="text-sm font-medium text-black34 fontp leading-normal">
                                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                                    {{ $subscription->student->lastName }},
                                    {{ $subscription->student->firstName }}
                                </a>
                            </td>

                            <td class="text-sm font-normal text-black34 fontp leading-normal">
                                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                                    {{ $subscription->student->email }}
                                </a>
                            </td>
                            <td class="text-sm font-normal text-black34 fontp leading-normal">
                                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                                    {{ $subscription->courseable->title }}
                                </a>
                            </td>

                            <td class="text-sm font-normal text-black34 fontp leading-normal">
                                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                                    @if($subscription->courseable_type === 'App\Models\Course\SupportingCourse')
                                        {{ trans('admin/coursesPanel.supporting_courses') }}
                                    @elseif($subscription->courseable_type === 'App\Models\Course\LanguageCourse')
                                        {{ trans('admin/coursesPanel.languages_courses') }}
                                    @elseif($subscription->courseable_type === 'App\Models\Course\IntensiveCourse')
                                        {{ trans('admin/coursesPanel.intensive_courses') }}
                                    @endif
                                </a>
                            </td>

                            <td class="text-sm font-normal text-black34 fontp leading-normal">
                                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                                    {{ $subscription->created_at }}
                                </a>
                            </td>

                            <td class="text-sm font-normal text-black34 fontp leading-normal">
                                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                                    @if($subscription->status)
                                        {{ trans('admin/admin.Accepted') }}
                                    @else
                                        {{ trans('admin/admin.Notyet') }}
                                    @endif
                                </a>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                    url: "{{ route('admin.ajaxFilterSubscriptionByCourse') }}", // Get the form's action attribute
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
@endsection
