<?php
include '../func/config.php';
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
    if($stmt->affected_rows == 1) {
      $id = $stmt->insert_id;
      $sql = "SELECT cm.comment_text, u.user_name, cm.date_created FROM comments cm JOIN users u ON u.ID = cm.comment_author WHERE cm.ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows == 1) {
        echo json_encode($result->fetch_assoc());
      }
    }
  }
}

function getComments($postid) {
  $sql = "SELECT cm.comment_text, u.user_name, cm.date_created FROM comments cm JOIN users u ON u.ID = cm.comment_author WHERE cm.ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $postid);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_all(MYSQLI_ASSOC);
}

function outputComments($comments) {
  $output = '';
  foreach ($comments as $comment) {
    $output .= "<div class='card mt-2 mb-2'><div class='card-header'> {$comment['user_name']} | {$comment['date_created']} </div><div class='card-body'><p class='card-text'>{$comment['comment_text']} </p></div></div>";
  }
  echo $output;
}
 ?>
