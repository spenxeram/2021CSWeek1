<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "week4lect1";

$conn = new mysqli($host, $user, $pw, $db);
if($conn->connect_errno != 0) {
  echo "There was an error connecting to the DB<br>";
  echo $conn->connect_errno;
} else {
  echo "You connected to the DB successfully<br>";
  echo $conn->connect_errno;
}
