<?php
var_dump($_FILES);
$file = array_values($_FILES);
function returnAr() {
  return [1,2,45,676,3];
}
var_dump(returnAr());
 ?>

<h2>Upload a file</h2>
<form class="" action="index.php" method="post" enctype="multipart/form-data">
  <input type="file" name="img" value="">
  <button type="submit" name="button">Button</button>
</form>
