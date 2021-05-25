<!doctype html>
<html lang="en">
   <head>
     <title>CS-204 ITEC MidTerm 2021</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link rel="stylesheet" href="style.css">
   </head>
   <body>
     <!-- fixed-top | sticky-top | fixed-bottom -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container">
             <a class="navbar-brand" href="#"><i class="fas fa-globe-americas"></i> ITEC Midterm: Solar System</a>
             <ul class="nav">
                 <li class="nav-item">
                     <a class="nav-link active" href="create.php">Add a Planet</a>
                 </li>
             </ul>
         </div>
     </nav>
<!-- justify-content-center = add nav content in the middle | justify-content-end = add nav content on the right -->

    <div class="jumbotron text-white front">
      <div class="container">
        <h1 class="display-3"><i class="fas fa-globe-asia"></i> Planets of the Solar System</h1>
        <p class="lead">Create a form to add planets to the Database</p>
        <button type="button" class="btn btn-lg btn-outline-primary"><a href="create.php">Add a Planet</a></button>
      </div>
    </div>

    <div class="container">
      <h3 class="display-4">Planets</h3>
      <hr>
      <div class="row">
        <!-- loop through planets and out put here -->
      </div>
    </div>

    <hr>
  <footer style="background:black;padding: 10%; color:white; text-align-center;">
    <h4 class="font-weight-thin">2021 ITEC Midterm</h4>
  </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
