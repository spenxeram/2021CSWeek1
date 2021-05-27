<?php
include 'db.php';

if(isset($_GET['query'])) {
  $search = "%" . $_GET['query'] . "%";
  $sql = "SELECT * FROM wp_posts WHERE post_title LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $search);
  $stmt->execute();
  $results = $stmt->get_result();
  if(isset($_GET['submit'])) {
    echo json_encode($results->fetch_all(MYSQLI_ASSOC));
  } else {
    echo $results->num_rows;
  }
}
 ?>
