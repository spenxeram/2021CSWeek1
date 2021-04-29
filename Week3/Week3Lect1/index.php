<?php
$error = false;
if(isset($_POST['submit'])) {
  // sanitize user inputs
  var_dump($_POST);
  $username = htmlspecialchars($_POST['username']);
  echo $username;
  $email = htmlspecialchars($_POST['email']);
  $password1 = htmlspecialchars($_POST['password1']);
  $password2 = htmlspecialchars($_POST['password2']);


  //validate user inputs
    // check username
  if(strlen($username) < 5 || strlen($username) > 20) {
    $username_warning = "Username must be between 5-20 characters!";
    $error = true;
  }
    // check user Email
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email_warning = "Invalid email submitted!";
    $error = true;
  }
    // check pw 1
  if(strlen($password1) < 5) {
    $password1_warning = "Password must be more than 5 characters!";
    $error = true;
  }

  if($password1 != $password2) {
    $password2_warning = "Passwords don't match, try again!";
    $error = true;
  }


}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>CS 204: Week 3 Form Validation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style media="screen">
      .warning {
        color: red;
        font-style: italic;
      }
    </style>
  </head>
  <body>
    <!-- fixed-top | sticky-top | fixed-bottom -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">ITEC Form Validation</a>
        </div>
    </nav>
    <div class="jumbotron">
      <h1 class="display-3">Form Validation in PHP</h1>
      <p class="lead">Using filter_var() function and flags.</p>
    </div>
    <div class="container">
      <?php var_dump($error); ?>
      <?php if(isset($error)) if ($error): ?>
        <div class="alert alert-danger" role="alert">
            Your form has some problems, please check for errors!
        </div>
      <?php endif; ?>
      <div class="row">

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">User Name</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($username)) {
                echo $username;
              }?>">
              <div class="warning"><?php if (isset($username_warning)) {
                echo $username_warning;
              } ?></div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php if (isset($email)) {
                echo $email;
              }?>">
              <div class="warning"><?php if (isset(  $email_warning)) {
                echo $email_warning;
              } ?></div>
            </div>
            <div class="mb-3">
              <label for="password1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password1" value="">
              <div class="warning"><?php if($password1_warning) {
                echo $password1_warning;
              } ?></div>
            </div>
            <div class="mb-3">
              <label for="password2" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="password2" value="">
              <div class="warning"><?php if($password2_warning) {
                echo $password2_warning;
              } ?></div>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Subscribe</label>

            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
