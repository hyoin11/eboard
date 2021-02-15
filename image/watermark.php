<?php
$stamp = imagecreatefrompng('text.png');
$im = imagecreatefrompng('original.png');

$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
// imagecopy(기존이미지(목적지), 복사할 이미지(소스), x좌표, y좌표, 이미지 시작점x축, 이미지 시작점y축, 이미지 끝점의x축, 이미지 끝점의y축)

header('Content-type: image/png');
imagepng($im);
imagedestory($im);

?>