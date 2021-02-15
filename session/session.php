<?php
session_start();
if(!isset($_SESSION['is_login'])){
    print '<script>alert("잘못된 접근입니다.");location.href="./login.html";</script>';
}
?>
<html>
    <body>
        <p><?php print $_SESSION['nickname'];?>님 환영합니다.</p>
        <a href='./logout.php'>로그아웃</a>
    </body>
</html>