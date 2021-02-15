<?php
    session_start();
    if(isset($_SESSION['is_login'])){
        print '<script>alert("이미 로그인하였습니다.");location.href="./board.php";</script>';
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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./js/script.js"></script>
</head>
<body>
    <header>
        <a href="./board.php"><p><span>모</span><span>두</span><span>의</span><span>게</span><span>시</span><span>판</span></p></a>
    </header>
    <section>
        <div id="loagin_wrap">
            <form method="POST" action="./login_ok.php">
                <p><input type="text" name="userid" placeholder="아이디"/></p>
                <p><input type="password" name="userpw" placeholder="비밀번호"/></p>
                <p><input type="submit" value="로그인"/></p>
            </form>
            <p>
                <a href="./idFind.html">아이디 찾기</a> <span>|</span> <a href="./passFind.html">비밀번호 찾기</a> <span>|</span> <a href="./regist.php">회원가입</a>
            </p>
        </div>
    </section>
</body>
</html>