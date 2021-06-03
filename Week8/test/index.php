<?php
class Fruit {

  public $color;
  public $name;


  public function __construct($color, $name) {
    $this->name = $name;
    $this->color = $color;
  }

}

$apple = new Fruit("apple", "red");
echo $apple->name;
echo "<br>";


 ?>
