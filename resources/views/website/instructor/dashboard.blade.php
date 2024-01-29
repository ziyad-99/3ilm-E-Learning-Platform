@extends('website.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div>
        <section class="flex flex-wrap widthfull pt-6">
            <div class="order-2 md:order-1 w-full lg:w-7/12">
                <h1
                    class=" mt-16 text-black text-3xl md:text-5xl font-bold leading-[112%] lg:leading-[120%] lg:text-6xl">
                    <img class=" h-[70px] md:h-[85px] object-contain"
                         src="{{ URL::asset('website/images/3ilm_arab.svg') }}"/>
                    {{ trans('website/welcome.Platform_online') }}
                </h1>

                <div class=" flex flex-wrap items-center my-10">
                    <div class="flex w-[45%] md:w-[30%] lg:w-[25%] items-center">
                        <h4 class=" text-2xl md:text-3xl  lg:text-4xl text-black34 font-bold">
                            {{ $enrolls_number }}+</h4>
                        <span class="text-black34  ps-3 text-[13px] md:text-[15px] font-medium">
                            {{ trans('website/welcome.students_enrolled') }}</span>
                    </div>
                    <div class="bg-blackob w-[1px] h-8 mx-2 lg:mx-4 opacity-30"></div>
                    <div class="flex w-[45%] md:w-[30%] lg:w-[25%] items-center">
                        <h4 class="  text-2xl md:text-3xl lg:text-4xl text-black34 font-bold">
                            {{ $instructors_number }}+</h4>
                        <span class="text-black34  ps-3 text-[13px] md:text-[15px]  font-medium">
                            {{ trans('website/welcome.instructors') }}
                        </span>
                    </div>
                    <div class="bg-blackob hidden md:block w-[1px] h-8  mx-4 opacity-30"></div>


                    <div class="flex w-[45%] md:w-[30%] lg:w-[25%] items-center mt-3 md:mt-0">
                        <h4 class=" text-2xl md:text-3xl lg:text-4xl text-black34 font-bold">{{ $courses_number }}+</h4>
                        <span class=" text-black34 ps-7 md:ps-3 text-[13px] md:text-[15px]  font-medium">
                            {{ trans('website/welcome.course_included') }}
                        </span>
                    </div>
                </div>

                <a href="{{ route('instructor.mycourse') }}"
                   class=" w-40 btn items-center justify-center   hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] transition-all flex px-6">
                    <span class=" text-white font-bold text-sm ">{{ trans('website/welcome.my_courses') }}</span>
                </a>
            </div>
            <div class="order-1 md:order-2 w-full lg:w-5/12">

                <img class=" object-contain mx-auto lg:-ms-[10%] z-[0] w-[90%] lg:w-[120%] "
                     src="{{ URL::asset('website/images/souf1.webp') }}" alt="Souf Academy"/>
            </div>

        </section>
        <div class="flex flex-wrap my-20 gap-6 widthfull justify-center items-center">
            <div class="rounded-xl bg-white flex flex-col  boxshadow2 p-4">
                <img class=" object-contain mx-auto h-9 " src="{{ URL::asset('website/images/logo33.png') }}"
                     alt="logo"/>
            </div>
        </div>
    </div>
    <div class="bg-[#f5f5f5] -mt-14">
        <svg class="w-full h-auto" width="1440" height="98" viewBox="0 0 1440 98" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M1440 61.1878C1154.79 108.447 488.097 76.6091 0 0V98H1440V61.1878Z" fill="white"/>
        </svg>
    </div>

    <div class="bg-white">
        <div class="widthfull  bg-white  pt-10">
            <h3 class=" font-bold text-2xl text-center md:text-3xl">{{ trans('website/welcome.trending_courses') }}</h3>

            @if($lang_courses->isEmpty())
                <h3 class=" font-bold text-2xl text-center md:text-3xl">
                    {{ trans('website/welcome.there_are_noc_trending_courses') }}
                </h3>
            @else
                <div
                    class="grid gap-4 md:gap-[20px] pt-10  bg-white items-stretch grid-cols-1 md:grid-cols-4 relative  ">

                    @foreach($trend_inten_courses as $course)
                        <div data-aos="fade-up"
                             data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                            <div class="course-item w-full ww rounded-xl bg-white">
                                <div class="course-img-wrap overflow-hidden">
                                    <a href="#"><img
                                            src="{{ asset('images/courses/'.$course->img) }}"
                                            alt="course" class="img-fluid imgc"></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                            class="hover:text-orange"
                                            href="#">{{ Str::limit($course->title, 20, '...') }}</a>
                                    </h5>
                                    <div class="instructor-bottom-item mt-1 text-base font-semibold">
                                        {{ trans('website/welcome.sessions') }}
                                        <span class="text-gray ps-4 fontp text-base">
                                            {{ $course->numberSessions }}
                                        </span>
                                    </div>

                                    <div class="course-item-bottom mt-1">
                                        <div class="instructor-bottom-item text-sm font-semibold">
                                            <div class="instructor-bottom-item text-base font-semibold">
                                                {{ trans('website/welcome.instructor') }}
                                                <span class="text-gray ps-3 fontp text-base">
                                                    {{ Str::limit($course->instructor->firstName, 10, '...') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <a href="{{ route('intensive_course.details', ['slug' => $course->slug]) }}"
                                   class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                    <span
                                        class=" text-white font-bold text-sm ">{{ $course->price }} {{ trans('website/intensiveCourse.DA') }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @endif

                </div>
        </div>
    </div>


    <div class=" bg-white w-full pt-16 ">
        <div class=" relative h-20  overflow-hidden">
            <img class=" object-contain -mb-8 lg:-mb-12 text2 h-8 lg:h-12"
                 src="{{ URl::asset('website/images/souf.svg') }}"/>
            <img class=" object-contain -mt-0 text3  h-8 lg:h-12 ms-2"
                 src="{{ URL::asset('website/images/souf.svg') }}"/>
        </div>

        <div class="widthfull pb-6 pt-10 mt-10">
            <div class=" flex w-full justify-between">
                <h3 class=" font-bold text-2xl md:text-3xl">{{ trans('website/welcome.language') }}</h3>
                <a href="{{ route('all_languages_courses.index') }}"
                   class="flex justify-center bg-orange  hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] transition-all rounded-xl px-4 py-2 items-center">
                    <span
                        class="text-sm md:text-base text-white fontp font-medium">{{ trans('website/welcome.view_all') }}</span>
                    <svg class="transform  rtl:-scale-100 w-[6px] md:w-[6px] ms-2" width="10" height="17"
                         viewBox="0 0 10 17" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2L7.5118 7.35101C8.16273 7.98295 8.16273 9.01704 7.5118 9.64899L2 15"
                              stroke="#fff" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            @if($lang_courses->isEmpty())

                <h1 class="  text-2xl md:text-3xl" style="padding: 10% 0; text-align: center;">
                    {{ trans('website/welcome.there_are_no_languages_courses') }}
                </h1>

            @else
                <div class=" relative w-full mt-8 flex">
                    <div class="slider2 slider-nav5 sdsds w-full" style="color: #000;" data-aos="fade-up"
                         data-aos-delay="50" data-aos-duration="1000">
                        @foreach($lang_courses as $course)
                            <div data-aos="fade-up"
                                 data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                                <div class="course-item w-full ww rounded-xl bg-white">
                                    <div class="course-img-wrap overflow-hidden">
                                        <a href="#"><img
                                                src="{{ asset('images/courses/'.$course->img) }}"
                                                alt="course" class="img-fluid imgc"></a>

                                    </div>

                                    <div class="card-body">
                                        <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                                class="hover:text-orange"
                                                href="#"> </a></h5>
                                        <div class="instructor-bottom-item mt-1 text-base font-semibold">

                                            <span class="text-gray ps-4 fontp text-base">

                                        </span>
                                        </div>


                                        <div class="course-item-bottom mt-1">

                                            <div class="instructor-bottom-item text-sm font-semibold">
                                                <div class="instructor-bottom-item text-base font-semibold">
                                                    <span class="text-gray ps-3 fontp text-base">

                                                </span>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <a href="{{ route('languages_course.details', ['slug' => $course->slug]) }}"
                                       class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                        <span
                                            class=" text-white font-bold text-sm ">{{ trans('website/welcome.more_details') }}</span>
                                    </a>
                                </div>
                            </div>

                        @endforeach

                        @endif
                    </div>
                </div>
        </div>


    </div>
    <div class=" bg-gray4 w-full">
        <svg class=" w-full  h-auto" width="1439" height="174" viewBox="0 0 1439 174" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M1439 0H0V76V112.812C285.013 65.5532 951.241 97.3909 1439 174V76V0Z" fill="white"/>
        </svg>
    </div>
    <div class=" bg-gray4 w-full  ">
        <div class="widthfull pt-4 pb-6 ">
            <div class=" flex w-full   justify-between">
                <h3 class=" font-bold text-2xl md:text-3xl">{{ trans('website/welcome.intensive_courses') }}</h3>
                <a href="{{ route('all_intensive_courses.index') }}"
                   class="flex justify-center bg-orange  hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] transition-all rounded-xl px-4 py-2 items-center">
                        <span
                            class="text-sm md:text-base text-white fontp font-medium">{{ trans('website/welcome.view_all') }}</span>
                    <svg class="transform  rtl:-scale-100 w-[6px] md:w-[6px] ms-2" width="10" height="17"
                         viewBox="0 0 10 17" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2L7.5118 7.35101C8.16273 7.98295 8.16273 9.01704 7.5118 9.64899L2 15"
                              stroke="#fff" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

                </a>
            </div>

            @if($inten_courses->isEmpty())

                <h1 class="text-2xl md:text-3xl" style="padding: 10% 0; text-align: center;">
                    {{ trans('website/website.There are no Intensive Courses') }}
                </h1>

            @else
                <div class=" relative w-full mt-8 flex">
                    <div class="slider2 slider-nav5 sdsds w-full" style="color: #000;" data-aos="fade-up"
                         data-aos-delay="50" data-aos-duration="1000">
                        @foreach($inten_courses as $course)
                            <div data-aos="fade-up"
                                 data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                                <div class="course-item w-full ww rounded-xl bg-white">
                                    <div class="course-img-wrap overflow-hidden">
                                        <a href="#"><img
                                                src="{{ asset('images/courses/'.$course->img) }}"
                                                alt="course" class="img-fluid imgc"></a>

                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                                class="hover:text-orange"
                                                href="#">{{ Str::limit($course->title, 20, '...') }}</a>
                                        </h5>
                                        <div class="instructor-bottom-item mt-1 text-base font-semibold">
                                            {{ trans('website/welcome.sessions') }}
                                            <span class="text-gray ps-4 fontp text-base">
                                            {{ $course->numberSessions }}
                                        </span>
                                        </div>


                                        <div class="course-item-bottom mt-1">

                                            <div class="instructor-bottom-item text-sm font-semibold">
                                                <div class="instructor-bottom-item text-base font-semibold">
                                                    {{ trans('website/welcome.instructor') }}
                                                    <span class="text-gray ps-3 fontp text-base">
                                                    {{ Str::limit($course->instructor->firstName, 10, '...') }}
                                                </span>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <a href="{{ route('intensive_course.details', ['slug' => $course->slug]) }}"
                                       class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                        <span class=" text-white font-bold text-sm ">{{ $course->price }} DA</span>
                                    </a>
                                </div>
                            </div>

                        @endforeach

                        @endif
                    </div>
                </div>

        </div>
    </div>


    <div class=" bg-white w-full h-full text-center  ">

        <section class=" bg-[#f5f5f5] py-20   px-4">
            <div class=" widthfull">
                <h3 class=" font-bold text-start mb-6 text-3xl">{{ trans('website/welcome.testimonials') }}</h3>

            </div>
            <div class=" px-0 md:px-5 pt-10 items-stretch relative widthfull ">
                <div class="slider2 slider-nav4 sdsds" style="color: #000;" data-aos="fade-up"
                     data-aos-delay="50" data-aos-duration="1000">

                    <div class="card mx-3 rounded-[10px]">
                        <img class="h-[40px]  me-auto object-contain"
                             src="{{ URL::asset('website/images/comme.svg') }}"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover"
                                     src="{{ URL::asset('website/images/man.png') }}"/>
                            </div>
                            <div class=" ps-4">
                                <p class=" text-black2 font-bold text-sm leading-[160%] text-start">
                                    Joew Harbert
                                </p>
                                <p class=" text-black2 font-medium text-xs leading-[160%]  text-start">
                                    CEO, NoonBrew
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-3 rounded-[10px]">
                        <img class="h-[40px]  me-auto object-contain"
                             src="{{ URL::asset('website/images/comme.svg') }}"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover"
                                     src="{{ URL::asset('website/images/man.png') }}"/>
                            </div>
                            <div class=" ps-4">
                                <p class=" text-black2 font-bold text-sm leading-[160%] text-start">
                                    Joew Harbert
                                </p>
                                <p class=" text-black2 font-medium text-xs leading-[160%]  text-start">
                                    CEO, NoonBrew
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-3 rounded-[10px]">
                        <img class="h-[40px]  me-auto object-contain"
                             src="{{ URL::asset('website/images/comme.svg') }}"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover"
                                     src="{{ URL::asset('website/images/man.png') }}"/>
                            </div>
                            <div class=" ps-4">
                                <p class=" text-black2 font-bold text-sm leading-[160%] text-start">
                                    Joew Harbert
                                </p>
                                <p class=" text-black2 font-medium text-xs leading-[160%]  text-start">
                                    CEO, NoonBrew
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-3 rounded-[10px]">
                        <img class="h-[40px]  me-auto object-contain"
                             src="{{ URL::asset('website/images/comme.svg') }}"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover"
                                     src="{{ URL::asset('website/images/man.png') }}"/>
                            </div>
                            <div class=" ps-4">
                                <p class=" text-black2 font-bold text-sm leading-[160%] text-start">
                                    Joew Harbert
                                </p>
                                <p class=" text-black2 font-medium text-xs leading-[160%]  text-start">
                                    CEO, NoonBrew
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-3 rounded-[10px]">
                        <img class="h-[40px]  me-auto object-contain"
                             src="{{ URL::asset('website/images/comme.svg') }}"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover"
                                     src="{{ URL::asset('website/images/man.png') }}"/>
                            </div>
                            <div class=" ps-4">
                                <p class=" text-black2 font-bold text-sm leading-[160%] text-start">
                                    Joew Harbert
                                </p>
                                <p class=" text-black2 font-medium text-xs leading-[160%]  text-start">
                                    CEO, NoonBrew
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </section>


        <section class=" pt-10 w-full">
            <div class=" widthfull ">
                <h3 class=" font-bold text-3xl">{{ trans('website/welcome.subscriptions') }}</h3>
                <div
                    class="grid gap-4 md:gap-[20px] pt-10  bg-white items-stretch grid-cols-1 md:grid-cols-3 relative  ">
                    <div class="card ">
                        <img class="h-[66px] mt-5 ms-4 object-contain"
                             src="{{ URL::asset('website/images/analeys.svg') }}"/>
                        <h4 class="  text-2xl md:text-2xl  mt-2 text-black34 font-bold">{{ trans('website/welcome.payment_online') }}</h4>

                        <p class="fontp text-gray font-normal text-sm leading-[20px] mt-5 text-center">
                            {{ trans('website/welcome.e_pay_description') }}
                        </p>
                    </div>

                    <div class="card ">
                        <img class="h-[66px] mt-5 ms-4 object-contain"
                             src="{{ URL::asset('website/images/AlgeriePoste.svg') }}"/>
                        <h4 class="  text-2xl md:text-2xl mt-2 text-black34 font-bold">{{ trans('website/welcome.ccp') }}</h4>

                        <p class="fontt text-gray font-normal text-sm leading-[20px] mt-5 text-start">
                            <strong>{{ trans('website/welcome.ccp_account') }}</strong>
                            <br><span class="text-black2 font-bold">0014704140/88</span>
                            <br><strong>{{ trans('website/welcome.name') }}</strong><br>
                            <span class="text-black2 font-bold">طهراوي بشير</span>
                            <br>
                            <strong>{{ trans('website/welcome.baridi_mob') }}</strong><br>
                            <span class="text-black2 font-bold">00799999001470414088</span>
                        </p>

                    </div>
                    <div class="card ">
                        <img class="h-[66px] mt-5 ms-4 object-contain" src="{{ URL::asset('website/images/pc.svg') }}"/>
                        <h4 class="  text-2xl md:text-2xl mt-2 text-black34 font-bold">{{ trans('website/welcome.payment_manual') }}</h4>

                        <p class="fontp text-gray font-normal text-sm leading-[20px] mt-5 text-center">
                            {{ trans('website/welcome.manual_pay_description') }}
                        </p>
                    </div>
                </div>
                <div class=" flex my-10 justify-center items-center">
                    <a href="{{ route('student.subscription') }}"
                       class=" w-40 btn items-center justify-center flex px-6">
                        <span class=" text-white font-bold text-sm ">{{ trans('website/welcome.subscribe_now') }}</span>
                    </a>
                </div>
            </div>

            <!-- start changes -->
            <div class="overflow-hidden widthfull boxshadow3 p-2 md:p-10 rounded-xl my-20">
                <ul id="tabs3" class="inline-flex gap-2 flex-wrap justify-center pt-2 px-1 w-full">
                    <li class="bg-orange/20 border border-[#8e8e8e21] h-12 flex items-center  rounded-xl">
                        <a id="default-tab"
                           class="text-orange w-full text-center h-full px-3 md:px-8  font-semibold py-3 "
                           href="#first">{{ trans('website/faq.general') }}</a>
                    </li>
                    <li class=" border mx-2 border-[#8e8e8e21] h-12 flex items-center  rounded-xl">
                        <a id="default-tab" class="w-full text-center h-full px-3 md:px-8  font-semibold py-3 "
                           href="#second">{{ trans('website/faq.department_composition') }}</a>
                    </li>
                    <li class="border mx-2  border-[#8e8e8e21] h-12 flex items-center  rounded-xl">
                        <a id="default-tab" class=" w-full text-center h-full px-3 md:px-8  font-semibold py-3 "
                           href="#third">{{ trans('website/faq.department_languages') }}</a>
                    </li>

                </ul>

                <!-- Tab Contents -->
                <div accordion>
                    <div id="tab-contents3">
                        <div class=" w-full p-4 pt-10" id="first">
                            <div class=''>
                                <div class="w-full md:w-8/12 mx-auto boxx   mb-6">

                                    <!-- start for -->
                                    <div data-aos="fade-up" accordion-section
                                         class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                        <h5 class="mb-0">
                                            <button section-trigger class="p-7 flex-col flex w-full "
                                                    aria-expanded="false">
                                                <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                    {{ trans('website/faq.general_q1') }} </p>
                                                <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                     width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                    <path
                                                        d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                        fill="#FF820F"/>
                                                </svg>
                                                <svg section-close-icon
                                                     class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                     width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                    <path
                                                        d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                        fill="#FF820F"/>
                                                </svg>

                                            </button>
                                        </h5>

                                        <div section-content
                                             class="overflow-hidden transition-all ease-in-out duration-350">
                                            <div
                                                class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                                {{ trans('website/faq.general_a1') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end for -->
                                    <div data-aos="fade-up" accordion-section
                                         class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                        <h5 class="mb-0">
                                            <button section-trigger class="p-7 flex-col flex w-full "
                                                    aria-expanded="false">
                                                <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                    {{ trans('website/faq.general_q2') }}
                                                </p>
                                                <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                     width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                    <path
                                                        d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                        fill="#FF820F"/>
                                                </svg>
                                                <svg section-close-icon
                                                     class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                     width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                    <path
                                                        d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                        fill="#FF820F"/>
                                                </svg>

                                            </button>
                                        </h5>
                                        <div section-content
                                             class="overflow-hidden transition-all ease-in-out duration-350">

                                            <div
                                                class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                                {{ trans('website/faq.general_a2') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- start for -->
                                    <div data-aos="fade-up" accordion-section
                                         class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                        <h5 class="mb-0">
                                            <button section-trigger class="p-7 flex-col flex w-full "
                                                    aria-expanded="false">
                                                <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                    {{ trans('website/faq.general_q3') }} </p>
                                                <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                     width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                    <path
                                                        d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                        fill="#FF820F"/>
                                                </svg>
                                                <svg section-close-icon
                                                     class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                     width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                    <path
                                                        d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                        fill="#FF820F"/>
                                                </svg>

                                            </button>
                                        </h5>

                                        <div section-content
                                             class="overflow-hidden transition-all ease-in-out duration-350">
                                            <div
                                                class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                                {{ trans('website/faq.general_a3') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="w-full hidden p-4" id="second">
                            <div class="w-full md:w-8/12 mx-auto boxx   mb-6">

                                <!-- start for -->
                                <div data-aos="fade-up" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger class="p-7 flex-col flex w-full " aria-expanded="false">
                                            <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                {{ trans('website/faq.composition_q1') }}
                                            </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>

                                        </button>
                                    </h5>

                                    <div section-content
                                         class="overflow-hidden transition-all ease-in-out duration-350">
                                        <div
                                            class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                            {{ trans('website/faq.composition_a1') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- start for -->
                                <div data-aos="fade-up" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger class="p-7 flex-col flex w-full " aria-expanded="false">
                                            <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                {{ trans('website/faq.composition_q2') }}
                                            </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>

                                        </button>
                                    </h5>

                                    <div section-content
                                         class="overflow-hidden transition-all ease-in-out duration-350">
                                        <div
                                            class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                            {{ trans('website/faq.composition_a2') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- start for -->
                                <div data-aos="fade-up" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger class="p-7 flex-col flex w-full " aria-expanded="false">
                                            <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                {{ trans('website/faq.composition_q3') }}
                                            </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>

                                        </button>
                                    </h5>

                                    <div section-content
                                         class="overflow-hidden transition-all ease-in-out duration-350">
                                        <div
                                            class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                            {{ trans('website/faq.composition_a3') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- start for -->
                                <div data-aos="fade-up" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger class="p-7 flex-col flex w-full " aria-expanded="false">
                                            <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                {{ trans('website/faq.composition_q4') }}
                                            </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>

                                        </button>
                                    </h5>

                                    <div section-content
                                         class="overflow-hidden transition-all ease-in-out duration-350">
                                        <div
                                            class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                            {{ trans('website/faq.composition_a4') }}
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>


                        <div class="w-full hidden p-4" id="third">
                            <div class="w-full md:w-8/12 mx-auto boxx   mb-6">
                                <!-- start for -->
                                <div data-aos="fade-up" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger class="p-7 flex-col flex w-full " aria-expanded="false">
                                            <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                {{ trans('website/faq.languages_q1') }} </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>

                                        </button>
                                    </h5>

                                    <div section-content
                                         class="overflow-hidden transition-all ease-in-out duration-350">
                                        <div
                                            class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                            {{ trans('website/faq.languages_a1') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- start for -->
                                <div data-aos="fade-up" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger class="p-7 flex-col flex w-full " aria-expanded="false">
                                            <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                {{ trans('website/faq.languages_q2') }} </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>

                                        </button>
                                    </h5>

                                    <div section-content
                                         class="overflow-hidden transition-all ease-in-out duration-350">
                                        <div
                                            class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                            {{ trans('website/faq.languages_a2') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- start for -->
                                <div data-aos="fade-up" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger class="p-7 flex-col flex w-full " aria-expanded="false">
                                            <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                {{ trans('website/faq.languages_q3') }} </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>

                                        </button>
                                    </h5>

                                    <div section-content
                                         class="overflow-hidden transition-all ease-in-out duration-350">
                                        <div
                                            class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                            {{ trans('website/faq.languages_a3') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- start for -->
                                <div data-aos="fade-up" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger class="p-7 flex-col flex w-full " aria-expanded="false">
                                            <p class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                {{ trans('website/faq.languages_q4') }} </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>

                                        </button>
                                    </h5>

                                    <div section-content
                                         class="overflow-hidden transition-all ease-in-out duration-350">
                                        <div
                                            class="fontp px-7 pb-7  text-start text-gray2 font-normal text-[15px] lg:leading-[140%] ">
                                            {{ trans('website/faq.languages_a4') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end changes -->

            <div
                class="mx-auto relative boxshadow z-10 flex-wrap items-center rounded-[10px] w-11/12 md:w-6/12 mt-40 -mb-10 bg-white p-8 flex">
                <p class="fontp text-black2 w-8/12 font-medium text-xl leading-[136%]  text-start">
                    {{ trans('website/welcome.we_help') }}
                </p>

                <a href="{{ route('student.subscription') }}"
                   class=" w-44 btn items-center justify-center  hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] transition-all flex mx-auto mt-2 md:mt-0 md:me-auto md:ms-3 px-6">
                    <span class=" text-white font-bold text-sm ">{{ trans('website/welcome.start_now') }}</span>
                </a>
            </div>

        </section>
        <script>
            AOS.init({
                offset: 200, // offset (in px) from the original trigger point
                delay: 100,
                duration: 800,
            });

            let tabsContainer3 = document.querySelector("#tabs3");

            let tabTogglers3 = tabsContainer3.querySelectorAll("#tabs3 a");


            tabTogglers3.forEach(function (toggler) {
                toggler.addEventListener("click", function (e) {
                    e.preventDefault();

                    let tabName = this.getAttribute("href");

                    let tabContents3 = document.querySelector("#tab-contents3");
                    for (let i = 0; i < tabContents3.children.length; i++) {
                        tabTogglers3[i].parentElement.children[0].classList.remove("text-orange");
                        tabTogglers3[i].parentElement.classList.remove("bg-orange/20");
                        tabContents3.children[i].classList.remove("hidden");
                        if ("#" + tabContents3.children[i].id === tabName) {
                            continue;
                        }
                        tabContents3.children[i].classList.add("hidden");

                    }
                    e.target.parentElement.children[0].classList.add("text-orange");
                    e.target.parentElement.classList.add("bg-orange/20");
                });
            });
        </script>
@endsection
