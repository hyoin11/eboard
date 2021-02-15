<?php
    session_start();

    $b_idx = $_GET['b_idx'];
    // print $b_idx;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "SELECT b.b_title, b.b_content, b.b_writedate, b.b_views, b.b_recommend, b.b_notRecommend, a.m_userid FROM tb_board AS b JOIN tb_member AS a ON b.b_midx = a.m_idx WHERE b.b_idx=$b_idx;";
    $board = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($board);

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
        <div id="write_wrap">
            <form method="POST" action="./change_ok.php?b_idx=<?php print $b_idx;?>">
                <p><label>제목</label><input type="text" name="title_change" value="<?php print $data['b_title'];?>"/></p>
                <p><label>내용</label><textarea name="content_change"><?php print strip_tags($data['b_content']);?></textarea></p>
                <p><input type="submit" value="수정하기"/></p>
            </form>
            <div class="list">
                <a href="./board.php">
                    <i class="fas fa-bars"></i>
                    <span>목록으로</span>
                </a>
            </div>
        </div>
    </section>
</body>
</html>