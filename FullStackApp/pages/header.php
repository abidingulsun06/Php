<?php require_once './core/init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <base href="http://localhost/FullStackApp/">

  <style>
    @import url("./css/main.css");
  </style>

  <?php
  $page = match (basename($_SERVER['PHP_SELF'])) {
    'index.php' => 'Login',
    'admin.php' => 'Admin Panel',
    'members.php' => 'Members',
  };
  ?>
  <title><?= $page ?></title>
</head>

<body>