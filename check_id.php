<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>

<?php
    $id = $_POST['userid'];
    $sql = "SELECT * FROM user WHERE userid = '$id'";
    $result = mysqli_query($conn, $sql);
    echo mysqli_num_rows($result);
?>