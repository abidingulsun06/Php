<?php
require "../functions/safe.php";

if (isset($_FILES['myFile']) && isset($_POST['control'])) {
  $takeFiles = $_FILES["myFile"];
  $fileTempName = $takeFiles['tmp_name'];

  foreach ($fileTempName as $key => $value) {
    $filesName = uniqid() . "_" . $takeFiles['name'][$key];
    $filesType = $takeFiles['type'][$key];
    $filesTempName = $takeFiles['tmp_name'][$key];
    $filesSize = $takeFiles['size'][$key];
    $filesPath = "uploads/" . $filesName;

    if (move_uploaded_file($filesTempName, $filesPath)) {
      $message .= "<div class='card p-3 mb-4'>Dosya adı: $filesName<br>";
      $message .= "Dosya türü: $filesType<br>";
      $message .= "Dosya boyutu: $filesSize<br>";
      $message .= "<img class='w-50 d-block mt-3 mb-3' src='$filesPath'></div>";
    } else {
      echo "Dosya Yüklenirken Beklenmedik Bir hata meydana geldi";
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Php (Sunucuya Çoklu dosya aktarma) Lessons</title>
    <link href="../css/main.css" rel="stylesheet">
  </head>

  <body style="font-size:18px ;">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="p-5 card mt-3 bg-light box">
          <div class="card-body">
            <?php
            // echo '<pre>';
            // print_r($takeFiles);
            // echo '</pre><br><br>';
            echo $message;
            echo "<a class='btn btn-danger mt-4' href='index.php'>Ana sayfaya geri dön</a>";
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
<?php
  toast();
} //(isset($_FILES['myFile']) && isset($_POST['control']))
else {
  echo '<h2>Bu sayfaya giriş yetkiniz bulunmamaktadır</h2>';
}
?>