<?php

namespace sifirdanphp\hayvan;

interface animals extends deneme
{
  public function sound();
  //public function message();
  //const m = "Deneme";
}

interface deneme
{
  function info();
}
