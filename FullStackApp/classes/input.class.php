<?php

namespace fullStackApp;

class Input
{
  public static function control($value)
  {
    switch ($value) {
      case 'POST':
        return (!empty($_SERVER['REQUEST_METHOD'] == "POST")) ? true : false;
        break;
      case 'GET':
        return (!empty($_GET)) ? true : false;
        break;

      default:
        return false;
        break;
    }
  }

  public static function sefLink($text)
  {
    $text = trim($text);
    $find = array("Ç", "Ş", "Ğ", "Ü", "Ö", "İ", "ç", "ş", "ğ", "ü", "ı");
    $change = array("c", "s", "g", "u", "o", "i", "c", "s", "g", "u", "o", "i");
    $text = str_replace($find, $change, $text);
    $text = mb_strtolower($text, "UTF-8");
    $text = preg_replace("/[^a-z0-9]/", '-', $text);
    $text = preg_replace("/-+/", '-', $text);
    $text = trim($text, '-');
    return $text;
  }

  public static function security($text)
  {
    if (isset($_POST[$text])) {
      $clean = trim($_POST[$text]);
    }
    //Get kontrol
    else if (isset($_GET[$text])) {
      $clean = trim($_GET[$text]);
    }
    $clean = strip_tags($clean);
    $clean = htmlspecialchars($clean, ENT_QUOTES);
    $clean = str_replace("insert", "", $clean);
    $clean = str_replace("INSERT", "", $clean);
    $clean = str_replace("SELECT", "", $clean);
    $clean = str_replace("select", "", $clean);
    $clean = str_replace("exec", "", $clean);
    $clean = str_replace("EXEC", "", $clean);
    $clean = str_replace("UNION", "", $clean);
    $clean = str_replace("union", "", $clean);
    $clean = str_replace("drop", "", $clean);
    $clean = str_replace("DROP", "", $clean);
    return $clean;
  }
}
