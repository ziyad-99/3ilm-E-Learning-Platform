@extends('website.layouts.master')

@section('title')
    {{ trans('auth.Submit code') }}
@endsection

@section('content')
    <div>
        <div class=" widthfull flex flex-wrap py-20 justify-between">
            <div class="w-full md:ps-20 md:w-[40%] ">
                <h3 class=" font-bold  text-2xl">{{ trans('auth.Submit code') }}</h3>
                <p class=" text-gray2 fontp font-normal text-base leading-[135%] my-6 text-start">
                    {{ trans('auth.please entre the code you have received via sms on you number') }}
                    , {{ auth()->user()->phone }} .
                </p>

                <a href="{{ route('student.generateNewCode') }}">
                    <span class=" text-orange hover:text-orange3 font-semibold underline underline-offset-4">
                        {{ trans('auth.Resend new code') }}
                    </span>
                </a>

                <!-- Session Status -->
{{--                @if (session('status') == 'verification-link-sent')--}}
{{--                    <div class="mb-4 font-medium text-sm text-green-600" style="color: green">--}}
{{--                        --}}{{--                        {{ trans('website/website.A new verification link has been sent') }}--}}
{{--                    </div>--}}
{{--                @endif--}}

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>


                <form action="{{ route('student.verifyPhoneNumber') }}" method="post">
                    @csrf
                    <div class=" w-full mt-5">
                        <p hidden class="font-semibold text-black2 mb-2  text-sm ">{{ trans('auth.Code') }}</p>
                        <input class="inputtext" placeholder="{{ trans('auth.Code') }}" type="text" name="code"
                               required autofocus/>
                    </div>
                    <x-button
                        class=" w-full btn items-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] mt-6 h-12 justify-center flex px-6">
                        {{ trans('auth.verify') }}
                    </x-button>
                </form>

            </div>
        </div>
    </div>

@endsection
