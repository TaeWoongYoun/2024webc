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
            <?= require("./reservation/reservation_admin.php")?>

        <?php } elseif ($id == 'guide1' || $id == 'guide2'){ ?>
        <!-- 해설자 계정 -->
            <p>안녕 나 해설자</p>
        <?php } else { ?>
        <!-- 일반회원 계정 -->
            <?= require("./reservation/reservation_user.php")?>
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
            var modal = document.getElementById("reservationModal");
            var courseIdInput = document.getElementById("courseId");
            courseIdInput.value = courseId;
            modal.style.display = "block";
        }

        function validateForm() {
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            var member = document.getElementById("member").value;

            if (name === "" || phone === "" || email === "" || member === "") {
                alert("모든 필드를 입력해주세요.");
                return false;
            }
        }
    </script>
</body>
</html>