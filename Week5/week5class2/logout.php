<?php
  // start the session before destroying it
 session_start();
 // unset everythign from the Session
 $_SESSION = [];

 // destroy the session
 session_destroy();

 // redirect user back to homepage

 header("Location: index.php");


 ?>
