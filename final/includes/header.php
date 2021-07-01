<?php
session_start();
if(!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = false;
}
include 'db.php';
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style media="screen">
    .jumbotron {
      background-image: url(images/students.png);
      background-size: auto;
    }
    .jumbotron .container {
      background: #ffffffa6;
      padding: 40px;
    }
    footer {
      background: #03a9f4;
      padding: 10%;
      text-align: center;
      color: white;
    }
    </style>
  </head>
  <body>
    <!-- fixed-top | sticky-top | fixed-bottom -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">My ITEC Classmates</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php"><i class="fas fa-user-friends"></i> Add Classmate</a>
                    </li>
                </ul>
                <ul class="navbar-nav float-left">
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login <span class="sr-only">(current)</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
