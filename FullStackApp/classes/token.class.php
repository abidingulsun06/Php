<?php

namespace fullStackApp;

use fullStackApp\Session as session;

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
      setcookie("acces_toke", $token);
      return true;
    } else {
      return false;
    }
  }
}
