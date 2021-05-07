<?php
include 'db.php';
include 'includes/header.php';

if(isset($_POST['submit'])) {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $date = date("Y-m-d H:i:s");
  $user = 1;
  // #1 prepare the statement
  $stmt = $conn->prepare("INSERT INTO wp_posts (post_title, post_content, post_author, post_date) VALUES (?,?,?,?)");
  // #2 Bind the parameters
  $stmt->bind_param("ssis", $title, $body, $user, $date);
  // #3 execute the statement
  $stmt->execute();
  // #4 check or dump results to verify row affected (should be 1)
  var_dump($stmt);
  if($stmt->affected_rows == 1) {
    $id = $stmt->insert_id;
    $location = "Location: articles.php?id={$id}&new=true";
    header($location);
  }





}

 ?>

<div class="container">
  <h2 class="display-4">Create a new post...</h2>
  <div class="row">
    <form class="" action="create.php" method="post">
      <label for="title">Post Title</label>
      <input type="text" name="title" class="form-control"  value="">
      <label for="body">Post Content</label>
      <textarea name="body" class="form-control" rows="8" cols="80"></textarea>
      <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mt-4">Create Post</button>
    </form>
  </div>
</div>

 <?php
include 'includes/footer.php';
  ?>
