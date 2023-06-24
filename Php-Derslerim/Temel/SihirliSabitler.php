<?php

namespace different; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Php (Http durum kodları) </title>
</head>

<body style="font-size:22px ;">
  <div class="p-5">
    <div class="alert alert-secondary border-0">

      <?php
      //Bulunduğu satırın numarasını verir
      $myRow = __LINE__;
      $myDır = __DIR__;
      $myFile = __FILE__;
      echo "Satır numarası:" . $myRow . "<br>";
      echo "Dosya yolu:" . $myDır . "<br>";
      echo "Dosya ismi:" . $myFile . "<br>";

      trait kalitimInheritance
      {
        function miras()
        {
          echo "Inheritance(kalitim/miras) adı: " . __TRAIT__ . "<br>";
        }
        function goster()
        {
          echo "Kalitim miras harikaymış <br>";
        }
      }

      //__Function__ ismimizi verir
      function showMe()
      {
        echo "Fonksiyon adı:" . __Function__ . "<br>";
      }
      showMe();

      class MyClass
      {
        use kalitimInheritance;
        function show()
        {
          echo "Sınıf Adı:" . __CLASS__ . "<br>";
        }
      }

      $isimAl = new MyClass;
      $isimAl->show();
      $isimAl->miras();
      $isimAl->goster();

      //Name space ile aynı isime sahip olan classları birbirinden ayırmamızı sağlar sayfanın en başına eklenen kod blogu ile different ismini alarak diffrent içindeki class olarak diğerlerinden ayrılır
      $deneme = __NAMESPACE__;
      echo $deneme;


      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>