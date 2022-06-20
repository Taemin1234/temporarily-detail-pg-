<? require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php'); ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<?php
$r_idx = empty($_GET["idx"]) ? "" : $_GET["idx"] ;
if($r_idx == "") {
?>
    <script>alert("잘못된 접근 입니다."); self.close();</script>
<?
exit;
}

// 레시피 불러오기
$sql = "
SELECT 
    r.recipe_idx, r.influencer_idx, r.title, r.sub_title, r.tag, r.tip, r.youtube, date_format(r.create_date, '%y.%m.%d') as create_date, 
    date_format(r.update_date, '%y.%m.%d') as update_date,
    (SELECT influencer_name FROM influencer as i WHERE i.influencer_idx = r.influencer_idx) as influencer_name,
    (SELECT tag FROM influencer as i WHERE i.influencer_idx = r.influencer_idx) as influencer_tag
FROM 
    recipe as r
WHERE
    r.recipe_idx = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('d', $r_idx);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($recipe_idx, $influencer_idx, $title, $sub_title, $tag_recipe, $tip_recipe, $youtube, $create_date, $update_date, $influencer_name, $influencer_tag);
$stmt->store_result();
$rowCountRecipe = $stmt->num_rows;
$stmt->fetch();
$stmt->free_result();
$stmt->close();

$array_youtube = explode("/", $youtube);
if(strpos($youtube, "watch")) {
    $array_youtube = explode("=", $youtube);
}

if($rowCountRecipe < 1) {
    echo "레시피 정보가 없습니다.";
    exit;
}

$img_scrap = "ico_bscrap.svg";
$class_scrap = " bounce_out";
// if($count_scr > 0) {
//     $img_scrap = "ico_bscrap_on.svg";
//     $class_scrap = " bounce";
// }

// 레시피 테그 불러오기
$sql = "
    SELECT
        tt.tag_idx, tt.tag_num, t.name
    FROM 
        recipe_join_tag as tt
    LEFT OUTER JOIN
        recipe_tag as t ON t.rt_idx = tt.tag_idx
    WHERE
        tt.recipe_idx = '$r_idx'
    ORDER BY 
        tt.tag_num ASC";

$stmt = $conn->prepare($sql);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $tag_num, $name);
$stmt->store_result();
$rowCountJoinTag = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $tag_join_list[$list_idx]['tag_idx'] = $idx;
    $tag_join_list[$list_idx]['tag_num'] = $tag_num;
    $tag_join_list[$list_idx]['name'] = $name;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();

$str_tag_recipe = "";
for($i=0; $i < $rowCountJoinTag; $i++) {
    $str_tag_recipe .= "<li>".$tag_join_list[$i]['name']."</li>";
}

// 멘토 불러오기
$sql = "
SELECT 
    influencer_id, influencer_name, sub_name, 
    description, tag, market_url, instagram, date_format(create_date, '%y.%m.%d') as create_date, 
    date_format(update_date, '%y.%m.%d') as update_date,
    (SELECT COUNT(*) FROM favorite WHERE influencer_idx = i.influencer_idx) as total_fav
FROM 
    influencer as i
WHERE
    influencer_idx = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('d', $influencer_idx);
$stmt->execute();    


if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
    echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
}
$stmt->bind_result($influencer_id, $influencer_name, $sub_name, $description, $tag_influencer, $market_url, $instagram, $create_date, $update_date, $total_fav);
$stmt->store_result();
$stmt->fetch();
$stmt->free_result();
$stmt->close();

$img_star = "star.svg";
$class_star = " bounce_out";
// if($count_fav > 0) {
//     $img_star = "star_on.svg";
//     $class_star = " bounce";
// }

$str_tag = "<li>".implode("</li><li>", explode(',', $tag_influencer))."</li>";

// 임시 레시피 파일불러오기
$sql = " SELECT idx, ordering_index, file_url, file_name, from_content_id, from_table_id FROM attachment WHERE from_table_id='recipe' AND from_content_id=? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $r_idx);
$stmt->execute();

if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
    echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $ordering_index, $file_url, $file_name, $from_content_id, $from_table_id);
