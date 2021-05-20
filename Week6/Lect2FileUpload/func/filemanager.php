<?php

function validateFile($file, &$errors) {
  $file = $file['img'];
  $fname = $file['name'];
  $ftype = $file['type'];
  $ftemp = $file['tmp_name'];
  $ferr = $file['error'];
  $fsize = $file['size'];
  $allowed_ext = ['png', 'jpeg', 'jpg'];

  // check to ensure there is no error with the upload
  if($ferr != 0) {
    $errors['ferr'] = "File error.";
  }

  // explore the filetype and check the type and extension
  $ftype = explode("/", $ftype);
  if($ftype[0] != "image" || !in_array(end($ftype), $allowed_ext)) {
    $errors['ftype'] = "Only images can be uploaded.";
  }

  // check filesize
  if($fsize > 5000000) {
    $errors['fsize'] = "File too large.";
  }

  if(empty($errors)) {
    $new_filename = uniqid('', true) . "." . end($ftype);
    $new_dest = "images/" . $new_filename;
    if(move_uploaded_file($ftemp, $new_dest)) {
      return $new_dest;
    } else {
      return false;
    }
  }
  var_dump($errors);
}


 ?>
