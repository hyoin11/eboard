<?php
$conn = mysqli_connect('localhost', 'root', '1234', 'phpex');
$list = mysqli_query($conn, 'select * from tb_test');

// while($row = mysqli_fetch_array($list)){
//     print $row['t_userid']."<br/>";
// }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <div>
            <nav>
                <ul>
                    <?php
                        while($row = mysqli_fetch_array($list)){
                            print "<li>".htmlspecialchars($row['t_userid'])."<li/>";    // htmlspecialchars는 html태그같은것들을 그대로 보여줄때 사용
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </body>
</html>
<?php
mysqli_close($conn);
?>