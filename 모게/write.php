<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
        print '<script>alert("로그인 후 이용할 수 있습니다.");location.href="./login.php";</script>';
    }
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
            <form method="POST" action="./write_ok.php">
                <p><label>제목</label><input type="text" name="title"/></p>
                <p><label>내용</label><textarea name="content"></textarea></p>
                <p><input type="submit" value="올리기"/></p>
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