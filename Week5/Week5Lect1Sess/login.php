<?php
session_start();
if(!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = false;
  }
if(isset($_POST['username'])) {
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['loggedin'] = true;
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $_SESSION['password'] = $password;
  header("Location: index.php");
}
 ?>

 <h2>Log in with your user name here:</h2>
 <form class="" action="login.php" method="post">
   <label for="username">Username</label>
   <input type="text" name="username" value="">
   <label for="password">Password</label>
   <input type="password" name="password" value="">
   <button type="submit" name="button">Submit</button>
 </form>
 <?php
 $password2 = "hello";
 if(password_verify($password2, $_SESSION['password'])) {
   echo "Your password matches the hash!";
 } else {
   echo "Password and hash don't match!";
 }
var_dump($_SESSION);
  ?>
