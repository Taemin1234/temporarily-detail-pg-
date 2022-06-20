<? require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php'); ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<?php
$r_idx = empty($_GET["idx"]) ? "" : $_GET["idx"] ;
if($r_idx == "") {
?>
    <script>alert("최대 10장이 모두 등록되었습니다."); self.close();</script>
<?
exit;
}


// 레시피 불러오기
$sql = "    
SELECT 
    r.recipe_idx, r.influencer_idx, r.theme, r.title, r.sub_title,
    t.name as t_name, t.ico, t.sort, i.influencer_name
FROM 
    recipe as r
LEFT OUTER JOIN
    theme as t on t.t_idx = r.theme
LEFT OUTER JOIN
    influencer AS i ON i.influencer_idx = r.influencer_idx
WHERE
    r.recipe_idx = '$r_idx'";

if($stmt = $conn->prepare($sql)) {
    $stmt->execute();
} else {
    $error = $conn->errno . ' ' . $conn->error;
    echo $error;
}

if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
    echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
}

$stmt->bind_result($recipe_idx, $influencer_idx, $theme, $title, $sub_title, $t_name, $ico, $sort, $influencer_name);
$stmt->store_result();
$rowCount = $stmt->num_rows;

$stmt->fetch();
$stmt->close();

// 테마 불러오기
$sql = "
    SELECT
        t_idx, name, ico, sort
    FROM 
        theme
    ORDER BY 
        sort ASC";

$stmt = $conn->prepare($sql);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $name, $ico, $sort);
$stmt->store_result();
$rowCountTheme = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $theme_list[$list_idx]['t_idx'] = $idx;
    $theme_list[$list_idx]['name'] = $name;
    $theme_list[$list_idx]['ico'] = $ico;
    $theme_list[$list_idx]['sort'] = $sort;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();


// 파일 불러오기
$sql = "
    SELECT
        idx, ordering_index, file_url, file_name
    FROM 
        attachment
    WHERE
        from_table_id = 'recipe' AND from_content_id = '$r_idx'
    ORDER BY 
        ordering_index ASC";

$stmt = $conn->prepare($sql);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $ordering_index, $file_url, $file_name);
$stmt->store_result();
$rowCountFile = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $file_list[$list_idx]['idx'] = $idx;
    $file_list[$list_idx]['ordering_index'] = $ordering_index;
    $file_list[$list_idx]['file_url'] = $file_url;
    $file_list[$list_idx]['file_name'] = $file_name;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();

