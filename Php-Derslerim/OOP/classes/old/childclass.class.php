<?php

class childclass extends ParentClass
{


  public function addInfo($name)
  {
    if ($name == "Abidin") {
      $prefix = "Bay";
    } else if ($name == "Ayşen") {
      $prefix = "Bayan";
    }
    return "{$prefix} {$name}";
  }
}
