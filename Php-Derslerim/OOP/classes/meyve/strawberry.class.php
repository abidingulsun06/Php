<?php

namespace sifirdanphp\meyve;

class strawberry extends fruit
{
  private $weight = 29;
  function info()
  {
    $text = parent::getName() . "<br>";
    $text .= parent::getColor();
    return $text;
  }
}
