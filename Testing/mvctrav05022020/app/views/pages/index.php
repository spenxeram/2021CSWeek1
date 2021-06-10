<?php
include APPROOT . "/views/inc/header.php";
 ?>
<div class="jumbotron">
  <div class="container">
  <h1>
    <?php
      if(isset($data)) {
        echo $data['title'];
      }
     ?>
</h1>

  </div>
</div>
<div class="container">
  <ul>


  <?php
  foreach($data['posts'] as $post) {
    echo "<li>" . $post->title . "</li>";
  }
  ?>
  </ul>
</div>

<?php
include APPROOT . "/views/inc/footer.php";
 ?>
