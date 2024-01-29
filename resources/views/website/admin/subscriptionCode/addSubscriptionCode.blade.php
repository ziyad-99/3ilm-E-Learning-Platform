@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.newSubscriptionCode') }}
@endsection

@section('content')
    <div class="bg-[#f5f5f5]">
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/admin.newSubscriptionCode') }}</span>
            </h4>


            <form class="w-full" action="{{ route('admin.storeSubscriptionCode') }}" method="post">
                @csrf
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex flex-wrap ">
                        <div class=" w-full md:w-7/12">
                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2  text-sm">{{ trans('admin/admin.specificAmount') }} {{ trans('admin/admin.(DA)') }}</p>
                                <input class="inputtext fontp" type="text" name="specificBalance" id="balanceInput"
                                       placeholder="{{ trans('admin/admin.specificAmount') }}" required/>
                            </div>

                            <div class="w-full mt-10 radio-buttons" style="display: flex;
                                    justify-content: space-between; /* Adjust as needed */
                                    align-items: center; /* Align vertically if needed */
                                    flex-wrap: nowrap; /* Prevent wrapping if container is smaller */">
                                <p class="font-semibold text-black2 mb-2  text-sm">{{ trans('admin/admin.selectTheAmount') }} {{ trans('admin/admin.(DA)') }}</p>
                                <label class="containerRadio">500 {{ trans('admin/admin.(DA)') }}
                                    <input type="radio" name="amount" value="500" required>
                                    <span class="checkmark"></span>
                                </label>

                                <label class="containerRadio">1000 {{ trans('admin/admin.(DA)') }}
                                    <input type="radio" name="amount" value="1000" required>
                                    <span class="checkmark"></span>
                                </label>

                                <label class="containerRadio">2000 {{ trans('admin/admin.(DA)') }}
                                    <input type="radio" name="amount" value="2000" required>
                                    <span class="checkmark"></span>
                                </label>

                                <label class="containerRadio">4000 {{ trans('admin/admin.(DA)') }}
                                    <input type="radio" name="amount" value="4000" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2  text-sm">{{ trans('admin/admin.QuantityOfCodes') }}</p>
                                <input class="inputtext fontp" type="text" name="codesQuantity"
                                       placeholder="{{ trans('admin/admin.QuantityOfCodes') }}" required/>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class=" text-white font-bold text-sm">{{ trans('admin/admin.GenerateCode') }}</span>
                    </button>
                </div>
            </form>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const balanceInput = document.getElementById('balanceInput');
                    const radioButtons = document.querySelectorAll('input[type="radio"][name="amount"]');

                    balanceInput.addEventListener('input', function () {
                        if (this.value.trim() !== '') {
                            radioButtons.forEach(function (radio) {
                                radio.checked = false;
                                radio.removeAttribute('required', 'required');
                            });
                        }
                    });

                    radioButtons.forEach(function (radio) {
                        radio.addEventListener('change', function () {

                            balanceInput.value = ''; // Clear the balance input
                            balanceInput.removeAttribute('required', 'required');

                            radioButtons.forEach(function (radio) {
                                radio.setAttribute('required', 'required');
                            });
                        });
                    });
                });
            </script>
        </div>
    </div>
    </div>

    <div onclick="openNav()"
         class="  gg4255 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[10] fixed"></div>
    <div class="  gg422 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[1000] fixed">
        <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="72.5" cy="72.5" r="69.5" stroke="#37F807" stroke-width="6"/>
            <path d="M44 74.7767L61.4349 92L108 46" stroke="#37F807" stroke-width="10.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </div>
@endsection


@section('js')
    <script>
        addEventListener("DOMContentLoaded", (event) => {


            function openPop(gg42) {
                document.querySelector(gg42).classList.add('flex');
                document.querySelector(gg42).classList.remove('hidden');
                document.body.classList.add("overflow-hidden");
                document.body.style.height = "100vh";
                document.body.style.position = "fixed";
                document.body.style.width = "100%";
                gg22.classList.add("block");
                gg22.classList.remove("hidden");
            }

            function closePop(gg42) {
                document.querySelector(gg42).classList.remove('flex');
                document.querySelector(gg42).classList.add('hidden');
                document.body.classList.remove("overflow-hidden");
                document.body.style.height = "100%";
                document.body.style.position = "relative";
                document.body.style.width = "100%";

                gg22.classList.remove("block");
                gg22.classList.add("hidden");


            }
        });
        let gg22 = document.querySelector(".gg422");

        function openNav() {
            document.querySelector("#sidebaradmin").classList.toggle('hidden');
            document.querySelector(".gg4255").classList.toggle('hidden');
        }

        function removedone() {
            gg22.classList.remove('flex');
            gg22.classList.add('hidden');

        }

        function Done() {
            gg22.classList.add('flex');
            gg22.classList.remove('hidden');
            setTimeout(removedone, 2000);
        }

        let qqqs = document.querySelectorAll(".qqq");

        function setMouse(e, d) {
            if (e) {
                d.classList.remove("md:w-20");
                d.classList.add("w-56");
                d.style.width = "14rem"
                for (let i = 0; i < qqqs.length; i++) {
                    qqqs[i].classList.remove("md:w-0");
                    qqqs[i].classList.add("w-36");
                }

            } else {
                d.classList.remove("w-56")
                d.classList.add("md:w-20")
                d.style.width = "5rem"
                for (let i = 0; i < qqqs.length; i++) {
                    qqqs[i].classList.add("md:w-0");
                    qqqs[i].classList.remove("w-36");
                }
            }
        }

        function dropdown(name) {
            document.getElementById(name).classList.toggle("show");
        }

        let arr = document.querySelectorAll(".select1");

        window.addEventListener('click', function (e) {

            for (let i = 0; i < arr.length; i++) {
                if (arr[i].parentElement.children[0].contains(e.target)) {
                } else {
                    arr[i].classList.remove('show')

                }
            }


        });

        function dropdownfun(name) {
            name.nextElementSibling.classList.toggle("show");

        }

        function dropdownfun2(name) {
            document.getElementById(name).classList.toggle("show");

        }

    </script>
    <script src="{{ asset('website/admin/js/choices.min.js') }}"></script>
    <script src="{{ asset('website/admin/js/choices.js') }}"></script>
@endsection
