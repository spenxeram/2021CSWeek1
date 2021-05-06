<?php
include 'db.php';
$num_rows = 0;
if(isset($_GET['author'])) {
  $author = $_GET['author'];
  $sql = "SELECT wpu.ID AS author_id, wpp.ID, wpp.post_date, wpp.post_title, wpp.post_content, wpu.user_nicename
  FROM wp_posts wpp
  JOIN wp_users wpu ON wpu.ID = wpp.post_author
  WHERE wpu.ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $author);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows != 0) {
    $num_rows = $result->num_rows;
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $author = $rows[0]['user_nicename'];
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
          <?php if ($num_rows != 0): ?>
            <h1 class="display-3"><?php echo $author; ?></h1>
          <?php else: ?>
            <h1>Author not found!</h1>
          <?php endif; ?>

        </div>
      </div>
      <div class="container recent-articles">
        <div class="row">
          <?php
          if($num_rows == 0) {
            echo "<h3 class='mb-5'>No results found try again....</h3>";
          } else {
           foreach ($rows as $row) {
             $post = filter_var(substr($row['post_content'],0, 55), FILTER_SANITIZE_STRING);
             echo "<div class='col-md-6'>
                   <h3><a href='article.php?id={$row['ID']}'>{$row['post_title']}</a></h3>
                   <p>{$post}...</p></div>";
           }
         }
           ?>


        </div>
      </div>


      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
  </html>
