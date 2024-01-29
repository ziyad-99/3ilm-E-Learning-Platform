@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.AddGroup') }}
@endsection

@section('content')
    <div class="bg-[#f5f5f5]">
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/admin.AddGroup') }}</span>
            </h4>

            <!-- Display validation errors -->
            @if($errors->any())
                <div class="alert alert-danger" style="
                          display: inline-block;
                          color: red;
                          border-radius: 4%;
                          padding: 5px 10px;
                          margin: 5px 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="myForm" class="w-full" action="{{ route('admin.storeGroup') }}" method="post">
                @csrf
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex flex-wrap ">

                        <div class=" w-full md:w-7/12">
                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.GroupName') }}</p>
                                <input class="inputtext fontp" type="text" name="name"
                                       placeholder="{{ trans('admin/admin.GroupName') }}"
                                       required/>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2 text-sm ">{{ trans('admin/admin.StudyDays') }}</p>
                                <div class="DaysContainer">
                                    <div class="day">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Saturday') }}
                                                <input type="checkbox" name="saturday" value="saturday">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div id="saturdayTime" style="display:none;">
                                            <div style="margin-right: 20px;">
                                                <label for="start-time">{{ trans('admin/admin.StartTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="saturdayStartTime"
                                                       name="saturdayStartTime">
                                            </div>
                                            <div style="margin-right: 20px;">
                                                <label for="end-time">{{ trans('admin/admin.EndTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="saturdayEndTime"
                                                       name="saturdayEndTime">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="day">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">
                                                {{ trans('admin/admin.Sunday') }}
                                                <input type="checkbox" name="sunday" value="sunday"
                                                       placeholder="{{ trans('admin/admin.Sunday') }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div id="sundayTime" style="display:none;">
                                            <div style="margin-right: 20px;">
                                                <label for="start-time">{{ trans('admin/admin.StartTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="sundayStartTime"
                                                       name="sundayStartTime">
                                            </div>
                                            <div style="margin-right: 20px;">
                                                <label for="end-time">{{ trans('admin/admin.EndTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="sundayEndTime"
                                                       name="sundayEndTime">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="day">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">{{ trans('admin/admin.Monday') }}
                                                <input type="checkbox" name="monday" value="monday"
                                                       placeholder="{{ trans('admin/admin.Monday') }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div id="mondayTime" style="display:none;">
                                            <div style="margin-right: 20px;">
                                                <label for="start-time">{{ trans('admin/admin.StartTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="mondayStartTime"
                                                       name="mondayStartTime">
                                            </div>
                                            <div style="margin-right: 20px;">
                                                <label for="end-time">{{ trans('admin/admin.EndTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="mondayEndTime"
                                                       name="mondayEndTime">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="day">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">{{ trans('admin/admin.Tuesday') }}
                                                <input type="checkbox" name="tuesday" value="tuesday">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div id="tuesdayTime" style="display:none;">
                                            <div style="margin-right: 20px;">
                                                <label for="start-time">{{ trans('admin/admin.StartTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="tuesdayStartTime"
                                                       name="tuesdayStartTime">
                                            </div>
                                            <div style="margin-right: 20px;">
                                                <label for="end-time">{{ trans('admin/admin.EndTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="tuesdayEndTime"
                                                       name="tuesdayEndTime">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="day">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">{{ trans('admin/admin.Wednesday') }}
                                                <input type="checkbox" name="wednesday" value="wednesday">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div id="wednesdayTime" style="display:none;">
                                            <div style="margin-right: 20px;">
                                                <label for="start-time">{{ trans('admin/admin.StartTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="wednesdayStartTime"
                                                       name="wednesdayStartTime">
                                            </div>
                                            <div style="margin-right: 20px;">
                                                <label for="end-time">{{ trans('admin/admin.EndTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="wednesdayEndTime"
                                                       name="wednesdayEndTime">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="day">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">{{ trans('admin/admin.Thursday') }}
                                                <input type="checkbox" name="thursday" value="thursday"
                                                       placeholder="{{ trans('admin/admin.Thursday') }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div id="thursdayTime" style="display:none;">
                                            <div style="margin-right: 20px;">
                                                <label for="start-time">{{ trans('admin/admin.StartTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="thursdayStartTime"
                                                       name="thursdayStartTime">
                                            </div>
                                            <div style="margin-right: 20px;">
                                                <label for="end-time">{{ trans('admin/admin.EndTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="thursdayEndTime"
                                                       name="thursdayEndTime">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="day">
                                        <div style="margin-right: 20px;">
                                            <label class="containerRadio">{{ trans('admin/admin.Friday') }}
                                                <input type="checkbox" name="friday" value="friday"
                                                       placeholder="{{ trans('admin/admin.Friday') }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div id="fridayTime" style="display:none;">
                                            <div style="margin-right: 20px;">
                                                <label for="start-time">{{ trans('admin/admin.StartTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="fridayStartTime"
                                                       name="fridayStartTime">
                                            </div>
                                            <div style="margin-right: 20px;">
                                                <label for="end-time">{{ trans('admin/admin.EndTime') }}</label>
                                                <input class="inputtext" style="width: 100px;" type="time"
                                                       id="fridayEndTime"
                                                       name="fridayEndTime">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    // Select all checkboxes within the DaysContainer
                                    const checkboxes = document.querySelectorAll('.DaysContainer input[type="checkbox"]');

                                    // Add event listener to each checkbox
                                    checkboxes.forEach(checkbox => {
                                        checkbox.addEventListener('change', function () {

                                            //get the day time inputs
                                            var dayTime = document.getElementById(this.value + 'Time');
                                            var startTime = document.getElementById(this.value + 'StartTime');
                                            var endTime = document.getElementById(this.value + 'EndTime');
                                            if (this.checked) {
                                                // Perform actions when checkbox is checked
                                                dayTime.style.display = 'block';
                                                startTime.setAttribute('required', 'required');
                                                endTime.setAttribute('required', 'required');
                                            } else {
                                                // Perform actions when checkbox is unchecked
                                                dayTime.style.display = 'none';
                                                startTime.removeAttribute('required', 'required');
                                                endTime.removeAttribute('required', 'required');
                                            }
                                        });
                                    });

                                    // check at least one day selected
                                    const form = document.getElementById('myForm');
                                    // Add a submit event listener to the form
                                    form.addEventListener('submit', function (event) {
                                        let atLeastOneChecked = false;

                                        checkboxes.forEach(checkbox => {
                                            if (checkbox.checked) {
                                                atLeastOneChecked = true;
                                            }
                                        });

                                        if (!atLeastOneChecked) {
                                            alert('{{ trans('admin/admin.PleaseSelectDay') }}');
                                            event.preventDefault(); // Prevent form submission
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

                        <div class=" w-full mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.CourseType') }}</p>
                            <select class="inputtext " name="courseable_type" id="courseType" required>
                                <option selected disabled>{{ trans('admin/admin.SelectCourseType') }}</option>
                                <option
                                    value="App\Models\Course\SupportingCourse">{{ trans('admin/admin.SupportingCourse') }}</option>
                                <option
                                    value="App\Models\Course\LanguageCourse">{{ trans('admin/admin.LanguagesCourse') }}</option>
                                <option
                                    value="App\Models\Course\IntensiveCourse">{{ trans('admin/admin.IntensiveCourse') }}</option>
                            </select>
                        </div>

                        <div class=" w-full mt-4" id="supportingCourses" style="display:none;">
                            <p class="font-semibold text-black2 mb-2 text-sm ">{{ trans('admin/admin.SupportingCourses') }}</p>
                            <select class="inputtext" name="supportingCourse_id" id="supportingCourseValue">
                                <option value="" selected disabled>{{ trans('admin/admin.SelectCourse') }}</option>
                                @foreach($sup_courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}
                                        ({{ $course->instructor->lastName }},
                                        {{ $course->instructor->firstName }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" w-full mt-4" id="languagesCourses" style="display:none;">
                            <p class="font-semibold text-black2 mb-2 text-sm ">{{ trans('admin/admin.LanguagesCourses') }}</p>
                            <select class="inputtext" name="languagesCourse_id" id="languagesCourseValue">
                                <option value="" selected disabled>{{ trans('admin/admin.SelectCourse') }}</option>
                                @foreach($lang_courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}
                                        ({{ $course->instructor->lastName }},
                                        {{ $course->instructor->firstName }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" w-full mt-4" id="intensiveCourses" style="display:none;">
                            <p class="font-semibold text-black2 mb-2 text-sm ">{{ trans('admin/admin.IntensiveCourses') }}</p>
                            <select class="inputtext " name="intensiveCourse_id" id="intensiveCourseValue">
                                <option value="" selected disabled>{{ trans('admin/admin.SelectCourse') }}</option>
                                @foreach($inten_courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}
                                        ({{ $course->instructor->lastName }},
                                        {{ $course->instructor->firstName }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class=" text-white font-bold text-sm">{{ trans('admin/admin.AddGroup') }}</span>
                    </button>
                </div>

        </div>
        </form>
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
        var courseType = document.getElementById('courseType');

        var supportingCourses = document.getElementById('supportingCourses');
        var supportingCourseValue = document.getElementById('supportingCourseValue');

        var languagesCourses = document.getElementById('languagesCourses');
        var languagesCourseValue = document.getElementById('languagesCourseValue');

        var intensiveCourses = document.getElementById('intensiveCourses');
        var intensiveCourseValue = document.getElementById('intensiveCourseValue');

        courseType.addEventListener('change', function () {
            if (courseType.value === 'App\\Models\\Course\\SupportingCourse') {
                supportingCourses.style.display = 'block';
                supportingCourseValue.setAttribute('required', 'required');
            } else {
                supportingCourses.style.display = 'none';
                supportingCourseValue.removeAttribute('required', 'required');
                supportingCourseValue.value = "";
            }

            if (courseType.value === 'App\\Models\\Course\\LanguageCourse') {
                languagesCourses.style.display = 'block';
                languagesCourseValue.setAttribute('required', 'required');
            } else {
                languagesCourses.style.display = 'none';
                languagesCourseValue.removeAttribute('required', 'required');
                languagesCourseValue.value = "";
            }

            if (courseType.value === 'App\\Models\\Course\\IntensiveCourse') {
                intensiveCourses.style.display = 'block';
                intensiveCourseValue.setAttribute('required', 'required');
            } else {
                intensiveCourses.style.display = 'none';
                intensiveCourseValue.removeAttribute('required', 'required');
                intensiveCourseValue.value = "";
            }
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
    <script src="{{ asset('website/admin/js/choices.min.js') }}"></script>
    <script src="{{ asset('website/admin/js/choices.js') }}"></script>
@endsection
