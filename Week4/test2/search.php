<?php include 'includes/head.php';
if(isset($_POST['search'])) {
  $search = $_POST['search'];
  $result = $conn->query("SELECT * FROM wp_posts WHERE post_title LIKE '%$search%'");
  echo $result->num_rows;
  var_dump($result);
}
 ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Number of Articles Found: </h1>
    <p class="lead">Query the WordPress Database</p>
    <form class="" action="search.php" method="post">
      <input type="text" name="search" class="form-control mb-4 mt-4" value="" placeholder="Search...">
      <button type="submit" class="btn btn-lg btn-outline-primary">Search Database</button>
    </form>

  </div>
</div>
<div class="container">
  <hr>
  <h3 class="display-4">Recent Articles</h3>
  <hr>

</div>
<?php include 'includes/footer.php'; ?>
