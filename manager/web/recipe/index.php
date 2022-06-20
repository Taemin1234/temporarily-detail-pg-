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
            <div class="cate_btit">레시피관리</div>
            <div class="cate_tit active"><a href="/web/recipe/">레시피관리</a></div>
            <div class="cate_tit"><a href="/web/recipe/list.php">재료목록</a></div>
            <div class="cate_tit"><a href="/web/recipe/list2.php">양념목록</a></div>
            <div class="cate_tit"><a href="/web/recipe/tag.php">#태그관리</a></div>
        </div>
    </div>
    <div class="sub_sbox">
        <div class="sub_current">홈<i class="fa fa-angle-right" aria-hidden="true"></i>레시피<i class="fa fa-angle-right" aria-hidden="true"></i>레시피관리</div>
        <h10>레시피관리</h10>
    </div>
    <div id="right_box">
       <div class="list_search">
           <div class="list_top">
               <div class="search_ad">
                   <ul class="search_rbtn2">
                    <!-- 테마는 셀렉트박스의 해당 테마를 선택하면 검색버튼을 클릭하지않아도 아래의 화면이 해당 테마의 내용으로 바뀌게 해주세요 -->
                     <li>
                        <div class="cate_ga ml_10">
                           <select id="AllTheme" name="AllTheme" onchange="">
                                <option>전체테마</option>
                                <option>메인요리</option>
                                <option>간편요리</option>
                                <option>한상차림</option>
                                <option>고기요리</option>
                                <option>채식요리</option>
                                <option>건강요리</option>
                                <option>디저트</option>
                               <option>손님초대</option>
                            </select>
                       </div>
                         <div class="cate_ga ml_10">
                           <select id="MemberSearch" name="MemberSearch" onchange="">
                                <option>전체</option>
                                <option>인플루언서명</option>
                                <option>레시피명</option>
                                <option>태그</option>
                            </select>
                       </div>
                     </li>
                      <li>
                        <input type="text" name="Keyword" value="" class="textbox2" placeholder="">
                        <input type="submit" value="검색" class="btn_type">
                      </li>
                   </ul>
                   <a href="/web/recipe/pop_recipe.php" class="btn_white btn_type7 ml_10" onclick="window.open(this.href, '_blank', 'width=800, height=680'); return false;">메인1관리</a>
                   <a href="/web/recipe/pop_recipe2.php" class="btn_white btn_type7 ml_10" onclick="window.open(this.href, '_blank', 'width=800, height=680'); return false;">메인2관리</a>
                   <a href="/web/recipe/pop_recipe3.php" class="btn_white btn_type7 ml_10" onclick="window.open(this.href, '_blank', 'width=800, height=680'); return false;">메인3관리</a>
                </div>
            </div>
        </div>
        <div class="list_box">
           <div class="ser_title">검색결과수<span class="ser_count">999</span></div>
            <div class="table_info">
                <table>
                    <thead>
                        <tr>
                            <th class="ga_num">번호</th>
                            <th class="ga_influ">인플루언서</th>
                            <th class="ga_theme">테마</th>
                            <th class="ga_recipename">레시피명</th>
                            <th class="ga_click">조회수</th>
                            <th class="ga_scrap">스크랩</th>
                            <th class="ga_list">장바구니</th>
                            <th class="ga_approval">승인</th>
                            <th class="ga_recommend">메인1</th>
                            <th class="ga_recommend">메인2</th>
                            <th class="ga_recommend">메인3</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php for($i=0; $i<20; $i++){ ?>
                       <!-- tr를 클릭하게되면 어디를 클릭해도 오른쪽 화면에 나타타게 해주세요 -->
                        <tr>
                            <td class="ga_num">1</td>
                            <td class="ga_influ">요리하는고양이</td>
                            <td class="ga_theme">간편요리</td>
                            <td class="ga_recipename">갱시기죽 끓이는 법</td>
                            <td class="ga_click">1,523</td>
                            <td class="ga_scrap">2,145</td>
                            <td class="ga_list">488</td>
                            <!-- 승인과 미승인이 있으며 승인일때는 class명에 red가 빠지고 미승인일때만 red가 들어가게 해주세요 -->
                            <td class="ga_approval red">미승인<a href="/recipe/pop_recipe.php" class="ico_btn7" onclick="window.open(this.href, '_blank', 'width=540, height=900'); return false;">미리보기</a></td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div></td>
                            <!-- 클릭하면 이미지가 바뀌는데 한번 더 누르면 다시 바뀌도록 설정해주세요 -->
                            <script>
                                $(function(){
                                    $(".reco_img").on("click", function(){             $(this).find("img").attr("src","/img/ico_reco_on.svg"); 
                                    });
                                });
                            </script>
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
                    <div class="red btn_white" onClick="window.confirm('삭제하시겠습니까?');">삭제</div>
                    <a href="/web/recipe/modify.php" class="btn_white">수정</a>
                </div>
                <div class="btn_box">
                        <a href="/master/list/pop_register.php" class="btn_type" onclick="window.open(this.href, '_blank', 'width=540, height=900'); return false;"><img src="/img/ico_bplus.svg">등록</a>
                </div>
            </div>
            <div class="table_line">
                <ul>
                   <li class="ad_line">
                        <div class="ad_table_tit">번호</div>
                        <div class="ad_num ad_table">1</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">인플루언서</div>
                        <div class="ad_influ ad_table">요리하는고양이</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">테마</div>
                        <div class="ad_theme ad_table">간편요리</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">레시피명</div>
                        <div class="ad_recipename ad_table">갱시기죽 끓이는 법</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">레시피설명</div>
                        <div class="ad_recipebox ad_table">쉽고 간단하게 하는</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">사진첨부</div>
                        <div class="ad_recipepic ad_table"><a href="/recipe/pop_detail.php" class="ico_btn7" onclick="window.open(this.href, '_blank', 'width=540, height=717'); return false;">미리보기</a></div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">재료</div>
                        <div class="ad_ingredient ad_table">돼지고기 불고기감 300g, 양파 100g</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">양념</div>
                        <div class="ad_food ad_table">간장 8g, 설탕 1g, 맛술 0.5g, 전분가루 10g, 콩기름 3g</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">TIPS</div>
                        <div class="ad_tips ad_table">구울 때 양념이 타지 않게 잘 뒤적여 주면서 구워주세요.</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">유튜브</div>
                        <div class="ad_youtube ad_table"><a href="https://www.youtube.com/" target="_blank">https://www.youtube.com/</a></div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">태그</div>
                        <div class="ad_tag ad_table">
                            <div class="search_tag">
                                <a href="#" class="search_recipe">홈카페</a>
                                <a href="#" class="search_recipe">캠핑요리</a>
                                <a href="#" class="search_recipe">손님초대</a>
                                <a href="#" class="search_recipe">집밥</a>
                            </div>
                        </div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">조회수</div>
                        <div class="ad_click ad_table">1,211</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">스크랩</div>
                        <div class="ad_scrap ad_table">574</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">장바구니</div>
                        <div class="ad_cart ad_table">2,233</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">승인</div>
                        <div class="ad_approval ad_table red">
                            미승인
                        </div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">등록일</div>
                        <div class="ad_date ad_table">2021.10.21</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adfooter.php" ?>