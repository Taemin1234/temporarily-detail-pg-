<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<style>
    header {
        display: none;
    }
</style>

<!-- 양념류 입력 -->
<div class="alarm_box">
    <div class="reply_content"><!-- 이전페이지 -->
        <a href="#" onclick="HideInput()" class="back_sub2"><img src="/img/ico_arrow.svg"></a>

        <div class="sub_txt">양념류 입력</div>
        
        <div class="profile_box">
           <div class="modify_txt">
               <ul>
                   <li>
                       <div class="profile_left">양념</div>
                       <div class="profile_right">
                           <div class="form_para">
                              <input type="text" name="Season" value="" maxlength="50" placeholder="양념명을 입력하세요" class="textbox" autofocus="" required="">
                            </div>
                       </div>
                   </li>
                   <!-- 처음에 보이지 않다가 양념을 검색했을때 보여지는 공간입니다 -->
                   <div class="add_box">
                      <ul>
                           <li>
                               <div class="profile_left">수량</div>
                               <div class="profile_right">
                                   <div class="form_para">
                                      <input type="text" name="Season" value="" maxlength="" placeholder="숫자만입력하세요" class="textbox" autofocus="" required="">
                                    </div>
                               </div>
                           </li>
                           <li>
                               <div class="profile_left">단위</div>
                               <div class="profile_right">
                                   <div class="search_box">
                                    <div class="search_tag">
                                       <!-- 둘 중 하나만 선택할 수 있게 해주세요. 선택이 되었을 경우 active가 붙습니다. -->
                                        <a href="#" class="search_recipe active">g</a>
                                        <a href="#" class="search_recipe">ml</a>
                                    </div>
                                </div>
                               </div>
                           </li>
                       </ul>
                   </div>
               </ul>
           </div>
           
           <!-- 처음엔 보여지지않고 양념명의 input을 클릭하여 검색하면 뿌려지는 하단 모습입니다 -->
            <div class="search_box">
                <h7>검색결과</h7>
                <ul class="search_recent">
                    <li><a href="#">후추</a></li>
                </ul>
            </div>
       </div>
        
        <div onclick="HideInput()" class="close_box"><div class="m_close"><img src="/img/ico_close.svg"></div></div>
    </div>
</div>
<script type="text/javascript">
  //스르륵 팝업
    var giMenuDuration = 500;

        function ShowInput(){
            $('.alarm_box' ).css( { 'display' : 'block' } );
            $('.reply_content' ).css( { 'bottom' : '-100%' } );
            $('.reply_content' ).animate( { bottom: '0px' }, { duration: giMenuDuration } );
            $('.memo_bg').fadeIn();
        }
        function HideInput(){
            $('.reply_content' ).animate( { bottom: '-100%' }, { duration: giMenuDuration, complete:function(){ $('.alarm_box' ).css( { 'display' : 'none' } ); } } );
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
        <div class="step_black w75"></div>
    </div>
    
    <div class="profile_box2">
      <div class="recipe_material">
           <h7>[양념]</h7>
            <ul>
                <li>
                    <div class="recipe_front">국간장</div>
                    <div class="recipe_back">3g</div>
                </li>
                <li>
                    <div class="recipe_front">물엿</div>
                    <div class="recipe_back">1g</div>
                </li>
                <li>
                    <div class="recipe_front">설탕</div>
                    <div class="recipe_back">2g</div>
                </li>
            </ul>
        </div>
        <div class="ico_btn8" onclick="ShowInput()">+ 양념류 입력</div>
       
    </div>
    
    <div class="register_btn">
          <div class="ico_confirm3"><a href="/master/list/register2.php"><img src="/img/ico_arrow.svg">이전 페이지</a></div>
          <div class="ico_confirm2"><a href="/master/list/register4.php">다음 페이지<img src="/img/ico_arrow.svg"></a></div>
    </div>
    
  
</div>