<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>예약하기 페이지</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>예약하기 페이지</h1>
    <?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM user WHERE userid = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($id == 'admin'){ ?>
        <!-- 관리자 계정 -->
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

        <?php } elseif ($id == 'guide1' || $id == 'guide2'){ ?>
        <!-- 해설자 계정 -->
            <p>안녕 나 해설자</p>
        <?php } else { ?>
        <!-- 일반회원 계정 -->
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
                            <button style='float:right;' onclick='openModal({$courseRow['id']})' {$isDisabled}>예약하기</button>
                        </div>";
                    }
                ?>
            </div>
            <div class="reservation_modal">
                <h5>예약하기</h5>
                <form action="reservation.php" method="post">
                    <input type="text" name="name" id="name" placeholder="이름"> <br>
                    <input type="text" name="phone" id="phone" placeholder="전화번호"> <br>
                    <input type="email" name="email" id="email" placeholder="이메일"> <br>
                    <input type="number" name="member" id="member" min='1' max='5' placeholder="참가 인원"> <br>
                    <button type="submit">예약하기</button>
                </form>
            </div>
        <?php } 
    ?>

    <script>
        function validateForm() {
            var course = document.getElementById("course").value;
            var date = document.getElementById("date").value;
            var time = document.getElementById("time").value;

            if (course === "" || date === "" || time === "") {
                alert("코스와 날짜를 선택해주세요.");
                return false;
            }
        }

        function openModal(courseId) {
            var modal = document.getElementById("myModal");
            document.getElementById("courseId").value = courseId;
            modal.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        function validateForm() {
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            var participants = document.getElementById("participants").value;

            if (name === "" || phone === "" || email === "" || participants === "") {
                alert("모든 필드를 입력해주세요.");
                return false;
            }
        }
    </script>
</body>
</html>