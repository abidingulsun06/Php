<?php

use sifirdanphp\db\DataBase;

require_once 'theme/header.php';
$db = new DataBase();

?>

<div class="container">

  <div class="card mt-3 bg-dark" style="box-shadow: 10px 10px 30px 1px;">
    <div class="card-body">

      <h3 class="text-danger text-center">Resim Galerisi</h3>
      <div class="myload"></div>
      <?php
      $gallery = $db->getRows("SELECT * FROM pictures order by PictureID DESC LIMIT 6");
      $total = $db->getColumn("SELECT COUNT(*) FROM pictures");

      ?>

      <div class="gallery-image">
        <div class="row justify-content-center">
          <?php foreach ($gallery as $values) {
            $myID = $values->PictureID;
          ?>

            <div class="col-md-3 mb-5">
              <img class="img-fluid" src="<?php echo 'images/' . $values->PictureURL; ?>">
            </div>

          <?php }
          echo '</div>';
          if ($total > 6) { ?>
            <div class="text-center col-12" id="BtnImage_<?php echo $myID; ?>">
              <button type="button" class="btn btn-primary btn-lg btn-block px-5 show-more" id="<?php echo $myID; ?>">Daha Fazla Göster</button>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>




  <?php require_once 'theme/footer.php'; ?>