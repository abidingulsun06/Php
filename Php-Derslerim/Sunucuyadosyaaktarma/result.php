<?php
require "../functions/safe.php";
if (isset($_FILES['myFile']) && isset($_POST['control'])) {
  $takeFile = $_FILES["myFile"];
  $fileName = $takeFile['name'];
  //Dosya yükleme işlemi yaparken aynı dosya ismi olmasın diye uniqid() kullanılır benzersiz bir isim alır
  $fileName = uniqid() . "_" . $fileName;
  $fileType = $takeFile['type'];
  $fileSize = $takeFile['size'];
  $fileTempName = $takeFile['tmp_name'];
  $fileError = $takeFile['error'];
  $filePath = "uploads/" . $fileName;

  if ($fileError == 4) {
    echo "Bir dosya seçiniz <br>";
    exit();
  } else {
    if ($fileError != 0 && $fileError != 4) {
      echo "Yüklediğiniz dosyada bir hata bulunmaktadır <br>";
      exit();
    } else {
      if (file_exists($filePath)) {
        echo 'Üzgünüm, bu isimde bir dosya mevcut,mevcut ismini değiştirerek tekrar yükleme yapın';
        exit();
      } else {
        if ($fileSize > 5000000) {
          echo "Dosya boyutunuz 5 mb'dan fazla olamaz";
          exit();
        } else {
          $look = getimagesize($fileTempName);
          if ($look === false) {
            echo 'Yüklemeye çalıştığınız dosya bir resim değil. Lütfen sadece resim formatında bir dosya yükleyin';
            exit();
          } else {
            $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
            $alloved = ["png", "jpg"];
            if (!in_array($fileExtension, $alloved)) {
              echo 'Yanlızca png ve jpg dosyaları yükleyebilirsiniz';
              exit();
            } else {
              if (move_uploaded_file($fileTempName, $filePath)) {
                echo "
              <div class='row'>
                <div class='col-lg-6'>
                  <div class='alert alert-info'>Dosya başarılı bir şekilde yüklendi<br>";
                echo "Dosya adı: $fileName<br>";
                echo "Dosya türü: $fileType<br>";
                echo "Dosya boyutu: $fileSize<br>";
                $fileInfo = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                if ($fileInfo == "docx") {
                  echo "<img class='w-25 d-block h-50' src='https://www.kimnezamanicatetti.com/wp-content/uploads/2016/08/microsoft-word.jpg'>";
                } elseif ($fileInfo == "pdf") {
                  echo "<img class='w-25 d-block h-50' src='https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1200px-PDF_file_icon.svg.png'>";
                } else {
                  echo "<img src='$filePath' class='w-50'>";
                }
                echo "<a class='btn w-25 d-block btn-danger mt-2' href='index.php'>Ana sayfaya geri dön</a>
                  </div>
                </div>
              </div>";
              } else {
                echo "Dosya Yüklenirken Beklenmedik Bir hata meydana geldi";
              }

?>
              <!DOCTYPE html>
              <html lang="en">

              <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
                <title>Php (Sunucuya Dosya aktarma) Lessons</title>
                <link href="../css/main.css" rel="stylesheet">
              </head>

              <body style="font-size:18px ;">




                <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
                <script src="../js/app.js"></script>
              </body>

              </html>
<?php
            } //if ($fileExtension != "pdf")
          } //  if ($look ===false)
        } //if ($fileSize >500000)
      } // if (file_exists($filePath))
    } // if ($fileError != 0 && $fileError != 4) 
  } // if ($fileError == 4)
} //if(isset($_FILES['myFile']) && isset($_POST['control']))
else {
  echo '<h2>Bu sayfaya giriş yetkiniz bulunmamaktadır</h2>';
}
?>