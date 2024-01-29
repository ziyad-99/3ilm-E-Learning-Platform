@extends('website.layouts.master')

@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">Instructor Panel</h3>

                <div class=" bg-white  boxshadow2 rounded-xl px-0 py-6 mt-10 w-full mx-auto ">
                    <div class=" w-full px-6 border-b pb-4 pt-4 border-[#E2E2E2] border-solid">
                        <p class="font-bold fontp text-center  text-xl">1AS Mathematics - 2nd Unit - 7th lesson</p>
                        <p class="font-medium fontp text-center mt-4 text-base">1AS - Group 3</p>
                        <p class="font-medium fontp text-orange text-center mt-4 text-base">Scientific Branch</p>


                    </div>
                    <div class=" py-10 px-4 ">
                        <a
                            class="w-40 btn items-center  justify-center hover:bg-orange3 cursor-pointer flex mb-7 px-6 me-6">
                            <span class=" text-white font-bold text-sm ">Create New Quiz</span>
                        </a>
                        <div title="Quiz" class=" w-full overflow-x-auto md:overflow-x-visible ">
                            <div class="min-w-[600px]">
                                <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">
                                    <div class="flex">
                                        <p class="font-bold text-gray2 w-3/12 text-[15px] pb-2">Name</p>
                                        <p class="font-bold text-gray2 w-3/12 text-[15px] text-center  pb-2">Type
                                        </p>
                                        <p
                                            class="font-bold text-gray2 ms-auto w-3/12 text-[15px] text-center  pb-2">
                                            Total Questions</p>
                                        <p class="font-bold text-gray2 ms-auto w-3/12 text-[15px] text-end  pb-2">
                                            Action</p>

                                    </div>
                                </div>
                                <div class="flex items-center p-6 py-6 border-b border-[#E2E2E2]/50 border-solid">
                                    <h5 class=" text-base w-3/12 font-bold text-black2">Math Test - Lesson 1</h5>

                                    <p class="font-medium fontp w-3/12 text-[15px] text-center ">Multiple Choice</p>
                                    <p class="font-medium fontp  w-3/12 text-[15px] text-center">13</p>
                                    <div class="flex items-center gap-2 justify-end w-3/12">
                                        <a>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2Z"
                                                    stroke="#BDBDBD" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                <path
                                                    d="M12.9098 7.84015L7.71979 13.0302C7.51979 13.2302 7.3298 13.6202 7.2898 13.9002L7.0098 15.8802C6.9098 16.6002 7.40979 17.1002 8.12979 17.0002L10.1098 16.7202C10.3898 16.6802 10.7798 16.4902 10.9798 16.2902L16.1698 11.1002C17.0598 10.2102 17.4898 9.17015 16.1698 7.85015C14.8498 6.52015 13.8098 6.94015 12.9098 7.84015Z"
                                                    stroke="#BDBDBD" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                                <path
                                                    d="M12.1699 8.58008C12.6099 10.1501 13.8399 11.3901 15.4199 11.8301"
                                                    stroke="#BDBDBD" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <a>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.81043 2L5.19043 5.63" stroke="#FF0000"
                                                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path d="M15.1904 2L18.8104 5.63" stroke="#FF0000"
                                                      stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path
                                                    d="M2 7.84961C2 5.99961 2.99 5.84961 4.22 5.84961H19.78C21.01 5.84961 22 5.99961 22 7.84961C22 9.99961 21.01 9.84961 19.78 9.84961H4.22C2.99 9.84961 2 9.99961 2 7.84961Z"
                                                    stroke="#FF0000" stroke-width="1.5"/>
                                                <path d="M9.75977 14V17.55" stroke="#FF0000" stroke-width="1.5"
                                                      stroke-linecap="round"/>
                                                <path d="M14.3604 14V17.55" stroke="#FF0000" stroke-width="1.5"
                                                      stroke-linecap="round"/>
                                                <path
                                                    d="M3.5 10L4.91 18.64C5.23 20.58 6 22 8.86 22H14.89C18 22 18.46 20.64 18.82 18.76L20.5 10"
                                                    stroke="#FF0000" stroke-width="1.5" stroke-linecap="round"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
