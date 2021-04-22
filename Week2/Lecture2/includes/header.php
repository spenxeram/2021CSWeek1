<?php
echo basename($_SERVER['SCRIPT_NAME'], ".php");
$navLinks = ["home", "about", "contact"];

function outputNav($navLinks) {
  $output = "";
  foreach ($navLinks as $link ) {
    if($link == "home") {
      $href = "index";
    } else {
      $href = $link;
    }
    $output.= "<li><a href='{$href}.php'>". ucfirst($link) ."</a></li>";
  }
  echo $output;
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SimpDesign | Home</title>
    <style media="screen">
    *{
      font-family: sans-serif;
      font-weight: lighter;
    }
    footer {
      background: black;
      color: white;
      text-align: center;
      padding: 20px;
    }
    header {
    background: #0cb9b9;
    padding: 5px;
    color: white;
    }
    </style>
  </head>
  <body>
    <header>
      <h1>SimpDesign</h1>
      <nav>
        <ul>
          <?php
            outputNav($navLinks);
           ?>
        </ul>
      </nav>
    </header>
