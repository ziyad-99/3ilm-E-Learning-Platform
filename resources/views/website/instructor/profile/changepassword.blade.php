@extends('website.layouts.master')

@section('title')
    Change password
@endsection

@section('content')
    <div>
        <div class=" widthfull flex py-5 justify-between" style="margin-bottom: 10%">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">{{ trans('website/studentProfile.instructor_panel') }}</h3>
                <div class=" bg-white flex flex-wrap  boxshadow2 rounded px-0 py-0 mt-10 w-full mx-auto ">
                    <div class="w-full md:w-3/12 py-16 border-e border-[#D0D0D0]/50 ">
                        <p class="font-bold  text-2xl ps-16  ">{{ $instructor->firstName }}</p>
                        <a class=" w-full  items-center" href="{{ route('instructor.profile') }}">
                            <div class="hover:bg-orange/20 group w-full  mt-1 p-4 ps-16  items-center">
                                    <span
                                        class="font-medium fontp group-hover:text-orange text-[#555] text-sm ">{{ trans('website/studentProfile.profile') }}</span>
                            </div>
                        </a>
                        <a href="{{ route('instructor.password') }}"
                           class=" w-full  items-center">
                            <div class="  mt-1 p-4 ps-16 bg-orange w-full items-center">
                                    <span class="font-medium fontp group-hover:text-orange text-[#fff] text-sm ">
                                    {{ trans('website/studentProfile.change_password') }}
                                    </span>
                            </div>
                        </a>
                        <a href="{{ route('instructor.socialMedia') }}"
                           class=" w-full  items-center">
                            <div class="hover:bg-orange/20 group w-full  mt-1 p-4 ps-16  items-center">
                                    <span class="font-medium fontp group-hover:text-orange text-[#555] text-sm ">
                                        {{ trans('website/studentProfile.social_links') }}
                                    </span>
                            </div>
                        </a>
                    </div>
                    <div class="w-full md:w-9/12 h-[70vh] px-9 py-10">
                        <h4 class="  text-2xl md:text-2xl mb-4 lg:text-3xl text-black font-bold"> {{ trans('website/studentProfile.change_password') }}
                        </h4>
                        <form action="{{ route('instructor.changePassword') }}" method="post">
                            @csrf
                            <div class=" w-full md:w-6/12 mt-10 ">
                                <div class="  w-full ">
                                    <div class="w-full ">
                                        <p class="font-medium fontp text-black  text-sm ">{{ trans('website/studentProfile.old_password') }}
                                            :</p>
                                        <input class="inputtext " type="password" name="oldPassword"
                                               placeholder="**********" required/>
                                    </div>
                                    <div class=" w-full mt-4">
                                        <p class="font-medium  fontp text-black  text-sm ">{{ trans('website/studentProfile.new_password') }}
                                            :</p>
                                        <input class="inputtext " type="password" minlength="8" name="newPassword"
                                               placeholder="**********" required/>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                    class=" btn items-center mt-10 hover:bg-orange3 transition-all	 transform hover:scale-[1.01] justify-center flex px-10">
                                <span
                                    class=" text-white font-bold text-sm ">{{ trans('website/studentProfile.save_changes') }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

