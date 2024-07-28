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
            <form action="calender_process.php" method="post" onsubmit="return calender()">
                <input type="file" name="img" id="img" placeholder="사진"> <br>
                <input type="text" name="title" id="title" placeholder="제목"> <br>
                <input type="text" name="startDate" id="startDate" placeholder="시작일"> <br>
                <input type="text" name="finishDate" id="finishDate" placeholder="종료일"> <br>
                <select name="place" id="place">
                    <option value="신라">신라</option>
                    <option value="경복궁">경복궁</option>
                    <option value="창덕궁">창덕궁</option>
                </select> <br>
                <input type="text" name="sort" id="sort" placeholder="종류"> <br>
                <button type="submit">등록</button>
            </form>
        <?php } elseif ($id == 'guide1' || $id == 'guide2'){ ?>
        <!-- 해설자 계정 -->
        <?php } else { ?>
        <!-- 일반회원 계정 -->
        <?php } 
    ?>

    <script>
        function calender(){
            const img = document.getElementById('img').value;
            const title = document.getElementById('title').value;
            const startDate = document.getElementById('startDate').value;
            const finishDate = document.getElementById('finishDate').value;
            const place = document.getElementById('place').value;
            const sort = document.getElementById('sort').value;

            if (img === '' || title === '' || startDate === '' || finishDate === '' || place === '' || sort === ''){
                alert("모든 데이터를 입력해주세요.");
                return false;
            }
        }
    </script>
</body>
</html>