<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<style>
    header {
        display: none;
    }
    body {
        padding-bottom: 0;
    }
</style>

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
 
    <!-- 이전페이지 -->
    <a href="#" onclick="goBack()" class="back_sub2"><img src="/img/ico_arrow.svg"></a>
 
    <div class="sub_txt in_txt">레시피목록<a href="/master/list/register.php" class="blue">+ 등록</a></div>

    <div class="swiper mySwiper2 result_tab">
      <div thumbsSlider="" class="swiper mySwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">대기중</div>
            <div class="swiper-slide">등록완료</div>
          </div>
      </div>
      <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="result_box">
                <div class="influ_recipe">
                    <div class="tag_pic">
                      <ul>
                         <!-- 처음엔 8개가 보이고 밑으로 내리면 16개가 보이며 그 이후는 더보기 버튼이 활성화되어 클릭해서 펼쳐지게 해주세요 -->
                          <li>
                             <a href="/master/modify/" class="pre_modify"><img src="/img/ico_rmodify.svg"></a>
                              <a href="#" onclick="ShowPreview()"> 
                                  <img src="/img/main_recipe5.jpg" alt="음식사진">
                                  <div class="recipe_sub">건강이 담겨있는</div>
                                  <div class="recipename">도토리 메밀국수</div>
                              </a>
                          </li>
                          <li>
                             <a href="/master/modify/" class="pre_modify"><img src="/img/ico_rmodify.svg"></a>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe2.jpg" alt="음식사진">
                                  <div class="recipe_sub">바다향을 느낄 수 있는</div>
                                  <div class="recipename">새우크림 파스타</div>
                              </a>
                          </li>
                          <li>
                             <a href="/master/modify/" class="pre_modify"><img src="/img/ico_rmodify.svg"></a>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe7.jpg" alt="음식사진">
                                  <div class="recipe_sub">브런치로 즐기기 쉬운 때</div>
                                  <div class="recipename">닭가슴살 바게트 만들기</div>
                              </a>
                          </li>
                          <li>
                             <a href="/master/modify/" class="pre_modify"><img src="/img/ico_rmodify.svg"></a>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe6.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                          <li>
                             <a href="/master/modify/" class="pre_modify"><img src="/img/ico_rmodify.svg"></a>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                          <li>
                             <a href="/master/modify/" class="pre_modify"><img src="/img/ico_rmodify.svg"></a>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe3.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                          <li>
                             <a href="/master/modify/" class="pre_modify"><img src="/img/ico_rmodify.svg"></a>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe4.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                          <li>
                             <a href="/master/modify/" class="pre_modify"><img src="/img/ico_rmodify.svg"></a>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe6.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                      </ul>
                  </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="result_box">
                <div class="influ_recipe">
                    <div class="tag_pic">
                      <ul>
                         <!-- 처음엔 8개가 보이고 밑으로 내리면 16개가 보이며 그 이후는 더보기 버튼이 활성화되어 클릭해서 펼쳐지게 해주세요 -->
                          <li>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe.jpg" alt="음식사진">
                                  <div class="recipe_sub">건강이 담겨있는</div>
                                  <div class="recipename">도토리 메밀국수</div>
                              </a>
                          </li>
                          <li>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe5.jpg" alt="음식사진">
                                  <div class="recipe_sub">바다향을 느낄 수 있는</div>
                                  <div class="recipename">새우크림 파스타</div>
                              </a>
                          </li>
                          <li>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe4.jpg" alt="음식사진">
                                  <div class="recipe_sub">브런치로 즐기기 쉬운 때</div>
                                  <div class="recipename">닭가슴살 바게트 만들기</div>
                              </a>
                          </li>
                          <li>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe3.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                          <li>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe7.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                          <li>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe8.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                          <li>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe4.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                          <li>
                              <a href="#" onclick="ShowPreview()">
                                  <img src="/img/main_recipe6.jpg" alt="음식사진">
                                  <div class="recipe_sub">칼칼한 맛을 느끼고 싶을 때</div>
                                  <div class="recipename">갱시기죽 끓이는 법</div>
                              </a>
                          </li>
                      </ul>
                  </div>
                </div>
            </div>
        </div>
        
        
      </div>
      
      <!-- 더보기 -->
        <div><img class="ico_plus" src="/img/ico_plus.svg"></div>
        
    </div>

    <!-- Swiper JS -->
    <script src="/js/result_tab.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".mySwiper2", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
    </script>
  
</div>