?>

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
                <? for($i=0; $i < $rowCountTheme; $i++) { ?>                    
                    <a href="#" class="search_recipe" idx="<?=$theme_list[$i]["t_idx"]?>"><?=$theme_list[$i]["name"]?></a>
                <? } ?>
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
 
    <div class="sub_txt pop_txt">레시피 수정</div>
    
    <!-- 단계표시 -->
    <div class="step_box">
        <div class="step_black w25"></div>
    </div>
    
    <div class="profile_box2">
      <div class="profile_txt">
           <ul>
               <li>
                   <div class="profile_left">멘토</div>
                   <div class="profile_right">
                       <input type="hidden" id="influencer" name="influencer" value="<?=$influencer_idx?>" maxlength="10" placeholder="" class="textbox" autofocus="" required="">
                       <input type="text" value="<?=$influencer_name?>" maxlength="10" placeholder="" class="textbox" autofocus="" required="" readonly>
                       <div class="span_txt">(0/10)</div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">테마선택</div>
                   <div class="profile_right" onclick="ShowTag()">
                        <input type="hidden" name="theme" id="theme" value="<?=$theme?>"/>
                       <input type="text" id="theme_text" value="<?=$t_name?>" maxlength="20" placeholder="" class="textbox" required="">
                       <div class="span_img"><img src="/img/ico_plus.svg"></div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">레시피명</div>
                   <div class="profile_right">
                       <input type="text" name="title" id="title" value="<?=$title?>" maxlength="10" placeholder="베이컨 볶음밥" class="textbox" autofocus="" required="">
                       <div class="span_txt">(0/10)</div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">레시피 설명</div>
                   <div class="profile_right">
                       <input type="text" name="sub_title" id="sub_title" value="<?=$sub_title?>" maxlength="20" placeholder="간단한 자취 요리 레시피" class="textbox input_btn" required="">
                       <div class="span_txt">(0/20)</div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">사진등록</div>
                   <div class="profile_right align_center">
                       <div class="btn_white btn_type7" id="pic_file">추가하기</div>
                       <div class="btn_type8" id="clear_file"><img src="/img/ico_reset.svg">초기화</div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">사진등록</div>
                   <div class="profile_right align_center">
                       * 세로 4:3비율 사진 3~9장 등록
                   </div>
               </li>
           </ul>
       </div>
       
       <!-- 사진등록되어서 보이는곳 -->
        <form name="myform" id="myform">
        <input type="hidden" name="idx" id="idx" value="<?=$r_idx?>"/>
        <div class="camera_box">
            <?php 
                for($i=0; $i < $rowCountFile; $i++) {
            ?>
            <div class="camera_list">
                <div class="camera_pic">
                    <img src="<?=$file_list[$i]['file_url']?>">
                </div>
                <div class="camera_num">
                    <input type="hidden" name="idx[]" value="<?=$file_list[$i]['idx']?>">
                    <input type="text" name="camera_num[]" value="<?=$file_list[$i]['ordering_index'] + 1?>" maxlength="1" placeholder="순서" class="textbox">
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        </form>
    </div>
    <div class="ico_confirm3" id="change_photo">사진순서변경 적용<img src="/img/ico_arrow.svg"></div>

    <div class="ico_confirm4">다음 페이지<img src="/img/ico_arrow.svg"></div>
</div>

<script src="/js/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
    });

    //레시피 선택완료시
    $(document).on('click', '.search_recipe', function() {
        $("#theme").val($(this).attr("idx"));
        $("#theme_text").val($(this).text());
        HideTag();
        $("#title").focus();
    });

    $(document).on('click', '.ico_confirm4', function() {
        if($.trim($("#influencer").val()) == "") {
            alert("멘토를 입력해 주세요.");
            $("#influencer").focus();
            return false;
        }
        if($.trim($("#theme_text").val()) == "") {
            alert("테마를 선택해 주세요.");
            return false;
        }
        if($.trim($("#title").val()) == "") {
            alert("레시피명을 입력해 주세요.");
            $("#title").focus()
            return false;
        }
        if($.trim($("#sub_title").val()) == "") {
            alert("레시피 설명을 입력해 주세요.");
            $("#sub_title").focus();
            return false;
        }
        if($('.camera_pic').length < 3) {
            alert("세로 4:3비율 사진 3~9장을 등록 해주세요.");
            return false;
        }
        
        $.ajax({
            type: "POST",
            url : "./ajax_recipe_modify.php",
            data: { 
                idx : '<?=$r_idx?>', 
                influencer : $("#influencer").val(),  
                theme : $("#theme").val(),  
                title : $("#title").val(),  
                sub_title : $("#sub_title").val()
            },
            dataType:"json",
            success : function(data, status, xhr) {
                location.href="./pop_modify2.php?idx=<?=$r_idx?>";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    });

    $(document).on('click', '#pic_file', function() {
        
        if($.trim($("#influencer").val()) == "") {
            alert("멘토를 입력해 주세요.");
            $("#influencer").focus();
            return false;
        }
        if($.trim($("#theme_text").val()) == "") {
            alert("테마를 선택해 주세요.");
            return false;
        }
        if($.trim($("#title").val()) == "") {
            alert("레시피명을 입력해 주세요.");
            $("#title").focus()
            return false;
        }
        if($.trim($("#sub_title").val()) == "") {
            alert("레시피 설명을 입력해 주세요.");
            $("#sub_title").focus();
            return false;
        }
        if($('.camera_pic').length < 3) {
            alert("세로 4:3비율 사진 3~9장을 등록 해주세요.");
            return false;
        }
        
        $.ajax({
            type: "POST",
            url : "./ajax_recipe_modify.php",
            data: { 
                idx : '<?=$r_idx?>', 
                influencer : $("#influencer").val(),  
                theme : $("#theme").val(),  
                title : $("#title").val(),  
                sub_title : $("#sub_title").val()
            },
            dataType:"json",
            success : function(data, status, xhr) {
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
        
        var limit = 9 - $('.camera_pic').length;

        var url = "/fnc/multifile/index2.php?idx=<?=$r_idx?>&limit=" + limit;
        window.open(url, '_blank', 'width=540,height=600');
    });
    
    $(document).on('click', '#clear_file', function() {
        if(confirm("사진을 모두 초기화 하겠습니까?")) {            
            $.ajax({
                type: "POST",
                url : "./ajax_delete_file.php",
                data: { 
                    idx : '<?=$r_idx?>'
                },
                dataType:"json",
                success : function(data, status, xhr) {
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    location.reload();
                    console.log(jqXHR.responseText);
                }
            });
        }
    });
    

    // 사진 순서변경
    $(document).on('click', '#change_photo', function() {
        
        if($.trim($("#influencer").val()) == "") {
            alert("멘토를 입력해 주세요.");
            $("#influencer").focus();
            return false;
        }
        if($.trim($("#theme_text").val()) == "") {
            alert("테마를 선택해 주세요.");
            return false;
        }
        if($.trim($("#title").val()) == "") {
            alert("레시피명을 입력해 주세요.");
            $("#title").focus()
            return false;
        }
        if($.trim($("#sub_title").val()) == "") {
            alert("레시피 설명을 입력해 주세요.");
            $("#sub_title").focus();
            return false;
        }
        if($('.camera_pic').length < 3) {
            alert("세로 4:3비율 사진 3~9장을 등록 해주세요.");
            return false;
        }
        
        $.ajax({
            type: "POST",
            url : "./ajax_recipe_modify.php",
            data: { 
                idx : '<?=$r_idx?>', 
                influencer : $("#influencer").val(),  
                theme : $("#theme").val(),  
                title : $("#title").val(),  
                sub_title : $("#sub_title").val()
            },
            dataType:"json",
            success : function(data, status, xhr) {
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });

        var formData = $("#myform").serialize();

        $.ajax({
            type: "POST",
            url : "./ajax_sort_file.php",
            data: formData,
            dataType:"json",
            success : function(data, status, xhr) {
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                location.reload();
                console.log(jqXHR.responseText);
            }
        });
    });
</script>