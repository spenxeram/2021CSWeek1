<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "week3";
$conn = new mysqli($host, $user, $pw, $db);

echo $conn->connect_errno;
 ?>
