@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.FinancialsPanel') }}
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl  lg:leading-[120%] ">
                <span>{{ trans('admin/admin.FinancialsPanel') }}</span>
            </h4>
            <div class="w-full px-2 pt-5 mb-5 flex flex-wrap ">

                <div class="flex flex-wrap mt-6 ">
                    <h4 class="font-bold w-full text-black34 mx-auto my-5 text-lg px-4 lg:leading-[120%] ">
                        <span>{{ trans('admin/admin.Enrollment') }}</span>
                    </h4>

                    <div class="w-full max-w-full px-3 mt-0 mb-4 lg:w-7/12 lg:flex-none">
                        <div
                            class="border-black/12.5 relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                            <div
                                class="border-black/12.5 flex justify-between items-center mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                                <h6 class="capitalize font-bold text-black34">{{ trans('admin/admin.TotalEnrollments') }}</h6>
                                <div class=" flex items-center ms-auto">
                                    <button id="month1"
                                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10 h-11">
                                        <span
                                            class=" text-white font-bold text-sm ">{{ trans('admin/admin.Monthly') }}</span>
                                    </button>
                                    <button id="year1"
                                            class=" btn items-center bg-white border border-orange group text-orange ms-3 hover:bg-orange3 transform hover:scale-105  mt-5 flex px-10  h-11">
                                            <span
                                                class=" text-orange font-bold group-hover:text-white text-sm transition ease-in-out">{{ trans('admin/admin.Last5year') }}</span>
                                    </button>
                                </div>
                            </div>
                            <div class="flex-auto p-4">
                                <div>
                                    <canvas id="chart-line" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:pe-3 md:w-5/12">
                        <div class=" flex items-center flex-col w-full bg-white rounded-2xl py-5 p-4">
                            <div class=" flex items-center w-full justify-between mb-5">
                                <h6 class="capitalize font-bold text-black34">{{ trans('admin/admin.Total Earned') }}</h6>
                                <div class=" flex items-center ms-auto ">
                                    <button id="month2"
                                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0  flex px-10 h-11">
                                        <span
                                            class=" text-white font-bold text-sm ">{{ trans('admin/admin.This Month') }}</span>
                                    </button>
                                    <button id="year2"
                                            class=" btn items-center bg-white border border-orange group text-orange ms-3 hover:bg-orange3 transform hover:scale-105  flex px-10  h-11">
                                            <span
                                                class=" text-orange font-bold group-hover:text-white text-sm transition ease-in-out">{{ trans('admin/admin.This Week') }}</span>
                                    </button>
                                </div>
                            </div>
                            <p id="change2" class="text-3xl py-6 font-semibold text-black34 fontp">
                                {{ $totalEarnedThisMonth }} {{ trans('admin/admin.(DA)') }}
                            </p>

                            <p id="change22" class="text-3xl py-6 hidden font-semibold text-black34 fontp">
                                {{ $earningLast7Days }} {{ trans('admin/admin.(DA)') }}
                            </p>
                        </div>
                        <div class=" flex items-center flex-col w-full mt-4 bg-white rounded-2xl py-5 p-4">
                            <div class=" flex items-center w-full justify-between mb-5">
                                <h6 class="capitalize font-bold text-black34">{{ trans('admin/admin.TotalEnrollments') }}</h6>
                                <div class=" flex items-center ms-auto ">
                                    <button id="month3"
                                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0  flex px-10 h-11">
                                        <span
                                            class=" text-white font-bold text-sm ">{{ trans('admin/admin.Month') }}</span>
                                    </button>
                                    <button id="year3"
                                            class=" btn items-center bg-white border border-orange group text-orange ms-3 hover:bg-orange3 transform hover:scale-105  flex px-10  h-11">
                                            <span
                                                class=" text-orange font-bold group-hover:text-white text-sm transition ease-in-out">{{ trans('admin/admin.year') }}</span>
                                    </button>
                                </div>
                            </div>

                            <p id="change3" class="text-3xl py-6 font-semibold text-black34 fontp">
                                {{ $enrollmentsLastMonth }}
                            </p>

                            <p id="change32" class="text-3xl hidden py-6 font-semibold text-black34 fontp">
                                {{ $enrollmentsLastYear }}
                            </p>
                        </div>
                    </div>
                    <h4 class="font-bold w-full text-black34 mx-auto my-5 text-lg px-4 lg:leading-[120%]">
                        <span>{{ trans('admin/admin.RecentEarnings') }}</span>
                    </h4>

                    <div class="w-full md:px-3 md:w-4/12">
                        <div class=" mt-10  items-center w-full bg-white rounded-2xl  p-4">
                            <div class="flex justify-between w-full border-b pb-4 border-[#DFDFDF]/50">
                                <p class="text-sm font-semibold text-black34 fontp">{{ trans('admin/admin.Department') }}</p>
                                <p class="text-sm font-semibold text-black34 fontp md:w-4/12">{{ trans('admin/admin.TotalEarnings') }}</p>
                            </div>

                            <a href="{{ route('admin.languagesCoursesFinancials') }}">
                                <div class="flex mt-4 items-center w-full border-b pb-4 border-[#DFDFDF]/50">
                                    <div class="w-8 h-8 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                        <img id='output' class=" object-cover w-full h-full imagereader"
                                             src="{{ asset('website/admin/images/souf1.webp') }}" alt="logo"/>
                                    </div>
                                    <p class="text-sm  font-medium text-gray2 fontp">{{ trans('admin/admin.Languages') }}</p>
                                    <p class="text-sm ms-auto font-semibold text-black34 fontp md:w-4/12">
                                        {{ $allLanguagesCoursesEarning }} {{ trans('admin/admin.(DA)') }}
                                    </p>
                                </div>
                            </a>
                            <a href="{{ route('admin.supportingCoursesFinancials') }}">
                                <div class="flex mt-4 items-center w-full border-b pb-4 border-[#DFDFDF]/50">
                                    <div class="w-8 h-8 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                        <img id='output' class=" object-cover w-full h-full imagereader"
                                             src="{{ asset('website/admin/images/souf1.webp') }}" alt="logo"/>
                                    </div>
                                    <p class="text-sm  font-medium text-gray2 fontp">{{ trans('admin/admin.Supporting') }}</p>
                                    <p class="text-sm ms-auto font-semibold text-black34 fontp md:w-4/12">{{ $allSupportingCoursesEarning }}
                                        {{ trans('admin/admin.(DA)') }}
                                    </p>
                                </div>
                            </a>

                            <a href="{{ route('admin.intensiveCoursesFinancials') }}">
                                <div class="flex mt-4 items-center w-full">
                                    <div class="w-8 h-8 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                        <img id='output' class=" object-cover w-full h-full imagereader"
                                             src="{{ asset('website/admin/images/souf1.webp') }}" alt="logo"/>
                                    </div>
                                    <p class="text-sm  font-medium text-gray2 fontp">{{ trans('admin/admin.IntensiveCourse') }}</p>
                                    <p class="text-sm ms-auto font-semibold text-black34 fontp md:w-4/12">
                                        {{ $allIntensiveCoursesEarning }} {{ trans('admin/admin.(DA)') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="w-full md:pe-3 md:w-4/12">

                        <a href="{{ route('admin.coursesFinancials') }}"
                           class="flex  ms-auto w-32 hover:text-orange transform hover:scale-[1.01] transition-all rounded-xl px-4 py-2 items-center">
                            <span class="text-sm md:text-base text-orange fontp font-medium">View All</span>
                            <svg class="w-[6px] md:w-[6px] transform  rtl:-scale-100  ms-2" width="10" height="17"
                                 viewBox="0 0 10 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2L7.5118 7.35101C8.16273 7.98295 8.16273 9.01704 7.5118 9.64899L2 15"
                                      stroke="#FF820F" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>

                        <div class="  items-center w-full bg-white rounded-2xl  p-4">
                            <div class="flex justify-between w-full border-b pb-4 border-[#DFDFDF]/50">
                                <p class="text-sm font-semibold text-black34 fontp">{{ trans('admin/admin.Course') }}</p>
                                <p class="text-sm font-semibold text-black34 fontp md:w-4/12">{{ trans('admin/admin.TotalEarnings') }}</p>
                            </div>

                            @if($randomSupportingCourse->count() != 0)
                                <div class="flex mt-4 items-center w-full border-b pb-4 border-[#DFDFDF]/50">
                                    <div class="w-8 h-8 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                        <img id='output' class=" object-cover w-full h-full imagereader"
                                             src="{{ asset('images/courses/'.$randomSupportingCourse->img) }}"
                                             alt="logo"/>
                                    </div>
                                    <p class="text-sm  font-medium text-gray2 fontp">
                                        {{ $randomSupportingCourse->title }}
                                    </p>
                                    <p class="text-sm ms-auto font-semibold text-black34 fontp md:w-4/12">
                                        {{ $randomSupportingCourse->enrollments->count() * $randomSupportingCourse->price }}
                                        {{ trans('admin/admin.(DA)') }}
                                    </p>
                                </div>
                            @endif

                            @if($randomIntensiveCourse->count() != 0)
                                <div class="flex mt-4 items-center w-full border-b pb-4 border-[#DFDFDF]/50">
                                    <div class="w-8 h-8 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                        <img id='output' class=" object-cover w-full h-full imagereader"
                                             src="{{ asset('images/courses/'.$randomIntensiveCourse->img) }}"
                                             alt="logo"/>
                                    </div>
                                    <p class="text-sm  font-medium text-gray2 fontp">
                                        {{ $randomIntensiveCourse->title }}
                                    </p>
                                    <p class="text-sm ms-auto font-semibold text-black34 fontp md:w-4/12">
                                        {{ $randomIntensiveCourse->enrollments->count() * $randomIntensiveCourse->price }}
                                        {{ trans('admin/admin.(DA)') }}
                                    </p>
                                </div>
                            @endif

                            @if($randomLanguagesCourse->count() != 0)
                                <div class="flex mt-4 items-center w-full border-b pb-4 border-[#DFDFDF]/50">
                                    <div class="w-8 h-8 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                        <img id='output' class=" object-cover w-full h-full imagereader"
                                             src="{{ asset('images/courses/'.$randomLanguagesCourse->img) }}"
                                             alt="logo"/>
                                    </div>
                                    <p class="text-sm  font-medium text-gray2 fontp">
                                        {{ $randomLanguagesCourse->title }}
                                    </p>
                                    <p class="text-sm ms-auto font-semibold text-black34 fontp md:w-4/12">
                                        {{ $randomLanguagesCourse->enrollments->count() * $randomLanguagesCourse->price }}
                                        {{ trans('admin/admin.(DA)') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="w-full md:pe-3 md:w-4/12">
                        <a href="{{ route('admin.instructorFinancial') }}"
                           class="flex  ms-auto w-32 hover:text-orange transform hover:scale-[1.01] transition-all rounded-xl px-4 py-2 items-center">
                            <span class="text-sm md:text-base text-orange fontp font-medium">View All</span>
                            <svg class="w-[6px] md:w-[6px] transform  rtl:-scale-100  ms-2" width="10" height="17"
                                 viewBox="0 0 10 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2L7.5118 7.35101C8.16273 7.98295 8.16273 9.01704 7.5118 9.64899L2 15"
                                      stroke="#FF820F" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                        </a>
                        <div class="  items-center w-full bg-white rounded-2xl  p-4">
                            <div class="flex justify-between w-full border-b pb-4 border-[#DFDFDF]/50">

                                <p class="text-sm font-semibold text-black34 fontp">{{ trans('admin/admin.Instructor') }}</p>
                                <p class="text-sm font-semibold text-black34 fontp md:w-4/12">{{ trans('admin/admin.TotalEarnings') }}</p>

                            </div>

                            @if($instructors->count() >= 3)
                                @foreach($instructors->random(3) as $instructor)
                                    @php
                                        $supportingCourses = $instructor->supCourse;
                                        $languagesCourses = $instructor->langCourse;
                                        $intensiveCourses = $instructor->intenCourse;

                                        $instructorEarning = 0;
                                    @endphp

                                    @foreach ($supportingCourses as $course)
                                        @php
                                            $courseEnrollments = $course->enrollments()->count();

                                            $instructorEarning += $courseEnrollments * $course->price;
                                        @endphp
                                    @endforeach

                                    @foreach ($languagesCourses as $course)
                                        @php
                                            $courseEnrollments = $course->enrollments()->count();

                                            $instructorEarning += $courseEnrollments * $course->price;
                                        @endphp
                                    @endforeach

                                    @foreach ($intensiveCourses as $course)
                                        @php
                                            $courseEnrollments = $course->enrollments()->count();

                                            $instructorEarning += $courseEnrollments * $course->price;
                                        @endphp
                                    @endforeach

                                    <div class="flex mt-4 items-center w-full border-b pb-4 border-[#DFDFDF]/50">
                                        <div class="w-8 h-8 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                            <img id='output' class=" object-cover w-full h-full imagereader"
                                                 src="{{ asset('images/profiles/'. $instructor->photo) }}" alt="logo"/>
                                        </div>
                                        <p class="text-sm  font-medium text-gray2 fontp">{{ $instructor->firstName }}</p>
                                        <p class="text-sm ms-auto font-semibold text-black34 fontp md:w-4/12">{{ $instructorEarning }}
                                            {{ trans('admin/admin.(DA)') }}
                                        </p>
                                    </div>
                                @endforeach
                            @else
                                @foreach($instructors as $instructor)
                                    @php
                                        $supportingCourses = $instructor->supCourse;
                                        $languagesCourses = $instructor->langCourse;
                                        $intensiveCourses = $instructor->intenCourse;

                                        $instructorEarning = 0;
                                    @endphp

                                    @foreach ($supportingCourses as $course)
                                        @php
                                            $courseEnrollments = $course->enrollments()->count();

                                            $instructorEarning += $courseEnrollments * $course->price;
                                        @endphp
                                    @endforeach

                                    @foreach ($languagesCourses as $course)
                                        @php
                                            $courseEnrollments = $course->enrollments()->count();

                                            $instructorEarning += $courseEnrollments * $course->price;
                                        @endphp
                                    @endforeach

                                    @foreach ($intensiveCourses as $course)
                                        @php
                                            $courseEnrollments = $course->enrollments()->count();

                                            $instructorEarning += $courseEnrollments * $course->price;
                                        @endphp
                                    @endforeach

                                    <div class="flex mt-4 items-center w-full border-b pb-4 border-[#DFDFDF]/50">
                                        <div class="w-8 h-8 me-2 overflow-hidden rounded-full bg-gray/50 ">
                                            <img id='output' class=" object-cover w-full h-full imagereader"
                                                 src="{{ asset('images/profiles/'. $instructor->photo) }}" alt="logo"/>
                                        </div>
                                        <p class="text-sm  font-medium text-gray2 fontp">{{ $instructor->firstName }}</p>
                                        <p class="text-sm ms-auto font-semibold text-black34 fontp md:w-4/12">{{ $instructorEarning }}
                                            {{ trans('admin/admin.(DA)') }}
                                        </p>
                                    </div>
                                @endforeach

                            @endif
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

    <script src="{{ asset('website/admin/js/chartjs.min.js') }}"></script>
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

        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(255, 130, 15, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(255, 130, 15, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(255, 130, 15, 0)');

        let chart1 = new Chart(ctx1, {
            type: "line",
            data: {
                // labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jun", "Jul", "Aug"],
                labels: [
                    @foreach($enrollmentsLast12Months as $index => $monthEnrollments)
                        "{{ $index }}",
                    @endforeach
                ],
                datasets: [{
                    label: "Enrollment",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#FF820F",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    // data: [1000, 40, 300, 220, 500, 250, 400, 230, 500, 250, 400, 230, 500],
                    data: [
                        @foreach($enrollmentsLast12Months as $index => $monthEnrollments)
                            "{{ $monthEnrollments }}",
                        @endforeach
                    ],
                    maxBarThickness: 12,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        let month1 = document.getElementById("month1");
        let month2 = document.getElementById("month2");
        let month3 = document.getElementById("month3");
        let year1 = document.getElementById("year1");
        let year2 = document.getElementById("year2");
        let year3 = document.getElementById("year3");
        let change2 = document.getElementById("change2");
        let change22 = document.getElementById("change22");
        let change3 = document.getElementById("change3");
        let change32 = document.getElementById("change32");

        month1.addEventListener('click', function (e) {
            year1.classList = "btn items-center bg-white border border-orange group text-orange ms-3 hover:bg-orange3 transform hover:scale-105  flex px-10  h-11";
            month1.classList = "btn items-center hover:bg-orange3 transform hover:scale-105 ms-0  flex px-10 h-11";
            year1.firstElementChild.classList = "text-orange font-bold group-hover:text-white text-sm transition ease-in-out";
            month1.firstElementChild.classList = "text-white font-bold text-sm";
            chart1.data.datasets[0].data = [
                @foreach($enrollmentsLast12Months as $index => $monthEnrollments)
                    "{{ $monthEnrollments }}",
                @endforeach
            ];
            chart1.data.labels = [
                @foreach($enrollmentsLast12Months as $index => $monthEnrollments)
                    "{{ $index }}",
                @endforeach
            ];
            chart1.update();
        })
        year1.addEventListener('click', function (e) {
            month1.classList = "btn items-center bg-white border border-orange group text-orange  hover:bg-orange3 transform hover:scale-105  flex px-10  h-11";
            year1.classList = "btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 ms-3 flex px-10 h-11";
            month1.firstElementChild.classList = "text-orange font-bold group-hover:text-white text-sm transition ease-in-out";
            year1.firstElementChild.classList = "text-white font-bold text-sm";
            chart1.data.datasets[0].data = [
                @foreach($enrollmentsLast5Years as $index => $yearEnrollments)
                    "{{ $yearEnrollments }}",
                @endforeach
            ];

            chart1.data.labels = [
                @foreach($enrollmentsLast5Years as $index => $yearEnrollments)
                    "{{ $index }}",
                @endforeach
            ];
            chart1.update();
        })


        month2.addEventListener('click', function (e) {
            year2.classList = "btn items-center bg-white border border-orange group text-orange ms-3 hover:bg-orange3 transform hover:scale-105  flex px-10  h-11";
            month2.classList = "btn items-center hover:bg-orange3 transform hover:scale-105 ms-0  flex px-10 h-11";
            year2.firstElementChild.classList = "text-orange font-bold group-hover:text-white text-sm transition ease-in-out";
            month2.firstElementChild.classList = "text-white font-bold text-sm";
            change22.classList.add("hidden");
            change2.classList.remove("hidden")
        })
        year2.addEventListener('click', function (e) {
            month2.classList = "btn items-center bg-white border border-orange group text-orange  hover:bg-orange3 transform hover:scale-105  flex px-10  h-11";
            year2.classList = "btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 ms-3 flex px-10 h-11";
            month2.firstElementChild.classList = "text-orange font-bold group-hover:text-white text-sm transition ease-in-out";
            year2.firstElementChild.classList = "text-white font-bold text-sm";
            change2.classList.add("hidden");
            change22.classList.remove("hidden")
        })
        month3.addEventListener('click', function (e) {
            year3.classList = "btn items-center bg-white border border-orange group text-orange ms-3 hover:bg-orange3 transform hover:scale-105  flex px-10  h-11";
            month3.classList = "btn items-center hover:bg-orange3 transform hover:scale-105 ms-0  flex px-10 h-11";
            year3.firstElementChild.classList = "text-orange font-bold group-hover:text-white text-sm transition ease-in-out";
            month3.firstElementChild.classList = "text-white font-bold text-sm";
            change32.classList.add("hidden");
            change3.classList.remove("hidden")
        })
        year3.addEventListener('click', function (e) {
            month3.classList = "btn items-center bg-white border border-orange group text-orange  hover:bg-orange3 transform hover:scale-105  flex px-10  h-11";
            year3.classList = "btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 ms-3 flex px-10 h-11";
            month3.firstElementChild.classList = "text-orange font-bold group-hover:text-white text-sm transition ease-in-out";
            year3.firstElementChild.classList = "text-white font-bold text-sm";
            change3.classList.add("hidden");
            change32.classList.remove("hidden")
        })
    </script>
@endsection
