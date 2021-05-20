<!doctype html>
<html lang="en">
  <head>
    <title>ITEC File Upload 2021</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <!-- fixed-top | sticky-top | fixed-bottom -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">ITEC Carousel 2021</a>
        </div>
    </nav>
    <!-- carousel will go here -->



    <!-- end of carousel  -->


    <div class="container">
      <hr>
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h3 class="display-4">Upload Carousel Images</h3>
          <hr>
          <form class="" action="index.php" method="post" enctype="multipart/form-data">
            <label for="caption">Caption</label>
            <input type="text" class="form-control" name="caption" value="" placeholder="Carousel caption here...">
            <label for="img">Carousel Image</label>
            <input type="file" name="img" class="form-control" value="">

            <button type="submit" name="submit" class="btn btn-block btn-outline-primary">Create New Carousel Image</button>
          </form>

        </div>
      </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
