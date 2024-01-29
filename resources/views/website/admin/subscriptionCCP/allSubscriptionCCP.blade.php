@extends('website.admin.layouts.master')

@section('css')
    <style>
        .modal {
            z-index: 1;
            display: none;
            padding-top: 10px;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.8)
        }

        .modal-content {
            margin: auto;
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


        .modal-hover-opacity {
            opacity: 1;
            filter: alpha(opacity=100);
            -webkit-backface-visibility: hidden
        }

        .modal-hover-opacity:hover {
            opacity: 0.60;
            filter: alpha(opacity=60);
            -webkit-backface-visibility: hidden
        }


        .close {
            text-decoration: none;
            float: right;
            font-size: 24px;
            font-weight: bold;
            color: white
        }

        .container1 {
            width: 200px;
            display: inline-block;
        }

        .modal-content, #caption {

            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }


        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }
            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }

    </style>
@endsection

@section('title')
    {{ trans('admin/admin.AllCCPSubscriptions') }}
@endsection

@section('content')

    <div id="modal01" class="modal" onclick="this.style.display='none'">
        <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <div class="modal-content">
            <img id="img01" style="max-width:100%">
        </div>
    </div>

    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl  lg:leading-[120%] ">
                <span>{{ trans('admin/admin.AllCCPSubscriptions') }}</span>
            </h4>

            <div class="w-full  mb-4 max-w-full px-3 flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 d  rounded-2xl bg-clip-border">
                    <div>
                        <table class="table admin" datatable id="datatable-search-list">
                            <thead>
                            <tr class="bg-orange/30">
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Image') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/addAdmin.name') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.email') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Date') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.addBalance') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($CCPSubscriptions as $CCPSubscription)
                                <tr>
                                    <td>
                                        <a href="#"
                                           class="text-white items-center text-sm flex gap-2 font-semibold w-[100px]">
                                            <img class="h-auto  w-8 object-contain relative"
                                                 src="{{ asset('images/ccp/' . $CCPSubscription->img) }}"
                                                 onclick="onClick(this)"/>
                                            <span class=" text-black34">{{ $CCPSubscription->img }}</span>
                                        </a>
                                    </td>
                                    <td class="text-sm font-medium text-black34 fontp leading-normal">
                                        {{ $CCPSubscription->user->lastName }}, {{ $CCPSubscription->user->firstName }}
                                    </td>
                                    <td class="text-sm font-normal text-black34 fontp leading-normal">
                                        {{ $CCPSubscription->user->email }}
                                    </td>
                                    <td class="text-sm font-normal text-black34 fontp leading-normal">
                                        {{ $CCPSubscription->created_at }}
                                    </td>

                                    <td class="text-sm font-normal leading-normal">
                                        @if($CCPSubscription->status == 1)
                                            تم تعبئة المبلغ
                                        @else
                                            @can('accept_ccp_subscriptions')
                                                <form action="{{ route('admin.addBalance') }}" method="post">
                                                    @csrf
                                                    <input name="student_id" value="{{ $CCPSubscription->user->id }}"
                                                           hidden>

                                                    <input name="ccp_subscription_id" value="{{ $CCPSubscription->id }}"
                                                           hidden>

                                                    <input class="inputtext" name="balance" required
                                                           placeholder="{{ trans('admin/admin.addBalance') }}">

                                                    <button type="submit"
                                                            class=" w-full btn items-center mt-6 h-12 hover:bg-orange3 transition-all	 transform hover:scale-[1.01] justify-center flex px-6">
                                                        {{--                                                    <span class=" text-white font-bold text-sm ">add balance</span>--}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                                                             height="24"
                                                             x="0" y="0" viewBox="0 0 16 16"
                                                             style="enable-background:new 0 0 512 512"
                                                             xml:space="preserve"
                                                             class=""><g>
                                                                <path
                                                                    d="M14.567 5.521a.5.5 0 0 0-.336.622A6.493 6.493 0 1 1 9.857 1.77a.5.5 0 0 0 .286-.958 7.493 7.493 0 1 0 5.046 5.046.499.499 0 0 0-.622-.336z"
                                                                    fill="#000000" opacity="1" data-original="#000000"
                                                                    class=""></path>
                                                                <path
                                                                    d="M7.5 6.5h2a.5.5 0 0 0 0-1h-1V5a.5.5 0 0 0-1 0v.5a1.5 1.5 0 0 0 0 3h1a.5.5 0 0 1 0 1h-2a.5.5 0 0 0 0 1h1v.5a.5.5 0 0 0 1 0v-.5a1.5 1.5 0 0 0 0-3h-1a.5.5 0 0 1 0-1zM15 2.5h-1.5V1a.5.5 0 0 0-1 0v1.5H11a.5.5 0 0 0 0 1h1.5V5a.5.5 0 0 0 1 0V3.5H15a.5.5 0 0 0 0-1z"
                                                                    fill="#000000" opacity="1" data-original="#000000"
                                                                    class=""></path>
                                                            </g></svg>

                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                    </td>

                                    <td class="text-sm font-normal leading-normal">
                                        <div class="relative text-sm group justify-end gap-2 flex font-semibold ">
                                            @can('delete_ccp_subscriptions')
                                                <a id="deleteCCPSubscription" href="{{ route('admin.deleteCCPSubscription', ['ccp_subscription_id' => $CCPSubscription->id]) }}"
                                                   type="button"
                                                   class=" rounded-2xl w-10 h-10 items-center justify-center flex  bg-red-500/20">
                                                    <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24"
                                                         fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M21 6.73C20.98 6.73 20.95 6.73 20.92 6.73C15.63 6.2 10.35 6 5.12 6.53L3.08 6.73C2.66 6.77 2.29 6.47 2.25 6.05C2.21 5.63 2.51 5.27 2.92 5.23L4.96 5.03C10.28 4.49 15.67 4.7 21.07 5.23C21.48 5.27 21.78 5.64 21.74 6.05C21.71 6.44 21.38 6.73 21 6.73Z"
                                                            fill="#ef4444"/>
                                                        <path
                                                            d="M8.5 5.72C8.46 5.72 8.42 5.72 8.37 5.71C7.97 5.64 7.69 5.25 7.76 4.85L7.98 3.54C8.14 2.58 8.36 1.25 10.69 1.25H13.31C15.65 1.25 15.87 2.63 16.02 3.55L16.24 4.85C16.31 5.26 16.03 5.65 15.63 5.71C15.22 5.78 14.83 5.5 14.77 5.1L14.55 3.8C14.41 2.93 14.38 2.76 13.32 2.76H10.7C9.64 2.76 9.62 2.9 9.47 3.79L9.24 5.09C9.18 5.46 8.86 5.72 8.5 5.72Z"
                                                            fill="#ef4444"/>
                                                        <path
                                                            d="M15.21 22.75H8.79C5.3 22.75 5.16 20.82 5.05 19.26L4.4 9.19C4.37 8.78 4.69 8.42 5.1 8.39C5.52 8.37 5.87 8.68 5.9 9.09L6.55 19.16C6.66 20.68 6.7 21.25 8.79 21.25H15.21C17.31 21.25 17.35 20.68 17.45 19.16L18.1 9.09C18.13 8.68 18.49 8.37 18.9 8.39C19.31 8.42 19.63 8.77 19.6 9.19L18.95 19.26C18.84 20.82 18.7 22.75 15.21 22.75Z"
                                                            fill="#ef4444"/>
                                                        <path
                                                            d="M13.66 17.25H10.33C9.92 17.25 9.58 16.91 9.58 16.5C9.58 16.09 9.92 15.75 10.33 15.75H13.66C14.07 15.75 14.41 16.09 14.41 16.5C14.41 16.91 14.07 17.25 13.66 17.25Z"
                                                            fill="#ef4444"/>
                                                        <path
                                                            d="M14.5 13.25H9.5C9.09 13.25 8.75 12.91 8.75 12.5C8.75 12.09 9.09 11.75 9.5 11.75H14.5C14.91 11.75 15.25 12.09 15.25 12.5C15.25 12.91 14.91 13.25 14.5 13.25Z"
                                                            fill="#ef4444"/>
                                                    </svg>
                                                </a>
                                            @endcan
                                        </div>

                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
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

    @can('accept_ccp_subscriptions')

        <div
            class="fixed flexsss25 top-0 left-0 right-0 z-50  hidden flex-col  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md mx-auto my-auto  max-h-full">
                <div class="relative bg-white rounded-xl  shadow">
                    <button type="button" onclick="closePop('.flexsss25')"
                            class="absolute top-3 right-2.5 group text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center "
                            data-modal-hide="popup-modal">
                        <svg aria-hidden="true" class="w-5 h-5 fill-gray2 group-hover:fill-orange" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <form action="{{ route('admin.addBalance') }}" method="post">
                        @csrf
                        <div class="p-6 text-center">
                            <h3 class="mb-5 text-md text-start font-bold text-black34">Add Balance ?</h3>
                            <input hidden name="ccp_id" value="" required>
                            <input
                                class="bg-[#f5f5f5] rounded-[15px] h-14 px-4 fontp w-full mt-4 font-medium  placeholder-slate-400 focus:outline-none focus:border-orange focus:ring-orange/50 block sm:text-sm focus:ring-1 "
                                placeholder="amount"
                                name="balance" required/>
                            <button onclick="closePop('.flexsss25')" type="submit"
                                    class="text-white hover:bg-orange3  transform hover:scale-[1.01]  bg-orange hover:bg-green2 mt-3  h-14 w-full justify-center md:w-64 font-medium rounded-xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">
                                add balance
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    <script>
        let gg42245 = document.querySelector(".gg4255")

        function openPop(gg42) {
            document.querySelector(gg42).classList.add('flex');
            document.querySelector(gg42).classList.remove('hidden');
            document.body.classList.add("overflow-hidden");
            document.body.style.height = "100vh";
            document.body.style.position = "fixed";
            document.body.style.width = "100%";
            gg42245.classList.add("block");
            gg42245.classList.remove("hidden");
        }

        function closePop(gg42) {
            document.querySelector(gg42).classList.remove('flex');
            document.querySelector(gg42).classList.add('hidden');
            document.body.classList.remove("overflow-hidden");
            document.body.style.height = "100%";
            document.body.style.position = "relative";
            document.body.style.width = "100%";

            gg42245.classList.remove("block");
            gg42245.classList.add("hidden");


        }

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

@section('js')
    <script>
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }
    </script>
@endsection
