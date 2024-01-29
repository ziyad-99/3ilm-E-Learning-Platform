<!DOCTYPE html>
<html dir="{{ App::getLocale() === 'ar' ? 'rtl' : 'ltr'}}" lang="en">

<head>
    <meta charset="UTF-8">
    @include('website.layouts.style')
    <title>@yield('title')</title>
    @yield('css')
</head>

<body class=" ">
<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "104454959943933");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v18.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/ar_AR/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<div class="bg-[#f5f5f5]  overflow-hidden">
    @include('website.layouts.header')
    <div class="mt-20">
        @yield('content')
    </div>
    @include('website.layouts.footer')
</div>

@include('website.layouts.scripts')

@yield('js')

@if(Session::has('message'))
    <script>
        toastr.options = {
            "progressBar": true,
        }
        toastr.success("{{ Session::get('message') }}");
    </script>
@endif

@if(Session::has('message_already_waitingList'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.warning("{{ Session::get('message_already_waitingList') }}", "{{ trans('admin/admin.Warning') }}");
    </script>
@endif

@if(Session::has('message_add_waitingList'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.success("{{ Session::get('message_add_waitingList') }}", "{{ trans('admin/admin.Successfully') }}");
    </script>
@endif

@if(Session::has('message_balance_less'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.error("{{ Session::get('message_balance_less') }}", "{{ trans('admin/admin.Warning') }}");
    </script>
@endif

@if(Session::has('message_profile_updated'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.success("{{ Session::get('message_profile_updated') }}", "{{ trans('admin/admin.Successfully') }}");
    </script>
@endif

@if(Session::has('message_password_changed'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.success("{{ Session::get('message_password_changed') }}", "{{ trans('admin/admin.Successfully') }}");
    </script>
@endif

@if(Session::has('message_oldPassword_incorrect'))
    <script>
        toastr.options = {
            "progressBar": true,
        }
        toastr.error("{{ Session::get('message_oldPassword_incorrect') }}", "{{ trans('admin/admin.Error') }}");
    </script>
@endif

@if(Session::has('message_socialMedia_updated'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.success("{{ Session::get('message_socialMedia_updated') }}", "{{ trans('admin/admin.Successfully') }}");
    </script>
@endif

@if(Session::has('message_resource_add'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.success("{{ Session::get('message_resource_add') }}", "{{ trans('admin/admin.Successfully') }}");
    </script>
@endif

@if(Session::has('message_resource_delete'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.warning("{{ Session::get('message_resource_delete') }}", "{{ trans('admin/admin.Warning') }}");
    </script>
@endif

@if(Session::has('message_add_new_quiz'))
    <script>
        toastr.options = {
            "progressBar": true,
        }
        toastr.success("{{ Session::get('message_add_new_quiz') }}", "{{ trans('admin/admin.Successfully') }}");
    </script>
@endif

@if(Session::has('message_no_sessions'))
    <script>
        toastr.options = {
            "progressBar": true,
        }
        toastr.warning("{{ Session::get('message_no_sessions') }}", "{{ trans('admin/admin.Warning') }}");
    </script>
@endif

@if(Session::has('message_quiz_done'))
    <script>
        toastr.options = {
            "progressBar": true,
        }
        toastr.success("{{ Session::get('message_quiz_done') }}", "{{ trans('admin/admin.Successfully') }}");
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

@if(Session::has('warning'))
    <script>
        toastr.options = {
            "progressBar": true,
        }

        toastr.warning("{{ Session::get('warning') }}", "{{ trans('admin/admin.Warning') }}");
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
