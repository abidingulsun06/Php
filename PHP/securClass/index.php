<?php

use sifirdanphp\Input;
use sifirdanphp\Token;

require_once 'pages/header.php'; ?>


<div class="card">
  <div class="card-body">
    <form id="Frm" method="POST">

      <input type="hidden" name="myToken" id="myToken" value="<?= Token::insert(); ?>">

      <div class="form-group">
        <label>Mesajınız</label>
        <textarea class="form-control" id="content" name="content" rows="10"></textarea>
      </div>

      <button type="button" class="btn btn-success mt-3" onclick="SendForm('Frm','Look');"><span class="myload"></span>Kaydet</button>
      <div id="result"></div>
    </form>

    <?php
    // if (Input::control("POST")) {
    //   echo $_POST['content'];
    //   $text = Input::security('content');
    //   echo $text;
    // }
    ?>


  </div>
</div>

<?php require_once 'pages/footer.php'; ?>