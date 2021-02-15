<?php
    $search = $_POST['search'];

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT b.b_idx, b.b_title, b.b_writedate, b.b_views, a.m_userid FROM tb_board AS b JOIN tb_member AS a ON b.b_midx = a.m_idx WHERE b_title LIKE '%$search%' ORDER BY b.b_writedate DESC LIMIT 0,10;";
    $list = mysqli_query($conn, $sql);
    while($board = mysqli_fetch_array($list)){
        print '<tr><td>0</td><td class="title"><a href="./read.php?b_idx='.$board['b_idx'].'">'.$board['b_title'].' <span></span></a></td><td>'.$board['m_userid'].'</td><td>'.$board['b_views'].'</td><td>'.substr($board['b_writedate'],0,10).'</td></tr>';
    }
?>