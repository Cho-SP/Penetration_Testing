<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="write.css" />
</head>
<body>
<?php
require_once('./dbconfig.php');

session_start();

//extract($_REQUEST);
$username = $_SESSION['name'];
$useremail = $_SESSION['email'];
$uploaddir = './uploads/';
$uploadfile = $uploaddir . basename($_FILES['upload']['name']);
if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile)){
    echo "<script>alert('파일 업로드 완료');</script>";
  /*  echo "<h2>이미지를 확인하세요.</h2>";
    echo "<img src ='uploads/{$_FILES['upload']['name']}'> <p>";
    echo "1. file name : {$_FILES['upload']['name']}<br />";
    echo "2. file type : {$_FILES['upload']['type']}<br />";
    echo "3. file size : {$_FILES['upload']['size']} byte <br />";
    echo "4. temporary file name : {$_FILES['upload']['size']}<br />"; */
    $sql = "INSERT INTO board (wname, wemail, title, content) VALUES ('$username', '$useremail', '$_POST[title]', '$_POST[content]')";
    $result = $conn->query($sql) or die($this->_connect->error);
    echo "<script>location.href='board.php';</script>";
}else{
   // echo "<script>alert('파일 업로드 실패');</script>";
    $sql = "INSERT INTO board (wname, wemail, title, content) VALUES ('$username', '$useremail', '$_POST[title]', '$_POST[content]')";
    $result = $conn->query($sql) or die($this->_connect->error);
    echo "<script>location.href='board.php';</script>";

}
/* $filename = $_FILES[image][tmp_name];
$handle = fopen($filename, "rb");
$size = GetImageSize($_FILES[image][tmp_name]);
$width = $size[0];
$height = $size[1];
$imageblob = addslashes(fread($handle, filesize($filename)));
$filesize = $filename;

fclose($handle);

ini_set("memory_limit", -1);
$sql = "INSERT INTO board (wname, wemail, title, content, image, width, height) VALUES('$username', '$useremail', '$_POST[title]', '$_POST[content]', '$imageblob', '$width', '$height')";
$result = $conn->query($sql);
echo "<script>location.href='board.php';</script>";
*/
?>
</body>
</html>
