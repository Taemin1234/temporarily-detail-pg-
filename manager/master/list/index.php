<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"].'/master/fnc/check_auth_master.php' ?>
<style>
    header {
        display: none;
    }
    body {
        padding-bottom: 0;
    }
</style>

<?
    $idx = $_SESSION["idx"];
    
    // 레시피 불러오기
    $page = 1;
    $page_size = 8;
    $startPageNumber = $page_size * ($page - 1);
    $endPageNumber = 8;
    $sql = "    
        SELECT 
            r.recipe_idx, r.influencer_idx, r.title, r.sub_title, r.tag, r.tip, date_format(r.create_date, '%y.%m.%d') as create_date, 
            date_format(r.update_date, '%y.%m.%d') as update_date,
            (SELECT influencer_name FROM influencer as i WHERE i.influencer_idx = r.influencer_idx) as influencer_name,
            a.file_url
        FROM 
            recipe as r
        LEFT OUTER JOIN
            attachment AS a ON a.from_content_id = r.recipe_idx AND a.from_table_id = 'recipe' AND a.ordering_index = '0'
        WHERE
            r.ok = '2' AND r.influencer_idx = '$idx'
        ORDER BY 
            create_date DESC
        LIMIT 
            ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('dd',$startPageNumber, $endPageNumber);
    $stmt->execute();
    if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
    {
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
    }
    $stmt->bind_result($recipe_idx, $influencer_idx, $title, $sub_title, $tag, $tip, $create_date, $update_date, $influencer_name, $file_url);
    $stmt->store_result();
    $rowCountRecipe2 = $stmt->num_rows;

    $list_idx = 0;
    while($stmt->fetch())
    {
        $recipe_list2[$list_idx]['recipe_idx'] = $recipe_idx;
        $recipe_list2[$list_idx]['influencer_idx'] = $influencer_idx;
        $recipe_list2[$list_idx]['title'] = $title;
        $recipe_list2[$list_idx]['sub_title'] = $sub_title;
        $recipe_list2[$list_idx]['tag'] = $tag;
        $recipe_list2[$list_idx]['tip'] = $tip;
        $recipe_list2[$list_idx]['create_date'] = $create_date;
        $recipe_list2[$list_idx]['update_date'] = $update_date;
        $recipe_list2[$list_idx]['influencer_name'] = $influencer_name;
        $recipe_list2[$list_idx]['file_url'] = $file_url;
        $list_idx = $list_idx + 1;
    }

    $stmt->free_result();
    $stmt->close();

    $sql = "    
        SELECT 
            r.recipe_idx, r.influencer_idx, r.title, r.sub_title, r.tag, r.tip, date_format(r.create_date, '%y.%m.%d') as create_date, 
            date_format(r.update_date, '%y.%m.%d') as update_date,
            (SELECT influencer_name FROM influencer as i WHERE i.influencer_idx = r.influencer_idx) as influencer_name,
            a.file_url
        FROM 
            recipe as r
        LEFT OUTER JOIN
            attachment AS a ON a.from_content_id = r.recipe_idx AND a.from_table_id = 'recipe' AND a.ordering_index = '0'
        WHERE
            r.ok = '1' AND r.influencer_idx = '$idx'
        ORDER BY 
            create_date DESC
        LIMIT 
            ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('dd',$startPageNumber, $endPageNumber);
    $stmt->execute();
    if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
    {
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
    }
    $stmt->bind_result($recipe_idx, $influencer_idx, $title, $sub_title, $tag, $tip, $create_date, $update_date, $influencer_name, $file_url);
    $stmt->store_result();
    $rowCountRecipe = $stmt->num_rows;

    $list_idx = 0;
    while($stmt->fetch())
    {
        $recipe_list[$list_idx]['recipe_idx'] = $recipe_idx;
        $recipe_list[$list_idx]['influencer_idx'] = $influencer_idx;
        $recipe_list[$list_idx]['title'] = $title;
        $recipe_list[$list_idx]['sub_title'] = $sub_title;
        $recipe_list[$list_idx]['tag'] = $tag;
        $recipe_list[$list_idx]['tip'] = $tip;
        $recipe_list[$list_idx]['create_date'] = $create_date;
        $recipe_list[$list_idx]['update_date'] = $update_date;
        $recipe_list[$list_idx]['influencer_name'] = $influencer_name;
        $recipe_list[$list_idx]['file_url'] = $file_url;
        $list_idx = $list_idx + 1;
    }

    $stmt->free_result();
    $stmt->close();


    $sql = "
        SELECT 
            a.file_url, aa.file_url AS file_url2
        FROM 
            influencer AS i
        LEFT OUTER JOIN
            attachment AS a ON a.ordering_index = '0' AND a.from_table_id = 'influencer' AND a.from_content_id = i.influencer_idx
        LEFT OUTER JOIN
            attachment AS aa ON aa.ordering_index = '0' AND aa.from_table_id = 'influencer_interview' AND a.from_content_id = i.influencer_idx
        WHERE
            i.influencer_idx = ? ";
    if($stmt = $conn->prepare($sql)) { // assuming $mysqli is the connection
        $stmt->bind_param('s', $_SESSION['idx']);
        $stmt->execute();
        // any additional code you need would go here.
    } else {
        $error = $conn->errno . ' ' . $conn->error;
        echo $error; // 1054 Unknown column 'foo' in 'field list'
    }

    if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
    {
        echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
        echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
    }

    $stmt->bind_result($influencer_file_url, $interview_file_url);
    $stmt->store_result();
    $rowCountInterview = $stmt->num_rows;

    $list_idx = 0;
    while($stmt->fetch())
    {
        $interview_list[$list_idx]['file_url_influencer'] = $influencer_file_url;
        $interview_list[$list_idx]['file_url_interview'] = $interview_file_url;
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
        r.influencer_idx = ? AND r.ok = '1'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('d', $_SESSION["idx"]);
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

<!-- 레시피 미리보기 -->
<div class="pre_box">
    <div class="reply_content">
        <div class="sub_txt in_txt">미리보기<a href="#" onclick="HidePreview()" class="close_btn"><img src="/img/ico_close.svg"></a></div>
          <div class="recipe_slide">
              <div class="recipe_box">
                    <!--<div class="influ_tag tag_txt">
                        <ul id="tag">
                             
                        </ul>
                    </div>-->
                </div>
              <div class="swiper preSwiper">
                  <div class="swiper-wrapper" id="preview_attach">

                  </div>
                  <div class="swiper-pagination"></div>
                </div>
          </div>
          <div class="recipe_detail">
              <div class="influ_box">
                  <div class="influ_line">
                      <div class="recipe_sub" id="preview_sub_title"></div>
                      <!-- 한줄만 보여야합니다 -->
                      <div class="recipename" id="preview_title"></div>
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
                    <ul id="preview_ins">

                    </ul>
                </div>
                <div class="recipe_material">
                   <h7>[양념]</h7>
                    <ul id="preview_ins2">

                    </ul>
                </div>

                <!-- 인터뷰 -->
                <div class="recipe_interview">
                    <h7>[인터뷰]</h7>
                    <ul id="preview_interview">
                        <?php
                        for($i=0; $i < $rowCountInterview; $i++) {
                        ?>
                        <li>
                            <div style="clear:both;"><img src="<?=$interview_list[$i]["file_url_interview"]?>"/></div>                        
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
                    <div class="tip_txt"></div>
                </div>

                <!-- 영상 -->
                
                    <!-- 유튜브에서 썸네일 마우스 오버시 보여지는 화면을 링크로 걸어두었습니다. 영상부분을 표시하려고 만들어두었습니다. -->
                    <!-- <img id="thumbnail" alt="" class="" src="https://i.ytimg.com/an_webp/opq-QVDW7lk/mqdefault_6s.webp?du=3000&sqp=CKWpuYsG&rs=AOn4CLCxwRMCKde9wqAXuBqp_G_24Ug21Q"> -->
                <!-- <div class="recipe_movie">
                    <iframe id="preview_youtube" width="100%" height="100%" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> -->

                <!-- 작은 이미지일 경우 -->
                <div class="influ_recipe">
                    <div class="influ_box">
                        <h4><?=$influencer_name?>님의<br>다른 요리 레시피</h4>
                        <div class="influ_pic">
                            <?php
                            for($i=0; $i < $rowCountInterview; $i++) {
                            ?>
                                <img src="<?=$interview_list[$i]["file_url_influencer"]?>">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tag_pic">
                      <ul>
                        <?php
                        for($i=0; $i < $rowCountOther; $i++) {
                        ?>
                          <li>
                              <a href="/recipe/pop_detail.php?ridx=<?=$other[$i]["recipe_idx"]?>">
                                  <img src="<?=$other[$i]["file_url"]?>" alt="음식사진" onError="this.src='/img/noimg.png';">
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

    function ShowPreview(idx){
        load_preview(idx);
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
 
    <!-- 이전페이지 -->
    <a href="#" onclick="goBack()" class="back_sub2"><img src="/img/ico_arrow.svg"></a>
 
    <div class="sub_txt in_txt">레시피목록<a href="#" id="btn_register" class="blue">+ 등록</a></div>

    <div class="swiper mySwiper2 result_tab">
      <div thumbsSlider="" class="swiper mySwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">대기중</div>
            <div class="swiper-slide">등록완료</div>
          </div>
      </div>
      <div class="swiper-wrapper">
        <div class="swiper-slide">
            <!-- 등록된 레시피가 없을 경우 보이게 해주세요 -->
            <? if($rowCountRecipe2 == 0) { ?>
                <div class="my_nolist pt_50">
                    <img src="/img/ico_noimg.svg">
                    <p>등록된 레시피가 없습니다.</p>
                </div>
            <? } ?>
              
            <div class="result_box">
                <div class="influ_recipe">
                    <div class="tag_pic">
                      <ul id="ul_result2">
                         <!-- 처음엔 8개가 보이고 밑으로 내리면 16개가 보이며 그 이후는 더보기 버튼이 활성화되어 클릭해서 펼쳐지게 해주세요 -->
                         
                        <?php 
                            for($i=0; $i < $rowCountRecipe2; $i++){
                                $recipe_idx = $recipe_list2[$i]["recipe_idx"];
                        ?>                         
                            <li>
                                <a href="#" class="pre_modify" idx="<?=$recipe_list2[$i]["recipe_idx"]?>"><img src="/img/ico_rmodify.svg"></a>
                                    <a href="#" onclick="ShowPreview('<?=$recipe_idx?>')"> 
                                    <img src="<?=$recipe_list2[$i]["file_url"]?>" alt="음식사진" onError="this.src='/img/noimg.png';">
                                    <div class="recipe_sub"><?=$recipe_list2[$i]["sub_title"]?></div>
                                    <div class="recipename"><?=$recipe_list2[$i]["title"]?></div>
                                </a>
                            </li>
                        <? } ?>
                      </ul>
                  </div>
                </div>
            </div>
            
            <div><img class="ico_plus2" src="/img/ico_plus.svg" style="width:50px;"></div>
        </div>
        <div class="swiper-slide">
           <!-- 등록된 레시피가 없을 경우 보이게 해주세요 -->
            <? if($rowCountRecipe == 0) { ?>
                <div class="my_nolist pt_50">
                    <img src="/img/ico_noimg.svg">
                    <p>등록된 레시피가 없습니다.</p>
                </div>
            <? } ?>
              
            <div class="result_box">
                <div class="influ_recipe">
                    <div class="tag_pic">
                      <ul id="ul_result1">
                         <!-- 처음엔 8개가 보이고 밑으로 내리면 16개가 보이며 그 이후는 더보기 버튼이 활성화되어 클릭해서 펼쳐지게 해주세요 -->
                          
                        <?php 
                            for($i=0; $i < $rowCountRecipe; $i++){
                                $recipe_idx = $recipe_list[$i]["recipe_idx"];
                        ?>                                 
                            <li>
                                <a href="#" class="pre_modify" idx="<?=$recipe_list[$i]["recipe_idx"]?>"><img src="/img/ico_rmodify.svg"></a>
                                <a href="#" onclick="ShowPreview('<?=$recipe_idx?>')">
                                    <img src="<?=$recipe_list[$i]["file_url"]?>" alt="음식사진" onError="this.src='/img/noimg.png';">
                                    <div class="recipe_sub"><?=$recipe_list[$i]["sub_title"]?></div>
                                    <div class="recipename"><?=$recipe_list[$i]["title"]?></div>
                                </a>
                            </li>
                        <? } ?>
                      </ul>
                  </div>
                </div>
            </div>
            
            <div><img class="ico_plus2" src="/img/ico_plus.svg" style="width:50px;"></div>
        </div>
      </div>
      
      <!-- 더보기 -->
        <!-- <div><img class="ico_plus2" src="/img/ico_plus.svg"></div> -->
    </div>
</div>
    <input type="hidden" id="current_page" value="<?=$page?>"/>
    <script src="/js/result_tab.js"></script>

    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".mySwiper2", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
      
        $(document).on('click', '#btn_register', function() {
            var min = 10000000;
            var max = 99999999;
            var random = Math.floor(Math.random() * (max - min + 1)) + min;
            window.open('/master/list/pop_register.php?temp=' + random, '_blank', 'width=540, height=900'); 
            return false;
        });

        function load_preview(idx) {
            
            $.ajax({
                type: "GET",
                url : "./ajax_load_item.php",
                data: { idx : idx },
                dataType:"json",
                async:false,
                success : function(data, status, xhr) {

                    console.log(data);

                    // 태그
                    var str_tag = "";
                    $.each(data.tag, function(index, value) {
                        str_tag = str_tag + "<li>" + value.name + "</li>";
                    });
                    $("#tag").html(str_tag);

                    // 사진
                    html = "";
                    $.each(data.attach, function(index, value) {
                        html = html + '<div class="swiper-slide">';
                        html = html + '    <div class="slide_img"><img src="'+value.file_url+'"></div>';
                        html = html + '    <div class="text_bg"></div>';
                        html = html + '</div>';
                    });
                    $("#preview_attach").html(html);

                    // 서브타이틀
                    $("#preview_sub_title").text(data.sub_title);
                    // 타이틀
                    $("#preview_title").text(data.title);

                    // 재료
                    html = "";
                    $.each(data.ins, function(index, value) {
                        html = html + '<li>';
                        html = html + '    <div class="recipe_front">' + value.name + '</div>';
                        html = html + '    <div class="recipe_back">' + value.amount + value.unit + '</div>';
                        html = html + '</li>';
                    });
                    $("#preview_ins").html(html);

                    // 양념
                    html = "";
                    $.each(data.ins2, function(index, value) {
                        html = html + '<li>';
                        html = html + '    <div class="recipe_front">' + value.name + '</div>';
                        html = html + '    <div class="recipe_back">' + value.amount + value.unit + '</div>';
                        html = html + '</li>';
                    });
                    $("#preview_ins2").html(html);

                    $(".tip_txt").text(data.tip);

                    array_youtube = data.youtube.split("/");
                    if(data.youtube.indexOf("watch") != -1) {
                        $array_youtube = data.youtube.split("=");
                    }

                    $("#preview_youtube").attr("src", "https://www.youtube.com/embed/" + array_youtube[array_youtube.length - 1]);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }

        $(document).on('click', '.pre_modify', function() {
            window.open('./pop_modify.php?idx=' + $(this).attr("idx"), '_blank', 'width=540, height=900'); 
            return false;
        });

        $(document).on('click', '.ico_plus2', function() {        
            current_page = $("#current_page").val();
            next_page = parseInt(current_page) + 1;
            $.ajax({
                type: "POST",
                url : "/api/load_recipe_for_influ.php",
                data: { page : next_page },
                dataType:"json",
                success : function(data, status, xhr) {            

                    console.log(data.list1);

                    $("#current_page").val(next_page);

                    html = "";
                    if(data.list1 !== null) {
                        $.each(data.list1, function(item, value) {
                            html = html + '<li>';
                            html = html + '    <a href="#" class="pre_modify" idx="'+value.recipe_idx+'"><img src="/img/ico_rmodify.svg"></a>';
                            html = html + '    <a href="#" onclick="ShowPreview('+value.recipe_idx+')">';
                            html = html + '        <img src="'+value.file_url+'" alt="음식사진" onError="this.src=\'/img/noimg.png\';">';
                            html = html + '        <div class="recipe_sub">'+value.sub_title+'</div>';
                            html = html + '        <div class="recipename">'+value.title+'</div>';
                            html = html + '    </a>';
                            html = html + '</li>';
                        });

                        $("#ul_result1").append(html);
                    }

                    html = "";
                    if(data.list2 !== null) {
                        $.each(data.list2, function(item, value) {
                            html = html + '<li>';
                            html = html + '    <a href="#" class="pre_modify" idx="'+value.recipe_idx+'"><img src="/img/ico_rmodify.svg"></a>';
                            html = html + '    <a href="#" onclick="ShowPreview('+value.recipe_idx+')">';
                            html = html + '        <img src="'+value.file_url+'" alt="음식사진" onError="this.src=\'/img/noimg.png\';">';
                            html = html + '        <div class="recipe_sub">'+value.sub_title+'</div>';
                            html = html + '        <div class="recipename">'+value.title+'</div>';
                            html = html + '    </a>';
                            html = html + '</li>';
                        });

                        $("#ul_result2").append(html);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        });
    </script>