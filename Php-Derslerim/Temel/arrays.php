<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (loops) Lessons</title>
  <style>
    li {
      text-transform: uppercase;
    }
  </style>
</head>

<body style="font-size:22px ;">
  <div class="p-5">
    <div class="alert alert-success">
      <?php


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
                //Array functions
                define('languages', ["php", "Java", "React", "NODE JS", "javascript", "html", "css"]);
                $age  = ["Abidin" => "24", "Ayşen" => "42", "Zümra" => "15"];
                $cars = array(
                array("skoda", 2, 21),
                array("Nissan", 3, 21),
                array("Bmw", 4, 15),
                array("Fiat", 8, 3),
                array("Mercedes", 4, 1),
                array("Megan", 4, 1, 4),
                );

                $myFamily = array(
                array("id" => 1752, "first_name" => "Abidin", "last_name" => "Gülsün"),
                array("id" => 1753, "first_name" => "Naciye", "last_name" => "Gülsün"),
                array("id" => 1754, "first_name" => "Ayşen", "last_name" => "Gülsün"),
                );

                //Bir array içindeki verileri büyük harfe çevirme
                //Array adının yanına parametre olarak CASE_LOWER verilirse
                //Hepsi küçük harf olur
                foreach (array_change_key_case($age, CASE_UPPER) as $myKey => $myValue) {
                echo $myKey . "=" . $myValue . "<br><br>";
                }

                //Bir diziyi verilen parameterdeki sayıya göre böler
                $myArray = array_chunk(languages, 2);

                for ($i = 0; $i < count($myArray); $i++) {

                echo ($i + 1) . ".dizi elemanı:<br>";

                echo "<ul>";
                for ($x = 0; $x < count($myArray[$i]); $x++) {

                    echo "<li>" . $myArray[$i][$x] . "<br></li>";
                }
                echo "</ul>";
                }

                //Bir dizideki tek bir columnu çekmemizi sağlar
                $mysplit2 = array_column($myFamily, 'id');
                for ($j = 0; $j < count($mysplit2); $j++) {
                echo "<ul>";
                echo "<li>" . $mysplit2[$j] . "</li><br>";
                echo "</ul>";
                }
      */

      /*
                define('languages', ["php", "Java", "Java", "React", "React", "NODE JS", "javascript", "html",  "html", "css"]);
                $cars = array(
                    array("skoda", 2, 21),
                    array("Nissan", 3, 21),
                    array("Bmw", 4, 15),
                    array("Fiat", 8, 3),
                    array("Mercedes", 4, 1),
                    array("Megan", 4, 1, 4),
                );
                $myFamily = array(
                    array("id" => 1752, "first_name" => "Abidin", "last_name" => "Gülsün"),
                    array("id" => 1753, "first_name" => "Naciye", "last_name" => "Gülsün"),
                    array("id" => 1754, "first_name" => "Ayşen", "last_name" => "Gülsün"),
                );

                //2 adet diziyi birleştirip ikinci diziyi key & value olarak atama yapıyoruz burada myname dizisi = KEY       myAge dizisi ise value olmuştur
                $myName = ["abidin", "Zümra", "Ayşen"];
                $myAge = ["24", "15", "42"];
                $myCombine  = array_combine($myName, $myAge);
                foreach ($myCombine as $key => $value) {
                    echo "<li>" . $key . "= " . $value . "</li>" . "<br>";
                }


                //Tekli bir arrayi tarar içinde bulunan verilerden kaçartane aynı olup olmadığını kontrol ederlanguages constansını kontrol edip içindeki verilerden kaçar tane olduğunu kontrol ediyor
                print_r(array_count_values(languages));
                echo   "<br><br>";


                //2 adet arrayiın valuesini kontrol eder kontrol ettiği arraylerdeki farkları bize sonuç olarak döndürür
                $color1  = ["r1" => "red", "g1" => "green", "b1" => "blue", "p1" => "pink"];
                $color2  = ["r2" => "red", "g1" => "green"];
                $result = array_diff($color1, $color2);


                //Aynı olan iki arrayın valuesini kontrol edip sadece içerisinde farklı 1 verinin olmasından ötürü sonucu bize b1:blue olarak verecektir çünkü iki farklı arrayda sadece b1 blue yoktur gerisi aynıdır
                foreach ($result as $key => $value) {
                    echo ($key . ":" . $value . " - ");
                }
                echo "<br><br>";


                //Burada ise hem key hemde value değerlerini kontrol eder ve bize farklılıkları döndürür parametrede ilk belitrilen diziyi kontrol eder ondaki sonucu verir burada önemli olan !!!ilk parametrede verilen değerdir
                $result2 = array_diff_assoc($color1, $color2);
                foreach ($result2 as $key => $value) {
                    echo $key . ":" . $value . " - ";
                }
                echo "<br><br>";

                //Burada ise sadece key değerinini kontrol eder farklılıkları bize döndürür
                $result3 = array_diff_key($color2, $color1);
                foreach ($result3 as $key => $value) {
                    echo $key . ":" . $value . " - ";
                }


                echo "<br><br>";

                //Burada ise hem key hemde value değerlerini kontrol eder farklı olan her nesneyi bize sonuc olarak döndürür
                function karsilastir($x, $y)
                {
                    if ($x === $y) {
                    return 0;
                    }
                    return ($x > $y) ? 1 : -1;
                }

                $result4 = array_diff_uassoc($color1, $color2, "karsilastir");
                foreach ($result4 as $key => $value) {
                    echo $key . ":" . $value . " - ";
                }



                echo "<br><br>";
                //Sadece key değerleri karşılaştırarak farklı sonucu bize döner
                //Burada Value aynı olsada keyde farklılık olduğu için r key sözcüğünü bize farklılıktan ötürü değer olarak döndürür

                $color1  = ["r" => "red", "g1" => "green"];
                $color2  = ["r2" => "red", "g1" => "green"];
                $result5 = array_diff_ukey($color1, $color2, "karsilastir");
                foreach ($result5 as $key => $value) {
                    echo $key . ":" . $value . " - ";
                }
                echo "<br><br>";

                //Verilen parametrede mesela myfill değerinin 2. indexten başla 5 adet white değeri ekletir myfill2 de ise 0 indexten başla 2 adet green ekle diyerek array_fill function ile arraylere değer ekliyoruz
                $myfill  = array_fill(2, 5, "white");
                $myfill2  = array_fill(0, 2, "green");
                foreach ($myfill2 as $key => $value) {
                    echo $key . ":" . $value . " -- ";
                }
      */

      //Valuesi olmayan bir arraya array_fill_keys fonksiyonu ile key lere value değerleri ekleye biliriz mesela burada abidin enes muhammed ali hakan değerleri key değerdir bunlarin her hangi bir valu değerleri yoktur burada bunlara 24 valuesini eklemiş olduk
      $keys  = ["Abidin", "Enes", "Muhammed Ali", "Hakan"];
      $result = array_fill_keys($keys, "24");

      echo "<ul>";
      foreach ($result as $key => $value) {
        echo "<li>" . $key . ": " . $value . "</li>";
      }
      echo "</ul>";
      echo "<br><br>";


      //Bir arrayi yapılan fonksiyona göre filtreler array_filter fonksiyonumuz mesela test arrayindeki tekli sayıları bu şekilde filtreleye biliriz
      function oddNumber($par)
      {
        return ($par & 1);
      }

      $test = [1, 3, 6, 3, 2, 5, 4];
      $result2 = array_filter($test, 'oddNumber');
      echo "<ul>";
      foreach ($result2 as $key => $value) {
        echo "<li>" .  $value . "</li>";
      }
      echo "</ul>";


      //anahtarlar ile değerlerini yer değiştirmek için array_flip fonksiyonu kullanılır burada r anahtar sözcüğümüze red valuesi eklenerek yer değişmiştir

      $color1  = ["r" => "red", "g1" => "green"];
      $result3 = array_flip($color1);
      echo "<ul>";
      foreach ($result3 as $key => $value) {
        echo "<li>" . $key . ": " .  $value . "</li>";
      }
      echo "</ul><br>";


      //arrayleri karşılaştırır valuelerin eşitliğini kontrol eder eşit olanlerı değer olarak döndürür burada color1 ile color2 değişkenini karşılaştırıp valuelerini aynı olanları değer olarak döndüürdü yani red olan valuleri
      $color1  = ["r" => "red", "g1" => "green"];
      $color2 = ["r" => "red", "g1" => "black"];
      $result4 = array_intersect($color1, $color2);
      echo "<ul>";
      foreach ($result4 as $key => $value) {
        echo "<li>" . $key . ": " .  $value . "</li>";
      }
      echo "</ul><br>";


      //Arayyi kontrol eder değer olarak keyleri aynı olanları değer olarak döndürür
      //Misal array_intersect ve array_intersect_keyiveri tabanında bir category oluşturmak istediğimizde bu functionsları kullanabiliriz
      $color1  = ["r" => "red", "g1" => "green"];
      $color2 = ["r" => "red", "g1" => "black"];
      $result5 = array_intersect_key($color1, $color2);
      echo "<ul>";
      foreach ($result5 as $key => $value) {
        echo "<li>" . $key . ": " .  $value . "</li>";
      }
      echo "</ul><br>";


      //Hem values hemde keysleri kontrol eder ikisininde aynı olduğunda o verileri döndürür yani keyy==value ise bize sonuc verir
      $a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
      $a2 = array("a" => "red", "b" => "green", "c" => "blue");

      $result = array_intersect_assoc($a1, $a2);
      print_r($result);
      echo "<br><br>";


      //array_intersect_uassoc Verileri key ve value ile karşılaştırır aynı olanları değer olarak verilen fonksiyona göre döner
      function myfunction2($a, $b)
      {
        if ($a === $b) {
          return 0;
        }
        return ($a > $b) ? 1 : -1;
      }

      $a1 = array("a" => "red", "b" => "green", "c" => "blue");
      $a2 = array("d" => "red", "b" => "green", "e" => "blue");

      $result = array_intersect_uassoc($a1, $a2, "myfunction2");
      print_r($result);

      //array_intersect_ukey Verileri key ile karşılaştırır aynı olanları değer olarak verilen fonksiyona göre döner
      function myfunction($a, $b)
      {
        if ($a === $b) {
          return 0;
        }
        return ($a > $b) ? 1 : -1;
      }

      $a1 = array("a" => "red", "b" => "green", "c" => "blue");
      $a2 = array("a" => "blue", "b" => "black", "e" => "blue");

      $result = array_intersect_ukey($a1, $a2, "myfunction");
      print_r($result);
      echo "<br><br>";



      //Diziyi if koşulu ile araştırır sonuc olarak dizide aranan key varsa sonucu döner yoksa sonucu dönmez ayrıca bir dizide istenilen index numarası kontrolde yapılabilir
      if (array_key_exists('r', $color1) && array_key_exists("r", $color1)) {
        echo "Bu anahtar belirttiğiniz dizide mevcut";
      } else {
        echo "Bu anahtar belirttiğiniz dizide mevcut değil";
      }



      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>