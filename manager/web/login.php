<?php
$hostname = $_SERVER[ "HTTP_HOST" ]; //도메인명(호스트)명을 구합니다.
$uri = $_SERVER[ 'REQUEST_URI' ]; //uri를 구합니다.
$query_string = getenv( "QUERY_STRING" ); // Get값으로 넘어온 값들을 구합니다.
$phpself = $_SERVER[ "PHP_SELF" ]; //현재 실행되고 있는 페이지의 url을 구합니다.
$basename = basename( $_SERVER[ "PHP_SELF" ] ); //현재 실행되고 있는 페이지명만 구합니다.
?>
<?php
//SEO 정보
$page_title = "제로키친";
$page_desc = "제로키친";
$page_img = "/img/.jpg";
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- SEO 관련 -->
<meta name="robots" content="index,follow">
<title><?php echo $page_title; ?></title>
<meta name="author" content="">
<meta name="Keywords" content="제로키친">
<meta name="description" content="<?php echo $page_desc; ?>">
<link rel="canonical" href="<?php echo "http://".$hostname."".$uri; ?>">
<meta property="og:image" content="<?php echo "http://".$hostname."".$page_img; ?>"/>
<meta property="og:url" content="<?php echo "http://".$hostname."".$uri; ?>"/>
<meta property="og:description" content="<?php echo $page_desc; ?>"/>
<meta property="og:title" content="<?php echo $page_title; ?>"/>
<meta property="og:type" content="website" />
<link rel="icon" href="/img/favicon-152.png" sizes="152x152">
<!-- 웹폰트 적용 -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&Roboto:wght@300;400&display=swap" rel="stylesheet">
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link href="/css/web.css" rel="stylesheet">
<link href="/css/swiper-bundle.min.css" rel="stylesheet">
    </head>

<body>


<div class="login_web">
   <div class="web_box">
       <div class="web_right"></div>
        <div class="form_login">
           <nav>
                <div class="admin_logo"><img src="/img/login_logo.svg" alt="로고"></div>
            </nav>
            <form name="UserLogin" method="post" onsubmit="fnUserLoginCheck1()">
              <input type="text" name="UserId" value="" maxlength="20" placeholder="아이디를 입력해주세요" class="textbox" autofocus="" required="">
              <input type="password" name="UserPwd" value="" maxlength="20" placeholder="비밀번호를 입력해주세요" class="textbox marginTop10" required="">
              <button type="submit" class="confirm_btn"><span>로그인</span></button>
            </form>
            <div class="login_copy">© 2021 by Zerokitchen. All rights are reserved.</div>
        </div>
   </div>
</div>



