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
        <!-- 3줄만 보여지게 해주세요 -->
        <div class="search_box">
            <div class="search_tag">
               <!-- 검색 결과는 10개까지 보여지게 해주세요 -->
                <a href="#" class="search_recipe active">홈카페</a>
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
                   <div class="profile_right align_center">홍승희<div class="span_txt2">* 미노출</div></div>
               </li>
               <li>
                   <div class="profile_left">닉네임</div>
                   <div class="profile_right align_center">홍아이</div>
               </li>
               <li>
                   <div class="profile_left">이메일</div>
                   <div class="profile_right align_center">zero@abc.com<div class="span_txt2">* 미노출</div></div>
               </li>
               <li>
                   <div class="profile_left">휴대폰</div>
                   <div class="profile_right align_center">010-1234-2154<div class="span_txt2">* 미노출</div></div>
               </li>
               <li>
                   <div class="profile_left">인스타</div>
                   <div class="profile_right align_center">https://www.instagram.com/</div>
               </li>
               <li>
                   <div class="profile_left">마켓링크</div>
                   <div class="profile_right dis_in align_center">https://www.instagram.com/__eggasbdfs_official<a href="https://www.instagram.com/"><div class="ico_btn7">바로가기</div></a>
                   </div>
               </li>
               <li>
                   <div class="profile_left">채널소개</div>
                   <div class="profile_right align_center">
                       행복이 담긴 음식을 요리합니다
                   </div>
               </li>
               <li>
                   <div class="profile_left">채널태그</div>
                   <div class="profile_right align_center">
                       20대 · 인플루언서 · 간편요리 · 다이어트
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