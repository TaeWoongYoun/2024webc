<h3>예약 영역</h3>
    <div class="course_area" style="display:flex; flex-wrap:wrap;">
        <?php
            $courseSql = "SELECT * FROM courses";
            $courseResult = mysqli_query($conn, $courseSql);
            while($courseRow = mysqli_fetch_array($courseResult)){
                $time = intval($courseRow['time']);
                $startTime = ($time - 1);
                $date = $courseRow['date'];
                $currentDate = date('Y-m-d');
                $isDisabled = ($courseRow['member'] >= 20 || $date <= $currentDate) ? 'disabled' : '';
                echo "
                <div class='course'>
                    <h3 style='text-align:center;'>{$courseRow['course']}</h3>
                    <p style='padding-left: 10px;'>코스 일정 : {$courseRow['date']}</p>
                    <p style='padding-left: 10px;'>시작 시간 : {$startTime}시</p>
                    <p style='padding-left: 10px;'>현재인원 : {$courseRow['member']}</p>
                    <button style='float:right;' class='reservation_btn' onclick='openModal()' {$isDisabled}>예약하기</button>
                </div>";
            }
        ?>
    </div>
    <div id="reservationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h5>예약하기</h5>
            <form action="reservation_process.php" method="post" onsubmit="return validateForm()">
                <input type="hidden" name="courseId" id="courseId" value="<?=$_GET['id']?>">
                <input type="text" name="name" id="name" placeholder="이름"> <br>
                <input type="text" name="phone" id="phone" placeholder="전화번호"> <br>
                <input type="email" name="email" id="email" placeholder="이메일"> <br>
                <input type="number" name="member" id="member" min='1' max='5' placeholder="참가 인원"> <br>
                <button type="submit">예약하기</button>
            </form>
        </div>
    </div>