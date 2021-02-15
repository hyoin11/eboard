<?php
    $b_idx = $_GET['b_idx'];
    // print $b_idx;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "DELETE FROM tb_reply WHERE r_bidx = $b_idx;";

    $result = mysqli_query($conn, $sql);
    if($result > 0){
        $sql = "DELETE FROM tb_board WHERE b_idx = $b_idx;";
        $result = mysqli_query($conn, $sql);
        if($result > 0){
            print '<script>alert("삭제되었습니다.");location.href="./board.php";</script>';
        }
    }
?>