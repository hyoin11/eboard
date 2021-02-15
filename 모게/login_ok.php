<?php
    session_start();
    
    $userid = $_POST['userid'];
    $userpw = $_POST['userpw'];

    // print $userid.' '.$userpw;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT m_userid FROM tb_member WHERE m_userid='$userid' AND m_pass=PASSWORD('$userpw');";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        // print '있음';
        $_SESSION['is_login'] = true;
        $_SESSION['userid'] = $userid;
        header('location: ./board.php');
        exit;
    }else{
        // print '없음';
        print '<script>alert("아이디 또는 비밀번호를 확인해주세요.");history.back();</script>';
    }

    mysqli_close($conn);
?>