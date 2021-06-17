<?php
$mal = [
  "name" => "Sam",
    "age" => 22,
  "hobby" => "<script>alert('hacked!');</script>",
  "gender" => "<h3>Male</h3>"
];


function clean($arr) {
  foreach ($arr as $key => $value) {
    $arr[$key] = filter_var($value, FILTER_SANITIZE_STRING);
  }

  return $arr;
}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Malicious Code</h1>
    <ul>
      <?php foreach ($mal as $key => $value): ?>
        <li> <?php echo filter_var($value, FILTER_SANITIZE_STRING); ?></li>
      <?php endforeach; ?>
    </ul>

  </body>
</html>
