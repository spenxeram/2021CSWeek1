<?php
 session_start();
 echo "This comment was sent by ". $_SESSION['user_name']  .": " . $_POST['comment'];
 ?>
