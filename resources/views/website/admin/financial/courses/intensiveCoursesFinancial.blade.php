@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.IntensiveFinancialReport') }}
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/admin.IntensiveFinancialReport') }}</span>
            </h4>
            <div class="w-full px-2 pt-5 mb-5 flex flex-wrap ">
                <div class="w-full md:px-3 md:w-4/12">
                    <div class=" flex items-center flex-col w-full bg-white rounded-2xl py-10 p-4">
                        <p class="text-3xl font-semibold text-orange fontp">{{ $totalCourses }}</p>
                        <p class="text-lg font-semibold text-black34 fontp">{{ trans('admin/admin.TotalCourses') }}</p>
                    </div>
                </div>
                <div class="w-full md:pe-3 md:w-4/12">
                    <div class=" flex items-center flex-col w-full bg-white rounded-2xl py-10 p-4">
                        <p class="text-3xl font-semibold text-orange fontp">{{ $totalEnrolled }}</p>
                        <p class="text-lg font-semibold text-black34 fontp">{{ trans('admin/admin.TotalEnrolled') }}</p>
                    </div>
                </div>
                <div class="w-full md:ps-3 md:w-4/12">
                    <div class=" flex items-center flex-col w-full bg-white rounded-2xl py-10 p-4">
                        <p class="text-3xl font-semibold text-orange fontp">{{ $totalEarnings }} {{ trans('admin/admin.(DA)') }}</p>
                        <p class="text-lg font-semibold text-black34 fontp">{{ trans('admin/admin.TotalEarnings') }}</p>
                    </div>
                </div>

            </div>
            <div class="w-full  mb-4 max-w-full px-3 flex-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 d  rounded-2xl bg-clip-border">

                    <div>
                        <table class="table admin" datatable id="datatable-search-list">
                            <thead>
                            <tr class="bg-orange/30">
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Course') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Instructor') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Students') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Earnings') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($intenCourses as $course)
                                <tr>
                                    <td>
                                        <div
                                            class="text-white text-sm flex gap-2 items-center font-semibold w-[100px] ">
                                            <img class="h-auto  w-12 object-contain relative"
                                                 src="{{ asset('images/profiles/'.$course->img) }}"/>
                                            <p class="text-black34 font-semibold text-base">
                                                {{ $course->title }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="text-sm font-medium text-black34 fontp leading-normal">
                                        {{ $course->instructor->firstName }}
                                    </td>
                                    <td class="text-sm font-medium text-black34 fontp leading-normal">
                                        {{ $course->enrollments->count() }}
                                    </td>
                                    <td class="text-sm font-medium text-black34 fontp leading-normal">
                                        {{ $course->enrollments->count() * $course->price }}
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
@endsection
