<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (serialize/unserialize) Dersleri</title>

</head>

<body style="font-size:22px ;">
  <div class="p-5">
    <div class="alert alert-success">
      <?php

      //serialize = 'a:5:{s:4:"name";s:6:"Abidin";s:8:"lastname";s:8:"Gülsün";s:4:"city";s:6:"Ankara";s:3:"age";i:24;s:6:"gender";s:4:"male";}';
      //unserialize = $info = ["name" => "Abidin","lastname" => "Gülsün","city" => "Ankara","age" => 24];


      $info = [
        "name" => "Abidin",
        "lastname" => "Gülsün",
        "city" => "Ankara",
        "age" => 24
      ];

      echo "<pre>";
      print_r($info);
      echo "</pre>";

      //Girilen arrayi düz metine çevirir türlerini ve byte değerlerini bize verir
      $result = serialize($info);
      echo $result . "<br><br>";

      $info2 = 'a:5:{s:4:"name";s:6:"Abidin";s:8:"lastname";s:8:"Gülsün";s:4:"city";s:6:"Ankara";s:3:"age";i:24;s:6:"gender";s:4:"male";}';
      $result2 = unserialize($info2);

      echo "<pre>";
      print_r($result2);
      echo "</pre>";

      print_r($info2);




      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>