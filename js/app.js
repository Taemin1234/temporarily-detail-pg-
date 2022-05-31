// 메뉴바

$(function () {
  $(".menu-icon").on("click", function () {
    $(".topnav").toggleClass("responsive");
  });

  //메뉴버튼 클릭 시 스크롤이 되면서 이동
  $(".scroll-move").click(function (event) {
    event.preventDefault();

    $("html, body").animate({ scrollTop: $(this.hash).offset().top }, 500);
  });
});

// $(function () {
//   //resize: 브라우저 창 너비의 변경된 값을 width 변수에 저장
//   $(window).resize(function () {
//     var width = $(window).width();
//     if (width >= 992) {
//       console.log("992 이상");
//     } else if (width >= 768 && width < 992) {
//       console.log("768 이상");
//     } else if (width < 768) {
//       console.log("768 이하");
//     }
//   });

//   $(window).trigger("resize"); //강제로 호출하는 함수
// });

//메인 페이지 사진
/*$(function () {
  $(".main-img").slick({
    Infinity: true,
    slidesToShow: 1,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 8000,
  });
});
*/

// 메인 글자 타이핑
$(window).ready(function () {
  var typingBool = false;
  var typingIdx = 0;
  var liIndex = 0;
  var liLength = $(".typing-txt>ul>li").length;

  // 타이핑될 텍스트를 가져온다
  var typingTxt = $(".typing-txt>ul>li").eq(liIndex).text();
  typingTxt = typingTxt.split(""); // 한글자씩 자른다.
  if (typingBool == false) {
    // 타이핑이 진행되지 않았다면
    typingBool = true;
    var tyInt = setInterval(typing, 50); // 반복동작
  }

  function typing() {
    $(".typing ul li").removeClass("on");
    $(".typing ul li").eq(liIndex).addClass("on");
    if (typingIdx < typingTxt.length) {
      // 타이핑될 텍스트 길이만큼 반복
      $(".typing ul li").eq(liIndex).append(typingTxt[typingIdx]); // 한글자씩 이어준다.
      typingIdx++;
    } else {
      if (liIndex < liLength - 1) {
        //다음문장으로  가기위해 인덱스를 1증가
        liIndex++;
        //다음문장을 타이핑하기위한 셋팅
        typingIdx = 0;
        typingBool = false;
        typingTxt = $(".typing-txt>ul>li").eq(liIndex).text();

        //다음문장 타이핑전 1초 쉰다
        clearInterval(tyInt);
        //타이핑종료

        setTimeout(function () {
          //1초후에 다시 타이핑 반복 시작
          tyInt = setInterval(typing, 200);
        }, 200);
      } else if (liIndex == liLength - 1) {
        //마지막 문장까지 써지면 반복종료
        clearInterval(tyInt);
      }
    }
  }
});

// 스크롤 시 인포 박스 올라오기

$(window).on("scroll", function () {
  if ($(window).scrollTop() > 270) {
    $(".info-box-wrap").css("transform", "translateY(-3rem)");
  } else {
    $(".info-box-wrap").css("transform", "translateY(3rem)");
  }

  // console.log($("html").scrollTop());
});

// 카운팅

$(function () {
  $(".counter").counterUp({
    delay: 10,
    time: 1000,
  });
});

//홈페이지 소개 창 올라오기

// 1번 - 2002 2번 2678 3번 3361
$(window).on("scroll", function () {
  //data101
  if ($(window).scrollTop() > 2002) {
    $("#data101 .page-img, #data101 .info-wrap").css(
      "transform",
      "translateY(0rem)"
    );
  } else {
    $("#data101 .page-img, #data101 .info-wrap").css(
      "transform",
      "translateY(6rem)"
    );
  }

  if ($(window).scrollTop() > 2178) {
    $("#data101 .short-cut-btn").css("transform", "translateY(0rem)");
  } else {
    $("#data101 .short-cut-btn").css("transform", "translateY(6rem)");
  }

  //food101
  if ($(window).scrollTop() > 2678) {
    $("#food101 .page-img, #food101 .info-wrap").css(
      "transform",
      "translateY(0rem)"
    );
  } else {
    $("#food101 .page-img, #food101 .info-wrap").css(
      "transform",
      "translateY(6rem)"
    );
  }

  if ($(window).scrollTop() > 2854) {
    $("#food101 .short-cut-btn").css("transform", "translateY(0rem)");
  } else {
    $("#food101 .short-cut-btn").css("transform", "translateY(6rem)");
  }

  //payeat
  if ($(window).scrollTop() > 3361) {
    $("#payeat .page-img, #payeat .info-wrap").css(
      "transform",
      "translateY(0rem)"
    );
  } else {
    $("#payeat .page-img, #payeat .info-wrap").css(
      "transform",
      "translateY(6rem)"
    );
  }

  if ($(window).scrollTop() > 3537) {
    $("#payeat .short-cut-btn").css("transform", "translateY(0rem)");
  } else {
    $("#payeat .short-cut-btn").css("transform", "translateY(6rem)");
  }

  // console.log($("html").scrollTop());
});

// 페이잇 스토리 슬라이더

$(function () {
  $(".story-contents").slick({
    centerMode: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 601,
        settings: {
          slidesToShow: 1,
          variableWidth: false,
        },
      },
    ],
  });
});

$(function scrollup992() {
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 713) {
      $(".food101 section")
        .eq(2)
        .find(".content-detail-text")
        .css("transform", "translateY(-2rem)");

      $(".food101 section")
        .eq(2)
        .find(".content-detail-img")
        .css("transform", "translateY(-2rem)");
    } else {
      $(".food101 section")
        .eq(2)
        .find(".content-detail-text")
        .css("transform", "translateY(4rem)");

      $(".food101 section")
        .eq(2)
        .find(".content-detail-img")
        .css("transform", "translateY(4rem)");
    }

    if ($(window).scrollTop() > 1519) {
      $(".food101 section")
        .eq(3)
        .find(".content-detail-text")
        .css("transform", "translateY(-2rem)");

      $(".food101 section")
        .eq(3)
        .find(".content-detail-img")
        .css("transform", "translateY(-2rem)");
    } else {
      $(".food101 section")
        .eq(3)
        .find(".content-detail-text")
        .css("transform", "translateY(4rem)");

      $(".food101 section")
        .eq(3)
        .find(".content-detail-img")
        .css("transform", "translateY(4rem)");
    }

    if ($(window).scrollTop() > 2382) {
      $(".food101 section")
        .eq(4)
        .find(".content-detail-text")
        .css("transform", "translateY(-2rem)");

      $(".food101 section")
        .eq(4)
        .find(".content-detail-img")
        .css("transform", "translateY(-2rem)");
    } else {
      $(".food101 section")
        .eq(4)
        .find(".content-detail-text")
        .css("transform", "translateY(4rem)");

      $(".food101 section")
        .eq(4)
        .find(".content-detail-img")
        .css("transform", "translateY(4rem)");
    }
  });
});
