@extends('website.layouts.master')

@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">Supporting Courses</h3>

                <div class=" bg-white  boxshadow2 rounded-xl px-0 py-6 mt-10 w-full mx-auto ">
                    <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">
                        <div class="flex">
                            <p class="font-bold text-gray2 w-6/12 text-[15px] pb-2">Course</p>
                            <p class="font-bold text-gray2 w-[22%] text-[15px] pb-2">Action</p>
                        </div>
                    </div>

                    @if($supWaiting->isEmpty())
                        <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                            <h5 class="text-lg font-bold text-black2 hover:text-orange transition-all">
                                You dont have any courses in waiting list !</h5>
                        </div>
                    @else

                        @foreach($supWaiting as $waitList)
                            <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                                <div class=" w-6/12 flex flex-wrap items-center">
                                    <div class=" rounded-xl w-4/12 md:w-3/12 overflow-hidden">
                                        <img
                                            src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                            alt="course" class=" object-contain h-full w-full">
                                    </div>
                                    <div class=" pt-4 md:pt-0 md:px-6">
                                        <h5 class="text-lg font-bold text-black2 hover:text-orange transition-all">
                                            <a
                                                href="{{ route('supporting_course.details', ['slug' => $waitList->courseable->slug]) }}">
                                                {{ Str::limit($waitList->courseable->title, 30, '...') }}</a>

                                        </h5>
                                        <p class="text-xs font-normal fontp my-1.5 text-gray ">

                                            @if ($waitList->courseable_type === 'App\Models\Course\SupportingCourse')
                                                {{ $waitList->courseable->branch }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="w-6/12 flex flex-wrap items-center">

                                    <div class="w-full md:w-5/12 mx-auto">
                                        <a href="{{ route('accept', ['courseType'=> 'supportingCourse','slug' => $waitList->courseable->slug]) }}"
                                           class="  w-40 btn hover:bg-orange3 cursor-pointer items-center justify-center flex px-6">
                                            <span class=" text-white font-bold text-sm ">Accept</span>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif
                </div>
            </div>

        </div>

        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">Languages Courses</h3>

                <div class=" bg-white  boxshadow2 rounded-xl px-0 py-6 mt-10 w-full mx-auto ">
                    <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">
                        <div class="flex">
                            <p class="font-bold text-gray2 w-6/12 text-[15px] pb-2">Course</p>
                            <p class="font-bold text-gray2 w-[22%] text-[15px] pb-2">Action</p>

                        </div>

                    </div>

                    @if($langWaiting->isEmpty())
                        <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                            <h5 class="text-lg font-bold text-black2 hover:text-orange transition-all">
                                You dont have any courses in waiting list !</h5>
                        </div>
                    @else

                        @foreach($langWaiting as $waitList)
                            <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                                <div class=" w-6/12 flex flex-wrap items-center">
                                    <div class=" rounded-xl w-4/12 md:w-3/12 overflow-hidden">
                                        <img
                                            src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                            alt="course" class=" object-contain h-full w-full">
                                    </div>
                                    <div class=" pt-4 md:pt-0 md:px-6">
                                        <h5 class="text-lg font-bold text-black2 hover:text-orange transition-all">
                                            <a
                                                href="{{ route('languages_course.details', ['slug' => $waitList->courseable->slug]) }}">
                                                {{ Str::limit($waitList->courseable->title, 30, '...') }}</a>
                                        </h5>
                                        <p class="text-xs font-normal fontp my-1.5 text-gray ">
                                        </p>
                                    </div>
                                </div>
                                <div class="w-6/12 flex flex-wrap items-center">

                                    <div class="w-full md:w-5/12 mx-auto">
                                        <a href="{{ route('accept', ['courseType'=> 'LanguageCourse','slug' => $waitList->courseable->slug]) }}"
                                           class="  w-40 btn hover:bg-orange3 cursor-pointer items-center justify-center flex px-6">
                                            <span class=" text-white font-bold text-sm ">Accept</span>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif
                </div>
            </div>

        </div>

        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">Intensive Courses</h3>

                <div class=" bg-white  boxshadow2 rounded-xl px-0 py-6 mt-10 w-full mx-auto ">
                    <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">
                        <div class="flex">
                            <p class="font-bold text-gray2 w-6/12 text-[15px] pb-2">Course</p>
                            <p class="font-bold text-gray2 w-[22%] text-[15px] pb-2">Action</p>
                        </div>

                    </div>

                    @if($intenWaiting->isEmpty())
                        <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                            <h5 class="text-lg font-bold text-black2 hover:text-orange transition-all">
                                You dont have any courses in waiting list !</h5>
                        </div>
                    @else

                        @foreach($intenWaiting as $waitList)
                            <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                                <div class=" w-6/12 flex flex-wrap items-center">
                                    <div class=" rounded-xl w-4/12 md:w-3/12 overflow-hidden">
                                        <img
                                            src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                            alt="course" class=" object-contain h-full w-full">
                                    </div>
                                    <div class=" pt-4 md:pt-0 md:px-6">
                                        <h5 class="text-lg font-bold text-black2 hover:text-orange transition-all">
                                            <a
                                                href="{{ route('intensive_course.details', ['slug' => $waitList->courseable->slug]) }}">
                                                {{ Str::limit($waitList->courseable->title, 30, '...') }}</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="w-6/12 flex flex-wrap items-center">

                                    <div class="w-full md:w-5/12 mx-auto">
                                        <a href="{{ route('accept', ['courseType'=> 'IntensiveCourse','slug' => $waitList->courseable->slug]) }}"
                                           class="  w-40 btn hover:bg-orange3 cursor-pointer items-center justify-center flex px-6">
                                            <span class=" text-white font-bold text-sm ">Accept</span>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif
                </div>
            </div>

        </div>

    </div>

@endsection
