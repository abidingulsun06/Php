<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Php (Hata ayıklama) </title>
</head>

<body style="font-size:22px ;">
  <div class="p-5">
    <div class="alert alert-secondary border-0">
      <?php

      $number1 = 70;
      $number2 = 2;

      try {
        if ($number2 == 0) {
          throw new Exception("İkinci sayı sıfır olamaz");
        }
        echo $number1 / $number2 . "<br>";
      } catch (Exception $e) {
        echo $e->getMessage();
      } finally {
        echo "Durum başarılı";
      }


      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>