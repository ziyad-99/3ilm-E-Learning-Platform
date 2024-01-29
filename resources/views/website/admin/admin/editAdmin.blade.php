@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/addAdmin.edit_admin') }}
@endsection

@section('content')
    <div class="bg-[#f5f5f5]">
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl px-4 lg:leading-[120%] ">
                <span>{{ trans('admin/addAdmin.edit_admin') }}</span>
            </h4>

            <form class="w-full" action="{{ route('admin.updateAdmin') }}" method="post">
                @csrf
                <div class="  w-full bg-white rounded-2xl p-4  py-10 md:px-9">
                    <div class="w-full flex flex-wrap ">

                        <input type="text" name="admin_id" value="{{ $admin->id }}" hidden/>

                        <div class=" w-full md:w-7/12">
                            <div class="w-full mt-10">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addAdmin.name') }}</p>
                                <input class="inputtext fontp" type="text" name="name" value="{{ $admin->name }}"
                                       placeholder="{{ trans('admin/addAdmin.name') }}"
                                       required/>
                            </div>

                            <div class="w-full mt-4">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addAdmin.email') }}</p>
                                <input class="inputtext fontp" type="email" name="email" value="{{ $admin->email }}"
                                       placeholder="{{ trans('admin/addAdmin.email') }}"
                                       required/>
                            </div>

                            <div class="w-full mt-4">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addAdmin.phone') }}</p>
                                <input class="inputtext fontp" type="text" name="phone" value="{{ $admin->phone }}"
                                       placeholder="{{ trans('admin/addAdmin.phone') }}"
                                       required/>
                            </div>

                            <div class="w-full mt-4">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addAdmin.address') }}</p>
                                <input class="inputtext fontp" name="address" value="{{ $admin->address }}" required
                                       placeholder="{{ trans('admin/addAdmin.address') }}"/>
                            </div>

                            <div class="w-full mt-4">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addAdmin.password') }}</p>
                                <input class="inputtext fontp" type="password" name="password"
                                       value="{{ $admin->password }}"
                                       placeholder="{{ trans('admin/addAdmin.password') }}"
                                       required/>
                            </div>
                            <div class=" w-full mt-4">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addAdmin.wilaya') }}</p>
                                <select class="inputtext " name="state" required>
                                    <option value="{{ $admin->state }}" selected hidden>{{ $admin->state }}</option>
                                    <option value="" disabled>{{ trans('admin/admin.Select_aWilaya') }}</option>
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

                            <div class=" w-full mt-4">
                                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('admin/addAdmin.role') }}</p>
                                <select class="inputtext" name="role" required>
                                    <option value="" disabled>{{ trans('admin/admin.Select_aRole') }}</option>
                                    @foreach($roles as $role)
                                        <option
                                            value="{{ $role->name }}" {{ $admin->role == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                            class=" btn items-center hover:bg-orange3 transform hover:scale-105 ms-0 mt-5 flex px-10">
                        <span class=" text-white font-bold text-sm">{{ trans('admin/addAdmin.update') }}</span>
                    </button>
                </div>
            </form>
        </div>
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
