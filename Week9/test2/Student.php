<?php

class Student extends User {
  public $major;
  public $student_id;
  public $year;

  public function __construct($user_name, $major) {
    $this->major = $major;
    parent::__construct($user_name);
  }

  public function introduce() {
    return "Hello I am a student, my name is {$this->user_name}. I am majoring in {$this->major}.";
  }

  public function register() {

  }

  public function dropClass() {
    
  }
}

 ?>
