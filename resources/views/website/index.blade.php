@extends('website.layouts.master')

@section('content')
    <div>
        <section class="flex flex-wrap widthfull pt-6">
            <div class="order-2 md:order-1 w-full lg:w-7/12">
                <h1
                    class=" mt-16 text-black text-3xl md:text-5xl font-bold leading-[112%] lg:leading-[120%] lg:text-6xl">
                    <span class="text-orange block">Souf Academy</span>Platform for online education
                </h1>
                <div class=" flex flex-wrap items-center my-10">
                    <div class="flex w-[45%] md:w-[30%] lg:w-[25%] items-center">
                        <h4 class=" text-2xl md:text-3xl  lg:text-4xl text-black34 font-bold">400+</h4>
                        <span class="text-black34  ps-3 text-[13px] md:text-[15px] font-medium">Students
                                Enrolled</span>
                    </div>
                    <div class="bg-blackob w-[1px] h-8 mx-2 lg:mx-4 opacity-30"></div>
                    <div class="flex w-[45%] md:w-[30%] lg:w-[25%] items-center">
                        <h4 class="  text-2xl md:text-3xl lg:text-4xl text-black34 font-bold">30+</h4>
                        <span class="text-black34  ps-3 text-[13px] md:text-[15px]  font-medium">Instructors
                                *******</span>
                    </div>
                    <div class="bg-blackob hidden md:block w-[1px] h-8  mx-4 opacity-30"></div>


                    <div class="flex w-[45%] md:w-[30%] lg:w-[25%] items-center mt-3 md:mt-0">
                        <h4 class=" text-2xl md:text-3xl lg:text-4xl text-black34 font-bold">50+</h4>
                        <span class=" text-black34 ps-7 md:ps-3 text-[13px] md:text-[15px]  font-medium">Course
                                Included</span>
                    </div>
                </div>
                <a class=" w-40 btn items-center justify-center   hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] transition-all flex px-6">
                    <span class=" text-white font-bold text-sm ">Sign in</span>
                </a>
            </div>
            <div class="order-1 md:order-2 w-full lg:w-5/12">

                <img class=" object-contain mx-auto lg:-ms-[10%] z-[0] w-[90%] lg:w-[120%] "
                     src="./images/souf1.webp" alt="Souf Academy"/>
            </div>


        </section>
        <div class="flex flex-wrap my-20 gap-6 widthfull justify-center items-center">
            <div class="rounded-xl bg-white flex flex-col  boxshadow2 p-4">
                <img class=" object-contain mx-auto h-9 " src="./images/logo33.png" alt="logo"/>


            </div>

        </div>

    </div>
    <svg class="w-full h-auto -mt-14" width="1440" height="98" viewBox="0 0 1440 98" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M1440 61.1878C1154.79 108.447 488.097 76.6091 0 0V98H1440V61.1878Z" fill="white"/>
    </svg>
    <div class="bg-white">
        <div class="widthfull  bg-white  pt-10">
            <h3 class=" font-bold text-2xl text-center md:text-3xl">Supporting Courses</h3>

            <div
                class="grid gap-4 md:gap-[20px] pt-10  bg-white items-stretch grid-cols-1 md:grid-cols-4 relative  ">
                <div class="card ">
                    <img class="h-[66px] ms-4 object-contain" src="./images/analeys.svg"/>
                    <p class="fontp text-gray font-normal text-sm leading-[20px] mt-5 text-start">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of
                        type
                        and scrambled it to make a type specimen book.
                    </p>
                </div>

                <div class="card ">
                    <img class="h-[66px] ms-4 object-contain" src="./images/analeys.svg"/>
                    <p class="fontp text-gray font-normal text-sm leading-[20px] mt-5 text-start">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of
                        type
                        and scrambled it to make a type specimen book.
                    </p>
                </div>
                <div class="card ">
                    <img class="h-[66px] ms-4 object-contain" src="./images/pc.svg"/>
                    <p class="fontp text-gray font-normal text-sm leading-[20px] mt-5 text-start">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of
                        type
                        and scrambled it to make a type specimen book.
                    </p>
                </div>
                <div class="card ">
                    <img class="h-[66px] ms-4 object-contain" src="./images/book.svg"/>

                    <p class="fontp text-gray font-normal text-sm leading-[20px]  mt-5 text-start">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of
                        type
                        and scrambled it to make a type specimen book.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class=" bg-white w-full pt-16 ">
        <div class=" relative h-20  overflow-hidden">
            <img class=" object-contain -mb-8 lg:-mb-12 text2 h-8 lg:h-12" src="./images/souf.svg"/>
            <img class=" object-contain -mt-0 text3  h-8 lg:h-12 ms-2" src="./images/souf.svg"/>
        </div>

        <div class="widthfull pb-6 pt-10 mt-10">
            <div class=" flex w-full justify-between">
                <h3 class=" font-bold text-2xl md:text-3xl">Supporting Courses</h3>
                <a class="flex justify-center bg-orange  hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] transition-all rounded-xl px-4 py-2 items-center">
                    <span class="text-sm md:text-base text-white fontp font-medium">View All</span>
                    <svg class="w-[6px] md:w-[6px] transform  rtl:-scale-100  ms-2" width="10" height="17"
                         viewBox="0 0 10 17" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2L7.5118 7.35101C8.16273 7.98295 8.16273 9.01704 7.5118 9.64899L2 15"
                              stroke="#fff" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                              stroke-linejoin="r ound"/>
                    </svg>

                </a>
            </div>
            <div class=" relative w-full mt-8 flex">
                <div class="slider2 slider-nav5 sdsds w-full" style="color: #000;" data-aos="fade-up"
                     data-aos-delay="50" data-aos-duration="1000" dir="rtl">

                    <div data-aos="fade-up"
                         data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                        <div class="course-item w-full ww rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div class="w-full px-2">
                        <div class="course-item w-full ww  rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div data-aos="fade-up"
                         data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                        <div class="course-item w-full ww rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div class="w-full px-2">
                        <div class="course-item w-full ww  rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div data-aos="fade-up"
                         data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                        <div class="course-item w-full ww rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div class="w-full px-2">
                        <div class="course-item w-full ww  rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="widthfull pb-6 pt-10 mt-10">
            <div class=" flex w-full justify-between">
                <h3 class=" font-bold text-2xl md:text-3xl">Language</h3>
                <a class="flex justify-center bg-orange  hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] transition-all rounded-xl px-4 py-2 items-center">
                    <span class="text-sm md:text-base text-white fontp font-medium">View All</span>
                    <svg class="w-[6px] md:w-[6px] ms-2" width="10" height="17" viewBox="0 0 10 17" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2L7.5118 7.35101C8.16273 7.98295 8.16273 9.01704 7.5118 9.64899L2 15"
                              stroke="#fff" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                              stroke-linejoin="r ound"/>
                    </svg>

                </a>
            </div>
            <div class=" relative w-full mt-8 flex">
                <div class="slider2 slider-nav5 sdsds w-full" style="color: #000;" data-aos="fade-up"
                     data-aos-delay="50" data-aos-duration="1000">

                    <div data-aos="fade-up"
                         data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                        <div class="course-item w-full ww rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div class="w-full px-2">
                        <div class="course-item w-full ww  rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div data-aos="fade-up"
                         data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                        <div class="course-item w-full ww rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div class="w-full px-2">
                        <div class="course-item w-full ww  rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div data-aos="fade-up"
                         data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                        <div class="course-item w-full ww rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                    <div class="w-full px-2">
                        <div class="course-item w-full ww  rounded-xl bg-white">
                            <div class="course-img-wrap overflow-hidden">
                                <a href="#"><img
                                        src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                        alt="course" class="img-fluid imgc"></a>

                            </div>
                            <div class="card-body">
                                <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                        class="hover:text-orange" href="#">JavaScript: Understanding
                                        the
                                        Weird Part...</a></h5>
                                <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                    <span class="text-gray ps-4 fontp text-base">
                                            3AS
                                        </span>
                                </div>


                                <div class="course-item-bottom mt-1">

                                    <div class="instructor-bottom-item text-sm font-semibold">
                                        <div class="instructor-bottom-item text-base font-semibold">Price:
                                            <span class="text-gray ps-3 fontp text-base">
                                                    50.00 DA
                                                </span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <a
                                class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                <span class=" text-white font-bold text-sm ">Start Session</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <svg class=" w-full mt-20 h-auto" width="1439" height="98" viewBox="0 0 1439 98" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M0 36.8122C285.013 -10.4467 951.241 21.3909 1439 98V0H0V36.8122Z" fill="white"/>
        </svg>

        <div class="-mt-24  bg-gray4 w-full  ">
            <div class="widthfull  pb-6 ">
                <div class=" flex w-full -mt-24   justify-between">
                    <h3 class=" font-bold text-2xl md:text-3xl">Intensive Courses</h3>
                    <a class="flex justify-center bg-orange  hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] transition-all rounded-xl px-4 py-2 items-center">
                        <span class="text-sm md:text-base text-white fontp font-medium">View All</span>
                        <svg class="w-[6px] md:w-[6px] ms-2" width="10" height="17" viewBox="0 0 10 17" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 2L7.5118 7.35101C8.16273 7.98295 8.16273 9.01704 7.5118 9.64899L2 15"
                                  stroke="#fff" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                                  stroke-linejoin="r ound"/>
                        </svg>

                    </a>
                </div>
                <div class=" relative w-full mt-8 flex">
                    <div class="slider2 slider-nav5 sdsds w-full" style="color: #000; " data-aos="fade-right"
                         data-aos-delay="50" data-aos-duration="1000">

                        <div data-aos="fade-up"
                             data-aos-delay="50" data-aos-duration="1000" class="w-full px-2">
                            <div class="course-item w-full ww rounded-xl bg-white">
                                <div class="course-img-wrap overflow-hidden">
                                    <a href="#"><img
                                            src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                            alt="course" class="img-fluid imgc"></a>

                                </div>
                                <div class="card-body">
                                    <h5 class="text-lg font-semibold hover:text-orange text-orange2"><a
                                            class="hover:text-orange" href="#">JavaScript: Understanding
                                            the
                                            Weird Part...</a></h5>
                                    <div class="instructor-bottom-item mt-1 text-base font-semibold">Year:
                                        <span class="text-gray ps-4 fontp text-base">
                                                3AS
                                            </span>
                                    </div>


                                    <div class="course-item-bottom mt-1">

                                        <div class="instructor-bottom-item text-sm font-semibold">
                                            <div class="instructor-bottom-item text-base font-semibold">Price:
                                                <span class="text-gray ps-3 fontp text-base">
                                                        50.00 DA
                                                    </span>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <a
                                    class=" w-full btn-big cursor-pointer bg-orange hover:bg-orange3 items-center justify-center flex px-6">
                                    <span class=" text-white font-bold text-sm ">Start Session</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class=" bg-white w-full h-full text-center  ">

        <section class=" bg-[#f5f5f5] py-20   px-4">
            <div class=" widthfull">
                <h3 class=" font-bold text-start mb-6 text-3xl">Testimonials</h3>

            </div>
            <div class=" px-0 md:px-5 pt-10 items-stretch relative widthfull ">
                <div class="slider2 slider-nav4 sdsds" style="color: #000;" data-aos="fade-right"
                     data-aos-delay="50" data-aos-duration="1000">

                    <div class="card mx-3 rounded-[10px]">
                        <img class="h-[40px]  me-auto object-contain" src="./images/comme.svg"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover" src="./images/man.png"/>
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
                        <img class="h-[40px]  me-auto object-contain" src="./images/comme.svg"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover" src="./images/man.png"/>
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
                        <img class="h-[40px]  me-auto object-contain" src="./images/comme.svg"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover" src="./images/man.png"/>
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
                        <img class="h-[40px]  me-auto object-contain" src="./images/comme.svg"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover" src="./images/man.png"/>
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
                        <img class="h-[40px]  me-auto object-contain" src="./images/comme.svg"/>

                        <p class="fontp text-black2 font-medium text-base leading-[160%] mt-5 text-start">
                            "They are able to help a startup like mine scale and are very responsive to all of
                            our
                            unique
                            needs."
                        </p>

                        <div class=" flex items-center mt-4">
                            <div class=" h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="h-full w-full object-cover" src="./images/man.png"/>
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
                <h3 class=" font-bold text-3xl">Subscriptions</h3>

                <div
                    class="grid gap-4 md:gap-[20px] pt-10  bg-white items-stretch grid-cols-1 md:grid-cols-3 relative  ">
                    <div class="card ">
                        <img class="h-[66px] ms-4 object-contain" src="./images/analeys.svg"/>
                        <h4 class="  text-2xl md:text-2xl  mt-2 text-black34 font-bold">Payment online</h4>

                        <p class="fontp text-gray font-normal text-sm leading-[20px] mt-5 text-start">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the
                            industry's
                        </p>
                    </div>

                    <div class="card ">
                        <img class="h-[66px] ms-4 object-contain" src="./images/analeys.svg"/>
                        <h4 class="  text-2xl md:text-2xl mt-2 text-black34 font-bold">ccp</h4>

                        <p class="fontp text-gray font-normal text-sm leading-[20px] mt-5 text-start">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley

                        </p>
                    </div>
                    <div class="card ">
                        <img class="h-[66px] ms-4 object-contain" src="./images/pc.svg"/>
                        <h4 class="  text-2xl md:text-2xl mt-2 text-black34 font-bold">Payment Manual</h4>

                        <p class="fontp text-gray font-normal text-sm leading-[20px] mt-5 text-start">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley

                        </p>
                    </div>

                </div>
                <div class=" flex my-10 justify-center items-center">
                    <div class=" w-40 btn items-center justify-center flex px-6">
                        <span class=" text-white font-bold text-sm ">Subscribe now</span>
                    </div>
                </div>

            </div>

            <!-- start changes -->
            <div class="widthfull boxshadow3 p-2 md:p-10 rounded-xl my-20">
                <ul id="tabs" class="inline-flex gap-2 flex-wrap justify-center pt-2 px-1 w-full">
                    <li class="px-3 md:px-8  font-semibold py-3 bg-orange/20 border border-[#8e8e8e21]  rounded-xl -mb-px">
                        <a id="default-tab" class="text-orange" href="#first">Languages</a>
                    </li>
                    <li class=" text-gray-800 font-semibold border mx-2 rounded-xl border-[#8e8e8e21] py-3 px-8 "><a
                            href="#second">Supporting</a></li>
                    <li class=" text-gray-800 font-semibold border mx-2 rounded-xl border-[#8e8e8e21] py-3 px-8 "><a
                            href="#therd">Intensive</a></li>

                </ul>
                <!-- Tab Contents -->
                <div id="tab-contents ">
                    <div class=" w-full p-4 pt-10" id="first">
                        <div data-aos="fade-right" class="w-full md:w-8/12 mx-auto boxx   mb-6">
                            <div accordion>
                                <!-- start for -->
                                <div data-aos="fade-right" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger
                                                class="p-7 flex-col flex w-full "
                                                aria-expanded="false">
                                            <p
                                                class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                Why should I choose your company for my 3D printing needs? </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33"
                                                 height="33" viewBox="0 0 33 33"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                            Our company stands out by delivering exceptional quality, unmatched
                                            expertise, and personalized service, ensuring your vision becomes a reality
                                            with precision and innovation.
                                        </div>
                                    </div>
                                </div>

                                <!-- end for -->
                                <div data-aos="fade-right" accordion-section
                                     class="bg-white mt-5 relative rounded-xl  cursor-pointer boxshadow3">
                                    <h5 class="mb-0">
                                        <button section-trigger
                                                class="p-7 flex-col flex w-full "
                                                aria-expanded="false">
                                            <p
                                                class=" text-start text-[#292D32] font-bold  pe-8 text-base md:text-lg  leading-[120%]  lg:leading-[115%] ">
                                                Why should I choose your company for my 3D printing needs? </p>
                                            <svg section-open-icon class="  absolute end-6 transition-all top-6 "
                                                 width="33"
                                                 height="33" viewBox="0 0 33 33"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="33" height="33" rx="16.5" fill="#ff820f17"/>
                                                <path
                                                    d="M16.9999 21.0002C16.8683 21.0009 16.7379 20.9757 16.616 20.926C16.4942 20.8762 16.3834 20.8029 16.2899 20.7102L10.2899 14.7102C10.1016 14.5219 9.99585 14.2665 9.99585 14.0002C9.99585 13.7339 10.1016 13.4785 10.2899 13.2902C10.4782 13.1019 10.7336 12.9961 10.9999 12.9961C11.2662 12.9961 11.5216 13.1019 11.7099 13.2902L16.9999 18.5902L22.2899 13.3002C22.4812 13.1364 22.7273 13.0508 22.979 13.0605C23.2307 13.0702 23.4694 13.1745 23.6475 13.3526C23.8256 13.5307 23.9299 13.7695 23.9397 14.0211C23.9494 14.2728 23.8638 14.5189 23.6999 14.7102L17.6999 20.7102C17.5137 20.8949 17.2623 20.9991 16.9999 21.0002Z"
                                                    fill="#FF820F"/>
                                            </svg>
                                            <svg section-close-icon
                                                 class="  absolute end-6 transform rotate-180 transition-all top-6 "
                                                 width="33" height="33" viewBox="0 0 33 33"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                            Our company stands out by delivering exceptional quality, unmatched
                                            expertise, and personalized service, ensuring your vision becomes a reality
                                            with precision and innovation.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="w-full hidden p-4" id="third">
                        <div class="w-4/12  text-right  my-2">
                            <span class="block text-gray my-2 ">Language:</span>

                        </div>

                    </div>
                </div>
            </div>
            <!-- end changes -->


            <div
                class="mx-auto relative boxshadow z-10 flex-wrap items-center rounded-[10px] w-11/12 md:w-6/12 mt-40 -mb-10 bg-white p-8 flex">
                <p class="fontp text-black2 w-8/12 font-medium text-xl leading-[136%]  text-start">
                    We help you level up your academic and professional career.
                </p>
                <button
                    class=" w-44 btn items-center justify-center  hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] transition-all flex mx-auto mt-2 md:mt-0 md:me-auto md:ms-3 px-6">
                    <span class=" text-white font-bold text-sm ">Start Now</span>
                </button>
            </div>
        </section>
    </div>

@endsection
