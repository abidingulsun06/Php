<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Düzenli İfadeler) Lessons</title>
  <style>
    ul {
      list-style-type: none !important;
    }
  </style>
  <link href="../css/main.css" rel="stylesheet">
</head>

<?php require "../functions/safe.php"; ?>
<div class="p-5 card">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">

        <?php
        /*
            x patterndeki verinin boşluklarını dikkate almaz ama aranan verideki boşlukları dikkate alır
            i büyük küçük harf dikkate almadan patterni arar / sonra yazılır
            u türkçe karakter sorunu için
            d	Herhangi bir rakamı ifade eder
            w	Herhangi bir harfi, rakamı veya alt tireyi ifade eder
            s	Herhangi bir görünmez karakteri ve boşluğu ifade
            eder. (Boşluk, tab, satır başı gibi)
            D	Rakam olmayan herhangi bir karakteri ifade eder
            S	Görünmez ve boşluk olmayan karakteri ifade eder
            W	Harf, rakam veya alt tire olmayan karakteri ifade eder
            b	Kelimenin başını veya sonunu ifade eder
            ^	Başlangıcı ifade eder
            $	Sonu ifade eder
             .	Satır başı hariç herhangi bir karakteri ifade eder
            *	Kendinden önce yazılmış karakterin;
            sıfır veya daha fazla tekrar etmesini ifade eder
            +	Kendinden önce yazılmış karakterin;
            bir veya daha fazla tekrar etmesini ifade eder
            ?	Kendinden önce yazılmış karakterin;
            olsa da olur olmasa da olurunu ifade eder
            {123}	Kendinden önce yazılmış karakterin;
            parantez içerisine yazılan sayı kadar tekrar etmesini ifade eder
            {1, 2}	Kendinden önce yazılmış karakterin;
            parantez içerisinde yazılan iki sayı arasında tekrar etmesini ifade eder
            ( … )	Parantez içerisine yazılan ifadeleri gruplamaya yarar
            ( … | … )	Parantez içerisine yazılan “|” dik tire işareti ya da anlamına gelir,
            içerisine yazılan ve dik tire ile
            ayrılan ifadelerden herhangi birisinin eşleşmesini ifade eder
            [ … ]	Köşeli parantez içerisine yazılan karakterlerden bir tanesini ifade eder
            \	Kaçış karakteri. Yukarıda yazdığımız karakterleri normal olarak
            yazmak istediğimizde başına kaçış işaretini koyarız.
            Örneğin noktayı ifade etmek için .
           
            [^ … ]	Üç nokta yerine yazılan karakterler haricindeki
            karakterleri ifade eder. örn: [^abc] abc karakterleri  dışındaki herşey.
            [a-z]	A dan z’ye olan harflerden birisini ifade eder.
        */

        //\w düzenli ifadelerde büyük küçük harf sayı ve _ gibi karakterleri ararız işledik
        //preg_filter ile verilen verileri yeniden değiştirmeyi mesela php yazan yere node js yazmayı işledik
        //preg_match_all ve preg_match işledik verileri tek yada toplu arama
        /*
            echo "<strong class='d-block'>Değiştirilmiş metin</strong>";
            $text = "Lorem ipsum dolor php sit amet, consectetur adipisicing elit. Voluptates nostrum quo voluptate expedita possimus vitae eveniet nam omnis harum fuga doloribus nobis, aliquam quam repellat labore. php Vitae accusamus corrupti enim!";
            \w düzenli ifadelerde büyük küçük harf sayı ve _ gibi karakterleri arar
            $pattern = "/\w/";
            Aranan veriyi bulur $pattern = "/php/";
            Aramış olduğumuz verinin 1 tanesini arıyorsak preg_match
            preg_match($pattern, $text, $result);

            $pattern = ["/php/", "/Lorem/", "/\./", "/sit/"];
            $replace = ["Node Js", "Merhaba", "!", "otur"];
            $patternda belirtilen kelimeyi $replace değişkeninde preg_filter veya preg_replace ile değiştirir.
            $result = preg_filter($pattern, $replace, $text);
            echo $result;

            Aramış olduğumuz verinin hepsini arıyorsak preg_match_all
            preg_match_all($pattern, $text, $result);

            echo '<pre>';
            print_r($result);
            echo '</pre>';

            echo "<strong class='mt-3 d-block'>Orjinal metin</strong>";
            echo $text . "<br><br>";

            $content = [77, 71.19, 19.27, 57];
            $pattern = ["/7/", "/\./"];
            $replace = ["9", "-"];
            $result = preg_replace($pattern, $replace, $content);
            foreach ($result as $key) {
              echo $key . "<br>";
            }
        */

        //preg_split Belirtilen karakterden itibaren arraye çeviri işledik
        /* 
            $text = "Lorem ipsum dolor php sit amet, consectetur adipisicing elit. Voluptates nostrum quo voluptate expedita possimus vitae eveniet nam omnis harum fuga doloribus nobis, aliquam quam repellat labore. php Vitae accusamus corrupti enim!";
            $pattern = "/\./";
            $result = preg_split($pattern, $text);
            foreach ($result as $key => $value) {
              echo  $key . "." . $value . "<br>";
            };
        */

        // i büyük küçük harf dikkate almadan aratmayı işledik
        //preg_grep belirtilen kelimeyi ara bulduklarını arraye çeviri işledik
        /*
            echo "<h4> String veriler ile preg_grep</h4><br>";
            $content = ["Node Js", "Angular Js", "React JS", "Jsp", "asp"];
            $pattern = "/Js/i";
            //Burada i harfini koyduğumuz için büyük küçük harfi dikkate almadan patternden sonuç döndürmüştür
            $result = preg_grep($pattern, $content);
            echo '<pre>';
            print_r($result);
            echo '</pre>';

            echo "<h4> Number veriler ile preg_grep</h4><br>";
            $content = [19, 291, 23, 7, 39, 97, 899];
            $pattern = "/9/";
            $result = preg_grep($pattern, $content);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
          */

        // /Eklemeyi işledik
        /* 
            $text = "Lorem ipsum dolor php + sit amet , consectetur adipisicing elit . Voluptates - nostrum quo voluptate expedita possimus ^ vitae eveniet $ nam * omnis harum fuga doloribus nobis, aliquam quam repellat = | # labore. php Vitae? accusamus corrupti enim !  [  {  (  <  % ";
            //+ . ! ^ ? $ - = | # * < [] {} () preg_quote ile özel karakterlerden önce / ekletebiliriz" parametreye eğer özel bir karakter girilirse onunda önüne / koyacaktır misal % & , boşluk gibi;
            $result = preg_quote($text, "%");
            echo ($result);
          
          */

        //u türkçe karakter işledik
        /*
            $text = "Lorem ipsum dolor php sit amet, consectetur adipisicing elit. ÇAkır Voluptates nostrum quo voluptate expedita possimus vitae ANKARA eveniet nam omnis harum fuga doloribus nobis, aliquam quam daNa ankara AnKaRa repellat PHP labore. php Vitae accusamus corrupti enim! ";
            $pattern = "/ankara/ui";
            preg_match_all($pattern, $text, $result);
            echo '<pre>';
            print_r($result);
            echo '</pre>';

            $text = "Şimdi türkçe karakter sorununu çözelim البرمجيات";
            $pattern = "//u";
            $result = preg_split($pattern, $text);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
          */

        //x Patterndeki boşluku dikkate almadan veri arar işledik
        //s satır başlarını dikkate almaz 
        /* 
            $text = "lorem ipsum sit dolar php and php";
            $pattern = "/p h p/x";
            preg_match_all($pattern, $text, $result);
            echo '<pre>';
            print_r($result);
            echo '</pre>';

            $text = "lorem ipsum sit dolar php 
            and php lorem ipsum sit dolar php and 
            php lorem ipsum sit dolar php and
            php";
            $pattern = "/./s";
            preg_match_all($pattern, $text, $result);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
          */

        //Konum ifadeleri
        /* 
            //^ metnin en başında aranılan pattern varsa veriyi alır yoksa almaz
            $text = "lorem ipsum sit dolar php and php lorem ipsum sit dolar php and php lorem ipsum sit dolar php and php";
            $pattern = "/^php/";
            $result = preg_match($pattern, $text);
            if ($result) {
              echo '^Aranılan kelime metnin başında var.';
            } else {
              echo '^Aranılan kelime metnin başında yok!';
            }

            echo "<br><br>";
            //$ metnin en sonunda aranılan pattern varsa veriyi alır yoksa almaz
            $text = "lorem ipsum sit dolar php and php lorem ipsum sit dolar php and php lorem ipsum sit dolar php and think";
            $pattern = "/k$/";
            $result = preg_match($pattern, $text);
            if ($result) {
              echo '$ Aranılan kelime metnin sonunda var.';
            } else {
              echo '$ Aranılan kelime metnin sonunda yok!';
            }

            echo "<br><br>";
            //\b Bir cümle içinde belirtilen bölüme ait yazı varsa yada cümle belirtilen harfle başlıyorsa o değeri döndürür mesela lorem yazısı içinde \blo aratılırsa loremin 'lo' kısmını bize verir

            $text = "lorem ipsum sit dolar php and php lorem ipsum sit dolar php and php lorem ipsum sit dolar php and think";

            //metnin başı belirtilen harf l ile başlıyormu diye kontrol eder $pattern = "/\bl/";

            //metnin ortası belirtilen harf r ile başlıyormu diye kontrol eder 
            //$pattern = "/\Bol/i";

            //sonunda boşluk varsa diye \b/ ortaya konur
            //$pattern = "/nd\B/i";

            //metnin sonu belirtilen harf r ile bitiyormu diye kontrol eder 
            $pattern = "/r\b/i";
            $result = preg_match_all($pattern, $text);
            if ($result) {
              echo '\b Aranılan kelime metninde var!';
            } else {
              echo '\b Aranılan kelime metninde yok!';
            }

            echo "<br><br>";

            //\?=' sonda belirtilen karakterin geçtiği verileri arar
            $text = "lorem ipsum sit dolar php'de and php lorem ipsum sit dolar php. and php, lorem ipsum sit dolar PhP'de and think";
            $pattern = "/php(?=')/i";
            preg_match_all($pattern, $text, $result);
            echo '<pre>';
            print_r($result);
            echo '</pre>';


            echo "<br><br>";

            //\?! sonda belirtilen karakterle bitmeyenleri getirir yani ?!' ifadesinde sonu ' la bitmeyenleri getirir
            $text = "lorem ipsum sit dolar php and php lorem ipsum sit dolar php. and php, lorem ipsum sit dolar PhP'de and think";
            $pattern = "/php(?! )/i";
            preg_match_all($pattern, $text, $result);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
          */

        //nicelik belirleyiciler
        /*
            //\.{1} . işaretine minimum 1 kez tekrarlananları getiri eğer {2} yazılırsa min 2 kez tekrarlarnanları getirir
            $text = "Hello. My name is PHP.. I am a simple language... you can learn fast. I love.... PHP too. What do you do think. php enterasan olaylar....";
            //$pattern = "/\.{1}/";

            //1 veya daha fazla kez geçenleri getirir
            //$pattern = "/\.{1,}/";

            //1 veya daha fazla kez geçenleri getirir
            //$pattern = "/\.+/";

            //en az 1 en fazla 2 kez geçmiş verileri getirir
            //$pattern = "/\.{1,2}/";

            //Hiç geçmesede olur 1 kez veya daha fazla geçsede olur 
            /*$pattern = "/\.*";/

            preg_match_all($pattern, $text, $result);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
          */

        //Özel belirleyiciler
        $text = "İHello. My name is PHP.. *reactJs I am a simple language... 2022 you can learn fast. I love*.... nodeJs PHP too. What do you do think. php+ bbenterasan olaylar.... vueJs türkçe karakterler geldimi yumuşak Ğ varmı ";

        //hem harfleri bulur hemde birleşimini bulur
        $pattern = "/(lan)(gu)(age)/";

        //Başındaki kelimeye göre sonunda belirtilen kelime varsa verileri ona göre getirir yani reacta bakar sonunda js varsa getirir
        $pattern = "/(react|node|vue)js/i";

        //Sadece tüm cümleyi verir verileri bölüp alt array oluşturmaz
        $pattern = "/react(?:js)/i";

        // \ kendisinden sonra gelecek karakterin özel bir kod olmadığını belitrir sadece karakter olarak arar
        $pattern = "/\+/i";

        //[you] verilen harfleri içeren tüm verileri getirir
        $pattern = "/[you]/";

        //[a-zA-Z ğşüıçöĞŞÜIÖÇ0-9]'ye tüm harfleri,türkçe karakterleri sayıları büyük küçük hepsini getirir getirir
        $pattern = "/[a-zA-Z ğşüıçöĞŞÜIİÖÇ0-9]/u"; //ğşüıçöĞŞÜIÖÇ


        //Aşağıda girilen harfler dışındaki harfleri getir demek Başına ^ şapka gelmezse bu harfleri getir demek oluyor
        $pattern = "/[^aeiİIı.mMNny ]/iu"; //ğşüıçöĞŞÜIÖÇ

        preg_match_all($pattern, $text, $result);
        echo '<pre>';
        print_r($result);
        echo '</pre>';

        ?>



      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
<script src="../js/app.js"></script>
</body>

</html>