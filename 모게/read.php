<?php
    session_start();

    $b_idx = $_GET['b_idx'];
    // print $b_idx;

    $conn = mysqli_connect('localhost', 'root', '1234', 'eboard');

    $sql = "UPDATE tb_board SET b_views = b_views + 1 WHERE b_idx = $b_idx;";
    mysqli_query($conn, $sql);

    $sql = "SELECT b.b_title, b.b_content, b.b_writedate, b.b_views, b.b_recommend, b.b_notRecommend, a.m_userid FROM tb_board AS b JOIN tb_member AS a ON b.b_midx = a.m_idx WHERE b.b_idx=$b_idx;";
    $board = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($board);

    $sql = "SELECT c.r_comment, c.r_writedate, a.m_userid FROM tb_reply AS c JOIN tb_member AS a ON c.r_midx = a.m_idx WHERE c.r_bidx=$b_idx;";
    $reply_list = mysqli_query($conn, $sql);
    
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
        <div id="read_wrap">
            <input type="hidden" value="<?php print $b_idx;?>" id="b_idx"/>
            <div id="content_header">
                <div>
                    <h1><?php print $data['b_title'];?></h1><a href="#"><?php print mysqli_num_rows($reply_list);?><i class="fas fa-chevron-down"></i></a>
                    <span id="date"><i class="far fa-clock"></i><?php print $data['b_writedate'];?></span>
                </div>
                <div>
                    <p><span id="userid"><?php print $data['m_userid'];?></span>님</p>
                    <p><span id="viewCount">조회 수 <b><?php print $data['b_views'];?></b></span></p>
                </div>
            </div>
            <div id="userBtn">
                <div>
                    <?php
                        if($_SESSION['userid'] == $data['m_userid']){
                            print '<p><a href="./change.php?b_idx='.$b_idx.'">수정하기</a></p> <span>|</span> <p><a id="deleteBtn">삭제하기</a></p>';
                        }
                    ?>
                </div>
            </div>
            <div id="content_body">
                <?php print $data['b_content'];?>
            </div>
            <div id="content_recommend">
                <p onclick='location.href="./rec.php?b_idx=<?php print $b_idx;?>"'><i class="far fa-thumbs-up"></i><span><?php 
                    if($data['b_recommend'] == '' || $data['b_recommend'] == null){
                        print 0;
                    }else{
                        $rec_user = array();
                        $rec_user = explode(',', $data['b_recommend']);
                        print count($rec_user);
                    }
                ?></span></p>
                <p onclick='location.href="./norec.php?b_idx=<?php print $b_idx;?>"'><i class="far fa-thumbs-down"></i><span><?php 
                    if($data['b_notRecommend'] == '' || $data['b_notRecommend'] == null){
                        print 0;
                    }else{
                        $nrec_user = array();
                        $nrec_user = explode(',', $data['b_notRecommend']);
                        print count($nrec_user);
                    }
                ?></span></p>
            </div>
            <div id="content_comment">
                <div id="comment_head"><i class="far fa-comment-dots"></i> 댓글 [<span><?php print mysqli_num_rows($reply_list);?></span>]</div>
                <div id="comment_body">
                    <?php 
                        while($reply = mysqli_fetch_array($reply_list)){
                            // print_r($reply);
                            print '<div class="comment_row"><p class="comment_id"><span>'.$reply['m_userid'].'</span>님 <span>'.$reply['r_writedate'].'</span></p><p class="comment_content">'.$reply['r_comment'].'</p></div>';
                        }
                    ?>
                </div>
                <div id="comment_write">
                    <form method="POST" action="./read_ok.php?b_idx=<?php print $b_idx;?>">
                        <textarea name="comment_text"></textarea>
                        <input type="submit" value="댓글쓰기"/>
                    </form>
                </div>
            </div>
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