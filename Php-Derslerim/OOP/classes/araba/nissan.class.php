<?php

namespace sifirdanphp\araba;

class nissan extends car
{

  public function info(): string
  {
    $text = "Japon malı:" . $this->name . "<br>";
    return $text;
  }
}
