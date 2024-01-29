@extends('website.layouts.master')

@section('title')
    {{ $specificSession->courseable->title }}
@endsection

@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">{{ $specificSession->courseable->title }}</h3>
                @if(Schema::hasColumn($specificSession->courseable->getTable(), 'branch'))
                    <p class="font-bold fontp text-center mt-4 text-xl">{{ $specificSession->courseable->year }}
                        - {{ $specificSession->courseable->level }}</p>
                    <p class="font-medium fontp text-center mt-3 text-base">{{ $specificSession->group->name }}</p>
                    <p class="font-medium fontp text-orange text-center mt-2 text-base">{{ $specificSession->courseable->branch }}</p>
                @else
                    <p class="font-medium fontp text-center mt-3 text-base">{{ $specificSession->group->name }}</p>
                    <p class="font-medium fontp text-orange text-center mt-2 text-base">{{ $specificSession->courseable->level }}</p>
                @endif

                <div class="w-full md:w-5/12 mt-5 mx-auto px-20 text-center ">
                    <p class="text-black text-base font-medium mb-2 fontp">{{ $specificSession->courseable->sessions->count() }}
                        /{{ $specificSession->courseable->numberSessions }}</p>
                    <div class=" bg-[#D9D9D9] h-3 w-full rounded-full">
                        <div class="bg-orange rounded-full h-full"
                             style="width:{{ (($specificSession->courseable->sessions->count() / $specificSession->courseable->numberSessions) * 100) > 100 ? 100 : (($specificSession->courseable->sessions->count() / $specificSession->courseable->numberSessions) * 100) }}%"></div>
                    </div>
                </div>
                <div class=" bg-white  boxshadow2 rounded px-0 py-6 mt-10 w-full mx-auto ">
                    <div class="  grid grid-cols-1 gap-4 md:gap-2 md:grid-cols-3 px-6">
                        <div class=" w-full md:col-span-2">
                            {{--                            <div class="h-[450px] bg-[#f5f5f5] w-full">--}}
                            {{--                                {{ $specificSession->status }}--}}
                            {{--                            </div>--}}
                            <div class="h-[450px] bg-[#f5f5f5] w-full flex justify-center items-center">
                                @if($specificSession->status == 1)
                                    {{--                                    <a class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10"--}}
                                    {{--                                       href="{{ route('instructor.startMeeting', ['courseType' => $courseType, 'session_id' => $specificSession->id ]) }}"><span--}}
                                    {{--                                            class=" text-white font-bold text-sm">{{ trans('website/zoom/zoomPage.start_enter') }} {{ $specificSession->name }}</span></a>--}}

                                    <button id="myButton"
                                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                                        <span class=" text-white font-bold text-sm">
                                            {{ trans('website/zoom/zoomPage.start_enter') }} {{ $specificSession->name }}
                                        </span>
                                    </button>

                                    <iframe id="myIframe" width="100%" height="100%"
                                            style="display:none; border-radius: 2%"
                                            allowfullscreen allow="microphone *; camera *; display-capture *;">
                                        Your browser isn't compatible
                                    </iframe>

                                    <script>
                                        let loadCount = 0; // Initialize the count of loads
                                        document.getElementById('myButton').addEventListener('click', showIframe);

                                        function showIframe() {
                                            document.getElementById('myButton').style.display = 'none';
                                            document.getElementById('myIframe').src = @json(route('instructor.startMeeting', ['courseType' => $courseType, 'session_id' => $specificSession->id ]));
                                            document.getElementById('myIframe').style.display = 'block';
                                        }

                                        const iframe = document.getElementById('myIframe');

                                        // Function to reload the parent page
                                        function reloadParent() {
                                            window.top.location.reload(); // Reload the parent page
                                        }

                                        var intiialSRC = iframe.src;
                                        var logoutSRC = @json(route('instructor.logoutMeeting'));

                                        // Add an event listener for the 'load' event of the iframe
                                        iframe.addEventListener('load', function () {

                                            loadCount++; // Increment the load count on each load

                                            if (loadCount === 3) {
                                                // When the third load occurs, reload the parent page after 5 seconds
                                                setTimeout(function() {
                                                    window.top.location.reload();
                                                }, 3000); // 3000 milliseconds = 3 seconds
                                            }
                                        });

                                    </script>

                                @else
                                    {{--                                    <a class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10"--}}
                                    {{--                                       href="{{ route('student.recordeLink', ['meeting_id' => $specificSession->meetingID ]) }}"><span--}}
                                    {{--                                            class=" text-white font-bold text-sm">{{ trans('website/zoom/zoomPage.session_end') }}</span></a>--}}

                                    <button id="myButton"
                                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                                                                            <span class=" text-white font-bold text-sm">
                                                                                {{ trans('website/zoom/zoomPage.session_end') }}
                                                                            </span>
                                    </button>

                                    <iframe id="myIframe" width="100%" height="100%"
                                            style="display:none; border-radius: 2%"
                                            allowfullscreen allow="microphone *; camera *; display-capture *;">
                                        Your browser isn't compatible
                                    </iframe>

                                    <script>
                                        document.getElementById('myButton').addEventListener('click', showIframe);

                                        function showIframe() {
                                            document.getElementById('myButton').style.display = 'none';
                                            document.getElementById('myIframe').src = @json(route('student.recordeLink', ['meeting_id' => $specificSession->meetingID ]));
                                            document.getElementById('myIframe').style.display = 'block';
                                        }
                                    </script>

                                @endif
                            </div>
                        </div>
                        <div class=" w-fullpy-4 ps-2">

                            @forelse($specificSession->group->sessions as $session)
                                <a href="{{ route('instructor.specificZoom', ['courseType' => $courseType, 'session_id' => $session->id]) }}">
                                    <p class="fontp text-black34 hover:text-orange font-medium mb-2 text-base leading-[20px] text-start">
                                        {{ $session->name }}
                                    </p>
                                </a>
                            @empty
                                <a>
                                    <p class="fontp text-black34 hover:text-orange font-medium mb-2 text-base leading-[20px] text-start">
                                        {{ trans('website/zoom/zoomPage.no_sessions') }}
                                    </p>
                                </a>
                            @endforelse
                        </div>
                    </div>
                    {{--                    <div class="px-4 md:px-6">--}}

                    {{--                        <!-- Tabs -->--}}
                    {{--                        <ul id="tabs2" class="inline-flex flex-wrap gap-2 pb-2 mt-8 px-1.5">--}}
                    {{--                            <li class=" ">--}}
                    {{--                                <a id="default-tab"--}}
                    {{--                                   class="font-semibold transition-all  text-orange border-b-2 border-[#FF6900]text-[15px] mx-2 md:text-base md:mx-4 border-solid pb-2"--}}
                    {{--                                   href="#first">Resources</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <a class="font-semibold text-[15px] mx-2 md:text-base md:mx-4 transition-all border-[#FF6900] border-solid pb-2"--}}
                    {{--                                   href="#second">Quiz</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <a class="font-semibold text-[15px] mx-2 md:text-base md:mx-4 transition-all border-[#FF6900] border-solid pb-2"--}}
                    {{--                                   href="#third">Discussion</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <a class="font-semibold text-[15px] mx-2 md:text-base md:mx-4 transition-all  border-[#FF6900] border-solid pb-2"--}}
                    {{--                                   href="#fourth">Certificate</a></li>--}}
                    {{--                        </ul>--}}

                    {{--                        <!-- Tab Contents -->--}}
                    {{--                        <div id="tab-contents2">--}}
                    {{--                            <div id="first" class="  p-6 bg-[#f5f5f5] border rounded border-[#eee] ">--}}
                    {{--                                <div title="Resources" class="w-full">--}}
                    {{--                                    @forelse($specificSession->ressources as $ressource)--}}
                    {{--                                        <a href="{{ route('student.resourceDownload', ['filename' => $ressource->filename]) }}">--}}
                    {{--                                            <button--}}
                    {{--                                                class="  btn hover:bg-orange3 transition-all	 transform hover:scale-[1.01] items-center justify-center flex mb-4 px-6">--}}
                    {{--                                                <span--}}
                    {{--                                                    class=" text-white font-bold text-sm ">{{ $ressource->filename }}</span>--}}
                    {{--                                            </button>--}}
                    {{--                                        </a>--}}
                    {{--                                    @empty--}}
                    {{--                                        <a>--}}
                    {{--                                            <p class="fontp text-black34 hover:text-orange font-medium mb-2 text-base leading-[20px] text-start">--}}
                    {{--                                                there are no Resources--}}
                    {{--                                            </p>--}}
                    {{--                                        </a>--}}
                    {{--                                    @endforelse--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            @php--}}
                    {{--                                $student = Auth::guard('web')->user();--}}
                    {{--                            @endphp--}}

                    {{--                            <div id="second" title="Quiz"--}}
                    {{--                                 class="hidden py-5 overflow-x-auto max-w-[700px] md:max-w-none md:overflow-x-visible w-full">--}}
                    {{--                                <div class="min-w-[600px]">--}}
                    {{--                                    <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">--}}
                    {{--                                        <div class="flex">--}}
                    {{--                                            <p class="font-semibold w-4/12 text-[15px] pb-2">--}}
                    {{--                                                Quiz--}}
                    {{--                                            </p>--}}
                    {{--                                            <p class="font-semibold w-4/12 text-[15px] text-center  pb-2">--}}
                    {{--                                                Quiz Mark--}}
                    {{--                                            </p>--}}
                    {{--                                            <p class="font-semibold ms-auto w-1/12 text-[15px] text-center  pb-2">--}}
                    {{--                                                Your Mark--}}
                    {{--                                            </p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}

                    {{--                                    @forelse($specificSession->quizs as $quiz)--}}
                    {{--                                        @if($quiz->marks->where('student_id', $student->id)->first())--}}
                    {{--                                            <div class="flex items-center p-6 py-4 pb-0">--}}
                    {{--                                                <div class=" w-4/12 flex items-center">--}}
                    {{--                                                    <div class=" rounded-full h-12 w-12 overflow-hidden">--}}
                    {{--                                                        <img--}}
                    {{--                                                            src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"--}}
                    {{--                                                            alt="course" class=" object-cover h-full w-full">--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <h5 class="ps-6 text-base font-bold text-black2">{{ $quiz->quizName }}</h5>--}}
                    {{--                                                </div>--}}
                    {{--                                                <p class="font-medium fontp w-4/12 text-[15px] text-center ">--}}
                    {{--                                                    {{ $quiz->markPerQuestion * $quiz->totalQuestions }}--}}
                    {{--                                                </p>--}}
                    {{--                                                <p class="font-medium fontp ms-auto w-1/12 text-[15px] text-center">--}}
                    {{--                                                    {{ $student->marks->where('quiz_id', $quiz->id)->first()->mark }}--}}
                    {{--                                                </p>--}}
                    {{--                                            </div>--}}
                    {{--                                        @endif--}}
                    {{--                                    @empty--}}
                    {{--                                        <p class="font-normal fontp w-2/12 text-[15px]">--}}
                    {{--                                            there are no quiz to take in this session--}}
                    {{--                                        </p>--}}
                    {{--                                    @endforelse--}}

                    {{--                                    <br><br>--}}

                    {{--                                    <div title="Quiz2" class=" w-full">--}}
                    {{--                                        <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">--}}
                    {{--                                            <div class="flex">--}}
                    {{--                                                <p class="font-semibold w-3/12 text-gray2 text-sm pb-2">Quiz--}}
                    {{--                                                    Name--}}
                    {{--                                                </p>--}}
                    {{--                                                <p class="font-semibold w-2/12 text-gray2 text-sm pb-2">Quiz--}}
                    {{--                                                    Type--}}
                    {{--                                                </p>--}}
                    {{--                                                <p class="font-semibold w-2/12 text-gray2 text-sm pb-2">Total--}}
                    {{--                                                    Questions</p>--}}
                    {{--                                                <p class="font-semibold w-2/12 text-gray2 text-sm  pb-2">--}}
                    {{--                                                    Duration--}}
                    {{--                                                </p>--}}
                    {{--                                                <p class="font-semibold ms-auto text-gray2 w-3/12 text-sm   pb-2">--}}
                    {{--                                                    Action</p>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                        @forelse($specificSession->quizs as $quiz)--}}
                    {{--                                            @if(!$quiz->marks->where('student_id', $student->id)->first())--}}
                    {{--                                                <div--}}
                    {{--                                                    class="flex items-center p-6 py-4 border-b border-[#E2E2E2]/80 border-solid">--}}
                    {{--                                                    <p class="font-bold w-3/12 text-black2 text-base pb-2">--}}
                    {{--                                                        {{ $quiz->quizName }}--}}
                    {{--                                                    </p>--}}
                    {{--                                                    <p class="font-medium w-2/12 text-black2 text-base pb-2">--}}
                    {{--                                                        {{ $quiz->quizType }}--}}
                    {{--                                                    </p>--}}
                    {{--                                                    <p class="font-normal fontp w-2/12 text-base  ">--}}
                    {{--                                                        {{ $quiz->totalQuestions }}--}}
                    {{--                                                    </p>--}}
                    {{--                                                    <p class="font-normal fontp w-2/12 text-[15px]  ">--}}
                    {{--                                                        {{ $quiz->duration }}--}}
                    {{--                                                    </p>--}}
                    {{--                                                    <div class="flex w-3/12 ms-auto">--}}
                    {{--                                                        <a href="{{ route('student.takeQuiz', ['quiz_id' => $quiz->id]) }}"--}}
                    {{--                                                           class=" w-40 btn = bg-green items-center justify-center flex px-6 me-4">--}}
                    {{--                                                        <span--}}
                    {{--                                                            class=" text-white  tracking-[0.3px] font-bold text-sm ">Take Quiz</span>--}}
                    {{--                                                        </a>--}}
                    {{--                                                        <div--}}
                    {{--                                                            class=" w-40 btn items-center justify-center flex px-6">--}}
                    {{--                                                        <span--}}
                    {{--                                                            class=" text-white tracking-[0.3px] font-bold text-sm ">See Results</span>--}}
                    {{--                                                        </div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                            @endif--}}
                    {{--                                        @empty--}}
                    {{--                                            <p class="font-normal fontp w-2/12 text-[15px]">--}}
                    {{--                                                there are no quiz taken--}}
                    {{--                                            </p>--}}
                    {{--                                        @endforelse--}}
                    {{--                                    </div>--}}

                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div id="third" class="hidden w-full">--}}
                    {{--                                <div class=" w-full  border-b border-gray2/20 pt-10 pb-10">--}}
                    {{--                                    <div class="w-full  flex justify-between">--}}
                    {{--                                        <div class="relative w-14 z-0  overflow-hidden rounded-full h-14 ">--}}
                    {{--                                            <img--}}
                    {{--                                                class="h-full w-full  transfarm trans-all2 hover:scale-[1.1] object-cover z-10 relative "--}}
                    {{--                                                src="../../static/images/souf.svg"/>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="w-10/12 lg:w-11/12 pt-0 rounded-lg p-2 md:p-8">--}}
                    {{--                                            <div class="bg-gray/10 w-full rounded-lg  p-4 md:p-8">--}}
                    {{--                                                <p class=" font-bold  text-lg lg:leading-[140%] ">--}}
                    {{--                                                    Joew Harbert</p>--}}
                    {{--                                                <p--}}
                    {{--                                                    class="fontp inline-block text-black34 font-normal text-base my-3 lg:leading-[140%] ">--}}
                    {{--                                                    They are able to help a startup like mine scale and are very--}}
                    {{--                                                    responsive to all of--}}
                    {{--                                                    our unique needs. are able to help a startup like mine scale and--}}
                    {{--                                                    are very responsive to all of--}}
                    {{--                                                    our unique needs.are able to help a startup like mine scale and--}}
                    {{--                                                    are very responsive to all of--}}
                    {{--                                                    our unique needs."</p>--}}
                    {{--                                                <span class="fontp text-gray2 font-light  text-sm  mt-5">2023-05-22--}}
                    {{--                                                    </span>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="w-full flex mt-10">--}}
                    {{--                                                <div--}}
                    {{--                                                    class="relative w-14 z-0 lgw-1/12 overflow-hidden rounded-full h-14 ">--}}
                    {{--                                                    <img--}}
                    {{--                                                        class="h-full w-full transfarm trans-all2 hover:scale-[1.1] object-cover z-10 relative "--}}
                    {{--                                                        src="../../static/images/souf.svg"/>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div--}}
                    {{--                                                    class="bg-gray/10 ml-auto w-10/12 lg:w-11/12 rounded-lg  p-2 md:p-8">--}}
                    {{--                                                    <p class=" font-bold  text-lg lg:leading-[140%] ">--}}
                    {{--                                                        Joew Harbert</p>--}}
                    {{--                                                    <p--}}
                    {{--                                                        class="fontp inline-block text-black34 font-normal  text-base my-3 lg:leading-[140%] ">--}}
                    {{--                                                        They are able to help a startup like mine scale and are very--}}
                    {{--                                                        responsive to all of--}}
                    {{--                                                        our unique needs. are able to help a startup like mine scale--}}
                    {{--                                                        and are very responsive to all of--}}
                    {{--                                                        our unique needs.are able to help a startup like mine scale--}}
                    {{--                                                        and are very responsive to all of--}}
                    {{--                                                        our unique needs."</p>--}}
                    {{--                                                    <span--}}
                    {{--                                                        class="fontp text-gray2 font-light  text-sm  mt-5">2023-05-22--}}
                    {{--                                                        </span>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="flex pt-5">--}}
                    {{--                                                <div class=" flex ms-auto">--}}
                    {{--                                                    <a href="#"--}}
                    {{--                                                       class=" w-40 btn hover:bg-orange3 transition-all group	hover:text-white transform hover:scale-[1.01] bg-white border border-orange items-center justify-center flex px-6 ">--}}
                    {{--                                                            <span--}}
                    {{--                                                                class=" text-orange group-hover:text-white font-bold text-sm ">Replay</span>--}}
                    {{--                                                    </a>--}}

                    {{--                                                </div>--}}

                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}

                    {{--                                </div>--}}
                    {{--                                <div class="w-full pt-10  pb-10 flex justify-between">--}}


                    {{--                                    <div class="relative w-14 z-0  overflow-hidden rounded-full h-14 ">--}}
                    {{--                                        <img--}}
                    {{--                                            class="h-full w-full  transfarm trans-all2 hover:scale-[1.1] object-cover z-10 relative "--}}
                    {{--                                            src="../../static/images/souf.svg"/>--}}


                    {{--                                    </div>--}}
                    {{--                                    <div class="w-10/12 lg:w-11/12 ">--}}
                    {{--                                            <textarea--}}
                    {{--                                                class="bg-gray/10 rounded-[15px] px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none border border-[#DFDFDF] focus:border-orange focus:ring-orange3/50 block sm:text-sm focus:ring-1  min-h-[250px] h-auto py-3"--}}
                    {{--                                                rows="3" placeholder="Abc ...."></textarea>--}}
                    {{--                                        <a href="#"--}}
                    {{--                                           class=" btn group w-2/12 ms-auto mt-3 h-12 hover:bg-orange3 transition-all	 transform hover:scale-[1.01] items-center hover:px-6 justify-center flex px-6">--}}
                    {{--                                            <div>--}}
                    {{--                                                    <span--}}
                    {{--                                                        class=" text-white  group-hover:text-red font-semibold text-sm ">send</span>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div id="fourth" class="hidden  p-6 bg-[#f5f5f5]">--}}
                    {{--                                <div title="Resources"--}}
                    {{--                                     class="w-full h-64 flex flex-col items-center justify-center">--}}

                    {{--                                    <h3 class="text-gray2 font-bold text-center text-3xl"> Congratulations !!</h3>--}}
                    {{--                                    <button--}}
                    {{--                                        class=" mx-auto hover:bg-orange3 transition-all	 transform hover:scale-[1.01] btn items-center justify-center flex my-4 px-6">--}}
                    {{--                                        <span class=" text-white font-bold text-sm ">Download Certificate </span>--}}
                    {{--                                    </button>--}}

                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let tabsContainer2 = document.querySelector("#tabs2");

        let tabTogglers2 = tabsContainer2.querySelectorAll("#tabs2 a");


        tabTogglers2.forEach(function (toggler) {
            toggler.addEventListener("click", function (e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents2 = document.querySelector("#tab-contents2");

                for (let i = 0; i < tabTogglers2.length; i++) {
                    tabTogglers2[i].classList.remove("text-orange", "border-b-2");
                    tabContents2.children[i].classList.remove("hidden");
                    if ("#" + tabContents2.children[i].id === tabName) {
                        continue;
                    }
                    tabContents2.children[i].classList.add("hidden");

                }
                e.target.classList.add("text-orange", "border-b-2");
            });
        });
    </script>
    <script src="{{ asset('website/js/all.js') }}"></script>
@endsection
