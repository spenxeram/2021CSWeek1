<?php
include 'db.php';
$num_rows = 0;
if(isset($_POST['submit'])) {
  $search = $_POST['search'];
  // unsanitized input/dangerous and open website to SQL injection attacks/ use prepared statement instead
  // $query = "SELECT * FROM wp_posts WHERE post_title LIKE '%$search%'";
  // $results = $conn->query($query);
  // var_dump($results);
  // $rows = $results->fetch_all(MYSQLI_ASSOC);
  // var_dump($rows);
  $search_term = "%{$search}%";
  $stmt = $conn->prepare("SELECT ID, post_title, post_content FROM wp_posts WHERE post_title LIKE ?");
  $stmt->bind_param("s", $search_term);
  $stmt->execute();
  $results = $stmt->get_result();
  // get the number of returned rows and assign it to num_rows so users can see
  $num_rows = $results->num_rows;
  $rows = $results->fetch_all(MYSQLI_ASSOC);
}

 ?>


 <!doctype html>
 <html lang="en">
   <head>
     <title>CS 204 Week 4 | MYSQLi</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
   </head>
   <body>
     <!-- fixed-top | sticky-top | fixed-bottom -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container">
             <a class="navbar-brand" href="#">CS 204 MSQLi</a>
         </div>
     </nav>
     <div class="jumbotron jumbotron-fluid">
       <div class="container">
         <h1 class="display-3">Number of results: <?php echo $num_rows; ?></h1>
         <p class="lead">Perform another search...</p>
         <form class="" action="search.php" method="post">
           <input type="text" name="search" placeholder="Search for an article..." class="form-control mt-4 mb-4" value="">
           <button type="submit" class="btn btn-outline-primary btn-lg" name="submit">Search Articles</button>
         </form>
       </div>
     </div>
     <div class="container">
       <hr>
       <div class="row">
         <?php
         if($num_rows == 0) {
           echo "<h2 class='diplay-4'>No articles were found....</h2>";
         } elseif (isset($rows)) {
           foreach ($rows as $row) {
             $content = filter_var(substr($row['post_content'], 0, 55), FILTER_SANITIZE_STRING);
             echo "<div class='col-md-6'>
                   <h3><a href='article.php?id={$row['ID']}'>
                   {$row['post_title']}</a></h3>
                   <p> {$content} </p>
                   </div>";
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
