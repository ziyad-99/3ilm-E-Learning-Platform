@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/allSubscriptions.subscription_panel') }}
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl  lg:leading-[120%] ">
                <span>{{ trans('admin/allSubscriptions.subscription_panel') }}</span>
            </h4>
            <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">

                <div class="w-full flex items-stretch flex-wrap ">

                    <div class=" w-full md:w-4/12  md:px-5 mb-5 md:mb-0">
                        <div class="border border-[#DFDFDF] p-3 rounded-xl">

                            <div class="w-20 h-20 mt-10 mx-auto overflow-hidden rounded-full bg-gray/50 ">
                                <img id='output' class=" object-cover w-full h-full imagereader"
                                     src="{{ asset('images/profiles/'.$subscription->student->photo) }}"
                                     alt="logo"/>
                            </div>
                            <p class="font-bold text-black34 text-center mt-4  text-xl ">{{ $subscription->student->lastName }}
                                , {{ $subscription->student->firstName }}</p>
                            <p class="font-medium text-gray3 text-center   text-base ">{{ $subscription->student->email }}</p>
                            <div class="mb-3">
                                {{--                                    <p class="font-bold text-black34 text-start mb-3  text-base mt-5 ">--}}
                                {{--                                        Name: <span class="font-normal">{{ $subscription->student->firstName }}</span></p>--}}
                                <p class="font-bold text-black34 text-start mb-3  text-base  ">
                                    {{ trans('admin/allSubscriptions.phone') }} <span
                                        class="font-normal">{{ $subscription->student->phone }}</span></p>
                                <p class="font-bold text-black34 text-start mb-3  text-base  ">
                                    {{ trans('admin/allSubscriptions.email_') }} <span
                                        class="font-normal">{{ $subscription->student->email }}</span></p>
                                <p class="font-bold text-black34 text-start mb-3  text-base  ">
                                    {{ trans('admin/allSubscriptions.address') }} <span
                                        class="font-normal">{{ $subscription->student->address }}</span>
                                </p>
                                <p class="font-bold text-black34 text-start mb-3  text-base  ">
                                    {{ trans('admin/allSubscriptions.facebook') }} <span
                                        class="font-normal">{{ $subscription->student->facebook }}</span></p>
                            </div>
                        </div>
                        <p class="font-bold text-black34 mt-4  text-base ">{{ trans('admin/allSubscriptions.bio') }}</p>
                        <div class="border border-[#DFDFDF] mt-5 p-3 rounded-xl">
                            <p class="font-normal text-black34 text-start mb-3  text-base ">
                                {{ $subscription->student->bio }}
                            </p>
                        </div>

                    </div>
                    <div class=" w-full md:w-8/12 md:px-5">
                        <div class="border border-[#DFDFDF] h-full rounded-xl">
                            <div class="p-5 border-b border-[#DFDFDF]">
                                <p class="font-bold text-black34 text-xl">{{ trans('admin/allSubscriptions.subscription_request') }}</p>
                                <div class=" flex-wrap flex w-full mt-4">
                                    <div class="w-full md:w-4/12 mb-2 md:mb-0 md:pe-2">
                                        <p class="font-bold text-black34  text-center mb-3 ">{{ trans('admin/allSubscriptions.level') }}</p>
                                        <div class="w-full">
                                            <p class="font-medium text-gray3 text-center text-base">
                                                {{ $subscription->courseable->level }}
                                            </p>
                                        </div>
                                    </div>

                                    @if($subscription->courseable->branch != null)
                                        <div class=" w-full md:w-4/12 mb-2 md:mb-0 md:px-2">
                                            <p class="font-bold text-black34  text-center mb-3 ">{{ trans('admin/allSubscriptions.branch') }}</p>
                                            <div class="w-full">
                                                <p class="font-medium text-gray3 text-center text-base">
                                                    {{ $subscription->courseable->branch }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                    <div class=" w-full md:w-4/12 mb-2 md:mb-0 md:ps-2">
                                        <p class="font-bold text-black34  text-center mb-3 ">{{ trans('admin/allSubscriptions.subject') }}</p>
                                        <div class="w-full">
                                            <p class="font-medium text-gray3 text-center   text-base ">
                                                {{ $subscription->courseable->title }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class=" flex-wrap flex w-full mt-4">
                                    <div class="w-full md:w-4/12 mb-2 md:mb-0 md:pe-2">
                                        <p class="font-bold text-black34  text-center mb-3 ">{{ trans('admin/allSubscriptions.instructor') }}</p>
                                        <div class="w-full">
                                            <p class="font-medium text-gray3 text-center   text-base ">
                                                {{ $subscription->courseable->instructor->lastName }}
                                                , {{ $subscription->courseable->instructor->firstName }}
                                            </p>
                                        </div>
                                    </div>


                                    <div class=" w-full md:w-4/12 mb-2 md:mb-0 md:px-2">
                                        @can('accept_course_subscription')
                                            <p class="font-bold text-black34  text-center mb-3 ">{{ trans('admin/admin.Group') }}</p>
                                        <form action="{{ route('admin.approveSubscription') }}" method="post">
                                            @csrf

                                            <input hidden name="subscription_id" value="{{ $subscription->id }}">
                                            <select class="inputtext" name="group_id" required>
                                                <option value="" selected
                                                        disabled>{{ trans('admin/admin.SelectGroup') }}</option>
                                                @foreach($subscription->courseable->groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                        @endcan

                                    </div>

                                    <div class=" w-full md:w-4/12 mb-2 md:mb-0 md:px-2">
                                        <p class="font-bold text-black34  text-center mb-3 ">{{ trans('admin/admin.GroupSelected') }}</p>
                                        <div class="w-full">
                                            <p class="font-medium text-gray3 text-center   text-base ">
                                                @if($subscription->group)
                                                    {{ $subscription->group->name }}
                                                @else
                                                    /
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class=" flex-wrap flex w-full mt-4">
                                    <p class="font-bold text-black34 text-start mb-3 md:w-6/12 text-center mt-5 ">
                                        {{ trans('admin/allSubscriptions.start_date') }}
                                        <span class="font-bold text-[#5cb85c] fontp">
                                            {{ $subscription->courseable->startDate }}
                                        </span>
                                    </p>
                                </div>
                            </div>

                            @can('accept_course_subscription')

                            <button
                                class=" btn mx-auto hover:bg-orange3 items-center justify-center transform hover:scale-105 mt-5 flex px-10">
                                    <span
                                        class=" text-white font-bold text-sm ">{{ trans('admin/allSubscriptions.approve_subscription') }}</span>
                            </button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
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
@endsection
