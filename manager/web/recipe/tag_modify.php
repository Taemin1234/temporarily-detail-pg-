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
            <div class="cate_btit">태그관리</div>
            <div class="cate_tit"><a href="/web/recipe/">레시피 관리</a></div>
            <div class="cate_tit"><a href="/web/recipe/list.php">재료목록</a></div>
            <div class="cate_tit"><a href="/web/recipe/list2.php">양념목록</a></div>
            <div class="cate_tit active"><a href="/web/recipe/tag.php">#태그관리</a></div>
        </div>
    </div>
    <div class="sub_sbox">
        <div class="sub_current">홈<i class="fa fa-angle-right" aria-hidden="true"></i>레시피<i class="fa fa-angle-right" aria-hidden="true"></i>#태그관리</div>
        <h10>#태그관리</h10>
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
                   <a href="/web/recipe/pop_tag.php" class="btn_white btn_type7 ml_10" onclick="window.open(this.href, '_blank', 'width=650, height=680'); return false;">인기태그관리</a>
                </div>
            </div>
        </div>
        <div class="list_box">
           <div class="ser_title">검색결과수<span class="ser_count">999</span></div>
            <div class="table_info">
                <table>
                    <thead>
                        <tr>
                            <th class="ga_num2">번호</th>
                            <th class="ga_list2">목록</th>
                            <th class="ga_hit">조회수</th>
                            <th class="ga_writer">등록자</th>
                            <th class="ga_recommend">노출</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ga_num2">1</td>
                            <td class="ga_list2">홈카페</td>
                            <td class="ga_hit">24,511</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">2</td>
                            <td class="ga_list2">캠핑요리</td>
                            <td class="ga_hit">154,001</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">3</td>
                            <td class="ga_list2">손님초대</td>
                            <td class="ga_hit">248</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">4</td>
                            <td class="ga_list2">집밥</td>
                            <td class="ga_hit">7,655</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">5</td>
                            <td class="ga_list2">다이어트</td>
                            <td class="ga_hit">24,511</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">6</td>
                            <td class="ga_list2">인기!핫!</td>
                            <td class="ga_hit">24,511</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">7</td>
                            <td class="ga_list2">글로벌</td>
                            <td class="ga_hit">1,511</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">8</td>
                            <td class="ga_list2">이유식</td>
                            <td class="ga_hit">24,511</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">9</td>
                            <td class="ga_list2">간편요리</td>
                            <td class="ga_hit">248</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">10</td>
                            <td class="ga_list2">면요리</td>
                            <td class="ga_hit">622</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
                        <tr>
                            <td class="ga_num2">11</td>
                            <td class="ga_list2">건강식</td>
                            <td class="ga_hit">11,244</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                        </tr>
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
                    <a href="/web/recipe/tag.php" class="btn_white">취소</a>
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
                        <div class="ad_table_tit">목록</div>
                        <div class="ad_two ad_table">
                            <input type="text" name="RecipeTag" value="" class="textbox2" placeholder="">
                        </div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">등록자</div>
                        <div class="ad_food ad_table">관리자</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adfooter.php" ?>