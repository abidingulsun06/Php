<?php

use sifirdanphp\db\DataBase;

require_once 'theme/header.php';

?>

<div class="container">

  <div class="card">
    <div class="card-body">
      <?php $db = new DataBase();
      /*Eğer Localhostta çalışmazsa php_ini dosyasına gidin orada =gd diye aratın başındaki ; kaldırın tekrar başlatın çalışacaktır */
      ?>


      <form method="POST" id="myForm">

        <div class="mb-3">
          <img id="captcha" src="securimage_show.php" alt="CAPTCHA Image" />
          <a href="#" id="refresh" onclick="document.getElementById('captcha').src='securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
        </div>
        <div class="mb-3">
          <label for="code" class="form-label">Doğrula</label>
          <input type="text" class="form-control" name="code" id="code">
        </div>

        <p id="result"></p>

        <button type="submit" id="mysubmit" class="btn btn-primary" onclick="SendForm('myForm','CodeControl')">Doğrula<span class="myload"></span></button>
      </form>


    </div>
  </div>
</div>



<?php require_once 'theme/footer.php'; ?>