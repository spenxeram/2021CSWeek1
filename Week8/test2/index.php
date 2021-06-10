<?php
$mal = [
  "name"=> "sam",
  "age" => 23,
  "quote" => "<script>alert('havled!');</script>"
];

var_dump($mal);
echo $mal['name'];

 ?>


 <br>
 <?php
echo filter_var($mal['quote'], FILTER_VALIDATE_STRING);
echo htmlspecialchars($mal['quote']);

var_dump($mal);
  ?>
