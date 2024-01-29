@extends('website.layouts.master')

@section('title')
    {{ trans('website/website.Take quiz') }}
@endsection

@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">{{ $quiz->session->courseable->title }}</h3>

                <div class=" bg-white  boxshadow2 rounded px-0 py-6 mt-10 w-full mx-auto ">
                    <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">
                        <p class="font-bold text-center  text-2xl">{{ $quiz->quizName }}</p>

                        <div class="flex items-center mb-2 justify-between">
                            <p class="font-semibold fontp text-[15px] pb-2">
                                Total Questions: {{ $quiz->totalQuestions }}</p>
                            <div>
                                @php
                                    $time = explode(':',$quiz->duration);
                                @endphp
                                <div
                                    class="border border-[#E5E8EC] font-semibold text-orange rounded text-[15px] p-1 m-1 px-3.5 flex justify-center items-center">
                                    <h4 class="timer"></h4>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class=" py-10 px-4 md:px-20 border-b border-[#E2E2E2]/50 border-solid">
                        <div id="cMultipleAdd" class=" py-10 px-4">
                            <div class="w-full">
                                <form id="quizForm" action="{{ route('student.uploadQuiz') }}" method="post">
                                    @csrf
                                    @if($quiz->quizType === 'true/false')
                                        @foreach($quiz->questions as $question)
                                            <input type="text" name="quiz_id" value="{{ $question->quiz->id }}"
                                                   hidden required>

                                            <div class=" w-full mt-5">
                                                <p class="font-semibold text-black/80 mb-3 text-base ">
                                                    {{ trans('website/website.Question') }} {{ $loop->iteration }}:</p>
                                                <p class="font-semibold text-black  text-xl ">
                                                    {{ $question->question }}
                                                </p>
                                            </div>
                                            <div class="w-full mb-2 mt-10 lg:w-8/12  ">
                                                <div class=" w-full mt-5 flex items-center ">
                                                    <label
                                                        class="containerRadio ms-5 sss">{{ trans('website/website.true') }}
                                                        <input type="radio" name="answer{{ $question->id }}"
                                                               value="true">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class=" w-full mt-5 flex items-center">
                                                    <label
                                                        class="containerRadio ms-5 sss">{{ trans('website/website.false') }}
                                                        <input type="radio" name="answer{{ $question->id }}"
                                                               value="false">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>

                                        @endforeach
                                    @else
                                        @foreach($quiz->questions as $question)
                                            <div class=" w-full mt-5">
                                                <p class="font-semibold text-black/80 mb-3 text-base ">
                                                    {{ trans('website/website.Question') }} {{ $loop->iteration }}</p>
                                                <p class="font-semibold text-black  text-xl ">
                                                    {{ $question->question }}
                                                </p>
                                            </div>

                                            <input type="text" name="quiz_id" value="{{ $question->quiz->id }}"
                                                   hidden required>

                                            <div class="w-full mb-2 mt-10 lg:w-8/12  ">
                                                <div class=" w-full mt-5 flex items-center ">

                                                    <label class="containerRadio ms-5 sss">{{ $question->answerA }}
                                                        <input type="radio" name="answer{{ $question->id }}"
                                                               value="answerA">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class=" w-full mt-5 flex items-center ">

                                                    <label class="containerRadio ms-5 sss">{{ $question->answerB }}
                                                        <input type="radio" name="answer{{ $question->id }}"
                                                               value="answerB">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class=" w-full mt-5 flex items-center ">

                                                    <label class="containerRadio ms-5 sss">{{ $question->answerC }}
                                                        <input type="radio" name="answer{{ $question->id }}"
                                                               value="answerC">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap px-4 pt-5">
                        <div class=" flex w-full  flex-wrap lg:pe-4 ms-auto">
                            <div
                                class=" w-full mb-4 order-1 md:order-2 md:w-40 btn items-center justify-center hover:bg-orange3 cursor-pointer flex px-6">
                                <button type="submit"><span
                                        class=" text-white font-bold text-sm ">{{ trans('website/website.finish') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var time = @json($time);
            var seconds = parseInt(time[2]);
            var minutes = parseInt(time[1]);
            var hours = parseInt(time[0]);

            var startTime = localStorage.getItem('startTime');
            var elapsedTime = localStorage.getItem('elapsedTime');

            if (startTime && elapsedTime) {
                var storedTime = new Date(parseInt(startTime));
                var now = new Date();
                var timeDifference = now - storedTime;
                var remainingTime = parseInt(elapsedTime) - Math.floor(timeDifference / 1000);

                if (remainingTime > 0) {
                    hours = Math.floor(remainingTime / 3600);
                    minutes = Math.floor((remainingTime % 3600) / 60);
                    seconds = remainingTime % 60;
                } else {
                    // Remove startTime and elapsedTime from localStorage
                    localStorage.removeItem('startTime');
                    localStorage.removeItem('elapsedTime');
                    $('#quizForm').submit();
                }
            }

            function startTimer() {
                var timer = setInterval(() => {
                    if (hours == 0 && minutes == 0 && seconds == 0) {
                        clearInterval(timer);
                        // Remove startTime and elapsedTime from localStorage
                        localStorage.removeItem('startTime');
                        localStorage.removeItem('elapsedTime');
                        $('#quizForm').submit();
                    }

                    if (seconds <= 0) {
                        minutes--;
                        seconds = 59;
                    }

                    if (minutes <= 0 && hours != 0) {
                        hours--;
                        minutes = 59;
                        seconds = 59;
                    }

                    let tempHours = hours.toString().length > 1 ? hours : '0' + hours;
                    let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                    let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                    $('.timer').text(tempHours + 'H ' + tempMinutes + 'M ' + tempSeconds + 's');

                    seconds--;

                    // Save start time and elapsed time to localStorage
                    localStorage.setItem('startTime', new Date().getTime());
                    localStorage.setItem('elapsedTime', ((hours * 3600) + (minutes * 60) + seconds));
                }, 1000);
            }

            startTimer();

            // quiz form submit listener
            $('#quizForm').submit(function () {
                // Remove startTime and elapsedTime from localStorage
                localStorage.removeItem('startTime');
                localStorage.removeItem('elapsedTime');
            });
        });


        {{--$(document).ready(function () {--}}
        {{--    var time = @json($time);--}}
        {{--    // console.log(time);--}}
        {{--    $('.timer').text(time[0] + ':' + time[1] + ':' + time[2]);--}}

        {{--    var seconds = parseInt(time[2]);--}}
        {{--    var minutes = parseInt(time[1]);--}}
        {{--    var hours = parseInt(time[0]);--}}

        {{--    var timer = setInterval(() => {--}}

        {{--        if (hours == 0 && minutes == 0 && seconds == 0) {--}}
        {{--            clearInterval(time);--}}
        {{--            $('#quizForm').submit();--}}
        {{--        }--}}
        {{--        // console.log(hours + "-:-" + minutes + "-:-" + seconds);--}}

        {{--        if (seconds <= 0) {--}}
        {{--            minutes--;--}}
        {{--            seconds = 59;--}}
        {{--        }--}}

        {{--        if (minutes <= 0 && hours != 0) {--}}
        {{--            hours--;--}}
        {{--            minutes = 59;--}}
        {{--            seconds = 59;--}}
        {{--        }--}}

        {{--        let tempHours = hours.toString().length > 1 ? hours : '0' + hours;--}}
        {{--        let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;--}}
        {{--        let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;--}}

        {{--        $('.timer').text(tempHours + ':' + tempMinutes + ':' + tempSeconds);--}}

        {{--        seconds--;--}}
        {{--    }, 1000);--}}
        {{--});--}}
    </script>

@endsection
