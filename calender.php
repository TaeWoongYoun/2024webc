<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문화달력페이지</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM user WHERE userid = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($id == 'admin'){ ?>
        <!-- 관리자 계정 -->
        <h1>문화달력 등록 영역</h1>
            <form action="calender_process.php" method="post">
                <input type="file" name="img" id="img"> <br>
                <input type="text" name="title" id="title"> <br>
                <input type="text" name="startDate" id="startDate"> <br>
                <input type="text" name="finishDate" id="finishDate"> <br>
                <input type="text" name="place" id="place"> <br>
                <input type="text" name="sort" id="sort"> <br>
            </form>
        <?php } elseif ($id == 'guide1' || $id == 'guide2'){ ?>
        <!-- 해설자 계정 -->
        <?php } else { ?>
        <!-- 일반회원 계정 -->
        <?php } 
    ?>


</body>
</html>