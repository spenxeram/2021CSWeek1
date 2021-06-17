<?php

$_SESSION['token'] = bin2hex(random_bytes(32));
$_SESSION['token-expire'] = time() + 3600; // 1 hour = 3600 secs

echo $_SESSION['token'];
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
