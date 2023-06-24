<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php Dersleri</title>
</head>

<body>

  <div class="p-5">

    <div class="alert alert-primary">
      <?php



      //global değişken fonksiyon içinden çağırılacaksa global keywordu kullanılır;
      $x = 7;
      function Deneme()
      {
        //Local Değişken fonsiyon içinde yazılır $x = 5;
        $x = 6;
        echo "<p> X Değişkenine fonksiyon dışından ulaştım:$x </p>";
      }
      echo "<p> X Değişkenine fonksiyon dışından ulaştım:$x </p>";

      function Test()
      {
        static $y = 6;
        echo $y;
        $y++;
      }

      Deneme();
      echo "<br>";
      Test();
      echo "<br>";
      Test();
      echo "<br>";
      Test();
      echo "<br>";

      //print birden fazla yazı almaz
      //echo ise alır 
      //for examle 
      //Yanlış: *print "naber","canım";
      //Doğru:  ^^echo "naber","canım"; 


      $num = 123;
      $num2 = 12.3332133;
      $num3 =  true;
      $num4 =  "true";
      $languages = ["html", "css", "javascript", "php", "Nodejs"];
      $z = null;
      echo var_dump($num);
      echo "<br>";
      echo var_dump($num2);
      echo "<br>";
      echo var_dump($num3);
      echo "<br>";
      echo var_dump($num4);
      echo "<br>";
      echo "<br>";
      echo var_dump($languages);
      echo "<br>";
      echo "<br>";
      print_r($languages);
      echo "<br>";





      ?>




    </div>
























  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>