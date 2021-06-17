<?php
include_once 'config.php';
include 'func/postmanager.php';
include 'classes/Comment.php';
include 'classes/Reply.php';
include 'classes/Review.php';
include 'includes/header.php';
include 'func/functions.php';
if(isset($_GET['id'])) {
  $post = getPost($_GET['id'], $conn);
  $theid = $_GET['id'];
  $comments = new Comment($theid, $conn);
  $comments->getComments();
  $replies = new Reply($theid, $conn);
  $replies->getReplies();
  $reviews = new Review($conn);
  $reviews->post_id = $theid;
  $reviews->getReviews();
}
 ?>
 <hr>
 <div class="container post">
   <div class="row">
     <?php if ($post == false): ?>
       <h2 class="display-4">404 Post Not Found!</h2>
      </div>
     <?php else: ?>
       <div class="col-md-8 offset-md-2">
          <img src="<?php echo $post['post_img']; ?>" class="img-fluid" alt="">
          <h2 class="font-weight-light mt-4"><?php echo htmlspecialchars($post['post_title']); ?></h2>
          <h5><em><?php echo htmlspecialchars($post['date_created']); ?>
          </em></h5>
           <p><?php echo htmlspecialchars($post['post_body']); ?></p>
       </div>
     </div> <!-- end of post row -->
     <!-- comment row -->
       <?php
        include 'includes/comments.php';
        ?>
     <?php endif; ?>
 </div>
 <hr>
<?php
var_dump($_SESSION);
 include 'includes/footer.php';
?>
