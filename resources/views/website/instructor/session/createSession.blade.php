@extends('website.layouts.master')

@section('content')
    <div class="bg-[#f5f5f5]">
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('website/createSession.create_new_session') }}</span>
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

            <form class="w-full"
                  action="{{ route('instructor.storeMeeting') }}"
                  method="post">
                @csrf
                <input hidden type="text" name="slug" value="{{ $course->slug }}" required>
                <input hidden type="text" name="courseType" value="{{ $courseType }}" required>

                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex flex-wrap ">

                        <div class=" w-full md:w-7/12">
                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/createSession.session_name') }}</p>
                                <input class="inputtext fontp" type="text" name="meetingName"
                                       placeholder="{{ trans('website/createSession.session_name') }}"
                                       required/>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-wrap ">
                        <div class=" w-full md:w-7/12">
                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2  text-sm ">Group</p>
                                <select class="inputtext" name="group_id" required>
                                    <option value="" selected disabled>Select Course</option>
                                    @foreach($course->groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class=" w-full md:w-7/12">
                        <div class="w-full mt-10">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/createSession.starting_time') }}</p>
                            <input class="inputtext" type="time" name="startTime" required>
                        </div>
                    </div>

                    <div class=" w-full md:w-7/12">
                        <div class="w-full mt-10">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/createSession.starting_date') }}</p>
                            <input class="inputtext" type="date" name="startDate" required>
                        </div>
                    </div>

                    <button type="submit" onclick="Done()"
                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class=" text-white font-bold text-sm">{{ trans('website/createSession.create') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <br>
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
