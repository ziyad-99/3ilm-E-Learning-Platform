@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.EditIntensiveCourse') }}
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/admin.EditIntensiveCourse') }}</span>
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

            <form class="w-full" action="{{ route('admin.updateIntensiveCourse') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <input hidden name="inten_course_id" value="{{ $inten_course->id }}" required/>
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex flex-wrap ">

                        <div class=" w-full mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.CourseTitle(en)') }}</p>
                            <input class="inputtext fontp" name="title_en"
                                   value="{{ $inten_course->getTranslations()['title']['en'] }}" required
                                   placeholder="{{ trans('admin/admin.CourseTitle(en)') }}"/>
                        </div>

                        <div class=" w-full mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.CourseTitle(ar)') }}</p>
                            <input class="inputtext fontp" name="title_ar"
                                   value="{{ $inten_course->getTranslations()['title']['ar'] }}" required
                                   placeholder="{{ trans('admin/admin.CourseTitle(ar)') }}"/>
                        </div>

                        <div class=" w-full mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.CourseTitle(fr)') }}</p>
                            <input class="inputtext fontp" name="title_fr"
                                   value="{{ $inten_course->getTranslations()['title']['fr'] }}" required
                                   placeholder="{{ trans('admin/admin.CourseTitle(fr)') }}"/>
                        </div>


                        <div class=" w-full md:w-6/12 ">
                            <div class=" flex-wrap flex w-full">

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Instructor') }}</p>
                                    <select class="inputtext " name="instructor_id" required>
                                        <option value="" disabled>{{ trans('admin/admin.selectInstructor') }}</option>
                                        <option selected
                                                value="{{ $inten_course->instructor->id }}">{{ $inten_course->instructor->firstName }}</option>
                                        @foreach($instructors as $instructor)
                                            <option
                                                value="{{ $instructor->id }}">{{ $instructor->firstName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2 text-sm">{{ trans('admin/admin.Set the instructor salary') }}</p>
                                    <div style="margin-right: 20px; margin-bottom: 20px;">
                                        <label class="containerRadio">
                                            {{ trans('admin/admin.Percentage (%)') }}
                                            <input type="radio" name="paymentType" value="percentage"
                                                   required {{ $inten_course->paymentType === 'percentage' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <input class="inputtext fontp" type="number" name="percentage" min="0" max="100"
                                               value="{{ $inten_course->percentage }}"
                                               placeholder="{{ trans('admin/admin.Percentage (%)') }}"
                                               style="width: 30%; {{ $inten_course->paymentType === 'percentage' ? 'display: block;' : 'display: none;'}}"/>
                                    </div>

                                    <div style="margin-right: 20px;">
                                        <label class="containerRadio">
                                            {{ trans('admin/admin.Fixed salary for all Sessions') }}
                                            <input type="radio" name="paymentType" value="perSession"
                                                   required {{ $inten_course->paymentType === 'perSession' ? 'checked' : ''}}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <input class="inputtext fontp" type="number" name="perSession"
                                               value="{{ $inten_course->perSession }}"
                                               placeholder="{{ trans('admin/admin.Fixed salary for all Sessions') }}"
                                               style="width: 40%; {{ $inten_course->paymentType === 'perSession' ? 'display: block;' : 'display: none;'}}"/>
                                    </div>
                                </div>

                                <script>
                                    const radioButtons = document.querySelectorAll('input[type=radio][name=paymentType]');
                                    const percentageInput = document.querySelector('input[type=number][name=percentage]');
                                    const perSessionInput = document.querySelector('input[type=number][name=perSession]');

                                    radioButtons.forEach(radio => {
                                        radio.addEventListener('change', function () {
                                            if (this.checked) {
                                                if (this.value === 'percentage') {
                                                    percentageInput.style.display = 'block';
                                                    percentageInput.required = true;

                                                    perSessionInput.style.display = 'none';
                                                    perSessionInput.required = false;
                                                    perSessionInput.value = "";

                                                } else if (this.value === 'perSession') {
                                                    percentageInput.style.display = 'none';
                                                    percentageInput.required = false;
                                                    percentageInput.value = "";

                                                    perSessionInput.style.display = 'block';
                                                    perSessionInput.required = true;
                                                }
                                            }
                                        });
                                    });
                                </script>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Level') }}</p>
                                    <select class="inputtext " name="level" required>
                                        <option value="" disabled>{{ trans('admin/admin.SelectLevel') }}</option>
                                        <option
                                            value="Beginner" {{ $inten_course->getTranslations()['level']['en'] === 'Beginner' ? 'selected' : ''}}>
                                            {{ trans('admin/admin.Beginner') }}
                                        </option>
                                        <option
                                            value="Intermediate" {{ $inten_course->getTranslations()['level']['en'] === 'Intermediate' ? 'selected' : ''}}>
                                            {{ trans('admin/admin.Intermediate') }}
                                        </option>
                                        <option
                                            value="Advanced" {{ $inten_course->getTranslations()['level']['en'] === 'Advanced' ? 'selected' : ''}}>
                                            {{ trans('admin/admin.Advanced') }}
                                        </option>
                                    </select>
                                </div>

                                {{--                                <div class=" w-full mt-4">--}}
                                {{--                                    <p class="font-semibold text-black2 mb-2  text-sm ">Number Sessions</p>--}}
                                {{--                                    <input class="inputtext fontp" type="text" name="numberSessions"--}}
                                {{--                                           value="{{ $inten_course->numberSessions }}" required/>--}}
                                {{--                                </div>--}}

                                {{--                                <div class=" w-full mt-4">--}}
                                {{--                                    <p class="font-semibold text-black2 mb-2  text-sm ">Frame time (hh:mm:ss)</p>--}}
                                {{--                                    <input class="inputtext fontp" type="text" name="frameTime"--}}
                                {{--                                           value="{{ $inten_course->frameTime }}" placeholder="00:00:00" required/>--}}
                                {{--                                </div>--}}

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.NumberSessions') }}</p>
                                    <input class="inputtext fontp" type="number" name="numberSessions"
                                           placeholder="{{ trans('admin/admin.NumberSessions') }}"
                                           value="{{ $inten_course->numberSessions }}" required/>
                                </div>

                                @php
                                    use Carbon\Carbon;
                                        // Parse the time string
                                        $frameTime = Carbon::parse($inten_course->frameTime);

                                        // Calculate the numeric value in hours
                                        $frameTime = $frameTime->hour + ($frameTime->minute / 60);
                                @endphp
                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Frametime(Hours)') }}</p>
                                    <input class="inputtext" type="number" name="frameTime" step="0.5"
                                           value="{{ $frameTime }}" required
                                           placeholder="{{ trans('admin/admin.Frametime(Hours)') }}">
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Price') }}</p>
                                    <input class="inputtext fontp" type="number" name="price"
                                           placeholder="{{ trans('admin/admin.Price') }}"
                                           value="{{ $inten_course->price }}" required/>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.StartDate') }}</p>
                                    <input class="inputtext fontp" type="date" name="startDate"
                                           placeholder="{{ trans('admin/admin.StartDate') }}"
                                           value="{{ $inten_course->startDate }}" required/>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Status') }}</p>
                                    <select class="inputtext " name="status" required>
                                        <option value="" disabled>{{ trans('admin/admin.selectStatus') }}</option>
                                        <option value="0" {{ $inten_course->status === 0 ? 'selected' : ''}}>
                                            {{ trans('admin/admin.Disabled') }}
                                        </option>
                                        <option value="1" {{ $inten_course->status === 1 ? 'selected' : ''}}>
                                            {{ trans('admin/admin.Active') }}
                                        </option>
                                    </select>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Description (en)') }}</p>
                                    <textarea
                                        name="description_en"
                                        class="inputtext rounded-[15px] px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none  block sm:text-sm focus:ring-1  min-h-[20px] h-auto py-3"
                                        rows="3"
                                        placeholder="{{ trans('admin/admin.Description (en)') }}"
                                        required>{{ $inten_course->getTranslations()['description']['en'] }}</textarea>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Description (fr)') }}</p>
                                    <textarea
                                        name="description_fr"
                                        class="inputtext rounded-[15px] px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none  block sm:text-sm focus:ring-1  min-h-[20px] h-auto py-3"
                                        rows="3"
                                        placeholder="{{ trans('admin/admin.Description (fr)') }}"
                                        required>{{ $inten_course->getTranslations()['description']['fr'] }}</textarea>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Description (ar)') }}</p>
                                    <textarea
                                        name="description_ar"
                                        class="inputtext rounded-[15px] px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none  block sm:text-sm focus:ring-1  min-h-[20px] h-auto py-3"
                                        rows="3"
                                        placeholder="{{ trans('admin/admin.Description (ar)') }}"
                                        required>{{ $inten_course->getTranslations()['description']['ar'] }}</textarea>
                                </div>
                            </div>


                        </div>
                        <div class=" w-full ps-5 md:w-6/12">

                            <div class="md:w-3/12 ms-auto">
                                @can('add_student_supporting_courses')
                                    <a href="#" type="button" onclick="openPop('.flexsss25')"
                                       class=" btn w-auto items-center mt-5 justify-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] flex px-6">
                                    <span
                                        class=" text-white font-bold text-sm ">{{ trans('admin/admin.addStudent') }}</span>
                                    </a>
                                @endcan
                            </div>

                            <h6 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                                <span>{{ trans('admin/admin.Enrollments of this Course') }}</span>
                            </h6>
                            <table class="table admin" datatable id="datatable-search-list">
                                <thead>
                                <tr class="bg-orange/30">
                                    <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allStudents.name') }}</th>
                                    <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.GroupName') }}</th>
                                    <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Status') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($inten_course->enrollments as $enrollment)
                                    <tr>
                                        <td class="text-sm font-medium text-black34 fontp leading-normal">
                                            {{ $enrollment->user->lastName }}
                                        </td>
                                        <td>
                                            @if($enrollment->group_id != null)
                                                {{ $enrollment->group->name }}
                                            @else
                                                /
                                            @endif
                                        </td>
                                        <td class="text-sm font-normal leading-normal">
                                            <script>
                                                // Create a form for each enrollment
                                                var form = document.createElement('form');

                                                form.action = "{{ route('admin.activeOrDisableEnrollment') }}"; // Set your form action

                                                form.method = "post"; // Set your form method
                                                form.id = "activeDisableForm" + {{ $enrollment->id }}; // Set form ID using enrollment ID

                                                // Create a CSRF token input field
                                                var csrfToken = document.createElement('input');
                                                csrfToken.type = "hidden";
                                                csrfToken.name = "_token"; // Name for the CSRF token
                                                csrfToken.value = "{{ csrf_token() }}"; // Retrieve the CSRF token value

                                                // Append CSRF token to the form
                                                form.appendChild(csrfToken);

                                                // Append the form to the formContainer
                                                document.body.appendChild(form);
                                            </script>

                                            @if($enrollment->endDate >= now())
                                                @can('change_enrollment_status_intensive_courses')
                                                    <select class="inputtext" name="enrollmentStatus" required
                                                            onchange="submitInnerForm({{ $enrollment->id }})"
                                                            form="activeDisableForm{{ $enrollment->id }}">
                                                        <option value="" disabled>select status</option>
                                                        <option
                                                            value="0" {{ $enrollment->status == false ? 'selected' : ''}}>
                                                            {{ trans('admin/admin.Disabled') }}
                                                        </option>
                                                        <option
                                                            value="1" {{ $enrollment->status == true ? 'selected' : ''}}>
                                                            {{ trans('admin/admin.Active') }}
                                                        </option>
                                                    </select>
                                                    <input hidden name="enrollment_id" value="{{ $enrollment->id }}"
                                                           form="activeDisableForm{{ $enrollment->id }}">
                                                @endcan
                                            @else
                                                {{ trans('admin/admin.endedAt') }} {{ $enrollment->endDate }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <div class="relative w-full md:w-8/12 mt-10">


                                <div class="w-full h-48 overflow-hidden  bg-gray/50 ">
                                    <img id='output' class=" object-cover w-full h-full imagereader"
                                         src="{{ asset('images/courses/'.$inten_course->img) }}" alt="logo"/>
                                </div>
                                <div class=" absolute -bottom-1.5 -end-1.5">
                                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                         width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
                                         style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                            <path
                                                d="M416.667 104.433h-28.342c-12.116 0-15.148-9.117-20.81-20.442-13.518-27.036-40.683-43.825-70.899-43.825h-81.232c-30.217 0-57.382 16.789-70.899 43.825-5.661 11.325-8.694 20.442-20.81 20.442H95.333C42.602 104.433 0 147.113 0 199.767V376.5c0 52.739 42.687 95.333 95.333 95.333h321.334c52.646 0 95.333-42.595 95.333-95.333V199.767c0-52.654-42.602-95.334-95.333-95.334zm-273.134 222.8a14.946 14.946 0 0 1-10.606-4.394l-32.133-32.133c-5.858-5.858-5.858-15.355 0-21.213 5.857-5.858 15.355-5.858 21.213 0l6.596 6.596C130.73 207.652 187.057 152.633 256 152.633c34.022 0 66.027 13.262 90.119 37.344 5.859 5.857 5.861 15.354.004 21.213-5.857 5.858-15.355 5.861-21.213.004-18.426-18.418-42.898-28.562-68.91-28.562-52.344 0-95.176 41.478-97.371 93.292l6.432-6.431c5.857-5.858 15.355-5.858 21.213 0 5.858 5.858 5.858 15.355 0 21.213L154.14 322.84a14.953 14.953 0 0 1-10.607 4.393zm267.674-36.526c-5.857 5.858-15.355 5.858-21.213 0l-6.596-6.596C381.271 352.547 324.943 407.567 256 407.567c-34.022 0-66.027-13.262-90.119-37.344-5.859-5.857-5.861-15.354-.004-21.213 5.857-5.858 15.355-5.861 21.213-.004 18.426 18.418 42.898 28.562 68.91 28.562 52.344 0 95.176-41.478 97.371-93.292l-6.432 6.431c-5.857 5.858-15.355 5.858-21.213 0-5.858-5.858-5.858-15.355 0-21.213l32.133-32.133c2.929-2.929 6.768-4.394 10.606-4.394s7.678 1.464 10.606 4.394l32.133 32.133c5.86 5.858 5.86 15.355.003 21.213z"
                                                fill="#939393" data-original="#000000" opacity="1" class=""></path>
                                        </g></svg>
                                </div>

                                <input type="file"
                                       class="absolute top-0 right-0 left-0 bottom-0 z-10 opacity-0 cursor-pointer"
                                       name="img" accept="image/png, image/jpeg"
                                       onchange='openFile(event)'>
                            </div>
                        </div>
                    </div>
                    {{--                    <button type="submit" onclick="Done()"--}}
                    {{--                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">--}}
                    {{--                        <span class=" text-white font-bold text-sm ">Update</span>--}}
                    {{--                    </button>--}}

                    <button type="submit"
                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class=" text-white font-bold text-sm ">{{ trans('admin/admin.Update') }}</span>
                    </button>
                </div>
            </form>

            <script>
                function submitInnerForm(enrollment_id) {
                    document.getElementById('activeDisableForm' + enrollment_id).submit();
                }
            </script>

        </div>
    </div>
    <div
        class="fixed flexsss25 top-0 left-0 right-0 z-50  hidden flex-col  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md mx-auto my-auto  max-h-full">
            <div class="relative bg-white rounded-xl  shadow">
                <button type="button" onclick="closePop('.flexsss25')"
                        class="absolute top-3 end-2.5 group text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center "
                        data-modal-hide="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5 fill-gray2 group-hover:fill-orange" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="p-6 text-center">
                    <h3 class="mb-5 text-md text-start font-bold text-black34">{{ trans('admin/admin.SearchForStudent') }}</h3>

                    <input
                        id="searchByStudentName"
                        class="bg-[#f5f5f5] rounded-[15px] h-14 px-4 fontp w-full mt-4 font-medium  placeholder-slate-400 focus:outline-none focus:border-orange focus:ring-orange/50 block sm:text-sm focus:ring-1 "
                        placeholder="{{ trans('admin/admin.SearchForStudent') }}"/>
                    <div class="w-full max-h-48 py-5 overflow-x-hidden overflow-y-auto">
                        <div id="ajax_search_result"></div>
                    </div>

                    <form action="{{ route('admin.addStudentToCourse') }}" method="post">
                        @csrf
                        <input id="studentId" hidden name="studentId" required>
                        <input id="studentId" hidden name="courseId" value="{{ $inten_course->id }}" required>
                        <input id="studentId" hidden name="courseType" value="intensiveCourse" required>

                        <div class="w-full mt-10">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Group') }}</p>
                            <select class="inputtext" name="group_id" required>
                                <option value="" selected disabled>{{ trans('admin/admin.SelectGroup') }}</option>
                                @foreach($inten_course->groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <button type="submit"
                                class="text-white hover:bg-orange3  transform hover:scale-[1.01]  bg-orange hover:bg-green2 mt-3  h-14 w-full justify-center md:w-64 font-medium rounded-xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">
                            {{ trans('admin/admin.addStudent') }}
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="  gg422 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[1000] fixed">
        <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="72.5" cy="72.5" r="69.5" stroke="#37F807" stroke-width="6"/>
            <path d="M44 74.7767L61.4349 92L108 46" stroke="#37F807" stroke-width="10.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
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
        $(document).ready(function () {
            $(document).on('input', "#searchByStudentName", function () {
                var searchByStudentName = $(this).val();
                jQuery.ajax({
                    url: "{{ route('admin.searchByStudentName') }}",
                    type: 'post',
                    datatype: 'html',
                    cashe: false,
                    data: {
                        searchByStudentName: searchByStudentName, '_token': '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $("#ajax_search_result").html(data);
                    },
                    error: function () {

                    }
                });
            });
        });
    </script>

    <script>
        function getmyid(element) {
            let dataId = element.dataset.id;

            if (dataId == $('#studentId').val()) {
                element.classList.remove('bg-orange/20');
                $('#studentId').val('');
            } else {
                $('.studentId').removeClass('bg-orange/20');
                element.classList.add('bg-orange/20');
                $('#studentId').val(dataId);
            }
        }

        let gg42245 = document.querySelector(".gg4255")

        function openPop(gg42) {
            document.querySelector(gg42).classList.add('flex');
            document.querySelector(gg42).classList.remove('hidden');
            document.body.classList.add("overflow-hidden");
            document.body.style.height = "100vh";
            document.body.style.position = "fixed";
            document.body.style.width = "100%";
            gg42245.classList.add("block");
            gg42245.classList.remove("hidden");
        }

        function closePop(gg42) {
            document.querySelector(gg42).classList.remove('flex');
            document.querySelector(gg42).classList.add('hidden');
            document.body.classList.remove("overflow-hidden");
            document.body.style.height = "100%";
            document.body.style.position = "relative";
            document.body.style.width = "100%";

            gg42245.classList.remove("block");
            gg42245.classList.add("hidden");


        }

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
    <script>
        let openFile = function (file) {
            let input = file.target;
            let reader = new FileReader();
            reader.onload = function () {
                let dataURL = reader.result;
                let output = document.getElementById('output');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        };

    </script>
    <script src="{{ asset('website/admin/js/choices.min.js') }}"></script>
    <script src="{{ asset('website/admin/js/choices.js') }}"></script>
@endsection
