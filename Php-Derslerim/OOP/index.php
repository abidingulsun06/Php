<?php
//$_SERVER["DOCUMENT_ROOT"] //TÜM DİZİNLERDEN CLASSLARA ULAŞMAK İÇİN

use sifirdanphp\education\Student;

require_once "theme/header.php";
require_once "classes/allClass.php";

?>

<div class="card">
  <div class="card-body">

    <?php
    /*
      Nesne oluşturma çağırma set get method kullanımı
      $diller = new Languages();
      echo "Yazılım dili:" . $diller->name . "<br>";
      echo "Yazılım Alanı:" . $diller->properties . "<br>";
      echo  $diller->myMethod() . "<br>";
      echo Languages::message . "<br><br>";

      $meyve = new fruit();
      $meyve->setName("Muz");
      $meyve->setColor("Sarı");
      echo $meyve->getName() . ": " . $meyve->getColor() . "<br>";

      $meyve2 = new fruit();
      $meyve2->setName("Elma");
      $meyve2->setColor("Kırmızı");
      echo $meyve2->getName() . ": " . $meyve2->getColor() . "<br>";

      Nesnenin mevcut nesnede kullanılıp kullanılmadığını kontrol eder
      var_dump($meyve2 instanceof fruit);


      $meyve =  new fruit("Elma", "Kırmızı");
      echo $meyve->getName() . " - " . $meyve->getColor();

      $deneme = new deneme();
      echo '<div class="mt-2 alert alert-info">' . $deneme->look . '</div>';

      $banana->setName("Armut");
      $banana->setColor("Yeşil");
      $banana->setWeight(28);
      echo $banana->infoTwo();
      echo $banana->info();
       $banana = new banana();

      //Static deneme
      echo  fruit::$warning . "<br>";
      // echo pi::$number . "<br>";;
      echo  $pi->staticValue() . "<br>";

      //static method örnek
       try {
      routing::go("test.php", 4);
      echo "<div class='alert alert-info'>
      Yönlendiriliyorsunuz
      <span id='seconds'>4</span></div>";
      } catch (Throwable $e) {
        echo "<div class='alert alert-danger'>" . $e . "</div>";
      }
       $cat = new cat();
        $dog = new dog();
        $animals = [$cat, $dog];

        foreach ($animals as $value) {
          echo $value->sound() . $value->info() . "<br>";
        }
        $calculate = new calculate(190);
        $format = new Format();

        //echo $calculate->sum(10)->sub(50)->div(5)->print() . "<br>";
        //echo $calculate->sum(10)->sub(100)->mul(5)->print() . "<br>";

        echo $format->myText("Merhaba nasılsınız bu bir deneme alert")->mySize("28")->myAlert("primary")->CreateText() . "<br>";

        echo $format->myText("Merhaba nasılsınız bu bir deneme alert")->mySize("18")->myAlert("danger")->CreateText() . "<br>";

        echo $format->myText("Merhaba nasılsınız bu bir deneme alert")->mySize("12")->myAlert("warning")->CreateText() . "<br>";

        echo $format->myText("Merhaba nasılsınız bu bir deneme alert")->mySize("14")->myAlert("secondary")->CreateText() . "<br>";


        //namespace ile aynı isime sahip 2 classı kullanırken kullanırız
        // $test1 = new \sifirdanphp\primaryschool\Student;
        // echo "<br>";
        // $test2 = new \sifirdanphp\secondschool\Student;

        //Takma isim verme
        //use \sifirdanphp\secondschool\Student as Lise;

        use \sifirdanphp\secondschool\Student;


         // $fruit = new sifirdanphp\meyve\fruit("Muz", "Sarı");
        // echo $fruit->getName() . "<br>";
        // echo $fruit->getColor();

        $test = new Student();
        echo $test->message();

        $meyve = new sifirdanphp\meyve\strawberry("Çilek", "Kırmızı");
        echo $meyve->info() . "<br>";

        $car = new sifirdanphp\araba\nissan("Nissan");
        echo $car->info();

        $car2 = new sifirdanphp\araba\bmw("Bmw");
        echo $car2->info();

        $hayvan = new \sifirdanphp\hayvan\cat;
        echo $hayvan->sound();
        echo $hayvan->info() . "<br>";

        $old = new \sifirdanphp\old\greet;

        $kivi = new \sifirdanphp\meyve\deneme\kivi;

          $student = new sifirdanphp\education\Student("Ayşen", "Kandaz");
          //Bir nesneyi başka bir nesne üstüne yazmak istersek clone keywordunu kullanırız aksi halde iki nesnede aynı olur
          $newStudent = clone $student;
          $newStudent->name = "Abidin";
          $newStudent->lastName = "Gülsün";
          echo $newStudent->StudentInfo() . "<br>";
          echo $student->StudentInfo() . "<br>";

          //sihirli sabitler
           $student = new Student();

          //normal method kontrolü
          $student->message();

          //static method kontrolü
          Student::deneme();

          //property kontrölü
          $student->$age;

          //propertye dışardan değer atama kontrolü
          $student->dd = "abidin";

          //private kontrol
          isset($student->age);
          //protected kontrol

          //nesneye empty isset unset olup olmadığını kontrol edip yoksa bu fonksiyonları kullanamayacağımızı kontrol ederiz
          empty($student->deneme);
          isset($student->lastName);
          unset($student->abiş);

          //Nesne serialize yada unserialize edilirken mesaj verir
          $result = serialize($student);
          unserialize($result);

          //nesne yazdırıp toString kontrölü
          echo $student;

          //nesne fonksiyon olarak çalışınca kontrolü
          echo $student(12);
    */
    $student = new Student();

    var_dump($student);

    ?>
    <a href="yararlıkomutlar.php" class="btn btn-outline-danger d-block w-25 mt-5">Yararlıkomutlar'a git</a>
  </div>
</div>

<?php
require_once "theme/footer.php";
?>
<script>
  var seconds = 4;
  setInterval(
    function() {
      document.getElementById('seconds').innerHTML = --seconds;
    }, 1000
  );
</script>