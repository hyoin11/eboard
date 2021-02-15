<?php
    session_start();
    $userid = $_SESSION['userid'];
    $b_idx = $_GET['b_idx'];

    // print $userid.' '.$b_idx;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT b_recommend FROM tb_board WHERE b_idx=$b_idx;";
    $rec = mysqli_query($conn, $sql);
    $rec_list = mysqli_fetch_array($rec);

    $rec_user = array();
    $rec_user = explode(',', $rec_list[0]);
    for($i=0; $i<count($rec_user); $i++){
        if($rec_user[$i] == $userid){
            // print '있다';
            print '<script>alert("이미 추천하셨습니다.");history.back();</script>';
            exit;
        }
    }

    $rec_list2;
    if($rec_list[0] == '' || $rec_list[0] == null){
        $rec_list2 = $userid;
    }else{
        $rec_list2 = implode(',', $rec_user).','.$userid;
    }

    $sql = "UPDATE tb_board SET b_recommend = '$rec_list2' WHERE b_idx = $b_idx;";
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        print '<script>alert("추천하였습니다.");location.href="./read.php?b_idx='.$b_idx.'";</script>';
    }

    mysqli_close($conn);
?>