$stmt->store_result();
$rowCountAttach = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $attach_list[$list_idx]['idx'] = $idx;
    $attach_list[$list_idx]['ordering_index'] = $ordering_index;
    $attach_list[$list_idx]['file_url'] = $file_url;
    $attach_list[$list_idx]['file_name'] = $file_name;
    $attach_list[$list_idx]['from_content_id'] = $from_content_id;
    $attach_list[$list_idx]['from_table_id'] = $from_table_id;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();


// 임시 인터뷰 파일불러오기
$sql = " SELECT idx, ordering_index, file_url, file_name, from_content_id, from_table_id FROM attachment WHERE from_table_id='recipe_interview' AND from_content_id=? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $r_idx);
$stmt->execute();

if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
    echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $ordering_index, $file_url, $file_name, $from_content_id, $from_table_id);
$stmt->store_result();
$rowCountInterview = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $interview_list[$list_idx]['idx'] = $idx;
    $interview_list[$list_idx]['ordering_index'] = $ordering_index;
    $interview_list[$list_idx]['file_url'] = $file_url;
    $interview_list[$list_idx]['file_name'] = $file_name;
    $interview_list[$list_idx]['from_content_id'] = $from_content_id;
    $interview_list[$list_idx]['from_table_id'] = $from_table_id;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();

// 멘토 파일 불러오기
$sql = " SELECT idx, ordering_index, file_url, file_name, from_content_id, from_table_id FROM attachment WHERE from_table_id='influencer' AND from_content_id=? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('d', $influencer_idx);
$stmt->execute();

if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
    echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $ordering_index, $file_url, $file_name, $from_content_id, $from_table_id);
$stmt->store_result();
$rowCountAttachInfluencer = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $attach_list_influencer[$list_idx]['idx'] = $idx;
    $attach_list_influencer[$list_idx]['ordering_index'] = $ordering_index;
    $attach_list_influencer[$list_idx]['file_url'] = $file_url;
    $attach_list_influencer[$list_idx]['file_name'] = $file_name;
    $attach_list_influencer[$list_idx]['from_content_id'] = $from_content_id;
    $attach_list_influencer[$list_idx]['from_table_id'] = $from_table_id;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();


// 임시 재료 불러오기
$sql = "    
    SELECT
        t.ins_idx, t.amount, t.unit, i.name
    FROM 
        recipe_ins AS t
    LEFT OUTER JOIN
        ins AS i ON i.ins_idx = t.ins_idx
    WHERE
        recipe_idx = '$r_idx'";

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

$stmt->bind_result($ins_idx, $amount, $unit, $name);
$stmt->store_result();
$rowCountIng = $stmt->num_rows;


$list_idx = 0;
while($stmt->fetch())
{
    $ing[$list_idx]['ins_idx'] = $ins_idx;
    $ing[$list_idx]['amount'] = $amount;
    $ing[$list_idx]['unit'] = $unit;
    $ing[$list_idx]['name'] = $name;
    $list_idx = $list_idx + 1;
}
$stmt->free_result();
$stmt->close();

// 임시 양념 불러오기
$sql = "    
    SELECT
        t.ins_idx, t.amount, t.unit, i.name
    FROM 
        recipe_ins2 AS t
    LEFT OUTER JOIN
        ins2 AS i ON i.ins_idx = t.ins_idx
    WHERE
        recipe_idx = '$idx'";

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

$stmt->bind_result($ins_idx, $amount, $unit, $name);
$stmt->store_result();
$rowCountSea = $stmt->num_rows;


$list_idx = 0;
while($stmt->fetch())
{
    $ing[$list_idx]['ins_idx'] = $ins_idx;
    $ing[$list_idx]['amount'] = $amount;
    $ing[$list_idx]['unit'] = $unit;
    $ing[$list_idx]['name'] = $name;
    $list_idx = $list_idx + 1;
}
$stmt->free_result();
$stmt->close();

// 멘토의 다른 레시피 불러오기
$sql = "
SELECT 
    r.recipe_idx, r.title, r.sub_title, a.file_url
FROM 
    recipe as r
LEFT OUTER JOIN
    attachment AS a ON  a.from_table_id = 'recipe' 
                        AND a.from_content_id = r.recipe_idx 
                        AND a.ordering_index = '0'
