<?php
require_once('./dbconfig.php');

$sql = "SELECT password FROM user WHERE email='$_POST[email]'";
$result = $conn->query($sql);
$row = $result->fetch_array();
if($_POST['password'] == $row[password]){
    $sql = "SELECT name FROM user WHERE email='$_POST[email]'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    session_start();
    $_SESSION['name'] = $row[name];
    $_SESSION['email'] = $_POST['email'];
    echo "<script>alert('로그인이 성공적으로 되었습니다.');";
    echo "location.href='board.php';</script>";
}
else{
    echo "<script>alert('잘못된 입력입니다.');";
    echo "location.href='login.html';</script>";
}
?>