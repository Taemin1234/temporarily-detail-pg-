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
            <div class="cate_tit"><a href="/web/influencer/">사용자 관리</a></div>
            <div class="cate_tit active"><a href="/web/influencer/tag.php">#태그관리</a></div>
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
                   <ul class="search_rbtn">
                     <li>
                         <div class="cate_ga ml_10">
                           <select id="MemberSearch" name="MemberSearch" onchange="">
                                <option>전체</option>
                                <option>#1</option>
                                <option>#2</option>
                                <option>#3</option>
                                <option>#4</option>
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
            <div class="table_info mini_box">
                <table>
                    <thead>
                        <tr>
                            <th class="ga_num2">번호</th>
                            <th class="ga_tag">구분</th>
                            <th class="ga_list2">목록</th>
                            <th class="ga_writer">등록자</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php for($i=0; $i<10; $i++){ ?>
                       <!-- tr를 클릭하게되면 어디를 클릭해도 오른쪽 화면에 나타타게 해주세요 -->
                        <tr>
                            <td class="ga_num2">1</td>
                            <td class="ga_tag">#2</td>
                            <td class="ga_list2">식품관련학과 전공</td>
                            <td class="ga_writer">관리자</td>
                        </tr>
                        <?php } ?>
                        <?php for($i=0; $i<10; $i++){ ?>
                       <!-- tr를 클릭하게되면 어디를 클릭해도 오른쪽 화면에 나타타게 해주세요 -->
                        <tr>
                            <td class="ga_num2">1</td>
                            <td class="ga_tag">#3</td>
                            <td class="ga_list2">제철요리</td>
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
                    <div class="red btn_white" onClick="window.confirm('삭제하시겠습니까?');">삭제</div>
                    <a href="/web/influencer/tag_modify.php" class="btn_white">수정</a>
                </div>
                <div class="btn_box">
                    <div class="btn_type" id="modal-open"><img src="/img/ico_bplus.svg">추가</div>
                </div>
                <div class="popup-wrap" id="popup">
                    <div class="popup">
                      <div class="popup-body">
                        <div class="table_line">
                            <ul>
                               <li class="ad_line">
                                    <div class="ad_table_tit">구분</div>
                                    <div class="ad_id ad_table">
                                       <select id="InfluencerNum" name="InfluencerNum" onchange="">
                                            <option>#1</option>
                                            <option>#2</option>
                                            <option>#3</option>
                                            <option>#4</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="ad_line">
                                    <div class="ad_table_tit">목록</div>
                                    <div class="ad_id ad_table">
                                        <input type="text" name="InfluencerTag" value="" class="textbox2" placeholder="">
                                    </div>
                                </li>
                            </ul>
                        </div>
                      </div>
                      <div class="popup-foot">
                        <span class="pop-btn confirm" id="confirm" onClick="window.confirm('추가하시겠습니까?');">추가</span>
                        <span class="pop-btn close" id="close">취소</span>
                      </div>
                    </div>
                   </div>
                   <script>
                        $(function(){
                          $("#modal-open").click(function(){  $("#popup").css('display','flex').hide().fadeIn();
                          });
                          $("#close").click(function(){
                              modalClose();
                          });
                          function modalClose(){
                              $("#popup").fadeOut();
                          }
                        });
                   </script>
            </div>
            <div class="table_line">
                <ul>
                   <li class="ad_line">
                        <div class="ad_table_tit">번호</div>
                        <div class="ad_num ad_table">1</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">구분</div>
                        <div class="ad_tag ad_table">#2</div>
                    </li>
                    <li class="ad_line">
                        <div class="ad_table_tit">목록</div>
                        <div class="ad_two ad_table">
                            식품관련학과 전공
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