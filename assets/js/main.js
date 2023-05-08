// slider about
$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    center: false,
    items: 2,
    loop: true,
    margin: 10,
    autoplay: true,
    responsive: {
      600: {
        items: 3,
      },
      1000: {
        items: 1,
      },
    },
  });
});

// loading page
$(window).ready(function () {
  $(".loader").fadeOut(1200, function () {
    $("body").css("overflow", "auto");
    $(".loading-spiner").fadeOut(1500);
  });
});

// lightbox photo transition
lightbox.option({
  resizeDuration: 1000,
  wrapAround: true,
  positionFromTop: 100,
  disableScrolling: true,
  fitImagesInViewport: true,
});

// animation
wow = new WOW({
  boxClass: "animate__animated", // default
  animateClass: "animated", // default
  offset: 0, // default
  mobile: true, // default
  live: true, // default
});
wow.init();

// btn-top
var btn_top = document.querySelector("#top");
console.log(btn_top);

window.onscroll = function () {
  if (scrollY >= 100) {
    btn_top.classList.add("btn-visible");
  } else {
    btn_top.classList.remove("btn-visible");
  }
};

// Swiper
// var swiper = new Swiper(".mySwiper", {
//   spaceBetween: 30,
//   centeredSlides: true,
//   loop:true,
//   slidesPerView: 2,
//   autoplay: {
//     delay: 3000,
//     disableOnInteraction: false,
//   },

//   grid: {
//     rows: 1,
//   },
//   pagination: {
//     el: ".swiper-pagination",
//     clickable: true,
//   },
//   navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev",
//   },
// });
