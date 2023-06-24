<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Strings) Dersleri</title>
</head>

<body style="font-size:22px ;">

  <div class="p-5">

    <div class="alert alert-warning">
      <?php
      /*  $d = "Hello Php And JavaScript";
          echo $d;
          //harfleri sayar
          echo strlen($d) . "<br>";

          //Kelime sayısını ölçer
          echo str_word_count($d) . "<br>";

          //Kelimeleri ters çevirir
          echo strrev($d) . "<br>";

          //Aradağımız kelimeyi yada karakterin kaçıncı indexte olduğunu söyler
          echo strpos($d, "Php") . "<br>";

          //Bir kelimenin yada değişkene atanan veriyi Ankara kelimesini istanbul olarak düzenler 
          echo str_replace("Php", "Node Js", $d) . "<br>";

          //Bir değişkendeki istediğiniz harfi belirterek aralarına / koyar
          echo addcslashes($d, "p") . "<br>";

          //tek tırnaklı bir cümlenin içindeki çift tırnaklı kısıma / koyar ve kapatır
          echo addslashes('Hello "Php" And JavaScript') . "<br>";

          //ASCII Tablosundaki karakterin sayısını belirler ve Girilen cümlenin hepsini 
          //ASCII Tablosundaki indexlere göre yazar örnek olarak bizim cümlemizin hex 
          //Kodlarını bize verir (48656c6c6f2050687020416e64204a617661536372697074): cümlemizin hex kodu
          echo bin2hex($d) . "<br>";

          //Bir Cümlede son kısımda belirtilen kelimeyi siler büyük küçük harf dikkate alır.
          echo chop($d, "JavaScript") . "<br>";

          //ASCII Açılım : american standard code for information interchange 
          //Girilen harfe yada sayıya göre ASCII Tablosundan değerini bulur
          echo chr(52) . "<br>";
          echo chr(052) . "<br>";
          echo chr(0x52) . "<br>";
       */

      /* $text = "Hello Php And JavaScript";
        $color = "kırmızı";
        $dizi = "Abidin Maşo Naciye Kamil Selim Yavuz";
        $country = "Türkiye de";
        $number = "4360000";
        $file = fopen("test.txt", "w");
        $txt = '<a href="https://youtu.be/zH5n-7e5-AU?list=PLY20HpFruiK2RxKOaKIirxjlYAA3dB6J6"</a>';
        $newTxt = "This is so &lt;b&gt;nice&lt;/b&gt; code";
        $arr = ['Hello', 'php', 'Nice', 'language'];


        //Belirtilen kelime yada değişkenin her 1 harfine Belirtilen . , vb şeyleri koyar
        echo chunk_split($text, 6, "/") . "<br><br>";


        //Belirtilen kelime yada değişkeni Şifreler
        $encString = convert_uuencode($text) . "<br><br>";
        echo $encString;

        //Şifrelenmiş Veriyi Çözümler
        $decString = convert_uudecode($encString) . "<br><br>";
        echo $decString;

        //Belirtilen kelime yada değişkeni Şifreler
        echo crc32($text) . "<br><br>";

        //Değişken yada cümleyi belirtilen yere göre böler ve dizi haline ve çok elemanlı dizi haline getirir.
        print_r(explode(" ", $text));
        echo "<br><br>";

        //Değişken yada cümleyi verilen sayı ve karaktere göre (" " , ",") gibi. Tek yahut daha fazla dizi yapar.
        print_r(explode(" ", $dizi, 0)) . "<br><br>";

        //Değişkenlerdeki yazıları ve eklenen yazıyı bir dosyaya yazar
        //%S String ifadelerde kullanılır
        fprintf($file, "%s %u işssiz var", $country, $number);

        //Html kodlarımızı gösteren tablonun çıktısını verir
        echo "<br><br>";
        print_r(get_html_translation_table());


        //Html varlıklarını geçersiz hale sokar
        //echo "<br><br>";
        // echo html_entity_decode($txt);

        //Html varlıklarını geçerli hale sokar 
        //echo htmlentities($txt);

        //Özel karakterleri html koduna uyarlama anlamak için değişkene bakın
        //echo htmlspecialchars($newTxt); html verilerini okunmaz hale getirir
        echo "<br><br>";
        echo htmlspecialchars_decode($newTxt);

        //Diziyi aralarında eklenen karaktere göre düzenleyerek statik bir yazı olarak yazar
        echo "<br><br>";
        echo implode(" ", $arr);
      */
      /* 
        $text = "Hello Php And JavaScript";
        $space = " Hello Php And JavaScript ";
        $color = "kırmızı";
        $dizi = "Abidin Maşo Naciye Kamil Selim Yavuz";
        $country = "Türkiye de";
        $number = 436.0000;
        $file = fopen("test.txt", "w");
        $txt = '<a href="https://youtu.be/zH5n-7e5-AU?list=PLY20HpFruiK2RxKOaKIirxjlYAA3dB6J6"</a>';
        $newTxt = "This is so &lt;b&gt;nice&lt;/b&gt; code";
        $arr = ['Hello', 'php', 'Nice', 'language'];

        //Belirtilen arraye belirtilen karakteri aralarına koyar
        echo join("+", $arr) . "<br><br>";

        //İlk harfini küçük harf yapar
        echo lcfirst($text) . "<br><br>";

        //ilk karakteri büyük yapar
        echo ucfirst($text) . "<br><br>";

        //ilk kelimelerin ilk harflerini büyük yapar
        echo ucwords($text) . "<br><br>";

        //Tüm Stringi büyük harf yapar
        echo strtoupper($text) . "<br><br>";

        //Tüm Stringi küçük harf yapar
        echo strtolower($text) . "<br><br>";

        //Başta ve sondaki boşlukları siler
        echo "boşluk" . trim($space) . "<br><br>";

        //sağ taraftaki boşluğu siler
        echo rtrim($space) . "boşuk" . "<br><br>";

        //sol taraftaki boşluğu siler
        echo "boşluk" . ltrim($space) . "<br><br>";

        //Texti şifreler 
        echo md5(md5(md5($text))) . "<br><br>";

        //Dosya metin txt dosyalarını şifreler
        echo md5_file("test.txt") . "<br><br>";

        // satıra eklenen ters \n ile aşağı iner
        echo nl2br("İlk Satır\n" . "Diğer satır") . "<br><br>";

        //Sayıları düzgün formata sokar
        echo number_format("1000000") . "<br><br>";
        echo number_format("10000000", 2) . "<br><br>";
        echo number_format("1000000000") . "<br><br>";

        //Stringin ilk harfini ascıı kodunu verir
        echo ord("Hello") . "<br><br>";
        echo ord("H") . "<br><br>";
      */
      /*
        $text = "Hello Php And JavaScript";
        $text2 = "Hello Php";
        $space = " Hello Php And JavaScript ";
        $color = "kırmızı";
        $dizi = "Abidin Maşo Naciye Kamil Selim Yavuz";
        $country = "Türkiye de";
        $number = 4360000;
        $file = fopen("test.txt", "w");
        $txt = '<a href="https://youtu.be/zH5n-7e5-AU?list=PLY20HpFruiK2RxKOaKIirxjlYAA3dB6J6"</a>';
        $newTxt = "This is so &lt;b&gt;nice&lt;/b&gt; code";
        $arr = ['Hello', 'php', 'Nice', 'language'];

        //Çıktı almamızı sağlıyor
        printf("%u milyon %s sınava giriyor", $number, $text2);
        echo  "<br><br>";
        echo sprintf("%u milyon %s sınava giriyor", $number, $text2) . "<br><br>";

        //Nokta virgül gibi karakterlerin arasına slash koyar
        //not: değişkene noktalam işaretleri koy
        echo quotemeta($text) . "<br><br>";

        //Kelimeleri şifreler
        echo sha1($text) . "<br><br>";
        echo sha1_file("test.txt") . "<br><br>";

        //2Metini karşılaştırır benzerliğine göre sonuç veriyor
        echo similar_text("Hello Php", $text) . "<br><br>";

        //2 metini karşılaştırır atanan değişkene yani $simiları yazrdırırsak % lik sonuç verir
        similar_text("Hello Php", "Hello Node Php", $similar) . "<br><br>";
        echo $similar . "<br><br>";

        //KElimenin telaffuz kodunu verir
        echo soundex($text) . "<br><br>";

        //Değişken içindeki kısımları böler 
        $stext = "age:24 weigth:87";
        sscanf($stext, "age:%d weigth:%dkg", $age, $weigth);
        echo "Yaşınız: $age <br> Kilonuz: " . $weigth . "<br><br>";


        //İlk kısıma yazılan yeri ikinci kısımdaki yazılan yere göre değiştirir cümlenin aslı sonda yazılıdır
        //Yani I love Php kısmını I love React Js yapacaktır
        echo str_replace("Amk", "*****", "I love Amk") . "<br><br>";

        //Cümledeki karakterlerin sayısını tutar girilen sayıya kadar karakter ekler
        echo str_pad($text2, 12, ".");
      */
      /* $text = "Hello Php And JavaScript";
        $text2 = "Hello Php";
        $space = " Hello Php And JavaScript ";
        $color = "kırmızı";
        $dizi = "Abidin Maşo Naciye Kamil Selim Yavuz";
        $country = "Türkiye de";
        $number = 4360000;
        $file = fopen("test.txt", "w");
        $txt = '<a href="https://youtu.be/zH5n-7e5-AU?list=PLY20HpFruiK2RxKOaKIirxjlYAA3dB6J6"</a>';
        $newTxt = "This is so &lt;b&gt;nice&lt;/b&gt; code";
        $arr = ['Hello', 'php', 'Nice', 'language'];

        //Bir değişkeni defalarca yazmamıza yarar
        echo str_repeat($text2, 10) . "<br><br>";

        //rot 13 e göre kodlar
        echo str_rot13($text2) . "<br><br>";

        //rastgele harfleri değiştirir
        echo str_shuffle($text2) . "<br><br>";

        //Harfleri böler dizi haline çevirir atanan sayıya görede diziye çevirir
        print_r(str_split($text, 4));
        echo "<br><br>";

        //Büyük küçük karşılaştırması yapıp sonuç verir büyük küçük harfe dikkat "ETMEZ"
        echo strcasecmp("Merhaba", "MERHABA") . "<br><br>";

        //Büyük küçük karşılaştırması yapıp sonuç verir büyük küçük harfe dikkat "EDER"
        echo strcmp("Merhaba", "merhaba") . "<br><br>";

        //kelime içindeki belitrilen harfin indexini söyler
        echo strcspn("Merhaba", "a") . "<br><br>";

        //Html taglerini geçersiz kılar misal strong arasına yazılan yazıyı normal yapar
        //Sonuna virgül ile gelen koşulda belirttiğimiz tagi kabul eder yani:
        //İtalic yapıyı çalıştırır ama ilk strongu çalıştırma diyoruz
        echo strip_tags("Hello <strong>PHP</strong><i> İtalic yazı</i>","<i>");

        //Ters slash ifadelerini kaldırır
        echo "<br><br>";
        echo stripcslashes("Merhaba \Php"."<br><br>");
      
        //Belirtilen kelimenin index değerini verir 
        echo stripos("I love php and javascript","php");

        //istenilen kelimeyi arar ve kelimeden öncekini yazmaz
        echo "<br><br>";
        echo stristr("Merhaba php ve javascript","php");

        //Belli bir harf ten sonrasını yazar öncesini siler
        echo "<br><br>";
        echo strpbrk("Merhaba php","p")."<br><br>";


        //Bir cümledeki belli harfleri değiştirir. Örneğin i harfini e yapar a harfini o yapar 
        echo strtr("Merhaba php ve javascript","ia","eo")."<br><br>";
      */

      $text = "Hello Php And JavaScript";
      $text2 = "Hello Php";
      $space = " Hello Php And JavaScript ";
      $color = "kırmızı";
      $dizi = "Abidin Maşo Naciye Kamil Selim Yavuz";
      $country = "Türkiye de";
      $number = 4360000;

      //Bir cümlenin belitrilen indexinden itibaran yazar
      echo substr($text, 0, 7) . "<br><br>";

      //Belirtilen metin eğer eşitse sonuç olarak 0 döndürür
      //Eşit değilse -1 ve altında değer döndürür
      echo substr_compare($text2, "Hello Php", 0) . "<br><br>";

      //Bir değişkende yada cümlede belirtilen kelime kaç adet geçtiği sonucunu verir
      echo substr_count($text, "Php", 0) . "<br><br>";

      //Belitrilen değişkeni belitilen cümleye çevirir verilen index değerinden itibaren değiştirir
      //Verilen sayı 0 dan itibaren değiştirilirse tüm cümle değişir 
      echo substr_replace($text, "Yansın ankara", 0) . "<br><br>";

      //Değişkende yazılan yazıları satır sayısına göre böler 
      echo wordwrap("Merhabalar nasılsınız işler nasıl nasılgidiyorhayatmücadelesinasıl
      gidiyorhayatmücadelesinasılgidiyorhayatmücadelesinasılgidiyorhayatmücade", 12, "<br>\n",TRUE) . "<br><br>";




      ?>
      <br><br>
      <!-- Html içinde Php kullanımı 
      <p>Güller <?= $color ?>'dır.</p>-->
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>