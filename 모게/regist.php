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
        <div id="regist_wrap">
            <form method="POST" action="./regist_ok.php" name="regform">
                <p><label>아이디</label><input type="text" name="userid" id="userid" placeholder="4자 이상 20자 이하로 입력하세요."/></p>
                <p><input type="button" value="아이디중복확인" onclick="return idCheck()" id="idCheckBtn"/><span id="idCheckConfirm"></span><input type="hidden" name="isIdCheck" id="isIdCheck" value="false"/></p>
                <p><label>비밀번호</label><input type="password" name="userpw" placeholder="4자 이상 20자 이하로 입력하세요."/></p>
                <p><label>비밀번호확인</label><input type="password" name="userpw_re" placeholder="비밀번호를 다시 입력하세요."/></p>
                <p><label>휴대폰번호</label><input type="text" name="userph" id="userph" placeholder="-를 포함하여 입력하세요."/></p>
                <p><input type="button" value="휴대폰번호중복확인" onclick="return phCheck()" id="phCheckBtn"/><span id="phCheckConfirm"></span><input type="hidden" name="isPhCheck" id="isPhCheck" value="false"/></p>
                <p><input type="submit" value="회원가입" onclick="return sendit()"/></p>
            </form>
            <p><a href="./login.php">로그인</a></p>
        </div>
    </section>
</body>
</html>