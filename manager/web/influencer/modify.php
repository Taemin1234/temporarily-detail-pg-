<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adheader.php" ?>

<div class="tab_admenu">
    <ul>
        <li><a href="/web/member/">회원가입</a></li>
        <li class="active"><a href="/web/influencer/">인플루언서</a></li>
        <li><a href="/web/recipe/">레시피</a></li>
        <li><a href="/web/notice/">공지사항</a></li>
    </ul>
</div>

<!-- 본문 컨테이너 -->
<div id="adcontainer">
    <div id="left_box">
       <div class="sub_box">
            <div class="cate_btit">사용자 관리</div>
            <div class="cate_tit active"><a href="/web/influencer/">사용자 관리</a></div>
            <div class="cate_tit"><a href="/web/influencer/tag.php">#태그관리</a></div>
        </div>
    </div>
    <div class="sub_sbox">
        <div class="sub_current">홈<i class="fa fa-angle-right" aria-hidden="true"></i>인플루언서<i class="fa fa-angle-right" aria-hidden="true"></i>사용자 관리</div>
        <h10>사용자 관리</h10>
    </div>
    <div id="right_box">
       <div class="list_search">
           <div class="list_top">
               <div class="search_ad">
                   <ul class="search_rbtn">
                     <li>
                         <div class="cate_ga ml_10">
                           <select id="MemberSearch" name="MemberSearch" onchange="">
                                <option>전체</option>
                                <option>아이디</option>
                                <option>닉네임</option>
                                <option>이메일</option>
                                <option>휴대폰번호</option>
                            </select>
                       </div>
                     </li>
                      <li>
                        <input type="text" name="Keyword" value="" class="textbox2" placeholder="">
                        <input type="submit" value="검색" class="btn_type">
                      </li>
                   </ul>
                   <a href="/web/influencer/pop_influ.php" class="btn_white btn_type7 ml_10" onclick="window.open(this.href, '_blank', 'width=650, height=680'); return false;">메인관리</a>
                   <a href="/web/influencer/pop_influ2.php" class="btn_white btn_type7 ml_10" onclick="window.open(this.href, '_blank', 'width=650, height=680'); return false;">목록관리</a>
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
                            <th class="ga_id">아이디</th>
                            <th class="ga_nick">닉네임</th>
                            <th class="ga_email">이메일</th>
                            <th class="ga_phone">휴대폰번호</th>
                            <th class="ga_insta">인스타</th>
                            <th class="ga_market">마켓</th>
                            <th class="ga_click">조회수</th>
                            <th class="ga_favor">즐겨찾기</th>
                            <th class="ga_date">등록일</th>
                            <th class="ga_recommend">메인</th>
                            <th class="ga_recommend">목록</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php for($i=0; $i<20; $i++){ ?>
                       <!-- tr를 클릭하게되면 어디를 클릭해도 오른쪽 화면에 나타타게 해주세요 -->
                        <tr>
                            <td class="ga_num">1</td>
                            <td class="ga_id">zerokitchen</td>
                            <td class="ga_nick">요리하는고양이</td>
                            <td class="ga_email">zerokitchen@naver.com</td>
                            <td class="ga_phone">010.1234.5122</td>
                            <td class="ga_insta">-</td>
                            <!-- 인스타가 있을 경우 'O'로 표시되면 없을 경우에는 '-' 으로 표시해주세요 -->
                            <td class="ga_market">O</td>
                            <td class="ga_click">1,523</td>
                            <td class="ga_favor">2,145</td>
                            <td class="ga_date">21.10.21</td>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div>
                            <td class="ga_recommend"><div class="reco_img"><img src="/img/ico_reco.svg" class="ico_bullet8" alt="call"></div>
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
                    <a href="/web/influencer/" class="btn_white">취소</a>
                    <a href="/web/influencer/modify.php" class="btn_type" onClick="window.confirm('저장하시겠습니까?');">저장</a>
                </div>
            </div>
            <div class="table_line">
                <ul>
                   <li class="ad_line">
                        <div class="ad_table_tit">번호</div>
                        <div class="ad_num ad_table">1</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">아이디</div>
                        <div class="ad_id ad_table">zerokitchen</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">비밀번호</div>
                        <div class="ad_pic ad_table"><input type="password" name="UserPwd" value="" maxlength="20" placeholder="비밀번호" class="textbox" required=""></div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">닉네임</div>
                        <div class="ad_nick ad_table">제로키친</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">이메일</div>
                        <div class="ad_email ad_table">zerokitchen@naver.com</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">휴대폰번호</div>
                        <div class="ad_phone ad_table">010.5123.1234</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">인스타</div>
                        <div class="ad_insta ad_table"><a href="https://www.instagram.com/" target="_blank">https://www.instagram.com/<div class="ico_btn7">바로가기</div></a></div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">마켓</div>
                        <div class="ad_market ad_table"><a href="https://www.instagram.com/" target="_blank">https://www.instagram.com/<div class="ico_btn7">바로가기</div></a></div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">조회수</div>
                        <div class="ad_click ad_table">1,211</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">즐겨찾기</div>
                        <div class="ad_favor ad_table">2,233</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">등록일</div>
                        <div class="ad_date ad_table">21.10.21</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">채널소개</div>
                        <div class="ad_intro ad_table">반찬,간식 만드는 맛집<br>요리하는 고양이님의 레시피</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">채널태그</div>
                        <div class="ad_tag ad_table">
                            <select id="Tag1" name="Tag1" onchange="">
                                <option value="홈카페">홈카페</option>
                                <option value="손님초대">손님초대</option>
                                <option value="집밥">집밥</option>
                                <option value="다이어트">다이어트</option>
                                <option value="인기!핫!">인기!핫!</option>
                                <option value="제철요리">제철요리</option>
                                <option value="글로벌">글로벌</option>
                                <option value="이유식">이유식</option>
                                <option value="간편요리">간편요리</option>
                                <option value="면요리">면요리</option>
                                <option value="건강식">건강식</option>
                            </select>
                           <select id="Tag2" name="Tag2" onchange="">
                                <option value="홈카페">홈카페</option>
                                <option value="손님초대">손님초대</option>
                                <option value="집밥">집밥</option>
                                <option value="다이어트">다이어트</option>
                                <option value="인기!핫!">인기!핫!</option>
                                <option value="제철요리">제철요리</option>
                                <option value="글로벌">글로벌</option>
                                <option value="이유식">이유식</option>
                                <option value="간편요리">간편요리</option>
                                <option value="면요리">면요리</option>
                                <option value="건강식">건강식</option>
                            </select>
                            <select id="Tag3" name="Tag3" onchange="">
                                <option value="홈카페">홈카페</option>
                                <option value="손님초대">손님초대</option>
                                <option value="집밥">집밥</option>
                                <option value="다이어트">다이어트</option>
                                <option value="인기!핫!">인기!핫!</option>
                                <option value="제철요리">제철요리</option>
                                <option value="글로벌">글로벌</option>
                                <option value="이유식">이유식</option>
                                <option value="간편요리">간편요리</option>
                                <option value="면요리">면요리</option>
                                <option value="건강식">건강식</option>
                            </select>
                            <select id="Tag4" name="Tag4" onchange="">
                                <option value="홈카페">홈카페</option>
                                <option value="손님초대">손님초대</option>
                                <option value="집밥">집밥</option>
                                <option value="다이어트">다이어트</option>
                                <option value="인기!핫!">인기!핫!</option>
                                <option value="제철요리">제철요리</option>
                                <option value="글로벌">글로벌</option>
                                <option value="이유식">이유식</option>
                                <option value="간편요리">간편요리</option>
                                <option value="면요리">면요리</option>
                                <option value="건강식">건강식</option>
                            </select>
                        </div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">프로필보기</div>
                        <!-- 등록이 되어있을 경우 미리보기로 볼 수 있으며 미등록시 '-'으로 표시해주세요 -->
                        <div class="ad_intropic ad_table"><a href="/master/profile/web_pop.php" class="btn_type7" onclick="window.open(this.href, '_blank', 'width=540, height=800'); return false;">미리보기</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adfooter.php" ?>