<?php
include 'func/config.php';
include 'func/postmanager.php';
include 'func/filemanager.php';
if(isset($_POST['submit'])) {
  checkPost($_POST, $_FILES, $errors,$conn);
}
include 'includes/header.php';

 ?>
<div class="container">

  <div class="row">
    <?php if ($_SESSION['loggedin'] == false): ?>
      <div class="mt-5 col-md-6 offset-md-3 text-center">
        <h2 class="display-5">Please Login to Post!</h2>
        <p>Create an account or login to post to the website.</p>
        <button type="button" class="btn btn-block btn-outline-primary"><a href="login.php"><i class="fas fa-sign-in-alt"></i> Create Account/Login</a> </button>
      </div>
    <?php else: ?>
      <div class="mt-3 col-md-6 offset-md-3">
        <?php if (isset($errorMsg)): ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $errorMsg; ?>
          </div>
        <?php endif; ?>
        <h2>Create a post~</h2>
        <form class="" action="create.php" method="post" enctype="multipart/form-data">
          <label for="title">Post Title</label>
          <input type="text" name="title" placeholder="Post title..." value="" class="form-control">

          <label for="body">Post Content</label>
          <textarea name="body" class="form-control" rows="8" cols="80"></textarea>
          <input type="file" name="img" value="" class="mt-3 mb-3 form-control">
          <button type="submit" name="submit" class="btn btn-outline-dark btn-block"> <i class="fas fa-edit"></i> Create Post</button>
        </form>
      </div>

    <?php endif; ?>
  </div>
</div>


 <?php
 include 'includes/footer.php';
  ?>
