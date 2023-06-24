<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Form) Lessons</title>
  <link href="../css/main.css" rel="stylesheet">
</head>

<body style="font-size:18px ;">
  <?php require "../functions/safe.php"; ?>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['firstname'])) {
      $nameError = "İsim Alanı Boş Geçilemez";
    } elseif (!preg_match("/^[a-zA-Z- ']*$/", security($_POST["firstname"]))) {
      $nameError = "isim alanına sadece boşluk ve harf kabul edilebilir";
    } elseif (empty($_POST['email'])) {
      $emailError = "Email Alanı boş Geçilemez";
    } elseif (!filter_var(security($_POST['email']), FILTER_VALIDATE_EMAIL)) {
      $emailError = "Bu eposta geçerli değil";
    } elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", security($_POST['website']))) {
      $webError = "Bu web adresi geçerli değil";
    } elseif (security($_POST['age'] < 25)) {
      $errorAge = "Yaşınız 25'den küçük olamaz";
    }
    //elseif (security($_POST['comment']) == "amk") {
    //   $kufurMessage = "Küfürlü ifadelere yer verilmez sg";
    // }
    else {
      $buyukHarfIsim = ucwords($_POST['firstname']);
      $email = security($_POST['email']);
      $webSite = security($_POST['website']);
      $age = security($_POST['age']);
      $gender = security($_POST['gender']);
      $comment = security($_POST['comment']);
    }
  } else {
    $message = "Hatalı işlem form GET methodu ile gönderilmiştir";
    $messageUc = ucwords($message);

    echo
    "
      <div class='modal' id='myModal' data-bs-backdrop='static'>
        <div class='modal-dialog '>             
          <div class='modal-content'>
            <div class='modal-body d-flex flex-column justify-content-center h-100 align-items-center'>
              <p class='text-dark'>$messageUc</p>
              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
            </div>
          </div>
        </div>
      </div>
    ";
  }
  ?>

  <div class="p-5 alert alert-info">
    <div class="row">
      <div class="col-lg-6">
        <span class="text-danger">* Zorunlu Alanlar</span>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="name" name="firstname" class="form-control" require>
            <small class="text-danger">*<?php echo $nameError; ?></small>
          </div>
          <div class="mb-3">
            <label class="form-label">E-Posta</label>
            <input type="email" name="email" class="form-control" require>
            <small class="text-danger">*<?php echo $emailError; ?></small>
          </div>
          <div class="mb-3">
            <label class="form-label">Url</label>
            <input type="text" id="id" name="website" class="form-control">
            <small class="text-danger">*<?php echo $webError; ?></small>
          </div>
          <div class="mb-3">
            <label class="form-label">Yaş</label>
            <select class="form-select" name="age">
              <option selected>Bir yaş seçiniz</option>
              <?php sayac() . "<br>"; ?>
            </select>
            <small class="text-danger">*<?php echo $errorAge; ?></small>
          </div>
          <div class="mb-3">
            <label class="form-label">Comment</label>
            <textarea class="form-control" name="comment" rows="5"></textarea>
            <small class="text-danger">*<?php echo $kufurMessage; ?></small>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="Kadın">
              <label class="form-check-label">
                Kadın
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="Erkek">
              <label class="form-check-label">
                Erkek
              </label>
            </div>
          </div>

          <button type="submit" class="btn btn-success d-block">Gönder</button>

          <?php

          if (empty($buyukHarfIsim && $email)) {
            echo 'Hoşgeldiniz: '  . '<br>';
            echo 'E-Postanız: ' . '<br>';
            echo 'Web Adresi: '  . '<br>';
            echo 'Yaşınız: ' . '<br>';
            echo 'Cinsiyet: '  . '<br>';
            echo 'Yorumunuz: '  . '<br>';
          } else {
            echo 'Hoşgeldiniz: ' . $buyukHarfIsim . '<br>';
            echo 'E-Postanız: ' . $email . '<br>';
            echo 'Web Adresi: ' . $webSite . '<br>';
            echo 'Yaşınız: ' . $age . '<br>';
            echo 'Cinsiyet: ' . $gender . '<br>';

            $pattern = $kufur;
            if (preg_match_all($pattern,   $comment)) {
              echo "Yorumunuz: ********";
            } else {
              echo 'Yorumunuz: ' . $comment . "..." . '<br>';
            }

            echo
            "
              <div class='toast border-0' role='alert' data-bs-delay='10000' aria-live='assertive' aria-atomic='true'>
              <div class='toast-header border-0'>
                <strong class='me-auto'>İşlem</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
              </div>
              <div class='toast-body py-4 border-0 text-white'>
                İşlem Başarılı...
              </div>
            </div>";
          }
          ?>

      </div>


      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
      <script src="../js/app.js"></script>
</body>

</html>