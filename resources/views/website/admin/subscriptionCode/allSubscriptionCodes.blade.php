@extends('website.admin.layouts.master')

@section('title')
    {{ trans('admin/admin.AllSubscriptionsCodes') }}
@endsection

@section('content')

    <div>
        <div class="w-full md:ps-24 md:px-10">
            <h4 class="font-bold text-black34 mx-auto my-5 text-2xl  lg:leading-[120%] ">
                <span>{{ trans('admin/admin.AllSubscriptionsCodes') }}</span>
            </h4>

            <form action="" method="post">
                @csrf
                <div class="w-full  mb-4 max-w-full px-3 flex-0">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 d  rounded-2xl bg-clip-border">
                        <div
                            class="border-x-gray/12.5 flex items-center  justify-between rounded-t-2xl border-b-0 border-solid p-6">

                            <div class="md:w-8/12 flex gap-2">
                                <div class="md:w-4/12 flex gap-2">
                                    <select class="inputtext select1" name="amount" id="amount" required>
                                        <option value="" selected
                                                disabled>{{ trans('admin/admin.selectTheAmount') }}</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                        <option value="2000">2000</option>
                                        <option value="4000">4000</option>
                                        <option
                                            value="specificAmount">{{ trans('admin/admin.specificAmount') }}</option>
                                    </select>
                                </div>

                                <div class="md:w-4/12 flex gap-2" style="width: 20%;display: none;"
                                     id="specificBalance">
                                    <input class="inputtext" name="specificBalance" id="specificBalanceInput"
                                           placeholder="{{ trans('admin/admin.specificAmount') }}">
                                </div>

                                <label class="containerRadio">{{ trans('admin/admin.used') }}
                                    <input type="radio" name="status" value="0" required>
                                    <span class="checkmark"></span>
                                </label>

                                <label class="containerRadio">{{ trans('admin/admin.notUsed') }}
                                    <input type="radio" name="status" value="1" required>
                                    <span class="checkmark"></span>
                                </label>

                                <button type="submit"
                                        class=" btn items-center justify-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] flex px-6">
                                <span class="text-white font-bold text-sm">
                                    {{ trans('admin/admin.Filter') }}
                                </span>
                                </button>
                            </div>
            </form>


            @can('generate_subscriptions_codes')
                <a href="{{ route('admin.createSubscriptionCode') }}"
                   class=" btn items-center mt-5 justify-center hover:bg-orange3 transition-all	 transform hover:scale-[1.01] flex px-6">
                    <span
                        class=" text-white font-bold text-sm ">{{ trans('admin/admin.AddNewSubscriptionsCodes') }}</span>
                </a>
            @endcan

        </div>

        <div>
            <div id="ajax_search_result">
                <table class="table admin" datatable id="datatable-search-list">
                    <thead>
                    <tr class="bg-orange/30">
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">-</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Code') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Balance') }}</th>
                        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Status') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($subscriptionsCodes as $code)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-sm font-medium text-black34 fontp leading-normal">
                                {{ $code->code }}
                            </td>
                            <td class="text-sm font-medium text-black34 fontp leading-normal">
                                {{ $code->balance }}
                            </td>
                            <td class="text-sm font-normal text-black34 fontp leading-normal">
                                {{ $code->status == 1 ? 'not Used' : 'Used'}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('js')
    <script>
        var amount = document.getElementById('amount');
        var specificBalance = document.getElementById('specificBalance');
        var specificBalanceInput = document.getElementById('specificBalanceInput');

        amount.addEventListener('change', function () {
            if (this.value === 'specificAmount') {
                specificBalance.style.display = 'block';
                specificBalanceInput.setAttribute('required', 'required');
            } else {
                specificBalance.style.display = 'none';
                specificBalanceInput.removeAttribute('required');
                specificBalanceInput.value = '';
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('form').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = $(this).serialize(); // Serialize all form data

                $.ajax({
                    url: "{{ route('admin.ajaxFilterSubscriptionCodes') }}", // Get the form's action attribute
                    type: "post", // Get the form's method attribute
                    datatype: "html",
                    cashe: false,
                    data: formData, // Use the serialized form data
                    success: function (data) {
                        $("#ajax_search_result").html(data);
                        console.log(data); // For example, you can log the response data
                    },
                    error: function () {
                        // Handle error here
                    }
                });
            });
        });
    </script>

    <script>
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

        ;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endsection
