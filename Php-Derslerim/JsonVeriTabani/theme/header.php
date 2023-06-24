<?php
require_once "../functions/combine.php";
require_once "classes/allClass.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <style>
    <?php include_once '../css/main.css'; ?>
  </style>

  <?php
  $page = match (basename($_SERVER['PHP_SELF'])) {
    'index.php' => 'Veritabanı Islemleri',
    'members.php' => 'Members',
    'update.php' => 'Edit Members',
    'delete.php' => 'Delete Members',
    'admin.php' => 'Admin panel',
    'city.php' => 'İller ilçeler',
    'index2.php' => 'Pictures Application',
    'form.php' => 'form Application',
    'htaccess.php' => 'Htaccess Application'
  };
  ?>
  <title><?php echo $page ?></title>
</head>

<body>