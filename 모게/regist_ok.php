<?php
    $userid = $_POST['userid'];
    $userpw = $_POST['userpw'];
    $userph = $_POST['userph'];

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "INSERT INTO tb_member (m_userid, m_pass, m_userph) VALUES('$userid', PASSWORD('$userpw'), '$userph');";
    // print $sql;
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        print '<script>alert("가입이 완료되었습니다.");location.href="./login.php";</script>';
    }else{
        print '<script>alert("가입에 실패하였습니다.관리자에게 문의하세요.");history.back();</script>';
    }

    mysqli_close($conn);
?>