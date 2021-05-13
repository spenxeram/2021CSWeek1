<?php
include 'includes/header.php';

if(isset($_POST['create'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];

  // first check if username already exists -> error

  $sql = "SELECT * FROM users WHERE user_name = ?";
  // prepare the statemetn
  $stmt = $conn->prepare($sql);
  // bind params
  $stmt->bind_param("s", $username);
  // execute the statement
  $stmt->execute();
  // fetch result
  $result = $stmt->get_result();
  if($result->num_rows != 1) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL) && $password1 == $password2) {
      // CREATE USER AND LOG in
      $hash = password_hash($password1, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (user_name, user_email, user_hash) VALUES (?,?,?)";
      $stmt = $conn->prepare($sql);
      // bind params
      $stmt->bind_param("sss", $username, $email, $hash);
      // execute the statement
      $stmt->execute();

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
      
    } else {
      $error = "danger";
      $errorMsg = "Password or email failed";
    }


  } else {
    $error = "danger";
    $errorMsg = "Username already exists, try a different name";
  }


}

 ?>
 <div class="container mt-3">
    <?php if (isset($error)): ?>
      <div class="alert alert-<?php echo $error; ?>" role="alert">
        <?php echo $errorMsg; ?>
      </div>
    <?php endif; ?>
   <div class="row">
     <div class="col-md-6">
       <h3>Create a new account</h3>
       <hr>
       <form class="" action="login.php" method="post">
         <label for="username">Username</label>
         <input type="text" name="username" class="form-control" placeholder="Input your username..."value="">
         <p class="error"></p>
         <label for="username">Email</label>
         <input type="email" name="email" class="form-control" placeholder="Input your username..."value="">
         <p class="error"></p>
         <label for="username">Password</label>
         <input type="password" name="password1" class="form-control" placeholder="Input your username..."value="">
         <p class="error"></p>
         <label for="username">Confirm Password</label>
         <input type="password" name="password2" class="form-control" placeholder="Input your username..."value="">
         <p class="error"></p>
         <button type="submit" name="create" class="btn btn-outline-success">Create Account</button>
       </form>
     </div>
     <div class="col-md-6">
       <h3>Login</h3>
       <hr>
       <form class="" action="login.php" method="post">
         <label for="username">Username</label>
         <input type="text" name="username" class="form-control" placeholder="Input your username..."value="">
         <p class="error"></p>
         <label for="username">Password</label>
         <input type="password" name="password1" class="form-control" placeholder="Input your username..."value="">
         <p class="error"></p>
         <button type="submit" name="login" class="btn btn-outline-primary">Login</button>
       </form>
     </div>
   </div>
 </div>

 <?php
 include 'includes/footer.php';
  ?>
