@extends('website.layouts.master')

@section('title')
    {{ trans('auth.Verify phone number') }}
@endsection

@section('content')
    <div>
        <div class=" widthfull flex flex-wrap py-20 justify-between">
            <div class="w-full md:ps-20 md:w-[40%] ">
                <h3 class=" font-bold  text-2xl">{{ trans('auth.Verify phone number') }}</h3>
                <p class=" text-gray2 fontp font-normal text-base leading-[135%] my-6 text-start">
                    {{ trans('auth.Thanks For Sign up') }}
                </p>

                <!-- Session Status -->
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600" style="color: green">
                        {{--                        {{ trans('website/website.A new verification link has been sent') }}--}}
                    </div>
                @endif

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                <form action="{{ route('instructor.generateCode') }}" method="get">
                    @csrf
                    <x-button
                        class=" w-full btn items-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] mt-6 h-12 justify-center flex px-6">
                        {{ trans('auth.Get Verification Code Via SMS') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>

@endsection
