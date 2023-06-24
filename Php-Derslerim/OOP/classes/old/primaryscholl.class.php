<?php
trait primaryscholl
{
  public $information = "Bunuda Aldum<br>";
  function studentInfo()
  {
    return "Öğrencinin Yaşı " . $this->age;
  }

  function FullName()
  {
    return "Ben primaryscholl classına ait methodum " . $this->name . " " . $this->lastName . "<br>";
  }
}
