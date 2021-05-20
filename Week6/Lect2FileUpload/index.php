<?php
include 'db.php';
$errors = [];
if(isset($_POST['submit'])) {
  $caption = $_POST['caption'];
  $file = $_FILES['img'];
  $fname = $file['name'];
  $ftype = $file['type'];
  $ftemp = $file['tmp_name'];
  $ferr = $file['error'];
  $fsize = $file['size'];
  $allowed_ext = ['png', 'jpeg', 'jpg'];

  // check to ensure there is no error with the upload
  if($ferr != 0) {
    $errors['ferr'] = "File error.";
  }

  // explore the filetype and check the type and extension
  $ftype = explode("/", $ftype);
  if($ftype[0] != "image" || !in_array(end($ftype), $allowed_ext)) {
    $errors['ftype'] = "Only images can be uploaded.";
  }

  // check filesize
  if($fsize > 5000000) {
    $errors['fsize'] = "File too large.";
  }

  if(empty($errors)) {
    $new_filename = uniqid('', true) . "." . end($ftype);
    $new_dest = "images/" . $new_filename;
    if(move_uploaded_file($ftemp, $new_dest)) {
      $sql = "INSERT INTO carousel (caption, image) VALUES (?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $caption, $new_dest);
      $stmt->execute();
      if($stmt->affected_rows == 1) {
        $errors["success"] = "Carousel image added successfully!";
      }
    }
  }

}

function getSlides($conn) {
  $sql = "SELECT * FROM carousel";
  $results = $conn->query($sql);
  $rows = $results->fetch_all(MYSQLI_ASSOC);
  return $rows;
}

$slides = getSlides($conn);

function outputIndicators($num_slides) {
  for ($i=0; $i < $num_slides ; $i++) {
    if($i == 0) {
      $class = 'class="active"';
    } else {
      $class = "";
    }
    echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"
    ' . $class . '></li>';
  }
}

function outputCarousel($slides) {
  for ($i=0; $i < count($slides) ; $i++) {
    if($i == 0) {
      $class = 'active"';
    } else {
      $class = "";
    }
    echo '<div class="carousel-item '. $class . '">
      <img class="d-block w-100" src="' . $slides[$i]['image'] .'" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
       <p>' . $slides[$i]['caption'] .'</p>
     </div>
    </div>';
  }
}


 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>ITEC File Upload 2021</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style media="screen">
      .carousel-item {
        height: 50vh;
      }

      .carousel-item img {
        object-fit: cover !important;
        height: 100%;
      }
    </style>

  </head>
  <body>
    <!-- fixed-top | sticky-top | fixed-bottom -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">ITEC Carousel 2021</a>
        </div>
    </nav>
    <!-- carousel will go here -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php
          outputIndicators(count($slides));
         ?>
      </ol>
      <div class="carousel-inner">
        <?php
          outputCarousel($slides)
         ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- end of carousel  -->


    <div class="container">
      <hr>
      <?php if (isset($errors['success'])): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $errors['success']; ?>
        </div>
      <?php elseif (!empty($errors)): ?>
        <div class="alert alert-danger" role="alert">
          <?php
          $erroutput = "";

          foreach ($errors as $key => $val) {
            $erroutput.=  " " . $val . " ";
          }
          echo $erroutput;
           ?>
        </div>
      <?php endif; ?>
      <div class="row">

        <div class="col-md-8 offset-md-2">
          <h3 class="display-4">Upload Carousel Images</h3>
          <hr>
          <form class="" action="index.php" method="post" enctype="multipart/form-data">
            <label for="caption">Caption</label>
            <input type="text" class="form-control" name="caption" value="" placeholder="Carousel caption here...">
            <label for="img">Carousel Image</label>
            <input type="file" name="img" class="form-control" value="">

            <button type="submit" name="submit" class="btn btn-block btn-outline-primary">Create New Carousel Image</button>
          </form>
          <?php

           ?>
        </div>

      </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
