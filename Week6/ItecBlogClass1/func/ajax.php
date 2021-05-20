<?php
include "../db.php";

$sql = "SELECT * FROM posts";
$results = $conn->query($sql);
$rows = $results->fetch_all(MYSQLI_ASSOC);
$rows = json_encode($rows);
echo $rows;
 ?>
