<?php
include 'db.php';
$results = $conn->query("SELECT * FROM wp_posts ORDER BY post_date DESC LIMIT 12");
$rows = $results->fetch_all(MYSQLI_ASSOC);

include 'includes/header.php';
 ?>


     <div class="jumbotron jumbotron-fluid">
       <div class="container front">
         <h1 class="display-3">MYSQLi Connect</h1>
         <p class="lead">Query the WordPress Database using MYSQLi</p>
         <form class="" action="search.php" method="post">
           <input type="text" name="search" class="form-control mt-4 mb-4" placeholder="Search the database..." value="">
           <button type="submit" class="btn btn-outline-primary" name="submit">Search Database</button>
         </form>
       </div>
     </div>
     <div class="container recent-articles">
       <h2 class="font-weight-light">Recent Articles</h2>
       <hr>
       <div class="row">
         <?php
         foreach ($rows as $row) {
           $post = filter_var(substr($row['post_content'],0, 55), FILTER_SANITIZE_STRING);
           echo "<div class='col-md-6'>
                 <h3><a href='article.php?id={$row['ID']}'>{$row['post_title']}</a></h3>
                 <p>{$post}...</p></div>";
         }
          ?>


       </div>
     </div>
<?php include 'includes/footer.php'; ?>
