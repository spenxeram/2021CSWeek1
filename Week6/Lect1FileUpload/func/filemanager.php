<?php
$errors = [];


function validateFile($file, &$errors) {
  $caption = $_POST['caption'];
  $file = $_FILES['image'];
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


  if(empty($errors)) {
    $img_location = move_file($fext, $temp_name);
    create_gallery_row($img_location, $caption)
    }
  }

}


function move_file($fext, $temp) {
  $fnewname = uniqid('', true) . "." . $fext;
  $new_dir = "images/" . $fnewname;
  if(move_uploaded_file($tmp, $new_dir)) {
    return $new_dir;
  } else {
    return false;
  }
}

if(isset($_POST['submit'])) {









  var_dump($errors);

}



 ?>
