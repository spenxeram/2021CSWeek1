<?php
include 'Animal.php';

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $cat = new Animal("cat");
    echo $cat->sound();
    $cat = new Animal("dog");
    echo $cat->sound();
     ?>
     <br>
     <?php
     $lion = new Lion("lion", "male");
     echo $lion->sound();
      ?>
  </body>
</html>
