<?php
include APPROOT . "/views/inc/header.php";
if(isset($data)) {
  var_dump($data);
}

 ?>

<div class="container">

<div class="col-lg-4 col-lg-offset-4 well">
  <form class="login" action="index.html" method="post">
    <h2>Login</h2>
    <div class="form-group">
      <label for="uname">User Name</label>
      <input type="text" class="form-control" id="" placeholder="User name..." name="uname">
      <p class="help-block uname"></p>
    </div>
    <div class="form-group">
      <label for="pw1">Password</label>
      <input type="password" class="form-control" id="" placeholder="Password..." name="pw1">
      <p class="help-block pw1"></p>
    </div>
    <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
  </form>
</div>
</div>


<?php
include APPROOT . "/views/inc/footer.php";
 ?>
