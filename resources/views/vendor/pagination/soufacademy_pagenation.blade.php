@if ($paginator->hasPages())

    <div class=" flex w-full md:w-3/12 lg:pe-4 ms-auto">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())

            <a class="ms-auto h-12 w-12 rounded-s hover:bg-orange cursor-pointer hover:fill-white border border-[#c3c3c3] flex justify-center items-center disabled"
               aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true"> <svg class=" transform   rtl:-scale-100" width="6" height="11"
                                               viewBox="0 0 6 11"
                                               fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5 10L1.32547 6.29545C0.891511 5.85795 0.891511 5.14205 1.32547 4.70455L5 1"
                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                    stroke-linecap="round" stroke-linejoin="round"/>
            </svg></span>
            </a>
        @else
            <a class="ms-auto h-12 w-12 rounded-s hover:bg-orange cursor-pointer hover:fill-white border border-[#c3c3c3] flex justify-center items-center"
               href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <svg class=" transform   rtl:-scale-100" width="6" height="11" viewBox="0 0 6 11"
                     fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 10L1.32547 6.29545C0.891511 5.85795 0.891511 5.14205 1.32547 4.70455L5 1"
                        stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

        @endif



        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{--                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>--}}

                        <a href="{{ $url }}"
                           class="active bg-orange font-bold  text-white h-12 w-12 flex justify-center items-center ">
                            <span class=" text-base ">{{ $page }}</span>
                        </a>
                    @else
                        <a class="disabled border border-[#c3c3c3]  text-black2 h-12 w-12 flex justify-center items-center "
                           href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())

            <a class=" h-12 w-12 me-auto md:me-0 rounded-e border hover:bg-orange cursor-pointer hover:text-white border-[#c3c3c3] flex justify-center items-center"
               href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <svg class=" transform   rtl:-scale-100" width="6" height="11" viewBox="0 0 6 11"
                     fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 1L4.67453 4.70455C5.10849 5.14205 5.10849 5.85795 4.67453 6.29545L1 10"
                        stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>


            {{--            <div--}}
            {{--                class=" h-12 w-12 me-auto md:me-0 rounded-e border hover:bg-orange cursor-pointer hover:text-white border-[#c3c3c3] flex justify-center items-center">--}}
            {{--                <svg class=" transform   rtl:-scale-100" width="6" height="11" viewBox="0 0 6 11"--}}
            {{--                     fill="none" xmlns="http://www.w3.org/2000/svg">--}}
            {{--                    <path--}}
            {{--                        d="M1 1L4.67453 4.70455C5.10849 5.14205 5.10849 5.85795 4.67453 6.29545L1 10"--}}
            {{--                        stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"--}}
            {{--                        stroke-linecap="round" stroke-linejoin="round"/>--}}
            {{--                </svg>--}}


            {{--            </div>--}}

        @else
{{--            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}
{{--                <span aria-hidden="true">&rsaquo;</span>--}}
{{--            </li>--}}

            <div
                aria-disabled="true" aria-label="@lang('pagination.next')"
                class="disabled h-12 w-12 me-auto md:me-0 rounded-e border hover:bg-orange cursor-pointer hover:text-white border-[#c3c3c3] flex justify-center items-center">
                <svg class=" transform   rtl:-scale-100" width="6" height="11" viewBox="0 0 6 11"
                     fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 1L4.67453 4.70455C5.10849 5.14205 5.10849 5.85795 4.67453 6.29545L1 10"
                        stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round"/>
                </svg>


            </div>
        @endif


        {{--        <a href=""--}}
        {{--           class="ms-auto h-12 w-12 rounded-s hover:bg-orange cursor-pointer hover:fill-white border border-[#c3c3c3] flex justify-center items-center">--}}
        {{--            <svg class=" transform   rtl:-scale-100" width="6" height="11" viewBox="0 0 6 11"--}}
        {{--                 fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                <path--}}
        {{--                    d="M5 10L1.32547 6.29545C0.891511 5.85795 0.891511 5.14205 1.32547 4.70455L5 1"--}}
        {{--                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"--}}
        {{--                    stroke-linecap="round" stroke-linejoin="round"/>--}}
        {{--            </svg>--}}

        {{--        </a>--}}


        {{--        <div--}}
        {{--            class=" bg-orange font-bold  text-white h-12 w-12 flex justify-center items-center ">--}}
        {{--            <span class=" text-base ">1</span>--}}
        {{--        </div>--}}
        {{--        <div--}}
        {{--            class=" border border-[#c3c3c3] hover:bg-orange cursor-pointer hover:text-white text-black2 h-12 w-12 flex justify-center items-center ">--}}
        {{--            <span class=" text-base ">2</span>--}}
        {{--        </div>--}}
        {{--        <div--}}
        {{--            class=" border border-[#c3c3c3]  text-black2 h-12 w-12 flex justify-center items-center ">--}}
        {{--            <span class=" text-base ">...</span>--}}
        {{--        </div>--}}
        {{--        <div--}}
        {{--            class=" border border-[#c3c3c3] hover:bg-orange cursor-pointer hover:text-white text-black2 h-12 w-12 flex justify-center items-center ">--}}
        {{--            <span class=" text-base ">10</span>--}}
        {{--        </div>--}}
{{--        <div--}}
        {{--            class=" h-12 w-12 me-auto md:me-0 rounded-e border hover:bg-orange cursor-pointer hover:text-white border-[#c3c3c3] flex justify-center items-center">--}}
        {{--            <svg class=" transform   rtl:-scale-100" width="6" height="11" viewBox="0 0 6 11"--}}
        {{--                 fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                <path--}}
        {{--                    d="M1 1L4.67453 4.70455C5.10849 5.14205 5.10849 5.85795 4.67453 6.29545L1 10"--}}
        {{--                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"--}}
        {{--                    stroke-linecap="round" stroke-linejoin="round"/>--}}
        {{--            </svg>--}}


        {{--        </div>--}}
    </div>
@endif
