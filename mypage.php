<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>마이페이지</h1>
    <?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM user WHERE userid = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($id == 'admin'){ ?>
        <!-- 관리자 계정 -->
            <?= require("./reservation/reservation_admin.php")?>

        <?php } elseif ($id == 'guide1' || $id == 'guide2'){ ?>
        <!-- 해설자 계정 -->
            <h3>해설신청 내역</h3>
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
                        <p style='padding-left: 10px;'>날짜 : {$courseRow['date']}</p>
                        <p style='padding-left: 10px;'>시작 시간 : {$startTime}시</p>
                        <p style='padding-left: 10px;'>현재인원 : {$courseRow['member']}</p>
                        <button style='float:right;' class='guide_btn'>대기중</button>
                    </div>";
                }
                ?>
            </div>
        <?php } else { ?>
        <!-- 일반회원 계정 -->
            <?= require("./reservation/reservation_user.php")?>
        <?php } 
    ?>
</body>
</html>