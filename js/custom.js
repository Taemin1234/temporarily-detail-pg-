$(function () {
  //   $("#slides").superslides({
  //     slide_easing: "easeInOutCubic",
  //     play: 5000,
  //     slide_speed: 800,
  //     pagination: false,
  //     hashchange: false,
  //     scrollable: true,
  //   });

  $(".tabs-container ul li").on("click", function (e) {
    e.preventDefault();

    var ind = $(this).index();

    $(".phone-thumb img").hide();
    $(".phone-thumb img").eq(ind).fadeIn("slow");

    $(".advantage-01 > div").hide();
    $(".advantage-01 > div").eq(ind).fadeIn("slow");

    $(".advantage-02 > div").hide();
    $(".advantage-02 > div").eq(ind).fadeIn("slow");
    $(".advantage-02 > div")
      .eq(ind)
      .find("ul")
      .css({ "animation-name": "fadeInRight", visibility: "visible" });

    $(this).parent().find("li").removeClass("active");
    $(this)
      .parent()
      .find("li")
      .each(function () {
        $(this)
          .find("img")
          .attr("src", $(this).find("img").attr("src").replace("on", "off"));
      });
    $(this)
      .find("img")
      .attr("src", $(this).find("img").attr("src").replace("off", "on"));
    $(this).addClass("active");
  });

  $(".faq-list ul li").on("click", function (e) {
    e.preventDefault();

    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).find("ul").slideUp("fast");
    } else {
      $(this).parent().find("li").removeClass("active");
      $(this).parent().find("li").find("ul").slideUp("fast");
      $(this).addClass("active");
      $(this).find("ul").slideDown("fast");
    }
  });

  $(".btn-detail").on("click", function (e) {
    e.preventDefault();

    $(".service-modal").fadeIn("fast");

    $("html, body").css("overflow", "hidden");

    var top =
      $(".service-modal").height() / 2 -
      $(".service-modal .modal-pay").height() / 2;

    $(".service-modal .modal-pay").css("margin-top", top + "px");
  });

  $(".service-modal .modal-close").on("click", function (e) {
    e.preventDefault();

    $(".service-modal").fadeOut("fast");

    $("html, body").css("overflow", "auto");
  });
});
