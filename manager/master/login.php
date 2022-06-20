
<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>

<style>
    header {
        display: none;
    }
    body {
        padding-bottom: 0;
    }
</style>

<!-- 본문 컨테이너 -->
<div id="container"> 

    <!-- 로그인 -->
    <div class="login_box2">
       <div class="reply_content">
            <div class="login_logo"><img src="/img/login_logo.svg"></div>
            <div class="login_txt">
                <input type="text" name="UserId" value="" maxlength="20" placeholder="아이디" class="textbox" autofocus="" required="">
                <input type="text" name="UserPwd" value="" maxlength="20" placeholder="비밀번호" class="textbox mg_10" autofocus="" required="">
                <button type="button" class="confirm_btn mg_10" onclick="fnUserLoginCheck()"><span>로그인</span></button>
            </div>
            <div class="login_copy">© 2021 by Zerokitchen. All rights are reserved.</div>
        </div>
    </div>

</div>