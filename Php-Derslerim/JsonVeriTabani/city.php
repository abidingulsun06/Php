<?php

use sifirdanphp\db\DataBase;

require_once 'theme/header.php';
$db = new DataBase();


?>

<div class="row">
  <div class="col-md-6 py-3 ">
    <div class="card mt-3">
      <div class="card-body">
        <form method="post" id="FrmAddMember">

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberCountry">Your City</label>
            <div class="col-md-9">
              <select class="form-select" name="MemberCountry" id="MemberCountry">
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
            <label class="col-md-3 col-form-label" for="MemberTown">İlçeniz</label>
            <div class="col-md-9">
              <select class="form-select" id="MemberTown">
                <option value="0">ilçedsadk seç</option>
              </select>
            </div>
          </div>


          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 my-3">
              <button class="btn btn-success" type="submit" id="mysubmit">Add<span class="myload"></span></button>
            </div>
          </div>


        </form>

      </div>
    </div>
  </div>

</div>



<?php require_once 'theme/footer.php'; ?>