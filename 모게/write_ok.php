<?php
    session_start();
    $userid = $_SESSION['userid'];
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    // print $userid.' '.$title.' '.$content;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT m_idx FROM tb_member WHERE m_userid='$userid';";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
    $m_idx = $row['m_idx'];

    $sql = "INSERT INTO tb_board (b_title, b_content, b_midx) VALUES('$title', '$content', $m_idx);";
    // print $sql;
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        print '<script>alert("등록되었습니다.");location.href="./board.php";</script>';
    }else{
        print '<script>alert("등록에 실패하였습니다.");history.back();</script>';
    }

    mysqli_close($conn);
?>