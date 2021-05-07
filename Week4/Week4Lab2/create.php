<?php
include 'db.php';

if(isset($_POST['submit'])) {

  $date = date("Y/m/d H:i:s");
  $title = "Hello World 1001";
  $body = "Test again";
  $user = 1;
  var_dump($conn);
  $stmt = $conn->prepare("INSERT INTO wp_posts (post_title, post_content, post_author, post_date) VALUES (?,?,?,?)");
  $stmt->bind_param("ssis", $title, $body, $user, $date);
  $stmt->execute();
  var_dump($stmt);
  
  $result = $stmt->get_result();
  var_dump($result);
}
  include 'includes/header.php';
?>

<form class="" action="create.php" method="post">
  <button type="submit" name="submit" >Create</button>
</form>


<?php
  include 'includes/footer.php';
?>
