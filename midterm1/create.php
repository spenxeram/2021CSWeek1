<?php
include 'includes/header.php';
$errors = [];
if (isset($_POST['submit'])) {
  $university = $_POST['university'];
  $rank = $_POST['rank'];
  $numstudent = $_POST['numstudent'];
  $imgurl = $_POST['img_url'];
  $continent = $_POST['continent'];
  var_dump($_POST);
  if($university == ''){
    $errors['name'] = "University must have name !!!";
  }

  if($rank < 0 || $rank == ''){
    $errors['rank'] = "Rank can't equal 0 or empty!!!";
  }

  if($numstudent < 0 || $numstudent == ''){
    $errors['numstudent'] = "Numstudent can't equal 0 or empty!!!";
  }

  if($imgurl == ''){
    $errors['img_url'] = "University should have img!!!";
  }

  if(empty($errors)){
    $sql = "INSERT INTO universities (name, therank, num_students, continent, img_url)  VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiss",$university,$rank,$numstudent,$imgurl,$continent);
    $stmt->execute();
    var_dump($stmt);
    if($stmt->affected_rows == 1){
    //  $location = "Location : university.php?id=" . $stmt->insert_id .  "&new=true";
      header($location);
    }
  }
}
?>

<div class="container">
  <?php if(!empty($errors)): ?>
    <div class="alert alert-danger" role="alert">
      <?php var_dump+ ($errors); ?>
    </div>
  <?php endif ?>
  <h4 class="display-4">Add Classmate</h4>
  <hr>
  <div class="row">
      <div class="col-md-6 offset-md-3">
        <form class="" action="create.php" method="post">
          <label for="university"><i class="fa fa-school"></i>University</label>
          <input type="text" name="university" placeholder="Please enter your university you want to add" class="form-control" value="">
          <label for="rank">Rank</label>
          <input type="number" name="rank" placeholder="Please select university rank!" class="form-control" value="">
          <label for="numstudent">Numstudent</label>
          <input type="number" name="numstudent" placeholder="Please select your number of student" class="form-control" value="">
          <label for="img_url">Image</label>
          <input type="text" name="img_url" placeholder="Please enter your university img url!" class="form-control" value="">
          <label for="continent">Continent</label>
          <select class="form-control" name="continent">
            <option value="asia">asia</option>
            <option value="africa">africa</option>
            <option value="americas">americas</option>
            <option value="europe">europe</option>
            <option value="australia">australia</option>
          </select>
          <button type="submit" name="submit" class="btn btn-lg btn-block btn-dark mt-3"><i class="fa fa-plus"></i> Add Universities</button>
        </form>
      </div>
  </div>
</div>





<?php include 'includes/footer.php' ?>
