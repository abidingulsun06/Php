<?php
require_once "theme/header.php";
require "../functions/combine.php";
?>


<div class="card mt-3">
  <div class="card-body">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">


      <select name="secim" class="form-select" aria-label="Default select example">
        <option selected>Hesaplama Tipini Seçiniz</option>
        <option value="teraByte"> Tera Byte</option>
        <option value="gigaByte"> Giga Byte</option>
        <option value="megaByte"> Mega Byte</option>
        <option value="kiloByte"> Kilo Byte</option>
        <option value="byte"> Byte</option>
        <option value="bit"> Bit</option>
      </select>

      <?php


      $veriCek = $_POST["secim"];
      if ($veriCek == "teraByte") {
        echo
        '<div class="my-3 row align-items-center px-3">
          <div class="col-2 p-0">
            <label class="form-label">Terabyte (TB):</label>
          </div>
          <div class="col-10 p-0">
            <input type="number" class="form-control" placeholder="terabyte (TB):" name="teraByte">
          </div>
        </div>';
      } elseif ($veriCek == "gigaByte") {
        echo
        '<div class="my-3 row align-items-center px-3">
           <div class="col-2 p-0">
             <label class="form-label">Gigabyte (GB):</label>
           </div>
           <div class="col-10 p-0">
             <input type="number" class="form-control" placeholder="Gigabyte (GB):" name="gigaByte">
           </div>
        </div>';
      } elseif ($veriCek == "megaByte") {
        echo
        '<div class="my-3 row align-items-center px-3">
          <div class="col-2 p-0">
            <label class="form-label">Megabyte (MB):</label>
          </div>
          <div class="col-10 p-0">
            <input type="number" class="form-control" placeholder="Megabyte (MB):" name="megaByte">
          </div>
        </div>';
      } elseif ($veriCek == "kiloByte") {
        echo
        '<div class="my-3 row align-items-center px-3">
          <div class="col-2 p-0">
            <label class="form-label">Kilobyte (KB):</label>
          </div>
          <div class="col-10 p-0">
            <input type="number" class="form-control" placeholder="Kilobyte (KB):" name="kiloByte">
          </div>
        </div>';
      } elseif ($veriCek == "byte") {
        echo
        '<div class="my-3 row align-items-center px-3">
          <div class="col-2 p-0">
            <label class="form-label">Byte:</label>
          </div>
          <div class="col-10 p-0">
            <input type="number" class="form-control" placeholder="Byte (B):" name="byte">
          </div>
        </div>';
      } elseif ($veriCek == "bit") {
        echo
        '<div class="my-3 row align-items-center px-3">
          <div class="col-2 p-0">
            <label class="form-label">Bit (B):</label>
          </div>
          <div class="col-10 p-0">
            <input type="number" class="form-control" placeholder="Bit (B):" name="bit">
          </div>
        </div>';
      }
      ?>
      <button class="btn btn-info mt-3" type="submit">Hesapla</button>
    </form>


  </div>
</div>

<div class="card mt-3">
  <div class="card-body">

    <?php
    if (!empty($tb = $_POST["teraByte"])) {
      echo "<strong>" . $tb . " Terabyte : </strong>";

      $xval = 1024;
      $bit =  1 / 8;
      $byte = 8 / 8;
      $kb = 1 * pow($xval, 1);
      $mb = 1 * pow($xval, 2);
      $gb = 1 * pow($xval, 3);
      $tb = $tb * pow($xval, 4);

      echo "<ul>";
      echo "<li>Bit: " . ($tb / $bit) . "</li>";
      echo "<li>Byte: " . ($tb / $byte) . "</li>";
      echo "<li>Kilobyte: " . ($tb / $kb) . "</li>";
      echo "<li>Megabyte: " . ($tb / $mb) . "</li>";
      echo "<li>Gigabyte: " . ($tb / $gb) . "</li>";
      echo "</ul>";
    } else if (!empty($gb = $_POST["gigaByte"])) {
      echo "<strong>" . $gb . " Gigabyte : </strong>";

      $xval = 1024;
      $mb = 1 / 1024;
      $kb = $mb / 1024;

      echo "<ul>";
      // echo "<li>Bit: " . ($gb / $bit) . "</li>";
      // echo "<li>Byte: " . ($gb / $byte) . "</li>";
      echo "<li>Kilobyte: " . ($gb / $kb) . "</li>";
      echo "<li>Megabyte: " . ($gb / $mb) . "</li>";
      // echo "<li>Terabyte: " . ($gb / $tb) . "</li>";
      echo "</ul>";
    }


    $mb = $_POST["megaByte"];
    $kb = $_POST["kiloByte"];
    $byte = $_POST["byte"];
    $bit = $_POST["bit"];





    // byteval = tobyte(val,opt,'BIN');
    // document.form.va3.value = byteval;
    // document.form.va31.value = byteval/1024;
    // document.form.va32.value = byteval/(1024*1024);
    // document.form.va33.value = byteval/(1024*1024*1024);
    // document.form.va34.value = byteval/(1024*1024*1024*1024);
    // document.form.va35.value = byteval/(1024*1024*1024*1024*1024);

    // eval = byteval*8;
    // document.form.va4.value = eval;
    // document.form.va41.value = eval/1024;
    // document.form.va42.value = eval/(1024*1024);
    // document.form.va43.value = eval/(1024*1024*1024);
    // document.form.va44.value = eval/(1024*1024*1024*1024);
    // document.form.va45.value = eval/(1024*1024*1024*1024*1024);

    //   value = value*[Math.pow(xval,4)];
    // else if(type == "PB")
    //   value = value*[Math.pow(xval,5)];
    // else if(type == "kilobit")
    //  value = (value*xval)/8;
    // else if(type == "megabit")
    //  value = (value*xval*xval)/8;
    // else if(type == "gigabit")
    //  value = (value*xval*xval*xval)/8;	
    // else if(type == "teraabit")
    //  value = (value*xval*xval*xval*xval)/8;	
    // else if(type == "petabit")
    //  value = (value*xval*xval*xval*xval*xval)/8;	









    ?>

  </div>
</div>


<?php require_once "theme/footer.php"; ?>