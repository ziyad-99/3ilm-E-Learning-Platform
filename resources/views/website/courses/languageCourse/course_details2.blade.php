@extends('website.layouts.master')

@section('content')
    {{--    <div class=" widthfull grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 py-20 justify-between">--}}

    {{--        <div data-aos="fade-up" class="w-full md:col-span-2">--}}
    {{--            <h3 class=" font-bold  text-4xl">{{ $course->title }}</h3>--}}
    {{--            <p data-id="language"--}}
    {{--               class="  text-gray2 fontp font-normal lg:w-9/12 text-[15px] leading-[135%] mt-3 text-start">--}}

    {{--            </p>--}}
    {{--            <div class=" bg-white rounded-xl px-0 py-4 mt-10">--}}
    {{--                <div class=" w-full px-6 border-b border-[#E2E2E2]/30 border-solid">--}}
    {{--                    <div class="flex">--}}
    {{--                        <p class="font-medium fontp text-base border-b-2 border-[#FF6900] border-solid pb-2">--}}
    {{--                            Course Details</p>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--                <div data-aos="fade-up" class=" border-b border-[#E2E2E2]/30 px-6 py-5 pt-10">--}}
    {{--                    <div class=" flex flex-wrap  items-center">--}}
    {{--                        <p--}}
    {{--                            class=" order-2 md:order-1 w-full md:w-9/12 text-gray2 fontp font-normal lg:w-9/12 text-[15px] leading-[135%] mt-3 text-start">--}}
    {{--                            {{ $course->description }}--}}
    {{--                        </p>--}}
    {{--                        <div class=" order-1 md:order-2 w-full md:w-3/12 ps-5 flex flex-col">--}}
    {{--                            <div class="h-[90px] w-[90px] mx-auto rounded-full overflow-hidden ">--}}
    {{--                                <img class="h-full w-full object-cover"--}}
    {{--                                     src="{{ URL::asset('website/images/man.png') }}"/>--}}
    {{--                            </div>--}}
    {{--                            <p class="font-bold text-center mt-3 text-base ">{{ $course->instructor->firstName }}</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <p class="font-bold  mt-10 text-base ">What do you learn in this course : </p>--}}
    {{--                    <ul class="list-disc mb-5 ps-5">--}}

    {{--                        <li>--}}
    {{--                            <p--}}
    {{--                                class="  text-gray2 fontp font-normal text-[15px] leading-[135%] mt-3 text-start">--}}
    {{--                                Freelancers and entrepreneurs Freelancers and entrepreneurs use about.--}}
    {{--                            </p>--}}
    {{--                        </li>--}}
    {{--                    </ul>--}}

    {{--                </div>--}}
    {{--                <!-- in course use data-id="course" remove hidden add grid also add and remove grid from data-id="da3m" add hidden -->--}}
    {{--                <div data-id="course" data-aos="fade-up"--}}
    {{--                     class="hidden p-4  grid-cols-1 md:grid-cols-3  gap-4 justify-center items-center">--}}
    {{--                    <div class="w-full flex items-center p-5 rounded-xl bg-orange/10 justify-center">--}}
    {{--                        <img class="w-6 h-6" src="{{ URL::asset('website/images/time.svg') }}" alt="course">--}}
    {{--                        <span class="text-orange2 ps-3 font-semibold fontp text-base">--}}
    {{--                                    الحجم الساعي: 20 ساعة--}}
    {{--                                </span>--}}
    {{--                    </div>--}}
    {{--                    <div class="w-full flex items-center p-5 rounded-xl bg-orange/10 justify-center">--}}
    {{--                        <img class="w-6 h-6" src="../../static/images/book2.svg" alt="course">--}}
    {{--                        <span class="text-orange2 ps-3 font-semibold fontp text-base">--}}
    {{--                                    الحجم الساعي: 20 ساعة--}}
    {{--                                </span>--}}
    {{--                    </div>--}}
    {{--                    <div class="w-full flex items-center p-5 rounded-xl bg-orange/10 justify-center">--}}
    {{--                        <img class="w-6 h-6" src="../../static/images/date.svg" alt="course">--}}
    {{--                        <span class="text-orange2 ps-3 font-semibold fontp text-base">--}}
    {{--                                    الحجم الساعي: 20 ساعة--}}
    {{--                                </span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div data-id="da3m" id="groups"--}}
    {{--                     class=" w-full px-6 border-b mt-2 border-[#E2E2E2]/30  border-solid">--}}
    {{--                    <div class="flex">--}}
    {{--                        <p class="font-medium fontp text-base border-b-2 border-[#FF6900] border-solid pb-2"--}}
    {{--                           style="margin-right: 10%;">--}}
    {{--                            Total Hours: {{ $course->frameTime }} 13Hours.</p>--}}
    {{--                        <p class="font-medium fontp text-base border-b-2 border-[#FF6900] border-solid pb-2"--}}
    {{--                           style="margin-right: 10%;">--}}
    {{--                            Number of Sessions: {{ $course->frameTime }} 9.</p>--}}
    {{--                        <p class="font-medium fontp text-base border-b-2 border-[#FF6900] border-solid pb-2"--}}
    {{--                           style="margin-right: 10%;">--}}
    {{--                            Starting Date: {{ $course->startDate }}.</p>--}}
    {{--                    </div>--}}

    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div data-aos="fade-up" class=" w-full">--}}
    {{--            <div class="lg:sticky w-full top-1">--}}
    {{--                <div class="course-item w-full  rounded-xl bg-white">--}}
    {{--                    <div class="course-img-wrap overflow-hidden">--}}
    {{--                        <a href="#"><img--}}
    {{--                                src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"--}}
    {{--                                alt="course" class="img-fluid imgc"></a>--}}

    {{--                    </div>--}}
    {{--                    <div class="card-body">--}}

    {{--                        <div class="instructor-bottom-item flex mt-3 mb-2 text-[15px] fontp font-medium">--}}
    {{--                            <span class="ms-1 fontp font-medium">Sebject: </span>--}}
    {{--                            <span class="text-gray ps-2 fontp text-[15px]">--}}
    {{--                                        {{ $course->title }} Hours--}}
    {{--                                    </span>--}}
    {{--                        </div>--}}

    {{--                        <div class="instructor-bottom-item flex mt-3 mb-2 text-[15px] fontp font-medium">--}}
    {{--                            <span class="ms-1 fontp font-medium">Hour Rate: </span>--}}
    {{--                            <span class="text-gray ps-2 fontp text-[15px]">--}}
    {{--                                        {{ $course->frameTime }} Hours--}}
    {{--                                    </span>--}}
    {{--                        </div>--}}

    {{--                        <div class="course-item-bottom flex mt-2 mb-3 text-[15px] fontp font-medium">--}}
    {{--                            <span class="ms-1 fontp font-medium">Instructor :</span>--}}
    {{--                            <span class="text-gray ps-2 fontp text-[15px]">--}}
    {{--                                        {{ $course->instructor->firstName }}--}}
    {{--                                    </span>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <a href="{{ route('request.enroll', ['courseType' => 'LanguageCourse', 'slug' => $course->slug]) }}"--}}
    {{--                       class=" w-full btn-big cursor-pointer bg-green hover:bg-orange items-center justify-center flex px-6">--}}
    {{--                        <span class=" text-white font-bold text-sm ">{{ $course->price }} DA</span>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </div>--}}
    {{--    <div class="widthfull overflow-hidden pb-6 pt-10 mt-10">--}}
    {{--        <div class=" flex w-full justify-between">--}}
    {{--            <h3 class=" font-bold text-2xl md:text-3xl">Languages Courses</h3>--}}
    {{--            <a href="{{ route('all_languages_courses.index') }}"--}}
    {{--               class="flex justify-center bg-orange hover:bg-orange3 hover:scale-[1.01] transform transition-all rounded-xl px-5 py-2 items-center">--}}
    {{--                <span class="text-sm md:text-sm text-white fontp font-medium">View All</span>--}}
    {{--                <svg class="w-[6px] md:w-[6px] ms-3" width="10" height="17" viewBox="0 0 10 17" fill="none"--}}
    {{--                     xmlns="http://www.w3.org/2000/svg">--}}
    {{--                    <path d="M2 2L7.5118 7.35101C8.16273 7.98295 8.16273 9.01704 7.5118 9.64899L2 15"--}}
    {{--                          stroke="#fff" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"--}}
    {{--                          stroke-linejoin="round"/>--}}
    {{--                </svg>--}}

    {{--            </a>--}}
    {{--        </div>--}}
    {{--        <div class=" relative w-full mt-8 flex">--}}
    {{--            <div class="slider2 slider-nav5 sdsds w-full" style="color: #000; " data-aos="fade-up">--}}

    {{--                @foreach($lang_courses as $course)--}}
    {{--                    <div class="w-full px-2">--}}
    {{--                        <div class="course-item w-full  rounded-xl bg-white">--}}
    {{--                            <div class="course-img-wrap overflow-hidden">--}}
    {{--                                <a href="#"><img--}}
    {{--                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"--}}
    {{--                                        alt="course" class="img-fluid imgc"></a>--}}

    {{--                            </div>--}}
    {{--                            <div class="card-body">--}}

    {{--                                <div class="instructor-bottom-item flex mt-3 mb-2 text-[15px] fontp font-medium">--}}
    {{--                                    <span class="ms-1 fontp font-medium">Subject:</span>--}}
    {{--                                    <span class="text-gray ps-2 fontp text-[15px]">--}}
    {{--                                           {{ Str::limit($course->title, 20, '...') }}--}}
    {{--                                        </span>--}}
    {{--                                </div>--}}

    {{--                                <div class="instructor-bottom-item flex mt-3 mb-2 text-[15px] fontp font-medium">--}}
    {{--                                    <span class="ms-1 fontp font-medium">Hour Rate:</span>--}}
    {{--                                    <span class="text-gray ps-2 fontp text-[15px]">--}}
    {{--                                            {{ $course->frameTime }} Hour--}}
    {{--                                        </span>--}}
    {{--                                </div>--}}


    {{--                                <div class="course-item-bottom flex mt-2 mb-3 text-[15px] fontp font-medium">--}}
    {{--                                    <span class="ms-1 fontp font-medium">Instructor:</span>--}}
    {{--                                    <span class="text-gray ps-2 fontp text-[15px]">--}}
    {{--                                            {{ Str::limit($course->instructor->firstName, 10, '...') }}--}}
    {{--                                        </span>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <a href="{{ route('languages_course.details', ['slug' => $course->slug]) }}"--}}
    {{--                               class=" w-full btn-big cursor-pointer bg-green hover:bg-orange items-center justify-center flex px-6">--}}
    {{--                                <span class=" text-white font-bold text-sm ">Start Session</span>--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <div--}}
    {{--        class="fixed flexsss24 top-0 left-0 right-0 z-50  hidden flex-col  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">--}}
    {{--        <div class="relative w-full max-w-2xl mx-auto my-auto  max-h-full">--}}
    {{--            <div class="relative bg-white rounded-2xl  shadow">--}}
    {{--                <button type="button" onclick="closePop('.flexsss24')"--}}
    {{--                        class="absolute top-3 right-2.5 group text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center "--}}
    {{--                        data-modal-hide="popup-modal">--}}
    {{--                    <svg aria-hidden="true" class="w-5 h-5 fill-gray2 group-hover:fill-orange"--}}
    {{--                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">--}}
    {{--                        <path fill-rule="evenodd"--}}
    {{--                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"--}}
    {{--                              clip-rule="evenodd"></path>--}}
    {{--                    </svg>--}}
    {{--                    <span class="sr-only">Close modal</span>--}}
    {{--                </button>--}}
    {{--                <div class="p-6 text-center">--}}
    {{--                    <h3 class="mb-5 text-md font-medium text-black34">choose one </h3>--}}
    {{--                    <div class=" flex items-center justify-center">--}}
    {{--                        <a href="#" onclick="closePop('.flexsss24')" type="button"--}}
    {{--                           class="text-orange fontp hover:bg-orange hover:text-white transform transition-all hover:scale-[1.01] font-semibold bg-orange/20  mt-3  h-14  rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">--}}
    {{--                            1 month 250.00DA--}}
    {{--                        </a>--}}
    {{--                        <a href="#" onclick="closePop('.flexsss24')" type="button"--}}
    {{--                           class="text-orange hover:bg-orange hover:text-white transform transition-all hover:scale-[1.01] fontp font-semibold bg-orange/20  mt-3  h-14  rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">--}}
    {{--                            3 month 250.00DA--}}
    {{--                        </a>--}}
    {{--                        <a href="#" onclick="closePop('.flexsss24')" type="button"--}}
    {{--                           class="text-orange fontp hover:bg-orange hover:text-white transform transition-all hover:scale-[1.01] font-semibold bg-orange/20  mt-3  h-14  rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">--}}
    {{--                            6 month 250.00DA--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    <div class="bg-[#f5f5f5]">
        <div>
            <h3 class=" font-bold text-center text-4xl">Languages</h3>
            <p data-id="language"
               class=" text-center text-gray2 fontp font-normal mx-auto lg:w-9/12 text-[15px] leading-[135%] mt-4 mb-12">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum. </p>
            <img class="h-auto max-h-[450px] w-full object-cover" src="{{ asset('website/images/lange.png') }}"/>


            <div data-id="language" class="bg-white py-20 w-full ">
                <div class="widthfull grid grid-cols-1 gap-4 md:gap-0 md:grid-cols-3">
                    <div class=" flex flex-col w-full ">
                        <div
                            class="bg-orange rounded-full w-14 h-14 mx-auto text-center items-center flex justify-center">
                            <p class=" fontp w-full text-center text-white font-bold">1</p>
                        </div>
                        <p class="fontp text-orange font-semibold text-center w-full text-base leading-[136%] mt-3">
                            Choose a Language
                        </p>
                    </div>
                    <div class=" flex flex-col w-full ">
                        <div
                            class="bg-orange rounded-full w-14 h-14 mx-auto text-center items-center flex justify-center">
                            <p class=" fontp w-full text-center text-white font-bold">1</p>
                        </div>
                        <p class="fontp text-orange font-semibold text-center w-full text-base leading-[136%] mt-3">
                            Take a Test
                        </p>
                    </div>
                    <div class=" flex flex-col w-full ">
                        <div
                            class="bg-orange rounded-full w-14 h-14 mx-auto text-center items-center flex justify-center">
                            <p class=" fontp w-full text-center text-white font-bold">1</p>
                        </div>
                        <p class="fontp text-orange font-semibold text-center w-full text-base leading-[136%] mt-3">
                            Start Learning
                        </p>
                    </div>
                </div>
            </div>

            <div class="widthfull overflow-hidden pb-6 pt-10 mt-10">
                <div class=" flex w-full justify-between">
                    <h3 class=" font-bold text-2xl md:text-3xl">Languages Courses</h3>
                    <a
                        class="flex justify-center bg-orange hover:bg-orange3 hover:scale-[1.01] transform transition-all rounded-xl px-5 py-2 items-center">
                        <span class="text-sm md:text-sm text-white fontp font-medium">View All</span>
                        <svg class="w-[6px] md:w-[6px] ms-3" width="10" height="17" viewBox="0 0 10 17" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 2L7.5118 7.35101C8.16273 7.98295 8.16273 9.01704 7.5118 9.64899L2 15"
                                  stroke="#fff" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                    </a>
                </div>
                <div class=" relative w-full mt-8 flex">
                    <div class="slider2 slider-nav5 sdsds w-full" style="color: #000; " data-aos="fade-up">

                        @foreach($lang_courses as $course)
                            <div class="w-full px-2">
                                <div class="course-item w-full  rounded-xl bg-white">
                                    <div class="course-img-wrap overflow-hidden">
                                        <a href="#"><img
                                                src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                                alt="course" class="img-fluid imgc"></a>

                                    </div>
                                    <div class="card-body">

                                        <div
                                            class="instructor-bottom-item flex mt-3 mb-2 text-[15px] fontp font-medium">
                                            <span class="ms-1 fontp font-medium"> </span>
                                            <span class="text-gray ps-2 fontp text-[15px]">
                                                                   {{ Str::limit($course->title, 2, '...') }}
                                                                </span>
                                        </div>

                                        <div
                                            class="instructor-bottom-item flex mt-3 mb-2 text-[15px] fontp font-medium">
                                            <span class="ms-1 fontp font-medium"></span>
                                            <span class="text-gray ps-2 fontp text-[15px]">
                                                                </span>
                                        </div>


                                        <div class="course-item-bottom flex mt-2 mb-3 text-[15px] fontp font-medium">
                                            <span class="ms-1 fontp font-medium"></span>
                                            <span class="text-gray ps-2 fontp text-[15px]">
                                                                </span>
                                        </div>
                                    </div>
                                    <a href="{{ route('languages_course.details', ['slug' => $course->slug]) }}"
                                       class=" w-full btn-big cursor-pointer bg-green hover:bg-orange items-center justify-center flex px-6">
                                        <span class=" text-white font-bold text-sm ">Take A Test</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
                <div class="video-container overflow-hidden rounded-xl">
                    <iframe src="https://www.youtube.com/embed/OyGE7zVOGos" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>

                </div>
            </div>
            <div class=" bg-black/50 hidden fixed top-0 gg422 bottom-0 right-0 left-0 z-50"></div>

            <div
                class="fixed flexsss24 top-0 left-0 right-0 z-50  hidden flex-col  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl mx-auto my-auto  max-h-full">
                    <div class="relative bg-white rounded-2xl  shadow">
                        <button type="button" onclick="closePop('.flexsss24')"
                                class="absolute top-3 right-2.5 group text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center "
                                data-modal-hide="popup-modal">
                            <svg aria-hidden="true" class="w-5 h-5 fill-gray2 group-hover:fill-orange"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <h3 class="mb-5 text-md font-medium text-black34">choose one </h3>
                            <div class=" flex items-center justify-center">
                                <a href="#" onclick="closePop('.flexsss24')" type="button"
                                   class="text-orange fontp hover:bg-orange hover:text-white transform transition-all hover:scale-[1.01] font-semibold bg-orange/20  mt-3  h-14  rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">
                                    1 month 250.00DA
                                </a>
                                <a href="#" onclick="closePop('.flexsss24')" type="button"
                                   class="text-orange hover:bg-orange hover:text-white transform transition-all hover:scale-[1.01] fontp font-semibold bg-orange/20  mt-3  h-14  rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">
                                    3 month 250.00DA
                                </a>
                                <a href="#" onclick="closePop('.flexsss24')" type="button"
                                   class="text-orange fontp hover:bg-orange hover:text-white transform transition-all hover:scale-[1.01] font-semibold bg-orange/20  mt-3  h-14  rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">
                                    6 month 250.00DA
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../static/js/all.js"></script>
        <script src="../../static/js/home.js"></script>
        <script>
            AOS.init({
                offset: 200, // offset (in px) from the original trigger point
                delay: 100,
                duration: 800,
            });
        </script>

        @endsection

        @section('js')

            <script>
                AOS.init({
                    offset: 200, // offset (in px) from the original trigger point
                    delay: 100,
                    duration: 800,
                });
            </script>
@endsection
