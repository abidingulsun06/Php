<?php
require "../functions/safe.php";
$allValues = $_POST;

foreach ($allValues as $key => $value) {
  echo $value .  "<br>";
}
