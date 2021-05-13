<?php
include 'includes/header.php';

if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password1 = $_POST['password1'];

  $sql = "SELECT * FROM users WHERE user_name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $results = $stmt->get_result();
  var_dump($results);
  if ($results->num_rows == 1) {
    $row = $results->fetch_assoc();
    var_dump($row);
    if(password_verify($password1, $row['user_hash'])) {
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $row['user_name'];
      header("Location: index.php?login=true");
    } else {
      $error = "danger";
      $errorMsg = "Passwords don't match!";
    }
  } else {
    $error = "danger";
    $errorMsg = "Username not found!";
  }

}

if(isset($_POST['create'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
  // Checl that username !empty, > 5 char,  does not already exist
  if(strlen($username) < 5) {
    $error = "danger";
    $errorMsg = "Username is too short!";
  } else {

    $sql = "SELECT * FROM users WHERE user_name = ?";
    echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $results = $stmt->get_result();

    if($results->num_rows == 1) {
        $error = "danger";
        $errorMsg = "Username already exists!";
     } else {
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $error = "danger";
         $errorMsg = "Email is invalid";
       } elseif(strlen($password1) < 5 || $password1 != $password2) {
         $error = "danger";
         $errorMsg = "Password is too short or doesn't match!";
       } else {
         $hash = password_hash($password1, PASSWORD_DEFAULT);
         $sql = "INSERT INTO users (user_name, user_email, user_hash) VALUES (?,?,?)";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("sss", $username,$email, $hash);
         $stmt->execute();
         var_dump($stmt);
         if($stmt->affected_rows == 1) {
           //log user in and redirect to homepage
           $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $username;
           header("Location: index.php?login=true");
         }

       }
    }
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
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Input your username..."value="">
        <p class="error"></p>
        <label for="password1">Password</label>
        <input type="password" name="password1" class="form-control" placeholder="Input your username..."value="">
        <p class="error"></p>
        <label for="password2">Confirm Password</label>
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
