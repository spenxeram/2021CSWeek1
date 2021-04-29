<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
echo "<h1>Hello World</h1><ul>";

$names = ["Bob", "George", "Sam", "Billy"];
var_dump($names);
foreach ($names as $key => $value) {
  echo "<li>";
 echo ($key +1) . ": " . $value ;
 echo "</li>";
}
echo "</ul>";
echo "<h1> My name is:" .  ltrim($names[2]) . " </h1>";

 ?>
  </body>
</html>
