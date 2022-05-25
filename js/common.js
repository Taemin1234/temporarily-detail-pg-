function fillWidth(elem, timer, limit) {
	if (!timer) { timer = 2000; }	
	if (!limit) { limit = 100; }
	
};

/* 복사버튼 */
function toast(msg, timer) {
	if (!timer) { timer = 1000; }
	var $elem = $("<div class='toastWrap'><span class='toast'>" + msg + "<b></b><div class='timerWrap'></div></span></div>");
	$("#toast").append($elem); //top = prepend, bottom = append
	$elem.slideToggle(100, function() {
		$('.timerWrap', this).first().outerWidth($elem.find('.toast').first().outerWidth() - 10);
		if (!isNaN(timer)) {
			fillWidth($elem.find('.timer').first()[0], timer);
			setTimeout(function() {
				$elem.fadeOut(function() {
					$(this).remove();
				});
			}, timer);			
		}
	});
}

/* 로그인되어있는 상태에서 즐겨찾기가 되었을때 뜨는 팝업 */
function toast2(msg, timer) {
	if (!timer) { timer = 2000; }
	var $elem = $("<div class='toastWrap2'><span class='toast2'>" + msg + "<b></b><div class='timerWrap2'></div></span></div>");
	$("#toast2").append($elem); //top = prepend, bottom = append
	$elem.slideToggle(100, function() {
		$('.timerWrap2', this).first().outerWidth($elem.find('.toast2').first().outerWidth() - 10);
		if (!isNaN(timer)) {
			fillWidth($elem.find('.timer').first()[0], timer);
			setTimeout(function() {
				$elem.fadeOut(function() {
					$(this).remove();
				});
			}, timer);			
		}
	});
}


/* 카운팅 */
(function(e){"use strict";e.fn.counterUp=function(t){var n=e.extend({time:400,delay:10},t);return this.each(function(){var t=e(this),r=n,i=function(){var e=[],n=r.time/r.delay,i=t.text(),s=/[0-9]+,[0-9]+/.test(i);i=i.replace(/,/g,"");var o=/^[0-9]+$/.test(i),u=/^[0-9]+\.[0-9]+$/.test(i),a=u?(i.split(".")[1]||[]).length:0;for(var f=n;f>=1;f--){var l=parseInt(i/n*f);u&&(l=parseFloat(i/n*f).toFixed(a));if(s)while(/(\d+)(\d{3})/.test(l.toString()))l=l.toString().replace(/(\d+)(\d{3})/,"$1,$2");e.unshift(l)}t.data("counterup-nums",e);t.text("0");var c=function(){t.text(t.data("counterup-nums").shift());if(t.data("counterup-nums").length)setTimeout(t.data("counterup-func"),r.delay);else{delete t.data("counterup-nums");t.data("counterup-nums",null);t.data("counterup-func",null)}};t.data("counterup-func",c);setTimeout(t.data("counterup-func"),r.delay)};t.waypoint(i,{offset:"100%",triggerOnce:!0})})}})(jQuery);



/* 즐찾버튼 누르면 이미지변하는거 */
$(document).ready(function() {
    var flag = 0;
    $(".btn_star").click(function() {
        if (flag == 0) {
            $(".btn_star img").attr("src", "/img/star_on.svg");
            flag = 1;
        } else if (flag == 1) {
            $(".btn_star img").attr("src", "/img/bstar.svg");
            flag = 0;
        }
    });
});



// 각 select마다 선택하면 하단에 뿌려지는 데이터도 함께 변하게 설정해주세요. 예를들어 학교에서 초등을 선택하면 조회나 검색을 누르지 않아도 초등관련 데이터가 뜨도록해주세요 
    $(document).ready(function(){
      topTextChanger();
      topAreaClick01();
      topAreaClick02();
      ulSelect();
    })
    function topTextChanger(){
        var $button = $(".recipead_plus ol li");
        $button.click(function(){
            var $text = $(this).attr("data-value");
            $(this).parent().siblings("a").text($text);
        })
    }
    function topAreaClick01() {
        $(".recipead_plus ul > li a").click(function (e) {
            e.preventDefault();
            if ($(this).siblings("ol").is(":visible") == true) {
                $(this).siblings("ol").slideUp();
            } else {
                $(".recipead_plus ul > li ol").slideUp();
                $(this).siblings("ol").slideDown();
            }
        })
    }
    function topAreaClick02() {
        $(".recipead_plus ul > li ol li").click(function () {
            $(".recipead_plus ul > li ol").fadeOut();
        })
    }
    function ulSelect() {
        var allOptions = $(".recipead_plus ul > li").children("ol");
        $(".recipead_plus ul > li").on("click", ".recipead_plus ul > li ol", function () {
            allOptions.removeClass('selected');
            $(this).addClass('selected');
            $(".recipead_plus ul > li").children('a').html($(this).html());
            allOptions.toggle();
        });
    }


//수정과 사진을 클릭시 수정이 가능한 파업이 뜨는 스크립트입니다
$(function() {
    $(".mypage_modi").hide(); 
    $(".btn_modify").click(function(){
       $(".mypage_modi").show(); 
       $(".modi_pop").addClass("active");
    });
    $(".close1").click(function(){
       $(".mypage_modi").hide(); $(".modi_pop").removeClass("active");
    });
});

  $(function() {
    $(".mypage_pic").hide(); 
    $(".btn_pic").click(function(){
       $(".mypage_pic").show(); 
       $(".modi_pop").addClass("active");
    });
    $(".close1").click(function(){
       $(".mypage_pic").hide(); $(".modi_pop").removeClass("active");
    });
});