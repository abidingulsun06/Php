<?php require_once 'pages/header.php'; ?>

<div class="card">
  <div class="card-body">
    <h2 class="text-center text-danger">Transaction Olayı</h2>

    <?php
    $myQuery = $db->Update("UPDATE account SET AccountMoney=AccountMoney-300 WHERE AccountID=?", array(1));
    $myQuery2 = $db->Update("UPDATE account SET AccountMoney=AccountMoney+300 WHERE AccountID=?", array(7));

    if ($myQuery and $myQuery2) {
      //ilk sorgu gerçekleşmeden işlemi tamamlamaz 2.sorguya geçerken hata varsa işlemi durdurur
      $db->myCommit();
      echo 'işlem tamamlandı';
    } else {
      //Yapılan işlemde sorun varsa işlemi geri alır çek amkına
      $db->myRollBack();
      echo "işlem sırasında bir hata meydana geldi";
    }
    ?>
  </div>
</div>


<?php require_once 'pages/footer.php'; ?>