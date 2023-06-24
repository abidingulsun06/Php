<?php

namespace sifirdanphp\old;

class greet
{
  function __construct()
  {
    echo self::wellcome();
  }
  public static function wellcome()
  {
    $text = "Hello Php Oop";
    return $text;
  }
}
