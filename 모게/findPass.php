<?php
    $userid = $_POST['userid'];
    $userph = $_POST['userph'];
    // print $userid.$userph;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT m_idx FROM tb_member WHERE m_userid='$userid' AND m_userph='$userph';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        print '있음';
    }else{
        print '없음';
    }
    
    // print_r(mysqli_fetch_array($result));
    mysqli_close($conn);
?>