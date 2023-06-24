<?php

use sifirdanphp\db\DataBase;

require_once 'theme/header.php';
$db = new DataBase();
error_reporting(E_ERROR | E_PARSE);

?>

<div class="row justify-content-center">
  <div class="col-md-6 bg-danger py-3 rounded-circle">
    <div class="card mt-3">
      <div class="card-body">
        <form method="post" id="FrmAddMember2">

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberUsername">Username</label>
            <div class="col-md-9">
              <input type="text" class="form-control" placeholder="Enter a Username" name="MemberUsername" id="MemberUsername">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberName">Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" placeholder="Enter a Name" name="MemberName" id="MemberName">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberLastname">Lastname</label>
            <div class="col-md-9">
              <input type="text" class="form-control" placeholder="Enter a Lastname" name="MemberLastname" id="MemberLastname">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberEmail">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" placeholder="Enter a Email" name="MemberEmail" id="MemberEmail">
            </div>
          </div>

          <div class="my-3 row ">
            <label class="col-md-3 col-form-label" for="MemberPassword">Password</label>
            <div class="col-md-9">
              <input type="password" class="form-control pass" placeholder="Enter a Password" name="MemberPassword" id="MemberPassword">
              <small class="text-muted">Şifreniz büyük küçük harf ve sayı içermeli ve en az 8 karakterden oluşmalıdır.</small>
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberAge">Age</label>
            <div class="col-md-9">
              <input type="number" min="1" max="120" class="form-control" placeholder="Enter Your Age" name="MemberAge" id="MemberAge">
            </div>
          </div>
          <!-- 
          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="myFile">Dosya Yükle</label>
            <div class="col-md-9">
              <input class="form-control" type="file" id="myFile" name="myFile">
            </div>
          </div> -->

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberCountry">Your City</label>
            <div class="col-md-9">
              <select class="form-select" name="MemberCountry" id="MemberCountry">
                <option selected>Enter Your City</option>
                <?php
                $cities = $db->getRows("SELECT * FROM cities");
                foreach ($cities as $values) {
                ?>
                  <option value="<?php echo $values->CityID ?>" <?php echo ($members->CityName == $values->CityID) ? 'selected' : ''; ?>>
                    <?php echo $values->CityName; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="my-3 row">
            <label class="form-label col-md-3" for="MemberBirthday">Birthday</label>
            <div class="col-md-9">
              <input type="date" class="form-control" name="MemberBirthday" id="MemberBirthday">
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <p>Your Gender</p>
            </div>
            <div class="col-md-9">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="MemberGender" value="F" <?php echo ($members->MemberGender == 'F') ? 'checked' : '' ?> id="MemberGender">
                <label class="form-check-label" for="MemberGender">Kadın</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="MemberGender" value="M" <?php echo ($members->MemberGender == 'M') ? 'checked' : '' ?> id="MemberGender2">
                <label class="form-check-label" for="MemberGender2">Erkek</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="MemberContract" id="MemberContract" <?php echo ($members->MemberContract == 1) ? 'checked' : '' ?>>
                <label class="form-check-label">
                  <a href="#" class="text-danger">Üyelik sözleşmesini ve gizlilik sözleşmesini</a> okudum ve kabul ediyorum.
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 my-3">
              <p id="result"></p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 my-3">
              <button class="btn btn-success" type="submit" id="mysubmit" onclick="FillForm('FrmAddMember2','SaveMember')">Add<span class="myload"></span></button>

              <!-- <button class="btn btn-primary" type="button" id="mysubmit" onClick="SendForm('FrmAddMember','UpdateMember','admin.php')">
                Update <span class="myload"></span></button> -->
            </div>
          </div>

          <div class="myToast">
            <div id="liveToast" class="toast border-0 toastsuccess" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">İşlem</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body py-4"> Silme İşlemi Başarılı</div>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>

</div>

<div class="container">
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
                <th>Member Picture</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

            <tbody id="tableResult">
              <?php

              $myquery = $db->getRows("SELECT * FROM members");
              foreach ($myquery as $values) {
              ?>

                <tr id="<?php echo $values->MemberID ?>">
                  <th scope="row"><?php echo $values->MemberID ?></th>
                  <th><?php echo strtolower($values->MemberUsername)  ?></th>
                  <td><?php echo ConvertLetter($values->MemberName, "firstUpper") ?></td>
                  <td><?php echo ConvertLetter($values->MemberLastname, "firstUpper") ?></td>
                  <td><?php echo strtolower($values->MemberEmail) ?></td>
                  <td><?php echo $values->MemberPassword ?></td>
                  <td><?php echo $values->MemberAge ?></td>
                  <td><?php echo $values->CityName ?></td>
                  <td><?php echo $values->MemberBirthday; ?></td>
                  <td><?php echo $values->MemberGender == 'M' ? 'Erkek' : 'Kadın' ?></td>

                  <td><img style="width: 60px; border-radius: 50%;" src="<?php echo ($values->MemberGender == 'M') ? 'uploads/' . $values->MemberPicture : 'uploads/women.png'  ?>"></td>

                  <td><a href="update.php?ID=<?php echo $values->MemberID ?>" class='btn-update'><i class="bi bi-pencil-square"></i></a></td>

                  <td><a id="liveToastBtn" href="jacascript:void(0)" onclick="RemoveAll('DelMember','<?= $values->MemberID; ?>')" class="delete"><i class="bi bi-trash3"></i></a></td>
                </tr>

              <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



<?php require_once 'theme/footer.php'; ?>

<!-- Example Card application -->
<!-- <div class="card mt-3">
  <div class="card-body">
    <div class="container">
      <div class="row">

        <?php $myquery = $db->getRows("CALL MEMBERS()");
        foreach ($myquery as $values) {
        ?>

          <div class="col-md-3">
            <div class="card my-3 p-0">
              <div> <img class="w-100" src="<?php echo ($values->MemberGender == 'M') ? 'uploads/' . $values->MemberPicture : 'uploads/women.png'  ?>" alt=""> </div>
              <div class="p-3 bg-dark text-white">
                <p><?php echo ConvertLetter($values->MemberName, "firstUpper") . " " . ConvertLetter($values->MemberLastname, "firstUpper")  ?></p>
                <p><?php echo strtolower($values->MemberEmail) ?></p>
                <p><?php echo $values->CityName ?></p>
                <p><?php echo $values->MemberBirthday; ?></p>
                <p><?php echo $values->MemberGender == 'M' ? 'Erkek' : 'Kadın' ?></p>
              </div>
            </div>
          </div>

        <?php } ?>

      </div>
    </div>
  </div>
</div> -->