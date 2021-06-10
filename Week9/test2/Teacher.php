<?php

class Teacher extends User {

  public $department;
  public $teacher_id;
  public $specialization;
  public $tenure = false;

  public function __construct($user_name, $department) {
    $this->department = $department;
    parent::__construct($user_name);
  }

  public function introduce() {
    return "Hello, my name is {$this->user_name}, I am a professor at the {$this->department} department.";
  }
}

 ?>
