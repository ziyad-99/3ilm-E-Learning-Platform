@extends('website.layouts.master')

@section('title')
    My Courses
@endsection

@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">groups</h3>

                <div class=" bg-white  boxshadow2 rounded-xl px-0 py-6 mt-10 w-full mx-auto ">
                    <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">
                        <div class="flex">
                            <p class="font-bold text-gray2 w-6/12 text-[15px] pb-2">Group name</p>
                            <p class="font-bold text-gray2 w-[28%] text-[15px] text-center  pb-2">{{ trans('website/myCourses.progress') }}</p>
                            <p class="font-bold text-gray2 w-[28%] text-[15px] text-center  pb-2">Group members</p>
                            <p class="font-bold text-gray2 w-[22%] text-[15px] pb-2">{{ trans('website/myCourses.action') }}</p>
                        </div>
                    </div>


                    @if($groups->isEmpty())
                        <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                            <h5 class="text-lg font-bold text-black2 hover:text-orange transition-all">
                                there are no groups in this Course !</h5>
                        </div>
                    @else
                        @foreach($groups as $group)
                            <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                                <div class=" w-6/12 flex flex-wrap items-center">
                                    <div class=" pt-4 md:pt-0 md:px-6">
                                        <h5 class="text-lg font-bold text-black2 hover:text-orange transition-all">
                                            {{ Str::limit($group->name, 30, '...') }}
                                        </h5>
                                    </div>
                                </div>
                                <div class=" w-3/12 flex flex-wrap items-center">
                                    <p class="text-black text-base font-medium mb-2 fontp">{{ $group->sessions->count() }}
                                        /{{ $group->courseable->numberSessions }}</p>
                                    <div class=" bg-[#D9D9D9] h-3 w-full rounded-full">
                                        <div class="bg-orange rounded-full h-full"
                                             style="width:{{ (($group->sessions->count() / $group->courseable->numberSessions) * 100) > 100 ? 100 : (($group->sessions->count() / $group->courseable->numberSessions) * 100) }}%"></div>
                                    </div>
                                </div>

                                <div class="w-6/12 flex flex-wrap items-center">
                                    <div class="w-full md:w-7/12 md:px-20 text-center mb-[18px]">
                                        {{ $group->members->count() }}
                                    </div>

                                    <div class="w-full md:w-4/12 ms-auto">
                                        @switch($group->courseable_type)
                                            @case("App\Models\Course\SupportingCourse")
                                                @php $courseType = 'supportingCourse';  @endphp
                                                @break
                                            @case("App\Models\Course\LanguageCourse")
                                                @php $courseType = 'languagesCourse';  @endphp
                                                @break
                                            @case("App\Models\Course\IntensiveCourse")
                                                @php $courseType = 'intensiveCourse';  @endphp
                                                @break
                                        @endswitch
                                        <a href="{{ route('instructor.zoom', ['courseType'=> $courseType,'group_id' => $group->id]) }}"
                                           class=" w-40 btn mb-2 mx-auto bg-green hover:bg-orange3 transition-all transform hover:scale-[1.01] items-center justify-center flex px-6">
                                                <span
                                                    class=" text-white font-bold text-sm ">{{ trans('website/myCourses.start_or_enter') }}</span>
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
