<?php
/**
 *
 */
class Animal
{
  public $name;
  public $numlegs;
  public $tails = false;
  function __construct($name)
  {
    $this->name = $name;
  }

  function sound() {
    return "{$this->name} makes the following sound: Meow";
  }
}

class Lion extends Animal {
  public $gender;
  function __construct($name, $gender)
  {
    $this->gender = $gender;
    parent::__construct($name);
  }

  function sound() {
    return "{$this->name} makes the following sound: Roar";
  }

}


 ?>
