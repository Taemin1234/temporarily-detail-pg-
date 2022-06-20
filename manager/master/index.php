<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>

<style>
    header {
        display: none;
    }
</style>




<!-- 본문 컨테이너 -->
<div id="container"> 
    <div class="master_top">
        <div class="sub_txt">
            MENTOR<br>관리자
        </div>
    </div>
    <div class="master_btn">
        <a href="/master/profile/">
            <div class="list_btn">
                <img src="/img/cate_mypage.svg">
                <div class="list_txt">프로필보기</div>
            </div>
        </a>
        <a href="/master/modify/">
            <div class="list_btn">
                <img src="/img/ico_list2.svg">
                <div class="list_txt">정보수정</div>
            </div>
        </a>
        <a href="/master/list/">
            <div class="list_btn">
                <img src="/img/cate_recipe.svg">
                <div class="list_txt">레시피목록</div>
            </div>
        </a>
        <a href="/master/favor/">
            <div class="list_btn">
                <img src="/img/ico_list4.svg">
                <div class="list_txt">즐겨찾기</div>
            </div>
        </a>
        <a href="/master/qna/">
           <!-- Q&A의 새로운 내용이 등록되었을 경우 class="on"이 추가됩니다 -->
            <div class="list_btn">
                <div class="on">
                    <img src="/img/ico_list5.svg">
                </div>
                <div class="list_txt">Q&A관리</div>
            </div>
        </a>
    </div>
</div>