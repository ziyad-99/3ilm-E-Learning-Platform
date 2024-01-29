<!DOCTYPE html>
<html dir="{{ App::getLocale() === 'ar' ? 'rtl' : 'ltr'}}" lang="en">

<head>
    <meta charset="UTF-8">
    @include('website.admin.layouts.style')
    <title>@yield('title')</title>
    @yield('css')
</head>

<body class="bg-[#f5f5f5]">
<div class="bg-[#f5f5f5]  overflow-hidden">

    @if(auth('admin')->check())
        @include('website.admin.layouts.header')

        @include('website.admin.layouts.sidebare')
    @endif

    @yield('content')
</div>

@include('website.admin.layouts.scripts')

@yield('js')

@if(Session::has('message_add_new_admin'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.success("{{ Session::get('message_add_new_admin') }}", "{{ trans('admin/admin.Successfully') }}");
    </script>
@endif

@if(Session::has('message_admin_delete'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.warning("{{ Session::get('message_admin_delete') }}", "{{ trans('admin/admin.Successfully') }}");
    </script>
@endif

@if(Session::has('warning'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.warning("{{ Session::get('warning') }}", "{{ trans('admin/admin.Warning') }}");
    </script>
@endif

@if(Session::has('success'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.success("{{ Session::get('success') }}", "{{ trans('admin/admin.Successfully') }}");
    </script>
@endif

@if(Session::has('error'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.error("{{ Session::get('error') }}", "{{ trans('admin/admin.Error') }}");
    </script>
@endif

</body>

</html>
