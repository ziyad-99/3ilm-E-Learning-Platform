<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
console.log('fffff')
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "104454959943933");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v18.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/ar_AR/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<footer class="w-full z-0  relative overflow-hidden">
    <div class="widthfull border-b border-[#fff] pb-14 px-0 pt-24 relative">

        <div class=" flex p-4 md:p-0 flex-wrap w-full items-start justify-between">
            <p
                class="fontp w-full mt-4 md:mt-0 md:w-5/12 text-white font-medium text-3xl md:text-4xl leading-[120%] md:leading-[100%] text-start">
                {{ trans('website/footer.number_platform') }}.
            </p>

            <div class="w-full mt-4 md:mt-0 md:w-3/12">
                <div class=" flex items-center">
                    <img class="h-5 w-auto" src="{{ URL::asset('website/images/location.svg') }}"/>
                    <p class="ps-2 text-white font-medium text-base leading-[160%]  text-start">
                        {{ trans('website/footer.address') }}
                    </p>
                </div>
                <div class=" flex  items-center  mt-5">
                    <img class="h-5 w-auto" src="{{ URL::asset('website/images/mail.svg') }}"/>
                    <p class="ps-2 text-white font-medium text-base leading-[160%] text-start">
                        {{ trans('website/footer.email') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class=" widthfull flex flex-wrap justify-between items-center px-0 py-5">

        <div class=" flex md:w-4/12 w-full justify-center md:justify-start">
            @if (auth('web')->check())
                <a href="{{ route('dashboard.student') }}">
                    <p class="ps-2 text-white hover:font-semibold font-normal text-sm leading-[160%] text-start">
                        {{ trans('website/header.home') }}
                    </p>
                </a>
            @endif

            @if (auth('instructor')->check())
                <a href="{{ route('dashboard.instructor') }}">
                    <p class="ps-2 text-white hover:font-semibold font-normal text-sm leading-[160%] text-start">
                        {{ trans('website/header.home') }}
                    </p>
                </a>
            @endif

            <a href="{{ route('aboutUs') }}">
                <p class="ps-2 text-white hover:font-semibold font-normal text-sm leading-[160%] text-start">
                    {{ trans('website/header.about_us') }}
                </p>
            </a>

            <a href="{{ route('contact.create') }}">
                <p class="ps-2 text-white hover:font-semibold font-normal text-sm leading-[160%] text-start">
                    {{ trans('website/header.contact_us') }}
                </p>
            </a>

            <a href="{{ route('terms&privacy') }}">
                <p class="ps-2 text-white hover:font-semibold font-normal text-sm leading-[160%] text-start">
                    {{ trans('website/footer.terms_and_privacy') }}
                </p>
            </a>

        </div>
        <div class=" flex gap-3 md:w-3/12 w-full my-5 justify-center md:justify-center ">
            <a>
                <svg class="group hover:fill-white " width="28" height="28" viewBox="0 0 28 28" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <circle cx="14" cy="14" r="13.5" stroke="white"/>
                    <path class="group-hover:fill-orange"
                          d="M20.2071 10.9831C19.7881 11.1693 19.3458 11.2857 18.8802 11.3556C19.3458 11.0762 19.7183 10.6339 19.8812 10.0985C19.4389 10.3546 18.9501 10.5408 18.4146 10.6572C17.9956 10.2149 17.3904 9.93555 16.7386 9.93555C15.4815 9.93555 14.4572 10.9598 14.4572 12.2169C14.4572 12.4031 14.4805 12.5661 14.5271 12.729C12.6415 12.6359 10.9421 11.728 9.80141 10.3313C9.61518 10.6805 9.49878 11.0529 9.49878 11.472C9.49878 12.2634 9.89453 12.9618 10.5231 13.3808C10.1506 13.3576 9.80141 13.2644 9.4755 13.1015V13.1248C9.4755 14.2422 10.267 15.1733 11.3145 15.3828C11.1283 15.4294 10.9188 15.4527 10.7093 15.4527C10.5696 15.4527 10.4067 15.4294 10.267 15.4061C10.5696 16.314 11.4077 16.9891 12.4087 16.9891C11.6172 17.5943 10.6395 17.9668 9.56862 17.9668C9.38239 17.9668 9.19616 17.9668 9.0332 17.9435C10.0575 18.5953 11.2447 18.9678 12.5483 18.9678C16.7618 18.9678 19.0665 15.476 19.0665 12.4497C19.0665 12.3566 19.0665 12.2402 19.0665 12.1471C19.5088 11.8444 19.9045 11.4487 20.2071 10.9831Z"
                          fill="white"/>
                </svg>
            </a>
            <a>
                <svg class="group hover:fill-white " class=" mx-2" width="28" height="28" viewBox="0 0 28 28"
                     fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="14" cy="14" r="13.5" stroke="white"/>
                    <path class="group-hover:fill-orange"
                          d="M12.7087 20.3038V14.7503H10.8398V12.5859H12.7087V10.9898C12.7087 9.13752 13.84 8.12891 15.4924 8.12891C16.2839 8.12891 16.9642 8.18784 17.1624 8.21417V10.1499L16.0164 10.1505C15.1178 10.1505 14.9438 10.5775 14.9438 11.2041V12.5859H17.087L16.8079 14.7503H14.9438V20.3038H12.7087Z"
                          fill="white"/>
                </svg>
                <a>
                    <svg class="group hover:fill-white " width="28" height="28" viewBox="0 0 28 28" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle cx="14" cy="14" r="13.5" stroke="white"/>
                        <path class="group-hover:fill-orange"
                              d="M14.0008 8.44623C15.8095 8.44623 16.0237 8.45301 16.7382 8.48559C17.1678 8.49084 17.5933 8.56973 17.9962 8.71881C18.2884 8.8315 18.5538 9.00413 18.7753 9.22559C18.9967 9.44704 19.1694 9.71241 19.282 10.0046C19.4311 10.4076 19.51 10.8331 19.5153 11.2627C19.5475 11.9772 19.5546 12.1914 19.5546 14.0001C19.5546 15.8088 19.5479 16.023 19.5153 16.7375C19.51 17.1671 19.4311 17.5926 19.282 17.9956C19.1694 18.2878 18.9967 18.5532 18.7753 18.7746C18.5538 18.9961 18.2884 19.1687 17.9962 19.2814C17.5933 19.4305 17.1678 19.5094 16.7382 19.5146C16.024 19.5469 15.8098 19.554 14.0008 19.554C12.1917 19.554 11.9775 19.5472 11.2633 19.5146C10.8337 19.5094 10.4082 19.4305 10.0053 19.2814C9.71307 19.1687 9.44769 18.9961 9.22624 18.7746C9.00479 18.5532 8.83216 18.2878 8.71947 17.9956C8.57038 17.5926 8.4915 17.1671 8.48624 16.7375C8.45398 16.023 8.44689 15.8088 8.44689 14.0001C8.44689 12.1914 8.45366 11.9772 8.48624 11.2627C8.4915 10.8331 8.57038 10.4076 8.71947 10.0046C8.83216 9.71241 9.00479 9.44704 9.22624 9.22559C9.44769 9.00413 9.71307 8.8315 10.0053 8.71881C10.4082 8.56973 10.8337 8.49084 11.2633 8.48559C11.9779 8.45333 12.192 8.44623 14.0008 8.44623ZM14.0008 7.22559C12.162 7.22559 11.9304 7.23333 11.2079 7.26623C10.6456 7.27741 10.0893 7.38387 9.56269 7.58107C9.11092 7.75128 8.70172 8.01803 8.36366 8.36268C8.01869 8.70087 7.75172 9.11029 7.5814 9.56236C7.3842 10.089 7.27775 10.6453 7.26656 11.2075C7.2343 11.9295 7.22656 12.1611 7.22656 13.9998C7.22656 15.8385 7.2343 16.0701 7.26721 16.7927C7.27839 17.3549 7.38485 17.9112 7.58205 18.4378C7.75218 18.8898 8.01892 19.2993 8.36366 19.6375C8.70191 19.9823 9.11133 20.249 9.56334 20.4191C10.09 20.6163 10.6463 20.7228 11.2085 20.734C11.9311 20.7662 12.1617 20.7746 14.0014 20.7746C15.8411 20.7746 16.0717 20.7669 16.7943 20.734C17.3565 20.7228 17.9128 20.6163 18.4395 20.4191C18.8893 20.2448 19.2978 19.9784 19.6389 19.6371C19.98 19.2959 20.246 18.8872 20.4201 18.4372C20.6173 17.9106 20.7238 17.3543 20.735 16.792C20.7672 16.0701 20.775 15.8385 20.775 13.9998C20.775 12.1611 20.7672 11.9295 20.7343 11.2069C20.7231 10.6446 20.6167 10.0884 20.4195 9.56171C20.2493 9.10971 19.9826 8.70029 19.6379 8.36204C19.2996 8.0173 18.8902 7.75056 18.4382 7.58042C17.9115 7.38322 17.3553 7.27677 16.793 7.26559C16.0711 7.23333 15.8395 7.22559 14.0008 7.22559Z"
                              fill="white"/>
                        <path class="group-hover:fill-orange"
                              d="M14.0021 10.5215C13.3141 10.5215 12.6416 10.7255 12.0695 11.1078C11.4974 11.49 11.0515 12.0333 10.7882 12.6689C10.5249 13.3046 10.4561 14.0041 10.5903 14.6789C10.7245 15.3537 11.0558 15.9735 11.5423 16.46C12.0288 16.9465 12.6487 17.2778 13.3235 17.4121C13.9983 17.5463 14.6977 17.4774 15.3334 17.2141C15.969 16.9508 16.5123 16.5049 16.8946 15.9329C17.2768 15.3608 17.4809 14.6882 17.4809 14.0002C17.4809 13.0776 17.1144 12.1928 16.462 11.5404C15.8096 10.888 14.9248 10.5215 14.0021 10.5215ZM14.0021 16.2583C13.5555 16.2583 13.119 16.1258 12.7476 15.8777C12.3763 15.6296 12.0869 15.2769 11.916 14.8643C11.7451 14.4517 11.7003 13.9977 11.7875 13.5597C11.8746 13.1216 12.0897 12.7193 12.4055 12.4035C12.7213 12.0877 13.1236 11.8726 13.5616 11.7855C13.9996 11.6984 14.4537 11.7431 14.8663 11.914C15.2789 12.0849 15.6315 12.3743 15.8797 12.7457C16.1278 13.117 16.2602 13.5536 16.2602 14.0002C16.2602 14.5991 16.0223 15.1734 15.5988 15.5969C15.1754 16.0204 14.601 16.2583 14.0021 16.2583Z"
                              fill="white"/>
                        <path class="group-hover:fill-orange"
                              d="M17.6176 11.1961C18.0665 11.1961 18.4305 10.8322 18.4305 10.3832C18.4305 9.93426 18.0665 9.57031 17.6176 9.57031C17.1686 9.57031 16.8047 9.93426 16.8047 10.3832C16.8047 10.8322 17.1686 11.1961 17.6176 11.1961Z"
                              fill="white"/>
                    </svg>
                </a>
        </div>
        <p
            class="ps-2 md:w-4/12 w-full justify-center text-center md:justify-end text-white font-normal text-sm leading-[160%]">
            {{ trans('website/footer.copyright') }}
        </p>
    </div>
</footer>
