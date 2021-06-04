<?php
include '../config.php';
include '../func/Comment.php';

if(isset($_POST['comment'])) {
  $theid = $_POST['post_id'];
  $comment_text = $_POST['comment'];
  $comment = new Comment($theid, $conn);
  $comment->createComment($comment_text);
}


 ?>
