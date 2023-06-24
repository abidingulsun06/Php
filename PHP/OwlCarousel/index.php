<?php require_once 'pages/header.php'; ?>



<div class="card">
  <div class="card-body">

    <div class="owl-carousel owl-theme personel">
      <?php
      $members = $db->getRows("SELECT * FROM members WHERE MemberDisplay=?", array(1));
      foreach ($members as $value) { ?>

        <div class="row mb-2 item text-center">
          <div class="col-12">
            <div class="card mx-3 p-3">
              <img src="<?= URL; ?>/images/<?= $value->MemberPicture; ?>" class="img-fluid">

              <div class="d-flex justify-content-center">
                <span class="mx-1"><?= $value->MemberName ?></span>
                <span><?= $value->MemberLastname ?></span>
              </div>
              <p><?= $value->MemberEmail ?></p>

            </div>
          </div>
        </div>

      <?php } ?>
    </div>

    <div class="container">
      <div class="btn btn-danger prevBtn"><i class="bi bi-arrow-left"></i> </div>
      <div class="btn btn-danger nextBtn"><i class="bi bi-arrow-right"></i> </div>
    </div>

  </div>
</div>


<?php require_once 'pages/footer.php'; ?>