<h3>해설신청 영역</h3>
    <div style="display: flex; flex-wrap:wrap;">
        <?php
        $courseSql = "SELECT * FROM courses";
        $courseResult = mysqli_query($conn, $courseSql);
        while($courseRow = mysqli_fetch_array($courseResult)){
            $time = intval($courseRow['time']);
            $startTime = ($time - 1);
            echo "
            <div class='course'>
                <h3 style='text-align:center;'>{$courseRow['course']}</h3>
                <p style='padding-left: 10px;'>코스 일정 : {$courseRow['date']}</p>
                <p style='padding-left: 10px;'>시작 시간 : {$startTime}시</p>
                <p style='padding-left: 10px;'>현재인원 : {$courseRow['member']}</p>
                <button style='float:right;' class='guide_btn'>해설신청</button>
            </div>";
        }
        ?>
    </div>