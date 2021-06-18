<?php

class Messenger {

  public static function checkMsg() {
    if (isset($_SESSION['msg'])) {
      return true;
    } else {
      return false;
    }
  }

  public static function initializeMessenger() {
    $_SESSION['msg'] = [];
  }

}
 ?>
