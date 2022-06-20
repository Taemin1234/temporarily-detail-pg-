<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<style>
    header {
        display: none;
    }
</style>

<!-- 테마선택 -->
<div class="memo_box2">
   <div class="memo_bg" onclick="HideTag()"></div>
    <div class="reply_content">
        <h7 class="num">테마 선택</h7>
        <div class="search_box">
            <div class="search_tag">
               <!-- 해당태그를 클릭시 창이 닫기며 빈칸에 태그가 입력되도록 해주세요 -->
                <a href="#" class="search_recipe">메인요리</a>
                <a href="#" class="search_recipe">간단요리</a>
                <a href="#" class="search_recipe">베이킹</a>
                <a href="#" class="search_recipe">초대요리</a>
                <a href="#" class="search_recipe">한식</a>
                <a href="#" class="search_recipe">양식</a>
                <a href="#" class="search_recipe">일식</a>
                <a href="#" class="search_recipe">중식</a>
            </div>
        </div>
        
        <div onclick="HideTag()" class="close_box"><div class="m_close"><img src="/img/ico_close.svg"></div></div>
    </div>
</div>
<script type="text/javascript">
  //스르륵 팝업
    var giMenuDuration = 500;

        function ShowTag(){
            $('.memo_box2' ).css( { 'display' : 'block' } );
            $('.reply_content' ).css( { 'bottom' : '-100%' } );
            $('.reply_content' ).animate( { bottom: '0px' }, { duration: giMenuDuration } );
            $('.memo_bg').fadeIn();
        }
        function HideTag(){
            $('.reply_content' ).animate( { bottom: '-100%' }, { duration: giMenuDuration, complete:function(){ $('.memo_box2' ).css( { 'display' : 'none' } ); } } );
            $('.memo_bg').fadeOut();
        }
</script>

