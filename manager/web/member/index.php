<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adheader.php" ?>

<div class="tab_admenu">
    <ul>
        <li class="active"><a href="/web/member/">회원가입</a></li>
        <li><a href="/web/influencer/">인플루언서</a></li>
        <li><a href="/web/recipe/">레시피</a></li>
        <li><a href="/web/notice/">공지사항</a></li>
    </ul>
</div>

<!-- 본문 컨테이너 -->
<div id="adcontainer">
    <div id="left_box">
       <div class="sub_box">
            <div class="cate_btit">회원관리</div>
            <div class="cate_tit active"><a href="/web/member/">회원관리</a></div>
        </div>
    </div>
    <div class="sub_sbox">
        <div class="sub_current">홈<i class="fa fa-angle-right" aria-hidden="true"></i>회원가입<i class="fa fa-angle-right" aria-hidden="true"></i>회원관리</div>
        <h10>회원관리</h10>
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
                                <option>이름</option>
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
                            <th class="ga_nick">닉네임</th>
                            <th class="ga_email">이메일</th>
                            <th class="ga_phone">휴대폰번호</th>
                            <th class="ga_link">연결계정</th>
                            <th class="ga_date">가입일자</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php for($i=0; $i<20; $i++){ ?>
                       <!-- tr를 클릭하게되면 어디를 클릭해도 오른쪽 화면에 나타타게 해주세요 -->
                        <tr>
                            <td class="ga_num">1</td>
                            <td class="ga_nick">제로키친</td>
                            <td class="ga_email">zerokitchen@naver.com</td>
                            <td class="ga_phone">010.1234.5122</td>
                            <!-- 카카오이거나 아닐 경우 '-' 이렇게 표시해주세요 -->
                            <td class="ga_link">카카오</td>
                            <td class="ga_date">21.10.21</td>
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
                    <a href="/web/member/modify.php" class="btn_white">수정</a>
                </div>
            </div>
            <div class="table_line">
                <ul>
                   <li class="ad_line">
                        <div class="ad_table_tit">번호</div>
                        <div class="ad_num ad_table">1</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">이름</div>
                        <div class="ad_name ad_table">홍승희</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">사진등록</div>
                        <!-- 사진이 등록되어있고 안되어있고의 여부만 보여지면됩니다. 등록/미등록으로 표시되어있으면 됩니다. -->
                        <div class="ad_pic ad_table">등록</div>
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
                        <div class="ad_table_tit">연결계정</div>
                        <div class="ad_link ad_table">카카오</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">가입일자</div>
                        <div class="ad_date ad_table">21.10.21</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adfooter.php" ?>