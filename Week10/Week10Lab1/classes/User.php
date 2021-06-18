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
  public $user_exists;
  public $errors = [];

  // constuctor
  public function __construct($conn) {
    $this->conn = $conn;
  }
  public function getUser() {
  }

  public function checkUserExists() {
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->user_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1) {
     $this->user = $result->fetch_assoc();
   }
  }

  public function getUsers() {

  }

  public function loginUser() {
    $_SESSION['user_name'] = $this->user['user_name'];
    $_SESSION['loggedin'] = true;
    $_SESSION['user_id'] = $this->user['ID'];
    $_SESSION['user_role'] = $this->user['user_role'];
    $location = "Location: index.php?login=true";
    header($location);
  }

  public function createUser() {

  }

  public function checkLogin($user_name, $password) {
    $this->user_name = $user_name;
    $this->user_password  = $password;
    $this->checkUserExists();
    if(!empty($this->user)) {
      $msg = "User  found!";
      Messenger::setMsg($msg, 'success', 'fa fa-user');
      if(password_verify($this->user_password, $this->user['user_hash'])) {
        $this->loginUser();
      } else {
        // message out error
      }
    } else {
      $msg = "User not found!";
      Messenger::setMsg($msg, 'danger', 'fa fa-user');
      array_push($this->errors, $msg);
    }

  }

  public function checkRegistration($user_name, $user_email, $user_password, $user_password2) {
    $this->user_name = $user_name;
    $this->user_password  = $user_password;
    $this->user_email = $user_email;
    $this->checkUserExists();
    if($this->user_exists) {
      $this->errors['user_exists'] = "This user already exists!";
    }

    if(!filter_var($this->user_email, FILTER_VALIDATE_EMAIL)) {
      $this->errors['user_email'] = "This email is invalid!";
    }

    if($this->user_password != $user_password2) {
      $this->errors['user_password'] = "Passwords don't match or are too short!";
    }


    if(empty($this->errors)) {
      $this->user_hash = password_hash($this->user_password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (user_name, user_email, user_hash) VALUES (?,?,?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("sss", $this->user_name, $this->user_email, $this->user_hash);
      $stmt->execute();
      if($stmt->affected_rows == 1) {
        $this->user_id = $stmt->insert_id;
        $this->getUser();
        $this->loginUser();
      } else {
        return 0;
      }
    } else {
      var_dump($this->errors);
    }

  }

  public function checkUserExists() {
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->user_name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->user = $results->fetch_assoc();
      $this->user_exists = true;
    } else {
      $this->user_exists = false;
    }
  }




}

 ?>
