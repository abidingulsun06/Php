<?php

use fullStackApp\routing;
use fullStackApp\Session;
use fullStackApp\Token;

require_once 'pages/header.php'; ?>
<div class="bg-login">
  <video autoplay muted loop class="myVideo">
    <source src="videos/videoplayback.mp4" type="video/mp4">
  </video>
  <div class="container d-flex justify-content-center align-items-center">

    <div class="form-field">
      <?php
      if (Session::get("sID")) {
        routing::go('admin.php');
      } else {
      ?>
        <form class="row g-3 p-4" method="POST" id="FrmLogin">
          <input type="hidden" name="ufToken" id="ufToken" value="<?= Token::insert(); ?>">
          <h4 class="text-center blue mt-5">Sign In</h4>

          <div class="col-12 my-5">
            <input type="email" class="form-item" placeholder="Email" name="email" id="email">
          </div>
          <div class="col-12 mt-3">
            <input type="password" class="form-item" placeholder="Password" name="password" id="password">
          </div>

          <div class="d-flex justify-content-between my-5">
            <a href="" class="blue">Forgot Password?</a>
            <a href="" class="blue">Sign Up</a>
          </div>

          <div class="col-auto">
            <button type="button" class="btn  mb-3 blue-bg outline" onclick="sendForm('FrmLogin','login');">Submit<span class="myload"></span></button>
          </div>
        </form>

      <?php } ?>
    </div>


  </div>
</div>
<?php require_once 'pages/footer.php'; ?>