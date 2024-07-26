<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>

<?php
    echo $id = mysqli_real_escape_string($conn, $_POST['courseId']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $member = mysqli_real_escape_string($conn, $_POST['member']);
    $sql = "INSERT INTO reservation (name, phone, email, member) VALUES ('$name', '$phone', '$email', '$member')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        echo "
            <script>
                alert('예약이 완료되었습니다.');
                location.href = reservation.php?id=$id;
            </script>
            ";
        }
?>