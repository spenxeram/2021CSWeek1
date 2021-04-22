<?php
echo basename($_SERVER['SCRIPT_NAME'], ".php");
$navlinks = ["home", "about", "contact"];
$current_script = basename($_SERVER['SCRIPT_NAME'], ".php");

function outputNav($navlinks,$current_script) {
  foreach ($navlinks as $link) {
    if($link == "home" && $current_script == "index") {
      $theclass = "active";
    } elseif ($link == $current_script) {
      $theclass = "active";
    } else {
      $theclass = '';
    }
    if($link == "home") {
      $href = "index";
    } else {
      $href = $link;
    }
    echo "<li><a href='{$href}.php' class='{$theclass}'>" . ucfirst($link) . "</a></li>";
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
          outputNav($navlinks, $current_script);
           ?>
        </ul>
      </nav>
      <hr>
    </header>
