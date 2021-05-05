<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "week3";

$conn = new mysqli($host, $user, $pw, $db);
if ($conn->connect_errno) {
  echo "There was an error!<br>";
  echo $conn->connect_errno;
  die();
} else {
  echo "Everything is good!!<br>";
  echo $conn->connect_errno;
}
