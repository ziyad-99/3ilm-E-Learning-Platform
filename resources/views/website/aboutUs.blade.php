@extends('website.layouts.master')

@section('title')
    About us
@endsection

@section('content')

    <div>
        <h3 class=" font-bold text-black34 text-center text-4xl mt-28">About Us</h3>
        <p data-id="language"
           class=" text-center text-black34 fontt font-medium mx-auto lg:w-9/12 text-[20px] leading-[135%] mt-5 mb-5">
            في سنة 2016  تم افتتاح مؤسسة أكاديمية سوف بانطلاقة قوية مدعمة بعدة تعاقدات دولية ووطنية هدفها الأساسي مساعدة
            الشباب على فتح مشاريعهم وزيادة وتنويع فرصهم في الحصول على مناصب عمل في عدة مجالات، وذلك بتقديم ورشات ودورات
            تكوينية خرجات تطبيقية وميدانية </p>
        </p>
        <p data-id="language"
           class=" text-center text-black34 fontp font-medium mx-auto lg:w-9/12 text-[20px] leading-[135%] mt-4 mb-12">
            في أكاديمية سوف نوفر دروس الدعم المدرسي للطلاب الذين يحتاجون إلى مساعدة إضافية لتحقيق نجاحهم الأكاديمي، حيث
            يتعامل معهم مدرسون متخصصون وذوو خبرة في تقديم المساعدة الملائمة لكل طالب. يتم تشخيص الصعوبات التي يواجهها
            الطالب ووضع خطة عمل مخصصة تستهدف تعزيز نقاط القوة وتحسين المهارات الضعيفة، تشمل دروس الدعم كل المواد موجهة
            لكافة المستويات، نستخدم أساليب تعليمية مبتكرة تجمع بين التفاعل والتطبيق العملي لتعزيز الفهم والاستيعاب.
        </p>
        <img class="h-automt-32 w-full object-cover mt-32" src="{{ asset('website/admin/images/aboutus.webp') }}"/>
        <h3 class=" font-bold text-black34 text-center text-3xl mb-20 mt-14">Our Story</h3>
        <div class="bg-[#e9e9e9]">
            <div class="widthfull overflow-hidden pt-6 pb-6 mt-5">


                <div class=" relative w-full mt-8 flex">
                    <div id="ourstory" class="overflow-x-auto flex " style="color: #000; " data-aos="fade-up">

                        <a type="button"
                           onclick='openPop44("https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg","29 مارس 2016 دورة التفوق الدراسي لطلبة البكالوريا سنة 2016")'
                           class="group w-80 ">
                            <div class="w-80 px-5 mb-10 ">
                                <div class=" w-full ">
                                    <img src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                         class="w-full h-64  rounded-xl object-cover ">
                                    <h5 class="text-2xl text-center font-bold mt-3 group-hover:text-orange text-orange2">
                                        The Beginning</h5>
                                </div>
                            </div>
                        </a>
                        <a type="button"
                           onclick='openPop44("https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg","29 مارس 2016 دورة التفوق الدراسي لطلبة البكالوريا سنة 2016")'
                           class="group w-80 ">
                            <div class="w-80 px-5 mb-10 ">
                                <div class=" w-full ">
                                    <img src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                         class="w-full h-64  rounded-xl object-cover ">
                                    <h5 class="text-2xl text-center font-bold mt-3 group-hover:text-orange text-orange2">
                                        The Beginning
                                    </h5>
                                </div>
                            </div>
                        </a>
                        <a type="button"
                           onclick='openPop44("https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg","29 مارس 2016 دورة التفوق الدراسي لطلبة البكالوريا سنة 2016")'
                           class="group w-80 ">
                            <div class="w-80 px-5 mb-10 ">
                                <div class=" w-full ">
                                    <img src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                                         class="w-full h-64  rounded-xl object-cover ">
                                    <h5 class="text-2xl text-center font-bold mt-3 group-hover:text-orange text-orange2">
                                        The Beginning</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="mx-auto relative boxshadow z-10 flex-wrap items-center rounded-[10px] w-11/12 md:w-6/12 mt-40 -mb-10 bg-white p-8 flex">
            <p class="fontp text-black2 w-full md:w-8/12 font-semibold text-xl leading-[136%]  text-start">
                We help you level up your academic and professional career.
            </p>
            <button
                class=" w-44 btn items-center justify-center flex mx-auto hover:bg-orange3 transition-all	 transform hover:scale-[1.01] mt-2 md:mt-0 md:me-auto md:ms-3 px-6">
                <span class=" text-white font-bold text-sm ">Start Now</span>
            </button>
        </div>
        <div onclick="closePop44()"
             class="fixed flexsss24 top-0 left-0 right-0 z-[100] hidden  flex-col  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl mx-auto my-auto  max-h-full">
                <div class=" relative  rounded-lg overflow-hidden">
                    <img id="srcimg" src="https://lmszai.zainikthemes.com/uploads/bundle/1662703180-xG4o7nZaOs.jpg"
                         class="w-full h-auto  rounded-lg object-cover ">
                    <div class="absolute bottom-0 w-full h-48 bgg"></div>
                    <p id="desc"
                       class="fontp absolute bottom-8 text-white md:w-10/12 right-0 left-0 mx-auto font-semibold text-2xl leading-[136%]  text-center">
                        29 مارس 2016 دورة التفوق الدراسي لطلبة البكالوريا سنة 2016
                    </p>
                </div>
            </div>
        </div>
        <div onclick="closePop44()" class=" bg-black/50  fixed top-0 gg4223 bottom-0 hidden right-0 left-0 z-50"></div>
        <script>
            let gg22443 = document.querySelector(".gg4223");

            function openPop44(url, desc) {
                document.querySelector(".flexsss24").classList.add('flex');
                document.querySelector(".flexsss24").classList.remove('hidden');

                document.body.classList.add("overflow-hidden");
                document.body.style.width = "100%";
                gg22443.classList.remove("hidden");
                document.querySelector("#srcimg").src = url;
                document.querySelector("#desc").textContent = desc;
            }

            function closePop44() {
                document.querySelector(".flexsss24").classList.remove('flex');
                document.querySelector(".flexsss24").classList.add('hidden');
                document.body.classList.remove("overflow-hidden");
                document.body.style.height = "100%";
                document.body.style.position = "relative";
                document.body.style.width = "100%";

                gg22443.classList.remove("block");
                gg22443.classList.add("hidden");


            }
        </script>


        @endsection
        