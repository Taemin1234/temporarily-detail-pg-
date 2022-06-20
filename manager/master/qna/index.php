<? include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php" ?>
<style>
    header {
        display: none;
    }
    body {
        padding-bottom: 0;
    }
</style>

<!-- 본문 컨테이너 -->
<div id="container"> 
 
    <!-- 이전페이지 -->
    <a href="#" onclick="goBack()" class="back_sub2"><img src="/img/ico_arrow.svg"></a>
   
   <div class="sub_txt in_txt">Q&A관리</div>
    
    <!-- 아래로 내리면 계속 뜨도록 해주세요 -->
    <div class="qna_box">
     <!-- 등록된 알림이 없을 경우 보이게 해주세요 -->
      <!--<div class="my_nolist">
          <img src="/img/ico_noimg.svg">
          <p>등록된 알림이 없습니다.</p>
      </div>-->
       <!-- class에 acitve가 들어가는 것들은 알람이 왔는데 확인하기전의 상태를 표시해둔 것입니다 -->
        <div class="qna_li active">
            <div class="qna_libox">
                <div class="qna_pic"><img src="/img/main_recipe5.jpg" alt="음식사진"></div>
                <a class="qna_alink" href="/recipe/detail.php">
                    <div class="qna_content">
                        닭가슴살 바게트 쉽게 만들기<p>21.10.07</p>
                    </div>
                </a>
                <div class="qna_del"><img src="/img/ico_bclose.svg"></div>
            </div>
            <div class="qna_prebox">
                <div class="menu_arrow"><img src="/img/ico_arrow.svg"></div>
                <div class="qna_preview">
                  <!-- 질문과 대답이 보여지는 공간이며 Q. 와 A. 부분은 고정입니다 -->
                   <div class="pre_q">Q. 불고기 조리하는 팬은 어디껀가요?</div>
                   <div class="pre_a">
                       A. <input type="text" name="Answer" value="" maxlength="100" placeholder="답변을 입력해주세요" class="textbox" autofocus="" required="">
                       <div class="ico_confirm">등록</div>
                    </div>
               </div>
            </div>
        </div>
        <div class="qna_li active">
            <div class="qna_libox">
                <div class="qna_pic"><img src="/img/main_recipe3.jpg" alt="음식사진"></div>
                <a class="qna_alink" href="/recipe/detail.php">
                    <div class="qna_content">
                        냉모밀 조리하기<p>21.10.07</p>
                    </div>
                </a>
                <div class="qna_del"><img src="/img/ico_bclose.svg"></div>
            </div>
            <div class="qna_prebox">
                <div class="menu_arrow"><img src="/img/ico_arrow.svg"></div>
                <div class="qna_preview">
                  <!-- 질문과 대답이 보여지는 공간이며 Q. 와 A. 부분은 고정입니다 -->
                   <div class="pre_q">Q. 불고기 조리하는 팬은 어디껀가요?</div>
                   <div class="pre_a">
                       A. <input type="text" name="Answer" value="" maxlength="100" placeholder="답변을 입력해주세요" class="textbox" autofocus="" required="">
                       <div class="ico_confirm">등록</div>
                    </div>
               </div>
            </div>
        </div>
        <div class="qna_li active">
            <div class="qna_libox">
                <div class="qna_pic"><img src="/img/main_recipe.jpg" alt="음식사진"></div>
                <a class="qna_alink" href="/recipe/detail.php">
                    <div class="qna_content">
                        된장찌개 얼큰하게 끓이기<p>21.10.06</p>
                    </div>
                </a>
                <div class="qna_del"><img src="/img/ico_bclose.svg"></div>
            </div>
            <div class="qna_prebox">
                <div class="menu_arrow"><img src="/img/ico_arrow.svg"></div>
                <div class="qna_preview">
                  <!-- 질문과 대답이 보여지는 공간이며 Q. 와 A. 부분은 고정입니다 -->
                   <div class="pre_q">Q. 불고기 조리하는 팬은 어디껀가요?</div>
                   <div class="pre_a">
                       A. <input type="text" name="Answer" value="" maxlength="100" placeholder="답변을 입력해주세요" class="textbox" autofocus="" required="">
                       <div class="ico_confirm">등록</div>
                    </div>
               </div>
            </div>
        </div>
        <div class="qna_li">
            <div class="qna_libox">
                <div class="qna_pic"><img src="/img/main_recipe2.jpg" alt="음식사진"></div>
                <a class="qna_alink" href="/recipe/detail.php">
                    <div class="qna_content">
                        묵은지로 만든 김치찌개<p>21.10.03</p>
                    </div>
                </a>
                <div class="qna_del"><img src="/img/ico_bclose.svg"></div>
            </div>
            <div class="qna_prebox">
                <div class="menu_arrow"><img src="/img/ico_arrow.svg"></div>
                <div class="qna_preview">
                  <!-- 질문과 대답이 보여지는 공간이며 Q. 와 A. 부분은 고정입니다 -->
                   <div class="pre_q">Q. 불고기 조리하는 팬은 어디껀가요?</div>
                   <div class="pre_a">
                       A. <input type="text" name="Answer" value="" maxlength="100" placeholder="답변을 입력해주세요" class="textbox" autofocus="" required="">
                       <div class="ico_confirm">등록</div>
                    </div>
               </div>
            </div>
        </div>
        <div class="qna_li">
            <div class="qna_libox">
                <div class="qna_pic"><img src="/img/main_recipe7.jpg" alt="음식사진"></div>
                <a class="qna_alink" href="/recipe/detail.php">
                    <div class="qna_content">
                        꾸덕한 파스타 쉽게 만들기<p>21.10.01</p>
                    </div>
                </a>
                <div class="qna_del"><img src="/img/ico_bclose.svg"></div>
            </div>
            <div class="qna_prebox">
                <div class="menu_arrow"><img src="/img/ico_arrow.svg"></div>
                <div class="qna_preview">
                  <!-- 질문과 대답이 보여지는 공간이며 Q. 와 A. 부분은 고정입니다 -->
                   <div class="pre_q">Q. 불고기 조리하는 팬은 어디껀가요?</div>
                   <div class="pre_a">
                       A. <input type="text" name="Answer" value="" maxlength="100" placeholder="답변을 입력해주세요" class="textbox" autofocus="" required="">
                       <div class="ico_confirm">등록</div>
                    </div>
               </div>
            </div>
        </div>
    </div>
    <!-- 알람 펼치기 -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        var faqQuestion = document.getElementsByClassName('menu_arrow');
    var faqAnswer = document.getElementsByClassName('qna_preview');

    for (var i = 0; i < faqQuestion.length; i++) {
        faqQuestion[i].addEventListener('click', toggleItem, false);
    }

    function toggleItem() {
        var flag = this.classList.contains("open");
        for (var i = 0; i < faqAnswer.length; i++) {
            faqQuestion[i].classList.remove('open');
            faqAnswer[i].style.display = "none";
        }
        if(!flag) {
            this.classList.add("open");
            this.nextElementSibling.style.display = "block";     }
    }
    </script>

  
</div>