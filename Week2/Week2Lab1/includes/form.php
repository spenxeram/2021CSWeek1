<h3>Contact Form</h3>
<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="name">Your Name</label>
  <input type="text" name="name" value="">
  <label for="email">Email</label>
  <input type="text" name="email" value="">
  <label for="msg">Your Message</label>
  <input type="text" name="msg" value="">
  <label for="subscribe">Join our newsletter</label>
  <input type="checkbox" name="subscribe" value="true">
  <button type="submit" name="button">Submit Form</button>
</form>
