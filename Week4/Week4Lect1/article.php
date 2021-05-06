<?php
include 'db.php';
$num_rows = 0;
if(isset($_GET['id'])) {
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM wp_posts WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$results = $stmt->get_result();
$num_rows = $results->num_rows;
$row = $results->fetch_assoc();
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
         <h1 class="display-3">
           <?php
           if($num_rows == 0) {
             echo "No article found...";
           } else {
             echo $row['post_title'];
           }
            ?>
         </h1>

       </div>
     </div>
     <div class="container">

       <hr>
       <button type="button" class="btn btn-light"><a href='index.php'> < Back</a></button>
       <div class="row">
         <?php
          if($num_rows == 0) {
            echo "...............";
          } else {
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
