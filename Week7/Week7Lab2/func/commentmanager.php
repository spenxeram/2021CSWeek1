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
    if($stmt->affected_rows == 1) {
      $id = $stmt->insert_id;
      $sql = "SELECT cm.ID, cm.comment_text, u.user_name, cm.date_created FROM comments cm JOIN users u ON u.ID = cm.comment_user WHERE cm.ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      echo json_encode($result->fetch_assoc());
    }
  }

}
 ?>
