<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM user WHERE userid = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($id == 'admin'){ ?>
        <!-- 관리자 계정 -->
        <h3>굿즈등록 영역</h3>
        <form action="goods_process.php" method="post" onsubmit="return goods()">    
            <input type="file" name="img" id="img"> <br>
            <input type="text" name="name" id="name" placeholder="굿즈명"> <br>
            <input type="text" name="price" id="price" placeholder="가격"> <br>
            <input type="text" name="description" id="description" placeholder="상세 설명"> <br>
            <input type="submit" value="굿즈 등록">
        </form>
        <?php } elseif ($id == 'guide1' || $id == 'guide2'){ ?>
        <!-- 해설자 계정 -->
            <?= require("./reservation/reservation_guide.php")?>
        <?php } else { ?>
        <!-- 일반회원 계정 -->
            <h3>상품구매 영역</h3>
            <button >상품 리스트</button>
            <button>장바구니</button>
            <button>할인 쿠폰</button>
        <?php } ?>

    <script>
        function goods(){
            const img = document.getElementById('img').value;
            const name = document.getElementById('name').value;
            const price = document.getElementById('price').value;
            const description = document.getElementById('description').value;

            if (img == '' || name == '' || price == '' || description == ''){
                alert("양식을 모두 입력해주세요.")
                return false;
            }
        }
    </script>
</body>
</html>