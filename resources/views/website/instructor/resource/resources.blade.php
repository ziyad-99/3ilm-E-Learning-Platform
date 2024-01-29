@extends('website.layouts.master')

@section('title')
    {{ trans('website/website.Add new Resource') }}
@endsection

@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">{{ trans('website/website.Add new Resource') }}</h3>


                <div class=" py-10 px-4 ">
                    <div class=" bg-white  boxshadow2 rounded-xl px-0 py-6 mt-10 w-full mx-auto ">
                        <h3 class=" font-bold text-center text-4xl">{{ $session->group->courseable->title }}</h3>
                        @if(Schema::hasColumn($session->group->courseable->getTable(), 'branch'))
                            <p class="font-bold fontp text-center mt-4 text-xl">{{ $session->group->courseable->year }}
                                - {{ $session->group->courseable->level }}</p>
                            <p class="font-medium fontp text-center mt-3 text-base">{{ $session->group->name }}</p>
                            <p class="font-medium fontp text-orange text-center mt-2 text-base">{{ $session->group->courseable->branch }}</p>
                        @else
                            <p class="font-medium fontp text-center mt-3 text-base">{{ $session->group->name }}</p>
                            <p class="font-medium fontp text-orange text-center mt-2 text-base">{{ $session->group->courseable->level }}</p>
                        @endif


                        <form action="{{ route('instructor.storeResource') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="w-full md:w-4/12 ms-auto mb-3 relative flex mt-2 items-end">
                                <input name="session_id" type="text" value="{{ $session->id }}" hidden>
                                <input name="file" type="file" required>

                                <button type="submit"
                                        class="bg-orange h-12 w-5/12 text-center flex items-center justify-center"
                                        style="border-radius: 0  0.75rem 0.75rem 0;">
                                    <span
                                        class=" text-white font-bold text-sm ">{{ trans('website/website.Upload File') }}</span>
                                </button>
                            </div>
                        </form>

                        <div title="Quiz" class=" w-full overflow-x-auto md:overflow-x-visible ">
                            <div class="min-w-[600px]">
                                <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">
                                    <div class="flex">
                                        <p class="font-bold text-gray2 w-3/12 text-[15px] pb-2">{{ trans('website/website.Name') }}</p>

                                        <p class="font-bold text-gray2 ms-auto w-3/12 text-[15px] text-end  pb-2">
                                            {{ trans('website/website.Action') }}
                                        </p>

                                    </div>
                                </div>

                                @forelse($session->ressources as $resource)
                                    <div class="flex items-center p-6 py-6 border-b border-[#E2E2E2]/50 border-solid">
                                        <h5 class=" text-base w-9/12 flex items-center font-bold text-black2">
                                            <img class="h-auto  w-8 object-contain relative"
                                                 src="{{ asset('website/images/file.svg') }}"/>
                                            <a href="{{ route('instructor.resourceDownload', [ 'filename'=> $resource->filename]) }}"
                                               class="text-black34 mx-4 text-sm font-bold filename ">
                                                {{ $resource->filename }}
                                            </a>
                                        </h5>
                                        <div class="flex justify-end ms-auto w-1/12">
                                            <a href="{{ route('instructor.resourceDelete', ['id' => $resource->id]) }}">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.81043 2L5.19043 5.63" stroke="#FF0000"
                                                          stroke-width="1.5" stroke-miterlimit="10"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M15.1904 2L18.8104 5.63" stroke="#FF0000"
                                                          stroke-width="1.5" stroke-miterlimit="10"
                                                          stroke-linecap="round"
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
                                @empty
                                    <div class="flex items-center p-6 py-6 border-b border-[#E2E2E2]/50 border-solid">
                                        <h5 class=" text-base w-9/12 flex items-center font-bold text-black2">
                                            <p class="text-black34 mx-4 text-sm font-bold filename ">
                                                {{ trans('website/website.There are no Resources on this Session !!!!') }}
                                            </p>
                                        </h5>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div
        class=" bg-black/50 hidden fixed top-0 gg422 bottom-0 right-0 left-0 z-50"></div>
    <div
        class="fixed flexsss23 top-0 left-0 right-0 z-50  hidden flex-col  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl mx-auto my-auto  max-h-full">
            <div class="relative bg-white rounded-2xl  shadow">
                <button type="button" onclick="closePop('.flexsss23')"
                        class="absolute top-3 right-2.5 group text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center "
                        data-modal-hide="popup-modal">
                    <svg aria-hidden="true"
                         class="w-5 h-5 fill-gray2 group-hover:fill-orange"
                         fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true"
                         class="mx-auto mb-4 text-gray-400 w-14 h-14 stroke-red-500 my-5"
                         fill="none"
                         stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-base font-medium text-black34">Are you sure
                        you
                        want to delete ?</h3>
                    <a
                        class="text-white bg-red-500 hover:bg-red-600 mt-3  h-14  font-medium rounded-2xl text-sm inline-flex items-center px-8 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </a>
                    <button onclick="closePop('.flexsss23')" type="button"
                            class="text-orange bg-orange/20 hover:bg-orange mt-3  rounded-2xl h-14 text-sm font-medium px-8 py-2.5 hover:text-white focus:z-10 ">
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        function getFileData(myFile) {
            let file = myFile.files[0];
            let filename = file.name;
            document.getElementById("filename").textContent = file.name;
        }
    </script>

@endsection
