<?php
// session_save_path('./session'); // 잘 사용하지 않음. 세션에 관한 파일 저장하는 방법
session_start();    // 세션 시작
$_SESSION['title'] = '코딩공부';
?>