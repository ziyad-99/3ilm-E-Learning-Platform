@extends('website.admin.layouts.master')

@section('content')

    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/instructorPanel.instructor_profile') }}</span>
            </h4>
            <form action="post" class="w-full">
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    {{--                    <button type="button" onclick="Done()"--}}
                    {{--                            class=" btn items-center  hover:bg-orange3 transform hover:scale-105 ms-auto mb-3 md:me-4 flex px-10">--}}
                    {{--                        <svg class="w-5 h-5 fill-gray/50" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
                    {{--                             xmlns="http://www.w3.org/2000/svg">--}}
                    {{--                            <path--}}
                    {{--                                d="M15 22.75H9C3.57 22.75 1.25 20.43 1.25 15V9C1.25 3.57 3.57 1.25 9 1.25H11C11.41 1.25 11.75 1.59 11.75 2C11.75 2.41 11.41 2.75 11 2.75H9C4.39 2.75 2.75 4.39 2.75 9V15C2.75 19.61 4.39 21.25 9 21.25H15C19.61 21.25 21.25 19.61 21.25 15V13C21.25 12.59 21.59 12.25 22 12.25C22.41 12.25 22.75 12.59 22.75 13V15C22.75 20.43 20.43 22.75 15 22.75Z"--}}
                    {{--                                fill="#fff"></path>--}}
                    {{--                            <path--}}
                    {{--                                d="M8.50002 17.69C7.89002 17.69 7.33002 17.47 6.92002 17.07C6.43002 16.58 6.22002 15.87 6.33002 15.12L6.76002 12.11C6.84002 11.53 7.22002 10.78 7.63002 10.37L15.51 2.49C17.5 0.499998 19.52 0.499998 21.51 2.49C22.6 3.58 23.09 4.69 22.99 5.8C22.9 6.7 22.42 7.58 21.51 8.48L13.63 16.36C13.22 16.77 12.47 17.15 11.89 17.23L8.88002 17.66C8.75002 17.69 8.62002 17.69 8.50002 17.69ZM16.57 3.55L8.69002 11.43C8.50002 11.62 8.28002 12.06 8.24002 12.32L7.81002 15.33C7.77002 15.62 7.83002 15.86 7.98002 16.01C8.13002 16.16 8.37002 16.22 8.66002 16.18L11.67 15.75C11.93 15.71 12.38 15.49 12.56 15.3L20.44 7.42C21.09 6.77 21.43 6.19 21.48 5.65C21.54 5 21.2 4.31 20.44 3.54C18.84 1.94 17.74 2.39 16.57 3.55Z"--}}
                    {{--                                fill="#fff"></path>--}}
                    {{--                            <path--}}
                    {{--                                d="M19.85 9.83003C19.78 9.83003 19.71 9.82003 19.65 9.80003C17.02 9.06003 14.93 6.97003 14.19 4.34003C14.08 3.94003 14.31 3.53003 14.71 3.41003C15.11 3.30003 15.52 3.53003 15.63 3.93003C16.23 6.06003 17.92 7.75003 20.05 8.35003C20.45 8.46003 20.68 8.88003 20.57 9.28003C20.48 9.62003 20.18 9.83003 19.85 9.83003Z"--}}
                    {{--                                fill="#fff"></path>--}}
                    {{--                        </svg>--}}
                    {{--                        <span class="ps-3 text-white font-bold text-sm ">Edit Student</span>--}}
                    {{--                    </button>--}}

                    <div class="border-x-gray/12.5 flex justify-between rounded-t-2xl border-b-0 border-solid p-6">
                        <a href="{{ route('admin.editInstructorProfile', [ 'instructor_id' => $instructor->id]) }}"
                           class=" btn items-center mt-5 justify-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] flex px-6">
                            <svg class="w-5 h-5 fill-gray/50" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 22.75H9C3.57 22.75 1.25 20.43 1.25 15V9C1.25 3.57 3.57 1.25 9 1.25H11C11.41 1.25 11.75 1.59 11.75 2C11.75 2.41 11.41 2.75 11 2.75H9C4.39 2.75 2.75 4.39 2.75 9V15C2.75 19.61 4.39 21.25 9 21.25H15C19.61 21.25 21.25 19.61 21.25 15V13C21.25 12.59 21.59 12.25 22 12.25C22.41 12.25 22.75 12.59 22.75 13V15C22.75 20.43 20.43 22.75 15 22.75Z"
                                    fill="#fff"></path>
                                <path
                                    d="M8.50002 17.69C7.89002 17.69 7.33002 17.47 6.92002 17.07C6.43002 16.58 6.22002 15.87 6.33002 15.12L6.76002 12.11C6.84002 11.53 7.22002 10.78 7.63002 10.37L15.51 2.49C17.5 0.499998 19.52 0.499998 21.51 2.49C22.6 3.58 23.09 4.69 22.99 5.8C22.9 6.7 22.42 7.58 21.51 8.48L13.63 16.36C13.22 16.77 12.47 17.15 11.89 17.23L8.88002 17.66C8.75002 17.69 8.62002 17.69 8.50002 17.69ZM16.57 3.55L8.69002 11.43C8.50002 11.62 8.28002 12.06 8.24002 12.32L7.81002 15.33C7.77002 15.62 7.83002 15.86 7.98002 16.01C8.13002 16.16 8.37002 16.22 8.66002 16.18L11.67 15.75C11.93 15.71 12.38 15.49 12.56 15.3L20.44 7.42C21.09 6.77 21.43 6.19 21.48 5.65C21.54 5 21.2 4.31 20.44 3.54C18.84 1.94 17.74 2.39 16.57 3.55Z"
                                    fill="#fff"></path>
                                <path
                                    d="M19.85 9.83003C19.78 9.83003 19.71 9.82003 19.65 9.80003C17.02 9.06003 14.93 6.97003 14.19 4.34003C14.08 3.94003 14.31 3.53003 14.71 3.41003C15.11 3.30003 15.52 3.53003 15.63 3.93003C16.23 6.06003 17.92 7.75003 20.05 8.35003C20.45 8.46003 20.68 8.88003 20.57 9.28003C20.48 9.62003 20.18 9.83003 19.85 9.83003Z"
                                    fill="#fff"></path>
                            </svg>
                            <span class="ps-3 text-white font-bold text-sm ">{{ trans('admin/instructorPanel.edit_instructor') }}</span>
                        </a>
                    </div>

                    <div class="w-full flex items-stretch flex-wrap ">

                        <div class=" w-full md:w-4/12  md:px-5 mb-5 md:mb-0">
                            <div class="border border-[#DFDFDF] p-3 rounded-xl">

                                <div class="w-20 h-20 mt-10 mx-auto overflow-hidden rounded-full bg-gray/50 ">
                                    <img id='output' class=" object-cover w-full h-full imagereader"
                                         src="{{ asset('images/profiles/'.$instructor->photo) }}" alt="logo"/>
                                </div>
                                <p class="font-bold text-black34 text-center mt-4  text-xl ">{{ $instructor->lastName }}
                                    , {{ $instructor->firstName }}</p>
                                <p class="font-medium text-gray3 text-center   text-base ">{{ $instructor->email }}</p>
                                <div class="mb-3">
                                    <p class="font-bold text-black34 text-start mb-3  text-base mt-5 ">{{ trans('admin/instructorPanel.first_name') }}: <span
                                            class="font-normal">{{ $instructor->firstName }}</span></p>
                                    <p class="font-bold text-black34 text-start mb-3  text-base mt-5 ">{{ trans('admin/instructorPanel.last_name') }}: <span
                                            class="font-normal">{{ $instructor->lastName }}</span></p>
                                    <p class="font-bold text-black34 text-start mb-3  text-base">{{ trans('admin/instructorPanel.phone') }}: <span
                                            class="font-normal">{{ $instructor->phone}}</span></p>
                                    <p class="font-bold text-black34 text-start mb-3  text-base  ">{{ trans('admin/instructorPanel.email') }}: <span
                                            class="font-normal">{{ $instructor->email }}</span></p>
                                    <p class="font-bold text-black34 text-start mb-3  text-base  ">{{ trans('admin/instructorPanel.address') }}: <span
                                            class="font-normal">{{ $instructor->address}}</span></p>
                                    <p class="font-bold text-black34 text-start mb-3  text-base  ">{{ trans('admin/instructorPanel.facebook') }}: <span
                                            class="font-normal">{{ $instructor->facebook }}</span></p>

                                </div>
                            </div>
                            <p class="font-bold text-black34 mt-4  text-base ">{{ trans('admin/instructorPanel.bio') }}</p>
                            <div class="border border-[#DFDFDF] mt-5 p-3 rounded-xl">
                                <p class="font-normal text-black34 text-start mb-3  text-base ">
                                    {{ $instructor->bio }}
                                </p>
                            </div>
                        </div>
                        <div class=" w-full md:w-8/12 md:px-5">

                            <div class="    w-full flex flex-wrap">

                                <div class="w-full flex  md:w-4/12 mb-4 md:mb-0 md:pe-2">
                                    <div
                                        class="border flex-wrap w-full items-center flex border-[#DFDFDF] p-3  rounded-xl">
                                        <div
                                            class="bg-orange/50 flex items-center justify-center w-12 h-12 rounded-full">
                                            <p class="font-bold text-black34  text-2xl ">0</p>
                                        </div>
                                        <p class="font-semibold text-black34 ps-2 text-base  ">{{ trans('admin/instructorPanel.ongoing_courses') }}</p>
                                    </div>
                                </div>
                                <div class="w-full flex  md:w-4/12 mb-4 md:mb-0 md:pe-2">
                                    <div
                                        class="border flex-wrap w-full items-center flex border-[#DFDFDF] p-3  rounded-xl">
                                        <div
                                            class="bg-green/50 flex items-center justify-center w-12 h-12 rounded-full">
                                            <p class="font-bold text-black34  text-2xl ">0</p>
                                        </div>
                                        <p class="font-semibold text-black34 ps-2 text-base  ">{{ trans('admin/instructorPanel.finished_courses') }}</p>
                                    </div>
                                </div>
                                <div class="w-full flex  md:w-4/12 mb-4 md:mb-0 ">
                                    <div
                                        class="border flex-wrap w-full items-center flex border-[#DFDFDF] p-3  rounded-xl">
                                        <div
                                            class="bg-orange/50 flex items-center justify-center w-12 h-12 rounded-full">
                                            <p class="font-bold text-black34  text-2xl ">0</p>
                                        </div>
                                        <p class="font-semibold text-black34 ps-2 text-base  ">{{ trans('admin/instructorPanel.certificates') }}</p>
                                    </div>
                                </div>


                            </div>
                            <div class="w-full ">
                                <h4 class=" font-bold mt-10 text-2xl">{{ trans('admin/instructorPanel.active_courses') }}:</h4>
                                <table class="table " style="
                                        border-radius: 15px;
                                        overflow: hidden;
                                    " datatable id="datatable-basic">
                                    <thead class="bg-green/50 rounded-t-xl">
                                    <tr>
                                        <th class="font-bold uppercase text-white text-xxs">{{ trans('admin/instructorPanel.course') }}</th>
                                        <th class="font-bold uppercase text-white text-xxs">{{ trans('admin/instructorPanel.start_date') }}</th>
                                        <th class="font-bold uppercase text-white text-xxs ">{{ trans('admin/instructorPanel.expiration_date') }}</th>

                                        <th class="font-bold uppercase text-white text-xxs">{{ trans('admin/instructorPanel.expiration_date') }}</th>


                                    </tr>
                                    </thead>
                                    <tbody>

{{--                                    @foreach( $student->enrollments as $enroll)--}}
{{--                                        <tr>--}}
{{--                                            <td class="text-sm font-semibold  leading-normal">{{ $enroll->courseable->title }}</td>--}}
{{--                                            <td class="text-sm font-semibold  leading-normal">{{ $enroll->courseable->startDate }}</td>--}}
{{--                                            <td class="text-sm font-semibold  leading-normal">/</td>--}}
{{--                                            <td class="text-sm font-semibold  leading-normal">--}}
{{--                                                0/{{ $enroll->courseable->numberSessions }}</td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
                                    </tbody>
                                </table>

                                {{--                                <h4 class=" font-bold mt-5 text-2xl">Expired Courses:</h4>--}}

                                {{--                                <table class="table ss " style="--}}
                                {{--                                          border-radius: 15px;--}}
                                {{--                                          overflow: hidden;--}}
                                {{--                                      " datatable id="datatable-search">--}}
                                {{--                                    <thead class="bg-red-600 rounded-t-xl">--}}
                                {{--                                    <tr>--}}
                                {{--                                        <th class="font-bold uppercase text-white text-xxs">Course</th>--}}
                                {{--                                        <th class="font-bold uppercase text-white text-xxs">Start Date</th>--}}
                                {{--                                        <th class="font-bold uppercase text-white text-xxs ">Expiration Date</th>--}}

                                {{--                                        <th class="font-bold uppercase text-white text-xxs">Progress</th>--}}

                                {{--                                    </tr>--}}
                                {{--                                    </thead>--}}
                                {{--                                    <tbody>--}}

                                {{--                                    <tr>--}}

                                {{--                                        <td class="text-sm font-semibold  leading-normal">Why me?</td>--}}
                                {{--                                        <td class="text-sm font-semibold  leading-normal">Why me?</td>--}}
                                {{--                                        <td class="text-sm font-semibold  leading-normal">Why me?</td>--}}
                                {{--                                        <td class="text-sm font-semibold  leading-normal">Why me?</td>--}}


                                {{--                                    </tr>--}}


                                {{--                                    </tbody>--}}
                                {{--                                </table>--}}
                                {{--                                --}}
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
