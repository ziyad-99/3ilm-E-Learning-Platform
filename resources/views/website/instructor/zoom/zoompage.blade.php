@extends('website.layouts.master')

@section('title')
    {{ $group->courseable->title }}
@endsection

@section('content')

    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">{{ $group->courseable->title }}</h3>
                @if(Schema::hasColumn($group->courseable->getTable(), 'branch'))
                    <p class="font-bold fontp text-center mt-4 text-xl">{{ $group->courseable->year }}
                        - {{ $group->courseable->level }}</p>
                    <p class="font-medium fontp text-center mt-3 text-base">{{ $group->name }}</p>
                    <p class="font-medium fontp text-orange text-center mt-2 text-base">{{ $group->courseable->branch }}</p>
                @else
                    <p class="font-medium fontp text-center mt-3 text-base">{{ $group->name }}</p>
                    <p class="font-medium fontp text-orange text-center mt-2 text-base">{{ $group->courseable->level }}</p>
                @endif
                <div class="w-full md:w-5/12 mt-5 mx-auto px-20 text-center ">
                    <p class="text-black text-base font-medium mb-2 fontp">{{ $group->sessions->count() }}
                        /{{ $group->courseable->numberSessions }}</p>
                    <div class=" bg-[#D9D9D9] h-3 w-full rounded-full">
                        <div class="bg-orange rounded-full h-full"
                             style="width:{{ (($group->sessions->count() / $group->courseable->numberSessions) * 100) > 100 ? 100 : (($group->sessions->count() / $group->courseable->numberSessions) * 100) }}%"></div>
                    </div>
                </div>

                <div class=" bg-white  boxshadow2 rounded px-0 py-6 mt-10 w-full mx-auto ">
                    <div class="  grid grid-cols-1 gap-4 md:gap-2 md:grid-cols-3 px-6">
                        <div class=" w-full md:col-span-2">
                            <div class="h-[450px] bg-[#f5f5f5] w-full flex justify-center items-center"
                                 style="border-radius: 2%">

                                @if($group->sessions->last()->status == 1)
                                    {{--                                    <a class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10"--}}
                                    {{--                                       href="{{ route('instructor.startMeeting', ['courseType' => $courseType, 'session_id' => $group->sessions->last()->id ]) }}"><span--}}
                                    {{--                                            class=" text-white font-bold text-sm">{{ trans('website/zoom/zoomPage.start_enter') }} {{ $group->sessions->last()->name }}</span>--}}
                                    {{--                                    </a>--}}

                                    <button id="myButton"
                                            class="btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                                            <span
                                                class=" text-white font-bold text-sm">
                                                {{ trans('website/zoom/zoomPage.start_enter') }} {{ $group->sessions->last()->name }}
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
                                            document.getElementById('myIframe').src = @json(route('instructor.startMeeting', ['courseType' => $courseType, 'session_id' => $group->sessions->last()->id ]));
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
                                    {{--                                       href="{{ route('student.recordeLink', ['meeting_id' => $group->sessions->last()->meetingID ]) }}"><span--}}
                                    {{--                                            class=" text-white font-bold text-sm">{{ trans('website/zoom/zoomPage.session_end') }}</span>--}}
                                    {{--                                    </a>--}}

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
                                            document.getElementById('myIframe').src = @json(route('student.recordeLink', ['meeting_id' => $group->sessions->last()->meetingID ]));
                                            document.getElementById('myIframe').style.display = 'block';
                                        }
                                    </script>
                                @endif
                            </div>
                        </div>
                        <div class=" w-fullpy-4 ps-2">
                            @forelse($group->sessions as $session)
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{--    <script>--}}
    {{--        var frame = document.getElementById("frame");--}}

    {{--        var btn1 = document.getElementById("btn1");--}}
    {{--        var btn2 = document.getElementById("btn2");--}}
    {{--        var btn3 = document.getElementById("btn3");--}}

    {{--        btn1.addEventListener("click", recordeLink)--}}
    {{--        btn2.addEventListener("click", link2)--}}
    {{--        btn3.addEventListener("click", link3)--}}

    {{--        function recordeLink() {--}}

    {{--            document.getElementById('btn1').style.visibility = 'hidden';--}}
    {{--            document.getElementById('frame').style.display = "none";--}}

    {{--            frame.src = "{{ route('student.recordeLink', ['meeting_id' => $course->sessions->last()->meetingID ]) }}"--}}

    {{--        }--}}

    {{--        function link2() {--}}
    {{--            frame.src = "https://pixabay.com/photo-3126513/"--}}
    {{--        }--}}

    {{--        function link3() {--}}
    {{--            frame.src = "https://pixabay.com/photo-3114729/"--}}
    {{--        }    </script>--}}
    {{--    <script>--}}


    {{--    let tabsContainer2 = document.querySelector("#tabs2");--}}

    {{--    let tabTogglers2 = tabsContainer2.querySelectorAll("#tabs2 a");--}}


    {{--    tabTogglers2.forEach(function (toggler) {--}}
    {{--    toggler.addEventListener("click", function (e) {--}}
    {{--    e.preventDefault();--}}

    {{--    let tabName = this.getAttribute("href");--}}

    {{--    let tabContents2 = document.querySelector("#tab-contents2");--}}

    {{--    for (let i = 0; i < tabTogglers2.length; i++) {--}}
    {{--    tabTogglers2[i].classList.remove("text-orange", "border-b-2");--}}
    {{--    tabContents2.children[i].classList.remove("hidden");--}}
    {{--    if ("#" + tabContents2.children[i].id === tabName) {--}}
    {{--    continue;--}}
    {{--    }--}}
    {{--    tabContents2.children[i].classList.add("hidden");--}}

    {{--    }--}}
    {{--    e.target.classList.add("text-orange", "border-b-2");--}}
    {{--    });--}}
    {{--    });--}}
    {{--    </script>--}}
    <script src="{{ asset('website/js/all.js') }}"></script>
@endsection
