<?php

use sifirdanphp\db\DataBase;

require_once 'theme/header.php';
$db = new DataBase();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mysubmit'])) {
  $username = security("username");
  $name = security("firstname");
  $lastname = security("lastname");
  $email = security("email");
  $pass = security("password");
  $memberage = security("memberage");
  $country = security("country");
  $birthday = security("birthday");
  $membergender = security("membergender");
  $confirm = security("confirm");
  if ($confirm != 'on') {
    echo toasterror("Lütfen Sözleşmeyi onaylayın.");
  } else {
    if (empty($username) or empty($name) or empty($lastname) or empty($email) or empty($memberage) or empty($birthday) or empty($membergender)) {
      echo toastError("Lütfen Boş alan bırakmayın");
    } else {
      if (($country) == null) {
        echo toasterror("Lütfen Şehir Seçin");
      } else {
        if (strlen($username) < 3) {
          echo toasterror("Kullanıcı adınızz 3 karakterden az olamaz");
        } else {
          if (strlen($pass) < 8) {
            echo toasterror("Şifreniz 8 karakterden az olamaz");
          } else {
            if (strlen($username) > 40) {
              echo toasterror("Kullanıcı Adınız 40 karakterden fazla olamaz");
            } else {
              if (strlen($pass) > 25) {
                echo toasterror("Şifreniz 25 karakterden fazla olamaz");
              } else {
                if (($memberage) < 1 or ($memberage) > 120) {
                  echo toasterror("Yaşınız 1'den küçük 120'den büyük olamaz");
                } else {
                  if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                    echo toasterror("İsminizi doğru giriniz");
                  } else {
                    if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                      echo toasterror("Soy İsminizi doğru giriniz");
                    } else {
                      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo toasterror("Eposta formatınızın doğruluğunu kontrol edin");
                      } else {
                        if (!preg_match('/^(?=.*[A-ZİĞÜÖŞÇ])(?=.*[a-zşğöıüç])(?=.*[0-9]).{8,20}/u', $pass)) {
                          echo toasterror("Şifreniz büyük küçük harf ve sayı içermeli ve en az 8 karakterden oluşmalıdır.");
                        } else {
                          $pass = md5(md5(md5(md5(sha1($pass)))));
                          $isHave = $db->getColumn("SELECT MemberID FROM members Where MemberEmail=? And MemberUsername=?", array($email, $username));
                          if ($isHave) {
                            echo toasterror("Bu kullanıcı adı ve email kullanılmaktadır.");
                          } else {
                            $add = $db->Insert("INSERT INTO members SET 
                              MemberUsername=?,
                              MemberName=?,
                              MemberLastname=?,
                              MemberEmail=?,
                              MemberPassword=?,
                              MemberAge=?,
                              MemberCountry=?,
                              MemberBirthday=?,
                              MemberGender=?
                              ", array($username, $name, $lastname, $email, $pass, $memberage, $country, $birthday, $membergender));
                            if ($add) {
                              echo toastSuccess("Kayıt eklendi");
                            } else {
                              echo toastError("Kayıt eklenirken bir hata meydana geldi");
                            } //Nesne ekle
                          } //email-username check
                        } //şifre kontrol
                      } //Email check
                    } //soyisim kontrolü
                  } //isim kontrolü
                } //yaş kontrol
              } //pass max 25
            } //kullanıcı adı max 40
          } //pass min 8
        } //Kullanıcı adı 3 karakter kontrol
      } //şehir kontrolü
    } //Veriler boş geçilemez kontrolü
  } //sözleşme onay check

}

?>

<div class="row justify-content-center">
  <div class="col-md-6 bg-danger py-3 rounded-circle">
    <div class="card mt-3">
      <div class="card-body">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberUsername">Username</label>
            <div class="col-md-9">
              <input type="text" class="form-control" placeholder="Enter a Username" name="username" id="MemberUsername">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberName">Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" placeholder="Enter a Name" name="firstname" id="MemberName">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberLastname">Lastname</label>
            <div class="col-md-9">
              <input type="text" class="form-control" placeholder="Enter a Lastname" name="lastname" id="MemberLastname">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberEmail">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" placeholder="Enter a Email" name="email" id="MemberEmail">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberPassword">Password</label>
            <div class="col-md-9">
              <input type="password" class="form-control" placeholder="Enter a Password" name="password" id="MemberPassword">
              <small class="text-muted">Şifreniz büyük küçük harf ve sayı içermeli ve en az 8 karakterden oluşmalıdır.</small>
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberAge">Age</label>
            <div class="col-md-9">
              <input type="number" min="1" max="120" class="form-control" placeholder="Enter Your Age" name="memberage" id="MemberAge">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberCountry">Your City</label>
            <div class="col-md-9">
              <select class="form-select" name="country" id="MemberCountry">
                <option selected>Enter Your City</option>
                <?php
                $cities = $db->getRows("SELECT * FROM cities");
                foreach ($cities as $values) {
                ?>
                  <option value="<?php echo $values->CityID ?>" <?php echo ($members->MemberCountry == $values->CityID) ? 'selected' : ''; ?>>
                    <?php echo $values->CityName; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="my-3 row">
            <label class="form-label col-md-3" for="MemberBirthday">Birthday</label>
            <div class="col-md-9">
              <input type="date" class="form-control" name="birthday" id="MemberBirthday">
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
              <button class="btn btn-success" type="submit" name="mysubmit">Add</button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>

</div>

<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="alert alert-success">
          <p class="mt-2 text-dark">Uyeler Tablosu</p>
        </div>

        <table class="table table-hover table-responsive">

          <thead>
            <tr>
              <th>#</th>
              <th>Kullanıcı Adı</th>
              <th>Üye Adı</th>
              <th>Üye Soyadı</th>
              <th>Email</th>
              <th>Şifre</th>
              <th>Üye Yaşı</th>
              <th>Şehir</th>
              <th>Doğum tarihi</th>
              <th>Cinsiyet</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php

            $myquery = $db->getRows("CALL MEMBERS()");
            foreach ($myquery as $values) {
            ?>

              <tr>
                <th scope="row"><?php echo $values->MemberID ?></th>
                <th><?php echo $values->MemberUsername ?></th>
                <td><?php echo $values->MemberName ?></td>
                <td><?php echo $values->MemberLastname ?></td>
                <td><?php echo $values->MemberEmail ?></td>
                <td><?php echo $values->MemberPassword ?></td>
                <td><?php echo $values->MemberAge ?></td>
                <td><?php echo $values->CityName ?></td>
                <td><?php echo $values->MemberBirthday; ?></td>
                <td><?php echo $values->MemberGender == 'M' ? 'Erkek' : 'Kadın' ?></td>
                <td><a href="update.php?ID=<?php echo $values->MemberID; ?>" class='btn-update'><i class="bi bi-pencil-square"></i></a></td>
                <td><a href="delete.php?ID=<?php echo $values->MemberID; ?>" class="delete"><i class="bi bi-trash3"></i></a></td>
              </tr>

            <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?php require_once 'theme/footer.php'; ?>