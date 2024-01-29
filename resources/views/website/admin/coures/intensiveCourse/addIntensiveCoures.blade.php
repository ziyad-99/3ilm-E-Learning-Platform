@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.AddIntensiveCourse') }}
@endsection

@section('content')
    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/admin.AddIntensiveCourse') }}</span>
            </h4>

            <!-- Display validation errors -->
            @if($errors->any())
                <div class="alert alert-danger" style="
                          display: inline-block;
                          color: red;
                          border-radius: 4%;
                          padding: 5px 10px;
                          margin: 5px 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="w-full" action="{{ route('admin.storeIntensiveCourse') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex flex-wrap ">

                        <div class=" w-full mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.CourseTitle(en)') }}</p>
                            <input class="inputtext fontp" name="title_en"
                                   placeholder="{{ trans('admin/admin.CourseTitle(en)') }}" required/>
                        </div>

                        <div class=" w-full mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.CourseTitle(ar)') }}</p>
                            <input class="inputtext fontp" name="title_ar"
                                   placeholder="{{ trans('admin/admin.CourseTitle(ar)') }}" required/>
                        </div>

                        <div class=" w-full mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.CourseTitle(fr)') }}</p>
                            <input class="inputtext fontp" name="title_fr"
                                   placeholder="{{ trans('admin/admin.CourseTitle(fr)') }}" required/>
                        </div>


                        <div class=" w-full md:w-6/12 ">
                            <div class=" flex-wrap flex w-full">

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Instructor') }}</p>
                                    <select class="inputtext " name="instructor_id" required>
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.selectInstructor') }}</option>
                                        @foreach($instructors as $instructor)
                                            <option
                                                value="{{ $instructor->id }}">{{ $instructor->firstName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2 text-sm">{{ trans('admin/admin.Set the instructor salary') }}</p>
                                    <div style="margin-right: 20px; margin-bottom: 20px;">
                                        <label class="containerRadio">
                                            {{ trans('admin/admin.Percentage (%)') }}
                                            <input type="radio" name="paymentType" value="percentage" required>
                                            <span class="checkmark"></span>
                                        </label>
                                        <input class="inputtext fontp" type="number" name="percentage" min="0" max="100"
                                               placeholder="{{ trans('admin/admin.Percentage (%)') }}"
                                               style="width: 30%; display: none;"/>
                                    </div>

                                    <div style="margin-right: 20px;">
                                        <label class="containerRadio">
                                            {{ trans('admin/admin.Fixed salary for all Sessions') }}
                                            <input type="radio" name="paymentType" value="perSession" required>
                                            <span class="checkmark"></span>
                                        </label>
                                        <input class="inputtext fontp" type="number" name="perSession" required
                                               placeholder="{{ trans('admin/admin.Fixed salary for all Sessions') }}"
                                               style="width: 40%; display: none;"/>
                                    </div>
                                </div>

                                <script>
                                    const radioButtons = document.querySelectorAll('input[type=radio][name=paymentType]');
                                    const percentageInput = document.querySelector('input[type=number][name=percentage]');
                                    const perSessionInput = document.querySelector('input[type=number][name=perSession]');

                                    radioButtons.forEach(radio => {
                                        radio.addEventListener('change', function () {
                                            if (this.checked) {
                                                if (this.value === 'percentage') {
                                                    percentageInput.style.display = 'block';
                                                    percentageInput.required = true;

                                                    perSessionInput.style.display = 'none';
                                                    perSessionInput.required = false;
                                                    perSessionInput.value = "";

                                                } else if (this.value === 'perSession') {
                                                    percentageInput.style.display = 'none';
                                                    percentageInput.required = false;
                                                    percentageInput.value = "";

                                                    perSessionInput.style.display = 'block';
                                                    perSessionInput.required = true;
                                                }
                                            }
                                        });
                                    });
                                </script>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Level') }}</p>
                                    <select class="inputtext " name="level" required>
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.SelectLevel') }}</option>
                                        <option value="Beginner">{{ trans('admin/admin.Beginner') }}</option>
                                        <option value="Intermediate">{{ trans('admin/admin.Intermediate') }}</option>
                                        <option value="Advanced">{{ trans('admin/admin.Advanced') }}</option>
                                    </select>
                                </div>

                                {{--                                <div class=" w-full mt-4">--}}
                                {{--                                    <p class="font-semibold text-black2 mb-2  text-sm ">Number Sessions</p>--}}
                                {{--                                    <input class="inputtext fontp" type="text" name="numberSessions" required/>--}}
                                {{--                                </div>--}}

                                {{--                                <div class=" w-full mt-4">--}}
                                {{--                                    <p class="font-semibold text-black2 mb-2  text-sm ">Frame time (hh:mm:ss)</p>--}}
                                {{--                                    <input class="inputtext fontp" type="text" name="frameTime" placeholder="00:00:00"--}}
                                {{--                                           required/>--}}
                                {{--                                </div>--}}

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.NumberSessions') }}</p>
                                    <input class="inputtext fontp" type="number" name="numberSessions" required
                                           placeholder="{{ trans('admin/admin.NumberSessions') }}"/>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Frametime(Hours)') }}</p>
                                    <input class="inputtext" type="number" name="frameTime" step="0.5" required
                                           placeholder="{{ trans('admin/admin.Frametime(Hours)') }}">
                                </div>

                                {{--                                <div class=" w-full mt-4">--}}
                                {{--                                    <p class="font-semibold text-black2 mb-2  text-sm ">Price</p>--}}
                                {{--                                    <input class="inputtext fontp" type="text" name="price" placeholder="" required/>--}}
                                {{--                                </div>--}}

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Price') }}</p>
                                    <input class="inputtext fontp" type="number" name="price"
                                           placeholder="{{ trans('admin/admin.Price') }}" required/>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.StartDate') }}</p>
                                    <input class="inputtext fontp" type="date" name="startDate" required
                                           placeholder="{{ trans('admin/admin.StartDate') }}"/>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Status') }}</p>
                                    <select class="inputtext " name="status" required>
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.selectStatus') }}</option>
                                        <option value="0">
                                            {{ trans('admin/admin.Disabled') }}
                                        </option>
                                        <option value="1">{{ trans('admin/admin.Active') }}</option>
                                    </select>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Description (en)') }}</p>
                                    <textarea
                                        name="description_en"
                                        class="inputtext rounded-[15px] px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none  block sm:text-sm focus:ring-1  min-h-[20px] h-auto py-3"
                                        rows="3" placeholder="{{ trans('admin/admin.Description (en)') }}"
                                        required></textarea>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Description (fr)') }}</p>
                                    <textarea
                                        name="description_fr"
                                        class="inputtext rounded-[15px] px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none  block sm:text-sm focus:ring-1  min-h-[20px] h-auto py-3"
                                        rows="3" placeholder="{{ trans('admin/admin.Description (fr)') }}"
                                        required></textarea>
                                </div>

                                <div class=" w-full mt-4">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/admin.Description (ar)') }}</p>
                                    <textarea
                                        name="description_ar"
                                        class="inputtext rounded-[15px] px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none  block sm:text-sm focus:ring-1  min-h-[20px] h-auto py-3"
                                        rows="3" placeholder="{{ trans('admin/admin.Description (ar)') }}"
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class=" w-full ps-5 md:w-4/12 flex items-center">
                            <div class="relative w-full ">
                                <div class="w-full h-48 overflow-hidden  bg-gray/50 ">
                                    <img id='output' class=" object-cover w-full h-full imagereader"
                                         src="{{ asset('website/admin/images/souf1.webp') }}" alt="logo"/>
                                </div>
                                <div class=" absolute -bottom-1.5 -end-1.5">
                                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                         width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
                                         style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                            <path
                                                d="M416.667 104.433h-28.342c-12.116 0-15.148-9.117-20.81-20.442-13.518-27.036-40.683-43.825-70.899-43.825h-81.232c-30.217 0-57.382 16.789-70.899 43.825-5.661 11.325-8.694 20.442-20.81 20.442H95.333C42.602 104.433 0 147.113 0 199.767V376.5c0 52.739 42.687 95.333 95.333 95.333h321.334c52.646 0 95.333-42.595 95.333-95.333V199.767c0-52.654-42.602-95.334-95.333-95.334zm-273.134 222.8a14.946 14.946 0 0 1-10.606-4.394l-32.133-32.133c-5.858-5.858-5.858-15.355 0-21.213 5.857-5.858 15.355-5.858 21.213 0l6.596 6.596C130.73 207.652 187.057 152.633 256 152.633c34.022 0 66.027 13.262 90.119 37.344 5.859 5.857 5.861 15.354.004 21.213-5.857 5.858-15.355 5.861-21.213.004-18.426-18.418-42.898-28.562-68.91-28.562-52.344 0-95.176 41.478-97.371 93.292l6.432-6.431c5.857-5.858 15.355-5.858 21.213 0 5.858 5.858 5.858 15.355 0 21.213L154.14 322.84a14.953 14.953 0 0 1-10.607 4.393zm267.674-36.526c-5.857 5.858-15.355 5.858-21.213 0l-6.596-6.596C381.271 352.547 324.943 407.567 256 407.567c-34.022 0-66.027-13.262-90.119-37.344-5.859-5.857-5.861-15.354-.004-21.213 5.857-5.858 15.355-5.861 21.213-.004 18.426 18.418 42.898 28.562 68.91 28.562 52.344 0 95.176-41.478 97.371-93.292l-6.432 6.431c-5.857 5.858-15.355 5.858-21.213 0-5.858-5.858-5.858-15.355 0-21.213l32.133-32.133c2.929-2.929 6.768-4.394 10.606-4.394s7.678 1.464 10.606 4.394l32.133 32.133c5.86 5.858 5.86 15.355.003 21.213z"
                                                fill="#939393" data-original="#000000" opacity="1" class=""></path>
                                        </g></svg>
                                </div>

                                <input type="file"
                                       class="absolute top-0 right-0 left-0 bottom-0 z-10 opacity-0 cursor-pointer"
                                       name="img" accept="image/png, image/jpeg"
                                       onchange='openFile(event)' required>
                            </div>
                        </div>
                    </div>
                    {{--                    <button type="submit" onclick="Done()"--}}
                    {{--                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">--}}
                    {{--                        <span class=" text-white font-bold text-sm ">Create</span>--}}
                    {{--                    </button>--}}

                    <button type="submit"
                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class=" text-white font-bold text-sm ">{{ trans('admin/admin.CreateCourse') }}</span>
                    </button>
                </div>
            </form>

        </div>
    </div>
    <div class="  gg422 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[1000] fixed">
        <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="72.5" cy="72.5" r="69.5" stroke="#37F807" stroke-width="6"/>
            <path d="M44 74.7767L61.4349 92L108 46" stroke="#37F807" stroke-width="10.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </div>

    <div onclick="openNav()"
         class="  gg4255 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[10] fixed"></div>
    <div class="  gg422 items-center bg-black/30  justify-center hidden top-0 right-0 left-0 bottom-0 z-[1000] fixed">
        <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="72.5" cy="72.5" r="69.5" stroke="#37F807" stroke-width="6"/>
            <path d="M44 74.7767L61.4349 92L108 46" stroke="#37F807" stroke-width="10.5" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>

    </div>
@endsection

@section('js')
    <script>
        let openFile = function (file) {
            let input = file.target;
            let reader = new FileReader();
            reader.onload = function () {
                let dataURL = reader.result;
                let output = document.getElementById('output');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        };

    </script>
    <script>
        addEventListener("DOMContentLoaded", (event) => {
            function openPop(gg42) {
                document.querySelector(gg42).classList.add('flex');
                document.querySelector(gg42).classList.remove('hidden');
                document.body.classList.add("overflow-hidden");
                document.body.style.height = "100vh";
                document.body.style.position = "fixed";
                document.body.style.width = "100%";
                gg22.classList.add("block");
                gg22.classList.remove("hidden");
            }

            function closePop(gg42) {
                document.querySelector(gg42).classList.remove('flex');
                document.querySelector(gg42).classList.add('hidden');
                document.body.classList.remove("overflow-hidden");
                document.body.style.height = "100%";
                document.body.style.position = "relative";
                document.body.style.width = "100%";

                gg22.classList.remove("block");
                gg22.classList.add("hidden");


            }
        });
        let gg22 = document.querySelector(".gg422");

        function openNav() {
            document.querySelector("#sidebaradmin").classList.toggle('hidden');
            document.querySelector(".gg4255").classList.toggle('hidden');
        }

        function removedone() {
            gg22.classList.remove('flex');
            gg22.classList.add('hidden');

        }

        function Done() {
            gg22.classList.add('flex');
            gg22.classList.remove('hidden');
            setTimeout(removedone, 2000);
        }

        let qqqs = document.querySelectorAll(".qqq");

        function setMouse(e, d) {
            if (e) {
                d.classList.remove("md:w-20");
                d.classList.add("w-56");
                d.style.width = "14rem"
                for (let i = 0; i < qqqs.length; i++) {
                    qqqs[i].classList.remove("md:w-0");
                    qqqs[i].classList.add("w-36");
                }

            } else {
                d.classList.remove("w-56")
                d.classList.add("md:w-20")
                d.style.width = "5rem"
                for (let i = 0; i < qqqs.length; i++) {
                    qqqs[i].classList.add("md:w-0");
                    qqqs[i].classList.remove("w-36");
                }
            }
        }

        function dropdown(name) {
            document.getElementById(name).classList.toggle("show");
        }

        let arr = document.querySelectorAll(".select1");

        window.addEventListener('click', function (e) {

            for (let i = 0; i < arr.length; i++) {
                if (arr[i].parentElement.children[0].contains(e.target)) {
                } else {
                    arr[i].classList.remove('show')

                }
            }


        });

        function dropdownfun(name) {
            name.nextElementSibling.classList.toggle("show");

        }

        function dropdownfun2(name) {
            document.getElementById(name).classList.toggle("show");

        }

    </script>
    <script src="{{ asset('website/admin/js/choices.min.js') }}"></script>
    <script src="{{ asset('website/admin/js/choices.js') }}"></script>
@endsection
