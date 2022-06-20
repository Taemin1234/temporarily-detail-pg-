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
        <div class="step_black w25"></div>
    </div>
    
    <div class="profile_box2">
      <div class="profile_txt">
           <ul>
               <li>
                   <div class="profile_left">테마선택</div>
                   <div class="profile_right" onclick="ShowTag()">
                       <input type="text" name="Theme" value="" maxlength="" placeholder="" class="textbox" required="">
                       <div class="span_img"><img src="/img/ico_plus.svg"></div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">레시피명</div>
                   <div class="profile_right">
                       <input type="text" name="RecipeName" value="" maxlength="10" placeholder="베이컨 볶음밥" class="textbox" autofocus="" required="">
                       <div class="span_txt">(0/10)</div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">레시피 설명</div>
                   <div class="profile_right">
                       <input type="email" name="Email" value="" maxlength="10" placeholder="간단한 자취 요리 레시피" class="textbox input_btn" required="">
                       <div class="span_txt">(0/20)</div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">사진등록</div>
                   <div class="profile_right align_center">* 세로 4:3비율 사진 3~9장 등록</div>
               </li>
           </ul>
       </div>
       
       <!-- 사진등록되어서 보이는곳 -->
       <div class="camera_box">
           <!-- 사진보이는곳 -->
          <div class="swiper mySwiper">
               <div class="swiper-wrapper">
                  <!-- swiper-slide의 갯수만큼 사진이 등록된 화면이 보이며 3장~9장까지 보이도록 해주세요.사진선택은 여러장할 수 있으며 여러장 선택한대로 swiper-sllide안의 camera_img 안에 이미지가 들어가면 됩니다. -->
                  
                  <!-- 사진등록하는 처음 화면(swiper-slide가 한개만 있음) -->
                   <div class="swiper-slide">
                        <!-- 사진등록할 수 있는 버튼인데 여러개 선택이 가능하도록 해주세요. -->
                        <span class="camera"><label for="pic_file"><img src="/img/ico_camera.svg"></label><input type="file" id="pic_file"></span>
                    </div>
                    <!-- 사진등록했을때 보여지는 화면 -->
                    <!--<div class="swiper-slide">
                        <div class="camera_img"><img src="/img/main_recipe2.jpg"></div>
                    </div>-->
                </div>
                <div class="swiper-pagination"></div>
            </div>
       </div>
       <script src="/js/swiper-bundle.min.js"></script>
      <script>
          var swiper = new Swiper(".mySwiper", {
              pagination: {
                  el: ".swiper-pagination",
                  type: "progressbar",
                },
          });
        </script>
       
       <a href="/master/list/register2.php"><div class="ico_confirm">다음 페이지<img src="/img/ico_arrow.svg"></div></a>
       
    </div>
    
  
</div>