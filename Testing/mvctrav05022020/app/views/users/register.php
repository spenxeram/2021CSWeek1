<?php
include APPROOT . "/views/inc/header.php";
if(isset($data)) {
  var_dump($data);
}

 ?>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4 well">
      <h2>Register</h2>
      <form class="register" action="<?php echo URLROOT; ?>/users/register" method="post">
        <div class="form-group">
          <label for="uname">User Name</label>
          <input type="text" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" id="" placeholder="User name..." name="uname" value="<?php echo $data['name'] ?>">
          <p class="help-block uname"><?php
          echo $data['name_err']; ?></p>
        </div>
        <div class="form-group">
          <label for="pw1">Password</label>
          <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" id="" placeholder="Password..." name="pw1" value="<?php echo $data['password'] ?>">
          <p class="help-block pw1"><?php
          echo $data['password_err']; ?></p>
        </div>
        <div class="form-group">
          <label for="pw2">Reenter Password</label>
          <input type="password" class="form-control  <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" id="" placeholder="Reenter confirm_password..." name="pw2" value="<?php echo $data['password_confirm'] ?>">
          <p class="help-block pw2"><?php
          echo $data['confirm_password_err']; ?></p>
        </div>
        <div class="form-group">
          <label for="email">User Name</label>
          <input type="email" class="form-control  <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="" placeholder="User email..." name="email" value="<?php echo $data['email'] ?>">
          <p class="help-block email"><?php
          echo $data['email_err']; ?></p>
        </div>

        <button type="submit" name="register" class="btn btn-success btn-block">Register</button>
      </form>
      <hr>
      <div class="col text-center">

      <a href="<?php echo URLROOT; ?>/users/login">Have an account? Login</a>

    </div>
    </div>

  </div>
</div>

<?php
include APPROOT . "/views/inc/footer.php";
 ?>
