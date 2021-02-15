<?php
    session_start();
    $userid = $_SESSION['userid'];
    $title = $_POST['title_change'];
    $content = nl2br($_POST['content_change']);
    $b_idx = $_GET['b_idx'];
    // print $userid.' '.$title.' '.$content;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "UPDATE tb_board SET b_title = '$title', b_content = '$content' WHERE b_idx = $b_idx;";
    $result = mysqli_query($conn, $sql);

    if($result > 0){
        print '<script>alert("수정되었습니다.");location.href="./read.php?b_idx='.$b_idx.'";</script>';
    }else{
        print '<script>alert("등록에 실패하였습니다.");history.back();</script>';
    }

    mysqli_close($conn);
?>