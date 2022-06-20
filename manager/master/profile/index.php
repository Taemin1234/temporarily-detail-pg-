<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<style>
    header {
        display: none;
    }
</style>

<!-- 본문 컨테이너 -->
<div id="container"> 

 <!-- 이전페이지 -->
    <a href="#" onclick="goBack()" class="back_sub2"><img src="/img/ico_arrow.svg"></a>
 
   <div class="sub_txt in_txt">프로필 보기</div>
 
 <!-- 인스타 아이콘 -->
 <a href="https://www.instagram.com/" class="insta_sub2"><img src="/img/ico_insta.png" alt="인스타그램"></a>
 
  <!-- 인플루언서 -->
  <div class="sub_slide">
    <div class="slide_img">
      <div class="swiper mySwiper">
           <div class="swiper-wrapper">
               <div class="swiper-slide">
                    <img src="/img/influ_pic5.jpg">
                </div>
                <div class="swiper-slide">
                    <img src="/img/influ_pic3.jpg">
                </div>
                <div class="swiper-slide">
                    <img src="/img/influ_pic2.jpg">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="influ_stxt">반찬, 간식 만드는 맛집<br>요리하는 고양이님의 레시피</div>
        <!-- 사진편집 버튼을 클릭시 활성화되는 아이콘입니다. -->
        <span class="camera"><label for="pic_file"><img src="/img/ico_camera.svg"></label><input type="file" id="pic_file"></span>
        <div class="text_bg"></div>
    </div>
        
        <div class="influ_box">
            <div class="influ_pic">
                <img src="/img/influ_pic.jpg">
                <!-- 사진편집 버튼을 클릭시 활성화되는 아이콘입니다. 카메라 아이콘 클릭시 최대3가지 사진을 선택가능하도록 해주세요. -->
                <span class="camera"><label for="pic_file"><img src="/img/ico_camera.svg"></label><input type="file" id="pic_file"></span>
            </div>
            <!-- 최대 20자만 보이게 해주세요 -->
            <div class="influ_txt">
                <h3>요리하는 고양이</h3>
                <p>30대·반찬·간식·캠핑파티</p>
            </div>
            <div class="influ_favor">
                <div class="favor_ico"><img src="/img/influ_star.svg"></div>
                <div class="favor_txt">109.4만</div>
            </div>
        </div>
        <a href="https://www.instagram.com/" class="influ_link">인플루언서 마켓<img src="/img/ico_arrow.svg"></a>
  </div>
  
  <!-- 편집버튼 -->
  <div class="edit_btn">
     <!-- 사진편집을 클릭시 위의 class="camere"가 활성화됩니다 -->
      <div class="ico_confirm2">사진편집</div>
      <div class="ico_confirm2">적용</div>
  </div>
  
  <!-- 정보 -->
  <div class="profile_box2">
      <div class="profile_txt">
           <ul>
               <li>
                   <div class="profile_left">마켓링크</div>
                   <div class="profile_right">www.abcdef.com</div>
               </li>
               <li>
                   <div class="profile_left">인스타</div>
                   <div class="profile_right">www.instagram.com/jenni</div>
               </li>
               <li>
                   <div class="profile_left">#태그</div>
                   <div class="profile_right">30대, 반찬, 간식, 캠핑파티</div>
               </li>
               <li>
                   <div class="profile_left">전화번호</div>
                   <div class="profile_right num">010-8523-9981</div>
               </li>
               <li>
                   <div class="profile_left">이메일</div>
                   <div class="profile_right">jenni@naver.com</div>
               </li>
           </ul>
       </div>
    </div>
  
  <script src="/js/swiper-bundle.min.js"></script>
  <script>
      var swiper = new Swiper(".mySwiper", {
          pagination: {
              el: ".swiper-pagination",
              type: "progressbar",
            },
          loop: true,
      });
    </script>
</div>