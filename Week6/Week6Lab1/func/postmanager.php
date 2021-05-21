<?php
function checkPost($title, $body, &$errors) {
  if($title == '' || $body == '') {
    $errors['posttext'] = "Please fill in all fields.";
  }
}
 ?>
