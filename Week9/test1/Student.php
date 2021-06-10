<?php


class Student extends User {

  public $major;
  public $year;
  public $total_credits_completed;

  public function __construct($user_name, $major) {
    $this->major = $major;
    parent::__construct($user_name);
  }
  //override parent method introdoce
  public function introduce() {
    return "Hello, my name is {$this->user_name}, I am majoring in {$this->major}";
  }

  public function enrollClass() {
    
  }

  public function dropClass() {

  }

  public function payTuition() {

  }

}


 ?>
