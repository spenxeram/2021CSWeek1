<?php
include 'db.php';
$num_rows = 0;
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT wpu.ID AS author_id, wpp.post_date, wpp.post_title, wpp.post_content, wpu.user_nicename
  FROM wp_posts wpp
  JOIN wp_users wpu ON wpu.ID = wpp.post_author
  WHERE wpp.ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows != 0) {
    $num_rows = $result->num_rows;
    $row = $result->fetch_assoc();
    $title = $row['post_title'];
    $date = date_create($row['post_date']);
    $body = $row['post_content'];
    $author = $row['user_nicename'];
    $author_id = $row['author_id'];
  }

} else {
  //output error - article not found
}
include 'includes/header.php';
 ?>
      <div class="jumbotron jumbotron-fluid article">
        <div class="container">
          <button type="button" class="btn btn-outline-light"><a href='index.php'> < Back</a></button>
          <?php if ($num_rows != 0): ?>
            <h1 class="display-3"><?php echo $title; ?></h1>
            <h3>Author: <a href="author.php?author=<?php echo $author_id; ?>"> <?php echo $author; ?></a></h3>
            <h5 class="font-weight-light"><em><?php echo date_format($date,"Y/m/d"); ?> </em></h5>
          <?php else: ?>
          <?php endif; ?>

        </div>
      </div>
      <div class="container recent-articles">
        <?php if (isset($_GET['new'])): ?>
          <div class="alert alert-success" role="alert">
              Your articles has been created!
          </div>
        <?php endif; ?>
        <div class="row">
          <?php
            if($num_rows != 0) {
              echo $body;
            }
           ?>


        </div>
      </div>
<?php include 'includes/footer.php'; ?>
