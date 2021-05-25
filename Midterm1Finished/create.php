<?php
include 'includes/header.php';
$errors = [];

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $position = $_POST['position'];
  $moons = $_POST['moons'];
  $imgurl = $_POST['imgurl'];
  //ensure the radio input is set, if so assign to var
  // else output an error
  if(isset($_POST['type'])) {
    $type = $_POST['type'];
  } else {
    $errors['type'] = "Planet type must be terrestrial or gaseous!";
  }

  //error checking
  //make sure planet name exists and is valid
  $planets = ['mercury', 'venus', 'earth', 'mars', 'jupiter', 'saturn', 'uranus', 'neptune'];
  if(!in_array(strtolower($name), $planets)) {
    $errors['name'] = "'" . htmlspecialchars($name) . "'" . " isn't a known planet!";
  }

  // ensure planet position is in range
  if($position < 1 || $position > 8) {
    $errors['position'] = "Planet position must be between 1 - 8!";
  }

  // check moons
  if($moons < 0) {
    $errors['moons'] = "Number of moons cannot be a negative number!";
  }
  // check type
  if($type != "terrestrial" && $type != 'gaseous') {
    $errors['type'] = "Planet type must be terrestrial or gaseous!";
  }

  // validate img url
  if(!filter_var($imgurl, FILTER_VALIDATE_URL)) {
    $errors['imgurl'] = "Image url is invalid!";
  }

  // if no errors check to see if planet exists
  if(empty($errors)) {
    $sql = "SELECT * FROM planets WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 0) {
      $sql = "INSERT INTO planets (name, moons, position, type, imgurl) VALUES (?,?,?,?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("siiss", $name, $moons, $position, $type, $imgurl);
      $stmt->execute();
      if($stmt->affected_rows == 1) {
       $location = "Location: planet.php?id=" . $stmt->insert_id . "&new=true";
       header($location);
      }
    } else {
      $errors['exists'] = "This planet already is in the database!";
    }
  }


}

 ?>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <?php if (!empty($errors)): ?>
        <div class="alert alert-danger mt-3" role="alert">

        <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>

      </ul>

    </div>
      <?php endif; ?>
    <h1 class="display-4 text-center mt-3 mb-2"><i class="fa fa-globe"></i> Add a Planet</h1>
    <form class="" action="create.php" method="post">
      <label for="name"><i class="fa fa-globe-americas"></i> Planet Name</label>
      <input type="text" name="name" value="" class="form-control" placeholder="Earth, Mars, Jupiter etc...">
      <label for="position"><i class="fas fa-sort-amount-down"></i> Position from Sun</label>
      <input type="number" name="position" value="" class="form-control" placeholder="Earth = 3....">
      <label for="moons"><i class="fa fa-moon"></i> Moons</label>
      <input type="number" name="moons" value="" class="form-control" placeholder="ie Earth = 1...">
      <label for="type"><i class="fas fa-atom"></i> Planet Type</label> <br>
      <input type="radio" name="type" value="terrestrial" checked > Terrestrial <br>
      <input type="radio" name="type" value="gaseous" > Gaseous <br>
      <label for="imgurl"><i class="far fa-images"></i> Link to Planet Image</label>
      <input type="text" name="imgurl" value="" class="form-control" placeholder="URL link to planet img....">
      <button type="submit" name="submit" class="btn btn-block btn-lg btn-dark mt-3 mb-3"> <i class="fa fa-plus"></i> Add Planet</button>
    </form>

  </div>
  </div>
</div>

 <?php
 include 'includes/footer.php';
  ?>
