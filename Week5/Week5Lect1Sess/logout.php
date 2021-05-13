<?php
// start the session before destroying it
session_start();
// unset everything from SESSION array
$_SESSION = [];
// destroy the session
session_destroy();
// redirect logged out user back to the home page
header("Location: index.php");
 ?>
