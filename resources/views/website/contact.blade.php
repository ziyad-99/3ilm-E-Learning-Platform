@extends('website.layouts.master')

@section('title')
    {{ trans('admin/contact_us.contact_us') }}
@endsection

@section('content')
    <div class=" widthfull flex py-20 justify-between">
        <div class="w-full  ">
            <h3 class=" font-bold text-center text-4xl">{{ trans('admin/contact_us.contact_us') }}</h3>

            <div class=" bg-white flex flex-wrap boxshadow2 rounded px-0 py-0 mt-10 w-full mx-auto lg:w-10/12">
                <div class="w-full md:w-4/12 py-10 ps-8 pe-10 border-e border-[#D0D0D0]/50 ">
                    <p class="font-bold  text-2xl">{{ trans('admin/contact_us.GetInTouch') }}</p>
                    <div class=" flex mt-8 items-center">
                        <div class="h-[60px] w-[60px] rounded-full overflow-hidden ">
                            <img class="h-full w-full p-2 object-cover"
                                 src="{{ asset('website/images/location.png') }}"/>
                        </div>
                        <p class="font-medium fontp ps-3 text-sm ">{{ trans('admin/contact_us.ELOuedCiteRimal') }}</p>
                    </div>
                    <div class=" flex my-6 items-center">
                        <div class="h-[60px] w-[60px] rounded-full overflow-hidden ">
                            <img class="h-full w-full p-2 object-cover" src="{{ asset('website/images/mail.png') }}"/>
                        </div>
                        <div>
                            <p class="font-medium fontp ps-3 text-sm ">3ilm@souf.academy</p>
                            {{--                            <p class="font-medium fontp ps-3 text-sm ">info@lmazaiinner.co.uk</p>--}}

                        </div>
                    </div>
                    <div class=" flex my-6 items-center">
                        <div class="h-[60px] w-[60px] rounded-full overflow-hidden ">
                            <img class="h-full w-full p-2 object-cover"
                                 src="{{ asset('website/images/phone-call.png') }}"/>

                        </div>
                        <div>
                            <p class="font-medium fontp ps-3 text-sm ">
                                0671-72-74-22
                            </p>

                            <p class="font-medium fontp ps-3 text-sm ">
                                032-11-59-99
                            </p>
                        </div>

                    </div>
                    <div class=" flex  items-center">

                        <div class="h-[60px] w-[60px] rounded-full overflow-hidden ">
                            <img class="h-full w-full p-2 object-cover"
                                 src="{{ asset('website/images/messenger.png') }}"/>

                        </div>

                        <div>
                            <a href="https://m.me/104454959943933"
                               class=" w-full  items-center">
                                {{ trans('website/website.Messenger Link') }}
                            </a>
                        </div>

                    </div>
                </div>
                <div class=" w-full md:w-8/12 px-9 py-10 ">

                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class=" flex-wrap flex w-full">
                            <div class="w-full md:w-6/12 md:pe-2">
                                <p class="font-semibold text-black text-sm ">{{ trans('admin/contact_us.email') }}</p>
                                <input class="inputtext" type="email" name="email" placeholder="email@example.com"/>
                            </div>

                            <div class=" w-full md:w-6/12 md:ps-2">
                                <p class="font-semibold text-black text-sm">{{ trans('admin/contact_us.name') }}</p>
                                <input class="inputtext " type="text" name="name"
                                       placeholder="{{ trans('admin/contact_us.name') }}"/>
                            </div>

                        </div>
                        <div class=" w-full mt-5">
                            <p class="font-semibold text-black  text-sm ">{{ trans('admin/contact_us.subject') }}</p>
                            <input class="inputtext " type="text" name="subject"
                                   placeholder="{{ trans('admin/contact_us.subject') }}"/>
                        </div>
                        <div class=" w-full mt-5">
                            <p class="font-semibold text-black  text-sm ">{{ trans('admin/contact_us.message') }}</p>
                            <textarea class="inputtext min-h-[150px] h-auto py-3" rows="5"
                                      name="message" placeholder="{{ trans('admin/contact_us.message') }}"></textarea>
                        </div>
                        <button type="submit"
                                class=" w-full btn items-center mt-5 justify-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] flex px-6">
                            <span class=" text-white font-bold text-sm ">{{ trans('admin/contact_us.send') }}</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>

@endsection
