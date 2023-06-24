<?php

use sifirdanphp\meyve\banana;
use sifirdanphp\meyve\fruit;
use sifirdanphp\old\wellcome;
use sifirdanphp\routing;

require_once "theme/header.php";

require_once "classes/allClass.php";
?>

<div class="card">
  <div class="card-body">
    <?php


    /*  

      const de = 10;
      $arr = ["abidin", "Muhammed ali", "Hakan"];
      $var = "Muhammed ali";
      $var2 = 1.2;
      $var3 = true;
      $var4 = 1;
      $var5 = __DIR__;
      $var6 = null;

      function sub($par)
      {
        return substr($par, 0, 107);
      }
      $myfile = fopen("test.txt", "a+");

      //Sayfada sabit varmı kontrol eder
      echo defined("de") . "<br>";

      //variable yada array(key,value) varlığını kontrol eder
      echo isset($arr[1]) . "<br>";

      //variable yada array boşmu dolumu kontrol eder
      if (empty($var)) {
        echo "Boş değişken<br>";
      } else {
        echo "Değişken boş değil<br>";
      }

      //Verinin string olup olmadığını kontrol eder
      if (is_string($var)) {
        echo "Bu değişken string<br>";
      } else {
        echo "Bu değişken string değil<br>";
      }

      //Verinin double olup olmadığını kontrol eder
      if (is_double($var2)) {
        echo "Bu değişken double<br>";
      } else {
        echo "Bu değişken double değil<br>";
      }

      //Verinin bool olup olmadığını kontrol eder
      if (is_bool($var3)) {
        echo "Bu değişken bool<br>";
      } else {
        echo "Bu değişken bool değil<br>";
      }

      //Verinin int olup olmadığını kontrol eder
      if (is_int($var4)) {
        echo "Bu değişken int<br>";
      } else {
        echo "Bu değişken int değil<br>";
      }

      //Verinin long olup olmadığını kontrol eder
      if (is_long($var4)) {
        echo "Bu değişken long<br>";
      } else {
        echo "Bu değişken long değil<br>";
      }

      //Verinin dir olup olmadığını kontrol eder
      if (is_dir($var5)) {
        echo "Bu değişken dir<br>";
      } else {
        echo "Bu değişken dir değil<br>";
      }

      //Verinin sayısal bir değer olup olmadığını kontrol eder
      if (is_numeric($var2)) {
        echo "Bu değişken sayısal<br>";
      } else {
        echo "Bu değişken sayısal değil<br>";
      }

      //Verinin sayısal bir değer olup olmadığını kontrol eder
      if (is_numeric($var2)) {
        echo "Bu değişken sayısal<br>";
      } else {
        echo "Bu değişken sayısal değil<br>";
      }

      //Verinin null olup olmadığını kontrol eder
      if (is_null($var6)) {
        echo "Bu değişken null<br>";
      } else {
        echo "Bu değişken null değil<br>";
      }

      //Verinin kaynak olup olmadığını kontrol eder
      if (is_resource($myfile)) {
        echo "Bu değişken kaynak<br>";
      } else {
        echo "Bu değişken kaynak değil<br>";
      }
      fclose($myfile);

      //Verinin function olup olmadığını kontrol eder
      if (is_callable("security")) {
        echo "Bu bir function<br>";
      } else {
        echo "Bu bir function değil<br>";
      }

      //Verinin array olup olmadığını kontrol eder
      if (is_array($arr)) {
        echo "Bu bir array<br>";
      } else {
        echo "Bu bir array değil<br>";
      }
      $myObject = new fruit("Muz", "Elma");
      //Verinin object olup olmadığını kontrol eder
      if (is_object($myObject)) {
        echo "Bu bir object<br>";
      } else {
        echo "Bu bir object değil<br>";
      }

      //Verinin primitive tip olup olmadığını kontrol eder
      //Sınıflar ve dosyalar dahil değildir!
      if (is_scalar($var)) {
        echo "Bu bir primitive tip<br>";
      } else {
        echo "Bu bir primitive tip değil<br>";
      }

      //Verinin sayılabilir olup olmadığını kontrol eder
      //if (is_countable($var))
      if (is_iterable($arr)) {
        echo "Bu bir sayılabilir tip<br>";
      } else {
        echo "Bu bir sayılabilir tip değil<br>";
      }

      //Var olan bir function olup olmadığını kontrol eder
      if (function_exists("security")) {
        echo "Bu bir function<br>";
      } else {
        echo "Bu bir function değil<br>";
      }

      //Var olan bir class olup olmadığını kontrol eder
      if (class_exists("sifirdanphp\\meyve\\fruit")) {
        echo "Bu bir class<br>";
      } else {
        echo "Bu bir class değil<br>";
      }

      //Var olan bir class içinde belirtilen isimdeki method olup olmadığını kontrol eder
      if (method_exists($myObject, "Messages")) {
        echo "Bu class içinde bu method mevcut<br>";
      } else {
        echo "Bu class içinde bu method mevcut değil<br>";
      }

      //Class içinde property olup olmadığını kontrol eder
      if (property_exists($myObject, "weight")) {
        echo "Bu class içinde bu değişken mevcut<br>";
      } else {
        echo "Bu class içinde bu değişken mevcut değil<br>";
      }

      $banana = new banana("banana", "yellow");
      //Miras alınmış bir sınıf olup olmadığını kontrol eder
      if (is_subclass_of($banana, "sifirdanphp\\meyve\\fruit")) {
        echo "Bu class içinde Miras mevcut<br>";
      } else {
        echo "Bu class içinde Miras mevcut değil<br>";
      }

      //interface varlığını kontrol eder
      if (interface_exists("sifirdanphp\\hayvan\\animals")) {
        echo "Böyle bir interface mevcut<br>";
      } else {
        echo "Böyle bir interface mevcut değil!<br>";
      }

      //Trait olup olmadığını kontrol eder
      if (trait_exists("sifirdanphp\\old\\person")) {
        echo "Bu bir trait class<br>";
      } else {
        echo "Bu bir trait class değil!<br>";
      }

      //Classı çağırdığımız değişken fruit classındanmı türetilip çağırılmış bir nesnemi olup olmadığına bakar
      if (is_a($myObject, "sifirdanphp\\meyve\\fruit")) {
        echo "Bu değişken doğru classtan türetilmiş<br>";
      } else {
        echo "Bu değişken doğru classtan türetilmiş değil!<br>";
      }
       //phpinfo(INFO_MODULES) de bulunan eklentileri kontrol eder
      if (extension_loaded("date")) {
        echo "Evet bu eklenti var<br>";
      } else {
        echo "Hayır bu eklenti yok<br>";
      }

      //Bir veriyi unset ile silebiliriz
      // echo "1." . $var . "<br>";
      // unset($var);
      // echo "2." . $var . "<br>";

      //Değişkenin sonuna ve başına ' ekler ve değişkeni çözümler
      echo var_export($var) . "<br>";

      //sprintf değişkene atanarak çıktı verir
      $result = sprintf("Deneme<br>");
      echo $result;

      //printf direk çıktıyı verir echo gibi
      printf("php is beatiful<br>");

      //printf parametre alarak string içine başka bir stringi müdahil edebilir %s ile
      $myString = "PHP";
      printf("Beatiful language %s", $myString . "<br><br>");

      $asc = 79;
      printf("%c", $asc) . "<br>";

      //Sistem bilgilerine ulaşırız parametre olarak istenilen bir değer girilirse sadece ona ulaşırız "Path" gibi
      echo "<pre>";
      print_r(sub(getenv("path")));
      echo "</pre>";

      //Sistemde bulunan tüm varaiblesler arr string int hepsini getirir
      // echo "<pre>";
      // print_r(get_defined_vars());
      // echo "</pre>";

      //sistemde bulunan sabitleri getirir
      echo "<pre>";
      //print_r(get_defined_constants());
      echo "</pre>";

      //sistemde bulunan tüm functionsları getirir
      echo "<pre>";
      //print_r(get_defined_functions());
      echo "</pre>";

      //Sisteme yüklenen tüm dosyaları getirir
      echo "<pre>";
      print_r(get_included_files());
      echo "</pre>";

      //Sisteme yüklenen tüm classları getirir
      echo "<pre>";
      //print_r(get_declared_classes());
      echo "</pre>";

      //Sisteme yüklenen tüm interface getirir
      echo "<pre>";
      //print_r(get_declared_interfaces());
      echo "</pre>";

      trait benOlusturdum
      {
      }
      //sistemem kayıtlı traitleri getirir
      echo "<pre>";
      print_r(get_declared_traits());
      echo "</pre>";

      class Control
      {
        public $name;
        public $lastname;
        public function myAge()
        {
        }
      }
      //Bir class içindeki public propertyleri getirir
      echo "<pre>";
      print_r(get_class_vars("Control"));
      //Bir class içindeki public function getirir
      print_r(get_class_methods("Control"));
      echo "</pre>";

      //php ini konumunu verir
      //print_r(php_ini_loaded_file());

      //phpini içindeki herşeyi verir
      //print_r(ini_get_all());

      //parametredeki işleme göre sonuçları verir 
      //print_r(ini_get_all("session"));

      //phpini dosyasında bulunan kısımları set edip düzenleyebiliriz
      //print_r(ini_get("display_errors") . "<br>");
      //ini_set("display_errors", 0);
      //print_r(ini_get("display_errors") . "<br>");
      //ini restore ile default değere getirebiliriz
      //ini_restore("display_errors");
      //print_r(ini_get("display_errors") . "<br>");

      //Yüklü eklentileri verir
      //print_r(get_loaded_extensions());

      //Yüklü eklentinin fonksiyonlarını verir
      //print_r(get_extension_funcs("PDO"));

      //Dosyamızın sistemde byte cinsinden boyutunu verir
      //echo memory_get_usage();

      //phpyi çalıştıran zend moturunun sürümünü verir
      //echo zend_version();

      //php versiyonunu verir
      //echo phpversion() .  "<br>";

      //Dosya yüklerken bir işlem başlarken geçici dizini verir
      //echo sys_get_temp_dir();

      //Eval string içine yazılmış php kodunu String olmaktan çıkarır ve çalıştırır
      //$result = file_get_contents("test.txt");
      //eval($result);

      //Sonucu belitrilen parametredeki miktar bittikten sonra döner...
      // echo date("h.i.s") . "<br>";
      // sleep(3);
      // echo date("h.i.s") . "<br>";
      // echo "vaybee";

      //milisecond cinsinde işlemi durdurur
      //usleep(100000);

      //echo date("h.i.s") . "<br>";
      //time_nanosleep(2, 200000000);
      //echo date("h.i.s") . "<br>";

      //işlemin en fazla kaç saniye süreceğini bildirir 
      //işlemin en fazla kaç saniye süreceğini set ederiz
      // set_time_limit(420);
      // echo ini_get("max_execution_time");

      //Eğer dosya yoksa devamını çalıştırma programı durdururuz
      // $myfile = "deneme.txt";
      // fopen($myfile, "r") or die("$myfile dosyası ile bağlantı kurulamadı");
    */

    /*
      flush= Sistemin çıktı arabelleğinden tarayıcıya içerik gönderme girişimleri

      ob_clean=  En üstteki çıktı arabelleğinden tüm içeriği siler

      ob_end_clean=  En üstteki çıktı arabelleğini ve tüm içeriğini siler

      ob_end_flush=  En üstteki çıktı arabelleğini siler ve içeriğini çıkarır

      ob_flush= En üstteki çıktı arabelleğinin içeriğini verir ve arabelleği temizler

      ob_get_clean=  En üstteki çıktı arabelleğinin tüm içeriğini döndürür ve arabelleği temizler

      ob_get_contents= En üstteki çıktı arabelleğinin içeriğini döndürür

      ob_get_flush= En üstteki çıktı arabelleğinin içeriğini çıkarır ve döndürür ve ardından arabelleği siler

      ob_get_length=  En üstteki çıktı arabelleğinde bulunan veri baytlarının sayısını verir

      ob_get_level=  Yığın üzerinde kaç tane çıktı arabelleği olduğunu gösteren bir sayı döndürür

      ob_get_status= Çıktı arabellekleri hakkında bilgi verir

      ob_gzhandler= Tarayıcıya gönderirken arabelleğin içeriğini sıkıştırmak için ob_start ( ) için bir callback fonksiyonu olarak kullanılır . Tarayıcı tarafından desteklenen bir sıkıştırma algoritması kullanarak
      çıktı tamponunun içeriğini sıkıştırır ve sıkıştırılmış içeriği döndürür . Ayrıca , hangi sıkıştırma
      algoritmasının kullanıldığını belirten bir HTTP başlığı gönderir .


      ob_implicit_flush= Örtülü temizlemeyi açar veya kapatır

      ob_list_handlers= En üstteki çıktı arabelleği tarafından kullanılan bir callback fonksiyon adı dizisi döndürür

      ob_start=  Yeni bir çıktı tamponu oluşturur ve onu yığının en üstüne ekler

      output_add_rewrite_var=  Çıktıdaki herhangi bir URL'ye sorgu dizesi parametreleri eklemek için kullanılır
                                  
      output_reset_rewrite_vars= output_add_rewrite_var tarafından eklenen tüm değişkenleri kaldırır                             
                            
                                                    
    */

    //verilen adresin başlığını getirir
    $address = "http://localhost/OOP";
    $result = get_headers($address);

    echo "<pre>";
    print_r($result);
    echo "</pre>";




    ?>
  </div>
</div>

<?php require_once "theme/footer.php"; ?>