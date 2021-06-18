<?php
session_start();
spl_autoload_register(function ($class) {
    $classlocation = 'classes/' . $class . '.php';
    if (file_exists($classlocation)) {
        require_once $classlocation;
    }
});
if(!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = false;
}
if(!isset($_SESSION['user_role'])) {
  $_SESSION['user_role'] = 0;
}

$current_query = $_SERVER['QUERY_STRING'];
if(!isset($_SESSION['query_history'])) {
  $_SESSION['query_history'] = [];
  array_push($_SESSION['query_history'], $current_query);
} else {
  if($current_query == '') {
    $current_query = end($_SESSION['query_history']);
  }
  array_push($_SESSION['query_history'], $current_query);
  if(count($_SESSION['query_history']) > 5) {
    array_shift($_SESSION['query_history']);
  }
}

$ismsg = Messenger::checkMsg();
if ($ismsg) {
  $messages = Messenger::outputMsg();
}
Messenger::initializeMessenger();
include 'db.php';
?>
