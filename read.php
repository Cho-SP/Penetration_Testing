<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link href="css/read.css" rel="stylesheet">
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
    <center>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM board WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result -> fetch_array();

    echo "<table border=2><tr><td>$row[wname]</td>";
    echo "<td>$row[wemail]</td>";
    echo "<td>$row[wdate]</td></tr>";
    echo "<tr><td colspan=3>$row[title]</td></tr>";
    echo "<tr><td class='content' colspan=3>$row[content]</td></tr></table>";
    echo "<a class='del' href='delete.php?id=$row[id]'>삭제</a>"
    ?>
    <a class='back' href="board.php">&nbsp&nbsp돌아가기</a>
</center>
</body>
</html>