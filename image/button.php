<?php
header("Content-type: image/png");  // http프로토콜과 관련있음 / 헤더가 가장 먼저 나와야함
$string = $_GET['text'];
$im = imagecreatefrompng('button.png'); // 이미지에 대한 식별자
$orange = imagecolorallocate($im, 60, 87, 156); // 첫번째 인자 이미지에 대한 식별자, 2,3,4번째 인자는 grb 수치
$px = (imagesx($im) - 7.5 * strlen($string)) / 2;   // 너비 중간으로 가게 하기위해 계산함. imagesx 이미지의 폭, strlen은 문자 길이
imagestring($im, 4, $px, 9, $string, $orange);  // 두번째 인자 글씨체 / 세번째 인자 x축 / 네번째 인자 y축 / 다섯번째 안에 들어갈 글자 / 여섯번째 인자 색
imagepng($im);  // imagepng 이미지를 전송한다
imagedestory($im);  // imagedestory 지금까지 사용한 내용을 제거
?>