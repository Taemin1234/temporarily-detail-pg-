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
 
   <div class="sub_txt in_txt">즐겨찾기</div>
    
    <?php for($i=0; $i<5; $i++){ ?>
    <!-- 최대 10개까지 보이고 더보기 클릭시 10개씩 더 보여지게 해주세요 -->
    <div class="favor_list">
       <div class="sub_my">
           <a href="/influ/detail.php">
                <div class="influ_box">
                    <div class="influ_pic">
                        <img src="/img/influ_pic.jpg">
                    </div>
                    <!-- 최대 7자만 보이게 해주세요 -->
                    <div class="influ_txt">
                        <h3>커피콩빵</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="favor_list">
       <div class="sub_my">
           <a href="/influ/detail.php">
                <div class="influ_box">
                    <div class="influ_pic">
                        <img src="/img/influ_pic3.jpg">
                    </div>
                    <!-- 최대 7자만 보이게 해주세요 -->
                    <div class="influ_txt">
                        <h3>요리하는 고양이</h3>
                    </div>
                </div>
           </a>
        </div>
    </div>
    <?php } ?>
    <!-- 더보기 -->
    <div><img class="ico_plus" src="/img/ico_plus.svg"></div>
    
  
</div>