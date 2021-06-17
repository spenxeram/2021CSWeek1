<?php
$mal = [
  "name" => "Sam",
    "age" => 22,
  "hobby" => "<script>alert('hacked!');</script>",
  "gender" => "<h3>Male</h3>",
  "email" => "sam<script>alert('hi');</script>"
];


var_dump($mal);
// cleanArray(["string","int","string","string", "email"],$mal);
//

function sanitizeArray($arr) {
  foreach ($arr as $key => $value) {
    if(is_int($value)) {
      $arr[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    } elseif (is_string($value)) {
      $arr[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    } elseif (is_email($value)) {
      $arr[$key] = filter_var($value, FILTER_SANITIZE_EMAIL);
    } elseif (is_url($value)) {
      $arr[$key] = filter_var($value, FILTER_SANITIZE_URL);
    } else {
      $arr[$key] = "";
    }
  }
  return $arr;
}

$cleanArr = sanitizeArray($mal);

var_dump($cleanArr);

//
//
// function cleanArray($datatype, &$array) {
//   $i = 0;
//   foreach ($array as $key => $value) {
//     switch ($datatype[$i]) {
//       case 'string':
//         $array[$key] = cleanString($value);
//         break;
//       case 'int':
//         $array[$key] = cleanInt($value);
//         break;
//       case 'email':
//         $array[$key] = cleanEmail($value);
//         break;
//
//       default:
//         // code...
//         break;
//     }
//     $i++;
//   }
// }
//
// function cleanString($val) {
//   return filter_var($val, FILTER_SANITIZE_STRING);
// }
// function cleanInt($val) {
//   return filter_var($val, FILTER_SANITIZE_NUMBER_INT);
// }
//
// function cleanEmail($val) {
//   return filter_var($val, FILTER_SANITIZE_EMAIL);
// }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
      <?php foreach ($cleanArr as $key => $val): ?>
        <li><?php echo $val; ?></li>
      <?php endforeach; ?>
    </ul>
    <?php
    var_dump($mal); ?>
  </body>
</html>
