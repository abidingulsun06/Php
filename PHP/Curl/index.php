<?php require_once 'pages/header.php'; ?>

<div class="card">
  <div class="card-body">
    <?php
    //Siteyi çekeriz verileri getiririz
    //curl_setopt($myCurl, CURLOPT_URL, "https://www.turkcell.com.tr/");

    //veriyi bir varaibleye atarız true parametresi ile
    //curl_setopt($myCurl, CURLOPT_RETURNTRANSFER, true);

    //veriyi bir süreye hapsederiz bu saniye içinde gelmezse veriyi almayız
    //curl_setopt($myCurl, CURLOPT_TIMEOUT, 4);

    //Gelen sitenin çekmiş olduğu verileride çekeriz
    //curl_setopt($myCurl, CURLOPT_FOLLOWLOCATION, true);

    /*
      curl_setopt_array($myCurl, [
        CURLOPT_URL => "http://localhost/PHP/Curl/data.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT =>  4,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => ["name" => "Fehmi", "lastname" => "uyar"],
        CURLOPT_COOKIE => "username=Abidingulsun cookiesi"
        //gelen sitenin body kısmını almıyoruz
        //CURLOPT_NOBODY => true,
        //gelen sitenin header kısmını alır
        //CURLOPT_HEADER => true
      ]);
    */

    $myCurl = curl_init();
    curl_setopt_array($myCurl, [
      CURLOPT_URL => "https://www.turkcell.com.tr/",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT =>  12
    ]);

    $result = curl_exec($myCurl);
    preg_match_all('/src="(.*?)"/', $result, $myvalue);

    foreach ($myvalue[1] as $value) {
      $ext = pathinfo($value, PATHINFO_EXTENSION);

      if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif') {
        echo '<img src="' . $value . '" class="img-fluid p-3" /><br>';
      }
    }

    echo curl_error($myCurl);
    curl_close($myCurl);

    ?>
  </div>
</div>


<?php require_once 'pages/footer.php'; ?>