<?php


class User {

  public $user_id;
  public $user_name;
  public $user_password;
  public $user_hash;
  public $user_email;
  public $user = [];
  public $users = [];
  public $conn;

  // constuctor
  public function __construct($conn) {
    $this->conn = $conn;
  }




}

 ?>
