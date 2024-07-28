<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>

<?php
    $img = mysqli_real_escape_string($conn, $_POST['img']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $finishDate = mysqli_real_escape_string($conn, $_POST['finishDate']);
    $place = mysqli_real_escape_string($conn, $_POST['place']);
    $sort = mysqli_real_escape_string($conn, $_POST['sort']);
    $sql = "INSERT INTO calender (img, title, startdate, finishdate, place, sort) VALUES ('$img', '$title', '$startDate', '$finishDate', '$place', '$sort')";
    mysqli_query($conn, $sql);
?>

<script>
    alert("등록되었습니다.");
    location.href = 'calender.php?id=admin';
</script>