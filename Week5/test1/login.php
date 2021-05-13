<?php
include 'includes/header.php';


 ?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3 class="display-4 mt-3">Login</h3>
      <form class="" action="index.html" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value="">
        <label for="password1">Password</label>
        <input type="text" name="password1" class="form-control" value="">
        <button type="submit" class="btn mt-3 btn-block btn-primary" name="button">Login</button>
      </form>
    </div>
    <div class="col-md-6">
      <h3 class="display-4 mt-3">Create Account</h3>
      <form class="" action="index.html" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value="">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" value="">
        <label for="password1">Password</label>
        <input type="text" name="password1" class="form-control" value="">
        <label for="username">Confirm Password</label>
        <input type="text" name="password2" class="form-control" value="">
        <button type="submit" class="btn mt-3 btn-block btn-success" name="button">Create Account</button>
      </form>
    </div>
  </div>
</div>

 <?php
include 'includes/footer.php';
  ?>
