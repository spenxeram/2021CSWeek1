<?php
//user errors assoc array to track errors and use as a bool
// decide on log in / creating account. Passed by reference
$errors = [];
if(isset($_POST['login'])) {
  // process the login form, pass the post, errors (by ref) and db CONN
  checkLogin($_POST, $errors, $conn);
} elseif (isset($_POST['create'])) {
    // process the create form, pass the post, errors (by ref) and db CONN
  checkCreate($_POST, $errors, $conn);
}

//check the login form for errors
function checkLogin($post, &$errors, $conn) {
  $name = $_POST['name'];
  $password = $_POST['password'];
  //username checks, first check db if user exists
  // checkforuser() returns either 0 (doesnt exist) or the user ID
  if(checkForUser($name, $conn) != 1) {
    $errorMsg = "Username not found!";
    $errors['login_username'] = $errorMsg;
  } else {
    // if user exists, get their record and check the user submitted pw
    // against the hash in the DB
    $user_row = getUserRow($name, $conn);
    if(!password_verify($password, $user_row['user_hash'])) {
      $errorMsg = "Incorred Password!";
      $errors['login_password'] = $errorMsg;
    }
  }
  // if there are no errors in the array then login and redirect
  if(empty($errors)) {
    loginUser($user_row['user_name'], $user_row['ID'], $user_row['user_role']);
  }
}

// checks the create new user form
function checkCreate($post, &$errors, $conn) {
  $username = $post['username'];
  $email = $post['email'];
  $password1 = $post['password1'];
  $password2 = $post['password2'];

  //check username length, the ensure the name doesn't exist in the DB
  if(!minmaxChars($username, 5, 20)) {
    $errorMsg = "Username must be between 5-20 characters long!";
    $errors['create_username'] = $errorMsg;
  } elseif (checkForUser($username, $conn) == 1) {
    $errorMsg = "Username already take!";
    $errors['create_username'] = $errorMsg;
  }
  // validate email, should add sanitation as well
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMsg = "Invalid email!";
    $errors['create_email'] = $errorMsg;
  }
  // check pw length and matching
  if(!minmaxChars($password1, 5)|| $password1 != $password2) {
    $errorMsg = "Password is too short or does not match!";
    $errors['create_password'] = $errorMsg;
  }

  // if there are no errors, insert the user into the db and login
  if(empty($errors)) {
    $user_id = createUser($conn, $username, $email, $password1);
    if($user_id != 0) {
      loginUser($username, $user_id, 2);
    }
  }
}

//query the DB to see if a user exists. returns num_rows
function checkForUser($username, $conn) {
  $sql = "SELECT * FROM users WHERE user_name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->num_rows;
}

// fetch a user from the DB based on username
function getUserRow($username, $conn) {
  $sql = "SELECT * FROM users WHERE user_name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $results = $stmt->get_result();
  return $results->fetch_assoc();
}

// inserts a new user into the db
function createUser($conn, $user_name, $user_email, $user_password) {
  $user_hash = password_hash($user_password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (user_name, user_email, user_hash) VALUES (?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $user_name, $user_email, $user_hash);
  $stmt->execute();
  if($stmt->affected_rows == 1) {
    return $stmt->insert_id;
  } else {
    return 0;
  }
}

// character length checker
function minmaxChars($string, $min, $max = 1000) {
  if(strlen($string)< $min || strlen($string) > $max) {
    return false;
  } else {
    return true;
  }
}

// log user in function, sets $_SESSION values and redirects to home
function loginUser($user_name, $user_id, $user_role) {
  $_SESSION['loggedin'] = true;
  $_SESSION['user_name'] = $user_name;
  $_SESSION['user_id'] = $user_id;
  $_SESSION['user_role'] = $user_role;
  header("Location: index.php?login=success");
}
