<?php
$nav_links = ['home', 'docs', 'about', 'contact'];
$current_page = basename($_SERVER['SCRIPT_NAME'], ".php");

function outputNav($nav_links, $current_page) {
  $output = "";
  foreach($nav_links as $link) {
    $href = $link;
    if($link == "home") {
      $href = 'index';
    }
    $class = '';
    if($href == $current_page) {
      $class = "active";
    }
    $output.= "<li><a href='{$href}.php' class='{$class}'>{$link}</a></li>";
  }
  echo $output;
}
 ?>

<!doctype html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="twitter:" content="19709452298">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Your Name and Student ID</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="images/logo.png" alt="">
    </div>
    <div class="hamburger">
      <a href="#">☰</a>
    </div>
    <nav>
      <ul>
<!-- PHP outputNav here -->
    <?php
      outputNav($nav_links, $current_page);
     ?>

      </ul>
    </nav>
  </header>
