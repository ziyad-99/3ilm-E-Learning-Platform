@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.NotificationPanel') }}
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/admin.NotificationPanel') }}</span>
            </h4>
            <form class="w-full" action="{{ route('admin.storeNotification') }}" method="POST">
                @csrf
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex items-stretch flex-wrap ">
                        <div class=" w-full md:w-4/12  md:px-5 mb-5 md:mb-0">
                            <div class="border relative  border-[#DFDFDF]  rounded-xl">
                                <div class="p-4">
                                    <input class="inputtext fontp" placeholder="search"/>
                                </div>
                                <ul id="tabs" class="inline-flex flex-wrap gap-2  mt-5 px-3 pb-4">
                                    <li class=" ">
                                        <a id="default-tab"
                                           class="font-semibold transition-all  text-orange border-b-2 border-[#FF6900]text-[15px] mx-2 md:text-base md:mx-4 border-solid pb-2"
                                           href="#first">{{ trans('admin/admin.Students') }}</a>
                                    </li>
                                    <li>
                                        <a class="font-semibold text-[15px] mx-2 md:text-base md:mx-4 transition-all border-[#FF6900] border-solid pb-2"
                                           href="#second">{{ trans('admin/admin.Instructors') }}</a></li>
                                    <li>
                                        <a class="font-semibold text-[15px] mx-2 md:text-base md:mx-4 transition-all border-[#FF6900] border-solid pb-2"
                                           href="#third">{{ trans('admin/admin.Classes') }}</a></li>
                                    <li>
                                </ul>

                                <div class=" h-[600px] pb-20 w-full overflow-y-scroll">
                                    <div id="tab-contents">
                                        <div id="first" class="  w-full ">
                                            @foreach($students as $student)
                                                <div class="w-full p-3">
                                                    <div class="flex mt-4 items-center w-full pb-4 ">
                                                        <label class="container33 mb-0 flex items-center ">
                                                            <input class="checkboxes" type="checkbox"
                                                                   name="student_id{{ $student->id }}"
                                                                   value="{{ $student->id }}">
                                                            <span class="checkmark2"></span>
                                                        </label>
                                                        <div
                                                            class="w-10 h-10 me-2 overflow-hidden rounded-full bg-gray/50">
                                                            <img id='output'
                                                                 class=" object-cover w-full h-full imagereader"
                                                                 src="{{ asset('images/profiles/'.$student->photo) }}"
                                                                 alt="logo"/>
                                                        </div>
                                                        <div>
                                                            <p class="text-base  font-semibold text-black34 fontp">
                                                                {{ $student->lastName }}, {{ $student->firstName }}
                                                            </p>

                                                            <p class="text-sm font-normal text-gray3 fontp">
                                                                {{ $student->balance }} {{ trans('admin/admin.(DA)') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div
                                                class="flex px-4 w-full bg-white items-center  absolute bottom-0 pt-6 pb-4 ">
                                                <label class="container33 mb-0 flex items-center ">
                                                    <input type="checkbox" class="flex items-center addallselect">
                                                    <span
                                                        class="text-sm mb-3 fontp -mt-[9px]">{{ trans('admin/admin.SelectAll') }}</span>
                                                    <span class="checkmark2"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div id="second" class="hidden  w-full ">
                                            <div class="w-full p-3">
                                                @foreach($instructors as $instructor)
                                                    <div class="flex mt-4 items-center w-full pb-4 ">
                                                        <label class="container33 mb-0 flex items-center ">
                                                            <input class="checkboxes2" type="checkbox"
                                                                   name="instructor_id{{ $instructor->id }}"
                                                                   value="{{ $instructor->id }}">
                                                            <span class="checkmark2"></span>
                                                        </label>

                                                        <div
                                                            class="w-10 h-10 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                                            <img id='output'
                                                                 class=" object-cover w-full h-full imagereader"
                                                                 src="{{ asset('images/profiles/'.$instructor->photo) }}"
                                                                 alt="logo"/>
                                                        </div>
                                                        <div>
                                                            <p class="text-base  font-semibold text-black34 fontp">
                                                                {{ $instructor->lastName }}
                                                                , {{ $instructor->firstName }}
                                                            </p>
                                                            <p class="text-sm font-normal text-gray3 fontp">
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div
                                                class="flex px-4 w-full bg-white items-center  absolute bottom-0 pt-6 pb-4 ">
                                                <label class="container33 mb-0 flex items-center ">
                                                    <input type="checkbox" class="flex items-center addallselect2">
                                                    <span
                                                        class="text-sm mb-3 fontp -mt-[9px]">{{ trans('admin/admin.SelectAll') }}</span>
                                                    <span class="checkmark2"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div id="third" class=" hidden w-full ">
                                            <div class="w-full p-3">
                                                <div class=" border-y border-[#E5E8EC] py-3">
                                                    <h3 class=" text-base text-black2 font-bold">{{ trans('admin/admin.SupportingCourse') }}</h3>
                                                </div>
                                                @foreach($supCourses as $course)
                                                    @foreach($course->groups as $group)
                                                        <div class="flex mt-4 items-center w-full pb-4 ">
                                                            <label class="container33 mb-0 flex items-center ">
                                                                <input class="checkboxes3" type="checkbox"
                                                                       name="supCourse_group_id{{ $group->id }}"
                                                                       value="{{ $group->id }}">
                                                                <span class="checkmark2"></span>
                                                            </label>
                                                            <div
                                                                class="w-10 h-10 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                                                <img id='output'
                                                                     class=" object-cover w-full h-full imagereader"
                                                                     src="{{ asset('images/courses/'.$course->img) }}"
                                                                     alt="logo"/>
                                                            </div>
                                                            <div>
                                                                <p class="text-base  font-semibold text-black34 fontp">
                                                                    {{ $course->title }}, {{ $group->name }}
                                                                </p>
                                                                <p class="text-sm font-normal text-gray3 fontp">
                                                                    {{ trans('admin/admin.SupportingCourse') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                                <div class=" border-y border-[#E5E8EC] py-3">
                                                    <h3 class=" text-base text-black2 font-bold">{{ trans('admin/admin.IntensiveCourse') }}</h3>
                                                </div>
                                                @foreach($intenCourses as $course)
                                                    @foreach($course->groups as $group)
                                                        <div class="flex mt-4 items-center w-full pb-4 ">
                                                            <label class="container33 mb-0 flex items-center ">
                                                                <input class="checkboxes3" type="checkbox"
                                                                       name="intenCourse_group_id{{ $group->id }}"
                                                                       value="{{ $group->id }}">
                                                                <span class="checkmark2"></span>
                                                            </label>
                                                            <div
                                                                class="w-10 h-10 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                                                <img id='output'
                                                                     class=" object-cover w-full h-full imagereader"
                                                                     src="{{ asset('images/courses/'.$course->img) }}"
                                                                     alt="logo"/>
                                                            </div>
                                                            <div>
                                                                <p class="text-base  font-semibold text-black34 fontp">
                                                                    {{ $course->title }}, {{ $group->name }}
                                                                </p>
                                                                <p class="text-sm font-normal text-gray3 fontp">
                                                                    {{ trans('admin/admin.IntensiveCourse') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                                <div class=" border-y border-[#E5E8EC] py-3">
                                                    <h3 class=" text-base text-black2 font-bold">{{ trans('admin/admin.LanguagesCourse') }}</h3>
                                                </div>
                                                @foreach($langCourses as $course)
                                                    @foreach($course->groups as $group)
                                                        <div class="flex mt-4 items-center w-full pb-4 ">
                                                            <label class="container33 mb-0 flex items-center ">
                                                                <input class="checkboxes3" type="checkbox"
                                                                       name="langCourse_group_id{{ $group->id }}"
                                                                       value="{{ $group->id }}">
                                                                <span class="checkmark2"></span>
                                                            </label>
                                                            <div
                                                                class="w-10 h-10 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                                                <img id='output'
                                                                     class=" object-cover w-full h-full imagereader"
                                                                     src="{{ asset('images/courses/'.$course->img) }}"
                                                                     alt="logo"/>
                                                            </div>
                                                            <div>
                                                                <p class="text-base  font-semibold text-black34 fontp">
                                                                    {{ $course->title }}, {{ $group->name }}
                                                                </p>
                                                                <p class="text-sm font-normal text-gray3 fontp">
                                                                    {{ trans('admin/admin.LanguagesCourse') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            <div
                                                class="flex px-4 w-full bg-white items-center  absolute bottom-0 pt-6 pb-4 ">
                                                <label class="container33 mb-0 flex items-center ">
                                                    <input type="checkbox" class="flex items-center addallselect3">
                                                    <span
                                                        class="text-sm mb-3 fontp -mt-[9px]">{{ trans('admin/admin.SelectAll') }}</span>
                                                    <span class="checkmark2"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" w-full md:w-8/12 md:px-5">
                            <div class="flex flex-wrap w-full border-b pb-4 border-[#DFDFDF]/50 mb-4">
                                {{--                                <div class=" bg-white boxshadow3 p-3 mb-3 rounded-xl me-3">--}}
                                {{--                                    <p class="text-sm  font-medium text-black34 fontp">Department</p>--}}
                                {{--                                </div>--}}
                            </div>
                            <div class=" bg-gray2/5 rounded-lg p-5 my-10">
                                <div class=" h-[600px] p-10 w-full overflow-y-scroll ">

                                    <!--  start client  -->
                                    @foreach($notifications as $notification)
                                        <div class="w-full pb-10 flex justify-between">

                                            <div class="bg-gray/10 ms-auto w-10/12 lg:w-9/12 rounded-lg p-8">
                                                <p class="  font-bold  text-base lg:leading-[140%]">
                                                    @if($notification->type == 'App\Notifications\SpecificStudent')
                                                        {{ \App\Models\User::find($notification->notifiable_id)->lastName }}
                                                        , {{ \App\Models\User::find($notification->notifiable_id)->firstName }}
                                                    @endif

                                                    @if($notification->type === 'App\Notifications\SpecificInstructor')
                                                        {{ \App\Models\Instructor::find($notification->notifiable_id)->lastName }}
                                                        , {{ \App\Models\Instructor::find($notification->notifiable_id)->firstName }}
                                                    @endif
                                                </p>

                                                <p class="fontp inline-block text-black34 font-normal text-sm my-3 lg:leading-[140%]">
                                                    @php
                                                        $notification = json_decode($notification->data, true);
                                                    @endphp
                                                    {{ $notification['specificNotification'] }}
                                                </p>
                                            </div>
                                            <div class="relative ms-4 w-14 z-0  overflow-hidden rounded-full h-14 ">
                                                <img
                                                    class="h-full w-full transfarm trans-all2 hover:scale-[1.1] object-cover z-10 relative "
                                                    src="{{ asset('website/images/notification.png') }}"/>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!--  end client  -->
                                </div>
                            </div>
                            <div class="w-full">
                                <p class=" text-[#222]   font-bold text-xl  my-6  lg:leading-[115%] ">
                                    {{ trans('admin/admin.writeYourNotifcation') }}
                                </p>

                                <textarea
                                    class=" rounded-[15px] inputtext px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none  block sm:text-sm focus:ring-1  min-h-[80px] h-auto py-3"
                                    rows="2"
                                    name="notification"
                                    placeholder="{{ trans('admin/admin.writeYourNotifcation') }}"
                                    required></textarea>
                                <button type="submit"
                                        class=" btn group w-4/12 mx-auto mt-3 h-14 items-center hover:px-6 justify-center flex px-6">
                                    <div>
                                        <span
                                            class=" text-white  group-hover:text-red font-semibold text-sm ">{{ trans('admin/admin.send') }}</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("#tabs a");


        tabTogglers.forEach(function (toggler) {
            toggler.addEventListener("click", function (e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabTogglers.length; i++) {
                    tabTogglers[i].classList.remove("text-orange", "border-b-2");
                    tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");

                }
                console.log(e.target)
                e.target.classList.add("text-orange", "border-b-2");
            });
        });
        let addallselect = document.querySelector('.addallselect');
        let addallselect2 = document.querySelector('.addallselect2');
        let addallselect3 = document.querySelector('.addallselect3');
        addallselect.addEventListener('change', (e) => {
            e.preventDefault();
            if (addallselect.checked) {
                document.querySelectorAll('.checkboxes').forEach((p) => {
                    p.checked = true;
                })
            } else {
                document.querySelectorAll('.checkboxes').forEach((p) => {
                    p.checked = false;
                })
            }
        })
        addallselect2.addEventListener('change', (e) => {
            e.preventDefault();
            if (addallselect2.checked) {
                document.querySelectorAll('.checkboxes2').forEach((p) => {
                    p.checked = true;
                })
            } else {
                document.querySelectorAll('.checkboxes2').forEach((p) => {
                    p.checked = false;
                })
            }
        })
        addallselect3.addEventListener('change', (e) => {
            e.preventDefault();
            if (addallselect3.checked) {
                document.querySelectorAll('.checkboxes3').forEach((p) => {
                    p.checked = true;
                })
            } else {
                document.querySelectorAll('.checkboxes3').forEach((p) => {
                    p.checked = false;
                })
            }
        })
    </script>

    <script src="{{ asset('website/admin/js/choices.min.js') }}"></script>
    <script src=" {{ asset('website/admin/js/choices.js') }}"></script>

@endsection
