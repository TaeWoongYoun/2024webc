<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>굿즈등록 영역</h3>
    <form action="goods_process.php" method="post" onsubmit="return goods()">    
        <input type="file" name="img" id="img"> <br>
        <input type="text" name="name" id="name" placeholder="굿즈명"> <br>
        <input type="text" name="price" id="price" placeholder="가격"> <br>
        <input type="text" name="description" id="description" placeholder="상세 설명"> <br>
        <input type="submit" value="굿즈 등록">
    </form>

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