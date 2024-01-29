@extends('website.layouts.master')

@section('title')
    {{ trans('website/website.Payments Successfully') }}
@endsection

@section('content')

    <div>
        <div class=" widthfull grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 py-20 justify-between">

            <div data-aos="fade-up" class="w-full md:col-span-2">
                <h3 class=" font-bold  text-4xl">{{ trans('website/website.Payments Successfully') }}</h3>
                <div class=" bg-white rounded-xl px-0 py-4 mt-10">
                    <div class=" w-full px-6 border-b border-[#E2E2E2]/30 border-solid">
                        <div class="flex">
                            <p class="font-medium fontp text-base border-b-2 border-[#FF6900] border-solid pb-2">
                                {{ trans('website/website.Payment Details') }}</p>
                        </div>
                    </div>

                    <div data-aos="fade-up" class=" border-b border-[#E2E2E2]/30 px-6 py-5 pt-10">
                        <div class=" flex flex-wrap  items-center">
                            <p
                                class=" order-2 md:order-1 w-full md:w-9/12 text-gray5 fontp font-normal lg:w-9/12 text-[15px] leading-[135%] mt-3 text-start">
                                {{ trans('website/website.Payment number') }}
                                <strong>{{ $invoice->id }}</strong> {{ trans('website/website.with amount') }}
                                <strong>{{ $invoice->amount }} {{ trans('(admin/admin.(DA)') }}</strong> {{ trans('website/website.was paid successfully') }}
                            </p>
                            <div class=" order-1 md:order-2 w-full md:w-3/12 ps-5 flex flex-col">
                                <div class="h-[90px] w-[90px] mx-auto rounded-full overflow-hidden ">
                                    <img class="h-full w-full object-cover"
                                         src="{{asset('website/images/check1.png')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" bg-black/50 hidden fixed top-0 gg422 bottom-0 right-0 left-0 z-50"></div>

        <div
            class="fixed flexsss24 top-0 left-0 right-0 z-50  hidden flex-col  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl mx-auto my-auto  max-h-full">
                <div class="relative bg-white rounded-2xl  shadow">
                    <button type="button" onclick="closePop('.flexsss24')"
                            class="absolute top-3 right-2.5 group text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center "
                            data-modal-hide="popup-modal">
                        <img src="{{ asset('website/images/check-symbol-4794.svg') }}">
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <h3 class="mb-5 text-md font-medium text-black34">choose one </h3>
                        <div class=" flex items-center justify-center">
                            <a href="#" onclick="closePop('.flexsss24')" type="button"
                               class="text-orange fontp hover:bg-orange hover:text-white transform transition-all hover:scale-[1.01] font-semibold bg-orange/20  mt-3  h-14  rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">
                                1 month 250.00DA
                            </a>
                            <a href="#" onclick="closePop('.flexsss24')" type="button"
                               class="text-orange hover:bg-orange hover:text-white transform transition-all hover:scale-[1.01] fontp font-semibold bg-orange/20  mt-3  h-14  rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">
                                3 month 250.00DA
                            </a>
                            <a href="#" onclick="closePop('.flexsss24')" type="button"
                               class="text-orange fontp hover:bg-orange hover:text-white transform transition-all hover:scale-[1.01] font-semibold bg-orange/20  mt-3  h-14  rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">
                                6 month 250.00DA
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        AOS.init({
            offset: 200, // offset (in px) from the original trigger point
            delay: 100,
            duration: 800,
        });
    </script>
@endsection
