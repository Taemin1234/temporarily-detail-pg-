<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<style>
    header {
        display: none;
    }
</style>

<!-- 추가항목 -->
<div class="memo_box2">
   <div class="memo_bg" onclick="HideTag()"></div>
    <div class="reply_content">
       <!-- 4개의 태그마다 #1,#2,#3,#4 텍스트가 바뀌어야합니다. 안의 내용도 카테고리마다 변경이 되어야합니다. -->
        <h7 class="num">#1</h7>
        <div class="search_box">
            <div class="search_tag">
               <!-- 해당태그를 클릭시 창이 닫기며 빈칸에 태그가 입력되도록 해주세요 -->
                <a href="#" class="search_recipe">홈카페</a>
                <a href="#" class="search_recipe">캠핑요리</a>
                <a href="#" class="search_recipe">손님초대</a>
                <a href="#" class="search_recipe">집밥</a>
                <a href="#" class="search_recipe">다이어트</a>
                <a href="#" class="search_recipe">인기!핫!</a>
                <a href="#" class="search_recipe">제철요리</a>
                <a href="#" class="search_recipe">글로벌</a>
                <a href="#" class="search_recipe">이유식</a>
                <a href="#" class="search_recipe">간편요리</a>
                <a href="#" class="search_recipe">면요리</a>
                <a href="#" class="search_recipe">건강식</a>
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
 
 <!-- 이전페이지 -->
    <a href="#" onclick="goBack()" class="back_sub2"><img src="/img/ico_arrow.svg"></a>
 
   <div class="sub_txt in_txt">내정보 수정하기</div>
  
  <!-- 정보 -->
  <div class="profile_box2">
      <div class="profile_txt">
           <ul>
               <li>
                   <div class="profile_left">이름</div>
                   <div class="profile_right">
                       <input type="text" name="UserName" value="" maxlength="20" placeholder="실명" class="textbox input_btn" autofocus="" required="">
                       <div class="span_txt">* 미노출</div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">닉네임</div>
                   <div class="profile_right">
                       <input type="text" name="UserNicName" value="" maxlength="20" placeholder="텍스트 10자 이내" class="textbox" autofocus="" required="">
                   </div>
               </li>
               <li>
                   <div class="profile_left">이메일</div>
                   <div class="profile_right">
                       <input type="email" name="Email" value="" maxlength="40" placeholder="이메일 주소" class="textbox input_btn" required="">
                       <div class="span_txt">* 미노출</div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">휴대폰</div>
                   <div class="profile_right">
                       <input type="tel" name="UserMobile" value="" maxlength="20" placeholder="010-7321-8989" class="textbox num input_btn" required="">
                       <div class="span_txt">* 미노출</div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">인스타</div>
                   <div class="profile_right">
                       <input type="text" name="UserInsta" value="" maxlength="50" placeholder="계정 url을 복사(해당시)" class="textbox" required="">
                   </div>
               </li>
               <li>
                   <div class="profile_left">마켓링크</div>
                   <div class="profile_right">
                       <input type="text" name="UserLink" value="" maxlength="50" placeholder="계정 url을 복사(해당시)" class="textbox input_btn" required="">
                       <a href="https://www.instagram.com/" target="_blank"><div class="ico_btn5">바로가기</div></a>
                   </div>
               </li>
               <li>
                   <div class="profile_left">채널소개</div>
                   <div class="profile_right">
                       <input type="text" name="UserIntro" value="" maxlength="20" placeholder="한글 16자 이내(*반찬, 간식만드는 집)" class="textbox" required="">
                   </div>
               </li>
               <li>
                   <div class="profile_left">채널태그</div>
                   <div class="profile_right">아래 4개의 태그 등록해 주세요</div>
               </li>
               <li>
                  <div class="tag_box">
                      <div class="profile_tag">
                           <div class="profile_left num">#1</div>
                           <div class="profile_right" onclick="">
                              <!-- 태그 추가했을때의 창 : 클래스명에 span_close가 추가되며 삭제가 가능하도록 해주세요. 칸안에 입력된 태그는 수정이 되지않아야합니다. -->
                               <input type="text" name="UserTag" value="20대" placeholder="" class="textbox">
                               <div id="modal-open" class="span_img span_close"><img src="/img/ico_plus.svg"></div>
                           </div>
                           <!-- 태그가 추가되고 삭제할때 뜨는 팝업창이며 태그가 추가되었을 경우 위의 onclick="ShowTag()"이 없어져야합니다 -->
                          <div class="popup-wrap" id="popup">
                            <div class="popup">
                              <div class="popup-body">
                                삭제하시겠습니까?
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
                       </div>
                       <div class="profile_tag">
                           <div class="profile_left num">#2</div>
                           <div class="profile_right" onclick="ShowTag()">
                              <!-- 태그 추가하기전의 창 : 빈칸으로 표시되며 클릭해서 팝업창에서 해당 태그를 넣었을때 텍스트가 보여지며 따로 텍스트 입력이 되지않게 해주세요. 4개 태그 동일 -->
                               <input type="text" name="UserTag" value="" maxlength="20" placeholder="" class="textbox" required="">
                               <div class="span_img"><img src="/img/ico_plus.svg"></div>
                           </div>
                       </div>
                   </div>
                   <div class="tag_box">
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
    </div>
    
    <!-- 편집버튼 -->
  <div class="edit_btn">
      <div class="ico_confirm2" id="modal-open"><a href="/master/modify/modibox.php">정보수정</a></div>
      <div class="ico_confirm2">완료</div>
  </div>
  
</div>