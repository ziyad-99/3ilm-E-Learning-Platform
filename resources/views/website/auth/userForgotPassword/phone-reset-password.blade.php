@extends('website.layouts.master')

@section('title')
    {{ trans('auth.Forgot password') }}
@endsection

@section('content')
    <div>
        <div class=" widthfull flex flex-wrap py-20 justify-between">
            <div class="w-full md:ps-20 md:w-[40%] ">
                <h3 class=" font-bold  text-2xl">{{ trans('auth.Set New password') }}</h3>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                <form action="{{ route('password.phoneResetPassword') }}" method="get">
                    @csrf

                    <input hidden name="phone" value="{{ $phone }}">

                    <div class=" w-full mt-5">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('auth.New Password') }}</p>
                        <input class="inputtext " placeholder="{{ trans('auth.New Password') }}" type="password"
                               name="password" required/>
                    </div>

                    <div class=" w-full mt-5">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('auth.Confirmation New Password') }}</p>
                        <input class="inputtext " placeholder="{{ trans('auth.Confirmation New Password') }}"
                               type="password"
                               name="password_confirmation" required/>
                    </div>

                    <button
                        class=" w-full btn items-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] mt-6 h-12 justify-center flex px-6">
                        <span class=" text-white font-bold text-sm ">{{ trans('auth.Change the password') }}</span>
                    </button>
                </form>

            </div>
            <div class="w-full md:w-[55%]  hidden md:block">
                <div class="w-full">
                    <svg class="w-4/12 mx-auto h-auto" xmlns="http://www.w3.org/2000/svg" version="1.1"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512"
                         height="512" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512"
                         xml:space="preserve" class=""><g>
                            <path
                                d="M107.683 55.056A16.479 16.479 0 0 0 95.956 50.2h-1.2V33.716c0-16.838-13.698-30.536-30.535-30.536h-1.129c-16.837 0-30.536 13.698-30.536 30.536v16.483h-1.2a16.48 16.48 0 0 0-11.727 4.857 16.48 16.48 0 0 0-4.857 11.728v41.452c0 4.43 1.725 8.595 4.857 11.726a16.473 16.473 0 0 0 11.727 4.858h64.6c4.43 0 8.595-1.725 11.728-4.858a16.476 16.476 0 0 0 4.857-11.726V66.784a16.48 16.48 0 0 0-4.858-11.728zm-67.127-21.34c0-12.426 10.109-22.536 22.536-22.536h1.129c12.426 0 22.535 10.11 22.535 22.536v16.483h-46.2zm63.985 74.52a8.646 8.646 0 0 1-2.514 6.069 8.53 8.53 0 0 1-6.071 2.515h-64.6a8.528 8.528 0 0 1-6.071-2.516 8.522 8.522 0 0 1-2.514-6.068V66.784a8.53 8.53 0 0 1 2.514-6.071 8.53 8.53 0 0 1 6.07-2.514h64.6c2.293 0 4.449.893 6.07 2.513a8.533 8.533 0 0 1 2.515 6.072v41.452z"
                                fill="#F89A2C" data-original="#000000"></path>
                            <path d="M63.656 76.464a4 4 0 0 0-4 4v14.092a4 4 0 0 0 8 0V80.464a4 4 0 0 0-4-4z"
                                  fill="#F89A2C"
                                  data-original="#000000"></path>
                        </g></svg>
                </div>
            </div>
        </div>
    </div>
@endsection
