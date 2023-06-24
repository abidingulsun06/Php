<?php
function ConvertLetter($text, $case)
{
  $replaceL = ["ç", "ğ", "ı", "i", "ö", "ş", "ü"];
  $replaceU = ["Ç", "Ğ", "I", "İ", "Ö", "Ş", "Ü"];
  //Tüm string büyük
  if ($case == "upper") {
    $edit = str_replace($replaceL, $replaceU, $text);
    $edit = strtoupper($edit);
  }
  //Tüm string küçük
  else if ($case == "lower") {
    $edit = str_replace($replaceU, $replaceL, $text);
    $edit = strtolower($edit);
  }
  //Sadece cümlenin ilk harfi büyük.
  else if ($case == "firstUpper") {
    $firstChar = mb_substr($text, 0, 1);
    $otherLetter = mb_substr($text, 1);
    $edit = mb_strtoupper($firstChar) . $otherLetter;
  }
  //Sadece cümlenin ilk harfi küçük.
  else if ($case == "firstLower") {
    $firstChar = mb_substr($text, 0, 1);
    $otherLetter = mb_substr($text, 1);
    $edit = mb_strtolower($firstChar) . $otherLetter;
  }
  //Boşluktan sonra tüm kelimelerin ilk harfi büyük 
  else if ($case == "ucwords") {
    $edit = mb_convert_case($text, MB_CASE_TITLE, "UTF-8");
  }
  //Boşluktan sonra tüm kelimelerin ilk harfi küçük 
  else if ($case == "lcwords") {
    $edit = explode(" ", $text);
    $i = 0;
    while (count($text)) {
      $edit = lcfirst($text[$i]);
      $i++;
      return $edit;
    }
  }
  return $edit;
}
