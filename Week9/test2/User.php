<?php

class User {
  public $user_id;
  public $gender;
  private $password_hash;
  public $user_name;

  public function __construct($user_name) {
    $this->user_name = $user_name;
  }

  public function introduce() {
    return "Hello, my name is {$this->user_name}.";
  }


}



 ?>
