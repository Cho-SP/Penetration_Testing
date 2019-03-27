<?php
require_once('./dbconfig.php');

session_destroy();
echo "<script>location.href='login.html';</script>";
?>