WHERE
    r.influencer_idx = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('d', $influencer_idx);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($recipe_idx, $title, $sub_title, $file_url);
$stmt->store_result();
$rowCountOther = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $other[$list_idx]['recipe_idx'] = $recipe_idx;
    $other[$list_idx]['title'] = $title;
    $other[$list_idx]['sub_title'] = $sub_title;
    $other[$list_idx]['file_url'] = $file_url;
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
<!-- 레시피 미리보기 -->
<div class="pre_box">
    <div class="reply_content">

        <form name="myform" id="myform" method="post">
            <input type="hidden" name="idx" id="idx" value="<?=$r_idx?>">
        </form>

        <div class="sub_txt in_txt">미리보기<a href="#" onclick="HidePreview()" class="close_btn"><img src="/img/ico_close.svg"></a></div>
          <div class="recipe_slide">
              <div class="recipe_box">
                   <div class="influ_tag tag_txt">
                         <ul>
                            <?=$str_tag_recipe?>
                          </ul>
                    </div>
                </div>
              <div class="swiper preSwiper">
                  <div class="swiper-wrapper">

                    <?php 
                    for($i=0; $i < $rowCountAttach; $i++){                     
                    ?>
                    <div class="swiper-slide">
                            <div class="slide_img"><img src="<?=$attach_list[$i]['file_url']?>"></div>
                            <div class="text_bg"></div>
                    </div>
                    <?php } ?>

                  </div>
                  <div class="swiper-pagination"></div>
                </div>
          </div>
          <div class="recipe_detail">
              <div class="influ_box">
                  <div class="influ_line">
                      <div class="recipe_sub"><?=$sub_title?></div>
                      <!-- 한줄만 보여야합니다 -->
                      <div class="recipename"><?=$title?></div>
                  </div>
                  <!-- 스크랩과 재료목록담기 아이콘이며 클릭시 하단에 추가된 관련내용의 창이 뜹니다-->
                  <div class="influ_favor">
                        <div class="scrap_ico"><img src="/img/ico_bscrap.svg"></div>
                  </div>
                  <div class="influ_favor">
                        <div class="cart_ico"><img src="/img/ico_cart.svg"></div>
                  </div>
              </div>

              <hr>

                <!-- 재료/ 양념-->
                <div class="recipe_material">
                   <h7>[재료]</h7>
                    <ul>

                    <?php
                    for($i=0; $i < $rowCountIng; $i++) {
                    ?>
                    <li>
                        <div class="recipe_front"><?=$ing[$i]["name"]?></div>
                        <div class="recipe_back"><?=$ing[$i]["amount"].$ing[$i]["unit"]?></div>
                    </li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
                <div class="recipe_material">
                   <h7>[양념]</h7>
                    <ul>
                        <?php
                        for($i=0; $i < $rowCountSea; $i++) {
                        ?>
                        <li>
                            <div class="recipe_front"><?=$ing[$i]["name"]?></div>
                            <div class="recipe_back"><?=$ing[$i]["amount"].$ing[$i]["unit"]?></div>                            
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <!-- 인터뷰 -->
                <div class="recipe_interview">
                   <h7>[인터뷰]</h7>
                    <ul>
                        <?php
                        for($i=0; $i < $rowCountInterview; $i++) {
                        ?>
                        <li>
                            <div style="clear:both;"><img src="<?=$interview_list[$i]["file_url"]?>"/></div>                        
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <!-- 팁 -->
                <div class="recipe_tip">
                    <div class="tip_ico">
                        <img src="/img/ico_tip.svg">
                    </div>
                    <div class="tip_txt"><?=$tip_recipe?></div>
                </div>
                

               
                <!-- 작은 이미지일 경우 -->
                <div class="influ_recipe">
                    <div class="influ_box">
                        <h4><?=$influencer_name?>님의<br>다른 요리 레시피</h4>
                        <div class="influ_pic">
                            <img src="<?=$attach_list_influencer[0]['file_url']?>">
                        </div>
                    </div>
                    <div class="tag_pic">
                      <ul>
                        <?php
                        for($i=0; $i < $rowCountOther; $i++) {
                        ?>
                          <li>
                              <a href="/recipe/pop_detail.php?ridx=<?=$other[$i]["recipe_idx"]?>">
                                  <img src="<?=$other[$i]["file_url"]?>" alt="음식사진">
                                  <div class="recipe_sub"><?=$other[$i]["title"]?></div>
                                  <div class="recipename"><?=$other[$i]["sub_title"]?></div>
                              </a>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                  </div>
                </div>

                <!-- 광고 -->
                <div class="main_ad"><img src="/img/recipe_ad.jpg"></div>

          </div>  
    </div>
</div>
  
 
  <script src="/js/swiper-bundle.min.js"></script>
  <script>
      var swiper = new Swiper(".preSwiper", {
          pagination: {
              el: ".swiper-pagination",
              type: "progressbar",
            },
          loop: true,
      });
      
      //스크랩
      $(function(){
            $(".scrap_ico").on("click", function(){ $(this).find("img").attr("src","/img/ico_bscrap.svg"); if($(this).hasClass("bounce") == false){ $(this).removeClass("bounce_out"); $(this).addClass("bounce");
                } else { $(this).removeClass("bounce"); $(this).addClass("bounce_out"); $(this).find("img").attr("src","/img/ico_bscrap_on.svg");
                }
            });
        });
      
      //미리보기
      var giMenuDuration = 500;

    function ShowPreview(){
        $('.pre_box' ).css( { 'display' : 'block' } );
        $('.reply_content' ).css( { 'bottom' : '-100%' } );
        $('.reply_content' ).animate( { bottom: '0px' }, { duration: giMenuDuration } );
    }
    function HidePreview(){
        $('.reply_content' ).animate( { bottom: '-100%' }, { duration: giMenuDuration, complete:function(){ $('.pre_box' ).css( { 'display' : 'none' } ); } } );
    }
  </script>



<!-- 본문 컨테이너 -->
<div id="container"> 
   <div class="sub_txt pop_txt">레시피 수정</div>
    
    <!-- 단계표시 -->
    <div class="step_box">
        <div class="step_black w100"></div>
    </div>
    
    <div class="profile_box2">
      <div class="profile_txt">
       </div>
       
       <a href="#" onclick="ShowPreview()"><div class="ico_btn8">미리보기</div></a>
       
    </div>
    
    <div class="register_btn">
          <div class="ico_confirm3"><a href="./pop_modify4.php?idx=<?=$r_idx?>"><img src="/img/ico_arrow.svg">이전 페이지</a></div>
          <div class="ico_confirm2">수정완료<img src="/img/ico_arrow.svg"></div>
    </div>
</div>


<script>
    $(function(){
        $(".span_img").click(function(){  
            
            var num = $(this).attr("idx");
            if($(this).children(0).attr("src") == "/img/ico_plus.svg") {
                ShowTag(num);
                return false;
            }

            $("#current_tag").val(num);
            $("#popup2").css('display','flex').hide().fadeIn();
            $("body").css('overflow-y',"hidden");
        });
        $("#close2").click(function(){
            modalClose();
        });
    });


    function modalClose(){
        $("#popup2").fadeOut();
        $("body").css('overflow-y',"auto");
    }
    
    // 태그 선택완료시
    $(document).on('click', '.search_recipe', function() {
        var num = $("#current_tag").val();
        $("#tag_idx"+num).val($(this).attr("idx"));
        $("#UserTag"+num).val($(this).text());
        $("#imgtag"+num).attr("src", "/img/ico_dplus.svg");
        HideTag();
        $("#title").focus();
    });

    // 태그 삭제
    $(document).on('click', '#confirm', function() {
        var num = $("#current_tag").val();
        $("#tag_idx"+num).val("");
        $("#UserTag"+num).val("");
        $("#imgtag"+num).attr("src", "/img/ico_plus.svg");
        modalClose();
    });

    // 붙여넣기
    $(document).on('click', '.ico_btn5', function() {
        navigator.clipboard.readText()
        .then(text => {
            $('#youtube').val(text);
        });
    });
    
    // 닫기
    $(document).on('click', '.ico_confirm2', function() {
        self.close();
    });
</script>