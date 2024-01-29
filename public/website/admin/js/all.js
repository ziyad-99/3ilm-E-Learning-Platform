
function dropdown(name) {
  document.getElementById(name).classList.toggle("show");
}

let gg22 =document.querySelector(".gg422");
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
let gg2 = document.querySelector(".flexsss");
        let gg4 = document.querySelector(".gg4");
        function openNav() {
            gg4.classList.add('block');
            gg4.classList.remove('hidden');

            document.body.classList.add("overflow-hidden");
            document.body.style.height = "100vh";
            document.body.style.position = "fixed";
            document.body.style.width = "100%";
            gg2.classList.add("fixed");
            gg2.classList.remove("hidden");
        }
        function closeNav() {
            gg4.classList.remove('block');
            gg4.classList.add('hidden');

            document.body.classList.remove("overflow-hidden");
            document.body.style.height = "100%";
            document.body.style.position = "relative";
            document.body.style.width = "100%";
            gg2.classList.remove("fixed");
            gg2.classList.add("hidden");


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