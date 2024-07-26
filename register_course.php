<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>

<?php
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $check_sql = "SELECT * FROM courses WHERE course = '$course' AND date = '$date' AND time = '$time'";
    $result = mysqli_query($conn, $check_sql);

    if(mysqli_num_rows($result) > 0){
        echo "<script>
                alert('중복된 날짜입니다');
                history.back();    
            </script>";
    } else {
        $sql = "INSERT INTO courses (course, date, time) VALUES ('$course', '$date', '$time')";
        mysqli_query($conn, $sql);
        echo "<script>
                alert('코스가 등록되었습니다');
                location.href = 'reservation.php?id=admin';    
            </script>";
    }
?>