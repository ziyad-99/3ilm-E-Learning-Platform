$(document).ready(function () {
    if (window.screen.width > 1024) {
        $(".slider-nav5").slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          dots: true,
          focusOnSelect: true,
        });
      } else if(window.screen.width > 600 && window.screen.width < 1024) {
        $(".slider-nav5").slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          dots: true,
          focusOnSelect: true,
        });
      }
      else{
        $(".slider-nav5").slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          focusOnSelect: true,
        });
      }
    if (window.screen.width > 1024) {
    $(".slider-nav4").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      focusOnSelect: true,
    });
  }  else if(window.screen.width > 600 && window.screen.width < 1024) {
    $(".slider-nav4").slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      dots: true,
      focusOnSelect: true,
    });
  }
  else {
    $(".slider-nav4").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      focusOnSelect: true,
    });
  }
  if (window.screen.width > 1024) {
   
  $('.slider-company').slick({
    autoplay: true, 
      autoplaySpeed: 1000,
    infinite: true,
    interval: 600,
    speed: 1500,
    slidesToShow: 5,
    slidesToScroll: 1,
    focusOnSelect: true,
    arrows : false,
  });
}
else {
  $('.slider-company').slick({
    autoplay: true, 
      autoplaySpeed: 1000,
    infinite: true,
    interval: 600,
    speed: 1500,
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    arrows : false,
  });
}
});
