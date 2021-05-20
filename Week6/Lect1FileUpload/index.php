<?php
include 'func/db.php';
include 'func/gallerymanager.php';
include 'func/filemanager.php';
$errors = [];
if (isset($_POST['submit'])) {
  $caption = $_POST['caption'];
  createGalleryItem($conn, $caption, $_FILES, $errors);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ITEC Img Gallery</title>
    <style media="screen">
    img {
  max-width: 100%;
}

.gallery {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 3%;
  width: 90%;
  margin: 30px auto;
}
* {
  font-family: sans-serif;
  font-weight: lighter;
}
    </style>
  </head>
  <body>
    <h2>ITEC Image Gallery</h2>
    <form class="" action="index.php" method="post" enctype="multipart/form-data">
      <label for="caption">Caption</label>
      <input type="text" name="caption" placeholder="Write an image caption...." value=""> <br>

      <label for="image">Upload Your Image</label> <br>
      <input type="file" name="image" value=""><br>

      <button type="submit" name="submit">Submit</button>
    </form>
    <div class="gallery">
      <?php
        getGallery($conn);
       ?>
    </div>

  </body>
</html>
