<?php
include 'db.php';
include 'includes/header.php';

if(isset($_POST['submit'])) {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $date = date("Y-m-d H:i:s");
  // #1 prepare the statement sql with placeholders
  $sql1 = "INSERT INTO wp_posts (post_author, post_date, post_content, post_title) VALUE (1, ?, ?, ?)";
  // use sql2 if the db is throwing errors regarding the timestamps
  $sql2 = "INSERT INTO wp_posts (ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES (NULL, '1', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', ?, ?, '', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '', '0', '', '0', 'post', '', '0')";
  $stmt = $conn->prepare($sql1);
  // #2 bind params to statement
  $stmt->bind_param("sss", $date, $body, $title);
  // #3 execute statement
  $stmt->execute();
  // #4 check that row has been inserted $stmt->affected_rows

  var_dump($stmt);
  if($stmt->affected_rows == 1) {
    $id = $stmt->insert_id;
    // redirect user to the new post they created
    $location = "Location: article.php?id={$id}&new=true";
    header($location);
  }

}

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
