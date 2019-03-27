<?php
require_once('./dbconfig.php');

extract($_REQUEST);

$sql = "SELECT * FROM board where id=$id";
$result = $conn->query($sql);
$row = $result->fetch_array();
Header("Content-type: image/jpeg");
echo "$row[image]";
?>