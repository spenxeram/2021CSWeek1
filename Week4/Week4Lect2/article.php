<?php
include 'db.php';
$title = "There were no results found, try again...";
$num_rows = 0;
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT wpu.ID AS author_id, wpp.post_date, wpp.post_title, wpp.post_content, wpu.user_nicename
  FROM wp_posts wpp
  JOIN wp_users wpu ON wpu.ID = wpp.post_author
  WHERE wpp.ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows != 0) {
    $num_rows = $result->num_rows;
    $row = $result->fetch_assoc();
    $title = $row['post_title'];
    $date = $row['post_date'];
    $body = $row['post_content'];
    $author = $row['user_nicename'];
    $author_id = $row['author_id'];
  }

} else {
  //output error - article not found
}
 ?>


  <!doctype html>
  <html lang="en">
    <head>
      <title>CS 204 MYSQLi Week 4</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
      <!-- fixed-top | sticky-top | fixed-bottom -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
              <a class="navbar-brand" href="#">ITEC CS 204</a>
          </div>
      </nav>
      <div class="jumbotron jumbotron-fluid article">
        <div class="container">
          <button type="button" class="btn btn-outline-light"><a href='index.php'> < Back</a></button>
          <h1 class="display-3"><?php echo $title; ?></h1>
          <?php if ($num_rows != 0): ?>
            <h3>Author: <a href="author.php?author=<?php echo $author_id; ?>"> <?php echo $author; ?></a></h3>
          <?php endif; ?>
        </div>
      </div>
      <div class="container recent-articles">
        <div class="row">
          <?php
            if($num_rows != 0) {
              echo $body;
            }
           ?>


        </div>
      </div>


      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
  </html>
