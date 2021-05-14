<?php
include 'includes/header.php';
if(isset($_GET['id'])) {
  $sql = "SELECT * FROM posts WHERE ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $_GET['id']);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $title = $row['post_title'];
    $body = $row['post_body'];
    $date = $row['date_created'];
  }
}

?>

<div class="jumbotron">
  <div class="container">
    <?php if (isset($title)): ?>
      <h1 class="display-3"><?php echo htmlspecialchars($title); ?></h1>
      <p class="lead"><?php echo htmlspecialchars($date); ?></p>

    <?php else: ?>
          <h1 class="display-3">No article found!</h1>
    <?php endif; ?>
  </div>
</div>

<div class="container">
  <?php if (isset($_GET['created'])): ?>
    <div class="alert alert-success" role="alert">
      Your post was created!
    </div>
  <?php endif; ?>
  <div class="row">
    <?php if (isset($body)): ?>
      <p><?php echo htmlspecialchars($body); ?></p>
    <?php endif; ?>
  </div>
</div>






<?php include 'includes/footer.php'; ?>
