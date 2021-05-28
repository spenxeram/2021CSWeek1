<?php
session_start();
include '../db.php';
$errors = [];
if(isset($_POST['comment'])) {

  if(!isset($_POST['id'])) {
    $errors['postid'] = "Post Id not set";
  }

  if(!isset($_SESSION['user_id'])) {
    $errors['userid'] = "user Id not set";
  }

  if(empty($errors)) {
    $sql = "INSERT INTO comments (comment_text, comment_author, comment_post) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $_POST['comment'], $_SESSION['user_id'], $_POST['id']);
    $stmt->execute();
    echo $stmt->affected_rows;
  }


}
 ?>
