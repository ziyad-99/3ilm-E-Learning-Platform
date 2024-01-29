@extends('website.layouts.master')

@section('title')
    {{ trans('website/signup.sign_up') }}
@endsection

@section('css')
    <style>
        .registerForm {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class=" widthfull flex flex-wrap py-20 justify-between">
        <div class="w-full md:ps-20 md:w-[40%] ">

            {{--Select form student or instructor--}}
            <div class="form-group">
                <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.sign_up_type') }}</p>
                <select class="inputtext form-control" name="signupType" id="sectionChooser">
                    <option value="" selected disabled>{{ trans('website/signup.select_from_the_list') }}</option>
                    <option
                        value="student" {{ old('signupType') === 'student' ? 'selected' : '' }} >{{ trans('website/signup.student') }}</option>
                    <option
                        value="instructor" {{ old('signupType') === 'instructor' ? 'selected' : '' }}>{{ trans('website/signup.instructor') }}</option>
                </select>
            </div>

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

            {{--form for student--}}
            <div class="registerForm" style="margin-top: 4%;" id="student">
                <h3 class=" font-bold  text-2xl">{{ trans('website/signup.sign_up_as_student') }}</h3>
                <p class=" text-gray2 font-normal text-base leading-[135%] my-6 mt-2 text-start">
                    {{ trans('website/signup.already_have_an_account') }} <a href="{{ route('login') }}">
                        <span class=" text-orange hover:text-orange3 font-semibold underline underline-offset-4">
                            {{ trans('website/signup.sign_in') }}
                        </span></a>
                </p>

                <form id="student" onsubmit="return validateForm()" method="POST"
                      action="{{ route('register.student') }}">
                    @csrf

                    <input id="signupType" hidden type="text" name="signupType">

                    <script>
                        // Get the select element
                        var selectElement = document.getElementById('sectionChooser');

                        // Get the input element
                        var inputElement = document.getElementById('signupTypeInput');

                        // Add an event listener for changes in the select element
                        selectElement.addEventListener('change', function () {
                            // Update the value of the input field with the selected value from the select element
                            inputElement.value = this.value;
                        });
                    </script>
                    <div class=" w-full flex flex-wrap">
                        <div class="w-full md:w-6/12 md:pe-3 mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.first_name') }}</p>
                            <input class="inputtext " type="text" name="firstName" required
                                   value="{{ old('firstName') }}"
                                   placeholder="{{ trans('website/signup.first_name') }}"/>
                        </div>

                        <div class="w-full md:w-6/12 md:ps-3 mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.last_name') }}</p>
                            <input class="inputtext " type="text" name="lastName" required value="{{ old('lastName') }}"
                                   placeholder="{{ trans('website/signup.first_name') }}"/>
                        </div>

                    </div>


                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.email') }}</p>
                        <input class="inputtext " type="email" name="email" required value="{{ old('email') }}"
                               placeholder="{{ trans('website/signup.email') }}" onchange="hideError('emailError')"/>
                    </div>
                    @error('email')
                    <p id="emailError" class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.password') }}</p>
                        <input class="inputtext " type="password" name="password" minlength="8" required
                               placeholder="*********" onchange="hideError('passwordError')"/>
                    </div>

                    @error('password')
                    <p id="passwordError" class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.confirm_password') }}</p>
                        <input class="inputtext " type="password" name="password_confirmation" required
                               placeholder="*********"/>
                    </div>

                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.gender') }}</p>
                        <select class="inputtext " name="gender" required>
                            <option value="" selected disabled>{{ trans('website/signup.select_your_gender') }}</option>
                            <option
                                value="male" {{ old('gender') === 'male' ? 'selected' : '' }} >{{ trans('website/signup.male') }}</option>
                            <option
                                value="female" {{ old('gender') === 'female' ? 'selected' : '' }} >{{ trans('website/signup.female') }}</option>
                        </select>
                    </div>

                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.phone_number') }}</p>
                        <input class="inputtext " type="text" name="phone" required id="phoneInput"
                               value="{{ old('phone') }}"
                               placeholder="{{ trans('website/signup.phone_number') }}"
                               onchange="hideError('phoneError')"/>
                    </div>

                    @error('phone')
                    <p id="phoneError" class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

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

                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.state') }}</p>
                        <select class="inputtext " name="state" required>
                            <option value="" selected
                                    disabled>{{ trans('website/signup.select_from_the_list') }}</option>
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

                    <button type="submit">
                        <a
                            class=" w-full btn items-center mt-6 h-12 hover:bg-orange3 transition-all transform hover:scale-[1.01] justify-center flex px-6">

                            <span class=" text-white font-bold text-sm ">{{ trans('website/signup.sign_up') }}</span>
                        </a>
                    </button>

                </form>

                <a href="{{ route('auth.socialite.redirect','google') }}"
                   class="w-full btn items-center mt-6 h-12 hover:bg-gray3 transition-all transform hover:scale-[1.01] justify-center flex bg-white"
                   style="border: 2px solid #808080; border-radius: 5px;">
                    <img class="w-10 h-10 p-2" src="{{ asset('website/images/google.png') }}">

                    <span class="text-black font-bold text-sm">
                            {{ trans('website/signup.sign_up') }}
                    </span>
                </a>

{{--                <a href="{{ route('auth.socialite.redirect','facebook') }}"--}}
{{--                   class="w-full btn items-center mt-6 h-12 hover:bg-gray3 transition-all transform hover:scale-[1.01] justify-center flex bg-white"--}}
{{--                   style="border: 2px solid #808080; border-radius: 5px;">--}}
{{--                    <img class="w-10 h-10 p-2" src="{{ asset('website/images/facebook.png') }}">--}}

{{--                    <span class="text-black font-bold text-sm">--}}
{{--                        {{ trans('website/signup.sign_up') }}--}}
{{--                    </span>--}}
{{--                </a>--}}
            </div>

            {{--form for Instructor--}}
            <div class="registerForm" style="margin-top: 4%;" id="instructor">
                <h3 class=" font-bold  text-2xl">{{ trans('website/signup.sign_up_as_instructor') }}</h3>
                <p class=" text-gray2 font-normal text-base leading-[135%] my-6 mt-2 text-start">
                    {{ trans('website/signup.already_have_an_account') }} <a href="{{ route('login') }}"><span
                            class=" text-orange hover:text-orange3 font-semibold underline underline-offset-4">
                            {{ trans('website/signup.sign_in') }}
                        </span></a>
                </p>

                <form id="instructorForm" onsubmit="return validateFormInstructor()" method="POST"
                      action="{{ route('register.instructor') }}">
                    @csrf
                    <div class=" w-full flex flex-wrap">
                        <div class="w-full md:w-6/12 md:pe-3 mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.first_name') }}</p>
                            <input class="inputtext " type="text" name="firstName" required
                                   value="{{ old('firstName') }}"
                                   placeholder="{{ trans('website/signup.first_name') }}"/>
                        </div>
                        <div class="w-full md:w-6/12 md:ps-3 mt-4">
                            <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.last_name') }}</p>
                            <input class="inputtext " type="text" name="lastName" required value="{{ old('lastName') }}"
                                   placeholder="{{ trans('website/signup.last_name') }}"/>
                        </div>
                    </div>
                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.email') }}</p>
                        <input class="inputtext " type="email" name="email" required value="{{ old('email') }}"
                               placeholder="{{ trans('website/signup.email') }}" onchange="hideError('emailError')"/>
                    </div>
                    @error('email')
                    <p id="emailError" class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.password') }}</p>
                        <input class="inputtext " type="password" name="password" required placeholder="*********"
                               onchange="hideError('passwordError')"/>
                    </div>
                    @error('password')
                    <p id="passwordError" class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.confirm_password') }}</p>
                        <input class="inputtext " type="password" name="password_confirmation" required
                               placeholder="*********"/>
                    </div>

                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.gender') }}</p>
                        <select class="inputtext " name="gender" required>
                            <option value="" selected disabled>{{ trans('website/signup.select_your_gender') }}</option>
                            <option
                                value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>{{ trans('website/signup.male') }}</option>
                            <option
                                value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>{{ trans('website/signup.female') }}</option>
                        </select>
                    </div>

                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.phone_number') }}</p>
                        <input class="inputtext " type="text" name="phone" required id="phoneInputInstructor"
                               value="{{ old('phone') }}"
                               placeholder="{{ trans('website/signup.phone_number') }}"
                               onchange="hideError('phoneError')"/>
                    </div>
                    @error('phone')
                    <p id="phoneError" class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <script>
                        function validateFormInstructor() {
                            var phoneInput = document.getElementById("phoneInputInstructor");
                            if (phoneInput.value.length !== 10) {
                                alert("{{ trans('website/website.Phone number must be exactly 10 characters long.') }}");
                                return false; // Prevent form submission
                            }
                            return true; // Allow form submission
                        }
                    </script>

                    <div class=" w-full mt-4">
                        <p class="font-semibold text-black2 mb-2  text-sm ">{{ trans('website/signup.state') }}</p>
                        <select class="inputtext " name="state" required>
                            <option value="" selected
                                    disabled>{{ trans('website/signup.select_from_the_list') }}</option>
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

                    <button type="submit">
                        <a
                            class=" w-full btn items-center mt-6 h-12 hover:bg-orange3 transition-all	 transform hover:scale-[1.01] justify-center flex px-6">
                            <span class=" text-white font-bold text-sm ">{{ trans('website/signup.sign_up') }}</span>
                        </a>
                    </button>
                </form>

                <a href="{{ route('auth.socialite.instructor.redirect','google') }}"
                   class="w-full btn items-center mt-6 h-12 hover:bg-gray3 transition-all transform hover:scale-[1.01] justify-center flex bg-white"
                   style="border: 2px solid #808080; border-radius: 5px;">
                    <img class="w-10 h-10 p-2" src="{{ asset('website/images/google.png') }}">

                    <span class="text-black font-bold text-sm">
                            {{ trans('website/signin.login') }}
                        </span>
                </a>

{{--                <a href="{{ route('auth.socialite.instructor.redirect','facebook') }}"--}}
{{--                   class="w-full btn items-center mt-6 h-12 hover:bg-gray3 transition-all transform hover:scale-[1.01] justify-center flex bg-white"--}}
{{--                   style="border: 2px solid #808080; border-radius: 5px;">--}}
{{--                    <img class="w-10 h-10 p-2" src="{{ asset('website/images/facebook.png') }}">--}}

{{--                    <span class="text-black font-bold text-sm">--}}
{{--                            {{ trans('website/signin.login') }}--}}
{{--                        </span>--}}
{{--                </a>--}}

            </div>
        </div>


        <div class="w-full md:w-[55%] hidden md:block">
            <div class="w-full">

                <svg class="w-4/12 mx-auto h-auto" width="258" height="258" viewBox="0 0 258 258" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1268_11259)">
                        <path
                            d="M220.217 37.7829C195.852 13.419 163.457 0 129 0C94.5434 0 62.1478 13.4185 37.7829 37.7829C13.419 62.1478 0 94.5434 0 129C0 163.457 13.4185 195.852 37.7829 220.217C62.1478 244.581 94.5434 258 129 258C163.457 258 195.852 244.581 220.217 220.217C244.581 195.852 258 163.457 258 129C258 94.5434 244.581 62.1478 220.217 37.7829ZM55.9865 216.325C60.2465 179.674 91.7583 151.377 129 151.377C148.632 151.377 167.094 159.026 180.981 172.911C192.712 184.644 200.112 199.964 202.015 216.323C182.233 232.891 156.762 242.883 129 242.883C101.238 242.883 75.7689 232.893 55.9865 216.325ZM129 135.806C107.397 135.806 89.8193 118.229 89.8193 96.626C89.8193 75.0211 107.398 57.4453 129 57.4453C150.602 57.4453 168.181 75.0211 168.181 96.626C168.181 118.229 150.603 135.807 129 135.807V135.806ZM215.026 203.545C211.142 187.903 203.067 173.617 191.669 162.223C182.379 152.932 171.387 145.961 159.4 141.594C173.81 131.821 183.298 115.31 183.298 96.626C183.298 66.687 158.939 42.3281 129 42.3281C99.0609 42.3281 74.7021 66.687 74.7021 96.626C74.7021 115.32 84.1977 131.836 98.62 141.608C87.591 145.627 77.3854 151.841 68.6043 160.021C55.8882 171.863 47.0583 186.963 42.9641 203.533C25.6246 183.544 15.1172 157.477 15.1172 129C15.1172 66.2047 66.2047 15.1172 129 15.1172C191.795 15.1172 242.883 66.2047 242.883 129C242.883 157.482 232.371 183.556 215.026 203.545Z"
                            fill="#F89A2C"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_1268_11259">
                            <rect width="258" height="258" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>

                <div class="w-full flex justify-center">
                    <span
                        class=" text-orange  w-full font-bold text-4xl text-center ">{{ trans('website/signup.sign_up') }}</span>
                </div>
            </div>
        </div>
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
        $('#sectionChooser').change(function () {
            var myID = $(this).val();
            $('.registerForm').each(function () {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>

@endsection
