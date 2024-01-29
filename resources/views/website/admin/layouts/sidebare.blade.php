<div id="sidebaradmin"
     class="hidden md:block absolute md:fixed bg-orange h-screen start-0 top-0 p-3 overflow-hidden botom-0 w-[85vw]  md:w-20 z-50 tran bg-gray-light transition-all	duration-700"
     onmouseenter="setMouse(true,this)"
     onmouseleave="setMouse(false,this)">

    <div class=" flex items-center">
        <a href="{{ route('dashboard.admin') }}">
            <img class=" h-[60px] md:h-[56px] object-contain" src="{{ asset('website/admin/images/logoadmin.png') }}"/>
        </a>
    </div>

    <div class="mt-5">
        <a href="{{ route('dashboard.admin') }}" class="pt-10">
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/admin/dashboard.svg') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal	duration-700  text-white fontp text-base">
                    {{ trans('admin/sidebare.dashboard') }}
                </h4>
            </div>
        </a>
    </div>

    @can('show_role')
        <a href="{{ route('admin.allRoles') }}">
            {{--        <div class="flex items-center bg-white/40 rounded-2xl py-3.5 mb-6">--}}
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/adminPermission.png') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp f text-base">
                    {{ trans('admin/admin.Role and permission') }}
                </h4>
            </div>
        </a>
    @endcan

    @can('show_admins')
        <a href="{{ route('admin.allAdmins') }}">
            {{--        <div class="flex items-center bg-white/40 rounded-2xl py-3.5 mb-6">--}}
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/admin/admins.svg') }}" alt="Logo" class="w-6 h-6 mx-3"/>

                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp f text-base">
                    {{ trans('admin/sidebare.Admins') }}
                </h4>
            </div>
        </a>
    @endcan

    @if(auth()->user()->can('show_supporting_courses') || auth()->user()->can('show_languages_courses') || auth()->user()->can('show_intensive_courses'))
        <a href="{{ route('admin.coursesPanel') }}">
            {{--        <div class="flex items-center bg-white/40 rounded-2xl py-3.5 mb-6">--}}
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/admin/courese.svg') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp f text-base">
                    {{ trans('admin/sidebare.courses') }}
                </h4>
            </div>
        </a>
    @endif

    @can('show_groups')
        <a href="{{ route('admin.allGroups') }}">
            {{--        <div class="flex items-center bg-white/40 rounded-2xl py-3.5 mb-6">--}}
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/groups.png') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp f text-base">
                    {{ trans('admin/sidebare.Groups') }}
                </h4>
            </div>
        </a>
    @endcan

    @can('show_student')
        <a href="{{ route('admin.allStudents') }}">
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/admin/student.svg') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp text-base">
                    {{ trans('admin/sidebare.students') }}</h4>
            </div>
        </a>
    @endcan

    @can('show_instructor')
        <a href="{{ route('admin.allInstructor') }}">
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/admin/instractor.svg') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp text-base">
                    {{ trans('admin/sidebare.instructors') }}
                </h4>
            </div>
        </a>
    @endcan

    @can('show_contact_us')
        <a href='{{ route('admin.allContactUs') }}'>
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/admin/email.svg') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp f text-base">
                    {{ trans('admin/contact_us.contact_us') }}
                </h4>
            </div>
        </a>
    @endcan

    @can('show_course_subscription')
        <a href='{{ route('admin.all_subscriptions') }}'>
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/admin/subs.svg') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap font-normal duration-700 text-white fontp text-base">
                    {{ trans('admin/allSubscriptions.subscriptions') }}
                </h4>
            </div>
        </a>
    @endcan

    @can('show_financial_reports')

        <a href='{{ route('admin.financialPanel') }}'>
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/admin/finaces.svg') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp text-base">
                    {{ trans('admin/sidebare.Financials') }}
                </h4>
            </div>
        </a>
    @endcan

    @can('send_notifications')
        <a href='{{ route('admin.notification') }}'>
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/admin/notifications.svg') }}" alt="Logo" class="w-6 h-6 mx-3"/>
                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap font-normal duration-700  text-white fontp text-base">
                    {{ trans('admin/sidebare.Notifications') }}
                </h4>
            </div>
        </a>
    @endcan

    @can('show_ccp_subscriptions')
        <a href='{{ route('admin.allCCPSubscription') }}'>
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/pay.png') }}" alt="Logo" class="w-6 h-6 mx-3"/>

                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp  text-base">
                    {{ trans('admin/sidebare.CCPPayments') }}
                </h4>
            </div>
        </a>
    @endcan

    @can('show_subscriptions_codes')
        <a href='{{ route('admin.allSubscriptionCodes') }}'>
            <div class="flex items-center bg-blue-light rounded py-2 mb-0">
                <img src="{{ asset('website/admin/images/code.png') }}" alt="Logo" class="w-6 h-6 mx-3"/>

                <h4 class="w-36 md:w-0 qqq overflow-hidden	transition-all whitespace-nowrap	font-normal duration-700  text-white fontp  text-base">
                    {{ trans('admin/sidebare.GenerateCodes') }}
                </h4>
            </div>
        </a>
    @endcan
</div>
