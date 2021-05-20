<?php

// takes a file, validates it and returns the img location if successful
function validateFile($file, &$errors) {
  $file = $file['image'];
  $fname = $file['name'];
  $ftype = $file['type'];
  $tmp_name = $file['tmp_name'];
  $ferror = $file['error'];
  $fsize = $file['size'];
  $allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];

  // check to see if error exists
  if($ferror != 0) {
    $errors['err'] = "The file had an error";
  }

  // check to make sure file extentsion is permitted
  $fext = explode(".", $fname);
  $fext = strtolower(end($fext));
  if(!in_array($fext, $allowed_ext)) {
    $errors['ext'] = "The file extention is not permitted!";
  }

  // check file size is within bounds
  if($fsize > 1000000) {
    $errors['size'] = "The file size is too large!";
  }

  // if there are no file errors, move the file to final Destination
  // and return that destination
  if(empty($errors)) {
    return move_file($fext, $tmp_name);
    }
  }

// moves validated file from temp to project dir, returns that path
function move_file($fext, $tmp) {
  $fnewname = uniqid('', true) . "." . $fext;
  $new_dir = "images/" . $fnewname;
  if(move_uploaded_file($tmp, $new_dir)) {
    return $new_dir;
  } else {
    return false;
  }
}
