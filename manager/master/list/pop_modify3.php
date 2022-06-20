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

// 양념 불러오기
$sql = "    
    SELECT
        t.ins_idx, t.amount, t.unit, i.name
    FROM 
        recipe_ins2 AS t
    LEFT OUTER JOIN
        ins2 AS i ON i.ins_idx = t.ins_idx
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
$rowCount = $stmt->num_rows;


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

// 양념 불러오기
$sql = "
    SELECT
        ins_idx, gubun, name, sort
    FROM 
        ins2
    ORDER BY 
        sort ASC";

$stmt = $conn->prepare($sql);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $gubun, $name, $sort);
$stmt->store_result();
$rowCountIngredient = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $ingredient_list[$list_idx]['ins_idx'] = $idx;
    $ingredient_list[$list_idx]['gubun'] = $gubun;
    $ingredient_list[$list_idx]['name'] = $name;
    $ingredient_list[$list_idx]['sort'] = $sort;
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

<!-- 양념류 입력 -->
<div class="alarm_box">
    <div class="reply_content"><!-- 이전페이지 -->
        <a href="#" onclick="HideInput()" class="back_sub2"><img src="/img/ico_arrow.svg"></a>

        <div class="sub_txt">양념 입력</div>
        
        <input type="hidden" name="ing" id="ing">

        <div class="profile_box">
           <div class="modify_txt">
               <ul>
                   <li>
                       <div class="profile_left">양념</div>
                       <div class="profile_right">
                           <div class="form_para">
                              <input type="text" name="keyword_ingredient" id="keyword_ingredient" value="" maxlength="50" placeholder="양념명을 입력하세요" class="textbox" autofocus="" required="">
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
                                      <input type="text" name="season" id="season" value="" maxlength="" placeholder="숫자만입력하세요" class="textbox" autofocus="" required="">
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
           
           <div style="margin:0 auto; text-align:center;">
                <input type="button" name="add_ingredient" id="add_ingredient" value="추가" class="ico_confirm w50">
            </div>
            
            <hr>
           
           <!-- 처음엔 보여지지않고 양념명의 input을 클릭하여 검색하면 뿌려지는 하단 모습입니다 -->
           <div class="search_box" id="search_box_ingredient">
                <h7>검색결과</h7>
                <ul class="search_recent">
                    <? for($i=0; $i < $rowCountIngredient; $i++) { ?>
                        <li class="search_ingredient" style="cursor:pointer;" idx="<?=$ingredient_list[$i]['ins_idx']?>"><?=$ingredient_list[$i]['name']?></li>
                    <? } ?>
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
            $('#keyword_ingredient').val("");
            $('#season').val("");
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
   <div class="sub_txt pop_txt">레시피 수정</div>
    <!-- 단계표시 -->
    <div class="step_box">
        <div class="step_black w75"></div>
    </div>
    
    <div class="profile_box2">
      <div class="recipe_material">
           <h7>[양념]</h7>
            <form name="myform" id="myform" method="post">
            <input type="hidden" name="idx" value="<?=$r_idx?>">
            <ul>
                <?php
                for($i=0; $i < $rowCount; $i++) {
                ?>
                <li>
                    <input type="hidden" name="ins_idx[]" value="<?=$ing[$i]["ins_idx"]?>">
                    <input type="hidden" name="amount[]" value="<?=$ing[$i]["amount"]?>">
                    <input type="hidden" name="unit[]" value="<?=$ing[$i]["unit"]?>">
                    <div class="recipe_front"><?=$ing[$i]["name"]?></div>
                    <div class="recipe_back"><?=$ing[$i]["amount"].$ing[$i]["unit"]?></div>
                    <div class="del_row">X</div>
                </li>
                <?php
                }
                ?>
            </ul>
            </form>
        </div>
        <div class="ico_btn8" onclick="ShowInput()">+ 양념 입력</div>
       
    </div>
    
    <div class="register_btn">
          <div class="ico_confirm3"><img src="/img/ico_arrow.svg">이전 페이지</div>
          <div class="ico_confirm2">다음 페이지<img src="/img/ico_arrow.svg"></div>
    </div>
</div>

<script>



    // 단위선택
    $(document).on('click', '.search_recipe', function() {
        if(!$(this).hasClass("active")) {
            $(".search_recipe").removeClass("active");
            $(this).addClass("active");
        }
    })


    // 양념검색
    $(document).on('keyup', '#keyword_ingredient', function() {
        var k = $(this).val();
        if(k != "") {
            $("#search_box_ingredient ul li").hide();
            var idx = $("#search_box_ingredient ul li:contains('"+k+"')");
            $(idx).show();
        } else {
            $("#search_box_ingredient ul li").show();
        }
    })

    // 양념선택
    $(document).on('click', '.search_ingredient', function() {
        $("#keyword_ingredient").val($(this).text());
        $("#ing").val($(this).attr("idx"));
    });

    // 양념추가
    $(document).on('click', '#add_ingredient', function() {
        if($.trim($("#keyword_ingredient").val()) == "") {
            alert("양념를 입력해 주세요.");
            $("#keyword_ingredient").focus();
            return false;
        }
        if($.trim($("#season").val()) == "") {
            alert("수량을 입력해 주세요.");
            $("#season").focus();
            return false;
        }

        var ins_idx = $("#ing").val();
        var ingredient = $("#keyword_ingredient").val();
        var amount = $("#season").val();
        var unit =  $(".search_recipe.active").text();

        if(ins_idx == "") {
            alert("검색결과에서 양념를 선택해 주세요.");
            return false;
        }

        var array_ing = { "ins_idx" : ins_idx, "amount" : amount,"unit" : unit }

        var html = ""
        html = html + '<li>';
        html = html + '    <input type="hidden" name="ins_idx[]" value="' + ins_idx + '"</div>';
        html = html + '    <input type="hidden" name="amount[]" value="' + amount + '"</div>';
        html = html + '    <input type="hidden" name="unit[]" value="' + unit + '"</div>';
        html = html + '    <div class="recipe_front">'+ingredient+'</div>';
        html = html + '    <div class="recipe_back">'+amount+unit+'</div>';
        html = html + '    <div class="del_row">X</div>';
        html = html + '</li>';

        $(".recipe_material ul").html($(".recipe_material ul").html() + html);
        HideInput();
    })

    // 양념삭제
    $(document).on('click', '.del_row', function() {
        $(this).parent().remove();
    });

    // 이전 페이지
    $(document).on('click', '.ico_confirm3', function() {
        location.href = "./pop_modify2.php?idx=<?=$r_idx?>";
    });


    // 양념저장 & 이동
    $(document).on('click', '.ico_confirm2', function() {

        var formData = $("#myform").serialize();

        if($(".recipe_material ul li").length == 0) {
            alert("하나 이상의 양념를 선택해 주세요.");
            return false;
        }

        $.ajax({
            cache: false,
            type: "POST",
            url : "./ajax_recipe_modify3.php",
            data: formData,
            dataType:"json",
            success : function(data, status, xhr) {
                console.log(data);
                location.href="./pop_modify4.php?idx=<?=$r_idx?>";                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    });
</script>