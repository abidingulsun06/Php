<?php

namespace sifirdanphp\old;

trait MessageTwo
{
  public $info = "Nesne yönelimli proglamlama";
  public function PrintMe2()
  {
    return $this->info . " ile çoklu kalıtım böyle yapılır";
  }
}
