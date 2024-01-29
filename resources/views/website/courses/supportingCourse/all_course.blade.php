@extends('website.layouts.master')

@section('title')
    {{ trans('admin/coursesPanel.supporting_courses') }}
@endsection

@section('content')
    <div class=" widthfull flex py-20 justify-between">
        <div class="w-full  ">
            <h3 class=" font-bold mb-10 text-center text-4xl">{{ trans('website/suppotingCourse.supporting_courses') }}</h3>
            <div class=" w-full border-t flex flex-wrap border-[#E5E8EC] mt-5">
                <div class="w-full md:w-3/12 border-e border-[#E5E8EC]">
                    <div class="border-b border-[#E5E8EC] py-3">
                        <h3 class=" text-base text-black2 font-bold">{{ trans('website/suppotingCourse.level') }}</h3>
                    </div>

                    <form action="" method="post">
                        @csrf
                        <input hidden name="courseType" value="supportingCourse" required>
                        <div class=" flex flex-wrap w-full py-3">
                            <select class="inputtext" name="supportingCourseLevel"
                                    id="supportingCourseLevels">
                                <option value="" selected disabled>{{ trans('admin/admin.SelectLevel') }}</option>
                                <option value="High School">{{ trans('admin/admin.HighSchool') }}</option>
                                <option value="Secondary School">{{ trans('admin/admin.SecondarySchool') }}</option>
                                <option value="Primary School">{{ trans('admin/admin.PrimarySchool') }}</option>
                            </select>
                        </div>

                        <div class=" flex flex-wrap w-full py-3" id="highSchoolYears" style="display: none;">
                            <h3 class=" text-base text-black2 font-bold">High School Years</h3>
                            <select class="inputtext" name="high_school_year"
                                    id="highSchoolYearValue">
                                <option value="" selected disabled>{{ trans('admin/admin.SelectYear') }}</option>
                                <option value="1as">{{ trans('admin/admin.1as') }}</option>
                                <option value="2as">{{ trans('admin/admin.2as') }}</option>
                                <option value="3as">{{ trans('admin/admin.3as') }}</option>
                            </select>
                        </div>

                        <div class=" flex flex-wrap w-full py-3" id="secondarySchoolYears" style="display: none;">
                            <h3 class=" text-base text-black2 font-bold">Secondary School Years</h3>
                            <select class="inputtext" name="secondary_school_year"
                                    id="secondarySchoolYearValue">
                                <option value="" selected disabled>{{ trans('admin/admin.SelectYear') }}</option>
                                <option value="1am">{{ trans('admin/admin.1am') }}</option>
                                <option value="2am">{{ trans('admin/admin.2am') }}</option>
                                <option value="3am">{{ trans('admin/admin.3am') }}</option>
                                <option value="4am">{{ trans('admin/admin.4am') }}</option>
                            </select>
                        </div>

                        <div class=" flex flex-wrap w-full py-3" id="primarySchoolYears" style="display: none;">
                            <h3 class=" text-base text-black2 font-bold">Primary School Years</h3>
                            <select class="inputtext" name="primary_school_year">
                                <option value="" selected disabled>{{ trans('admin/admin.SelectYear') }}</option>
                                <option value="1ap">{{ trans('admin/admin.1ap') }}</option>
                                <option value="2ap">{{ trans('admin/admin.2ap') }}</option>
                                <option value="3ap">{{ trans('admin/admin.3ap') }}</option>
                                <option value="4ap">{{ trans('admin/admin.4ap') }}</option>
                                <option value="5ap">{{ trans('admin/admin.5ap') }}</option>
                            </select>
                        </div>

                        <div class=" flex flex-wrap w-full py-3" id="secondary_school_branches_1asYear"
                             style="display: none;">
                            <h3 class=" text-base text-black2 font-bold">{{ trans('website/suppotingCourse.branch') }}</h3>
                            <select class="inputtext" name="branch" id="secondary_school_branches_1asYearValue">
                                <option value="" selected disabled>{{ trans('admin/admin.selectBranch') }}</option>
                                <option value="Common Stem Science and Technology">
                                    {{ trans('admin/admin.CommonStemScience') }}
                                </option>
                                <option value="Common Trunk Arabic Literature">
                                    {{ trans('admin/admin.CommonTrunkArabic') }}
                                </option>
                            </select>
                        </div>

                        <div class=" flex flex-wrap w-full py-3" id="secondary_school_branches_2as_3asYear"
                             style="display: none;">
                            <h3 class=" text-base text-black2 font-bold">{{ trans('website/suppotingCourse.branch') }}</h3>
                            <select class="inputtext" name="branch"
                                    id="secondary_school_branches_2as_3asYearValue">
                                <option value="" selected disabled>{{ trans('admin/admin.selectBranch') }}</option>
                                <option
                                    value="Experimental Science">{{ trans('admin/admin.ExperimentalScience') }}</option>
                                <option
                                    value="Mathematics Technician">{{ trans('admin/admin.MathematicsTechnician') }}</option>
                                <option value="Mathematics">{{ trans('admin/admin.Mathematics') }}</option>
                                <option
                                    value="Management and Economics">{{ trans('admin/admin.ManagementAndEconomics') }}</option>
                                <option value="Foreign Languages">{{ trans('admin/admin.ForeignLanguages') }}</option>
                                <option
                                    value="Literature and Philosophy">{{ trans('admin/admin.LiteratureAndPhilosophy') }}</option>
                            </select>
                        </div>

                        <button type="submit"
                                class=" btn items-center justify-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] flex px-6">
                                <span class="text-white font-bold text-sm">
                                    {{ trans('admin/admin.Filter') }}
                                </span>
                        </button>
                    </form>


                    {{--                    <div class=" flex flex-wrap w-full py-3">--}}
                    {{--                        <!-- malek active add "bg-orange text-white scale-105"  -->--}}
                    {{--                        <a href="{{ route('level.filter', ['courses' => 'sup_courses', 'level' => 'High School']) }}"--}}
                    {{--                           class="border fontp border-[#E5E8EC] hover:bg-orange/50  transition-all cursor-pointer rounded-xl p-2 m-1 px-4 flex justify-center items-center">--}}
                    {{--                            {{ trans('website/suppotingCourse.high_school') }}--}}
                    {{--                        </a>--}}

                    {{--                        <a href="{{ route('level.filter', ['courses' => 'sup_courses', 'level' => 'Secondary School']) }}"--}}
                    {{--                           class="border fontp border-[#E5E8EC] hover:bg-orange/50  transition-all cursor-pointer rounded-xl p-2 m-1 px-4 flex justify-center items-center">--}}
                    {{--                            {{ trans('website/suppotingCourse.secondary_school') }}--}}
                    {{--                        </a>--}}

                    {{--                        <a href="{{ route('level.filter', ['courses' => 'sup_courses', 'level' => 'Primary School']) }}"--}}
                    {{--                           class="border fontp border-[#E5E8EC] hover:bg-orange/50  transition-all cursor-pointer rounded-xl p-2 m-1 px-4 flex justify-center items-center">--}}
                    {{--                            {{ trans('website/suppotingCourse.primary_school') }}--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                    {{--                    <div class=" border-y mt-10 border-[#E5E8EC] py-3">--}}
                    {{--                        <h3 class=" text-base text-black2 font-bold">High School Years</h3>--}}
                    {{--                    </div>--}}
                    {{--                    <div class=" flex flex-wrap w-full py-3">--}}
                    {{--                        @foreach( $high_School_years as $year)--}}
                    {{--                            <a href="{{ route('yearFilter', ['courses' => 'sup_courses', 'year' => $year]) }}"--}}
                    {{--                               class="border fontp border-[#E5E8EC] hover:bg-orange/50  transition-all cursor-pointer rounded-xl p-2  m-1 px-4 flex justify-center items-center">--}}
                    {{--                                <span class=" fontp">{{ $year }}</span></a>--}}
                    {{--                        @endforeach--}}
                    {{--                    </div>--}}
                    {{--                    <div class=" border-y mt-10 border-[#E5E8EC] py-3">--}}
                    {{--                        <h3 class=" text-base text-black2 font-bold">Secondary School Years</h3>--}}
                    {{--                    </div>--}}
                    {{--                    <div class=" flex flex-wrap w-full py-3">--}}
                    {{--                        @foreach( $secondary_School_years as $year)--}}
                    {{--                            <a href="{{ route('yearFilter', ['courses' => 'sup_courses', 'year' => $year]) }}"--}}
                    {{--                               class="border fontp border-[#E5E8EC] hover:bg-orange/50  transition-all cursor-pointer rounded-xl p-2  m-1 px-4 flex justify-center items-center">--}}
                    {{--                                <span class=" fontp">{{ $year }}</span></a>--}}
                    {{--                        @endforeach--}}
                    {{--                    </div>--}}
                    {{--                    <div class=" border-y mt-10 border-[#E5E8EC] py-3">--}}
                    {{--                        <h3 class=" text-base text-black2 font-bold">Primary School Years</h3>--}}
                    {{--                    </div>--}}
                    {{--                    <div class=" flex flex-wrap w-full py-3">--}}
                    {{--                        @foreach( $primary_School_years as $year)--}}
                    {{--                            <a href="{{ route('yearFilter', ['courses' => 'sup_courses', 'year' => $year]) }}"--}}
                    {{--                               class="border fontp border-[#E5E8EC] hover:bg-orange/50  transition-all cursor-pointer rounded-xl p-2  m-1 px-4 flex justify-center items-center">--}}
                    {{--                                <span class=" fontp">{{ $year }}</span></a>--}}
                    {{--                        @endforeach--}}
                    {{--                    </div>--}}


                    <div class=" border-y mt-10 border-[#E5E8EC] py-3">
                        <h3 class=" text-base text-black2 font-bold">{{ trans('website/suppotingCourse.branch') }}</h3>
                    </div>
                    <div class=" flex flex-wrap w-full py-3">
                        @foreach( $branches as $branch)
                            <a href="{{ route('branch.filter', ['courses' => 'sup_courses', 'branch' => $branch]) }}"
                               class="border fontp border-[#E5E8EC] hover:bg-orange/50  transition-all cursor-pointer rounded-xl p-2  m-1 px-4 flex justify-center items-center">
                                <span class=" fontp">{{ Str::limit($branch, 15, '...') }}</span></a>
                        @endforeach
                    </div>
                    <div class=" border-y mt-10 border-[#E5E8EC] py-3">
                        <h3 class=" text-base text-black2 font-bold">{{ trans('website/suppotingCourse.course') }}</h3>
                    </div>
                    <div class=" flex flex-wrap w-full py-3">
                        @foreach($sup_courses as $course)
                            @if ($loop->index < 3)
                                <a href="{{ route('supporting_course.details', ['slug' => $course->slug]) }}"
                                   class="border fontp border-[#E5E8EC] hover:bg-orange/50  transition-all cursor-pointer rounded-xl p-2  m-1 px-4 flex justify-center items-center">
                                    <span class=" fontp">{{ Str::limit($course->title, 20, '...') }}</span></a>
                            @else
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class=" w-full md:w-9/12 py-4 px-1 ">
                    <div id="ajax_search_result">
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
{{--                                <h3 class=" text-base text-black2 font-bold">There are no courses available</h3>--}}
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class=" w-full ">
                    {{ $sup_courses->links('vendor.pagination.soufacademy_pagenation') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var supportingCourseLevels = document.getElementById('supportingCourseLevels');

        var highSchoolYears = document.getElementById('highSchoolYears');
        var highSchoolYearValue = document.getElementById('highSchoolYearValue');

        var secondarySchoolYears = document.getElementById('secondarySchoolYears');
        var primarySchoolYears = document.getElementById('primarySchoolYears');

        var secondary_school_branches_1asYear = document.getElementById('secondary_school_branches_1asYear');
        var secondary_school_branches_1asYearValue = document.getElementById('secondary_school_branches_1asYearValue');
        var secondary_school_branches_2as_3asYear = document.getElementById('secondary_school_branches_2as_3asYear');
        var secondary_school_branches_2as_3asYearValue = document.getElementById('secondary_school_branches_2as_3asYearValue');

        supportingCourseLevels.addEventListener('change', function () {
            if (this.value === 'High School') {
                highSchoolYears.style.display = 'block';
                highSchoolYears.setAttribute('required', 'required');
            } else {
                highSchoolYears.style.display = 'none';
                highSchoolYears.removeAttribute('required');

                // Set the value of the select element to an empty string to remove the selected value
                document.querySelector('select[name="high_school_year"]').value = '';

                secondary_school_branches_1asYear.style.display = 'none';
                secondary_school_branches_1asYearValue.removeAttribute('required');
                secondary_school_branches_1asYearValue.value = '';
                secondary_school_branches_2as_3asYear.style.display = 'none';
                secondary_school_branches_2as_3asYearValue.removeAttribute('required');
                secondary_school_branches_2as_3asYearValue.value = '';
            }

            if (this.value === 'Secondary School') {
                secondarySchoolYears.style.display = 'block';
                secondarySchoolYears.setAttribute('required', 'required');
            } else {
                secondarySchoolYears.style.display = 'none';
                secondarySchoolYears.removeAttribute('required');

                // Set the value of the select element to an empty string to remove the selected value primarySchoolYears
                document.querySelector('select[name="secondary_school_year"]').value = '';
            }

            if (this.value === 'Primary School') {
                primarySchoolYears.style.display = 'block';
                primarySchoolYears.setAttribute('required', 'required');
            } else {
                primarySchoolYears.style.display = 'none';
                primarySchoolYears.removeAttribute('required');

                // Set the value of the select element to an empty string to remove the selected value
                document.querySelector('select[name="primary_school_year"]').value = '';
            }
        });

        highSchoolYearValue.addEventListener('change', function () {
            if (this.value === '1as') {
                secondary_school_branches_1asYear.style.display = 'block';
                // secondary_school_branches_1asYearValue.setAttribute('required', 'required');
            } else {
                secondary_school_branches_1asYear.style.display = 'none';
                // secondary_school_branches_1asYearValue.removeAttribute('required');
                secondary_school_branches_1asYearValue.value = '';
            }

            if (this.value === '2as' || this.value === '3as') {
                secondary_school_branches_2as_3asYear.style.display = 'block';
                // secondary_school_branches_2as_3asYearValue.setAttribute('required', 'required');
            } else {
                secondary_school_branches_2as_3asYear.style.display = 'none';
                // secondary_school_branches_2as_3asYearValue.removeAttribute('required');
                secondary_school_branches_2as_3asYearValue.value = '';
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('form').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = $(this).serialize(); // Serialize all form data

                $.ajax({
                    url: "{{ route('courseFilter') }}", // Get the form's action attribute
                    type: "post", // Get the form's method attribute
                    datatype: "html",
                    cashe: false,
                    data: formData, // Use the serialized form data
                    success: function (data) {
                        $("#ajax_search_result").html(data);
                        console.log(data); // For example, you can log the response data
                    },
                    error: function () {
                        // Handle error here
                    }
                });
            });
        });
    </script>
@endsection