<!-- 레시피 미리보기 -->
<div class="pre_box">
    <div class="reply_content">
         <!-- 이전페이지 -->
            <a href="#" onclick="HidePreview()" class="back_sub2"><img src="/img/ico_arrow.svg"></a>

           <div class="sub_txt in_txt">미리보기</div>
          <div class="recipe_slide">
              <div class="recipe_box">
                   <div class="influ_tag tag_txt">
                         <ul>
                              <li>죽요리</li>
                              <li>담백요리</li>
                              <li>김치요리</li>
                              <li>쉬운초보요리</li>
                          </ul>
                    </div>
                </div>
              <div class="swiper preSwiper">
                  <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <a href="/recipe/detail.php">
                            <div class="slide_img"><img src="/img/main_recipe8.jpeg"></div>
                            <div class="text_bg"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/recipe/detail.php">
                            <div class="slide_img"><img src="/img/main_recipe8-1.jpeg"></div>
                            <div class="text_bg"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/recipe/detail.php">
                            <div class="slide_img"><img src="/img/main_recipe8-2.jpeg"></div>
                            <div class="text_bg"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/recipe/detail.php">
                            <div class="slide_img"><img src="/img/main_recipe8-3.jpeg"></div>
                            <div class="text_bg"></div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/recipe/detail.php">
                            <div class="slide_img"><img src="/img/main_recipe8-4.jpeg"></div>
                            <div class="text_bg"></div>
                        </a>
                    </div>

                  </div>
                  <div class="swiper-pagination"></div>
                </div>
          </div>
          <div class="recipe_detail">
              <div class="influ_box">
                  <div class="influ_line">
                      <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                      <!-- 한줄만 보여야합니다 -->
                      <div class="recipename">갱시기죽 끓이는 법</div>
                  </div>
                  <!-- 스크랩과 재료목록담기 아이콘이며 클릭시 하단에 추가된 관련내용의 창이 뜹니다-->
                  <div class="influ_favor">
                        <div class="scrap_ico"><img src="/img/ico_bscrap.svg"></div>
                  </div>
                  <div class="influ_favor">
                        <div class="cart_ico"><img src="/img/ico_cart.svg"></div>
                  </div>
              </div>

              <hr>

              <div class="influ_box">
                    <div class="influ_pic">
                        <img src="/img/influ_pic.jpg">
                    </div>
                    <!-- 최대 20자만 보이게 해주세요 -->
                    <div class="influ_txt">
                        <a href="/influ/detail.php"><h3>요리하는 고양이<img src="/img/ico_narrow.svg"></h3></a>
                        <p>30대·반찬·간식·캠핑파티</p>
                    </div>
                    <div class="influ_favor">
                        <div class="favor_ico"><img src="/img/star.svg"></div>
                        <div class="favor_txt">109.4만</div>
                    </div>
              </div>

                <hr>

                <!-- 재료/ 양념-->
                <div class="recipe_material">
                   <h7>[재료]</h7>
                    <ul>
                        <li>
                            <div class="recipe_front">돼지고기 불고기감</div>
                            <div class="recipe_back">300g</div>
                        </li>
                    </ul>
                </div>
                <div class="recipe_material">
                   <h7>[양념]</h7>
                    <ul>
                        <li>
                            <div class="recipe_front">진간장</div>
                            <div class="recipe_back">3큰술</div>
                        </li>
                        <li>
                            <div class="recipe_front">국간장</div>
                            <div class="recipe_back">1/2큰술</div>
                        </li>
                        <li>
                            <div class="recipe_front">물엿</div>
                            <div class="recipe_back">2큰술</div>
                        </li>
                        <li>
                            <div class="recipe_front">설탕</div>
                            <div class="recipe_back">1/2큰술</div>
                        </li>
                        <li>
                            <div class="recipe_front">맛술</div>
                            <div class="recipe_back">3큰술</div>
                        </li>
                        <li>
                            <div class="recipe_front">매실액</div>
                            <div class="recipe_back">1큰술</div>
                        </li>
                        <li>
                            <div class="recipe_front">후추</div>
                            <div class="recipe_back">약간</div>
                        </li>
                    </ul>
                </div>

                <!-- 팁 -->
                <div class="recipe_tip">
                    <div class="tip_ico">
                        <img src="/img/ico_tip.svg">
                    </div>
                    <div class="tip_txt">구울 때 양념이 타지 않게 잘 뒤적여 주면서 구워주세요. 가만히 두면 속은 덜 익고 겉은 타는 일이 생길 수 있어요.</div>
                </div>

                <!-- 영상 -->
                <div class="recipe_movie">
                   <!-- 유튜브에서 썸네일 마우스 오버시 보여지는 화면을 링크로 걸어두었습니다. 영상부분을 표시하려고 만들어두었습니다. -->
                    <img id="thumbnail" alt="" class="" src="https://i.ytimg.com/an_webp/opq-QVDW7lk/mqdefault_6s.webp?du=3000&sqp=CKWpuYsG&rs=AOn4CLCxwRMCKde9wqAXuBqp_G_24Ug21Q">
                </div>

                <!-- 작은 이미지일 경우 -->
                <div class="influ_recipe">
                    <div class="influ_box">
                        <h4>제로키친님의<br>다른 요리 레시피</h4>
                        <div class="influ_pic">
                            <img src="/img/influ_pic.jpg">
                        </div>
                    </div>
                    <div class="tag_pic">
                      <ul>
                          <li>
                              <a href="#">
                                  <img src="/img/main_recipe5.jpg" alt="음식사진">
                                  <div class="recipe_sub">건강이 담겨있는</div>
                                  <div class="recipename">도토리 메밀국수</div>
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <img src="/img/main_recipe2.jpg" alt="음식사진">
                                  <div class="recipe_sub">바다향을 느낄 수 있는</div>
                                  <div class="recipename">새우크림 파스타</div>
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <img src="/img/main_recipe7.jpg" alt="음식사진">
                                  <div class="recipe_sub">브런치로 즐기기 쉬운 때</div>
                                  <div class="recipename">닭가슴살 바게트 만들기</div>
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <img src="/img/main_recipe6.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <img src="/img/main_recipe.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                      </ul>
                  </div>
                </div>

                <!-- 광고 -->
                <div class="main_ad"><img src="/img/recipe_ad.jpg"></div>

          </div>  
    </div>
