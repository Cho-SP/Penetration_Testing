<?php

require_once('./dbconfig.php');
session_start();
if(!$_SESSION['name'] || !$_SESSION['email']){
    echo "<script>alert('잘못된 접근입니다.');";
    echo "location.href='sessionDestroy.php';</script>";
}
$email = $_SESSION['email'];
$id = $_GET['id'];
$sql = "SELECT * FROM board WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_array();
if($email==$row[wemail]){
    $sql = "DELETE FROM board WHERE id='$id'";
    $result = $conn->query($sql);
    echo "<script>alert('글이 삭제되었습니다');";
    echo "location.href='board.php'</script>";
}else{
    echo "<script>alert('권한이 없습니다.');";
    echo "location.href='board.php'</script>";
}

?>