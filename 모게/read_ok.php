<?php
    session_start();
    $userid = $_SESSION['userid'];
    $comment = nl2br($_POST['comment_text']);
    $b_idx = $_GET['b_idx'];
    // print $userid.' '.$comment.' '.$b_idx;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT m_idx FROM tb_member WHERE m_userid='$userid';";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
    $m_idx = $row['m_idx'];

    $sql = "INSERT INTO tb_reply (r_comment, r_midx, r_bidx) VALUES('$comment', $m_idx, $b_idx);";
    // print $sql;
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        print '<script>alert("등록되었습니다.");location.href="./read.php?b_idx='.$b_idx.'";</script>';
    }else{
        print '<script>alert("등록에 실패하였습니다.");history.back();</script>';
    }

    mysqli_close($conn);
?>