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
    <h1>회원가입</h1>
    <form action="join_process.php" method="post" onsubmit="return ck(this)">
        <input type="text" name="userid" id="userid" placeholder="아이디"><button type="button" id="check_id">중복확인</button><br>
        <input type="hidden" id="idok" value="0">
        <input type="text" name="name" id="name" placeholder="이름"><br>
        <input type="password" name="userpw" id="userpw" placeholder="비밀번호"><br>
        <input type="submit" value="회원가입" id="join_submit">
    </form>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="index.js"></script>
</body>
</html>