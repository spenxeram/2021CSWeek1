<?php
//Load Config
require_once 'config/config.php';
//Load Libraries
// require_once 'libraries/Core.php';
// require_once 'libraries/controller.php';
// require_once 'libraries/Database.php';

//AUTOLOADER
spl_autoload_register(function($className) {
  require_once 'libraries/' . $className . ".php";
});
