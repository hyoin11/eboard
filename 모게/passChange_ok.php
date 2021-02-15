<?php
    $userid = $_POST['passChangeId'];
    $userpw = $_POST['changePass'];
    $userph = $_POST['passChangePh'];
    // print $userid."<br>".$userpw."<br>".$userph;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "UPDATE tb_member SET m_pass=PASSWORD('$userpw') WHERE m_userid='$userid' AND m_userph='$userph';
    ";
    // // print $sql;
    $result = mysqli_query($conn, $sql);
    // print_r($result);
    if($result > 0){
        print '<script>alert("비밀번호를 재설정하였습니다.");location.href="./login.php";</script>';
    }else{
        print '<script>alert("비밀번호 재설정에 실패하였습니다.관리자에게 문의하세요.");history.back();</script>';
    }

    // mysqli_close($conn);
?>