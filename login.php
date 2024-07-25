<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>로그인</h1>
    <form action="login_process.php" method="post">
        <input type="text" name="userid" id="userid" placeholder="아이디"><br>
        <input type="password" name="userpw" id="userpw" placeholder="비밀번호"><br>
        <button type="button" class="login_modal_open">로그인</button>    
        <div class="capcha">
            <img src="image/1.jpg" alt="">
            <input type="submit" value="확인" id="login_submit">
        </div>
    </form>
    <script>
        document.querySelector('.login_modal_open').addEventListener('click', function(){
            document.querySelector('.capcha').style.display = 'block';
        })
    </script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</body>
</html>