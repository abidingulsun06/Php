<?php

use sifirdanphp\db\DataBase;

require_once 'theme/header.php';

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="http://localhost/Php-Derslerim/JsonVeriTabani/anasayfa">Navbar</a>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="http://localhost/Php-Derslerim/JsonVeriTabani/anasayfa">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Php-Derslerim/JsonVeriTabani/hakkimizda">hakkımızda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Php-Derslerim/JsonVeriTabani/profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Php-Derslerim/JsonVeriTabani/iletisim">iletişim</a>
        </li>
      </ul>
    </div>

  </div>
</nav>

<div class="container">

  <div class="card">
    <div class="card-body">
      <?php $db = new DataBase(); ?>

      <?php
      switch ($_GET['page']) {
        case 'anasayfa':
          echo 'burası anasayfa';
          break;
        case 'hakkimizda':
          echo 'burası hakkimizda ';
          if ($_GET["menu"])
            echo $_GET["menu"] . " sayfasina hoş geldiniz";
          break;
        case 'profile':
          echo 'burası profile';
          break;
        case 'iletisim':
          echo 'burası iletisim';
          break;
      }

      ?>

    </div>
  </div>
</div>



<?php require_once 'theme/footer.php'; ?>