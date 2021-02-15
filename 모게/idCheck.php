<?php
    $userid = $_POST['userid'];

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT m_idx FROM tb_member WHERE m_userid='$userid';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_fetch_array($result) > 0){
        print 'false';
    }else{
        print 'true';
    }
    // print_r(mysqli_fetch_array($result));
?>