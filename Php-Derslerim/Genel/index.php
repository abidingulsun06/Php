<?php require_once "theme/header.php"; ?>


<div class="card">
  <div class="card-body">

    <form method="POST" action="
      <?php
      htmlspecialchars($_SERVER["PHP_SELF"]);
      ?>">
      <div class="d-flex">
        <div class="form-group mb-2 w-25">
          <label for="">Kullanıcı Adı:</label>
        </div>
        <div class="form-group mb-2 w-75">
          <input type="text" class="form-control" name="username">
        </div>
      </div>
      <button class="btn btn-outline-danger" type="submit">Gönder</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $username = $_POST["username"];
      //mb_strlen utf-8 karakterleri sayması için kullanılan fonksiyon

      //utf-8 ile kelime sayar str_word_count($username, 0,"ğĞçÇüÜöÖşŞıİ")

      //utf-8 ile belirtilen harfin ilk önce kaçıncı indexte bulunduğunu verir mb_strpos($username, "ö", 0, "UTF-8");

      //mb_strpos soldan sağa Büyük küçük harf dikkate alır
      //mb_stripos soldan sağa büyük küçük dikkate almadan arar
      //mb_strrpos sağdan sola arar bulduğu ilk indexi verir
      //mb_strripos sağdan sola arar büyük küçük dikkate almaz
      //utf-8'e göre mb_substr($username, 0, 45, "UTF-8")
      //Kelimeleri böler wordwrap($username, 10, "<br>")
      // ord($username) harfin ascıı kodunu verir

      define("Hello", "Merhaba phpciğim<br>");
      echo constant("Hello");

      $number = "8";
      settype($number, "integer");
      echo gettype($number);

      switch (connection_status()) {
        case CONNECTION_NORMAL:
          $text = "bağlantı durumu normal";
          break;
        case CONNECTION_ABORTED:
          $text = "Bağlantı iptal edildi";
          break;
        case CONNECTION_TIMEOUT:
          $text = "Bağlantı zaman aşımına uğradı";
        case (CONNECTION_ABORTED & CONNECTION_TIMEOUT):
          $text = "Bağlantı Zaman aşımına uğradı ve iptal edildi";
          break;
        default:
          $text = "Bağlantı durumu bilinmiyor";
          break;
      }
      echo "<div class='alert alert-success mt-3'> $text</div> ";

      $result = mb_substr($username, 0, mb_strlen($username), "UTF-8");
      if (isset($username) && !empty($username)) {
        echo "<div class='alert alert-success mt-3'>$result</div>";
        $result = ConvertLetter($username, "firstLower");
        echo "<div class='alert alert-success mt-3'>" . $result . "</div> ";
      } else {
        $message = "<div class='mt-3 alert alert-danger'>Lütfen Alanı Boş bırakmayın!</div>";
      }
    }

    echo  $message;




    ?>


  </div>
</div>


<?php require_once "theme/footer.php"; ?>
<script>
  async function detectAdBlock() {
    let adBlockEnabled = false
    const googleAdUrl = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'
    try {
      await fetch(new Request(googleAdUrl)).catch(_ => adBlockEnabled = true)
    } catch (e) {
      adBlockEnabled = true
    } finally {
      console.log(`AdBlock Enabled: ${adBlockEnabled}`)
    }
  }
  detectAdBlock()
</script>