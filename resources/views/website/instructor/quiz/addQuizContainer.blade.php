@extends('website.layouts.master')

@section('content')
    <div>
        <div class=" widthfull flex py-20 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">{{ $group->courseable->title }}</h3>
                @if(Schema::hasColumn($group->courseable->getTable(), 'branch'))
                    <p class="font-bold fontp text-center mt-4 text-xl">{{ $group->courseable->year }}
                        - {{ $group->courseable->level }}</p>
                    <p class="font-medium fontp text-center mt-3 text-base">{{ $group->name }}</p>
                    <p class="font-medium fontp text-orange text-center mt-2 text-base">{{ $group->courseable->branch }}</p>
                @else
                    <p class="font-medium fontp text-center mt-3 text-base">{{ $group->name }}</p>
                    <p class="font-medium fontp text-orange text-center mt-2 text-base">{{ $group->courseable->level }}</p>
                @endif


                <div class=" bg-white  boxshadow2 rounded-xl px-0 py-6 mt-10 w-full mx-auto ">
                    <div class=" w-full px-6 border-b border-[#E2E2E2] border-solid">
                        <div class="flex">
                            <p class="font-semibold w-9/12 text-[15px] pb-2">{{ trans('website/header.The session') }}</p>
                            <p class="font-semibold  w-3/12 text-[15px] pb-2">{{trans('admin/allAdmins.action')}}</p>

                        </div>

                    </div>

                    @forelse($group->sessions as $session)
                        <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                            <div class=" w-6/12 flex flex-wrap items-center">
                                <div class=" rounded-xl w-4/12 md:w-2/12 overflow-hidden">
                                    <img src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                         alt="course" class=" object-contain h-full w-full">
                                </div>
                                <div class="md:px-6 pt-4 md:pt-0">
                                    <h5 class="text-lg font-semibold text-black2  hover:text-orange  transition-all"><a
                                            href="#" class="fontp">{{ $session->name }}</a></h5>
                                </div>
                            </div>
                            <div class="w-6/12 md:w-3/12 ms-auto">
                                <a href="{{ route('instructor.addQuiz', ['session_id'=> $session->id]) }}"
                                   class="w-full  md:w-40 btn bg-red-500 hover:bg-orange cursor-pointer items-center justify-center flex px-6">
                                    <span
                                        class=" text-white font-bold text-sm ">{{ trans('website/header.addQuiz') }}</span>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="flex items-center p-6 border-b border-[#E2E2E2]/50 border-solid">
                            <div class=" w-6/12 flex flex-wrap items-center">
                                <div class="md:px-6 pt-4 md:pt-0">
                                    <h5 class="text-lg font-semibold text-black2  hover:text-orange  transition-all">
                                        There are no sessions on this Group !!!!
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
