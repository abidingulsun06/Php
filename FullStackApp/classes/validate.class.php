<?php

namespace fullStackApp;

class Validate
{
  //Boş alan kontrol
  public static function required()
  {
    $data = func_get_args();
    foreach ($data as  $info) {
      if ($info == null) {
        return true;
      }
    }
    return false;
  }


  public static function Min($take, $number)
  {
    if (strlen($take) < $number) {
      return true;
    }
    return false;
  }

  public static function Max($take, $number)
  {
    if (strlen($take) > $number) {
      return true;
    }
    return false;
  }

  public static function Email($format)
  {
    if (!filter_var($format, FILTER_VALIDATE_EMAIL))
      return true;
    else
      return false;
  }


  public static function Compare($pas1, $pass2)
  {
    if ($pas1 != $pass2) {
      return true;
    } else {
      return false;
    }
  }

  public static function Pass($pass1, $pass2)
  {
    if (strlen($pass1) <= 0 or strlen($pass2 <= 0)) {
      return true;
    } else {
      return false;
    }
  }
}
