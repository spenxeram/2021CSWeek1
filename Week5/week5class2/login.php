<?php
session_start();
if(!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = false;
}

if(isset($_POST['username'])) {
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['loggedin'] = true;
  $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

}
 ?>

<h2>Login with a user name</h2>
<form class="" action="login.php" method="post">
  <input type="text" name="username" placeholder="Enter any username..." value=""> <br>
  <input type="text" name="password" placeholder="enter a password..." value="">
  <button type="submit" name="button">Login</button>
</form>

<?php
echo $password_hash;
$password_string = "hello";
echo "<br>";
if(password_verify($password_string, $password_hash)) {
  echo "the password matches the hash";
} else {
  echo "the passowrd does not match the hash";
}
var_dump($_SESSION); ?>
