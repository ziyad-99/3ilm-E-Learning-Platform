@extends('website.layouts.master')

@section('title')
    Sign Up
@endsection

@section('css')
    <style>
        .registerForm {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class=" widthfull flex flex-wrap py-20 justify-between">
        <div class="w-full md:ps-20 md:w-[40%] ">

            <form action="{{ route('testFormLanguagesStore') }}" method="post">
                @csrf
                <div class=" flex-wrap flex w-full">
                    <div class="w-full md:w-6/12 md:pe-2">
                        <p class="font-semibold text-black  text-sm ">title</p>
                        <input class="inputtext " type="text" name="title" placeholder="title"/>
                    </div>
                    <div class=" w-full md:w-6/12 md:ps-2">
                        <p class="font-semibold text-black  text-sm ">price</p>
                        <input class="inputtext " type="text" name="price" placeholder="price"/>
                    </div>

                </div>
                <div class=" w-full mt-5">
                    <p class="font-semibold text-black  text-sm ">level</p>
                    <input class="inputtext " type="text" name="level" placeholder="level"/>
                </div>

                <div class=" w-full mt-5">
                    <p class="font-semibold text-black  text-sm ">description</p>
                    <textarea class="inputtext min-h-[150px] h-auto py-3" rows="5"
                              name="description" placeholder="description"></textarea>
                </div>
                <button type="submit"
                        class=" w-full btn items-center mt-5 justify-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] flex px-6">
                    <span class=" text-white font-bold text-sm ">Submit</span>
                </button>
            </form>


        </div>


    </div>

@endsection

@section('js')

    <script>
        $('#sectionChooser').change(function () {
            var myID = $(this).val();
            $('.registerForm').each(function () {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
