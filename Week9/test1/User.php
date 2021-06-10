<?php

class User {
  //scope of class properties
  public $user_id;
  public $user_name;
  protected $email;
  private $password_hash;

  public function __construct($user_name) {
    $this->user_name = $user_name;
  }

  public function introduce() {
    return "Hello my name is {$this->user_name}";
  }


}



 ?>
