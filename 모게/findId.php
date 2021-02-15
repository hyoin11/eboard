<?php
    $userph = $_POST['userph'];
    // print $userph;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT m_userid FROM tb_member WHERE m_userph='$userph';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        print mysqli_fetch_array($result)['m_userid'];
    }else{
        print '없음';
    }
    
    // print_r(mysqli_fetch_array($result));
    mysqli_close($conn);
?>