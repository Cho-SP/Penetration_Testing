<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>네트워크보안 수행평가</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/board.css" rel="stylesheet">
</head>
<body>
    <center>
    <h1><div class="title"><a class="atitle" href="board.php">BOARD</a></div></h1>
</center>
<?php
    require_once('./dbconfig.php');
    session_start();
    if(!$_SESSION['name'] || !$_SESSION['email']){
    echo "<script>alert('잘못된 접근입니다.');";
    echo "location.href='login.html';</script>";
    }

    $username = $_SESSION['name'];
    $useremail = $_SESSION['email'];
    ?>
    <h1><?php echo "$username($useremail)"; ?>님 안녕하세요.</h1>
    <input class="logout" type="button" value="로그아웃" onclick="location.href='sessionDestroy.php';">
    <input class="write" type="button" value="글쓰기" onclick="location.href='write.html';">
    <center>
    <table border=1>
        <tr>
            <td class="tname">이름</td>
            <td class="ttitle">제목</td>
            <td class="tdate">게시일</td>
        </tr>
    </table>
    <?php
    $sql = "SELECT * FROM board ORDER BY id DESC";
    $result = $conn->query($sql);
    /*while($row = $result-> fetch_array()){
      echo "<table><tr><td>$row[wname]</td>";
      echo "<td>$row[wemail]</td>";
      echo "<td>$row[title]</td>";
      echo "<td>$row[content]</td>";
    //  echo "<td><a href=view.html?id=$row[id]><img src=./view.html?id=$row[id] width=$row[width] height=$row[height]></a></td>";
      echo "<td>$row[wdate]</td></tr></table>";
     }*/
    while($row = $result->fetch_array()){
        echo "<table border=1><tr><td class='tname'>$row[wname]</td>";
        echo "<td class='ttitle'><a class='join' href='read.php?id=$row[id]'>$row[title]</a></td>";
        echo "<td class='tdate'>$row[wdate]</td></tr></table>";
    }
    ?>
    </center>
</body>
</html>