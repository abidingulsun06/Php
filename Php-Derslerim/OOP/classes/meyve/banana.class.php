<?php

namespace sifirdanphp\meyve;

class banana extends fruit
{
  function info()
  {
    return $this->name . " Gibisi varmı bee....)";
  }

  function parentDeneme()
  {
    return parent::number;
  }
  function infoTwo()
  {
    return $this->Messages();
  }
}
