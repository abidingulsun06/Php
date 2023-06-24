<?php require_once "../functions/combine.php";
setlocale(LC_ALL, 'tr_TR');
ob_start();
header("Content-Control:no-cache, no-store, must-revalidate");
header("Expires:Sun, 01 Jan 1981 01:00:00 GMT");
header("Pragma:no-cache");
header("Content-Type:text/html; charset=utf-8")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Expires" content="Sun, 01 Jan 1981 01:00:00 GMT">
  <meta http-equiv="Pragma" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <?php
  $page = match (basename($_SERVER['PHP_SELF'])) {
    'index.php' => 'Object Orianted Programming',
    'yararlıkomutlar.php' => 'Yararlı Komutlar'
  };
  ?>
  <title><?= $page ?></title>
  <link href="../css/main.css" rel="stylesheet">
</head>

<body class="p-2">
  <div class="container-fluid">