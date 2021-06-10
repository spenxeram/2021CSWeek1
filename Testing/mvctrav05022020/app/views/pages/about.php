<?php
include APPROOT . "/views/inc/header.php";
 ?>
<div class="jumbotron">
  <div class="container">
  <h1><?php
    if(isset($data) && $data != null) {
      echo $data['title'];
    }
   ?></h1>

  </div>
</div>


<?php
include APPROOT . "/views/inc/footer.php";
 ?>
