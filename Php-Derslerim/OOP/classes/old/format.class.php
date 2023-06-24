<?php
class Format
{
  private $text;
  private $style;
  private $alert;



  function myText($value)
  {
    $this->text = $value;
    return $this;
  }

  function mySize($value)
  {
    $this->style = "font-size:" . $value . "px";
    return $this;
  }

  function myAlert($value)
  {
    $this->alert = $value;
    return $this;
  }

  function CreateText()
  {
    return "<div style='{$this->style}' class='alert alert-{$this->alert}'> {$this->text} </div>";
  }
}
