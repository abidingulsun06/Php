<?php require_once 'functions/combine.php'; ?>
<?php require_once 'classes/allClass.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <?php
  $page = match (basename($_SERVER['PHP_SELF'])) {
    'index.php' => 'My New Project'
  };
  ?>
  <title><?php echo $page ?></title>
  <style>
    <?php include_once 'css/main.css'; ?>
  </style>

</head>

<body>
  <?php require_once 'theme/navbar.php'; ?>
  <div class="container">