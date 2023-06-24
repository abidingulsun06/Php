<?php

namespace sifirdanphp;

use sifirdanphp\Session as session;

class Token extends Session
{
  public static function insert()
  {
    //parent ile extends ettiğimiz classın verilerine ulaşırız
    return parent::create("PHPToken", md5(uniqid(mt_rand())));
  }

  public static function control($token)
  {
    if (parent::isHave("PHPToken") and $token == parent::get("PHPToken")) {
      return true;
    } else {
      return false;
    }
  }
}
