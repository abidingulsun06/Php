<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Filter Functions) Lessons</title>
  <style>
    ul {
      list-style-type: none !important;
    }
  </style>
  <link href="../css/main.css" rel="stylesheet">
</head>

<?php require "../functions/safe.php"; ?>

<body class="p-2">


  <div class="mt-3 card">
    <div class="card-body">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="row align-items-center mb-3">
          <div class="col-md-1"><label>Email</label></div>
          <div class="col-md-6 mx-3"><input type="text" name="myText" class="form-control"></div>
        </div>
        <button class="btn btn-success mt-3" type="submit">Gönder</button>
      </form>
    </div>
  </div>

  <div class="card mt-3">
    <div class="card-body">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*
          $text = security($_POST['txt']);
          $filterId = filter_id('validate_email');
          $isEmail = filter_var($text, $filterId);

          if ($isEmail) {
            echo '<div class="alert alert-success">Eposta Formatı geçerli. (' . $text . ')</div>';
          } else {
            echo '<div class="alert alert-danger">Eposta Formatı geçerli değil!. ' . $text . ' </div>';
          } 
           //filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL bir inputun türüne göre filtreler mail ise mail formatındadır yada mail formatında değildir diyerek değer döndürebiliriz.
          if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) === false) {
          echo  '<div class="alert alert-danger">Bu eposta formatı geçerli değil!( ' . $email . ')</div>';
          }
          $email = security($_POST['email']);
          $age = security($_POST['age']);
          $filters = [
            "email" => FILTER_VALIDATE_EMAIL,
            "age" => [
              "filter" => FILTER_VALIDATE_INT,
              "options" => ["min_range" => 1, "max_range" => 110]
            ]
          ];

          $myInput = filter_input_array(INPUT_POST, $filters);

          if ($myInput["email"] === false) {
            echo  '<div class="alert alert-danger">Bu eposta formatı Geçersiz! (' . $email . ')</div>';
            exit();
          } elseif ($myInput["age"] === false) {
            echo  '<div class="alert alert-danger">Yaş aralığı 1-110 arasında olabilir.' . $age . '</div>';
            exit();
          } else {
            echo  '<div class="alert alert-info"> email: ' . $email . " ve yaş:" . $age . ' Sorunsuz Çalışıyor!</div>';
          }
          }
        */


        //($text, FILTER_SANITIZE_EMAIL) eğer veriye türkçe karakter yada özel karakterler girilirse onlardan veriyi arındırıp doğrusunu bize verecektir 
        //girilen veri abidingln6336@g/ma.il.c//*om
        //Çıkan veri abidingln6336@gmail.com


        //FILTER_VALIDATE_BOOLEAN veriyi true, false kontrölünden geçirir
        //FILTER_VALIDATE_INT veriyi integer kontrölünden geçirir
        //FILTER_VALIDATE_FLOAT double kontrölünden geçirir
        // if (filter_var($text, FILTER_VALIDATE_INT,
        //["options"=>["min_range"=>50,"max_range"=>80]])!=false)

        //girilen veriyi türüne göre harflerden ve özel karakterlerden ayıklar                                                     $text = filter_var($text, FILTER_SANITIZE_NUMBER_INT);       $text = filter_var($text, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);                                $text = filter_var($text, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //FILTER_SANITIZE_SPECIAL_CHARS özel karakterleri siler
        //FILTER_VALIDATE_REGEXP verinin regex göre kontrol eder
        //FILTER_VALIDATE_URL verinin URL göre kontrol eder
        //FILTER_FLAG_QUERY_REQUIRED SORGULARI ZORUNLU KILAR
        //FILTER_FLAG_PATH_REQUIRED pathi konrtol eder
        //FILTER_SANITIZE_URL URL İÇİNDEKİ ÖZEL KARAKTERLERİ SİLER
        //FILTER_VALIDATE_IP ip adresini konrtol eder
        //FILTER_FLAG_IPV4 ip adresini 4 e göre kontrol eder
        //FILTER_FLAG_IPV6 ip adresini 6 e göre kontrol eder
        //FILTER_SANITIZE_STRING stringler içindeki özel karakteri VE HTML ETİKETLERİNİ siler
        //FILTER_SANITIZE_STRIPPED stringler içindeki özel karakteri VE HTML ETİKETLERİNİ siler
        //FILTER_SANITIZE_MAGIC_QUOTES ' işaretlerine / koyar

        //ip4:127.0.0.1.146 
        //ip6: 2001:0db8:85a3:0000:0000:8a2e:0370:7334

        $text = security($_POST['myText']);
        if (filter_var($text, FILTER_VALIDATE_URL)) {
          echo '<div class="alert alert-success">Bu URL adresi geçerli... (' . $text . ')</div>';
        } else {
          echo '<div class="alert alert-danger">Bu URL adresi geçerli değil!</div>';
        }
      } else {
        echo '<div class="alert alert-danger">Method Post Değil!</div>';
      }

      ?>


    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="../js/app.js"></script>
</body>

</html>

<!-- Filter Fonksiyonlar -->

<?php

// $text = $_GET['txt'];
// if (filter_has_var(INPUT_POST, 'txt')) {
//   echo '<div class="alert alert-success">İşlem başarılı method Post.</div>';
// } else {
//   echo '<div class="alert alert-danger">Post olarak değer göndermedin. ' . $text . ' </div>';
//   exit();
// }

?>

<!-- <table class="table">
      <thead>
        <th scope="col">Filter Name</th>
        <th scope="col">Filter Id</th>
      </thead>
      <tbody>
      <?php
      //  foreach (filter_list() as $myId => $myFilterName) {
      //     echo '<tr>';
      //    echo  "<td> $myFilterName</td>";
      //      echo  "<td>" . filter_id($myFilterName) . "</td>";   
      //      echo '</tr>';
      //    }
      ?>
        </tbody>
    </table> -->