<?php
function date_turkey($myTime)
{
  $en_mounths = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];

  $tr_mounths = [
    "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran",
    "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"
  ];

  $en_days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

  $tr_days = ["Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi", "Pazar"];
  $myTime = str_replace($en_mounths, $tr_mounths, $myTime);
  $myTime = str_replace($en_days, $tr_days, $myTime);
  return $myTime;
}
