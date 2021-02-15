<?php
session_start();
$id = 'apple';
$pw = '1111';
if(!empty($_POST['id']) && !empty($_POST['pw'])){
    if($_POST['id'] === $id && $_POST['pw'] === $pw){
        $_SESSION['is_login'] = true;
        $_SESSION['nickname'] = '애플';
        header('location: ./session.php');
        exit;
    }else{
        print '<script>alert("아이디 또는 비밀번호를 확인해주세요.");history.back();</script>';
    }
}else{
    print '<script>alert("아이디 또는 비밀번호를 확인해주세요.");history.back();</script>';
}
?>