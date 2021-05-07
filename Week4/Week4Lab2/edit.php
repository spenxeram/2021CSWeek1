<?php
include 'db.php';
include 'includes/header.php';

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM wp_posts WHERE ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $results = $stmt->get_result();
  $rows = $results->fetch_assoc();
  $title = filter_var($rows['post_title'], FILTER_SANITIZE_STRING);
  $body = filter_var($rows['post_content'], FILTER_SANITIZE_STRING);
  $id = filter_var($rows['ID'], FILTER_SANITIZE_STRING);
} else if(isset($_POST['submit'])) {
  $id = $_POST['submit'];
  $title = $_POST['title'];
  $body = $_POST['body'];

  $sql = "UPDATE wp_posts SET post_content = ?, post_title = ? WHERE wp_posts.ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $body, $title, $id);
  $stmt->execute();
  var_dump($stmt);
  if($stmt->affected_rows == 1 && $stmt->errno == 0) {
    $location = "Location: article.php?id={$id}&update=true";
    header($location);
  }
}
 ?>
<div class="container">
  <h2 class="display-4 mt-3 mb-3">Edit a post....</h2>
  <div class="row">
    <form class="" action="edit.php" method="post">
      <label for="title">Post Title</label>
      <input type="text" name="title" value="<?php if(isset($title)) {echo $title;} ?>" class="form-control" placeholder="Post title..."value="">
      <label for="body">Post Content</label>
      <textarea name="body" class="form-control" rows="8" cols="80"><?php if(isset($body)) {echo $body;} ?></textarea>
      <button type="submit" class="btn mt-4 btn-block btn-outline-warning" value="<?php if(isset($id)) {echo $id;} ?>" name="submit">Edit Post</button>
    </form>
  </div>
</div>


 <?php
include 'includes/footer.php';
  ?>
