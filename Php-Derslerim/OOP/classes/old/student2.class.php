<?php

namespace sifirdanphp\secondschool;

class Student extends \sifirdanphp\primaryschool\Student1
{
  function __construct()
  {
    echo "<div class='alert alert-secondary'>Ben bir orta okul öğrencisiyim</div>";
  }
}
