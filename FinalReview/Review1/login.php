<?php
include 'includes/header.php';
include 'classes/User.php';
if(isset($_POST['login'])) {
  $user_name = $_POST['username'];
  $user_password = $_POST['password'];
  $user = new User($conn);
  $user->checkLogin($user_name, $user_password);
  var_dump($user);
}

 ?>

 <div class="container mt-5">
   <div class="row">
     <div class="col-md-6">
       <h3><i class="fa fa-plus"></i> Create Account</h3>
       <form class="" action="login.php" method="post">
         <label for="username">Username</label>
         <input type="text" name="username" class="form-control" placeholder="Enter your name...">
         <p class="error error-username"></p>
         <label for="email">Email</label>
         <input type="email" name="email" class="form-control" placeholder="Enter your email">
         <p class="error error-email"></p>
         <label for="password">Password</label>
         <input type="password" name="password" class="form-control" placeholder="...">
         <label for="confirm-password">Confirm Password</label>
         <input type="password" name="confirm-password" class="form-control">
         <p class="error error-password"></p>

         <button type="submit" name="create-account" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Create Account</button>
       </form>
     </div>
     <div class="col-md-6">
       <h3><i class="fa fa-user"></i> Login</h3>
       <form class="" action="login.php" method="post">
         <label for="username">Username</label>
         <input type="text" name="username" class="form-control" placeholder="Enter your name...">
         <p class="error error-username"></p>
         <label for="password">Password</label>
         <input type="password" name="password" class="form-control" placeholder="...">
         <p class="error error-password"></p>
         <button type="submit" name="login" class="btn btn-block btn-success"><i class="fa fa-user"></i> Login</button>
       </form>
     </div>
   </div>
 </div>



 <?php
 $password = "itec2021";
 echo password_hash($password, PASSWORD_DEFAULT);
 var_dump($_SERVER);
 include 'includes/footer.php';
  ?>
