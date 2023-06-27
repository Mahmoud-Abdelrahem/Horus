// loading page
$(window).ready(function () {
  $(".loader").fadeOut(1200, function () {
    $("body").css("overflow", "auto");
    $(".loading-spiner").fadeOut(1500);
  });
});
