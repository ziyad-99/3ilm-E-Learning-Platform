@extends('website.admin.layouts.master')

@section('title')
    Replay
@endsection

@section('content')

    <div>

        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl  lg:leading-[120%] ">
                <span>{{ trans('admin/contact_us.reply_on_message') }}</span>
            </h4>
            <form class="w-full" action="{{ route('admin.reply') }}" method="post">
                @csrf
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex flex-wrap ">
                        <div class=" w-full lg:w-8/12 ">
                            <div class=" flex-wrap flex w-full mt-4">
                                <div class="w-full md:w-4/12 pe-2">
                                    <p class="font-medium text-gray3  text-sm ">{{ trans('admin/contact_us.email') }}</p>
                                    <input class="inputtext fontp" type="text" name="email"
                                           placeholder="{{ trans('admin/contact_us.email') }}" value="{{$contact_us->email}}"/>
                                </div>
                                <div class=" w-full md:w-4/12 px-2">
                                    <p class="font-medium text-gray3  text-sm ">{{ trans('admin/contact_us.name') }}</p>
                                    <input class="inputtext fontp" type="text" name="name"
                                           placeholder="{{ trans('admin/contact_us.name') }}" value="{{$contact_us->name}}"/>
                                </div>
                                <div class=" w-full md:w-4/12 ps-2">
                                    <p class="font-medium text-gray3  text-sm ">{{ trans('admin/contact_us.subject') }}</p>
                                    <input class="inputtext fontp" type="text" name="subject"
                                           placeholder="{{ trans('admin/contact_us.subject') }}" value="{{$contact_us->subject}}"/>
                                </div>
                            </div>

                            <div class="w-full mt-4">
                                <p class="font-medium text-gray3  text-sm ">{{ trans('admin/contact_us.reply_on_message') }}</p>
                                <textarea
                                    class="inputtext rounded-[15px] px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none  block sm:text-sm focus:ring-1  min-h-[250px] h-auto py-3"
                                    rows="3"
                                    placeholder="{{ trans('admin/contact_us.reply_on_message') }}"
                                    name="message"></textarea>
                            </div>
                        </div>

                    </div>
                    <button type="submit"
                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class=" text-white font-bold text-sm ">{{ trans('admin/contact_us.reply') }}</span>
                    </button>
                </div>
            </form>

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
@endsection
