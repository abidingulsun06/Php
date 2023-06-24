<?php require_once "../core/init.php";

use sifirdanphp\Input;
use sifirdanphp\Session;

$lang = empty(Session::get("themeLang")) ? 'tr' : Session::get("themeLang");

require_once(PATH . "/multipleLanguages/diller/languages_$lang.php");
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
    'index.php' => 'Anasayfa'
  };
  ?>
  <title><?= $page ?></title>

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= URL . '/multipleLanguages' ?>">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
          $list = $db->getRows("SELECT * FROM menu_$lang");
          foreach ($list as $items) {
            if (Input::security("menu") == $items->MenuLink) {
              echo '<li class="nav-item">';
              echo '<a class="nav-link active" href="' . URL . '/multipleLanguages/menu/' . $items->MenuLink . '">' . $items->MenuName . '</a>';
              echo '</li>';
            } else {
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="' . URL . '/multipleLanguages/menu/' . $items->MenuLink . '">' . $items->MenuName . '</a>';
              echo '</li>';
            }
          }
          ?>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" onclick="ChangeLang('tr')">TR</a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" onclick="ChangeLang('en')">EN</a>
          </li>

        </ul>
        <span class="navbar-text">
          <?= $languages['menu_text']; ?>
        </span>
      </div>
    </div>
  </nav>
  <div class="container mt-5">