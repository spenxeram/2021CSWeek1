<?php
include 'func/config.php';
include 'func/postmanager.php';
include 'includes/header.php';
if(isset($_GET['id'])) {
  $post = getPost($_GET['id'], $conn);
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
      </div>
      <hr class="mt-4 mb-4">
      <h4 class="display-4">Add a Comment</h4>
      <div class="row comments">
        <div class="col-md-6 comment">
          <form class="comment-form" action="func/commentmanager.php" method="post">
            <textarea name="name" class="form-control" rows="4" cols="80" name="comment"></textarea>
            <input type="hidden" name="post-id" value="<?php echo $_SERVER['QUERY_STRING']; ?>">
            <button type="submit" name="comment-submit" class="btn mt-2 btn-outline-success"><i class="far fa-comment"></i> Add Comment</button>
          </form>
        </div>
      </div>
<?php
var_dump($_SERVER);
var_dump($_SESSION); ?>

     <?php endif; ?>

 </div>

 <hr>
 <?php
 include 'includes/footer.php';
  ?>
