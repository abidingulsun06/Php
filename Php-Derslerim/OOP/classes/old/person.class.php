<?php

namespace sifirdanphp\old;

trait person
{
  public $name;
  private $lastName;
  protected $age;

  function __construct($name, $lastName, $age)
  {
    $this->name = $name;
    $this->lastName = $lastName;
    $this->age = $age;
  }

  function FullName()
  {
    return "Ben person classına ait methodum " . $this->name . " " . $this->lastName . "<br>";
  }

  protected function PrintMe()
  {
    return $this->name . " Çok Eğlenceli<br>";
  }
}
