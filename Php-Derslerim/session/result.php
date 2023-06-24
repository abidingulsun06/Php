<?php
session_set_cookie_params(false, '/', 'localhost', false, true);
session_start();
require "../functions/combine.php";
require "classes/routing.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userName = security($_POST["userName"]);
  $pass = security($_POST["password"]);
  $dbUser = security("admin");
  //şifre: 123
  $dbPass = security("202cb962ac59075b964b07152d234b70");
  if (empty($userName) && empty($pass)) {
    echo "<h3>Lütfen formda boş veri bırakmayın</h3>";
    routing::comeBack(4);
  } else {
    $pass = md5($pass);
    if ($dbUser != $userName || $dbPass != $pass) {
      echo "<h2>Kullanıcı adı veya şifre hatalı</h2>";
      routing::go("index.php", 2);
      exit();
    } else {
      session_regenerate_id(true);
      $_SESSION["LogedIn"] = true;
      $_SESSION["userName"] = $userName;
      $_SESSION["LoginIP"] = $_SERVER["REMOTE_ADDR"];
      $_SESSION["userAgent"] = $_SERVER["HTTP_USER_AGENT"];
      echo '<h2> Giriş Yapıldı Profile sayfasına yönlendiriliyorsunuz.</h2>';
      routing::go("profile.php", 1);
    }
  }
} else {
  routing::go("index.php", 2);
  exit("Bu sayfayı görüntüleme yetkiniz bulunmamaktadır");
}
