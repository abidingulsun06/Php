<?php

use sifirdanphp\routing;

require_once '../core/init.php';
require_once 'theme/header.php';

$ID = htmlspecialchars($_GET["ID"]);

$members = $db->getOneRow("SELECT * FROM members WHERE MemberID=?", array($ID));

$MemberName = $_POST['MemberName'];
$MemberLastname = $_POST['MemberLastname'];
$MemberEmail = $_POST['MemberEmail'];
$MemberPassword = $_POST['MemberPassword'];
$MemberGender = $_POST['MemberGender'];
$MemberDisplay = $_POST['MemberDisplay'];

if (empty($MemberName) or empty($MemberLastname)) {
  $data["warning"] =  "Lütfen Boş alan bırakmayın";
} else {
  $add = $db->Update(
    "UPDATE 
     members SET 
     MemberName=?,
     MemberLastname=?,
     MemberEmail=?,
     MemberPassword=?,
     MemberGender=?,
     MemberDisplay=? WHERE MemberID=?",
    array($MemberName, $MemberLastname, $MemberEmail, $MemberPassword, $MemberGender, $MemberDisplay, $ID)
  );

  if ($add) {
    $db->myCommit();
    routing::go('index.php', 0.5);
    echo toastSuccess('Kayıt başarı ile güncellendi');
  } else {
    $db->myRollBack();
    echo toastError("Kayıt eklenirken bi hata oluştu");
  }
}

?>

<div class="container">
  <form method="POST" action="crud/update.php?ID=<?php echo $ID; ?>">

    <div class="my-3 row">
      <label class="col-md-2 col-form-label" for="MemberName">Member Name</label>
      <div class="col-md-9">
        <input type="name" class="form-control" placeholder="Enter Name" name="MemberName" id="MemberName" value="<?= $members->MemberName; ?>">
      </div>
    </div>

    <div class="my-3 row">
      <label class="col-md-2 col-form-label" for="MemberLastname">Member Lastname</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="MemberLastname" id="MemberLastname" value="<?= $members->MemberLastname; ?>">
      </div>
    </div>

    <div class="my-3 row">
      <label class="col-md-2 col-form-label" for="MemberEmail">Member Email</label>
      <div class="col-md-9">
        <input type="email" class="form-control" name="MemberEmail" id="MemberEmail" value="<?= $members->MemberEmail; ?>">
      </div>
    </div>

    <div class="my-3 row">
      <label class="col-md-2 col-form-label" for="MemberPassword">MemberPassword</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="MemberPassword" id="MemberPassword" value="<?= $members->MemberPassword; ?>">
      </div>
    </div>

    <div class="my-3 row">
      <label class="col-md-2 col-form-label" for="MemberGender">Member Gender</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="MemberGender" id="MemberGender" value="<?= $members->MemberGender; ?>">
      </div>
    </div>

    <div class="my-3 row">
      <label class="col-md-2 col-form-label" for="MemberDisplay">Member Display</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="MemberDisplay" id="MemberDisplay" value="<?= $members->MemberDisplay; ?>">
      </div>
    </div>

    <div class="my-3 row">
      <label class="col-md-2 col-form-label"></label>
      <div class="col-md-9">
        <button class="btn btn-success w-25" type="submit">Update<span class="myload"></span></button>
      </div>
    </div>


  </form>
</div>

<?php require_once 'theme/footer.php'; ?>