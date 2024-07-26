<h3>코스 등록영역</h3>
    <form method="post" action="register_course.php" onsubmit="return validateForm()">
        <div>
            <label for="course">코스 선택:</label>
            <select id="course" name="course">
                <option value="">--코스 선택--</option>
                <option value="창덕궁 달빛기행">창덕궁 달빛기행</option>
                <option value="경복궁 달빛기행">경복궁 달빛기행</option>
                <option value="신라 달빛기행">신라 달빛기행</option>
            </select>
        </div>
        <div>
            <label for="date">날짜 선택:</label>
            <input type="date" id="date" name="date">
        </div>
        <div>
            <label for="time">시작 시간:</label>
            <select id="time" name="time">
                <option value="">--시간 선택--</option>
                <?php for ($op = 0; $op < 24; $op++) { ?>
                    <option value="<?php echo $op; ?>"><?php echo $op; ?>시</option>
                <?php } ?>
            </select>
        </div>
        <button type="submit">등록</button>
    </form>
    <h1>코스 목록</h1>
    <div class="course_area" style="display: flex; flex-wrap: wrap;">
    <?php
        $courseSql = "SELECT * FROM courses";
        $courseResult = mysqli_query($conn, $courseSql);
        while ($courseRow = mysqli_fetch_array($courseResult)){
            $startTime = intval($courseRow['time']);
            $startTimeFormatted = sprintf("%02d", $startTime);  // 시작 시간을 2자리 숫자로 포맷팅
            $endTimeFormatted = sprintf("%02d", $startTime + 1);  // 종료 시간을 2자리 숫자로 포맷팅
            $expectedTime = ($startTime - 1) . "시 ~ " . ($startTime + 1) . "시";
            echo "
                <div class='course'>
                    <h3 style='text-align:center;'>{$courseRow['course']}</h3>
                    <p style='padding-left: 10px;'>코스 일정 : {$courseRow['date']}</p>
                    <p style='padding-left: 10px;'>진행 시간 : $expectedTime</p>
                    <p style='padding-left: 10px;'>현재인원 : {$courseRow['member']}</p>
                </div>";
        }
    ?>
    </div>