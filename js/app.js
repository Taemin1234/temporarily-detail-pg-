// 메뉴바

$(function () {
  // $(".menu-icon").on("click", function () {
  //   $(".topnav").toggleClass("responsive");
  // });

  //메뉴버튼 클릭 시 스크롤이 되면서 이동
  $(".scroll-move").click(function (event) {
    event.preventDefault();

    $("html, body").animate({ scrollTop: $(this.hash).offset().top }, 500);
  });

  // 모바일에서 메뉴 버튼 클릭 시 2차 메뉴 나타나고 다른 메뉴 닫기

  // $(this)
  //   .find(".dropdown")
  //   .click(function () {
  //     var $thisContent = $(this).find(".dropdown-content");

  //     $thisContent.toggleClass("menu-open");
  //     $(".dropdown-content").not($thisContent).removeClass("menu-open");
  //   });

  $(".menu-icon").click(function () {
    var $clicked = $(this);
    var nowAnimating = $clicked.attr("data-ico-now-animating");

    /* 만약 토글 사이드바 버튼의 요소가 Y가 되면 */
    if (nowAnimating == "Y") {
      return;
      /* 함수를 리턴하여 다시 안눌리게 한다 */
    }

    /* 만약 클릭된 버튼에 active 클래스가 있다면 */
    if ($clicked.hasClass("active")) {
      /* 사이드바를 없앤다 */
      hideRightSideBar();
    } else {
      /* active 클래스가 없으면 나타나게 한다 */
      showRightSideBar();
    }

    /* 아이콘의 색을 변경 */
    $clicked.attr("data-ico-now-animating", "Y");

    /* 아이콘에 active 클래스가 없으면 active 클래스를 넣어주고 있으면 빼줌 */
    $clicked.toggleClass("active");

    /* 버튼 아이콘의 색이 변한 후에 0.4초 뒤에 다시 원래색으로 돌아오게 만듬 */
    setTimeout(function () {
      $clicked.attr("data-ico-now-animating", "N");
    }, 400);
  });

  /* 왼쪽 사이드바 함수 */
  function showRightSideBar() {
    /* 메뉴바가 나올때 안에 펼쳐져 있는 메뉴들을 다 접기위해 엑티브를 없앤다 */
    $(".right-sidebar > .menu-1 ul > li.active").removeClass("active");
    $(".right-sidebar-box").addClass("active");
  }
  function hideRightSideBar() {
    $(".right-sidebar-box").removeClass("active");
  }

  /* 메뉴 접히고 펼치기 */
  $(".right-sidebar > .menu-1 ul > li").click(function (e) {
    //console.log("메뉴 클릭됨");

    /* 만약 클릭된 메뉴에 엑티브 클래스가 있으면 */
    if ($(this).hasClass("active")) {
      /* 클릭된 메뉴의 엑티브를 없앤다 */
      $(this).removeClass("active");
    } else {
      /* 클릭된 메뉴의 형제의 엑티브를 없앤다 */
      $(this).siblings(".active").removeClass("active");

      /* 클릭된 메뉴(지역)의 엑티브를 없앤다 */
      $(this).find(".active").removeClass("active");

      /* 클릭된 메뉴의 엑티브를 만든다 */
      $(this).addClass("active");
    }

    /* 클릭된 메뉴 안에 다른 메뉴를 클릭하면 위에있는 메뉴가 같이 클릭되는데 그것을 막아준다 */
    e.stopPropagation();
  });

  /* 좌측 사이드바 배경을 클릭했을때 */
  $(".right-sidebar-box").click(function () {
    //console.log('배경클릭');

    /* 토글 사이드바 버튼을 클릭한 효과를 만듬 */
    $(".menu-icon").click();
  });

  /* 사이드바를 클릭하면 상위 요소인 배경을 클릭을 방지 */
  $(".right-sidebar").click(function (e) {
    e.stopPropagation();
  });
});

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
