@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.Courses Panel') }}
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-center text-3xl mt-10 px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/admin.Courses Panel') }}</span>
            </h4>
            <div class="w-full md:w-8/12 mx-auto mt-10 px-2 pt-5 mb-5 grid grid-cols-3 gap-10 ">

                @can('show_supporting_courses')
                    <div class=" flex items-center group  flex-col w-full bg-white rounded-2xl ">
                        <a href="{{ route('admin.allSupportingCourses') }}">
                            <div class="course-img-wrap overflow-hidden"
                                 style="border-radius: .75rem .75rem 0 0 !important;">
                                <img
                                    src="{{ asset('website/admin/images/supportingCourses.jpg') }}"
                                    alt="course" class="img-fluid imgc">
                            </div>
                            <div class=" py-8 p-4">
                                <p class="text-xl group-hover:text-orange font-semibold text-center text-black34 fontp">
                                    {{ trans('admin/coursesPanel.supporting_courses') }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endcan

                @can('show_languages_courses')
                    <div class=" flex items-center group flex-col w-full bg-white rounded-2xl">
                        <a href="{{ route('admin.allLanguagesCourses') }}">
                            <div class="course-img-wrap overflow-hidden"
                                 style="border-radius: .75rem .75rem 0 0 !important;">
                                <img
                                    src="{{ asset('website/admin/images/LanguagesCourse.png') }}"
                                    alt="course" class="img-fluid imgc">
                            </div>
                            <div class=" py-8 p-4">
                                <p class="text-xl font-semibold group-hover:text-orange text-center text-black34 fontp">
                                    {{ trans('admin/coursesPanel.languages_courses') }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endcan

                @can('show_intensive_courses')

                    <div class=" flex items-center group flex-col w-full bg-white rounded-2xl">
                        <a href="{{ route('admin.allIntensiveCourses') }}">
                            <div class="course-img-wrap overflow-hidden"
                                 style="border-radius: .75rem .75rem 0 0 !important;">
                                <img
                                    src="{{ asset('website/admin/images/intensiveCourse.png') }}"
                                    alt="course" class="img-fluid imgc">
                            </div>

                            <div class=" py-8 p-4">
                                <p class="text-xl font-semibold group-hover:text-orange text-center text-black34 fontp">
                                    {{ trans('admin/coursesPanel.intensive_courses') }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endcan

            </div>
        </div>

        <div onclick="openNav()"
             class="  gg4255 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[10] fixed"></div>
        <div
            class="  gg422 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[1000] fixed">
            <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="72.5" cy="72.5" r="69.5" stroke="#37F807" stroke-width="6"/>
                <path d="M44 74.7767L61.4349 92L108 46" stroke="#37F807" stroke-width="10.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
@endsection
