<?php

$_SESSION['token'] = bin2hex(random_bytes(32));
$_SESSION['token-expire'] = time() + 3600; // 1 hour = 3600 secs

echo $_SESSION['token'];
 ?>
