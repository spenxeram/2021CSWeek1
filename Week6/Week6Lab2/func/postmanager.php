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
  if($stmt->affected_rows == 1) {
    // redirect user to the post they created
    $location = "Location: post.php?id=" . $stmt->insert_id . "&created=true";
    header($location);
  }
}

function getPost($id, $conn) {
  $sql = "SELECT * FROM posts WHERE ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows == 1) {
    return $result->fetch_assoc();
  } else {
    return false;
  }
}

// create these two functions and call them on the homepage
function getPosts($limit, $offset, $conn) {

}

function outputPosts($posts) {

}
