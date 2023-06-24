<?php
//final keywordunu içeren classlar,functionlar ve varaiblesler miras alınamazlar..
namespace sifirdanphp\meyve;

class fruit
{
  protected $name;
  private $color;
  private $weight;
  const number = 29;
  static  $warning = "static değişken özellik deneme";

  function __construct($name, $color)
  {
    $this->name = $name;
    $this->color = $color;
  }

  protected function Messages()
  {
    $text = $this->genel("Merhaba tanıştığımıza sevindim <br>");
    $text .= "Meyve Adı:  {$this->name} <br>";
    $text .=   "Meyve rengi: {$this->color}<br>";
    //$text .= "Meyve kilosu: {$this->weight}";

    //sabitlere self:: ile ulaşırız
    //$text .= "Meyve kilosu:" . self::number . "<br>";

    return $text;
  }

  function genel($text)
  {
    return $text;
  }


  function setName($name)
  {
    $this->name = $name;
  }

  function getName()
  {
    return $this->name;
  }

  function setColor($color)
  {
    $this->color = $color;
  }

  function getColor()
  {
    return $this->color;
  }

  function setWeight($weight)
  {
    $this->weight = $weight;
  }

  function getWeight()
  {
    return $this->weight;
  }

  /*
    function defaultValue($name = "partakal", $color = "turuncu")
    {
      $text = "Meyve Adı ve Rengi:$name-$color";
      return $text;
    }

    function  __construct()
    {
      echo "<br>" . greet::wellcome();
    }

    function __destruct()
    {
      return "<div class='mt-3 alert alert-success'>Bu Meyve {$this->name} Ve Rengi {$this->color}</div>";
    }
  */
}
