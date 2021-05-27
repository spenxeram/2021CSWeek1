<?php
include 'includes/header.php';
$sql = "SELECT * FROM planets";
$results = $conn->query($sql);
if($results->num_rows >= 1) {
  $planets = $results->fetch_all(MYSQLI_ASSOC);
}


 ?>
  <div class="jumbotron text-white front">
    <div class="container">
      <h1 class="display-3"><i class="fas fa-globe-asia"></i> Planets of the Solar System</h1>
      <p class="lead">Create a form to add planets to the Database</p>
      <a href="create.php"><button type="button" class="btn btn-lg btn-outline-primary"><i class="fa fa-plus"></i> Add a Planet</button></a>
    </div>
  </div>
    <div class="container">
      <h3 class="display-4">Planets</h3>
      <hr>
      <div class="row">
        <?php if (isset($planets)): ?>
          <?php foreach ($planets as $planet): ?>
            <div class="col-md-4 mt-3 mb-3 planet text-center">
              <img src="<?php echo htmlspecialchars($planet['imgurl']); ?>" height="200px" width="200px" class="rounded-circle img-fluid mb-3" alt="">
              <h3 class="font-weight-light"><i class="fa fa-globe"></i><a href="planet.php?id=<?php echo $planet['ID']; ?>">  <?php echo htmlspecialchars($planet['name']); ?></a></h3>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <hr>
<?php
include 'includes/footer.php';
 ?>
