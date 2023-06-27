let arabic = document.querySelector("#Ar");
let english = document.querySelector("#En");
let body_mode = true;
let transBtn = document.querySelectorAll(".trans");
let mood = true;

// loading page
$(window).ready(function () {
  $(".loader").fadeOut(1200, function () {
    $("body").css("overflow", "auto");
    $(".loading-spiner").fadeOut(1500);
  });
});

function State() {
  if (mood == true) {
    arabic.classList.add("state");
    english.classList.remove("state");
    mood = false;
  } else {
    arabic.classList.remove("state");
    english.classList.add("state");
    mood = true;
  }
}

// Dark and light mood
function myFunction() {
  let btnMode = document.querySelector("#btnMode");
  var element = document.body;

  if (body_mode == true) {
    btnMode.classList.add("light");
    element.classList.add("light-mode");
    btnMode.classList.remove("moon-dark");
    element.classList.remove("dark");
    body_mode = false;
  } else {
    btnMode.classList.add("moon-dark");
    element.classList.add("dark");
    btnMode.classList.remove("light");
    element.classList.remove("light-mode");
    body_mode = true;
  }
}
