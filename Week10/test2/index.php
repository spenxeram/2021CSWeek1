<?php
$mal = [
  "name" => "Sam",
    "age" => 22,
  "hobby" => "<script>alert('hacked!');</script>",
  "gender" => "<h3>Male</h3>",
  "email" => "sam<script>alert('acked again sucker');</script>@gmail.com"
];

var_dump($mal);

function cleanOutput($arr) {
  foreach ($arr as $key => $value) {
    if(is_string($value)) {
    $arr[$key] = htmlspecialchars($value);
  } elseif(is_int($value)) {
    $arr[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
  } elseif(is_email($value)) {
    $arr[$key] = filter_var($value, FILTER_SANITIZE_EMAIL);
  } elseif(filter_var($value, FILTER_VALIDATE_URL)) {
    $arr[$key] = filter_var($value, FILTER_SANITIZE_URL);
  } else {
    $arr[$key] = '';
  }
  }
  return $arr;
}

$cleanArr = cleanOutput($mal);
var_dump($cleanArr);
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
      <?php foreach ($cleanArr as $key => $value): ?>
        <li> <?php echo $value; ?></li>
      <?php endforeach; ?>
    </ul>

  </body>
</html>
