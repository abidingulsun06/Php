<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (functions) Lessons</title>
  <style>

  </style>
</head>

<body style="font-size:22px ;">
  <div class="p-5">
    <div class="alert alert-success">
      <?php

      /*
        function messageBox($name, $yas)
        {
          $name = strtoupper($name);
          echo "$name Gülsün: " . $yas . "<br>";
        }

        messageBox("abidin", "24");
        messageBox("naciye", 16);
        messageBox("rahile", 48);
        messageBox("aysen", 38);
        messageBox("elif", 30);
        messageBox("saliha", 27);

        function topla($x, $y)
        {
          echo $x + $y;
        }

        topla(15, 54);


        echo "<br>";
        function setWitdh($minWidth = 678, $minHeight = 500)
        {
          echo "Genişlik: $minWidth, Yükseklik $minHeight <br>";
        }

        setWitdh(400);
        setWitdh();
        setWitdh(100, 769);
        setWitdh(600, 1290);
        setWitdh(1200, 678);

        function sum($x, $y)
        {
          $z = $x + $y;
          return $z;
        }

        function multi($a, $b)
        {
          return  $a * $b;
        }

        function sum2($a,  $b)
        {
          $z = ($a + $b);
          return $z;
        }


        function add(&$value)
        {
          $value += 5;
        }

        $myNumber = 14;
        add($myNumber);



        echo sum(7, 12) . "<br>";

        echo multi(9, sum(7, 12)) . "<br>";

        echo "100 - 70=" . (100 - sum(65, 5)) . "<br>";

        echo "sonuc= " . sum2(1.7, 5) . "<br>";


        echo $myNumber;

      */

      /*
        //Dizi fonksiyonları
        define('languages', ["php", "Java", "React", "javascript", "html", "css"]);
        $age  = ["Abidin" => "24", "Ayşen" => "42", "Zümra" => "15"];
        $cars = array(
          array("skoda", 2, 21),
          array("Nissan", 3, 21),
          array("Bmw", 4, 15),
          array("Fiat", 8, 3),
          array("Mercedes", 4, 1),
          array("Megan", 4, 1, 4),
        );

        function myFunc()
        {
          echo "I Like ";
          foreach (languages as $value) {
            echo $value . "-";
          }
        }
        echo myFunc() . "<br>";


        foreach ($age as $key => $value) {
          echo $key . ":" . $value . "<br>";
        }

        for ($i = 0; $i < count($cars); $i++) {
          echo "<strong>Satır numarası: $i</strong>";
          echo "<ul>";
          for ($x = 0; $x < count($cars[0]); $x++) {
            echo "<li>" . $cars[$i][$x] . "</li>";
          }

          echo "</ul>";
        }
      */
      /*
          $message = function () {
            echo "Anonim fonksiyonlar <br>";
          };

          $message() . "<br>";

          $languages = [
            "Php",
            "Asp",
            "Javascript",
            "java",
            "react",
            function () {
              echo "array içinde method çağırma";
            },
            "Html",
            "Css",
            "node js"
          ];

          echo $languages[5]() . "<br>";


          function demo()
          {
            //Funtions içindeki tüm parametreleri getirir func_get_args();
            $parValues = func_get_args();
            //Funtions içindeki tek parametreyi getirir
            $par = func_get_arg(0);
            foreach ($parValues as $result) {
              echo $result . "<br>";
            }
            echo $par . "<br>";
          }
          demo("Abidin", "Naciye", "Elif", "Saliha", "Ayşen", "Rahile", "Maşo", "Ahmet", "Gülsün");



          function operation($par, $number)
          {
            if ($par == "topla")
              $process = 1;
            elseif ($par == "çıkar")
              $process = 2;
            elseif ($par  == "çarp")
              $process = 3;
            elseif ($par == "böl")
              $process = 4;
            return calculate($process, $number);
          }

          function calculate($process2, $number2)
          {
            if ($process2 == 1)
              $result = $number2 + 7;
            elseif ($process2 == 2)
              $result = $number2 - 7;
            elseif ($process2 == 3)
              $result = $number2 * 7;
            elseif ($process2 == 4)
              $result = $number2 / 7;

            return $result;
          }
          echo operation("topla", 20) . "<br>";

          ($run = function () {
            echo 'otomatik çalışan functions';
          })();

      */

      //Kendini tekrar eden functionslar
      function message($number)
      {
        if ($number <= 5) {
          echo '<ul class="list-group">';
          echo "<li class='list-group-item'>$number - php ile recursive yapılar </li>";
          echo '</ul>';
          message($number + 1);
        }
      }
      message(1);


      function operation($last)
      {
        echo '<ul class="list-group">';
        for ($i = 0; $i < $last; $i++) {
          echo "<li class='list-group-item'>" . ($i + 1) . "</li>";
        }
        echo '</ul>';
      }

      operation(5) . "<br>";


      function operation2($last2)
      {
        $numbers = [];
        for ($i = 0; $i < $last2; $i++) {
          $numbers[$i]  = ($i + 1);
        }
        return $numbers;
      }

      $result = operation2(5);

      echo '<ul class="list-group">';
      foreach ($result as $myValue) {
        echo "<li class='list-group-item'>$myValue</li>";
      }
      echo '</ul>';


      //iç içe fonksiyonlar


      function mainFunction()
      {
        function aa()
        {
          echo 'Ben ana fonksiyonun içindeki ' . __FUNCTION__ . ' fonksiyonuyum<br>';
        }
        echo __FUNCTION__ . ' dasın<br>';
      }

      mainFunction();
      aa();


      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>