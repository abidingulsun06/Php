<?php

namespace sifirdanphp\araba;

class bmw extends car
{

  public function info(): string
  {
    $text = "Alman malı:" . $this->name . "<br>";
    return $text;
  }
}
