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
        if ($id == 'admin'){
            echo "어 나 관리자 ㅋㅋ";
        } elseif ($id == 'guide1' || $id == 'guide2'){
            echo "어 그래그래 나 해설가";
        } else {
            echo "일반 회원";
        } 
    ?>

    <script src="index.js"></script>
</body>
</html>