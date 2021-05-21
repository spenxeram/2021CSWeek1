<?php
function checkFile($file, $type, &$errors) {
  $file = $file['img'];
  var_dump($file);
  $fname = $file['name'];
  $ftype = explode("/", $file['type']);
  $tmp_name = $file['tmp_name'];
  $ferror = $file['error'];
  $fsize = $file['size'];

  // check file for errors
  if($ferror == 0) {
    $allowed_ext = getExtensions($type);
    //Check extension is permittedd
    if(!in_array(end($ftype), $allowed_ext)) {
      $errors['ftype'] = "Only {$type} files allowed.";
    }
    // check file size
    if($fsize > 5000000 ) {
      $errors['fsize'] = "File is too large.";
    }

    if(empty($errors)) {
      $new_fname = uniqid('', true) . "." . end($ftype);
      $new_path = "images2/" . $new_fname;
      if(move_uploaded_file($tmp_name, $new_path)) {
        return $new_path;
      } else {
        $errors['fupload'] = "File move failed.";
        return false;
      }
    } else {
      return false;
    }
  } else {
    $errors['ferror'] = "There was a file error.";
    return false;
  }
}

function getExtensions($type) {
  if($type == "image") {
    return ["png", "jpeg", "jpg", "gif"];
  } elseif ($type == "video") {
    return ["mp4", "mov", "avi"];
  }
}


 ?>
