<?php

use sifirdanphp\DataBase;

error_reporting(0);
ob_start();
session_start();
date_default_timezone_set("Europe/Istanbul");
define("PATH", $_SERVER['DOCUMENT_ROOT'] . '/PHP');
define("URL", 'http://localhost/PHP');
require_once(PATH . "/classes/allclass.php");
$db = new DataBase();
