<?php
class Messenger {

  public static function checkMsg() {
    if (!empty($_SESSION['msg'])) {
      return true;
    } else {
      return false;
    }
  }

  public static function clearMsg() {
    $_SESSION['msg'] = [];
    unset($_SESSION['msg']);
  }


  public static function initializeMessenger() {
    $_SESSION['msg'] = [];
  }

  // add messages to msg (include the message, class, icon)
  public static function setMsg($msg, $class, $icon = '') {
    $newarr = [];
    array_push($newarr, $msg);
    array_push($newarr, $class);
    array_push($newarr, $icon);
    array_push($_SESSION['msg'], $newarr);
  }
  // loop through and output msgs using an alert
  public static function outputMsg() {
    $class = $_SESSION['msg'][0][1];
    $output = "<div class='alert mt-3 alert-{$class}' role='alert'>";
    foreach ($_SESSION['msg'] as $msg) {
      $output.= "<i class='{$msg[2]}'></i>{$msg[0]}<br>";
    }
    $output.= "</div>";
    return $output;
  }
}
 ?>
