<?php

use sifirdanphp\db\DataBase;

require_once 'theme/header.php';
$db = new DataBase();

$ID = htmlspecialchars($_GET["ID"]);

$members = $db->getOneRow("SELECT * FROM members WHERE MemberID=?", array($ID));

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mySubmit'])) {
  $username = security("username");
  $name = security("firstname");
  $lastname = security("lastname");
  $email = security("email");
  $memberage = security("memberage");
  $country = security("country");
  $birthday = security("birthday");
  $membergender = security("membergender");
  $confirm = security("confirm");

  if ($confirm != 'on') {
    echo toastError("Lütfen Sözleşmeyi onaylayın.");
  } else {
    if (empty($username) or empty($name) or empty($lastname) or empty($email) or empty($memberage) or empty($birthday) or empty($membergender)) {
      echo toastError("Lütfen Boş alan bırakmayın");
    } else {
      if (($country) == null) {
        echo toastError("Lütfen Şehir Seçin");
      } else {
        if (strlen($username) < 3) {
          echo toastError("Kullanıcı adınızz 3 karakterden az olamaz");
        } else {
          if (strlen($username) > 40) {
            echo toastError("Kullanıcı Adınız 40 karakterden fazla olamaz");
          } else {
            if (($memberage) < 1 or ($memberage) > 120) {
              echo toastError("Yaşınız 1'den küçük 120'den büyük olamaz");
            } else {
              if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                echo toastError("İsminizi doğru giriniz");
              } else {
                if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                  echo toastError("Soy İsminizi doğru giriniz");
                } else {
                  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo toastError("Eposta formatınızın doğruluğunu kontrol edin");
                  } else {
                    $isHave = $db->getColumn("SELECT MemberID FROM members Where MemberEmail=? And MemberUsername=? and MemberID !=?", array($email, $username, $ID));
                    if ($isHave) {
                      echo toastError("Bu kullanıcı adı ve email kullanılmaktadır.");
                    } else {
                      $edit = $db->Update("UPDATE members SET 
                              MemberUsername=?,
                              MemberName=?,
                              MemberLastname=?,
                              MemberEmail=?,
                              MemberAge=?,
                              MemberCountry=?,
                              MemberBirthday=?,
                              MemberGender=?
                              WHERE MemberID=?", array($username, $name, $lastname, $email, $memberage, $country, $birthday, $membergender, $ID));
                      if ($edit) {
                        echo toastSuccess("Kayıt güncellendi");
                      } else {
                        echo toastError("güncellenirken bir hata meydana geldi");
                      } //Nesne ekle
                    } //email-username check
                  } //Email check
                } //soyisim kontrolü
              } //isim kontrolü
            } //yaş kontrol
          } //kullanıcı adı max 40
        } //Kullanıcı adı 3 karakter kontrol
      } //şehir kontrolü
    } //Veriler boş geçilemez kontrolü
  } //sözleşme onay check

}

?>

<div class="row">
  <div class="col-md-6">
    <div class="card mt-3">
      <div class="card-body">
        <form method="POST" action="update.php?ID=<?php echo $ID; ?>">

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberUsername">Username</label>
            <div class="col-md-9">
              <input type="text" class="form-control" value="<?php echo $members->MemberUsername ?>" placeholder="Enter a Username" name="username" id="MemberUsername">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberName">Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" value="<?php echo $members->MemberName ?>" placeholder="Enter a Name" name="firstname" id="MemberName">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberLastname">Lastname</label>
            <div class="col-md-9">
              <input type="text" class="form-control" placeholder="Enter a Lastname" value="<?php echo $members->MemberLastname ?>" name="lastname" id="MemberLastname">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberEmail">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" placeholder="Enter a Email" value="<?php echo $members->MemberEmail ?>" name="email" id="MemberEmail">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberAge">Age</label>
            <div class="col-md-9">
              <input type="number" min="1" max="120" class="form-control" placeholder="Enter Your Age" value="<?php echo $members->MemberAge ?>" name="memberage" id="MemberAge">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberCountry">Your City</label>
            <div class="col-md-9">
              <select class="form-select" name="country" id="MemberCountry">

                <?php
                $cities = $db->getRows("SELECT * FROM cities");
                foreach ($cities as $values) {
                ?>
                  <option value="<?php echo $values->CityID ?>" <?php echo ($members->CityName == $values->CityID) ? 'selected' : '' ?>>
                    <?php echo $values->CityName; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="my-3 row">
            <label class="form-label col-md-3" for="MemberBirthday">Birthday</label>
            <div class="col-md-9">
              <input type="date" class="form-control" value="<?php echo $members->MemberBirthday ?>" name="birthday" id="MemberBirthday">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <p>Your Gender</p>
            </div>

            <div class="col-md-9">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="membergender" value="F" <?php echo ($members->MemberGender == 'F') ? 'checked' : '' ?> id="MemberGender">
                <label class="form-check-label" for="MemberGender">Kadın</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="membergender" value="M" <?php echo ($members->MemberGender == 'M') ? 'checked' : '' ?> id="MemberGender2">
                <label class="form-check-label" for="MemberGender2">Erkek</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="confirm" <?php echo ($members->MemberContract == 1) ? 'checked' : '' ?>>
                <label class="form-check-label">
                  <a href="#" class="text-danger">Üyelik sözleşmesini ve gizlilik sözleşmesini</a> okudum ve kabul ediyorum.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 my-3">
              <button class="btn btn-danger" type="submit" name="mySubmit">Update</button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>


<?php require_once 'theme/footer.php'; ?>