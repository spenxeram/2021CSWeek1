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
      <div class="row">
        <form class="" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="mb-2">
             <label for="username" class="form-label">User Name</label>
             <input type="text" class="form-control" name="username">
             <div class="warning">User name must be between 5 - 20 characters!</div>
           </div>
           <div class="mb-2">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email">
              <div class="warning">User name must be between 5 - 20 characters!</div>
            </div>
            <div class="mb-2">
               <label for="password1" class="form-label">Password</label>
               <input type="password" class="form-control" name="password1">
               <div class="warning">User name must be between 5 - 20 characters!</div>
             </div>
             <div class="mb-2">
                <label for="password2" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password2">
                <div class="warning">User name must be between 5 - 20 characters!</div>
              </div>
            <button type="submit" class="btn btn-dark btn-lg btn-block mb-5" name="submit">Submit Form</button>
        </form>
      </div>
    </div>

    <footer style="background:black; color: white; text-align:center; padding: 30px;">
      <h2>Itecky Design <?php echo date("Y"); ?></h2>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
