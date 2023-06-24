<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Numbers) Dersleri</title>
</head>

<body style="font-size:22px ;">
  <div class="p-5">
    <div class="alert alert-success">
      <?php

      /* 
        $var = 12565655665;
        echo number_format($var) . "<br><br>";

        $var = "Bu bir string değişkenidir";
        echo $var . "<br><br>";

        $var = 7.5;
        echo $var . "<br><br>";

        //Değişkenin tam sayı olup olmadığını kontrol eder
        if (is_int($var)) {
          echo $var . " Bir tam sayıdır.";
        } else {
          echo $var . " Bir tam sayı değildir." . "<br><br>";
        }

        //Değişkenin ondalıklı sayı olup olmadığını kontrol eder
        if (is_float($var)) {
          echo $var . " Bir ondalıklı sayıdır." . "<br><br>";
        } else {
          echo $var . " Bir ondalıklı sayı değildir." . "<br><br>";
        }


        //Değişkenin double sayı olup olmadığını kontrol eder
        if (is_double($var)) {
          echo $var . " Bir double sayıdır." . "<br><br>";
        } else {
          echo $var . " Bir double sayı değildir." . "<br><br>";
        }

        //Değişkenin sonsuz sayı olup olmadığını kontrol eder
        $x = 1.9e423;
        if (is_infinite($x)) {
          echo $x . " Bir sonsuz sayıdır." . "<br><br>";
        } else {
          echo $x . " Bir sonsuz sayı değildir." . "<br><br>";
        }


        //Değişkenin NAN sayı olup olmadığını kontrol eder
        $x = acos(8);
        if (is_nan($x)) {
          echo $x . " Bu bir sayı değildir." . "<br><br>";
        } else {
          echo $x . " Bu bir sayıdır." . "<br><br>";
        }

        //Değişkenin Numeric sayı olup olmadığını kontrol eder
        //Baş
        $x = 989;
        if (is_numeric($x)) {
          echo $x . " Bu bir sayısal değerdir." . "<br><br>";
        } else {
          echo $x . " Bu bir sayısal değer değildir." . "<br><br>";
        }

        $x = "989";
        if (is_numeric($x)) {
          echo $x . " Bu bir sayısal değerdir." . "<br><br>";
        } else {
          echo $x . " Bu bir sayısal değer değildir." . "<br><br>";
        }

        $x = "989" + 10;
        if (is_numeric($x)) {
          echo $x . " Bu bir sayısal değerdir." . "<br><br>";
        } else {
          echo $x . " Bu bir sayısal değer değildir." . "<br><br>";
        }

        //$x="deneme";
        $x = 0xf4c3b00c;
        if (is_numeric($x)) {
          echo $x . " Bu bir sayısal değerdir." . "<br><br>";
        } else {
          echo $x . " Bu bir sayısal değer değildir." . "<br><br>";
        }
        //Son

        //Float(double) Veri türünü inte çevirir
        $x = 794.123;
        echo (int)$x . "<br>";

        $x = 794.123;
        echo (int)$x . "<br><br>";

        $y = 432.233;
        $a =(int)$y;
        if (is_int($a)) {
          echo $a . " Bu bir tam sayıdır";
        } else {
          echo $a." Bu bir tam sayı değildir";
        }
      */

      /*  
        //Girilen değeri pozitif değere çevirir
        echo abs(7.1) . "<br>";
        echo abs(-7.1) . "<br><br>";

        //trigonometri fonksiyonlar bilmiyorum...
        //echo acos(-7.1)."<br><br>";

        //hexdecimal 16 lık sayı değerini 8 lik değere çevirir...
        echo base_convert("E196", 16, 8) . "<br><br>";

        //hexdecimal binary :D anlamadım valla değere çevirir...
        echo bindec("0011") . "<br>";
        echo bindec("111") . "<br><br>";

        //Girilen ondalıklı sayıyı en yakın tam  üst sayıya yuvarlar
        echo ceil(1.2) . "<br>";
        echo ceil(9.1) . "<br><br>";

        //Girilen ondalıklı sayıyı en yakın tam alt sayıya yuvarlar
        echo floor(0.9) . "<br><br>";
        echo floor(1.9) . "<br><br>";

        //cosinus değer verir
        echo cos(3) . "<br>";
        echo cos(0) . "<br>";

        //cosinus Hyperbolic cosine
        echo cosh(3) . "<br>";
        echo cosh(0) . "<br><br>";

        //Bölünen sayının modunu kalanını alır yani 7/3 2 dir kalan bölünmeyen sayı 1 dir
        //output: 1
        echo fmod(7, 3) . "<br><br>";

        //Bulabileceği en büyük random sayıyı verir
        echo getrandmax() . "<br>";

        //Her Seferinde farklı bir random değer verir
        echo rand() . "<br>";

        //Girilen 2 değerin arasında random sayı verir
        echo rand(10, 11) . "<br>";

        //Girilen hane sayısına göre random max sayıyı verir
        echo rand(10, getrandmax()) . "<br><br>";

        //Girilen sayıları integer olarak böler
        echo intdiv(8,4). "<br>";
        echo intdiv(9,3). "<br>";
        echo intdiv(100,5). "<br><br>";

        //Bir sayı dizisinde minimum en düşük sayıyı bulur
        echo "min(2,8,22,6,70,15):".min(2,8,22,6,70,15). "<br>";

        //Bir sayı dizisinde maximum en büyük sayıyı bulur
        echo "min(2,8,22,6,70,15):".max(2,8,22,6,70,15). "<br><br>";
      */

      //Parametre belirtmeden büyük random sayılar
      //üretir parametrede belirtilirse ona göre sayı üretilir
      echo mt_rand() . "<br><br>";
      echo mt_rand() . "<br><br>";
      echo mt_getrandmax() . "<br><br>";

      //pi sayısını verir
      echo pi() . "<br><br>";

      //Bir sayının üst değerini verir
      echo "pow(2,5) " . pow(2, 5) . "<br>";
      echo "pow(-2,5) " . pow(-2, 5) . "<br>";
      echo "pow(2,4) " . pow(2, 4) . "<br>";
      echo "pow(3,5) " . pow(3, 5) . "<br><br>";

      //Random sayıları verir 
      echo rand(). "<br><br>";

      //Girilen sayıları en yakın tam sayıya yuvarlar
      echo "0.50 ".round(0.50). "<br>";
      echo "0.60 ".round(0.60). "<br>";
      echo "0.40 ".round(0.40). "<br>";
      echo "0.90 ".round(0.90). "<br><br>";

      //Bir sayının kare kökünü verir
      echo sqrt(9). "<br>";
      echo sqrt(81). "<br>";


























      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>