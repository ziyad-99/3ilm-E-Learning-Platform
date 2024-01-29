@extends('website.layouts.master')


@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">Course Title</h3>

                <div class=" bg-white  boxshadow2 rounded px-0 py-6 mt-10 w-full mx-auto ">
                    <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">
                        <p class="font-bold text-center  text-2xl">Quiz Name</p>

                        <div class="flex items-center mb-2 justify-between">
                            <p class="font-semibold fontp text-[15px] pb-2">Total Questions: 15</p>
                            <div>
                                <div
                                    class="border border-[#E5E8EC] font-semibold text-orange rounded text-[15px] p-1 m-1 px-3.5 flex justify-center items-center">
                                    <span class="fontp" id="demo">20:00</span></div>

                            </div>
                        </div>

                    </div>
                    <div class=" py-10 px-4 md:px-20 border-b border-[#E2E2E2]/50 border-solid">
                        <div id="cMultipleAdd" class=" py-10 px-4">
                            <div class="w-full">

                                <div class=" w-full mt-5">
                                    <p class="font-semibold text-black/80 mb-3 text-base ">Question 1</p>
                                    <p class="font-semibold text-black  text-xl ">Quizdafafasdfafsafd</p>
                                </div>
                                <div class="w-full mb-2 mt-10 lg:w-8/12  ">


                                    <div class=" w-full mt-5 flex items-center ">

                                        <label class="containerRadio ms-5 sss"> Answer 1
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class=" w-full mt-5 flex items-center ">

                                        <label class="containerRadio ms-5 sss">Answer 2
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class=" w-full mt-5 flex items-center ">

                                        <label class="containerRadio ms-5 sss">Answer 3
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="flex w-full pt-5">
                                    <div class=" flex flex-wrap w-full">
                                        <button data-back="1" type="button" onclick="backquiz(this,1)"
                                                class=" w-full mb-3 md:mb-0 md:w-40 btn me-3 hidden bg-white text-orange group hover:text-white border border-orange hover:border-orange3 items-center  justify-center hover:bg-orange3 cursor-pointer flex px-6 md:me-6">
                                            <span
                                                class="text-orange group-hover:text-white font-bold text-sm  ">Back</span>
                                        </button>
                                        <button data-id="1" data-next="1" type="button" onclick="forwadquiz(1,this)"
                                                class=" w-full mb-3 md:mb-0  md:w-40 btn bg-white text-orange group hover:text-white border border-orange hover:border-orange3 items-center  justify-center hover:bg-orange3 cursor-pointer flex px-6 md:me-6">
                                        <span
                                            class="text-orange group-hover:text-white font-bold text-sm  ">forwed</span>
                                        </button>

                                    </div>
                                </div>

                            </div>
                            <div class="w-full hidden">

                                <div class=" w-full mt-5">
                                    <p class="font-semibold text-black/80 mb-3 text-base ">Question 2</p>
                                    <p class="font-semibold text-black  text-xl ">Quizdafafasdfafsafd</p>
                                </div>
                                <div class="w-full mb-2 mt-10 lg:w-8/12  ">


                                    <div class=" w-full mt-5 flex items-center ">

                                        <label class="containerRadio ms-5 sss"> Answer 1
                                            <input type="radio" name="radio-2">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class=" w-full mt-5 flex items-center ">

                                        <label class="containerRadio ms-5 sss">Answer 2
                                            <input type="radio" name="radio-2">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class=" w-full mt-5 flex items-center ">

                                        <label class="containerRadio ms-5 sss">Answer 3
                                            <input type="radio" name="radio-2">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="flex w-full pt-5">
                                    <div class=" flex flex-wrap w-full">
                                        <button data-back="2" type="button" onclick="backquiz(this,2)"
                                                class=" w-full mb-3 md:mb-0 md:w-40 btn me-3 bg-white text-orange group hover:text-white border border-orange hover:border-orange3 items-center  justify-center hover:bg-orange3 cursor-pointer flex px-6 md:me-6">
                                            <span
                                                class="text-orange group-hover:text-white font-bold text-sm  ">Back</span>
                                        </button>
                                        <button data-id="2" data-next="2" type="button" onclick="forwadquiz(2,this)"
                                                class=" w-full mb-3 md:mb-0  md:w-40 btn bg-white text-orange group hover:text-white border border-orange hover:border-orange3 items-center  justify-center hover:bg-orange3 cursor-pointer flex px-6 md:me-6">
                                        <span
                                            class="text-orange group-hover:text-white font-bold text-sm  ">forwed</span>
                                        </button>

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="flex flex-wrap px-4 pt-5">
                        <div class=" flex w-full  flex-wrap lg:pe-4 ms-auto">
                            <div
                                class="w-full order-2 md:order-1 mb-4 md:w-40 btn bg-white border  ms-auto border-orange hover:bg-orange/50 cursor-pointer items-center justify-center flex px-6 md:me-4">
                                <span class=" text-orange font-bold text-sm ">Cancel</span>
                            </div>
                            <div
                                class=" w-full mb-4 order-1 md:order-2 md:w-40 btn items-center justify-center hover:bg-orange3 cursor-pointer flex px-6">
                                <span class=" text-white font-bold text-sm ">Finish</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        let cAdd = document.getElementById("cMultipleAdd");

        function backquiz(d, e) {
            d.parentNode.parentNode.parentNode.classList.add("hidden");
            d.parentNode.parentNode.parentNode.previousElementSibling.classList.remove("hidden");

            if (2 == e) {
                document.querySelector(`[data-back="${e - 1}"]`).classList.add("hidden");
            }

        }

        function forwadquiz(e, d) {

            d.parentNode.parentNode.parentNode.classList.add("hidden");
            d.parentNode.parentNode.parentNode.nextElementSibling.classList.remove("hidden");
            if (cAdd.childElementCount - 1 == e) {
                document.querySelector(`[data-next="${e + 1}"]`).classList.add("hidden");
            }
        }

        // time here
        let countDownDate = new Date("Jan 3, 2024 15:37:25").getTime();

        let x = setInterval(function () {

            let now = new Date().getTime();

            let distance = countDownDate - now;


            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("demo").innerHTML =
                minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection
