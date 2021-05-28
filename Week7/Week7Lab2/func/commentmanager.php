<?php
 session_start();
 include '../db.php';

if(isset($_POST['comment'])) {
  $errors = [];

  if(!isset($_SESSION['user_id'])) {
    $errors['userid'] = "User id not set";
  }
  if(!isset($_POST['id'])) {
    $errors['postid'] = "post id not set";
  }

  if(empty($errors)) {
    $sql = "INSERT INTO comments (comment_text, comment_user, comment_post) VALUE (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $_POST['comment'], $_SESSION['user_id'], $_POST['id']);
    $stmt->execute();
    echo $stmt->affected_rows;
  }

}
 ?>
