<?php

include 'func/filemanager.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ITEC Img Gallery</title>
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

    <?php

    var_dump($_FILES);

    var_dump($_POST);
     ?>
  </body>
</html>
