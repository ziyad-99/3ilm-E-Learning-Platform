<header class="relative z-10">
    <div class=" lg:px-16 items-center justify-between pt-4">

        <!--  mobile virsion after login remove  hidden  -->
        <div class="w-11/12 flex md:hidden items-center gap-2 justify-end">
            <a href="#" class=" md:hidden">
                <img class=" h-[60px] md:h-[85px] object-contain"
                     src="{{ asset('website/admin/images/logo.png') }}"/>
            </a>

            <div class="ms-auto block lg:hidden ">

                <div class=" relative top-auto  md:end-auto cursor-pointer"
                     onclick="dropdownfun(this)">
                    <div
                        class=" w-5 h-5 bg-orange rounded-full flex items-center justify-center absolute -top-1 md:start-auto start-6 md:-end-1 z-10">
                        <p class=" text-white text-center   font-bold text-[11px] ">
                            {{ auth('admin')->user()->unreadnotifications->count() }}
                        </p>
                    </div>
                    <img class="h-auto  rounded-full w-10 object-contain relative"
                         src="{{ asset('website/admin/images/notification.png') }}"/>
                </div>

                <div
                    class="absolute w-screen shadow-xl z-100 start-0 top-20 p-5 md:w-auto  bg-white select1  end-0 overflow-hidden rounded-2xl">
                    <div
                        class=" w-full max-h-96 min-h-96 overflow-y-auto  md:pe-5 overflow-x-hidden md:w-72 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">
                        @forelse(auth('admin')->user()->notifications->where('type', 'App\Notifications\EnrollmentRequest')->all() as $notification)
                            @if($notification->read_at == null)
                                <a href="{{ route('admin.subscriptionPanelFromNotification', ['subscription_id' => $notification->data['subscription_id']]) }}">
                                    <div
                                        class=" flex mb-2 relative items-start group px-2 bg-orange/10 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                        <img data-aos="fade-left"
                                             class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                             src="{{ URL::asset('website/images/notification.png') }}"/>
                                        <div class="py-4 px-4">
                                            <p class="text-black34 cursor-pointer font-bold text-sm ">
                                                {{ trans('admin/header.NewrequestEnrollment') }}
                                            </p>

                                            <span class=" text-gray  font-medium text-xs fontp">
                                                        {{ trans('admin/header.Course') }}: {{ $notification->data['courseTitle'] }}
                                                    </span>

                                            <p class=" text-gray  font-medium text-xs fontp">
                                                {{ trans('admin/header.Type') }}: {{ $notification->data['courseType'] }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a href="{{ route('admin.subscriptionPanelFromNotification', ['subscription_id' => $notification->data['subscription_id']]) }}">
                                    <div
                                        class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                        <img data-aos="fade-left"
                                             class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                             src="{{ URL::asset('website/images/notification.png') }}"/>
                                        <div class="py-4 px-4">
                                            <p class="text-black34 cursor-pointer font-bold text-sm ">
                                                {{ trans('admin/header.NewrequestEnrollment') }}
                                            </p>
                                            <span class=" text-gray  font-medium text-xs fontp">
                                                        {{ trans('admin/header.Course') }}: {{ $notification->data['courseTitle'] }}
                                                    </span>

                                            <p class=" text-gray  font-medium text-xs fontp">
                                                {{ trans('admin/header.Type') }}: {{ $notification->data['courseType'] }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @empty
                        @endforelse

                        @if(auth('admin')->user()->notifications->count() == 0)
                            <div
                                class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                <div class="py-4 px-4">
                                                <span
                                                    class=" text-black  font-medium text-xs fontp">
                                                    {{ trans('admin/header.ThereAreNoNotification.') }}
                                                </span>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
            <div class=" block lg:hidden md:mt-0  ">

                <div class="flex  md:py-0   cursor-pointer items-center w-full"
                     onclick="dropdownfun(this)">
                    <img class="h-auto ms-2 rounded-full w-10 object-contain relative"
                         src="{{ asset('website/admin/images/profile.png') }}"/>
                </div>
                <div
                    class="absolute w-screen z-100  shadow-xl start-0  top-20 p-5 md:w-auto select1 bg-white end-0 overflow-hidden rounded-2xl">
                    <p class=" text-black34  cursor-pointer      font-bold text-sm ">
                        {{ auth('admin')->user()->name }}
                    </p>
                    <p class=" text-gray  font-medium text-xs fontp">
                        {{ auth('admin')->user()->email }}
                    </p>
                    <form method="POST" action="{{ route('logout.admin') }}">
                        @csrf
                        <div class=" flex items-center px-2 hover:bg-orange/20  rounded-2xl group">
                            <svg class="w-6 h-6 ms-1" width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                            <button type="submit"
                                    class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                {{ trans('admin/header.SignOut') }}
                            </button>

                        </div>
                    </form>


                </div>
            </div>
            <div class="main ms-2 relative z-[10] md:hidden" onclick="openNav()">
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
        </div>


        <div
            class="p-5 pt-4 w-full md:w-[100%] h-screen md:h-auto overflow-y-scroll md:overflow-y-visible lg:p-0 flexsss hidden md:block bg-white md:bg-transparent top-0 right-0 left-0 bottom-0 z-[100]  lg:flex items-center">
            <div class=" md:items-center w-full items-center flex flex-col md:flex-row md:flex">
                <a href="#" class=" md:hidden">
                    <img class=" h-[60px] md:h-[85px] object-contain"
                         src="{{ asset('website/admin/images/logo.png') }}"/>
                </a>


                <div class="order-1 w-full md:w-auto md:flex flex  ms-auto flex-col-reverse md:flex-row ">
                    {{--                    <a href="#" class="fontp text-black34 font-medium text-base my-2">Home</a>--}}

                    <a href="{{ route('admin.welcome') }}"
                       class=" btn items-center me-3 h-10 justify-center flex   hover:text-orange hover:bg-orange3 transform hover:scale-[1.01] w-32">
                        <span class=" text-white font-bold text-[13px]">{{ trans('admin/header.go_to_website') }}</span>
                    </a>

                    <div class="relative   md:ms-auto">
                        <a href="#" onclick="dropdownfun(this)"
                           class=" flex my-4 px-4 md:my-2 ms-auto justify-center items-center me-2 text-base text-black34 font-semibold"><span
                                class="me-2">{{ ucfirst(App::getLocale()) }}</span> <span> <img
                                    src="{{ asset('website/admin/images/downn.svg') }}"
                                    class="w-2 h-2 object-contain"/></span>
                        </a>

                        <div id="select4"
                             class=" md:absolute select1 w-full  md:w-48 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a style="display: block; width: 100%; height: 100%;" rel="alternate"
                                   hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <p
                                        class=" {{ App::getLocale() === $localeCode ? ' text-orange py-4 px-4 cursor-pointer hover:bg-orange/20 bg-orange/20 rounded-2xl border-b border-orange/10   font-bold text-xs ' : ' text-black py-4 px-4 mt-1 cursor-pointer  hover:bg-orange/20  rounded-2xl font-bold text-xs '}}">
                                        {{ $properties['native'] }}
                                    </p>
                                </a>
                            @endforeach

                            {{--                            <a><p--}}
                            {{--                                    class=" text-black py-4 px-4 mt-1 cursor-pointer hover:bg-orange/20 border-b rounded-2xl border-orange/10  font-bold text-xs ">--}}
                            {{--                                    Ar</p></a>--}}
                            {{--                            <a><p--}}
                            {{--                                    class=" text-black py-4 px-4 mt-1 cursor-pointer  hover:bg-orange/20  rounded-2xl font-bold text-xs ">--}}
                            {{--                                    Fr</p></a>--}}

                        </div>
                    </div>

                    <!--  after login add flex and remove hidden  -->
                    <div class="relative hidden md:block my-4 md:my-0 ">
                        <div class=" relative top-auto  md:end-auto cursor-pointer"
                             onclick="dropdownfun(this)">
                            <div
                                class=" w-5 h-5 bg-orange rounded-full flex items-center justify-center absolute -top-1 md:start-auto start-10 md:-end-1 z-10">
                                <p class=" text-white text-center   font-bold text-[11px] ">
                                    {{ auth('admin')->user()->unreadnotifications->count() }}
                                </p>
                            </div>
                            <img class="h-auto ms-4 rounded-full w-10 object-contain relative"
                                 src="{{ asset('website/admin/images/notification.png') }}"/>
                        </div>
                        <div class="md:absolute select1  end-0 overflow-hidden rounded-2xl">
                            <div
                                class=" w-full max-h-96 min-h-96 overflow-y-auto  md:pe-5 overflow-x-hidden md:w-72 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">

                                @forelse(auth('admin')->user()->notifications->where('type', 'App\Notifications\EnrollmentRequest')->all() as $notification)
                                    @if($notification->read_at == null)
                                        <a href="{{ route('admin.subscriptionPanelFromNotification', ['subscription_id' => $notification->data['subscription_id']]) }}">
                                            <div
                                                class=" flex mb-2 relative items-start group px-2 bg-orange/10 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                <img data-aos="fade-left"
                                                     class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                     src="{{ URL::asset('website/images/notification.png') }}"/>
                                                <div class="py-4 px-4">
                                                    <p class="text-black34 cursor-pointer font-bold text-sm ">
                                                        {{ trans('admin/header.NewrequestEnrollment') }}
                                                    </p>

                                                    <span class=" text-gray  font-medium text-xs fontp">
                                                        {{ trans('admin/header.Course') }}: {{ $notification->data['courseTitle'] }}
                                                    </span>

                                                    <p class=" text-gray  font-medium text-xs fontp">
                                                        {{ trans('admin/header.Type') }}: {{ $notification->data['courseType'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.subscriptionPanelFromNotification', ['subscription_id' => $notification->data['subscription_id']]) }}">
                                            <div
                                                class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                                <img data-aos="fade-left"
                                                     class="h-auto mt-4 rounded-full w-10 object-contain relative"
                                                     src="{{ URL::asset('website/images/notification.png') }}"/>
                                                <div class="py-4 px-4">
                                                    <p class="text-black34 cursor-pointer font-bold text-sm ">
                                                        {{ trans('admin/header.NewrequestEnrollment') }}
                                                    </p>
                                                    <span class=" text-gray  font-medium text-xs fontp">
                                                        {{ trans('admin/header.Course') }}: {{ $notification->data['courseTitle'] }}
                                                    </span>

                                                    <p class=" text-gray  font-medium text-xs fontp">
                                                        {{ trans('admin/header.Type') }}: {{ $notification->data['courseType'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @empty
                                @endforelse

                                @if(auth('admin')->user()->notifications->count() == 0)
                                    <div
                                        class=" flex mb-2 items-start group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">
                                        <div class="py-4 px-4">
                                                <span
                                                    class=" text-black  font-medium text-xs fontp">
                                                    {{ trans('admin/header.ThereAreNoNotification.') }}
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
                                 src="{{ asset('website/admin/images/profile.png') }}"/>


                        </div>
                        <div
                            class=" md:absolute select1 end-0 md:w-48 top-12 md:bg-white md:shadow rounded-2xl py-4 md:p-3">
                            <p class=" text-black34  cursor-pointer font-bold text-sm ">
                                {{ auth('admin')->user()->name }}
                            </p>

                            <p class=" text-gray  font-medium text-xs fontp">
                                {{ auth('admin')->user()->email }}
                            </p>

                            {{--                            <div--}}
                            {{--                                class=" flex items-center group mt-3 px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">--}}

                            {{--                                <svg class="w-6 h-6 ms-1" width="16" height="17" viewBox="0 0 16 17" fill="none"--}}
                            {{--                                     xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                    <path class="group-hover:stroke-orange "--}}
                            {{--                                          d="M8.10671 7.24805C8.04004 7.24138 7.96004 7.24138 7.88671 7.24805C6.30004 7.19472 5.04004 5.89472 5.04004 4.29472C5.04004 2.66138 6.36004 1.33472 8.00004 1.33472C9.63337 1.33472 10.96 2.66138 10.96 4.29472C10.9534 5.89472 9.69337 7.19472 8.10671 7.24805Z"--}}
                            {{--                                          stroke="#292D32" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                    <path class="group-hover:stroke-orange "--}}
                            {{--                                          d="M4.77323 9.70821C3.1599 10.7882 3.1599 12.5482 4.77323 13.6215C6.60657 14.8482 9.61323 14.8482 11.4466 13.6215C13.0599 12.5415 13.0599 10.7815 11.4466 9.70821C9.6199 8.48821 6.61323 8.48821 4.77323 9.70821Z"--}}
                            {{--                                          stroke="#292D32" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                </svg>--}}

                            {{--                                <p class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">--}}
                            {{--                                    My Profile</p>--}}

                            {{--                            </div>--}}
                            {{--                            <div--}}
                            {{--                                class=" flex items-center group px-2 hover:bg-orange/20 border-b border-orange/10 rounded-2xl group">--}}
                            {{--                                <svg class="w-6 h-6 ms-1 " width="16" height="17" viewBox="0 0 16 17" fill="none"--}}
                            {{--                                     xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                    <path class="group-hover:stroke-orange "--}}
                            {{--                                          d="M14.6666 12.157V4.11037C14.6666 3.31037 14.0133 2.71703 13.2199 2.7837H13.1799C11.7799 2.9037 9.65325 3.61703 8.46658 4.3637L8.35325 4.43703C8.15992 4.55703 7.83992 4.55703 7.64659 4.43703L7.47992 4.33703C6.29325 3.59703 4.17325 2.89037 2.77325 2.77703C1.97992 2.71037 1.33325 3.31037 1.33325 4.1037V12.157C1.33325 12.797 1.85325 13.397 2.49325 13.477L2.68659 13.5037C4.13325 13.697 6.36659 14.4304 7.64659 15.1304L7.67325 15.1437C7.85325 15.2437 8.13992 15.2437 8.31325 15.1437C9.59325 14.437 11.8333 13.697 13.2866 13.5037L13.5066 13.477C14.1466 13.397 14.6666 12.797 14.6666 12.157Z"--}}
                            {{--                                          stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                    <path class="group-hover:stroke-orange " d="M8 4.65698V14.657" stroke="#333333"--}}
                            {{--                                          stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                    <path class="group-hover:stroke-orange " d="M5.16675 6.65698H3.66675"--}}
                            {{--                                          stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                    <path class="group-hover:stroke-orange " d="M5.66675 8.65698H3.66675"--}}
                            {{--                                          stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>--}}
                            {{--                                </svg>--}}

                            {{--                                <p class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">--}}
                            {{--                                    Settings</p>--}}

                            {{--                            </div>--}}

                            <form method="POST" action="{{ route('logout.admin') }}">
                                @csrf
                                <div class=" flex items-center px-2 hover:bg-orange/20  rounded-2xl group">
                                    <svg class="w-6 h-6 ms-1" width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                                    <button type="submit"
                                            class=" text-black34 py-4 px-4 cursor-pointer      font-bold text-xs ">
                                        {{ trans('admin/header.SignOut') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
