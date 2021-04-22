<?php
$navlinks = ["home", "about", "contact"];

function outputNav($navlinks) {
  foreach ($navlinks as $link) {
    echo "<li><a href='{$link}.php'>{$link}</a></li>";
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      * {
        font-family: sans-serif;
      }
      .active {
        font-family: impact;
        color: red;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>SimpDoc</h1>
      <nav>
        <ul>
          <?php
          outputNav($navlinks);
           ?>
        </ul>
      </nav>
      <hr>
    </header>
