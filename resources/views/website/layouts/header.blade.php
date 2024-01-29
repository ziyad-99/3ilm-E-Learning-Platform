<header class="fixed top-0 left-0 w-full z-10" style="background-color: #f5f5f5;">
    <div class=" header items-center justify-between pt-4">
        <div class=" flex items-center">

            @if (!auth('web')->check() && !auth('instructor')->check())

                <a href="{{ route('welcome') }}"> <img class=" h-[70px] md:h-[85px] object-contain"
                                                       src="{{ URL::asset('website/images/3ilm_logo.svg') }}"/>
                </a>
            @endif

            @if (auth('web')->check())
                <a href="{{ route('dashboard.student') }}"> <img class=" h-[70px] md:h-[85px] object-contain"
                                                                 src="{{ URL::asset('website/images/3ilm_logo.svg') }}"/>
                </a>
            @endif

            @if(auth('instructor')->check())

                <a href="{{ route('dashboard.instructor') }}"> <img class=" h-[70px] md:h-[85px] object-contain"
                                                                    src="{{ URL::asset('website/images/3ilm_logo.svg') }}"/>
                </a>

            @endif


        </div>

        @if (auth('web')->check())
            <!--  mobile virsion after login remove  hidden  -->
            <div class="w-11/12 flex md:hidden items-center gap-2 justify-end">
                <div class=" block md:hidden ">
                    <div class=" relative top-auto  md:end-auto cursor-pointer"
                         onclick="dropdownfun(this)">
                        <div
                            class=" w-5 h-5 bg-orange rounded-full flex items-center justify-center absolute -top-1 md:start-auto start-6 md:-end-1 z-10">
                            <p class=" text-white text-center   font-bold text-[11px] ">
                                {{ auth('web')->user()->unreadNotifications->count() }}
                            </p>
                        </div>
                        <img class="h-auto  rounded-full w-10 object-contain relative"
                             src="{{ URL::asset('website/images/notification.png') }}"/>
                    </div>
                    <div
                        class="absolute w-screen z-100 start-0 top-20 p-5 md:w-auto  bg-white select1  end-0 overflow-hidden rounded-2xl">
                        <div
                            class=" w-full max-h-96 min-h-96 overflow-y-auto  md:pe-5 overflow-x-hidden md:w-72 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">

                            @forelse(auth('web')->user()->notifications->where('type', 'App\Notifications\CreateMeeting')->all() as $notification)
                                @if($notification->read_at == null)
                                    <a href="{{ route('student.specificZoomFromNotification', ['session_id' => $notification->data['sessionId']]) }}">
                                        <div
                                            class=" flex mb-2  relative items-start group px-2 bg-orange/10 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                            <img data-aos="fade-left"
                                                 class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                 src="{{ URL::asset('website/images/notification.png') }}"/>
                                            <div class="py-4 px-4">
                                                <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                    {{ $notification->data['courseTitle'] }}</p>
                                                <span
                                                    class=" text-gray  font-medium text-xs fontp">
                                                                {{ trans('website/header.The session') }} {{ $notification->data['sessionName'] }}
                                                            </span>
                                                <p class=" text-gray  font-medium text-xs fontp">
                                                    {{ trans('website/header.startAt') }} {{ $notification->data['sessionStartDate'] }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('student.specificZoomFromNotification', ['session_id' => $notification->data['sessionId']]) }}">
                                        <div
                                            class=" flex mb-2 overflow-x-hidden items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                            <img data-aos="fade-left"
                                                 class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                 src="{{ URL::asset('website/images/notification.png') }}"/>
                                            <div class="py-4 px-4">
                                                <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                    {{ $notification->data['courseTitle'] }}</p>
                                                <span
                                                    class=" text-gray  font-medium text-xs fontp">
                                                                {{ trans('website/header.The session') }} {{ $notification->data['sessionName'] }}
                                                            </span>
                                                <p class=" text-gray  font-medium text-xs fontp">
                                                    {{ trans('website/header.startAt') }} {{ $notification->data['sessionStartDate'] }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @empty
                            @endforelse

                            @forelse(auth('web')->user()->notifications->where('type', 'App\Notifications\ApproveSubscription')->all() as $notification)

                                @if($notification->read_at == null)
                                    <a href="{{ route('student.myCourseFromNotifications',['subscription_id' => $notification->data['subscription_id']]) }}">
                                        <div
                                            class=" flex mb-2  relative items-start group px-2 bg-orange/10 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                            <img data-aos="fade-left"
                                                 class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                 src="{{ URL::asset('website/images/notification.png') }}"/>
                                            <div class="py-4 px-4">
                                                <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                    {{ $notification->data['courseTitle'] }}</p>
                                                <span class=" text-gray  font-medium text-xs fontp">
                                                    {{ trans('website/header.CongratulationsYouAreApprovedInThisCourse') }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('student.myCourseFromNotifications',['subscription_id' => $notification->data['subscription_id']]) }}">
                                        <div
                                            class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                            <img data-aos="fade-left"
                                                 class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                 src="{{ URL::asset('website/images/notification.png') }}"/>
                                            <div class="py-4 px-4">
                                                <p class="text-black34 cursor-pointer font-bold text-sm ">
                                                    {{ $notification->data['courseTitle'] }}</p>
                                                <span class=" text-gray  font-medium text-xs fontp">
                                                    {{ trans('website/header.CongratulationsYouAreApprovedInThisCourse') }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @empty
                            @endforelse

                            @if(auth('web')->user()->notifications->count() == 0)
                                <div
                                    class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                    <div class="py-4 px-4">
                                        <span class=" text-black  font-medium text-xs fontp">
                                            {{ trans('website/header.ThereAreNoNotification') }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class=" block md:hidden md:mt-0  ">

                    <div class="flex  md:py-0   cursor-pointer items-center w-full"
                         onclick="dropdownfun(this)">
                        <img class="h-auto ms-2 rounded-full w-10 object-contain relative"
                             src="{{ asset('website/images/profile.png') }}"/>


                    </div>
                    <div
                        class="absolute w-screen z-100 start-0  top-20 p-5 md:w-auto select1 bg-white end-0 overflow-hidden rounded-2xl">


                        <!--  after login add flex and remove hidden  -->
                        @if (auth('web')->check())

                            <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                {{ Auth::guard('web')->user()->firstName }}</p>
                            <p class=" text-gray  font-medium text-xs fontp">{{ Auth::guard('web')->user()->email }}</p>

                            <div
                                class=" flex items-center group mt-3 px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">

                                <svg class="w-6 h-6 ms-1" width="16" height="17" viewBox="0 0 16 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path class="group-hover:stroke-orange "
                                          d="M8.10671 7.24805C8.04004 7.24138 7.96004 7.24138 7.88671 7.24805C6.30004 7.19472 5.04004 5.89472 5.04004 4.29472C5.04004 2.66138 6.36004 1.33472 8.00004 1.33472C9.63337 1.33472 10.96 2.66138 10.96 4.29472C10.9534 5.89472 9.69337 7.19472 8.10671 7.24805Z"
                                          stroke="#292D32" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="group-hover:stroke-orange "
                                          d="M4.77323 9.70821C3.1599 10.7882 3.1599 12.5482 4.77323 13.6215C6.60657 14.8482 9.61323 14.8482 11.4466 13.6215C13.0599 12.5415 13.0599 10.7815 11.4466 9.70821C9.6199 8.48821 6.61323 8.48821 4.77323 9.70821Z"
                                          stroke="#292D32" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                @if (auth('instructor')->check())
                                    <a href="{{ route('instructor.profile') }}"
                                       class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                        {{ trans('website/header.my_profile') }}</a>
                                @else
                                    <a href="{{ route('student.profile') }}"
                                       class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                        {{ trans('website/header.my_profile') }}</a>
                                @endif

                            </div>
                            <!-- Logout Authentication -->
                            @if (auth('web')->check())
                                <form method="POST" action="{{ route('logout.student') }}">
                                    @else
                                        <form method="POST" action="{{ route('logout.instructor') }}">
                                            @endif
                                            @csrf
                                            <div class=" flex items-center px-2 hover:bg-orange/20  rounded-2xl group">
                                                <svg class="w-6 h-6 ms-1" width="24" height="24" viewBox="0 0 24 24"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path class="group-hover:fill-orange "
                                                          d="M15.24 22.27H15.11C10.67 22.27 8.53002 20.52 8.16002 16.6C8.12002 16.19 8.42002 15.82 8.84002 15.78C9.24002 15.74 9.62002 16.05 9.66002 16.46C9.95002 19.6 11.43 20.77 15.12 20.77H15.25C19.32 20.77 20.76 19.33 20.76 15.26V8.74C20.76 4.67 19.32 3.23 15.25 3.23H15.12C11.41 3.23 9.93002 4.42 9.66002 7.62C9.61002 8.03 9.26002 8.34 8.84002 8.3C8.42002 8.27 8.12001 7.9 8.15001 7.49C8.49001 3.51 10.64 1.73 15.11 1.73H15.24C20.15 1.73 22.25 3.83 22.25 8.74V15.26C22.25 20.17 20.15 22.27 15.24 22.27Z"
                                                          fill="#292D32"/>
                                                    <path class="group-hover:fill-orange "
                                                          d="M15.0001 12.75H3.62012C3.21012 12.75 2.87012 12.41 2.87012 12C2.87012 11.59 3.21012 11.25 3.62012 11.25H15.0001C15.4101 11.25 15.7501 11.59 15.7501 12C15.7501 12.41 15.4101 12.75 15.0001 12.75Z"
                                                          fill="#292D32"/>
                                                    <path class="group-hover:fill-orange "
                                                          d="M5.84994 16.1C5.65994 16.1 5.46994 16.03 5.31994 15.88L1.96994 12.53C1.67994 12.24 1.67994 11.76 1.96994 11.47L5.31994 8.12C5.60994 7.83 6.08994 7.83 6.37994 8.12C6.66994 8.41 6.66994 8.89 6.37994 9.18L3.55994 12L6.37994 14.82C6.66994 15.11 6.66994 15.59 6.37994 15.88C6.23994 16.03 6.03994 16.1 5.84994 16.1Z"
                                                          fill="#292D32"/>
                                                </svg>
                                                <a href="route('logout')"
                                                   onclick="event.preventDefault();
                                this.closest('form').submit();"
                                                   class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                                    {{ trans('website/header.logout') }}</a>

                                            </div>


                                            @else
                                                <a href="{{ route('login') }}"
                                                   class=" btn items-center me-3 h-10 justify-center flex bg-white text-orange border border-orange   hover:text-white hover:bg-orange3 transform hover:scale-[1.01] w-32">
                                                    <span class="  font-bold text-[13px]  ">Sign in</span>
                                                </a>

                                                @if (Route::has('register'))

                                                    <a href="{{ route('register') }}"
                                                       class=" btn items-center me-3 h-10 justify-center flex   hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] w-full md:w-32">
                                                        <span
                                                            class=" text-white font-bold text-[13px]  ">Register</span>
                                                    </a>

                            @endif
                        @endif


                    </div>
                </div>

            </div>
        @endif

        @if (auth('instructor')->check())
            <!--  mobile virsion after login remove  hidden  -->
            <div class="w-11/12 flex md:hidden items-center gap-2 justify-end">
                <div class=" block md:hidden ">
                    <div class=" relative top-auto  md:end-auto cursor-pointer"
                         onclick="dropdownfun(this)">
                        <div
                            class=" w-5 h-5 bg-orange rounded-full flex items-center justify-center absolute -top-1 md:start-auto start-6 md:-end-1 z-10">
                            <p class=" text-white text-center   font-bold text-[11px] ">
                                {{ auth('instructor')->user()->unreadnotifications->count() }}
                            </p>
                        </div>
                        <img class="h-auto  rounded-full w-10 object-contain relative"
                             src="{{ URL::asset('website/images/notification.png') }}"/>
                    </div>
                    <div
                        class="absolute w-screen z-100 start-0 top-20 p-5 md:w-auto  bg-white select1  end-0 overflow-hidden rounded-2xl">
                        <div
                            class=" w-full max-h-96 min-h-96 overflow-y-auto  md:pe-5 overflow-x-hidden md:w-72 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">

                            @forelse(auth('instructor')->user()->notifications->where('type', 'App\Notifications\SpecificInstructor')->all() as $notification)
                                @if($notification->read_at == null)
                                    <a href="">
                                        <div
                                            class=" flex mb-2 relative items-start group px-2 bg-orange/10 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                            <img data-aos="fade-left"
                                                 class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                 src="{{ URL::asset('website/images/notification.png') }}"/>
                                            <div class="py-4 px-4">
                                                <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                    {{ trans('website/header.FromAdmin') }}
                                                </p>
                                                <span
                                                    class=" text-gray  font-medium text-xs fontp">
                                                                        </span>
                                                <p class=" text-gray  font-medium text-xs fontp">
                                                    {{ $notification->data['specificNotification'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="">
                                        <div
                                            class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                            <img data-aos="fade-left"
                                                 class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                 src="{{ URL::asset('website/images/notification.png') }}"/>
                                            <div class="py-4 px-4">
                                                <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                    {{ trans('website/header.FromAdmin') }}
                                                </p>
                                                <span
                                                    class=" text-gray  font-medium text-xs fontp">
                                                                        </span>
                                                <p class=" text-gray  font-medium text-xs fontp">
                                                    {{ $notification->data['specificNotification'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @empty
                            @endforelse

                            @if(auth('instructor')->user()->notifications->count() == 0)
                                <div
                                    class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                    <div class="py-4 px-4">
                                        <span class=" text-black  font-medium text-xs fontp">
                                            {{ trans('website/header.ThereAreNoNotification') }}
                                        </span>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class=" block md:hidden md:mt-0  ">

                    <div class="flex  md:py-0   cursor-pointer items-center w-full"
                         onclick="dropdownfun(this)">
                        <img class="h-auto ms-2 rounded-full w-10 object-contain relative"
                             src="{{ asset('website/images/profile.png') }}"/>


                    </div>
                    <div
                        class="absolute w-screen z-100 start-0  top-20 p-5 md:w-auto select1 bg-white end-0 overflow-hidden rounded-2xl">

                        <!--  after login add flex and remove hidden  -->
                        @if (auth('instructor')->check())
                            <p class=" text-black34  cursor-pointer font-bold text-sm ">
                                {{ Auth::guard('instructor')->user()->firstName }}</p>
                            <p class=" text-gray  font-medium text-xs fontp">{{ Auth::guard('instructor')->user()->email }}</p>
                            <div
                                class=" flex items-center group mt-3 px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">

                                <svg class="w-6 h-6 ms-1" width="16" height="17" viewBox="0 0 16 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path class="group-hover:stroke-orange "
                                          d="M8.10671 7.24805C8.04004 7.24138 7.96004 7.24138 7.88671 7.24805C6.30004 7.19472 5.04004 5.89472 5.04004 4.29472C5.04004 2.66138 6.36004 1.33472 8.00004 1.33472C9.63337 1.33472 10.96 2.66138 10.96 4.29472C10.9534 5.89472 9.69337 7.19472 8.10671 7.24805Z"
                                          stroke="#292D32" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="group-hover:stroke-orange "
                                          d="M4.77323 9.70821C3.1599 10.7882 3.1599 12.5482 4.77323 13.6215C6.60657 14.8482 9.61323 14.8482 11.4466 13.6215C13.0599 12.5415 13.0599 10.7815 11.4466 9.70821C9.6199 8.48821 6.61323 8.48821 4.77323 9.70821Z"
                                          stroke="#292D32" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                @if (auth('instructor')->check())
                                    <a href="{{ route('instructor.profile') }}"
                                       class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                        {{ trans('website/header.my_profile') }}</a>
                                @else
                                    <a href="{{ route('student.profile') }}"
                                       class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                        {{ trans('website/header.my_profile') }}</a>
                                @endif

                            </div>

                            <!-- Logout Authentication -->
                            @if (auth('web')->check())
                                <form method="POST" action="{{ route('logout.student') }}">
                                    @else
                                        <form method="POST" action="{{ route('logout.instructor') }}">

                                            @endif



                                            @csrf
                                            <div class=" flex items-center px-2 hover:bg-orange/20  rounded-2xl group">
                                                <svg class="w-6 h-6 ms-1" width="24" height="24" viewBox="0 0 24 24"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path class="group-hover:fill-orange "
                                                          d="M15.24 22.27H15.11C10.67 22.27 8.53002 20.52 8.16002 16.6C8.12002 16.19 8.42002 15.82 8.84002 15.78C9.24002 15.74 9.62002 16.05 9.66002 16.46C9.95002 19.6 11.43 20.77 15.12 20.77H15.25C19.32 20.77 20.76 19.33 20.76 15.26V8.74C20.76 4.67 19.32 3.23 15.25 3.23H15.12C11.41 3.23 9.93002 4.42 9.66002 7.62C9.61002 8.03 9.26002 8.34 8.84002 8.3C8.42002 8.27 8.12001 7.9 8.15001 7.49C8.49001 3.51 10.64 1.73 15.11 1.73H15.24C20.15 1.73 22.25 3.83 22.25 8.74V15.26C22.25 20.17 20.15 22.27 15.24 22.27Z"
                                                          fill="#292D32"/>
                                                    <path class="group-hover:fill-orange "
                                                          d="M15.0001 12.75H3.62012C3.21012 12.75 2.87012 12.41 2.87012 12C2.87012 11.59 3.21012 11.25 3.62012 11.25H15.0001C15.4101 11.25 15.7501 11.59 15.7501 12C15.7501 12.41 15.4101 12.75 15.0001 12.75Z"
                                                          fill="#292D32"/>
                                                    <path class="group-hover:fill-orange "
                                                          d="M5.84994 16.1C5.65994 16.1 5.46994 16.03 5.31994 15.88L1.96994 12.53C1.67994 12.24 1.67994 11.76 1.96994 11.47L5.31994 8.12C5.60994 7.83 6.08994 7.83 6.37994 8.12C6.66994 8.41 6.66994 8.89 6.37994 9.18L3.55994 12L6.37994 14.82C6.66994 15.11 6.66994 15.59 6.37994 15.88C6.23994 16.03 6.03994 16.1 5.84994 16.1Z"
                                                          fill="#292D32"/>
                                                </svg>
                                                <a href="route('logout')"
                                                   onclick="event.preventDefault();
                                this.closest('form').submit();"
                                                   class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                                    {{ trans('website/header.logout') }}</a>

                                            </div>


                                            @else
                                                <a href="{{ route('login') }}"
                                                   class=" btn items-center me-3 h-10 justify-center flex   hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] w-full md:w-32">
                                                    <span
                                                        class=" text-white font-bold text-[13px]  ">{{ trans('website/header.sign_in') }}</span>
                                                </a>

                                                @if (Route::has('register'))

                                                    <a href="{{ route('register') }}"
                                                       class=" btn items-center me-3 h-10 justify-center flex   hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] w-full md:w-32">
                                                        <span
                                                            class=" text-white font-bold text-[13px]  ">{{ trans('admin/header.register') }}</span>
                                                    </a>

                            @endif
                        @endif


                    </div>
                </div>

            </div>
        @endif

        <div class="main ms-4 relative z-[10] lg:hidden" onclick="openNav()">
            <svg class=" fill-orange w-5 h-5 " xmlns="http://www.w3.org/2000/svg" version="1.1"
                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512"
                 height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512"
                 xml:space="preserve" class="">
                    <g>
                        <path
                            d="M29 8H3a2 2 0 0 1 0-4h26a2 2 0 0 1 0 4zM29 28H3a2 2 0 0 1 0-4h26a2 2 0 0 1 0 4zM29 18H3a2 2 0 0 1 0-4h26a2 2 0 0 1 0 4z"
                            fill="#FF820F" data-original="#5865f2" class=""></path>
                    </g>
                </svg>
        </div>

        <div onclick="closeNav()" class="z-[50] gg4 absolute hidden h-screen top-0 left-0 right-0 bottom-0 "></div>
        <div
            class="p-5 pt-4 w-[90wv] md:w-[85%] h-screen md:h-auto overflow-y-scroll md:overflow-y-visible lg:p-0 flexsss hidden bg-white/90  lg:bg-transparent top-0 start-0 end-10 bottom-0 z-[100]  lg:flex items-center">
            <div class=" md:items-center w-full  flex flex-col md:flex-row md:flex">
                <a href="#" class=" md:hidden">
                    <img class=" h-[80px] md:h-[95px] object-contain"
                         src="{{ asset('website/images/3ilm_logo.svg') }}"/>
                </a>
                @if (auth('web')->check() || auth('instructor')->check())
                    <ul class=" w-full md:m-auto md:w-fit list-none md:ms-0 md:me-auto list md:flex md:pe-4 order-2 md:order-[0]"
                    >
                        @else

                            <ul class=" w-full md:m-auto md:w-fit list-none md:mx-auto  list md:flex md:pe-4 order-2 md:order-[0]"
                            >
                                @endif

                                @if (auth('web')->check())

                                    <li class="py-4 lg:mt-0   mt-5"><a
                                            href="{{ route('dashboard.student') }}">{{ trans('website/header.home') }}</a>
                                    </li>
                                    <li class="py-4 lg:mt-0   mt-5"><a
                                            href="{{ route('student.mycourse') }}">{{ trans('website/welcome.my_courses') }}</a>
                                    </li>
                                @endif

                                @if(auth('instructor')->check())

                                    <li class="py-4 lg:mt-0   mt-5"><a
                                            href="{{ route('dashboard.instructor') }}">{{ trans('website/header.home') }}</a>
                                    </li>
                                    <li class="py-4 lg:mt-0   mt-5"><a
                                            href="{{ route('instructor.mycourse') }}">{{ trans('website/welcome.my_courses') }}</a>
                                    </li>

                                @endif


                                <li class="relative md:items-center py-4 lg:mt-0 w-full md:w-auto  mt-5">
                                    <div class="flex items-center" onclick="dropdownfun(this)"><a
                                            href="#">{{ trans('website/header.course') }}</a> <img
                                            src="{{ URL::asset('website/images/downn.svg') }}"
                                            class="w-2 ms-1.5 h-2 object-contain"/></div>

                                    <div
                                        class=" md:absolute select1 w-full  md:w-48 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">

                                        <a class="w-full" href="{{route('all_supporting_course.index')}}">
                                            <p
                                                class=" text-black py-4 px-4 mt-1 cursor-pointer  hover:bg-orange/20  rounded-2xl font-bold text-xs ">
                                                {{ trans('website/header.supporting_course') }}
                                            </p>
                                        </a>

                                        <a class="w-full" href="{{ route('all_languages_courses.index') }}">
                                            <p
                                                class=" text-black py-4 px-4 mt-1 cursor-pointer hover:bg-orange/20 border-b rounded-2xl border-orange/10  font-bold text-xs ">
                                                {{ trans('website/header.language_course') }}
                                            </p>
                                        </a>

                                        <a class="w-full" href="{{ route('all_intensive_courses.index') }}">
                                            <p
                                                class=" text-black py-4 px-4 mt-1 cursor-pointer  hover:bg-orange/20  rounded-2xl font-bold text-xs ">
                                                {{ trans('website/header.intensive_courses') }}</p>
                                        </a>
                                    </div>
                                </li>

                                <li class="py-4 lg:mt-0 mt-5">
                                    <a href="{{ route('contact.create') }}">{{ trans('website/header.contact_us') }} </a>
                                </li>


                                <li class="py-4 lg:mt-0 mt-5"><a
                                        href="{{ route('aboutUs') }}">{{ trans('website/header.about_us') }}</a>
                                </li>
                            </ul>
                            @if(auth('web')->check())
                                <div class="flex items-center mt-6 md:mt-0 w-auto md:min-w-[250px]">
                                    <a href="{{ route('student.subscription') }}"
                                       class=" btn items-center me-3 h-10 justify-center flex  text-center hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] w-full">
                                        <span
                                            class="w-full text-white font-bold text-[13px] ">+ {{ trans('website/header.add') }}</span>
                                    </a>
                                    <p class="fontp  w-full  text-black34 font-bold text-sm leading-[20px] text-start">
                                        {{ Auth::user()->balance }} {{ trans('website/subscription.DA') }}
                                    </p>
                                </div>
                            @endif

                            <div class="order-1 w-full md:w-auto md:flex flex  flex-col-reverse md:flex-row ">

                                <div class="relative   md:ms-auto">
                                    <a href="#" onclick="dropdownfun(this)"
                                       class=" flex mb-2 mt-10 px-4 md:my-2 ms-auto items-center me-2 text-base text-black34 font-semibold"><span
                                            class="me-2">{{ ucfirst(App::getLocale()) }}</span> <span> <img
                                                src="{{ URL::asset('website/images/downn.svg') }}"
                                                class="w-2 h-2 object-contain"/></span>
                                    </a>

                                    <div id="select4"
                                         class=" md:absolute select1 w-full  md:w-48 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">
                                        <ul>
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <li>
                                                    <a style="display: block; width: 100%; height: 100%;"
                                                       rel="alternate"
                                                       hreflang="{{ $localeCode }}"
                                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        <p
                                                            class=" {{ App::getLocale() === $localeCode ? ' text-orange py-4 px-4 cursor-pointer hover:bg-orange/20 bg-orange/20 rounded-2xl border-b border-orange/10   font-bold text-xs ' : ' text-black py-4 px-4 mt-1 cursor-pointer  hover:bg-orange/20  rounded-2xl font-bold text-xs fontt'}}">

                                                            {{ $properties['native'] }}
                                                        </p>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>


                                    </div>

                                </div>

                                <!--  after login add flex and remove hidden  -->
                                @if (auth('web')->check() || auth('instructor')->check())

                                    @if (auth('web')->check())
                                        <div class="relative hidden md:block my-4 md:my-0 ">
                                            <div class=" relative top-auto  md:end-auto cursor-pointer"
                                                 onclick="dropdownfun(this)">
                                                <div
                                                    class=" w-5 h-5 bg-orange rounded-full flex items-center justify-center absolute -top-1 md:start-auto start-10 md:-end-1 z-10">
                                                    <p class=" text-white text-center   font-bold text-[11px] ">
                                                        {{ auth('web')->user()->unreadNotifications->count()  }}
                                                    </p>
                                                </div>
                                                <img class="h-auto ms-4 rounded-full w-10 object-contain relative"
                                                     src="{{ URL::asset('website/images/notification.png') }}"/>
                                            </div>

                                            <div class="md:absolute select1  end-0 overflow-hidden rounded-2xl">
                                                <div
                                                    class=" w-full max-h-96 min-h-96 overflow-y-auto  md:pe-5 overflow-x-hidden md:w-72 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">

                                                    @forelse(auth('web')->user()->notifications->where('type', 'App\Notifications\CreateMeeting')->all() as $notification)
                                                        @if($notification->read_at == null)
                                                            <a href="{{ route('student.specificZoomFromNotification', ['session_id' => $notification->data['sessionId']]) }}">
                                                                <div
                                                                    class=" flex mb-2 relative items-start group px-2 bg-orange/10 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                                    <img data-aos="fade-left"
                                                                         class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                                         src="{{ URL::asset('website/images/notification.png') }}"/>
                                                                    <div class="py-4 px-4">
                                                                        <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                                            {{ $notification->data['courseTitle'] }}</p>
                                                                        <span
                                                                            class=" text-gray  font-medium text-xs fontp">
                                                                {{ trans('website/header.The session') }} {{ $notification->data['sessionName'] }}
                                                            </span>
                                                                        <p class=" text-gray  font-medium text-xs fontp">
                                                                            {{ trans('website/header.startAt') }} {{ $notification->data['sessionStartDate'] }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('student.specificZoomFromNotification', ['session_id' => $notification->data['sessionId']]) }}">
                                                                <div
                                                                    class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                                    <img data-aos="fade-left"
                                                                         class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                                         src="{{ URL::asset('website/images/notification.png') }}"/>
                                                                    <div class="py-4 px-4">
                                                                        <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                                            {{ $notification->data['courseTitle'] }}</p>
                                                                        <span
                                                                            class=" text-gray  font-medium text-xs fontp">
                                                                {{ trans('website/header.The session') }} {{ $notification->data['sessionName'] }}
                                                            </span>
                                                                        <p class=" text-gray  font-medium text-xs fontp">
                                                                            {{ trans('website/header.startAt') }}
                                                                            {{ $notification->data['sessionStartDate'] }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    @empty
                                                    @endforelse

                                                    @forelse(auth('web')->user()->notifications->where('type', 'App\Notifications\ApproveSubscription')->all() as $notification)

                                                        @if($notification->read_at == null)
                                                            <a href="{{ route('student.myCourseFromNotifications',['subscription_id' => $notification->data['subscription_id']]) }}">
                                                                <div
                                                                    class=" flex mb-2  relative items-start group px-2 bg-orange/10 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                                    <img data-aos="fade-left"
                                                                         class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                                         src="{{ URL::asset('website/images/notification.png') }}"/>
                                                                    <div class="py-4 px-4">
                                                                        <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                                            {{ $notification->data['courseTitle'] }}</p>
                                                                        <span
                                                                            class=" text-gray  font-medium text-xs fontp">
                                                                            {{ trans('website/header.CongratulationsYouAreApprovedInThisCourse') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('student.myCourseFromNotifications',['subscription_id' => $notification->data['subscription_id']]) }}">
                                                                <div
                                                                    class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                                    <img data-aos="fade-left"
                                                                         class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                                         src="{{ URL::asset('website/images/notification.png') }}"/>
                                                                    <div class="py-4 px-4">
                                                                        <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                                            {{ $notification->data['courseTitle'] }}</p>
                                                                        <span
                                                                            class=" text-gray  font-medium text-xs fontp">
                                                                            {{ trans('website/header.CongratulationsYouAreApprovedInThisCourse') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    @empty
                                                    @endforelse

                                                    @forelse(auth('web')->user()->notifications->where('type', 'App\Notifications\SpecificStudent')->all() as $notification)
                                                        @if($notification->read_at == null)
                                                            <a href="{{ route('student.readNotification', ['notificationId' => $notification->id]) }}">
                                                                <div
                                                                    class=" flex mb-2 relative items-start group px-2 bg-orange/10 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                                    <img data-aos="fade-left"
                                                                         class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                                         src="{{ URL::asset('website/images/notification.png') }}"/>
                                                                    <div class="py-4 px-4">
                                                                        <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                                            {{ trans('website/header.from Admin') }}
                                                                        </p>
                                                                        <span
                                                                            class=" text-gray  font-medium text-xs fontp">
                                                                        </span>
                                                                        <p class=" text-gray  font-medium text-xs fontp">
                                                                            {{ $notification->data['specificNotification'] }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('student.readNotification', ['notificationId' => $notification->id]) }}">
                                                                <div
                                                                    class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                                    <img data-aos="fade-left"
                                                                         class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                                         src="{{ URL::asset('website/images/notification.png') }}"/>
                                                                    <div class="py-4 px-4">
                                                                        <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                                            {{ trans('website/header.from Admin') }}
                                                                        </p>
                                                                        <span
                                                                            class=" text-gray  font-medium text-xs fontp">
                                                                        </span>
                                                                        <p class=" text-gray  font-medium text-xs fontp">
                                                                            {{ $notification->data['specificNotification'] }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    @empty
                                                    @endforelse

                                                    @if(auth('web')->user()->notifications->count() == 0)
                                                        <div
                                                            class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                            <div class="py-4 px-4">
                                                                    <span
                                                                        class=" text-black  font-medium text-xs fontp">
                                                                        {{ trans('website/header.ThereAreNoNotification') }}
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative hidden md:block mt-5 md:mt-0  ">
                                            <div class="flex  md:py-0   cursor-pointer items-center w-full"
                                                 onclick="dropdownfun(this)">
                                                <img class="h-auto ms-4 rounded-full w-10 object-contain relative"
                                                     src="{{ URL::asset('website/images/profile.png') }}"/>
                                            </div>
                                            <div
                                                class=" md:absolute select1 end-0 md:w-48 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">

                                                <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                    {{ Auth::guard('web')->user()->firstName }}</p>
                                                <p class=" text-gray  font-medium text-xs fontp">{{ Auth::guard('web')->user()->email }}</p>

                                                <div
                                                    class=" flex items-center group mt-3 px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">

                                                    <svg class="w-6 h-6 ms-1" width="16" height="17" viewBox="0 0 16 17"
                                                         fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path class="group-hover:stroke-orange "
                                                              d="M8.10671 7.24805C8.04004 7.24138 7.96004 7.24138 7.88671 7.24805C6.30004 7.19472 5.04004 5.89472 5.04004 4.29472C5.04004 2.66138 6.36004 1.33472 8.00004 1.33472C9.63337 1.33472 10.96 2.66138 10.96 4.29472C10.9534 5.89472 9.69337 7.19472 8.10671 7.24805Z"
                                                              stroke="#292D32" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                        <path class="group-hover:stroke-orange "
                                                              d="M4.77323 9.70821C3.1599 10.7882 3.1599 12.5482 4.77323 13.6215C6.60657 14.8482 9.61323 14.8482 11.4466 13.6215C13.0599 12.5415 13.0599 10.7815 11.4466 9.70821C9.6199 8.48821 6.61323 8.48821 4.77323 9.70821Z"
                                                              stroke="#292D32" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                    </svg>

                                                    @if (auth('instructor')->check())
                                                        <a href="{{ route('instructor.profile') }}"
                                                           class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                                            {{ trans('website/header.my_profile') }}</a>
                                                    @else
                                                        <a href="{{ route('student.profile') }}"
                                                           class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                                            {{ trans('website/header.my_profile') }}</a>
                                                    @endif

                                                </div>
                                                <!-- Logout Authentication -->
                                                @if (auth('web')->check())
                                                    <form method="POST" action="{{ route('logout.student') }}">
                                                        @else
                                                            <form method="POST"
                                                                  action="{{ route('logout.instructor') }}">

                                                                @endif
                                                                @csrf
                                                                <div
                                                                    class=" flex items-center px-2 hover:bg-orange/20  rounded-2xl group">

                                                                    <svg class="w-6 h-6 ms-1" width="24" height="24"
                                                                         viewBox="0 0 24 24"
                                                                         fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path class="group-hover:fill-orange "
                                                                              d="M15.24 22.27H15.11C10.67 22.27 8.53002 20.52 8.16002 16.6C8.12002 16.19 8.42002 15.82 8.84002 15.78C9.24002 15.74 9.62002 16.05 9.66002 16.46C9.95002 19.6 11.43 20.77 15.12 20.77H15.25C19.32 20.77 20.76 19.33 20.76 15.26V8.74C20.76 4.67 19.32 3.23 15.25 3.23H15.12C11.41 3.23 9.93002 4.42 9.66002 7.62C9.61002 8.03 9.26002 8.34 8.84002 8.3C8.42002 8.27 8.12001 7.9 8.15001 7.49C8.49001 3.51 10.64 1.73 15.11 1.73H15.24C20.15 1.73 22.25 3.83 22.25 8.74V15.26C22.25 20.17 20.15 22.27 15.24 22.27Z"
                                                                              fill="#292D32"/>
                                                                        <path class="group-hover:fill-orange "
                                                                              d="M15.0001 12.75H3.62012C3.21012 12.75 2.87012 12.41 2.87012 12C2.87012 11.59 3.21012 11.25 3.62012 11.25H15.0001C15.4101 11.25 15.7501 11.59 15.7501 12C15.7501 12.41 15.4101 12.75 15.0001 12.75Z"
                                                                              fill="#292D32"/>
                                                                        <path class="group-hover:fill-orange "
                                                                              d="M5.84994 16.1C5.65994 16.1 5.46994 16.03 5.31994 15.88L1.96994 12.53C1.67994 12.24 1.67994 11.76 1.96994 11.47L5.31994 8.12C5.60994 7.83 6.08994 7.83 6.37994 8.12C6.66994 8.41 6.66994 8.89 6.37994 9.18L3.55994 12L6.37994 14.82C6.66994 15.11 6.66994 15.59 6.37994 15.88C6.23994 16.03 6.03994 16.1 5.84994 16.1Z"
                                                                              fill="#292D32"/>
                                                                    </svg>
                                                                    <button
                                                                        class=" text-black34 py-4 px-4 cursor-pointer font-bold text-xs "
                                                                        type="submit">
                                                                        {{ trans('website/header.logout') }}
                                                                    </button>
                                                                </div>
                                                            </form>
                                            </div>
                                        </div>
                                    @endif

                                    @if (auth('instructor')->check())
                                        <div class="relative hidden md:block my-4 md:my-0 ">
                                            <div class=" relative top-auto  md:end-auto cursor-pointer"
                                                 onclick="dropdownfun(this)">
                                                <div
                                                    class=" w-5 h-5 bg-orange rounded-full flex items-center justify-center absolute -top-1 md:start-auto start-10 md:-end-1 z-10">
                                                    <p class=" text-white text-center   font-bold text-[11px] ">
                                                        {{ auth('instructor')->user()->unreadnotifications->count() }}
                                                    </p>
                                                </div>
                                                <img class="h-auto ms-4 rounded-full w-10 object-contain relative"
                                                     src="{{ URL::asset('website/images/notification.png') }}"/>
                                            </div>
                                            <div class="md:absolute select1  end-0 overflow-hidden rounded-2xl">
                                                <div
                                                    class=" w-full max-h-96 min-h-96 overflow-y-auto  md:pe-5 overflow-x-hidden md:w-72 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">

                                                    @forelse(auth('instructor')->user()->notifications->where('type', 'App\Notifications\SpecificInstructor')->all() as $notification)
                                                        @if($notification->read_at == null)
                                                            <a href="{{ route('instructor.readNotification', ['notificationId' => $notification->id]) }}">
                                                                <div
                                                                    class=" flex mb-2 relative items-start group px-2 bg-orange/10 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                                    <img data-aos="fade-left"
                                                                         class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                                         src="{{ URL::asset('website/images/notification.png') }}"/>
                                                                    <div class="py-4 px-4">
                                                                        <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                                            {{ trans('website/header.from Admin') }}
                                                                        </p>
                                                                        <span
                                                                            class=" text-gray  font-medium text-xs fontp">
                                                                        </span>
                                                                        <p class=" text-gray  font-medium text-xs fontp">
                                                                            {{ $notification->data['specificNotification'] }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('instructor.readNotification', ['notificationId' => $notification->id]) }}">
                                                                <div
                                                                    class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                                    <img data-aos="fade-left"
                                                                         class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                                         src="{{ URL::asset('website/images/notification.png') }}"/>
                                                                    <div class="py-4 px-4">
                                                                        <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                                                                            {{ trans('website/header.from Admin') }}
                                                                        </p>
                                                                        <span
                                                                            class=" text-gray  font-medium text-xs fontp">
                                                                        </span>
                                                                        <p class=" text-gray  font-medium text-xs fontp">
                                                                            {{ $notification->data['specificNotification'] }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    @empty
                                                    @endforelse

                                                    @if(auth('instructor')->user()->notifications->count() == 0)
                                                        <div
                                                            class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                            <div class="py-4 px-4">
                                                                    <span
                                                                        class=" text-black  font-medium text-xs fontp">
                                                                        {{ trans('website/header.ThereAreNoNotification') }}
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative hidden md:block mt-5 md:mt-0  ">

                                            <div class="flex  md:py-0   cursor-pointer items-center w-full"
                                                 onclick="dropdownfun(this)">
                                                <img class="h-auto ms-4 rounded-full w-10 object-contain relative"
                                                     src="{{ URL::asset('website/images/profile.png') }}"/>
                                            </div>
                                            <div
                                                class=" md:absolute select1 end-0 md:w-48 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">

                                                <p class="text-black34 cursor-pointer font-bold text-sm ">
                                                    {{ Auth::guard('instructor')->user()->firstName }}</p>
                                                <p class=" text-gray  font-medium text-xs fontp">{{ Auth::guard('instructor')->user()->email }}</p>

                                                <div
                                                    class=" flex items-center group mt-3 px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">

                                                    <svg class="w-6 h-6 ms-1" width="16" height="17" viewBox="0 0 16 17"
                                                         fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path class="group-hover:stroke-orange "
                                                              d="M8.10671 7.24805C8.04004 7.24138 7.96004 7.24138 7.88671 7.24805C6.30004 7.19472 5.04004 5.89472 5.04004 4.29472C5.04004 2.66138 6.36004 1.33472 8.00004 1.33472C9.63337 1.33472 10.96 2.66138 10.96 4.29472C10.9534 5.89472 9.69337 7.19472 8.10671 7.24805Z"
                                                              stroke="#292D32" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                        <path class="group-hover:stroke-orange "
                                                              d="M4.77323 9.70821C3.1599 10.7882 3.1599 12.5482 4.77323 13.6215C6.60657 14.8482 9.61323 14.8482 11.4466 13.6215C13.0599 12.5415 13.0599 10.7815 11.4466 9.70821C9.6199 8.48821 6.61323 8.48821 4.77323 9.70821Z"
                                                              stroke="#292D32" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                    </svg>

                                                    @if (auth('instructor')->check())
                                                        <a href="{{ route('instructor.profile') }}"
                                                           class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                                            {{ trans('website/header.my_profile') }}</a>
                                                    @else
                                                        <a href="{{ route('student.profile') }}"
                                                           class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                                            {{ trans('website/header.my_profile') }}</a>
                                                    @endif

                                                </div>

                                                @if (auth('web')->check())
                                                    <form method="POST" action="{{ route('logout.student') }}">
                                                        @else
                                                            <form method="POST"
                                                                  action="{{ route('logout.instructor') }}">

                                                                @endif
                                                                @csrf
                                                                <div
                                                                    class=" flex items-center px-2 hover:bg-orange/20  rounded-2xl group">

                                                                    <svg class="w-6 h-6 ms-1" width="24" height="24"
                                                                         viewBox="0 0 24 24"
                                                                         fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path class="group-hover:fill-orange "
                                                                              d="M15.24 22.27H15.11C10.67 22.27 8.53002 20.52 8.16002 16.6C8.12002 16.19 8.42002 15.82 8.84002 15.78C9.24002 15.74 9.62002 16.05 9.66002 16.46C9.95002 19.6 11.43 20.77 15.12 20.77H15.25C19.32 20.77 20.76 19.33 20.76 15.26V8.74C20.76 4.67 19.32 3.23 15.25 3.23H15.12C11.41 3.23 9.93002 4.42 9.66002 7.62C9.61002 8.03 9.26002 8.34 8.84002 8.3C8.42002 8.27 8.12001 7.9 8.15001 7.49C8.49001 3.51 10.64 1.73 15.11 1.73H15.24C20.15 1.73 22.25 3.83 22.25 8.74V15.26C22.25 20.17 20.15 22.27 15.24 22.27Z"
                                                                              fill="#292D32"/>
                                                                        <path class="group-hover:fill-orange "
                                                                              d="M15.0001 12.75H3.62012C3.21012 12.75 2.87012 12.41 2.87012 12C2.87012 11.59 3.21012 11.25 3.62012 11.25H15.0001C15.4101 11.25 15.7501 11.59 15.7501 12C15.7501 12.41 15.4101 12.75 15.0001 12.75Z"
                                                                              fill="#292D32"/>
                                                                        <path class="group-hover:fill-orange "
                                                                              d="M5.84994 16.1C5.65994 16.1 5.46994 16.03 5.31994 15.88L1.96994 12.53C1.67994 12.24 1.67994 11.76 1.96994 11.47L5.31994 8.12C5.60994 7.83 6.08994 7.83 6.37994 8.12C6.66994 8.41 6.66994 8.89 6.37994 9.18L3.55994 12L6.37994 14.82C6.66994 15.11 6.66994 15.59 6.37994 15.88C6.23994 16.03 6.03994 16.1 5.84994 16.1Z"
                                                                              fill="#292D32"/>
                                                                    </svg>
                                                                    <button
                                                                        class=" text-black34 py-4 px-4 cursor-pointer font-bold text-xs "
                                                                        type="submit">{{ trans('website/header.logout') }}
                                                                    </button>
                                                                </div>
                                                            </form>
                                            </div>
                                        </div>
                                    @endif

                                @else
                                    @if(!auth('admin')->check())
                                        <div class="md:flex items-center w-full md:auto mt-8 m-auto md:mt-0">
                                            <a href="{{ route('login') }}"
                                               class=" btn items-center me-3 h-10 justify-center flex   bg-[#f5f5f5] text-orange border border-orange   hover:text-white hover:bg-orange3 transform hover:scale-[1.01] w-full md:w-32">
                                                <span
                                                    class="  font-bold text-[13px]  ">{{ trans('website/header.sign_in') }}</span>
                                            </a>
                                            @if (Route::has('register'))

                                                <a href="{{ route('register') }}"
                                                   class="btn items-center me-3 h-10 justify-center flex  mt-2 md:mt-0 hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] w-full md:w-32">
                                                    <span
                                                        class=" text-white font-bold text-[13px]  ">{{ trans('website/header.register') }}</span>
                                                </a>

                                            @endif
                                        </div>
                                    @else
                                        <a href="{{ route('dashboard.admin') }}"
                                           class=" btn items-center me-3 h-10 justify-center flex   hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] w-36">
                                            <span
                                                class=" text-white font-bold text-[13px]">{{ trans('website/header.go_admin_panel') }}</span>
                                        </a>
                                    @endif
                                @endif


                                <!--  after login add hidden and remove flex -->
                                <a href="#"
                                   class=" btn items-center hidden mt-4 justify-center   hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] px-12">
                                    <span class=" text-white font-bold text-sm ">Sign in</span>
                                </a>
                            </div>
            </div>
        </div>
    </div>
</header>
