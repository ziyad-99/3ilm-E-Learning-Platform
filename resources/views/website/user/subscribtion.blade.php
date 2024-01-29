@extends('website.layouts.master')

@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center mt-10 text-4xl">
                    {{ trans('website/subscription.add_balance') }}
                </h3>
                <div class=" w-full pb-10 flex flex-wrap ">
                    <div class="w-full md:w-[26.6%]">
                        <form action="{{ route('student.activeSubscriptionCode') }}" method="post">
                            @csrf
                            <h4 class=" font-bold text-center mt-28 text-xl">{{ trans('website/subscription.activate_code') }}</h4>
                            <div class=" w-full mt-5">
                                <p class="font-semibold text-black34  text-sm ">{{ trans('website/subscription.enter_the_code') }}</p>
                                <div class="w-full flex mt-2 items-end">
                                    <input class="sbs  rounded-s-xl mt-0 w-9/12"
                                           placeholder="{{ trans('website/subscription.enter_the_code') }}"
                                           name="subscriptionCode" required/>
                                    <div
                                        class="bg-orange  rounded-e-xl h-14 md:h-12 w-3/12 text-center flex items-center justify-center">
                                    <span
                                        class=" text-white font-bold text-sm ">{{ trans('website/subscription.activate') }}</span>
                                    </div>
                                </div>
                                <button type="submit"
                                        class=" mt-4 w-40 btn hover:bg-orange3 cursor-pointer items-center justify-center flex px-6">
                                <span
                                    class=" text-white font-bold text-sm ">{{ trans('website/subscription.active') }}</span>
                                </button>
                            </div>
                            <div class=" w-full flex flex-wrap">
                            </div>
                        </form>
                    </div>

                    <div class="w-full md:w-[10%]">
                        <h4 class=" font-bold text-center mt-10 md:mt-28 text-xl">{{ trans('website/subscription.or') }}</h4>
                        <div class="w-full md:w-[1px] bg-[#D1D1D1]/50 -mt-4 md:mt-2 h-[1px] md:h-[200px] mx-auto">
                        </div>
                    </div>

                    <div class="w-full md:w-[26.6%]">
                        <form action="{{ route('student.uploadCCPimag') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h4 class=" font-bold text-center mt-28 text-xl">{{ trans('website/subscription.via_ccp') }}</h4>
                            <div class=" w-full  cursor-pointer  mt-5">
                                <p class="font-semibold text-black34  text-sm ">{{ trans('website/subscription.photo_ccp') }}</p>
                                <div class="w-full  overflow-hidden relative flex mt-2 items-end">
                                    <input class=" sbs rounded-s-xl mt-0 w-9/12 "
                                           name="ccp_img"
                                           placeholder="{{ trans('website/subscription.photo_ccp') }}"/>
                                    <div
                                        class="bg-orange h-14 md:h-12 rounded-e-xl w-3/12 text-center flex items-center justify-center">
                                    <span
                                        class=" text-white font-bold text-sm ">{{ trans('website/subscription.upload_photo') }}</span>
                                    </div>
                                    <input type="file" onchange='openFile(event)'
                                           class="  absolute top-0 right-0 left-0 bottom-0 z-10 opacity-0 cursor-pointer"
                                           id="avatar" name="ccp_img" accept="image/png, image/jpeg" required>
                                </div>
                                <div class="w-full hidden" id="output2">
                                    <div class="flex items-center my-4 w-full filecontainer ">
                                        <img class="h-auto  w-8 object-contain relative"
                                             src="{{ asset('website/images/file.svg') }}"/>
                                        <div class="max-w-[300px] overflow-hidden">
                                            <p class="text-black34 mx-4 might-overflow text-sm font-bold filename "
                                               id="output">
                                                ccp_Image
                                            </p>
                                        </div>
                                        <div class="relative text-sm group ms-auto flex font-semibold w-2/12 ">
                                            <a type="button" onclick="deleteFile()" id="delete_button"
                                               class=" rounded-2xl ms-auto w-12 h-12 items-center justify-center flex  bg-red-500/20">
                                                <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                        class=" mt-4 w-40 btn hover:bg-orange3 cursor-pointer items-center justify-center flex px-6">
                                <span
                                    class=" text-white font-bold text-sm ">{{ trans('website/subscription.upload_photo') }}</span>
                                </button>
                            </div>
                            <div class=" w-full flex flex-wrap">
                            </div>
                        </form>
                    </div>

                    <div class="w-full md:w-[10%]">
                        <h4 class=" font-bold text-center mt-10 md:mt-28 text-xl">{{ trans('website/subscription.or') }}</h4>
                        <div class="w-full md:w-[1px] bg-[#D1D1D1]/50 -mt-4 md:mt-2 h-[1px] md:h-[200px] mx-auto">
                        </div>
                    </div>
                    <div class="w-full md:w-[26.6%]">
                        <h4 class=" font-bold text-center mt-28 text-xl">{{ trans('website/subscription.e_pay') }}</h4>
                        <form action="{{ route('student.ePay') }}" method="post">
                            @csrf
                            <div class=" w-full mt-5">
                                <p class="font-semibold text-black34  text-sm ">{{ trans('website/subscription.enter_the_amount') }}
                                    <strong>
                                        {{ trans('website/subscription.more_then_75') }}
                                    </strong></p>
                                <div class="w-full flex mt-2 items-end">
                                    <input class="sbs  rounded-s-xl mt-0 w-9/12"
                                           name="amount" placeholder="{{ trans('website/subscription.amount') }}" required/>
                                    <div
                                        class="bg-orange  rounded-e-xl h-14 md:h-12 w-3/12 text-center flex items-center justify-center"
                                    >
                                        <span
                                            class=" text-white font-bold text-sm ">{{ trans('website/subscription.DA') }}</span>
                                    </div>
                                </div>

                                <br>
                                <label class="containerRadio">{{ trans('website/subscription.CIB') }}
                                    <input type="radio" name="mode" value="CIB" required>
                                    <span class="checkmark"></span>
                                </label>

                                <label class="containerRadio">{{ trans('website/subscription.EDAHABIA') }}
                                    <input type="radio" name="mode" value="EDAHABIA" required>
                                    <span class="checkmark"></span>
                                </label>

                                <button type="submit"
                                        class=" mt-4 w-40 btn hover:bg-orange3 cursor-pointer items-center justify-center flex px-6">
                                    <span
                                        class=" text-white font-bold text-sm ">{{ trans('website/subscription.Pay') }}</span>
                                </button>
                            </div>
                        </form>
                        <div class=" w-full flex flex-wrap">
                        </div>
                    </div>
                </div>

                <p class="fontp font-normal text-sm leading-[20px] mt-5 text-center">
                    <strong>{{ trans('website/welcome.no') }}</strong>
                </p>

                <div class="w-full ">
                    <h4 class=" font-bold mt-28 text-2xl">{{ trans('website/subscription.previous_subscriptions') }}</h4>
                    <table class="table w-full" style="
                        border-radius: 15px;
                        overflow: hidden;
                    " datatable id="datatable-basic">
                        <thead class="bg-green/50 rounded-t-xl">
                        <tr>
                            <th class="font-bold uppercase text-white text-xxs">{{ trans('website/subscription.invoice_id') }}</th>
                            <th class="font-bold uppercase text-white text-xxs">{{ trans('website/subscription.amount') }}</th>
                            <th class="font-bold uppercase text-white text-xxs ">{{ trans('website/subscription.via') }}</th>
                            <th class="font-bold uppercase text-white text-xxs">{{ trans('website/subscription.transaction_date') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td class="text-sm font-semibold  leading-normal">{{ $invoice->id }}</td>
                                <td class="text-sm font-semibold  leading-normal">{{ $invoice->amount }}</td>
                                <td class="text-sm font-semibold  leading-normal">{{ $invoice->mode }}</td>
                                <td class="text-sm font-semibold  leading-normal">{{ $invoice->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('website/js/all.js') }}"></script>
    <script src="{{ asset('website/js/datatables.min.js') }}"></script>

    <script>
        let arr = ["drop1", "drop2"]

        window.addEventListener('click', function (e) {
                for (let i = 0; i < arr.length; i++) {
                    if (document.getElementById(arr[i]).parentElement.contains(e.target)) {
                    } else {
                        document.getElementById(arr[i]).classList.remove('show')

                    }
                }
            }
        );
    </script>
    <script>
        let openFile = function (file) {

            let input = file.target.files[0].name;
            let output = document.getElementById('output');
            let output2 = document.getElementById('output2');
            output2.classList.remove("hidden")
            output.textContent = input;

        };
        let deleteFile = function (file) {
            let output2 = document.getElementById('output2');
            output2.classList.add("hidden")

        };

    </script>
@endsection
