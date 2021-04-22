<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
  <hr>
<h3>Contact Us Now</h3>
<hr>
<label for="name">Your Name</label>
<input type="text" name="name" value=""> <br>
<label for="email">Email</label>
<input type="email" name="email" value=""><br>
<label for="msg">Short Message</label>
<input type="text" name="msg" value=""><br>
Gender <br>
<input type="radio" name="gender" value="male"> Male <br>
<input type="radio" name="gender" value="female"> Female <br>
<button type="submit" name="button">Submit Form</button>
</form>
