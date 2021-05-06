<?php
include 'db.php';

if(isset($_POST['submit'])) {
  var_dump($_POST);
  $search = $_POST['search'];
  $sql = "SELECT * FROM wp_posts WHERE post_title LIKE '%$search%'";
  $results = $conn->query($sql);
  var_dump($results);
  echo $results->num_rows;
}

 ?>
