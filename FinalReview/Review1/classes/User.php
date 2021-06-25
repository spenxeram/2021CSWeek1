<?php

class User {

  public $user_id;
  public $user_name;
  public $user_email;
  public $user_hash;
  public $user_password;
  public $conn;
  public $user = [];
  public $users = [];
  public $errors = [];

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function getUsername() {
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->user_name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->user = $results->fetch_assoc();
    }
  }

  public function checkLogin($user_name, $password) {
    $this->user_name = $user_name;
    $this->user_password = $password;
    $this->getUsername();
    if(!empty($this->user_name)) {
      if(password_verify($this->user_password, $this->user['user_hash'] )) {
        $this->login();
      } else {
        $this->errors['login_password'] = "Password fail!";
      }
    } else {
      $this->errors['login_username'] = "This username does not exist!";
    }
  }
  public function login() {

  }

  public function checkCreate($user_name, $user_email, $password, $confirm_password) {

  }

  public function createAccount() {

  }

  public function logout() {
    $_SESSION = [];
    session_destroy();
    header("Location: index.php");
  }

}

 ?>
