<?php
include 'User.php';
include 'Student.php';
include 'Teacher.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>School Records</h1>
    <hr>
    <?php
      $student1 = new User("Yumiko");
      echo $student1->introduce();
      ?>
      <br>
      <hr>
      <?php
      $student2 = new Student("Shinosuke", "Graphic Design");
      echo $student2->introduce();
       ?>
       <br>
       <hr>
       <?php
       $teacher = new Teacher("Sam", "Physics");
       echo $teacher->introduce();
        ?>
  </body>
</html>
