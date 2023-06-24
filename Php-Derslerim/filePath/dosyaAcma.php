<?php

require_once "theme/dosyaAcmaHeader.php";
require "../functions/combine.php";
require "varaibles/varaibles.php";
?>


<div class="card mt-3">
  <div class="card-body">



    <?php
    //c+ Dosyayı komle silmez verinin karakteri kadarınınkini siler

    //fwrite açık bir dosyaya yazar

    //fputs açık bir dosyaya yazar

    //ftruncate açık bir dosyayı belirli bir uzunlukta keser

    //file_get_contents bir dosyayı okur ve bir stringe sonucu verir

    //file_put_contents verileri bir dosyaya yazar

    //fgetcsv açık bir CSV dosyasından satır okur

    //fgetput açık bir CSV dosyasına satır yazar

    //$myPath = "uploads/deneme.txt";
    $myPath = "uploads/deneme.txt";
    $content = "My name is Abidin\nSıfır'dan Php Eğitim seti\nHayat Üniversitesi\n\n";
    $content2 = "OOO bak bak ne yazmış\n\n";
    $content3 = "Hello\n\n";
    $url = "http://www.example.com/\n";


    // $openFile = fopen($myPath, "a+");
    // fputs($openFile, $content);
    // ftruncate($openFile, 15);

    // rewind($openFile);
    // while (!feof($openFile)) {
    //   echo fgets($openFile) . "<br>";
    // }

    // $readFile =  file_get_contents($myPath);
    // echo $readFile;

    //FILE_APPEND VERİYİ SİLMEZ SONUNA YAZAR
    // $readFile =  file_put_contents($myPath, $content, FILE_APPEND);
    // echo  $readFile;
    // setlocale(LC_ALL, 'tr_TR');
    // $content1 = [
    //   ["şükür", "javascript", "trabzon"],
    //   ["aydın", "nodejs", "of"]
    // ];
    // $openFile = fopen($myPath, "w+");
    // foreach ($content1 as  $value) {
    //   fputcsv($openFile, $value, ";");
    // }



    // $open = fopen($myPath, "a+");
    // fwrite($open, $content);
    // rewind($open);
    // while (!feof($open)) {
    //   echo fgets($open) . "<br>";
    // }

    // fclose($open);

    //Byte türünde dikteki boş yeri gösterir
    //echo number_format(disk_free_space("C:"));


    //file_exist dosya varmı yokmu kortrol eder
    //flock
    //fflush arabelleği temizler
    if (file_exists($myPath)) {
      $openFile = fopen($myPath, "r");
      if (flock($openFile, LOCK_EX)) { //kilitle
        //Buradaki dosyayı arabelleğe almaz
        set_file_buffer($openFile, 0);
        fwrite($openFile, "Hello Phpcim\n");
        fflush($openFile);
        flock($openFile, LOCK_UN); //kilit aç
        $open = fopen($myPath, "r");
        echo fpassthru($open);
        echo "<div class='mt-2 alert alert-info'>Durum Başarılı...</div>";
      }
      fclose($openFile);
    } else {
      echo "<div class='mt-2 alert alert-danger'>Böyle bir dosya bulunamadı</div>";
    }

    //is_dir bir dizin oluğ olmadığını kontrol eder
    if (is_dir($myPath)) {
      echo "bu bir dizindir<br>";
    } else {
      echo "Bu bir dizin değildir<br>";
    }

    //is_executable Dosyanın çalıştırıla bilir olup olmadığını kontrol eder
    if (is_executable("uploads/AnyDesk.exe")) {
      echo "bu bir çalıştırılabilir dosya.<br>";
    } else {
      echo "bu bir çalıştırılabilir dosya değil!<br>";
    }

    //is_file Dosya oluğ olmadığını kontrol eder
    if (is_file("uploads/deneme.txt")) {
      echo "bu bir  dosya.<br>";
    } else {
      echo "bu bir  dosya değil!<br>";
    }

    //is_readable Dosyanın okunabilir olup olmadığını kontrol eder
    if (is_readable("uploads/deneme.txt")) {
      echo "bu bir okunulabilir dosya.<br>";
    } else {
      echo "bu bir okunamaz dosya!<br>";
    }

    //is_writable Bir dosyanın yazılabilir olup olmadığını kontrol eder
    if (is_writable("uploads/deneme.txt")) {
      echo "bu bir yazılabilir dosya.<br>";
    } else {
      echo "bu bir yazılamaz dosya!<br>";
    }

    //Yapılandırma dosyasını okur
    echo "<pre>";
    print_r(parse_ini_file("uploads/test.ini"));
    echo "</pre>";

    $fakeFile = tmpfile();
    fwrite($fakeFile, "Hello php Garip ama geçici dosya");
    rewind($fakeFile);
    echo fread($fakeFile, 1024);
    fclose($fakeFile);


    ?>


  </div>
</div>




<?php require_once "theme/footer.php"; ?>