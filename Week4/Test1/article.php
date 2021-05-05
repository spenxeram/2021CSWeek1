<?php
include 'conn.php';
var_dump($_GET);
if(!isset($_GET['id'])) {
  header("Location: index.php");
}
$search = $_GET['id'];
$query = "SELECT *
FROM wp_posts
WHERE ID = $search";
$result = $conn->query($query);
var_dump($result);
if ($result != false) {
  $row = $result->fetch_assoc();
}

 ?>
<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <!-- fixed-top | sticky-top | fixed-bottom -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MYSQLi Connect</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <button type="button" class="btn btn-outline-default"><a href="index.php"><< Back</a></button>
          <?php if ($result == false || $result->num_rows == 0): ?>
            <h1 class="display-3">No article found!</h1>
          <?php else: ?>
          <h1 class="display-3"><?php echo $row['post_title']; ?> </h1>
          <?php endif; ?>
        </div>
      </div>

    <div class="container">

      <div class="row">
        <?php
        if ($result != false) {
          echo $row['post_content'];
        }

         ?>

      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
