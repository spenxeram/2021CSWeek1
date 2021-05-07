<?php
include 'db.php';
include 'includes/header.php';


 ?>
<div class="container">
  <h2 class="display-4 mt-3 mb-3">Create a new post....</h2>
  <div class="row">
    <form class="" action="create.php" method="post">
      <label for="title">Post Title</label>
      <input type="text" name="title" class="form-control" placeholder="Post title..."value="">
      <label for="body">Post Content</label>
      <textarea name="body" class="form-control" rows="8" cols="80"></textarea>
      <button type="submit" class="btn mt-4 btn-block btn-outline-primary" name="submit">Create New Post</button>
    </form>
  </div>
</div>


 <?php
include 'includes/footer.php';
  ?>
