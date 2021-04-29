<?php

if(isset($_POST['submit'])) {
  // sanitize user inputs
  var_dump($_POST);

  //validate user inputs
}

 var_dump($_POST);

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
      <div class="row">

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">User Name</label>
              <input type="text" class="form-control" id="username" name="username">
              <div class="warning">Output error with PHP</div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="">
              <div class="warning">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="password1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password1" value="">
              <div class="warning">Password must be 5 characters long</div>
            </div>
            <div class="mb-3">
              <label for="password2" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="password2" value="">
              <div class="warning">Password must match!</div>
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
