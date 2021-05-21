<?php
// check the post title and body; pass the errors array by reference
function checkPost($title, $body, &$errors) {
  // ensure the body and title are not empty
  if($title == '' || $body == '') {
  $errors['text'] = "You must fill in all fields!";
  }

}

function createPost($title, $body, $img_path, $conn) {
  $sql = "INSERT INTO posts (post_title, post_body, post_author, post_img) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssis", $title, $body, $_SESSION['user_id'], $img_path);
  $stmt->execute();
  var_dump($stmt);

}
