<?php

class User {

  public $user_id;
  public $user_name;
  public $user_email;
  public $user_password;
  public $user_hash;
  public $user_role;
  public $user = [];
  public $users = [];
  public $conn;

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function getUser() {

  }

  public function getUsers() {

  }

  public function checkLogin() {

  }

  public function checkRegistration() {

  }

  public function loginUser() {

  }

  public function logoutUser() {

  }

  public function checkUserExists() {

  }

  public function deleteUser() {

  }

  public function updateUser() {
    
  }




}

 ?>
