<?php

function getGallery($conn) {
  $sql = "SELECT * FROM gallery";
  $results = $conn->query($sql);
  $rows = $results->fetch_all(MYSQLI_ASSOC);
  outputGallery($rows);
}

function outputGallery($rows) {
  foreach ($rows as $row) {
    echo "<div class='gallery-img'><img src='{$row['img']}'>
          <h3>{$row['caption']}</h3></div>";
  }
}


function createGalleryItem($conn, $caption, $file, &$errors) {
  if($caption == '') {
    $errors['caption'] = "Caption cannot be empty!";
  }
  $imgurl = validateFile($file, $errors);
  var_dump($imgurl);
  $sql = "INSERT INTO gallery (caption, img) VALUES (?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $caption, $imgurl);
  $stmt->execute();
}
