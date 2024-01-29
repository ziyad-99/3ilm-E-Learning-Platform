@extends('website.admin.layouts.master')

@section('title')
    Contact us
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl  lg:leading-[120%] ">
                <span>{{ trans('admin/contact_us.contact_us') }}</span>
            </h4>
            <div class="w-full  mb-4 max-w-full px-3 flex-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 d  rounded-2xl bg-clip-border">
                    <div>
                        <table class="table admin" datatable id="datatable-search-list">
                            <thead>
                            <tr class="bg-orange/30">
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">-</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/contact_us.name') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/contact_us.email') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/contact_us.subject') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/contact_us.message') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/contact_us.time') }}</th>
                                <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/contact_us.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($all_contact_us as $contact_us)
                                <tr>
                                    <td class="text-sm font-medium w-2/12 text-black34 fontp leading-normal h-full">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-sm font-medium w-2/12 text-black34 fontp leading-normal">
                                        <a href="@can('replay_contact_us'){{ route('admin.replyContactUs', ['contact_us_id' => $contact_us->id]) }}@endcan">

                                            {{ $contact_us->name }}
                                        </a>
                                    </td>
                                    <td class="text-sm font-normal w-2/12 text-black34 fontp leading-normal">
                                        <a href="@can('replay_contact_us'){{ route('admin.replyContactUs', ['contact_us_id' => $contact_us->id]) }}@endcan">
                                            {{ $contact_us->email }}
                                        </a>
                                    </td>
                                    <td class="text-sm font-normal w-2/12 text-black34 fontp leading-normal">
                                        <a href="@can('replay_contact_us'){{ route('admin.replyContactUs', ['contact_us_id' => $contact_us->id]) }}@endcan">
                                            {{ $contact_us->subject}}
                                        </a>
                                    </td>
                                    <td max-width="280px"
                                        class="text-sm font-normal text-black34 might-overflow  w-3/12 fontp leading-normal">
                                        <a href="@can('replay_contact_us'){{ route('admin.replyContactUs', ['contact_us_id' => $contact_us->id]) }}@endcan">
                                            <div class="max-w-[320px] might-overflow ">
                                                <p class=" whitespace-normal text-start">
                                                    {{ $contact_us->message }}
                                                </p>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-sm font-normal w-2/12 text-black34 fontp leading-normal">
                                        {{ $contact_us->created_at }}
                                    </td>

                                    <td class="w-2/12">
                                        @can('delete_contact_us')
                                            <a id="deleteContactUs" href="{{ route('admin.deleteContactUs', ['contact_us_id' => $contact_us->id]) }}"
                                               type="button" onclick="openPop('.flexsss24')"
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
                                    </td>
                                </tr>
                            @empty

                            @endforelse
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
