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
    <div class="col-md-8 offset-md-2">

      <?php if ($post == false): ?>
        <h2 class="display-3">404 Post Not Found</h2>
      <?php else: ?>
        <img src="<?php echo $post['post_img']; ?>" class="img-fluid" alt="">
        <h2 class="diplay-4"><?php echo htmlspecialchars($post['post_title']); ?></h2>
        <h4><em><?php htmlspecialchars($post['date_created']); ?> </em></h4>
        <p><?php echo htmlspecialchars($post['post_body']); ?></p>
      <?php endif; ?>

    </div>
  </div>
</div>


<hr>
 <?php
 include 'includes/footer.php';
  ?>
