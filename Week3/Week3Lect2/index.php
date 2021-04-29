<?php
$error = false;
if(isset($_POST['submit'])) {
  // sanitize user inputs to be used later
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password1 = htmlspecialchars($_POST['password1']);
  $password2 = htmlspecialchars($_POST['password2']);

  //validate user inputs

  //validate username
  if(strlen($username) < 5 || strlen($username) > 20) {
    $username_warning = "Username must be between 5 - 20 characters!";
    $error = true;
  }

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_warning = "Invalid Email Submitted!";
    $error = true;
  }

  if(strlen($password1) < 5) {
    $password1_warning = "Password must be more than 5 characters!";
    $error = true;
  }

  if($password1 != $password2) {
    $password1_warning = "Passwords don't match!";
    $error = true;
  }
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title></title>
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
            <a class="navbar-brand" href="#">ITEC Week 3.2 Filtering Input</a>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <div class="row">
          <h1 class="display-3">Filtering User Input In PHP</h1>
          <p class="lead">Using the filter_var() function and constants</p>
        </div>
      </div>
    </div>
    <div class="container">
      <?php if ($error): ?>
        <div class="alert alert-danger">There was a problem with your form!</div>
      <?php elseif ($error == false && isset($_POST['submit'])): ?>
        <div class="alert alert-success">Thank you for submitting the form!</div>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-6">
          <form class="" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="mb-2">
               <label for="username" class="form-label">User Name</label>
               <input type="text" class="form-control" name="username" value="<?php if(isset($username)) {
                 echo $username;
               } ?>">
               <div class="warning"><?php if (isset($username_warning)) {
                 echo $username_warning;
               } ?></div>
             </div>
             <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php if(isset($email)) {
                  echo $email;
                } ?>">
                <div class="warning"><?php if(isset($email_warning)) {
                  echo $email_warning;
                } ?></div>
              </div>
              <div class="mb-2">
                 <label for="password1" class="form-label">Password</label>
                 <input type="password" class="form-control" name="password1" value="<?php if(isset($password1)) {
                   echo $password1;
                 } ?>">
                 <div class="warning"><?php if (isset($password1_warning)) {
                   echo $password1_warning;
                 } ?></div>
               </div>
               <div class="mb-2">
                  <label for="password2" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" name="password2">
                  <div class="warning"><?php if (isset($password2_warning)) {
                    echo $password2_warning;
                  } ?></div>
                </div>
              <button type="submit" class="btn btn-dark btn-lg btn-block mb-5" name="submit">Submit Form</button>
          </form>
        </div>
        <div class="col-md-6">
          <?php if ($error == false && isset($_POST['submit'])): ?>
            <img src="https://i.imgur.com/jb268vM.gif" alt="">
          <?php endif; ?>
        </div>
      </div>
      <?php
      var_dump($_POST);
       ?>
    </div>

    <footer style="background:black; color: white; text-align:center; padding: 30px;">
      <h2>Itecky Design <?php echo date("Y"); ?></h2>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
