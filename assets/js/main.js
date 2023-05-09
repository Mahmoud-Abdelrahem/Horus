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

// translate code

let arabic = document.querySelector("#Ar");
let english = document.querySelector("#En");
let transBtn = document.querySelector(".trans")
let mood = true

transBtn.addEventListener("click" , function(){

  if (mood == true){
    arabic.classList.add("state");
    english.classList.remove("state");
    mood = false;
  }else{
    arabic.classList.remove("state");
    english.classList.add("state");
    mood = true;
  }
 
  
})
