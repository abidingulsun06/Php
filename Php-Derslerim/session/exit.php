<?php
session_start();
require_once "classes/routing.php";

session_unset();
session_destroy();

echo "<h2>Anasayfaya yönlendiriliyorsunuz</h2>";
routing::go("index.php", 2);
exit();
