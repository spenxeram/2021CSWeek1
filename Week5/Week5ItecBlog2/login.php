<?php
include 'includes/header.php';
$errors = [];


if(isset($_POST['create'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];


 ?>

<div class="container mt-3">
   <?php if (isset($errorMsg)): ?>
     <div class="alert alert-danger" role="alert">
       <?php echo $errorMsg; ?>
     </div>
   <?php endif; ?>
  <div class="row">
    <div class="col-md-6">
      <h3>Create a new account</h3>
      <hr>
      <form class="" action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Input your username..." value="<?php if (isset($username)) {
          echo htmlspecialchars($username);}?>">
        <p class="error"><?php if(isset($errors['create_username'])) {echo $errors['create_username'];} ?></p>
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Input your username..." value="<?php if (isset($email)) { echo htmlspecialchars($email);} ?>">
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
        <input type="text" name="name" class="form-control" placeholder="Input your username..." value="<?php if (isset($name)) { echo htmlspecialchars($name);} ?>">
        <p class="error"><?php if(isset($errors['login_username'])) {echo $errors['login_username'];} ?></p>
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Input your username..." value="">
        <p class="error"><?php if(isset($errors['login_password'])) {echo $errors['login_password'];} ?></p>
        <button type="submit" name="login" class="btn btn-outline-primary">Login</button>
      </form>
    </div>
  </div>
</div>

<?php
include 'includes/footer.php';
 ?>
