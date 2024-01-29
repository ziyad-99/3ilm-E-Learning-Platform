@extends('website.layouts.master')

@section('title')
    Multiple Quiz
@endsection

@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">Instructor Panel</h3>

                <div class=" bg-white  boxshadow2 rounded-xl px-0 py-6 mt-10 w-full mx-auto ">
                    <div class=" w-full px-6 border-b pb-4 pt-4 border-[#E2E2E2] border-solid">
                        <p class="font-bold fontp text-center  text-xl">1AS Mathematics - 2nd Unit - 7th lesson</p>
                        <p class="font-medium fontp text-center mt-4 text-base">1AS - Group 3</p>
                        <p class="font-medium fontp text-orange text-center mt-4 text-base">Scientific Branch</p>


                    </div>

                    <form action="{{ route('instructor.storeQuestion') }}" method="post">
                        @csrf
                        <div class=" py-10 px-4 md:px-20">
                            <input name="quiz_id" value="{{ $quiz_id }}" hidden/>

                            <div class=" w-full mt-5">
                                <p class="font-semibold text-black text-base">{{ $quiz_id }}Question 1</p>
                                <input class="inputtext" name="question" placeholder="Enter the question"/>
                            </div>

                            <div class="w-full mb-2 mt-10 lg:w-8/12  ">
                                <div class=" w-full mt-5 flex items-center ">
                                    <input class="inputtext mt-0 w-8/12" name="answerA" placeholder="Answer A"/>

                                    <label class="containerRadio ms-5 sss">Correct Answer
                                        <input type="radio" name="answer" value="answerA">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class=" w-full mt-5 flex items-center ">
                                    <input class="inputtext mt-0 w-8/12" name="answerB" placeholder="Answer B"/>

                                    <label class="containerRadio ms-5 sss">Correct Answer
                                        <input type="radio" name="answer" value="answerB">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class=" w-full mt-5 flex items-center ">
                                    <input class="inputtext mt-0 w-8/12" name="answerC" placeholder="Answer C"/>

                                    <label class="containerRadio ms-5 sss">Correct Answer
                                        <input type="radio" name="answer" value="answerC">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex w-full pt-5">
                                <div class=" flex flex-wrap w-full">
                                    <button type="submit"
                                            class="w-full mb-3 md:mb-0 md:w-40 btn bg-white text-orange group hover:text-white border border-orange hover:border-orange3 items-center  justify-center hover:bg-orange3 cursor-pointer flex px-6 md:me-6">
                                        <span class=" text-orange group-hover:text-white font-bold text-sm ">Save &
                                            Another</span>
                                    </button>

                                    <div
                                        class=" w-full mb-3 md:mb-0 md:w-40 btn items-center justify-center hover:bg-orange3 cursor-pointer flex px-6">
                                        <span class=" text-white font-bold text-sm ">Create</span>
                                    </div>

                                    {{--                                    <div--}}
                                    {{--                                        class=" w-full mb-3 md:mb-0 md:w-40 btn items-center ms-auto justify-center hover:bg-orange3 cursor-pointer flex px-6">--}}
                                    {{--                                        <span class=" text-white font-bold text-sm ">Upload Quiz</span>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
