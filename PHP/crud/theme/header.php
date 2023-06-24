<?php require_once "../core/init.php";
require_once '../functions/safe.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <base href="http://localhost/PHP/">

  <style>
    @import url("./css/main.css");
  </style>

  <?php
  $page = match (basename($_SERVER['PHP_SELF'])) {
    'index.php' => 'Anasayfa',
    'excel.php' => 'Excel',
    'update.php' => 'Update'
  };
  ?>
  <title><?= $page ?></title>
  <script>
    function loadFinish() {

      $(".loadbox").fadeOut({
        duration: 50
      });
      $('.container').fadeIn({
        duration: 50
      });
    }
  </script>
</head>

<body onload="loadFinish()">
  <div class="loadbox">
    <div class="loader8"></div>
  </div>
  <div class="container mt-5">