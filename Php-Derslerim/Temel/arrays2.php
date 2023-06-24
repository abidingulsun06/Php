<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (loops) Lessons</title>
</head>

<body style="font-size:22px ;">
  <div class="p-5">
    <div class="alert alert-success">
      <?php
      /*
          define('languages', ["php", "Java", "React", "javascript", "html", "css"]);
          $keys  = ["Abidin" => "24", "Enes" => "25", "Muhammed Ali" => "27", "Hakan" => "27"];
          $color1  = ["a" => "red", "b" => "green"];
          $color2 = ["c" => "red", "b" => "black"];
          $test  = [77, 45, 26, 12, 9, 1, 2, 3, 4, "19"];
          $test1  = ["Horse", "Bear", "carcodile", "dog", "bird", "snake", "Monkey"];
          $test2  = ["horse", "zebra", "cat"];


          //Array keys tüm keyleri getirmemizi sağlar Eğer parametre olarak array içindeki her hangi bir veriyi getirirseniz değer olarak sadece parametrede belirtilen valueye sahip olan veriyi getirir yani burada valuesi 24 olan verileri getirir
          $result = array_keys($keys, "25");
          for ($i = 0; $i < count($result); $i++) {
            echo $result[$i] . "<br>";
          }

          //Array values tüm valueleri getirmemizi sağlar
          $result = array_values($keys);
          for ($i = 0; $i < count($result); $i++) {
            echo $result[$i] . "-";
          }


          //Bir array içindeki aynı olan 2 veriyi false olarak verilen parametrede tür baz almadan yani int veya string olan aynı verileri getirir eğer parametre true alırsa parametrede verilen değer int ise int olan aynı değeri, eğer parametredeki string ise string olan aynı       veriyi getirir...
          $result = array_keys($test, "19", false);
          for ($i = 0; $i < count($result); $i++) {
            echo $result[$i] . "-<br>";
          }


          //Kullanıcı tarafından belirtilen bir fonksiyonu baz alarak bir array içinndeki değerleri kullanır mesela burada cube fonksiyonumuz array içindeki değerleri 3 kez çarpar sonucunu verir
          function cube($par)
          {
            return $par * $par * $par;
          }

          $result = array_map("cube", $test);
          for ($i = 0; $i < count($result); $i++) {
            echo $result[$i] . "-";
          }
          echo "<br><br>";


          //Array_merge 2 arrayi birleştirir
          function isSame($p1, $p2)
          {
            if ($p1 === $p2)
              return "Veriler aynı";
            else
              return "Veriler farklı";
          }
          $result = array_merge($test1, $test2);
          for ($i = 0; $i < count($result); $i++) {
            echo $result[$i] . "-";
          }
          echo "<br><br>";

          //2 adet arrayi birleştirir fakat anahtar kelimesi aynı olan 2 arrayi birleştirirken o arrayi ayırarak arrayin içinde 2. bir array olarak tanımlar örneğin 2 adet b anahtarı olan array içinde b adında yada arrayin anahtar adı her ne ise o isimde bir array oluşturur
          $result = (array_merge_recursive($color1, $color2));
          foreach ($result as $key => $value) {
            if ($key == "b") {
              echo  "B Arrayi =><ul>";
              for ($i = 0; $i < count($value); $i++) {
                echo "<li>" . $value[$i] . "</li>";
              }
              echo "</ul>";
            } else
              echo $key . ":" . $value . "<br>";
          }
          echo "<br><br>";

          //Bir array içindeki verileri alfabetik sıralamaya göre a dan z ye sıralar

          //SORT_ASC => A dan Z ye sıralar 
          //SORT_DESC => Z den A ya sıralar
          //SORT_REGULAR => Default(varsayılan) sıralamaya göre sıralar
          //SORT_STRİNG => Stringleri sıralar
          $result = $test1;
          $j = 0;
          foreach ($result as $element) {
            $result[$j] = strtolower($element);
            $j++;
          }
          array_multisort($result, SORT_ASC, SORT_STRING);
          for ($i = 0; $i < count($result); $i++) {
            echo $result[$i] . "<br>";
          }

          //Array içindeki verileri numeric olanlarını azdan çoğa sıralar
          $result = $test;
          array_multisort($result, SORT_ASC, SORT_NUMERIC);
          for ($i = 0; $i < count($result); $i++) {
            echo $result[$i] . "<br>";
          }
      */

      /*
        define('languages', ["php", "Java", "React", "javascript", "html", "css"]);
          $keys  = ["Abidin" => "24", "Enes" => "25", "Muhammed Ali" => "27", "Hakan" => "27"];
          $color1  = ["a" => "red", "b" => "green"];
          $color2 = ["c" => "red", "b" => "black"];
          $test  = [77, 45, 26, 12, 9, 1, 2, 3, 4, "19"];
          $test1  = ["Horse", "Bear", "carcodile", "dog", "bird", "snake", "Monkey"];
          $test2  = ["horse", "zebra", "cat", "Horse"];

          //Array pad ile b,r array içine parametrede belirtilen indexe Veri ekleye biliriz
          $result = array_pad($test2, 4, "monkey");
          for ($i = 0; $i < count($result); $i++) {
            echo ('<li>' . $result[$i] . "</li>");
          }
          echo "<br><br>";


          //Bir array içindeki son indexte bulunan bir veriyi array_pop ile silebiliriz
          $result = $test2;
          array_pop($result);
          echo "<ul>";
          for ($i = 0; $i < count($result); $i++) {
            echo '<li>' . $result[$i] . "</li>";
          }
          echo "</ul>";
          echo "<br><br>";

          //Bir numeric array içindeki verilerin çarpımının sonucunu verir array_product fonksiyonu
          $result = $test;
          array_product($result);
          echo "<ul>";
          echo '<li>' . array_product($result) . "</li>";
          echo "</ul>";
          echo "<br><br>";


          //Bir dizinin içerisine istiğimiz parametre ile veri ekleriz array_push ile
          $result = $test2;
          array_push($result, "Kutup ayısı", "Köpek", "İnek");
          echo "<ul>";
          for ($i = 0; $i < count($result); $i++) {
            echo '<li>' . $i . "." . $result[$i] . "</li>";
          }
          echo "</ul>";
          echo "<br><br>";


          //array_rand tür farketmeksizin parametrede belirtilen sayıya göre random veri verir misal burda $test2 array içinde hayvanlar var 2 adet random hayvan seçecek bizim için ekrana önce 0.indexte bulduu veriyi verecek sonrasında ise 1.indexte bulduğu veriyi verecektir
          $result = $test2;
          $myRandom = array_rand($test2, 2);
          echo "<ul>";
          echo '<li>' . $test2[$myRandom[0]] . "</li><br>";
          echo '<li>' . $test2[$myRandom[1]] . "</li><br>";
          echo "</ul>";



          //array_reduce ile arrayi string bir veriye çeviririz
          //String verinin başına bir başlık eklemek istersek 3.bir parametre ile başlık ismi verilebilir
          function transform($p1, $p2)
          {
            return $p1 . ' - ' . $p2;
          }

          $result = $test2;
          echo array_reduce($test2, "transform", 'animal:');
          echo "<br><br>";
     */

      /*         
        define('languages', ["php", "Java", "React", "javascript", "html", "css"]);
        $keys  = ["Abidin" => "24", "Enes" => "25", "Muhammed Ali" => "27", "Hakan" => "27"];
        $color1  = ["red",  "green"];
        $color2 = ["white",  "black"];
        $test  = [77, 45, 26, 12, 9, 1, 2];
        $test1  = ["Horse", "Bear", "carcodile", "dog", "bird", "snake", "Monkey"];
        $test2  = ["horse", "zebra", "cat", "Horse"];

        //Array_replace ile 2.parametrede verilen arrayi alıp 1. parametredeki arrayle değiştirir
        $result = array_replace($color1, $color2);
        echo "<ul>";
        for ($i = 0; $i < count($result); $i++) {
          echo '<li>' . $i . "." . $result[$i] . "</li>";
        }
        echo "</ul>";

        //array_replace_recursive 2.arraydki valuleri alıp 1.arraye yazar
        $color1  = ["r" => "red", "g" =>  "green", "b" =>  "blue", "w" =>  "white"];
        $color2 = ["r" => "pink", "g" =>  "yellow"];
        print_r(array_replace_recursive($color1, $color2));

        //array_reverse Bir arraydaki verileri sondan başa doğru sıralar
        $animals  = ["Horse", "Bear", "carcodile", "dog", "bird", "snake", "Monkey"];
        $result = array_reverse($animals);

        $j = 0;
        foreach ($result as $element) {
          $result[$j] = ucfirst($element);
          $j++;
        }
        echo "<ul>";
        for ($i = 0; $i < count($result); $i++) {
          echo '<li>' . $i . "." . $result[$i] . "</li>";
        }
        echo "</ul>";

        //array_search ile bir array içindeki veriyi ararız sonuç olarak kaçıncı indexte olduğunu bize döner
        echo array_search('snake', $animals) . "<br><br>";


        //Bir arraydan ilk öğeyi kaldırır kaldırılan öğenin değerini döndürür
        $text = "kaldırılan değer: " . strtoupper(array_shift($animals));

        $i = 0;
        foreach ($animals as $element) {
          $animals[$i] = strtoupper($element);
          $i++;
        }

        echo  "<ul>";
        foreach ($animals as $key => $value) {
          echo "<li>" . $key . "-" . $value . "</li>";
        }
        echo "</ul>";
        echo $text . "<br><br>";


        //array_slice parametrede verilmiş olan arrayin 2. parametrede verilen sayıdan itibaren verileri getirir arrayi böler ve burada 4. indexten itibaren verileri getirir
        $result = array_slice($animals, 0, 2);
        echo "<ul>";
        for ($i = 0; $i < count($result); $i++) {
          echo '<li>' .  $result[$i] . "</li>";
        }
        echo "</ul>";


        //array_splice verilen parameredeki sayılara göre ikinci arraydeki verileri 1.Arrayin içine aktarır mesela 1,3 parametreleri ile 1.indexten itibaren 3.indexe yazdırır 
        $color1  = [
          "r" => "red",
          "g" =>  "green",
          "b" =>  "blue",
          "w" =>  "white"
        ];
        $color2 = [
          "r" => "pink",
          "g" =>  "yellow",
          "b" =>  "black",
        ];
        $result = array_splice($color1, 1, 3, $color2);
        echo "<ul>";
        foreach ($color1 as $myKey => $myValue) {
          echo '<li>' .  $myKey . "-" . $myValue . "</li>";
        }
        echo "</ul>";

        //array_sum Bir arrayin içindeki numbersleri toplar
        echo "Arrayın toplamı :" . array_sum($test);
      */

      /*
          define('languages', ["php", "Java", "React", "javascript", "html", "css"]);
          $keys  = ["Abidin" => "24", "Enes" => "25", "Muhammed Ali" => "27", "Hakan" => "27"];
          $color1  = [
            "r" => "red",
            "g" =>  "green",
            "b" =>  "blue",
            "d" =>  "white",
            "w" =>  "white",
          ];
          $color2 = [
            "r" => "pink",
            "g" =>  "yellow",
            "b" =>  "black",
          ];
          $test  = [77, 45, 26, 12, 9, 1, 2];
          $test1  = ["Horse", "Bear", "carcodile", "dog", "bird", "snake", "Monkey"];
          $test2  = ["horse", "zebra", "cat", "Horse"];

          //array_unique Arrayi arar içindeki aynı value değerini sahip olanları getirmez sadece benzersiz olanları getirir
          $result = array_unique($color1);
          echo "<ul>";
          foreach ($result as $key => $value) {
            echo '<li>' . $value . '</li>';
          }
          echo "</ul>";

          //array_unshift Array içine girer en başa veri ekler
          array_unshift($color1, "black");
          echo "<ul>";
          foreach ($color1 as $key => $value) {
            echo '<li>' . $value . '</li>';
          }
          echo "</ul>";

          //array_values Array içine girer value değerleri getirir
          $result = array_values($color1);
          echo "<ul>";
          for ($i = 0; $i < count($result); $i++) {
            echo '<li>' . $result[$i] . '</li>';
          }
          echo "</ul>";

          $color1  = [
            "r" => "red",
            "g" =>  "green",
            "b" =>  "blue",
            "d" =>  "white",
            "w" =>  "white",
          ];

          //array_walk ile bir fonksiyona arrayi atar arrayi key value ile funktionsda yazabiliriz
          function showValue($val, $key,  $par)
          {
            echo $key, $par, $val . "<br>";
          }
          array_walk($color1, "showValue", ":");
          array_walk_recursive($color2, "showValue", ":");

          //Arsort ile array içinde valueleri büyükten küçüğe arryi sıralars
          arsort($keys);
          echo "<ul>";
          foreach ($keys as $key => $value) {
            echo '<li>' . $key . ":" . $value . '</li>';
          }
          echo "</ul>";

          //asort ile array içinde valueleri küçükten büyüğe arryi sıralars
          asort($keys);
          echo "<ul>";
          foreach ($keys as $key => $value) {
            echo '<li>' . $key . ":" . $value . '</li>';
          }
          echo "</ul>";


          //krsort ile array içinde anahtarları z den a ya sıralar
          krsort($keys);
          echo "<ul>";
          foreach ($keys as $key => $value) {
            echo '<li>' . $key . ":" . $value . '</li>';
          }
          echo "</ul>";


          //krsort ile array içinde anahtarları a den z ya sıralar
          ksort($keys);
          echo "<ul>";
          foreach ($keys as $key => $value) {
            echo '<li>' . $key . ":" . $value . '</li>';
          }
          echo "</ul>";

          //Verileri birleştirir bir array haline sokar compact methodu
          $name = "Abidin";
          $last_name = "Gülsün";
          $age = "24";
          $result = compact("name", "last_name", "age");
          foreach ($result as $key => $value) {
            echo $key . ":" . $value . "<br>";
          }

          echo count(languages) . "<br>";
          $cars = [
            "VOLVO" => array("XC60", "XC90"),
            "BMW" => array("X3", "X5"),
            "NİSSAN" => array("QASHQAİ", "X TRAIL"),
            "AUDİ" => array("A3", "A4"),

          ];
          //Bir array içindeki verileri toplu halde görmek için parametre olarak 1 eklenir
          echo count($cars, 1) . "<br>";

          //Dahili ilk veriyi gösterir current
          echo current(languages) . "<br>";

          $test2  = ["horse", "zebra", "cat", "Horse"];

          //next methodu ile dahili yani ilk göstergeden sonrasını gösterecektir eğer tekrar next yazılırsa bir sonrakini gösterir bu paradoxta ilerler
          echo next($test2) . "<br>";

          //nextin aksine bir öncekini gösterir
          echo prev($test2) . "<br>";

          //Son elemanı gösterir
          echo end($test2) . "<br>";

          //yukardaki tüm methodların yapmış olduğu işlevleri sıfırlar default hale getirir
          echo reset($test2) . "<br>";

          $color1  = [
            "r" => "red",
            "g" =>  "green",
            "b" =>  "blue",
            "d" =>  "white",
            "w" =>  "white",
          ];
          //extract methodu bir array içindeki key i alıp bir değişken gibi kullanmamızı sağlıyor
          extract($color1);
          echo $r . "<br>";
          echo $g . "<br>";
          echo $b . "<br>";
          echo $d . "<br>";
          echo $w . "<br>";


          //in array methodu bir aray içindeki veriyi arar içinde varsa bize if else koşulları ile ekrana verir büyük küçük harf duyarlıdır ayrıca true false parametreleri ile tür olarakta veriyi kontrol edebiliriz 
          if (in_array("PHP", languages, true)) {
            echo "aranan veri mevcuttur<br>";
          } else {
            echo "aranan veri mevcut değildir<br>";
          }

          //Bir array içindeki ilk keyi verir
          echo key($color1) . "<br>";
      */
      define('languages', ["php", "Java", "React", "javascript", "html", "css"]);
      $keys  = ["Abidin" => "24", "Enes" => "25", "Muhammed Ali" => "27", "Hakan" => "27"];
      $color1  = [
        "r" => "red",
        "g" =>  "green",
        "b" =>  "blue",
        "d" =>  "white",
        "w" =>  "white",
      ];
      $color2 = [
        "r" => "pink",
        "g" =>  "yellow",
        "b" =>  "black",
      ];
      $test  = [77, 45, 26, 12, 9, 1, 2];
      $test1  = ["Horse", "Bear", "carcodile", "dog", "bird", "snake", "Monkey"];
      $test2  = ["horse", "zebra", "cat", "snake"];


      //List methodu istediğiniz kadar parametre vererek bir array içine ulaşır verilen parametrelerin indexine göre array içindeki nesnelere ulaşır ve her birini ayrı ayrı ulaşmamızı sağlar
      list($x, $y, $z, $s) = $test2;
      echo "$x,$y,$z,$s güzel hayvanlardır<br>";

      echo pos(languages) . "<br>";

      //range methodu parametrede belirtilen nesneleri başlangıç ve son olmak üzere sayar
      $result = range(1, 10);
      for ($i = 0; $i < count($result); $i++) {
        echo $result[$i] . "<br>";
      }
      echo "<br>";

      $l = ["Php", "Java", "React", "javascript", "html", "css"];
      $result = $l;
      $j = 0;
      foreach ($result as $element) {
        $result[$j] = strtolower($element);
        $j++;
      }

      //Sort verileri küçükten büyüğe sıralar a-z ye sıralar rsort ise z den a ya sıralar
      sort($result);
      foreach ($result as $key => $value) {
        echo $value . "<br>";
      }
      echo "<br>";

      //shuffle methodu bir array içindeki verileri random olarak getirir
      shuffle($l);
      foreach ($l as $key => $value) {
        echo "$value <br>";
      }


      //Bir arrayın uzunluğunu verir
      echo sizeof($l);






      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>