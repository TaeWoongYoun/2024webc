<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>

<?php
    $img = mysqli_real_escape_string($conn, $_POST['img']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $sql = "INSERT INTO goods (img, name, price, description) VALUES ('$img', '$name', '$price', '$description')";
    mysqli_query($conn, $sql);
?>

<script>
    alert("굿즈 등록 완료")
    location.href = 'goods.php?id=admin'
</script>