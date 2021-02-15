<?php
    // mysql_connect('localhost', 'root', '1234'); // 데이터베이스 접속 / host주소, username, password
    // mysql_select_db('phpex');   // db선택
    // mysql_query();   // sql제어문
    
    $conn = mysqli_connect('localhost', 'root', '1234', 'phpex');
    if($conn){
        print '연결성공<br/>';
    }else{
        print '연결실패<br/>';
    }

    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $userpw = mysqli_real_escape_string($conn, $_POST['userpw']);

    $sql = "insert into tb_test (t_userid, t_userpw) values ('$userid', '$userpw');";
    print $sql.'<br/>';
    $result = mysqli_query($conn, $sql);
    // print mysqli_query($conn, $sql).'<br/>';
    print $result.'<br/>';
    if($result){
        print '등록 완료'.'<br/>';
    }else{
        print '오류'.'<br/>';
    }

    header("location: ./2.php");
    mysqli_close($conn);
?>