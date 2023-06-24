<?php
require_once "theme/header.php";
require "../functions/combine.php";
require "varaibles/varaibles.php";
?>


<div class="card mt-3">
  <div class="card-body">
    <!-- For example birth day -->
    <!-- <?php
          $myBirth = $_POST["age"];
          if (!empty($myBirth)) {
            $result = date("Y") - $myBirth;
            $yourAge = '<div class="alert alert-success mt-2">Your Age: ' . $result . '</div>';
          } else {
            $error = '<div class="alert alert-danger mt-2">*Please enter your birth year</div>';
          }
          ?>
    <form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); 
                  ?>" method="POST">
      <div class="form-group">
        <label>Enter Your Birth Year</label>
        <input type="text" class="form-control" name="age">
        <?php
        //echo $error;
        //echo $yourAge; 
        ?>
      </div>
      <button class="btn btn-danger mt-3" type="submit">Gönder</button>
    </form> -->

    <?php
    /*
      // date_default_timezone_set ile bölgeye göre saati ayarlayabiliriz
      date_default_timezone_set("Europe/Istanbul");

      //date_default_timezone_get() ile hangi bölge saati kullanıldığı kontrol edilir 
      echo "timezone: " . date_default_timezone_get() . "<br>";

      //Yılı verir
      echo date("Y") . "<br>";

      //Yılın son 2 hanesini verir
      echo date("y") . "<br>";

      //ayın sayısal değerini verir
      echo date("m") . "<br>";

      //ayın ingilizce tam haline ve kısaltılmış halini verir
      echo date("F-M") . "<br>";

      //Bu ay kaç gün çeker onu söyler
      echo date("t") . "<br>";

      //günün sayısal değerini verir 1-31
      echo date("j") . "<br>";

      //günün tam halini verir 1 2 3 değilde 01 02 03 gibi
      echo date("d") . "<br>";

      //ingilizce gün adı ve kısaltmasını veir
      echo date("l/D") . "<br>";

      //İngilizce günün 2 harfli sıralamasını veriyor tuesday TH gibi
      echo date("S") . "<br>";

      //24lük saat birimini verir
      echo date("G") . "<br>";

      //Tek haneli sayıları verir mesela 07 01 gibi
      echo date("H") . "<br>";

      //12lik saat sistemine göre saati verir 19=7
      echo date("g") . "<br>";

      //12lik saat biriminin başına 0 ekler 07 oolur
      echo date("h") . "<br>";

      //12lik sistemde am ve pmi verir yani sabah 7AM öğleden sonra 01 PM
      echo date("h a") . "<br>";

      //AM PM Büyük harfle yazar
      echo date("h A") . "<br>";

      //Dakikayı verir 'i' 's' saniyeyi verir 'H' 24lük saat
      echo date("H:i:s") . "<br>";

      //Yılın içinde bulunan haftayı verir yani 52 haftanın kaçıncı haftasındayızı verir 
      echo date("W") . "<br>";

      //Yılın kaçıncı gününde olduğumuzu verir
      echo date("z") . "<br>";

      //Haftanın kaçıncı günündeyiz onu verir 1.indexten çalışır
      echo date("w") . "<br>";

      //Haftanın kaçıncı günündeyiz onu verir 1.indexten çalışır
      echo date("N") . "<br>";


      if (date("L")) {
        echo "artık yıldayız<br>";
      } else {
        echo "artık yılda değiliz<br>";
      }

      //Yaz saatini kontrol eder
      echo date("I") . "<br>";

      //Zaman dilimini verir
      echo date("e") . "<br>";

      //Geçerli zaman diliminin sayısını verir
      echo date("T") . "<br>";

      //Zaman farkı değerini verir
      echo date("P") . "<br>";

      //iso 8600 standardlarına göre tarih ve saati verir
      echo date("c") . "<br>";

      //rfc standartlarına göre tarih saati verir
      echo date("r") . "<br>";

      //unix zaman değerini döndürür 1 ocak 1970 den itibaren geçen saniyeyi verir
      echo date("U") . "<br>";

      echo date("d/m/Y H/i/s", 1660666672);

      //ile bölgeleri listeler
      // echo "<pre>";
      // print_r(timezone_identifiers_list(128));
      // echo "</pre>";
    
      //checkdate() ay/gün/yıl şeklinde kontrol eder
      if (checkdate(12, 8, 2022)) {
        echo "Tarih bügün<br>";
      } else {
        echo "Tarih bugün değil<br>";
      }

      //Bir tarih oluşturup onu istediğimiz formata soktuk
      $myDate = date_create();
      date_add($myDate, date_interval_create_from_date_string("1 days"));
      echo date_format($myDate, "d-m-Y") . "<br>";

      //bir tarih oluşturup aralarına - yerine . koyarak yıl/ay/gün haline getirdik;
      $myDate = date_create_from_format("j-M-Y", "19-Mar-2010");
      echo date_format($myDate, "Y.m.d") . "<br>";

      //Bir ülkeye göre tarih ve zaman oluşturduk
      $myDate = date_create("2009-09-08 20:10:00", timezone_open("Europe/Berlin"));
      echo date_format($myDate, "Y/m/d H:iP") . "<br>";

      //Oluşturduğumuz bir tarihi date_date_set ile kendimiz yazabiliyoruz
      $myDate = date_create("2009-09-08");
      date_date_set($myDate, 2022, 8, 16);
      echo date_format($myDate, "d/m/Y H:iP") . "<br>";

      //Tarih işlemlerindeki hataları verir
      $myDate = date_create("gyu&&");
      echo "<pre>";
      print_r(date_get_last_errors());
      echo "</pre>";

      //iso tarihine göre zaman döndürür
      $myDate = date_create();
      date_isodate_set($myDate, 2009, 5);
      echo date_format($myDate, "d/m/Y");

      echo "<br>";

      //Oluşturulan tarihe 15 gün ekler
      $myDate = date_create("2009/09/07");
      date_modify($myDate, "+15 days");
      echo date_format($myDate, "d/m/Y");

      //date_parse tarihi array haline getirir
      $myDate = date_create("2009/09/07");
      echo "<pre>";
      print_r(date_parse("2022-08-16 21:12:45.2"));
      //fraction .lıklı sayıları alır
      echo "</pre>";

      $myDate = date_create("2022/08/16");
      //belirtilen gün sayısana göre gün/ay/yıl siler 10 gün silerek 16 agu'dan 6 agu'ya gittim 
      date_sub($myDate, date_interval_create_from_date_string("10 days"));
      echo date_format($myDate, "d-m-Y") . "<br>";

      $myDate = date_create("2022/08/16");
      $sunInfo = date_sun_info(strtotime("2022,8,16"), 27.0923, 38.4622);
      foreach ($sunInfo as $key => $value) {
        echo "$key: " . date("H.i.s", $value) . "<br>";
      }

      $myDate = getdate();
      echo "<pre>";
      print_r($myDate);
      echo "</pre>";

      $myDate = localtime(date("U"), true);
      echo "<pre>";
      print_r($myDate);
      echo "</pre>";
    
      date_default_timezone_set("Europe/Istanbul");
      echo "timezone: " . date_default_timezone_get() . "<br><br>";

      //Şehrin ve ilçenin enlem ve boylamına göre gün doğumu date_sunrise % gün batımı date_sunset
      $myDate = date_sunrise(
        time(),
        SUNFUNCS_RET_STRING,
        41.1272,
        37.2886,
        90.5,
        3
      );
      echo "Gün Doğumu:" . $myDate . "<br><br>";

      $myDate2 = date_sunset(
        time(),
        SUNFUNCS_RET_STRING,
        41.1272,
        37.2886,
        90.5,
        3
      );
      echo "Gün Batımı:" . $myDate2 . "<br><br>";


      //date_time_set() ile oluşturduğumuz tarihin saat ve dakikayı değiştirebiliriz
      $myDate = date_create("2022-8-16");
      date_time_set($myDate, 23, 19);
      echo date_format($myDate, "d-m-Y H.i.s") . "<br><br>";

      //1 ocak 1970 ten itibaren geçen saniye cinsinden zamanı getirir
      $myDate = date_create();
      echo date_timestamp_get($myDate) . "<br><br>";

      //1970 den itibaren saniye cinsinden geçen zamanı gün/ay/yıl şeklinde bize verir yani 1660676065saniye 1970'den itibaren hesaplayınca 16-08-2022 21.56.30 bu zamana ulaşır
      date_timestamp_set($myDate, 1660676190);
      echo "Yeni zaman damgası: " . date_timestamp_get($myDate) . "<br>";
      echo date_format($myDate, "d/m/Y H.i.s") . "<br><br>";

      //Zaman diliminin ismini verir
      $myDate = date_create("16-08-2022", timezone_open("Europe/Istanbul"));
      $look = date_timezone_get($myDate);
      echo timezone_name_get($look) . "<br><br>";


      //Bir zaman dilimi tarihinden başka bir zaman dilimi tarihine geçer
      $myDate = date_create("17-08-2022");
      echo date_format($myDate, "d/m/Y H.i.sP") . "<br><br>";
      date_timezone_set($myDate, timezone_open("Europe/London"));
      echo date_format($myDate, "d/m/Y H.i.sP") . "<br><br>";


      echo date(DATE_ATOM) . "<br>";
      echo date(DATE_COOKIE) . "<br>";
      echo date(DATE_ISO8601) . "<br>";
      echo date(DATE_RFC822) . "<br>";
      echo date(DATE_W3C) . "<br>";
    

      $myDate = time();
      //mikro saniye cinsinden veriyi verir  $myDate = microtime();
      echo $myDate . "<br>";
      echo date("d/m/Y", $myDate);


      //Bir bölgenin zaman dilimi ve enlem boylam gibi özelliklerini verir
      $myDate = timezone_open("Europe/Istanbul");
      echo "<pre>";
      print_r(timezone_location_get($myDate));
      echo "</pre>";

      //Zaman damgasını zaman damgasının mikro saniye cinsini ve grimwich kasabasına olan uzaklıkı verir ve yaz saati uygulamasını verir
      $myDate = gettimeofday();
      echo "<pre>";
      print_r($myDate);
      echo "</pre>";


      //İki tarih arasındaki y farklarını verir
      $myDate = date_create("1990-10-01");
      $myDate2 = date_create("2009-12-29");
      $totalDays = "";
      $result = date_diff($myDate, $myDate2);
      echo $result->format("%R%y yıl fark var") . "<br>";
      foreach ($result as $key => $value) {
        if ($key == "days") {
          $totalDays = $value;
        }
      }
      echo "1990-10-01 && 2009-12-29 arasında '" . $totalDays . "' gün fark var...<br>";
      echo timezone_version_get();
    */


    setlocale(LC_ALL, "tr-TR");
    $datetime = date('m/F \S\a\a\t\:H:i:s l \Y\ı\l:Y');
    echo "<pre>";
    echo date_turkey($datetime);
    echo "</pre>";

    //Zaman damgasını verir strtotime
    echo time() . "<br>";
    $myDate = strtotime("1 hour", time());
    echo ($myDate) . "<br>";

    //Bir ayın kaç gün çektiğine bakar
    echo cal_days_in_month(CAL_GREGORIAN, 2, 2008) . "<br>";
    echo cal_days_in_month(CAL_GREGORIAN, 2, 2012) . "<br>";
    echo cal_days_in_month(CAL_GREGORIAN, 2, 2009) . "<br>";

    //Takvim convert ettirme
    $result = unixtojd(time());
    echo "<pre>";
    print_r(cal_from_jd($result, CAL_GREGORIAN));
    echo "</pre>";

    //Takvim bilgisini verir 0.index gregorian takvimi
    echo "<pre>";
    print_r(cal_info(0));
    echo "</pre>";
    ?>

  </div>
</div>

<?php require_once "theme/footer.php"; ?>