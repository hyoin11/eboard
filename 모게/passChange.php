<?php
    // print $_POST['passChangeId'].'<br>'.$_POST['passChangePh'];
    $passChangeId = $_POST['passChangeId'];
    $passChangePh = $_POST['passChangePh'];
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
        <div id="passChange_wrap">
            <form method="POST" action="./passChange_ok.php">
                <input type="hidden" name="passChangeId" value=<?php print $passChangeId;?> />
                <input type="hidden" name="passChangePh" value=<?php print $passChangePh;?> />
                <p><label>비밀번호</label><input type="password" name="changePass" id="changePass" placeholder="4자 이상 20자 이하로 입력하세요."/></p>
                <p><label>비밀번호확인</label><input type="password" name="changePass_re" id="changePass_re" placeholder="비밀번호를 다시 입력하세요."/></p>
                <p><input type="submit" value="비밀번호 재설정" id="changePassBtn"  onclick="return checkPass()"/></p>
        </div>
    </section>
</body>
</html>