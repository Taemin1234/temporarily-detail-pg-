<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adheader.php" ?>

<div class="tab_admenu">
    <ul>
        <li><a href="/web/member/">회원가입</a></li>
        <li><a href="/web/influencer/">인플루언서</a></li>
        <li class="active"><a href="/web/recipe/">레시피</a></li>
        <li><a href="/web/notice/">공지사항</a></li>
    </ul>
</div>

<!-- 본문 컨테이너 -->
<div id="adcontainer">
    <div id="left_box">
       <div class="sub_box">
            <div class="cate_btit">재료목록</div>
            <div class="cate_tit"><a href="/web/recipe/">레시피 관리</a></div>
            <div class="cate_tit active"><a href="/web/recipe/list.php">재료목록</a></div>
            <div class="cate_tit"><a href="/web/recipe/list2.php">양념목록</a></div>
            <div class="cate_tit"><a href="/web/recipe/tag.php">#태그관리</a></div>
        </div>
    </div>
    <div class="sub_sbox">
        <div class="sub_current">홈<i class="fa fa-angle-right" aria-hidden="true"></i>레시피<i class="fa fa-angle-right" aria-hidden="true"></i>재료목록</div>
        <h10>재료목록</h10>
    </div>
    <div id="right_box">
       <div class="list_search">
           <div class="list_top">
               <div class="search_ad">
                   <ul class="search_rbtn3">
                      <li>
                        <input type="text" name="Keyword" value="" class="textbox2" placeholder="">
                        <input type="submit" value="검색" class="btn_type">
                      </li>
                   </ul>
                </div>
            </div>
        </div>
        <div class="list_box">
           <div class="ser_title">검색결과수<span class="ser_count">999</span></div>
            <div class="table_info mini_box">
                <table>
                    <thead>
                        <tr>
                            <th class="ga_num2">번호</th>
                            <th class="ga_food">품목</th>
                            <th class="ga_use">사용횟수</th>
                            <th class="ga_writer">등록자</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php for($i=0; $i<20; $i++){ ?>
                       <!-- tr를 클릭하게되면 어디를 클릭해도 오른쪽 화면에 나타타게 해주세요 -->
                        <tr>
                            <td class="ga_num2">1</td>
                            <td class="ga_food">돼지고기</td>
                            <td class="ga_use">46</td>
                            <td class="ga_writer">관리자</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="btn_wrap">
                      <div id="pageing" class="pagenation_wrap">
                          <ul>
                              <li onclick="CheckSearch(1)">처음</li>
                              <li onclick="CheckSearch(1)">이전</li>
                              <li class="active">1</li>
                              <li onclick="CheckSearch(2)">2</li>
                              <li onclick="CheckSearch(3)">3</li>
                              <li onclick="CheckSearch(4)">4</li>
                              <li onclick="CheckSearch(5)">5</li>
                              <li onclick="CheckSearch(6)">6</li>
                              <li onclick="CheckSearch(7)">7</li>
                              <li onclick="CheckSearch(8)">8</li>
                              <li onclick="CheckSearch(9)">9</li>
                              <li onclick="CheckSearch(10)">10</li>
                              <li onclick="CheckSearch(2)">다음</li>
                              <li onclick="CheckSearch(10)">끝</li>
                          </ul>
                      </div>
                </div>
            </div>
        </div>
        <div class="list_box">
           <div class="list_top">
                <div class="btn_box">
                    <a href="/web/recipe/list.php" class="btn_white">취소</a>
                    <div class="btn_type" onClick="window.confirm('저장하시겠습니까?');">저장</div>
                </div>
            </div>
            <div class="table_line">
                <ul>
                   <li class="ad_line">
                        <div class="ad_table_tit">번호</div>
                        <div class="ad_num ad_table">1</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">품목</div>
                        <div class="ad_food ad_table"><input type="text" name="FoodList" value="" maxlength="20" placeholder="" class="textbox" required=""></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adfooter.php" ?>