<?php


class Teacher extends User {

  public $department;

  public function __construct($user_name, $department) {
    $this->department = $department;
    parent::__construct($user_name);
  }


  public function introduce() {
    return "Hello, my name is {$this->user_name}, I am working in the {$this->department} department.";
  }

}


 ?>
