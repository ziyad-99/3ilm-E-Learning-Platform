@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/addStudent.add_student') }}
@endsection

@section('content')
    <div>

        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/addStudent.students') }} / {{ trans('admin/addStudent.add_student') }}</span>
            </h4>
            @if ($errors->any())
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
            <form class="w-full" onsubmit="return validateForm()" action="{{ route('admin.storeStudent') }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex flex-wrap ">
                        <div class=" w-full md:w-7/12 ">
                            <div class="relative  w-28">
                                <div class="w-28 h-28 overflow-hidden rounded-full bg-gray/50 ">
                                    <img id='output' class=" object-cover w-full h-full imagereader"
                                         src="{{ asset('website/images/souf1.webp') }}" alt="logo"/>
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
                                       class="  absolute top-0 right-0 left-0 bottom-0 z-10 opacity-0 cursor-pointer"
                                       id="avatar" name="photo" accept="image/png, image/jpeg"
                                       onchange='openFile(event)'>
                            </div>
                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.first_name') }}</p>
                                <input class="inputtext fontp" name="firstName"
                                       placeholder="{{ trans('admin/addStudent.first_name') }}" required/>
                            </div>
                            <div class="w-full mt-5">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.last_name') }}</p>
                                <input class="inputtext fontp" name="lastName"
                                       placeholder="{{ trans('admin/addStudent.last_name') }}" required/>
                            </div>
                            <div class=" flex-wrap flex w-full mt-4">
                                <div class="w-full md:w-6/12 pe-2">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.email') }}</p>
                                    <input class="inputtext fontp" name="email"
                                           placeholder="{{ trans('admin/addStudent.email') }}"
                                           required/>
                                </div>
                                <div class=" w-full md:w-6/12 ps-2">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.phone') }}</p>
                                    <input id="phoneInput" class="inputtext fontp" name="phone"
                                           placeholder="{{ trans('admin/addStudent.phone') }}"
                                           required
                                           onchange="hideError('phoneError')"/>
                                    @error('phone')
                                    <p id="phoneError" class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <script>
                                    function validateForm() {
                                        var phoneInput = document.getElementById("phoneInput");
                                        if (phoneInput.value.length !== 10) {
                                            alert("{{ trans('website/website.Phone number must be exactly 10 characters long.') }}");
                                            return false; // Prevent form submission
                                        }
                                        return true; // Allow form submission
                                    }
                                </script>
                            </div>

                            <div class=" flex-wrap flex w-full mt-4">
                                <div class="w-full md:w-6/12 pe-2">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.password') }}</p>
                                    <input class="inputtext fontp" type="password" name="password"
                                           placeholder="{{ trans('admin/addStudent.password') }}"
                                           required/>
                                </div>
                                <div class=" w-full md:w-6/12 ps-2">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.confirmation_password') }}</p>
                                    <input class="inputtext fontp" type="password" name="password_confirmation"
                                           placeholder="{{ trans('admin/addStudent.confirmation_password') }}"
                                           required/>
                                </div>
                            </div>

                            <div class=" flex-wrap flex w-full mt-4">
                                <div class="w-full md:w-6/12 pe-2">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.state') }}</p>
                                    <select class="inputtext " name="state">
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.Select_aWilaya') }}</option>
                                        <option value="Adrar">Adrar</option>
                                        <option value="Chlef">Chlef</option>
                                        <option value="Laghouat">Laghouat</option>
                                        <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                                        <option value="Batna">Batna</option>
                                        <option value="Béjaïa">Béjaïa</option>
                                        <option value="Biskra">Biskra</option>
                                        <option value="Béchar">Béchar</option>
                                        <option value="Blida">Blida</option>
                                        <option value="Bouira">Bouira</option>
                                        <option value="Tamanrasset">Tamanrasset</option>
                                        <option value="Tébessa">Tébessa</option>
                                        <option value="Tlemcen">Tlemcen</option>
                                        <option value="Tiaret">Tiaret</option>
                                        <option value="Tizi Ouzou">Tizi Ouzou</option>
                                        <option value="Alger">Alger</option>
                                        <option value="Djelfa">Djelfa</option>
                                        <option value="Jijel">Jijel</option>
                                        <option value="Sétif">Sétif</option>
                                        <option value="Saïda">Saïda</option>
                                        <option value="Skikda">Skikda</option>
                                        <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                                        <option value="Annaba">Annaba</option>
                                        <option value="Guelma">Guelma</option>
                                        <option value="Constantine">Constantine</option>
                                        <option value="Médéa">Médéa</option>
                                        <option value="Mostaganem">Mostaganem</option>
                                        <option value="M'Sila">M'Sila</option>
                                        <option value="Mascara">Mascara</option>
                                        <option value="Ouargla">Ouargla</option>
                                        <option value="Oran">Oran</option>
                                        <option value="El Bayadh">El Bayadh</option>
                                        <option value="Illizi">Illizi</option>
                                        <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                                        <option value="Boumerdès">Boumerdès</option>
                                        <option value="El Tarf">El Tarf</option>
                                        <option value="Tindouf">Tindouf</option>
                                        <option value="Tissemsilt">Tissemsilt</option>
                                        <option value="El Oued">El Oued</option>
                                        <option value="Khenchela">Khenchela</option>
                                        <option value="Souk Ahras">Souk Ahras</option>
                                        <option value="Tipaza">Tipaza</option>
                                        <option value="Mila">Mila</option>
                                        <option value="Aïn Defla">Aïn Defla</option>
                                        <option value="Naâma">Naâma</option>
                                        <option value="Aïn Témouchent">Aïn Témouchent</option>
                                        <option value="Ghardaïa">Ghardaïa</option>
                                        <option value="Relizane">Relizane</option>
                                    </select>
                                </div>
                                <div class=" w-full md:w-6/12 ps-2">
                                    <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.address') }}</p>
                                    <input class="inputtext fontp" name="address"
                                           placeholder="{{ trans('admin/addStudent.address') }}" required/>
                                </div>
                            </div>

                            <div class=" w-full mt-4">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.gender') }}</p>
                                <select class="inputtext " name="gender">
                                    <option value="" selected
                                            disabled>{{ trans('admin/addStudent.select_gender') }}</option>
                                    <option value="male">{{ trans('admin/addStudent.male') }}</option>
                                    <option value="female">{{ trans('admin/addStudent.female') }}</option>
                                </select>
                            </div>

                            <div class=" flex-wrap flex w-full mt-4">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.status') }}</p>
                                <select class="inputtext " name="status" required>
                                    <option value="" selected
                                            disabled>{{ trans('admin/addStudent.select_status') }}</option>
                                    <option value="0">{{ trans('admin/addStudent.disable') }}</option>
                                    <option value="1">{{ trans('admin/addStudent.active') }}</option>
                                </select>
                            </div>

                            <div class="w-full mt-4">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addStudent.bio') }}</p>
                                <textarea
                                    class="inputtext rounded-[15px] px-4 fontp w-full mt-3 font-medium  placeholder-slate-400 focus:outline-none  block sm:text-sm focus:ring-1  min-h-[250px] h-auto py-3"
                                    rows="3"
                                    placeholder="{{ trans('admin/addStudent.bio') }}"
                                    name="bio"></textarea>
                            </div>
                        </div>
                    </div>
                    {{--                    <button type="submit" onclick="Done()"--}}
                    {{--                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">--}}
                    {{--                        <span class=" text-white font-bold text-sm ">Save Changes</span>--}}
                    {{--                    </button>--}}
                    <button type="submit"
                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class=" text-white font-bold text-sm ">{{ trans('admin/addStudent.add') }}</span>
                    </button>
                </div>
            </form>
        </div>
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
        function hideError(fieldId) {
            const errorElement = document.getElementById(fieldId);
            if (errorElement) {
                errorElement.style.display = 'none';
            }
        }
    </script>

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

@endsection
