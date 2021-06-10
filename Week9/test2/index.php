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
  <h1>University People</h1>
  <hr>
  <?php
  $user1 = new User("Yumiko");
  echo $user1->introduce();
   ?>
<br>
   <hr>

   <?php
   $user2 = new Student("LanLan", "Architecture");
   echo $user2->introduce();
    ?>

    <br>
       <hr>

       <?php
       $user3 = new Teacher("Mr Sam", "Economics");
       echo $user3->introduce();
        ?>

  </body>
</html>
