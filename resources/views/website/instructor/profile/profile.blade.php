@extends('website.layouts.master')

@section('title')
    Profile
@endsection


@section('content')
    <div>
        <div class=" widthfull flex py-5 justify-between">
            <div class="w-full  ">
                <h3 class=" font-bold text-center text-4xl">{{ trans('website/studentProfile.instructor_panel') }}</h3>

                <div class=" bg-white flex flex-wrap  boxshadow2 rounded px-0 py-0 mt-10 w-full mx-auto ">
                    <div class="w-full md:w-3/12 py-16 border-e border-[#D0D0D0]/50 ">
                        <p class="font-bold  text-2xl ps-16  ">{{ $instructor->firstName }}</p>

                        <a href="{{ route('instructor.profile') }}"
                           class=" w-full  items-center">
                            <div class="  mt-1 p-4 ps-16 bg-orange w-full items-center">
                                <span
                                    class="font-medium fontp  text-[#fff] text-sm ">{{ trans('website/studentProfile.profile') }}</span>

                            </div>
                        </a>
                        <a class=" w-full  items-center" href="{{ route('instructor.password') }}">
                            <div class="hover:bg-orange/20 group w-full  mt-1 p-4 ps-16  items-center">

                            <span
                                class="font-medium fontp group-hover:text-orange text-[#555] text-sm ">{{ trans('website/studentProfile.change_password') }}</span>

                            </div>
                        </a>
                        <a href="{{ route('instructor.socialMedia') }}"
                           class=" w-full  items-center">
                            <div class="hover:bg-orange/20 group w-full  mt-1 p-4 ps-16  items-center">
                            <span
                                class="font-medium fontp group-hover:text-orange text-[#555] text-sm ">{{ trans('website/studentProfile.social_links') }}</span>

                            </div>
                        </a>
                    </div>

                    <div class="w-full md:w-9/12 px-9 py-10">
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
                        <h4 class="  text-2xl md:text-2xl mb-4 lg:text-3xl text-black34 font-bold">{{ trans('website/studentProfile.profile') }}</h4>
                        <form onsubmit="return validateForm()" action="{{ route('instructor.updateProfile') }}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <input hidden name="instructor_id" value="{{$instructor->id}}" required>
                            <div class="relative w-28">
                                <div class="w-28 h-28 overflow-hidden rounded-full bg-gray/50 ">
                                    <img id='output' class=" object-cover w-full h-full imagereader"
                                         @if($instructor->photo == null)
                                             src="{{ asset('website/images/souf1.webp') }}"
                                         @else
                                             src="{{ asset('images/profiles/'.$instructor->photo) }}"
                                         @endif

                                         alt="logo"/>
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
                                       id="avatar" name="photo"
                                       onchange='openFile(event)'/>

                            </div>
                            <div class=" w-full md:w-6/12 mt-6 ">

                                <div class=" flex-wrap flex w-full ">
                                    <div class="w-full md:w-6/12 pe-2">
                                        <p class="font-medium text-gray3  text-sm ">{{ trans('website/studentProfile.first_name') }}
                                            :</p>
                                        <input class="inputtext " type="text" name="firstName"
                                               value="{{ $instructor->firstName }}" required/>
                                    </div>
                                    <div class=" w-full md:w-6/12 ps-2">
                                        <p class="font-medium text-gray3  text-sm ">{{ trans('website/studentProfile.last_name') }}
                                            :</p>
                                        <input class="inputtext " type="text" name="lastName"
                                               value="{{ $instructor->lastName }}" required/>
                                    </div>

                                </div>
                                <div class=" w-full mt-5">
                                    <p class="font-medium text-gray3  text-sm ">{{ trans('website/studentProfile.email') }}
                                        :</p>
                                    <input class="inputtext " type="email" name="email" value="{{ $instructor->email }}"
                                           required/>
                                </div>

                            </div>
                            <div class="w-full md:w-8/12 mt-5">
                                <p class="font-medium text-gray3  text-sm ">{{ trans('website/studentProfile.bio') }}
                                    :</p>
                                <textarea class="inputtext min-h-[150px] h-auto py-3" rows="5"
                                          name="bio">{{ $instructor->bio }}</textarea>
                            </div>

                            <div class=" w-full md:w-6/12 mt-6 ">

                                <div class=" w-full mt-5">
                                    <p class="font-medium text-gray3  text-sm ">{{ trans('website/studentProfile.phone_number') }}
                                        :</p>
                                    <input class="inputtext" type="text" name="phone" id="phoneInput"
                                           value="{{ $instructor->phone }}" required/>
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

                                <br>
                                <p class="font-medium text-gray3  text-sm ">{{ trans('website/studentProfile.state') }}
                                    :</p>
                                <select class="inputtext " name="state">
                                    <option value="{{ $instructor->state }}" selected
                                    >{{ $instructor->state }}</option>
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


                                <div class=" w-full mt-4">
                                    <p class="font-medium text-gray3 mt-5 text-sm ">{{ trans('website/studentProfile.gender') }} </p>
                                    <select class="inputtext " name="gender">
                                        <option
                                            value="male" {{ $instructor->gender ==  'male' ? 'selected' : '' }}>{{ trans('website/studentProfile.male') }}</option>
                                        <option
                                            value="female" {{ $instructor->gender ==  'male' ? 'selected' : '' }}>{{ trans('website/studentProfile.female') }}</option>
                                    </select>
                                </div>

                            </div>

                            <button type="submit"
                                    class=" btn text-white hover:bg-orange3 transition-all items-center mt-5 justify-center flex px-10">
                                {{ trans('website/studentProfile.save_changes') }}
                            </button>
                    </div>

                    </form>


                </div>
            </div>

        </div>


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
@endsection
