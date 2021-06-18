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

  public function checkUserExists() {
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->user_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1) {
     $this->user = $result->fetch_assoc();
   }
  }

  public function getUsers() {

  }

  public function checkLogin($user_name, $user_password) {
    $this->user_name = $user_name;
    $this->user_password = $user_password;
    //#1) Check that user exists in DB
    //#2) if user exists validate user pw against db hash
    $this->checkUserExists();
    if(!empty($this->user)) {

    } else {
      // user not found
    }
  }

  public function checkRegistration() {

  }

  public function loginUser() {

  }

  public function logoutUser() {

  }

  public function deleteUser() {

  }

  public function updateUser() {

  }




}

 ?>
