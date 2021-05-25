<?php
include 'includes/header.php';
$error = true;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM planets WHERE id = ? ORDER BY position";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $results = $stmt->get_result();
  if($results->num_rows == 1) {
    $planet = $results->fetch_assoc();
    $error = false;
  }
}
 ?>
 <div class="planets">
    <div class="container text-center">
       <button type="button" class="ml-5 float-left mt-3 btn btn-outline-primary"><a href="index.php">< Home </a></button>
      <div class="row">
        <?php if ($error): ?>
          <h1 class="display-2 mt-5">Planet not found!</h1>
          <button type="button" class="btn btn-outline-danger btn-lg"> <a href="index.php"> <i class="fa fa-home"></i> Return to Home</a></button>
        <?php else: ?>
          <div class="col-md-6 offset-md-3 mt-4 mb-5">
            <img src="<?php echo htmlspecialchars($planet['imgurl']); ?>" width="300px" class="rounded-circle" alt="">
            <h2 class="display-4"><i class="fa fa-globe"></i> <?php echo htmlspecialchars($planet['name']); ?></h2>
            <h4 class="font-weight-light"><em><i class="fas fa-sort-amount-down"></i> Position from Sun: <?php echo htmlspecialchars($planet['position']); ?> </em> </h4>
            <h4><i class="fas fa-moon"></i> Moons: <?php echo htmlspecialchars($planet['moons']); ?> </h4>
            <p><i class="fas fa-atom"></i> Type: <?php echo htmlspecialchars(ucfirst($planet['type'])); ?> </p>
              <button type="button" class=" mt-5 btn btn-outline-danger" name="button"> <a href="delete.php?id=<?php echo $planet['ID']; ?>"> <i class="fa fa-delete"></i> Delete Planet</a></button>
          </div>

        <?php endif; ?>
      </div>
    </div>

  </div>
<?php
include 'includes/footer.php';
 ?>
