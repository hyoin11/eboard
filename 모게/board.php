<?php
    session_start();

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT b_idx FROM tb_board;";
    $total = mysqli_num_rows(mysqli_query($conn, $sql));
    $page; // 현재 페이지
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $page_num=10; // 한 페이지 컬럼 수 
    $block_num=5; // 한 페이지 블럭 수

    $limit_start=$page_num * $page - $page_num; // limit 시작 위치

    $total_page=ceil($total/$page_num); // 총 페이지 
    $total_black=ceil($total_page/$block_num); // 총 블럭

    $now_block=ceil($page/$block_num); // 현재 페이지의 블럭 
    $start_page=(($now_block*$block_num)-($block_num-1)); // 가져올 페이지의 시작번호 
    $last_page=($now_block*$block_num); // 가져올 마지막 페이지 번호

    $prev_page=($now_block*$block_num)-$block_num; // 이전 블럭 이동시 첫 페이지 
    $next_page=($now_block*$block_num)+1; // 다음 블럭 이동시 첫 페이지

    $sql = "SELECT b.b_idx, b.b_title, b.b_writedate, b.b_views, a.m_userid FROM tb_board AS b JOIN tb_member AS a ON b.b_midx = a.m_idx ORDER BY b.b_writedate DESC LIMIT $limit_start,10;";
    $list = mysqli_query($conn, $sql);

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>모두의게시판</title>
    <link rel="shortcut icon" href="./image/icon/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/script.js"></script>
</head>
<body>
    <header>
        <a href="./board.php"><p><span>모</span><span>두</span><span>의</span><span>게</span><span>시</span><span>판</span></p></a>
        <div id="button"><p><input type="button" value="<?php
            if(isset($_SESSION['is_login'])){
                print '로그아웃';
            }else{
                print '로그인';
            }
        ?>" id="logBtn"/>
        </p></div>
    </header>
    <section>
        <input type="hidden" id="total" value=<?php print $total;?> />
        <div id="board_wrap">
            <div id="searchDiv">
                <input id="searchBox" type="text" name="input_search"/><button id="searchBtn"><i class="fas fa-search"></i></button>
            </div>
            <div id="writeBtn">
                <a href="./write.php"><i class="fas fa-pencil-alt"></i><span>쓰기</span></a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>조회 수</th>
                    <th>날짜</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($board = mysqli_fetch_array($list)){
                        // $sql = "SELECT COUNT(r_idx) AS cnt FROM tb_reply WHERE r_bidx = ".$board['b_idx'];
                        // print $sql;
                        // $result = mysqli_query($conn, $sql);
                        // print_r($result);

                        // print_r($board);
                        print '<tr><td>0</td><td class="title"><a href="./read.php?b_idx='.$board['b_idx'].'">'.$board['b_title'].' <span></span></a></td><td>'.$board['m_userid'].'</td><td>'.$board['b_views'].'</td><td>'.substr($board['b_writedate'],0,10).'</td></tr>';
                    }
                ?>
            </tbody>
        </table>
        <div id="paging">
            <p>
                <!-- <span id="prev"><a href="<">&lt; Prev</a></span> -->
                <?php
                    // 이전 페이지 
                    if($now_block > 1){ 
                        print '<span id="prev"><a href="?page='.$prev_page.'">&lt; Prev</a></span>';
                    }

                    if($last_page < $total_page) { 
                        $for_end=$last_page; 
                    } else{ 
                        $for_end=$total_page; 
                    } 
                    for($i=$start_page; $i<=$for_end; $i++){ 
                        print '<span class="number"><a href="?page='.$i.'">'.$i.'</a></span>';
                    }

                    // 다음 페이지 
                    if($now_block < $total_black){ 
                        print '<span id="next"><a href="?page='.$next_page.'">Next &gt;</a></span>'; 
                    }
                ?>
            </p>
        </div>
    </section>
</body>
</html>