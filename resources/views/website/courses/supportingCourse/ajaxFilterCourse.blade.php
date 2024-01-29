<div class=" w-full flex flex-wrap ">
    @forelse($sup_courses as $course)
        <div class="lg:w-4/12 px-2">
            <div class="course-item w-full  rounded-xl bg-white">
                <div class="course-img-wrap overflow-hidden">
                    <a href="#"><img
                            src="{{ asset('images/courses/'.$course->img) }}"
                            alt="course" class="img-fluid imgc"></a>
                </div>
                <div class="card-body">
                    <h5 class="text-lg font-bold hover:text-orange text-orange2"><a
                            class="hover:text-orange"
                            href="#">{{ Str::limit($course->title, 20, '...') }}</a></h5>
                    <div
                        class="instructor-bottom-item flex mt-3 mb-2 text-[15px] fontp font-medium">
                        <img class="w-5 h-5" src="{{ URL::asset('website/images/study.svg') }}"
                             alt="course">
                        <span class="ms-1 fontp font-medium">{{ trans('website/suppotingCourse.level') }} :</span>
                        <span class="text-gray ps-2 fontp text-[15px]">
                                                {{ $course->level }}
                                                </span>
                    </div>
                    <div
                        class="instructor-bottom-item flex mt-3 mb-2 text-[15px] fontp font-medium">
                        <img class="w-5 h-5" src="{{ URL::asset('website/images/study.svg') }}"
                             alt="course">
                        <span class="ms-1 fontp font-medium">year :</span>
                        <span class="text-gray ps-2 fontp text-[15px]">
                                                {{ $course->year }}
                        </span>
                    </div>
                    <div
                        class="course-item-bottom flex mt-2 mb-3 text-[15px] fontp font-medium">
                        <img class="w-5 h-5" src="{{ URL::asset('website/images/wallet.svg') }}"
                             alt="course">
                        <span class="ms-1 fontp font-medium">{{ trans('website/suppotingCourse.instructor') }} :</span>
                        <span class="text-gray ps-2 fontp text-[15px]">
                                                    {{ Str::limit($course->instructor->firstName, 10, '...') }}
                                                </span>
                    </div>
                </div>
                <a href="{{ route('supporting_course.details', ['slug' => $course->slug]) }}"
                   class=" w-full btn-big cursor-pointer bg-green hover:bg-orange items-center justify-center flex px-6">
                                        <span
                                            class=" text-white font-bold text-sm ">{{ $course->price }} {{ trans('website/suppotingCourse.DA') }}</span>
                </a>
            </div>
        </div>

    @empty
        <h3 class=" text-base text-black2 font-bold">There are no courses available</h3>
    @endforelse
</div>
