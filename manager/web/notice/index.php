<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adheader.php" ?>

<div class="tab_admenu">
    <ul>
        <li><a href="/web/member/">회원가입</a></li>
        <li><a href="/web/influencer/">인플루언서</a></li>
        <li><a href="/web/recipe/">레시피</a></li>
        <li class="active"><a href="/web/notice/">공지사항</a></li>
    </ul>
</div>

<!-- 본문 컨테이너 -->
<div id="adcontainer">
    <div id="left_box">
       <div class="sub_box">
            <div class="cate_btit">공지사항</div>
            <div class="cate_tit active"><a href="/web/notice/">공지사항</a></div>
        </div>
    </div>
    <div class="sub_sbox">
        <div class="sub_current">홈<i class="fa fa-angle-right" aria-hidden="true"></i>공지사항<i class="fa fa-angle-right" aria-hidden="true"></i>공지사항</div>
        <h10>공지사항</h10>
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
                                <option>제목</option>
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
                            <th class="ga_title">제목</th>
                            <th class="ga_writer">작성자</th>
                            <th class="ga_click">조회수</th>
                            <th class="ga_date">등록일</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php for($i=0; $i<20; $i++){ ?>
                       <!-- tr를 클릭하게되면 어디를 클릭해도 오른쪽 화면에 나타타게 해주세요 -->
                        <tr>
                            <td class="ga_num">1</td>
                            <td class="ga_title txt_left">더 좋은 서비스 제공의 위해 제로키친 이용 약관과 개인정보처리방침이 변경될 예정이에요.</td>
                            <td class="ga_writer">관리자</td>
                            <td class="ga_click">13,522</td>
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
                    <a href="/web/notice/modify.php" class="btn_white">수정</a>
                </div>
                <div class="btn_box">
                    <a href="/web/notice/add.php" class="btn_type"><img src="/img/ico_bplus.svg">등록</a>
                </div>
            </div>
            <div class="table_line">
                <ul>
                   <li class="ad_line">
                        <div class="ad_table_tit">번호</div>
                        <div class="ad_num ad_table">1</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">작성자</div>
                        <div class="ad_writer ad_table">관리자</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">조회수</div>
                        <div class="ad_click ad_table">1,211</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">등록일</div>
                        <div class="ad_date ad_table">21.10.21</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">제목</div>
                        <div class="ad_id ad_table">각 게시판의 공지사항을 참고해주세요.</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">내용</div>
                        <div class="ad_txt ad_table">
                            <a href="/mypage/pop_notice.php" class="ico_btn7" onclick="window.open(this.href, '_blank', 'width=540, height=800'); return false;">내용보기</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<? include $_SERVER["DOCUMENT_ROOT"]."/inc/adfooter.php" ?>