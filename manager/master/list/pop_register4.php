<? require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php'); ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<?php
$temp = empty($_GET["temp"]) ? "" : $_GET["temp"] ;
if($temp == "") {
?>
    <script>alert("잘못된 접근 입니다."); self.close();</script>
<?
exit;
}


// 레시피 불러오기
$sql = "    
SELECT 
    r.temp_idx, r.tip, r.youtube
FROM 
    recipe_temp as r
WHERE
    r.temp_idx = '$temp'";

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

$stmt->bind_result($temp_idx, $tip, $youtube);
$stmt->store_result();
$rowCount = $stmt->num_rows;

$stmt->fetch();
$stmt->close();


// 레시피 join 태그 불러오기
$sql = "
    SELECT
        tt.tag_idx, tt.tag_num, t.name
    FROM 
        recipe_join_tag_temp as tt
    LEFT OUTER JOIN
        recipe_tag as t ON t.rt_idx = tt.tag_idx
    WHERE
        tt.temp_idx = '$temp'
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

$array_tag_idx = array();
$array_tag_name = array();
for($i=0; $i < $rowCountJoinTag; $i++) {
    $array_tag_idx[$tag_join_list[$i]['tag_num']] = $tag_join_list[$i]['tag_idx'];
    $array_tag_name[$tag_join_list[$i]['tag_num']] = $tag_join_list[$i]['name'];
}

// 테그 불러오기
$sql = "
    SELECT
        rt_idx, name
    FROM 
        recipe_tag
    ORDER BY 
        name ASC";

$stmt = $conn->prepare($sql);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $name);
$stmt->store_result();
$rowCountTag = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $tag_list[$list_idx]['rt_idx'] = $idx;
    $tag_list[$list_idx]['name'] = $name;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();

// 인터뷰 불러오기
$sql = "
    SELECT
        file_url, file_name
    FROM 
        attachment_temp
    WHERE
        from_temp_id = '$temp' AND from_table_id='recipe_interview' AND ordering_index = '0' ";

$stmt = $conn->prepare($sql);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($file_url, $file_name);
$stmt->store_result();
$rowCountFile = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
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
                <?php 
                    for($i=0; $i < $rowCountTag; $i++) {
                ?>
                <a href="#" class="search_recipe" idx="<?=$tag_list[$i]["rt_idx"]?>"><?=$tag_list[$i]["name"]?></a>
                <?
                    }
                ?>
            </div>
        </div>
        
        <div onclick="HideTag()" class="close_box"><div class="m_close"><img src="/img/ico_close.svg"></div></div>
    </div>
</div>
<script type="text/javascript">
  //스르륵 팝업
    var giMenuDuration = 500;

        function ShowTag(num){
            $("#current_tag").val(num);
            $('.memo_box2' ).css( { 'display' : 'block' } );
            $('.reply_content' ).css( { 'bottom' : '-100%' } );
            $('.reply_content' ).animate( { bottom: '0px' }, { duration: giMenuDuration } );
            $('.memo_bg').fadeIn();
        }
        function HideTag(){
            $("#current_tag").val('');
            $('.reply_content' ).animate( { bottom: '-100%' }, { duration: giMenuDuration, complete:function(){ $('.memo_box2' ).css( { 'display' : 'none' } ); } } );
            $('.memo_bg').fadeOut();
        }
