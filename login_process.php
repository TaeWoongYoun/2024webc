<?php $conn = mysqli_connect('localhost', 'root', '', 'Gyeonggi')?>

<?php
    $id = mysqli_real_escape_string($conn, $_POST['userid']);
    $pw = mysqli_real_escape_string($conn, $_POST['userpw']);

    if (empty($id) || empty($pw)){
        echo "
        <script>
            alert('아이디와 비밀번호를 입력해주세요.')
            location.href = 'login.php'
        </script>";
    } elseif ($id == 'admin' && $pw == '1234'){
        $_SESSION['userid'] = $id;
        $_SESSION['userpw'] = $pw;
        echo "
        <script>
            alert('관리자로 로그인 되었습니다..')
            location.href = 'index.php?id=admin'
        </script>";
    } elseif ($id == 'guide1' && $pw == '1234'){
        $_SESSION['userid'] = $id;
        $_SESSION['userpw'] = $pw;
        echo "
        <script>
            alert('해설가로 로그인 되었습니다.')
            location.href = 'index.php?id=guide1'
        </script>";
    } elseif ($id == 'guide2' && $pw == '1234'){
        $_SESSION['userid'] = $id;
        $_SESSION['userpw'] = $pw;
        echo "
        <script>
            alert('해설가로 로그인 되었습니다.')
            location.href = 'index.php?id=guide2'
        </script>";
    } else {
        $sql = "SELECT * FROM user WHERE userid = '$id' AND userpw = '$pw'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $_SESSION['userid'] == $id;
            $_SESSION['userpw'] == $pw;
            echo "
            <script>
                alert('일반회원으로 로그인 되었습니다.')
                location.href = 'index.php?id=$id'
            </script>";
        } else {
            echo "
            <script>
                alert('회원가입을 먼저 진행해주세요.')
                location.href = 'join.php'
            </script>";
        }
    }
?>

