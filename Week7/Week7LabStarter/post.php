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
     <?php else: ?>
       <div class="col-md-8 offset-md-2">
          <img src="<?php echo $post['post_img']; ?>" class="img-fluid" alt="">
          <h2 class="font-weight-light mt-4"><?php echo htmlspecialchars($post['post_title']); ?></h2>
          <h5><em><?php echo htmlspecialchars($post['date_created']); ?>
          </em></h5>
           <p><?php echo htmlspecialchars($post['post_body']); ?></p>
       </div>

     <?php endif; ?>
   </div>
 </div>

 <hr>
 <?php
 var_dump($GLOBALS);
 include 'includes/footer.php';
  ?>
