<?php

use sifirdanphp\Input;

require_once 'pages/header.php'; ?>

<div class="card">
  <div class="card-body">
    <h1 class="text-center text-danger">Çoklu dil desteği</h1>

    <?php
    $page = empty(Input::security("menu")) ? 'anasayfa' : Input::security("menu");
    $content = $db->getColumn("SELECT MenuContent from menu_$lang where MenuLink=?", array($page));
    echo $content . '<p>(Hakkımızdaşö) -' . Input::sefLink('Hakkımızda') . '</p>';

    ?>


    <div class="card">
      <div class="card-body"><?php  ?></div>
    </div>

  </div>
</div>

<?php require_once 'pages/footer.php'; ?>