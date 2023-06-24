<?php

namespace sifirdanphp\araba;

abstract class car
{
  public $name;
  function __construct($name)
  {
    $this->name = $name;
  }

  abstract public function info(): string;
}
