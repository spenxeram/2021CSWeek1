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
  public $errors = [];

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function getUser() {
    $sql = "SELECT * FROM users WHERE ID = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->user_id);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->user = $results->fetch_assoc();
    }
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
      if(password_verify($this->user_password, $this->user['user_hash'])) {
        $this->loginUser();
      } else {
        $this->errors['login_password'] = "Password doesn't match!";
      }
    } else {
      $this->errors['login_username'] ="User not found!";
    }
  }

  public function checkRegistration($user_name, $user_email, $user_password, $user_password2) {
    // assign vals to properties
    $this->user_name = $user_name;
    $this->user_email = $user_email;
    $this->user_password = $user_password;
    $this->checkUserExists();

    // check if username is already taken
    if(!empty($this->user)) {
      $this->errors['create_username'] ="Username is already taken!";
    }
    // check email is valid
    if(!filter_var($this->user_email, FILTER_VALIDATE_EMAIL)) {
      $this->errors['create_email'] = "Invalid email!";
    }
    //check passwords match and are a certain length
    if($this->user_password != $user_password2 || strlen($this->user_password) < 5) {
      $this->errors['create_password'] = "Passwords don't match or are too short!";
    }

    if(empty($this->errors)) {
      $this->createUser();
    }


  }

  public function createUser() {
    $this->user_hash = password_hash($this->user_password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (user_name, user_email, user_hash) VALUES (?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sss", $this->user_name, $this->user_email, $this->user_hash);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      $this->user_id = $stmt->insert_id;
      $this->getUser();
      $this->loginUser();
    }
  }

  public function loginUser() {
    // create logged in use Session: id, name, role, loggedin
    $_SESSION['user_name'] = $this->user['user_name'];
    $_SESSION['user_id'] = $this->user['ID'];
    $_SESSION['user_role'] = $this->user['user_role'];
    $_SESSION['loggedin'] = true;
    $location = "Location: index.php?create=true";
    header($location);
  }

  public function logoutUser() {

  }

  public function deleteUser() {

  }

  public function updateUser() {

  }

  public function getPosts() {
    $sql "SELECT p.post_title, u.user_name, COUNT(c.ID) AS comment_count FROM posts p JOIN users u ON u.ID = p.post_author LEFT JOIN comments c ON c.comment_post = p.ID WHERE post_author = ? GROUP BY post_title";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $this->user_id);
    $stmt->execute();
    $results = $stmt->get_result();
    return $results->fetch_all(MYSQLI_ASSOC);
  }




}

 ?>
