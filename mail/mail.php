<?php
$to = "love5ks@naver.com";
$subject = "Subject";
$mesaj = "Message";

$headers = "From:some.email@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

$result =mail($to, $subject, $message, $headers);
echo "메일 성공여부 : ";
if($result){echo "성공";}else{echo "실패";}
print '1234';
?>