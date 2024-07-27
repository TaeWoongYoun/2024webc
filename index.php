<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>전국기능경기대회 C모듈</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>C모듈</h1>
    <?php
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "SELECT * FROM user WHERE userid = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_array($result)){
                echo "
                    <button>{$row['name']}</button>
                    <a href='index.php'><button>로그아웃</button></a>
                    <button><a href='reservation.php?id=$id'>예약하기</a></button>
                    <button><a href='goods.php?id=$id'>굿즈SHOP</a></button>";
            }
        } else {
            echo "
            <a href='login.php'><button class='login_btn'>로그인</button></a>
            <a href='join.php'><button class='join_btn'>회원가입</button></a>";
        }
    ?>

    <script src="index.js"></script>
</body>
</html>