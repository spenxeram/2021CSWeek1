<?php
// check the post title and body; pass the errors array by reference
function checkPost($title, $body, &$errors) {
  // ensure the body and title are not empty
  if($title == '' || $body == '') {
  $errors['text'] = "You must fill in all fields!";
  }
  
}
