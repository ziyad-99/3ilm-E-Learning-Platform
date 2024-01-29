@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.login') }}
@endsection

@section('content')
    <div>
        <div class=" widthfull flex flex-wrap py-20 mt-10 justify-between">
            <div class="w-full md:ps-20 md:w-[40%] ">
                @if ($errors->any())
                    <div class="alert alert-danger" style="
                          display: inline-block;
                          color: red;
                          border-radius: 4%;
                          padding: 5px 10px;
                          margin: 5px 10px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{--form for admin--}}
                <div style="margin-top: 4%;" id="admin">
                    <h3 class=" font-bold  text-2xl">{{ trans('admin/admin.sign_in_as_admin') }}</h3>
                    <form method="POST" action="{{ route('login.admin') }}">
                        @csrf
                        <div class=" w-full mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.email') }}</p>
                            <input class="inputtext " type="email" name="email" required autofocus
                                   placeholder="{{ trans('admin/admin.email') }}"/>
                        </div>

                        <div class=" w-full mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Password') }}</p>
                            <input class="inputtext " type="password" name="password" required
                                   autocomplete="current-password" placeholder="*********"/>
                        </div>

                        <button type="submit"
                                class=" w-full btn items-center mt-6 h-12 hover:bg-orange3 transition-all	 transform hover:scale-[1.01] justify-center flex px-6">
                            <span class=" text-white font-bold text-sm ">{{ trans('admin/admin.signIn') }}</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="w-full md:w-[55%]  hidden md:block">
                <div class="w-full">
                    <svg class="w-4/12 mx-auto h-auto" width="258" height="258" viewBox="0 0 258 258" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1268_11259)">
                            <path
                                d="M220.217 37.7829C195.852 13.419 163.457 0 129 0C94.5434 0 62.1478 13.4185 37.7829 37.7829C13.419 62.1478 0 94.5434 0 129C0 163.457 13.4185 195.852 37.7829 220.217C62.1478 244.581 94.5434 258 129 258C163.457 258 195.852 244.581 220.217 220.217C244.581 195.852 258 163.457 258 129C258 94.5434 244.581 62.1478 220.217 37.7829ZM55.9865 216.325C60.2465 179.674 91.7583 151.377 129 151.377C148.632 151.377 167.094 159.026 180.981 172.911C192.712 184.644 200.112 199.964 202.015 216.323C182.233 232.891 156.762 242.883 129 242.883C101.238 242.883 75.7689 232.893 55.9865 216.325ZM129 135.806C107.397 135.806 89.8193 118.229 89.8193 96.626C89.8193 75.0211 107.398 57.4453 129 57.4453C150.602 57.4453 168.181 75.0211 168.181 96.626C168.181 118.229 150.603 135.807 129 135.807V135.806ZM215.026 203.545C211.142 187.903 203.067 173.617 191.669 162.223C182.379 152.932 171.387 145.961 159.4 141.594C173.81 131.821 183.298 115.31 183.298 96.626C183.298 66.687 158.939 42.3281 129 42.3281C99.0609 42.3281 74.7021 66.687 74.7021 96.626C74.7021 115.32 84.1977 131.836 98.62 141.608C87.591 145.627 77.3854 151.841 68.6043 160.021C55.8882 171.863 47.0583 186.963 42.9641 203.533C25.6246 183.544 15.1172 157.477 15.1172 129C15.1172 66.2047 66.2047 15.1172 129 15.1172C191.795 15.1172 242.883 66.2047 242.883 129C242.883 157.482 232.371 183.556 215.026 203.545Z"
                                fill="#F89A2C"/>
                        </g>

                        <defs>
                            <clipPath id="clip0_1268_11259">
                                <rect width="258" height="258" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="w-full flex justify-center">
                        <span
                            class=" text-orange  w-full font-bold text-4xl text-center ">{{ trans('admin/admin.AdminLogin') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