</div>
  
 
  <script src="/js/swiper-bundle.min.js"></script>
  <script>
      var swiper = new Swiper(".preSwiper", {
          pagination: {
              el: ".swiper-pagination",
              type: "progressbar",
            },
          loop: true,
      });
      
      //스크랩
      $(function(){
            $(".scrap_ico").on("click", function(){ $(this).find("img").attr("src","/img/ico_bscrap.svg"); if($(this).hasClass("bounce") == false){ $(this).removeClass("bounce_out"); $(this).addClass("bounce");
                } else { $(this).removeClass("bounce"); $(this).addClass("bounce_out"); $(this).find("img").attr("src","/img/ico_bscrap_on.svg");
                }
            });
        });
      
      //미리보기
      var giMenuDuration = 500;

    function ShowPreview(){
        $('.pre_box' ).css( { 'display' : 'block' } );
        $('.reply_content' ).css( { 'bottom' : '-100%' } );
        $('.reply_content' ).animate( { bottom: '0px' }, { duration: giMenuDuration } );
    }
    function HidePreview(){
        $('.reply_content' ).animate( { bottom: '-100%' }, { duration: giMenuDuration, complete:function(){ $('.pre_box' ).css( { 'display' : 'none' } ); } } );
    }
  </script>



<!-- 본문 컨테이너 -->
<div id="container"> 
 
     <!-- 닫기전에 취소관련 팝업창이 뜨고 확인을 누르면 창이 닫기게 되며 레시피목록으로 넘어가게됩니다. -->
    <a href="#" class="back_sub3"><img src="/img/ico_close.svg" id="modal-open"></a>
 
  <!-- 취소를 눌렀을때도 취소관련 팝업창이 뜨게 해주세요 -->
   <div class="sub_txt in_txt">레시피 등록<a href="#" class="red" id="modal-open">취소</a></div>
   
   <div class="popup-wrap" id="popup">
        <div class="popup">
          <div class="popup-body">
            레시피 등록을<br>취소하시겠습니까?
          </div>
          <div class="popup-foot">
            <span class="pop-btn confirm" id="confirm">삭제</span>
            <span class="pop-btn close" id="close">취소</span>
          </div>
        </div>
       </div>
       <script>
            $(function(){
              $("#modal-open").click(function(){  $("#popup").css('display','flex').hide().fadeIn();
                  $("body").css('overflow-y',"hidden");
              });
              $("#close").click(function(){
                  modalClose();
              });
              function modalClose(){
                  $("#popup").fadeOut();
                  $("body").css('overflow-y',"auto");
              }
            });
       </script>
    
    <!-- 단계표시 -->
    <div class="step_box">
        <div class="step_black w100"></div>
    </div>
    
    <div class="profile_box2">
      <div class="profile_txt">
           <ul>
               <li>
                   <div class="profile_left">TIPS</div>
                   <div class="profile_right">
                       <script>
                            //댓글 글자수 체크
                            $(function() {
                                $('#ser_write').keyup(function (e){
                                    var cmtWord = $(this).val();
                                    $('#counter').html(cmtWord.length + '/70');
                                });
                                $('#ser_write').keyup();
                            });
                          </script>
                        <div class="ser_write_wrap">
                          <div class="ser_write_box">
                            <textarea id="ser_write" maxlength="70" rows="3" cols="30" placeholder="ex)구울 때 양념이 타지 않게 잘 뒤적여 주면서 구워주세요. 가만히 두면 속은 덜 익고 겉은 타는 일이 생길 수 있어요." class="ser_textarea"></textarea>
                            <div class="ser_word_count" id="counter"></div>
                          </div>
                        </div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">동영상</div>
                   <div class="profile_right">
                       <input type="text" name="RecipeMovie" value="" maxlength="10" placeholder="유튜브 url" class="textbox" autofocus="" required="">
                       <!-- 클릭시 복사한 주소를 붙여넣을 수 있게 해주세요 --><div class="ico_btn5">+붙혀넣기</div>
                   </div>
               </li>
               <li class="recipe_end">
                   <div class="profile_left">레시피 태그</div>
                   <div class="profile_right">
                       <div class="profile_tag">
                           <div class="profile_left num">#1</div>
                           <div class="profile_right" onclick="">
                              <!-- 태그 추가했을때의 창 : 이미지가 ico_dplus.svg로 바뀌게 됩니다. 칸안에 입력된 태그는 수정이 되지않아야합니다. -->
                               <input type="text" name="UserTag" value="30대" placeholder="" class="textbox">
                               <div id="modal-open2" class="span_img"><img src="/img/ico_dplus.svg"></div>
                           </div>
                           <!-- 태그가 추가되고 삭제할때 뜨는 팝업창이며 태그가 추가되었을 경우 위의 onclick="ShowTag()"이 없어져야합니다 -->
                          <div class="popup-wrap" id="popup2">
                            <div class="popup">
                              <div class="popup-body">
                                삭제하시겠습니까?
                              </div>
                              <div class="popup-foot">
                                <span class="pop-btn confirm" id="confirm">삭제</span>
                                <span class="pop-btn close" id="close2">취소</span>
                              </div>
                            </div>
                           </div>
                           <script>
                                $(function(){
                                  $("#modal-open2").click(function(){  $("#popup2").css('display','flex').hide().fadeIn();
                                      $("body").css('overflow-y',"hidden");
                                  });
                                  $("#close2").click(function(){
                                      modalClose();
                                  });
                                  function modalClose(){
                                      $("#popup2").fadeOut();
                                      $("body").css('overflow-y',"auto");
                                  }
                                });
                           </script>
                       </div>
                       <div class="profile_tag">
                           <div class="profile_left num">#2</div>
                           <div class="profile_right" onclick="ShowTag()">
                              <!-- 태그 추가했을때의 창 : 이미지가 ico_dplus.svg로 바뀌게 됩니다. 칸안에 입력된 태그는 수정이 되지않아야합니다. -->
                               <input type="text" name="UserTag" value="관련련분야종사" placeholder="" class="textbox">
                               <div id="modal-open2" class="span_img"><img src="/img/ico_dplus.svg"></div>
                           </div>
                       </div>
                       <div class="profile_tag">
                           <div class="profile_left num">#3</div>
                           <div class="profile_right" onclick="ShowTag()">
                               <input type="text" name="UserTag" value="" maxlength="20" placeholder="" class="textbox" required="">
                               <div class="span_img"><img src="/img/ico_plus.svg"></div>
                           </div>
                       </div>
                       <div class="profile_tag">
                           <div class="profile_left num">#4</div>
                           <div class="profile_right" onclick="ShowTag()">
                               <input type="text" name="UserTag" value="" maxlength="20" placeholder="" class="textbox" required="">
                               <div class="span_img"><img src="/img/ico_plus.svg"></div>
                           </div>
                       </div>
                   </div>
               </li>
           </ul>
       </div>
       
       <a href="#" onclick="ShowPreview()"><div class="ico_btn8">미리보기</div></a>
       
    </div>
    
    <div class="register_btn">
          <div class="ico_confirm3"><a href="/master/list/register2.php"><img src="/img/ico_arrow.svg">이전 페이지</a></div>
          <div class="ico_confirm2"><a href="/master/list/register4.php">등록하기<img src="/img/ico_arrow.svg"></a></div>
    </div>
    
  
</div>