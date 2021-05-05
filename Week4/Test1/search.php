<?php
include 'conn.php';
$search = $_POST['search'];
$query = "%" . $search . "%";
//$query = "Xin Chao World";
echo $query;
$stmt = $conn->prepare("SELECT * FROM wp_posts WHERE post_title LIKE ? ORDER BY comment_count DESC LIMIT 10");
$stmt->bind_param("s", $query);
$stmt->execute();
$result = $stmt->get_result();
//var_dump($result->fetch_assoc());
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
          <h1 class="display-3">Search Results: <?php echo $result->num_rows; ?> </h1>
          <p class="lead">Search Again...</p>
          <form class="" action="search.php" method="post">
            <input type="text" name="search" class="mt-4 mb-4 form-control"value="">
            <button type="submit" class="btn btn-lg btn-info">Search</button>
          </form>
        </div>
      </div>
    <div class="container">

      <div class="row">
        <?php

        if($result->num_rows != 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($rows as $row) {
          echo "<div class='col-md-6'>
                <h2><a href='article.php?id={$row['ID']}'>{$row['post_title']}</a></h2>
                <p>". htmlspecialchars(substr($row['post_content'], 0, 50)) . "</p></div>";
        }
      } else {
        echo "<h3 class='display-4'>No results found....</h3>";
      }
         ?>

      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
