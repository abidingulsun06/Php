<?php

use sifirdanphp\old\greet;

class deneme extends greet
{
  public function __construct()
  {
    echo parent::wellcome();
  }
}
