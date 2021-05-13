<?php
session_start();
$_SESSION['user'] = 1;
$_SESSION['loggedin'] = true;
$_SESSION['username'] = "Spencer";
include 'db.php';
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>CS 204 MYSQLi Week 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<!-- fixed-top | sticky-top | fixed-bottom -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">CS204 Week 5</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="user.php"><i class="fas fa-user"> </i><?php echo $_SESSION['username']; ?></a>
                </li> |
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php ">Logout</a>
                </li>
              <?php else: ?>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Login</a>
                </li>
              <?php endif; ?>

              </ul>
        </div>
    </div>
</nav>
