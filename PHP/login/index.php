<?php

use sifirdanphp\Input;
use sifirdanphp\Session;
use sifirdanphp\Token;

require_once 'pages/header.php'; ?>

<div class="card">
  <div class="card-body">
    <?php
    if (Session::get('sID')) {
      require(PATH . '/login/pages/index.php');
    } else {

    ?>
      <form method="POST" id="FrmLogin">
        <input type="hidden" name="ufToken" id="ufToken" value="<?= Token::insert(); ?>">

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="mb-3">
          <img id="captcha" src='login/securimage/securimage_show.php?' alt="CAPTCHA Image" />
          <a href="#" id="refresh" onclick="document.getElementById('captcha').src='login/securimage/securimage_show.php?' + Math.random(); return false">[Yenile]</a>
        </div>

        <div class="mb-3">
          <label for="code" class="form-label">Doğrula</label>
          <input type="text" class="form-control" name="code" id="code">
        </div>


        <button type="button" class="btn btn-primary" onclick="SendForm('FrmLogin','login')">Kayıt ol <span class="myload"></span></button>

      </form>
    <?php } ?>

  </div>
</div>

<?php require_once 'pages/footer.php'; ?>