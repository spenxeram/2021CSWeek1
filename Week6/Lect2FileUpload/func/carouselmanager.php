<?php

function createCarousel($caption, $file, $errors, $conn) {
  $img_path = validateFile($file, $errors);
  $sql = "INSERT INTO carousel (caption, image) VALUES (?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $caption, $img_path);
  $stmt->execute();
  if($stmt->affected_rows == 1) {
    $errors["success"] = "Carousel image added successfully!";
  }
}

function getSlides($conn) {
  $sql = "SELECT * FROM carousel";
  $results = $conn->query($sql);
  $rows = $results->fetch_all(MYSQLI_ASSOC);
  return $rows;
}

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