</script>
 
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
   <div class="sub_txt pop_txt">레시피 등록</div>
    
    <!-- 단계표시 -->
    <div class="step_box">
        <div class="step_black w100"></div>
    </div>
    
    <div class="profile_box2">
      <div class="profile_txt">
          <form name="myform" id="myform" method="post" enctype="multipart/form-data">
            <input type="hidden" name="temp" value="<?=$temp?>">
           <ul>
               <li>
                   <div class="profile_left">TIPS</div>
                   <div class="profile_right">
                       <script>
                            //댓글 글자수 체크
                            $(function() {
                                $('#ser_write').keyup(function (e){
                                    var cmtWord = $(this).val();
                                    $('#counter').html(cmtWord.length + '/70');
                                });
                                $('#ser_write').keyup();
                            });
                          </script>
                        <div class="ser_write_wrap">
                          <div class="ser_write_box">
                            <textarea id="ser_write" name="tip" maxlength="70" rows="3" cols="30" placeholder="ex)구울 때 양념이 타지 않게 잘 뒤적여 주면서 구워주세요. 가만히 두면 속은 덜 익고 겉은 타는 일이 생길 수 있어요." class="ser_textarea"><?=$tip?></textarea>
                            <div class="ser_word_count" id="counter"></div>
                          </div>
                        </div>
                   </div>
               </li>
               <li>
                   <div class="profile_left">동영상</div>
                   <div class="profile_right">
                       <input type="text" name="youtube" id="youtube" value="<?=$youtube?>" placeholder="유튜브 url" class="textbox" autofocus="" required="">
                       <!-- 클릭시 복사한 주소를 붙여넣을 수 있게 해주세요 --><div class="ico_btn5">+붙여넣기</div>
                   </div>
               </li>               
               <!--<li>
                    <div class="profile_left">인터뷰</div>
                    <div class="profile_right">
                        <? if($rowCountFile > 0) { ?>
                        <div>
                            <img src="<?=$file_list[0]["file_url"];?>" style="width:100px;">
                        </div>
                        <? } ?>
                        <div class="plus_file">
                                <div class="filebox"><label for="ex_file_0" class="ico_btn5">불러오기</label><input type="file" id="ex_file_0" name="ex_file_0"></div>
                                <input type="text" id="attFile_0" name="attFile_0" value="" placeholder="파일명" readonly="readonly" class="textbox">
                        </div>
                    </div>
               </li>-->
               <li class="recipe_end">
                   <div class="profile_left">레시피 태그</div>
                   <div class="profile_right">
                            <input type="hidden" id="current_tag">
                            <!-- 태그가 추가되고 삭제할때 뜨는 팝업창이며 태그가 추가되었을 경우 위의 onclick="ShowTag()"이 없어져야합니다 -->
                            <div class="popup-wrap" id="popup2">
                            <div class="popup">
                              <div class="popup-body">
                                삭제하시겠습니까?
                              </div>
                              <div class="popup-foot">
                                <span class="pop-btn confirm" id="confirm">삭제</span>
                                <span class="pop-btn close" id="close2">취소</span>
                              </div>
                            </div>
                           </div>

                       <div class="profile_tag">
                           <div class="profile_left num">#1</div>
                           <div class="profile_right" onclick="">
                              <!-- 태그 추가했을때의 창 : 이미지가 ico_dplus.svg로 바뀌게 됩니다. 칸안에 입력된 태그는 수정이 되지않아야합니다. -->
                               <input type="hidden" name="tag_idx[]" id="tag_idx1" value="<?=empty($array_tag_idx['1']) ? "" : $array_tag_idx['1'] ?>">
                               <input type="text"   name="UserTag[]" id="UserTag1" 
                                                    value="<?=empty($array_tag_name['1']) ? "" : $array_tag_name['1'] ?>" 
                                                    placeholder="" class="textbox" readonly
                                                    onclick="ShowTag('1')">
                               <div id="modal-open2" class="span_img" idx="1"><img id="imgtag1" src="<?=empty($array_tag_idx['1']) ? "/img/ico_plus.svg" : "/img/ico_dplus.svg" ?>"></div>
                           </div>                           
                       </div>
                       <div class="profile_tag">
                           <div class="profile_left num">#2</div>
                           <div class="profile_right">
                              <!-- 태그 추가했을때의 창 : 이미지가 ico_dplus.svg로 바뀌게 됩니다. 칸안에 입력된 태그는 수정이 되지않아야합니다. -->
                               <input type="hidden" name="tag_idx[]" id="tag_idx2" value="<?=empty($array_tag_idx['2']) ? "" : $array_tag_idx['2'] ?>">
                               <input type="text"   name="UserTag[]" id="UserTag2" 
                                                    value="<?=empty($array_tag_name['2']) ? "" : $array_tag_name['2'] ?>" 
                                                    placeholder="" class="textbox" readonly
                                                    onclick="ShowTag('2')">
                               <div id="modal-open2" class="span_img" idx="2"><img id="imgtag2" src="<?=empty($array_tag_idx['2']) ? "/img/ico_plus.svg" : "/img/ico_dplus.svg" ?>"></div>
                           </div>
                       </div>
                       <div class="profile_tag">
                           <div class="profile_left num">#3</div>
                           <div class="profile_right">
                               <input type="hidden" name="tag_idx[]" id="tag_idx3" value="<?=empty($array_tag_idx['3']) ? "" : $array_tag_idx['3'] ?>">
                               <input type="text" name="UserTag[]" id="UserTag3" 
                                                    value="<?=empty($array_tag_name['3']) ? "" : $array_tag_name['3'] ?>" 
                                                    placeholder="" class="textbox" readonly
                                                    onclick="ShowTag('3')">
                               <div class="span_img" idx="3"><img id="imgtag3" src="<?=empty($array_tag_idx['3']) ? "/img/ico_plus.svg" : "/img/ico_dplus.svg" ?>"></div>
                           </div>
                       </div>
                       <div class="profile_tag">
                           <div class="profile_left num">#4</div>
                           <div class="profile_right">
                               <input type="hidden" name="tag_idx[]" id="tag_idx4" value="<?=empty($array_tag_idx['4']) ? "" : $array_tag_idx['4'] ?>">
                               <input type="text" name="UserTag[]" id="UserTag4"
                                                    value="<?=empty($array_tag_name['4']) ? "" : $array_tag_name['4'] ?>" 
                                                    placeholder="" class="textbox" readonly
                                                    onclick="ShowTag('4')">
                               <div class="span_img" idx="4"><img id="imgtag4" src="<?=empty($array_tag_idx['4']) ? "/img/ico_plus.svg" : "/img/ico_dplus.svg" ?>"></div>
                           </div>
                       </div>
                   </div>
               </li>
           </ul>
            </form>
       </div>
       
       
    </div>
    
    <div class="register_btn">
          <div class="ico_confirm3"><a href="./pop_register3.php?temp=<?=$temp?>"><img src="/img/ico_arrow.svg">이전 페이지</a></div>
          <div class="ico_confirm2">다음 페이지<img src="/img/ico_arrow.svg"></div>
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
    
    // 기타저장 & 이동
    $(document).on('click', '.ico_confirm2', function() {

        var form = $('#myform')[0]
        var data = new FormData(form);

        $.ajax({
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            type: "POST",
            url : "./ajax_recipe_add4.php",
            data: data,
            timeout: 600000,
            success : function(data, status, xhr) {
                console.log(data);
                location.href="./pop_register5.php?temp=<?=$temp?>";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    });
</script>