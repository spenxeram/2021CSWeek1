<?php
include '../config.php';
include '../classes/Comment.php';
include '../classes/Reply.php';
if(isset($_POST['comment'])) {
  $post_id = $_POST['post_id'];
  $comment_text = $_POST['comment'];
  $comment = new Comment($post_id, $conn);
  $comment->createComment($comment_text);
  echo json_encode($comment->comment);
}

if(isset($_POST['delete-comment'])) {
  $comment_id = $_POST['comment_id'];
  $post_id = $_SESSION["query_history"];
  $comment = new Comment($post_id[3], $conn);
  $comment->deleteComment($comment_id);
}


if(isset($_POST['reply'])) {
  $comment_text = $_POST['reply'];
  $post_id = $_SESSION["query_history"];
  $reply_to_comment_id = $_POST['reply_to_comment_id'];
  $reply_to_user_id = $_POST['reply_to_user_id'];
  $reply = new Reply($post_id, $conn);
  $reply->setReplyDetails($reply_to_comment_id, $reply_to_user_id, $comment_text);
  $reply->createReply();
  echo json_encode($reply->comment);

}




 ?>
