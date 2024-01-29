@extends('website.layouts.master')

@section('title')
    Social media
@endsection

@section('content')
    <div>
        <div class=" widthfull flex py-5 justify-between" style="margin-bottom: 10%">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">{{ trans('website/studentProfile.instructor_panel') }}</h3>

                <div class=" bg-white flex flex-wrap boxshadow2 rounded px-0 py-0 mt-10 w-full mx-auto ">
                    <div class="w-full md:w-3/12 py-16 border-e border-[#D0D0D0]/50 ">
                        <p class="font-bold  text-2xl ps-16  ">{{ $instructor->firstName }}</p>

                        <a href="{{ route('instructor.profile') }}"
                           class=" w-full  items-center">
                            <div class="w-full hover:bg-orange/20 group  mt-4 p-4 ps-16">
                                    <span
                                        class="font-medium fontp group-hover:text-orange text-[#555] text-sm ">{{ trans('website/studentProfile.profile') }}</span>
                            </div>
                        </a>
                        <a href="{{ route('instructor.password') }}"
                           class=" w-full  items-center">
                            <div class="hover:bg-orange/20 group w-full  mt-1 p-4 ps-16  items-center">
                                    <span class="font-medium fontp group-hover:text-orange text-[#555] text-sm ">
                                    {{ trans('website/studentProfile.change_password') }}
                                    </span>
                            </div>
                        </a>
                        <a href="{{ route('instructor.socialMedia') }}"
                           class=" w-full  items-center">
                            <div class="  mt-1 p-4 ps-16 bg-orange w-full items-center">

                                <span
                                    class="font-medium fontp text-[#fff] text-sm ">{{ trans('website/studentProfile.social_links') }}</span>

                            </div>
                        </a>
                    </div>
                    <div class="w-full md:w-9/12 h-[70vh] px-9 py-10">
                        <h4 class="  text-2xl md:text-2xl mb-1 lg:text-3xl text-black font-bold">{{ trans('website/studentProfile.social_links') }}</h4>
                        <p class="  text-base md:text-base mb-6 text-gray3 font-medium">
                            {{ trans('website/studentProfile.connect_your_social') }}</p>
                        <div class=" w-full md:w-6/12 mt-6 ">

                            <div class="  w-full flex-wrap flex gap-2">
                                <button
                                    class=" btn gap-2 md:w-44 w-full bg-white border transition-all	 hover:bg-orange border-orange text-orange items-center mt-5 justify-center flex px-10">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25 12.5C25 5.625 19.375 0 12.5 0C5.625 0 0 5.625 0 12.5C0 18.75 4.53125 23.9062 10.4688 24.8438V16.0937H7.34375V12.5H10.4688V9.6875C10.4688 6.5625 12.3438 4.84375 15.1563 4.84375C16.5625 4.84375 17.9688 5.15625 17.9688 5.15625V8.28125H16.4062C14.8438 8.28125 14.375 9.21875 14.375 10.1562V12.5H17.8125L17.1875 16.0937H14.2188V25C20.4688 24.0625 25 18.75 25 12.5Z"
                                            fill="#1877F2"/>
                                    </svg>

                                    <span
                                        class=" text-black font-bold text-sm ">{{ trans('website/studentProfile.connect') }}</span>
                                </button>
                                <button
                                    class=" btn gap-2 md:w-44 w-full bg-white border transition-all	 hover:bg-orange border-orange text-orange items-center mt-5 justify-center flex px-10">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.5 2.25904C15.8133 2.25904 16.2651 2.25904 17.6205 2.25904C18.8253 2.25904 19.4277 2.56024 19.8795 2.71084C20.4819 3.01205 20.9337 3.16265 21.3855 3.61446C21.8374 4.06627 22.1386 4.51807 22.2892 5.12048C22.4398 5.57229 22.5904 6.1747 22.741 7.37952C22.741 8.73494 22.741 9.03615 22.741 12.5C22.741 15.9639 22.741 16.2651 22.741 17.6205C22.741 18.8253 22.4398 19.4277 22.2892 19.8795C21.988 20.4819 21.8374 20.9337 21.3855 21.3855C20.9337 21.8374 20.4819 22.1386 19.8795 22.2892C19.4277 22.4398 18.8253 22.5904 17.6205 22.741C16.2651 22.741 15.9639 22.741 12.5 22.741C9.03615 22.741 8.73494 22.741 7.37952 22.741C6.1747 22.741 5.57229 22.4398 5.12048 22.2892C4.51807 21.988 4.06627 21.8374 3.61446 21.3855C3.16265 20.9337 2.86145 20.4819 2.71084 19.8795C2.56024 19.4277 2.40964 18.8253 2.25904 17.6205C2.25904 16.2651 2.25904 15.9639 2.25904 12.5C2.25904 9.03615 2.25904 8.73494 2.25904 7.37952C2.25904 6.1747 2.56024 5.57229 2.71084 5.12048C3.01205 4.51807 3.16265 4.06627 3.61446 3.61446C4.06627 3.16265 4.51807 2.86145 5.12048 2.71084C5.57229 2.56024 6.1747 2.40964 7.37952 2.25904C8.73494 2.25904 9.18675 2.25904 12.5 2.25904ZM12.5 0C9.03615 0 8.73494 0 7.37952 0C6.0241 0 5.12048 0.301206 4.36747 0.602411C3.61446 0.903615 2.86145 1.35542 2.10843 2.10843C1.35542 2.86145 1.05422 3.46386 0.602411 4.36747C0.301206 5.12048 0.150602 6.0241 0 7.37952C0 8.73494 0 9.18675 0 12.5C0 15.9639 0 16.2651 0 17.6205C0 18.9759 0.301206 19.8795 0.602411 20.6325C0.903615 21.3855 1.35542 22.1386 2.10843 22.8916C2.86145 23.6446 3.46386 23.9458 4.36747 24.3976C5.12048 24.6988 6.0241 24.8494 7.37952 25C8.73494 25 9.18675 25 12.5 25C15.8133 25 16.2651 25 17.6205 25C18.9759 25 19.8795 24.6988 20.6325 24.3976C21.3855 24.0964 22.1386 23.6446 22.8916 22.8916C23.6446 22.1386 23.9458 21.5361 24.3976 20.6325C24.6988 19.8795 24.8494 18.9759 25 17.6205C25 16.2651 25 15.8133 25 12.5C25 9.18675 25 8.73494 25 7.37952C25 6.0241 24.6988 5.12048 24.3976 4.36747C24.0964 3.61446 23.6446 2.86145 22.8916 2.10843C22.1386 1.35542 21.5361 1.05422 20.6325 0.602411C19.8795 0.301206 18.9759 0.150602 17.6205 0C16.2651 0 15.9639 0 12.5 0Z"
                                            fill="#FF6900"/>
                                        <path
                                            d="M12.5 6.0241C8.88554 6.0241 6.0241 8.88554 6.0241 12.5C6.0241 16.1145 8.88554 18.9759 12.5 18.9759C16.1145 18.9759 18.9759 16.1145 18.9759 12.5C18.9759 8.88554 16.1145 6.0241 12.5 6.0241ZM12.5 16.7169C10.241 16.7169 8.28313 14.9096 8.28313 12.5C8.28313 10.241 10.0904 8.28313 12.5 8.28313C14.759 8.28313 16.7169 10.0904 16.7169 12.5C16.7169 14.759 14.759 16.7169 12.5 16.7169Z"
                                            fill="#FF6900"/>
                                        <path
                                            d="M19.1265 7.37952C19.9583 7.37952 20.6325 6.70525 20.6325 5.8735C20.6325 5.04174 19.9583 4.36747 19.1265 4.36747C18.2948 4.36747 17.6205 5.04174 17.6205 5.8735C17.6205 6.70525 18.2948 7.37952 19.1265 7.37952Z"
                                            fill="#FF6900"/>
                                    </svg>

                                    <span
                                        class=" text-black font-bold text-sm ">{{ trans('website/studentProfile.connect') }}</span>
                                </button>

                            </div>


                        </div>


                        <button
                            class=" btn items-center mt-10 hover:bg-orange3 transition-all	 transform hover:scale-[1.01] justify-center flex px-10">
                            <span
                                class=" text-white font-bold text-sm ">{{ trans('website/studentProfile.save_changes') }}</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
