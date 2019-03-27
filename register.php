<?php
require_once('./dbconfig.php');
if($_POST[password] == $_POST[passwordcheck]){
    $sql = "INSERT INTO user (name, email, password) VALUES('$_POST[name]', '$_POST[email]', '$_POST[password]')";
    $conn -> query($sql);
    echo "<script>alert('회원가입이 성공적으로 되었습니다.');";
    echo "location.href='login.html';</script>";
}
else{
    echo "<script>alert('잘못된 입력입니다.');";
    echo "location.href='regit.html';</script>";
}
?>