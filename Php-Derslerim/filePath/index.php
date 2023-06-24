<?php
require_once "theme/header.php";
require "../functions/combine.php";
require "varaibles/varaibles.php";
?>


<div class="card mt-3">
  <div class="card-body">

    <?php
    /*  
      //Dizinin içindeki dosyanın adını verir basename
      $myPath = "files/documents/special/example.txt";

      //.txt kısmını kırpar
      $findFile = basename("basename: " . $myPath);

      //Dosya yolunu dosya uzantısını ve dosya adını verir
      $info = pathinfo($myPath);

      //Dosya yolunu verir
      $findPath = dirname("dirname: " . $myPath);

      echo $findFile . "<br>";
      echo $findPath . "<br>";

      //infodan istediğimiz veriyi bu şekilde çekebiliriz
      echo  "dosya adı " . $info["filename"];

      echo "<pre>";
      print_r($info);
      echo "</pre>";

      $info = pathinfo($myPath, PATHINFO_DIRNAME);
      echo $info . "<br>";

      $info = pathinfo($myPath, PATHINFO_BASENAME);
      echo $info . "<br>";

      $info = pathinfo($myPath, PATHINFO_FILENAME);
      echo $info . "<br>";

      $info = pathinfo($myPath, PATHINFO_EXTENSION);
      echo $info . "<br>";

      //Dosyanın tam olarak nereden geldiğini gösterir
      //C:\xampp\htdocs\filePath\files\documents\special\example.txt
      $myRealPath = realpath($myPath);
      echo $myRealPath . "<br><br>";


      //Verinin türünü verir bu bir File dır
      $myFile = "example.txt";
      $findFile = filetype($myFile);
      echo $findFile . "<br><br>";
      clearstatcache();

      $myFile = "files/documents/special/";
      //Verinin bir dir olduğunu söylüyor
      $findFile = filetype($myFile);
      echo $findFile . "<br><br>";
      clearstatcache();

      $myFile = "example.txt";
      //Dosya sahibi kim onu kontrol eder
      $findFile = fileowner($myFile);
      echo $findFile . "<br><br>";
      clearstatcache();

      //33206 dosya izinin sayısını verir
      $findFile = fileperms($myFile);
      echo $findFile . "<br><br>";
      clearstatcache();

      //Dosyanın düğüm kimliğini getirir
      $findFile = fileinode($myFile);
      echo $findFile . "<br><br>";
      clearstatcache();

      //Dosyanın boyutunu verir 23 byte
      $findFile = filesize($myFile);
      echo $findFile . "<br><br>";
      clearstatcache();

      $myPath = "example.txt";
      //Dosyamı oluşturmuş olduğum tarihi verir
      echo date("d/m/Y H.i.s", filectime($myPath)) . "<br>";
      //Güncelleme tarihi
      echo date("d/m/Y H.i.s", filemtime($myPath)) . "<br>";
      //Erişme tarihi
      echo date("d/m/Y H.i.s", fileatime($myPath)) . "<br>";
      clearstatcache();
    */

    // $myPath = "files/documents/special/example.txt";
    // $openFile = fopen($myPath, "r");
    // echo "<pre>";
    // //Dosya hakkındaki birçok bilgiyi verir stat
    // print_r(fstat($openFile));
    // echo "</pre>";
    // fclose($openFile);
    // clearstatcache(); //ön belleği temizler

    //touch dosyanın güncellenme tarihini güncel tutar dakikası dakikasına
    // $myPath = "files/documents/special/example.docx";
    // if (touch($myPath)) {
    //   echo basename($myPath) . " Adlı dosyanın erişimi ve değiştirilme zamanı şuan olarak ayarlandı";
    // } else {
    //   echo "I am sorry";
    // }
    // echo "<br><br>";

    //Belirtilen path içindeki dosyayı siler
    // $myPath = "files/documents/special/example.docx";
    // if (unlink($myPath)) {
    //   echo basename($myPath) . " Dosya Silindi";
    // } else {
    //   echo "I am sorry, Error";
    // }


    //Belirtilen path içindeki dosya içeriğini kopyalar
    // $myPath = "files/documents/special/example.txt";
    // $copyFile = "files/documents/special/test.txt";
    // if (copy($myPath, $copyFile)) {
    //   echo basename($myPath) . " $copyFile dosyasına kopyalandı";
    // } else {
    //   echo "I am sorry, Error";
    // }


    //Belirtilen path içindeki dosya adını değiştirir
    // $myPath = "files/documents/special/d.txt";
    // $copyFile = "files/documents/special/deneme.txt";
    // if (rename($myPath, $copyFile)) {
    //   echo basename($myPath) . ":" . " $copyFile olarak dosya adı değiştirildi...";
    // } else {
    //   echo "I am sorry, Error";
    // }

    // echo "<br><br>";
    // $myPath = "files/documents/deneme";
    // $copyFile = "files/documents/special";
    // if (rename($myPath, $copyFile)) {
    //   echo basename($myPath)  . " $copyFile olarak  değiştirildi...";
    // } else {
    //   echo "I am sorry, Error";
    // }

    //sprintf ile verilen parametreye göre bir dosya yada bir pathin izin kodunu verir fileperms ile 16lık sisteme göre dosya izinini verir bu 33206 dosya kodu
    // $myPath = "files/documents/special/deneme.txt";
    //chmod ile dosya izinlerini değiştirebiliriz
    // if (chmod($myPath, 0777)) {
    //   echo "izin istenildiği gibi değiştirildi <br>";
    // } else {
    //   echo "izin istenildiği gibi değiştirilmedi! <br>";
    // }
    // $permissions = fileperms($myPath);
    // echo $permissions . "<br>";
    // octal sayı değerini verir
    // $format = sprintf("%o", $permissions);
    // echo $format . "<br>";
    // $format = substr($format, -4);
    // echo $format . "<br>";


    //mkdir dizin oluşturabiliriz eğer bir dizin belirtilmezse direk ana dosya içine oluşturur
    // $directory = "files//documents/special/test_deneme";
    // if (mkdir($directory, 0777)) {
    //   echo "Directory oluşturuldu.<br>";
    // } else {
    //   echo "Başarısız!<br>";
    // }

    //rmdir ile belirtilen bölümdeki boş klasör silinir
    // $directory = "pictures";
    // if (rmdir($directory)) {
    //   echo "Directory silindi.<br>";
    // } else {
    //   echo "Başarısız!<br>";
    // }

    // $myPath = "files/documents/special/deneme.txt";
    // $pattern = "./";
    //scandir($myList,1) anadizindeki dosyaları ve klasörleri listeler parametreye 1 girilirse tersten sıralar
    // $myList = scandir($pattern);
    // echo "<pre>";
    // print_r($myList);
    // echo "</pre>";


    //glob dosyaların hepsini tek tek listeler eğer glob(a) parametre olarak girilen değişkene ana dizinden bir klasör eklenirse o klasörün içeriğini getirir ayrıca türünü belirtirsek türüne görede verileri getirir              $pattern = "uploads/*.xlsx";
    //GLOB_MARK ile klasörlere \ ekler
    //GLOB_ONLYDIR sadece dizin/klasörleri getirir
    //GLOB_NOSORT sıralama olmadan verileri getirir
    //{rar,txt} dosyalarını getirir
    //$pattern = "uploads/*.*"; içinde nokta olan herşeyi getir
    //$pattern = "uploads/d*"; içinde d olan herşeyi getir

    //$myPath = "files/documents/special/deneme.txt";
    //$pattern = "uploads/t*";
    //$myList = glob($pattern, GLOB_BRACE);
    //echo "<pre>";
    //print_r($myList);
    //echo "</pre>";

    //$myPath = "files/documents/special/deneme.txt";
    //getcwd() Çalışma klasörümüzü verir C:\xampp\htdocs\filePath
    //chdir("uploads") ile aktif çalışma klasörümüzü değiştirir
    //chdir(../) bir üst dizine geçer
    //chdir(../../) komutu tekrar yazarsak bir üst konuma daha gider
    //echo getcwd() . "<br>";

    // $pattern = "uploads/";
    // $openDirectory = opendir($pattern);
    // while (($read = readdir($openDirectory)) != false) {
    //   //filetype ile verinin klasörmü dosyamı olduğunu bulur ona göre verileri getiririz (filetype($pattern . $read) == "dir")
    //   if (filetype($pattern . $read) == "file") {
    //     echo $read . " (" . filetype($pattern . $read) . ")<br>";
    //   }
    // }
    // closedir($openDirectory);

    // $pattern = "uploads/info.txt";
    // $myUrl = "http://www.example.com/";
    // $pattern = "uploads/info.txt";
    // $openFile = fopen($pattern, "r");

    //fopen ile dosya yolunu girer ve okuma modunda açar
    //fopen() a url atılırsa onuda okur

    //r sadece okur
    //r+ Okur ve yazar dosyanın başından başlar

    //w sadece yazar dosyayı açar ve siler yoksa yeni dosya oluşturur
    //w+ okur ve yazar Dosyayı açar ve siler

    //a yanlızca yazma dosyanın sonuna açılır ve yazar yoksa yeni bir dosya oluşturur
    //a+ okur ve yazar dosyanın sonuna yazarak dosya içeriğini korur

    //x sadece yazar Yeni bir dosya oluşturur dosya zaten varsa eror döndürür
    //x+ okur yazar Yeni bir dosya oluşturur dosya zaten varsa eror döndürür

    //c sadece yazar dosyayı açar ve yoksa yeni oluşturur
    //c+ okur ve yazar Dosyayı açar ve  yoksa yeni oluşturur


    // $openFile = fopen($pattern, "c+");
    // if ($openFile) {
    //   echo  '<div class="alert alert-success">(' . basename($pattern) . ') Adlı dosya okunma modunda açıldı.</div>';
    // } else {
    //   echo '<div class="alert alert-danger">(' . basename($pattern) .
    //     ') Adlı dosya okunma modunda açılırken bir hata meydana geldi.
    //   </div>';
    // }


    //feof = dosyanın sonuna ulaşır
    //fgets = açık bir dosyadan bir satır döndürür



    //dosyanın sonuna kadar koşul belirtir sonuna kadar okutur tüm satırları getirir
    // while (!feof($openFile)) {
    //   $readMyFile = fgets($openFile);
    //   echo $readMyFile . "<br>";
    // }

    //tüm karakterleri tek tek getirir fgetc() ile
    // $i = 1;
    // while (!feof($openFile)) {
    //   $readMychar = iconv("LATIN5", "UTF-8", fgetc($openFile));
    //   echo "$i. karakter= " . $readMychar . "<br>";
    //   $i++;
    // }

    //fread ile parametrede verilen miktar kadar karakteri yazdırır
    // $readMychar  = iconv("LATIN5", "UTF-8", fread($openFile, 10));
    // echo $readMychar . "<br>";

    //Burada karakterlerin sayısını 10 parçaya böler hepsini kelime gibi yazdırır

    //$readMychar  = iconv("LATIN5", "UTF-8", fread($openFile, 10));
    //1.karakter= Merhaba Bi
    //2.karakter= lgisayar M
    //3.karakter= ühehdisliğ
    //4.karakter= i nasısın
    //5.karakter= ız iyisin
    //6.karakter= izdir umar
    //7.karakter= ım sıfırd
    //8.karakter= an zirveye
    //9.karakter= php eğiti
    //10.karakter= mi

    //$readMychar  = iconv("LATIN5", "UTF-8", fread($openFile, 30));
    //1.karakter= Merhaba Bilgisayar Mühehdisliğ
    //2.karakter= i nasısınız iyisinizdir umar
    //3.karakter= ım sıfırdan zirveye php eğiti
    //4.karakter= mi


    // $i = 1;
    // while (!feof($openFile)) {
    //   $readMychar  = iconv("LATIN5", "UTF-8", fread($openFile, 10));
    //   echo "$i.karakter= " . $readMychar . "<br>";
    //   $i++;
    // }

    /*
      //fpassthru bir dosyanın yada url içindeki veriyi döngüye ihtiyaç duymadan hepsini yazdırır
      $readMychar  =  fpassthru($openFile);
      echo $readMychar . "<br>";
      //Dosyayı Kapatır
      fclose($openFile);
    */



    //ftell açık bir dosyadaki mevcut konumu döndürüyor
    // echo ftell($openFile) . "= ";
    // $readMyFile = fpassthru($openFile) . "<br>";
    // echo $readMyFile;

    //fseek açık bir dosyada konumu değiştirir 10. karakterden başlar
    // fseek($openFile, 33);
    // echo ftell($openFile) . "= ";
    // $readMyFile = fpassthru($openFile) . "<br>";
    // echo $readMyFile;

    //rewind açık bir dosyada konumu resetler konum 10 dayken tekrar 0'a alır
    // rewind($openFile);
    // echo ftell($openFile) . "= ";
    // $readMyFile = fpassthru($openFile) . "<br>";
    // echo $readMyFile;




    $myPath = "uploads/info.txt";
    $myUrl = "http://www.example.com/";
    //file bir dosyayı okur ve bir arraya atar
    $readMyFile = file($myPath);
    // echo ($readMyFile[3]);
    echo "<pre>";
    foreach ($readMyFile as $key => $value) {
      echo trim($value) . "<br>";
    }
    echo "</pre>";


    $myPath = "uploads/info.txt";
    $readMyFile = readfile($myPath);
    //readfile bir dosyayı okur ve çıktığı stringe yazar
    echo $readMyFile;


    fclose($openFile);




    ?>

  </div>
</div>

<?php require_once "theme/footer.php"; ?>