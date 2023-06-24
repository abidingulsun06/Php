<?php
class calculate
{
  private $result = 0;

  function __construct($number)
  {
    $this->result = $number;
  }

  function sum($number)
  {
    $this->result += $number;
    return $this;
  }

  function sub($number)
  {
    $this->result -= $number;
    return $this;
  }

  function mul($number)
  {
    $this->result *= $number;
    return $this;
  }


  function div($number)
  {
    $this->result /= $number;
    return $this;
  }

  function print()
  {
    return $this->result;
  }
}
