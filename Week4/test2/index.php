<?php
include 'includes/head.php';
 ?>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-3">MYSQLi and WP Database</h1>
        <p class="lead">Query the WordPress Database</p>
        <form class="" action="search.php" method="post">
          <input type="text" name="search" class="form-control mb-4 mt-4" value="" placeholder="Search...">
          <button type="submit" class="btn btn-lg btn-outline-primary">Search Database</button>
        </form>

      </div>
    </div>
    <div class="container">
      <hr>
      <h3 class="display-4">Recent Articles</h3>
      <hr>

    </div>
<?php
include 'includes/footer.php';
 ?>
