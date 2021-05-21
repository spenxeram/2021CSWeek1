<?php
function checkPost($title, $body, &$errors) {
  if($title == '' || $body == '') {
    $errors['posttext'] = "Please fill in all fields.";
  }
}

function createPost($title, $body, $img_path, $conn) {
  $sql = "INSERT INTO posts (post_title, post_body, post_author, post_img) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssis", $title, $body, $_SESSION['user_id'], $img_path);
  $stmt->execute();
  if($stmt->affected_rows == 1) {
    $location = "Location: post.php?id=" . $stmt->insert_id . "&newpost=true";
    header($location);
  }
}

function getPost($id, $conn) {
  $sql = "SELECT * FROM posts WHERE ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $results = $stmt->get_result();
  if($results->num_rows == 1) {
    return $results->fetch_assoc();
  } else {
    return false;
  }
}


 ?>
