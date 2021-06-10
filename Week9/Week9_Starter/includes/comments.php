<?php
$comments = new Comment($post_id, $conn);
$comments->getComments();

 foreach ($comments->comments as $comment): ?>
  <p><?php echo $comment['comment_text'] ?></p>
<?php endforeach; ?>
