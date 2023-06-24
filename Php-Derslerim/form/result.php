<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Form) Lessons</title>
  <style>
    body {
      padding: 0 !important;
      margin: 0 !important;
    }

    .modal-header,
    .modal-footer {
      display: block !important;
    }

    .modal::after {
      content: "";
      display: block;
      position: absolute;
      z-index: 1;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: url('https://www.freeiconspng.com/thumbs/error-icon/error-icon-4.png');
      width: 100%;
      height: 100%;
      background-repeat: no-repeat;
      background-position: center;
      background-color: #4b4b4b;
      object-fit: cover;
      background-size: 40%;
      opacity: 0.3;
      color: #f1f1f1;
    }

    .modal-body {
      z-index: 100;
    }

    .alert {
      min-height: 100vh;
      border: 0 !important;
      border-radius: 0 !important;
      margin: 0 !important;
      background-color: #f1f1f1;
    }
  </style>
</head>

<body style='font-size:22px;'>
  <?php require "../functions/safe.php"; ?>
  <div class='p-5 alert alert-info'>
    <div class='row p-0'>
      <div class='col-lg-6 p-0'>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $buyukHarfIsim = security(ucwords($_POST['firstname']));
          $email = security($_POST['email']);
          $webSite = security($_POST['website']);
          $age = security($_POST['age']);
          $gender = security($_POST['gender']);
          $comment = security($_POST['comment']);

          echo 'Hoşgeldiniz: ' . $buyukHarfIsim   . '<br>';
          echo 'E-Postanız: ' . $email . '<br>';
          echo 'Web Adresi: ' . $webSite . '<br>';
          echo 'Yaşınız: ' . $age . '<br>';
          echo 'Yorumunuz: ' . $comment . '<br>';
          echo 'Cinsiyet: ' . $gender . '<br>';
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
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
          $message = "Hatalı işlem form GET methodu ile gönderilmiştir";
          $messageUc = ucwords($message);

          echo
          "
            <div class='modal' id='myModal' data-bs-backdrop='static'>
              <div class='modal-dialog  modal-fullscreen'>             
                <div class='modal-content'>
                  <div class='modal-body d-flex flex-column justify-content-center h-100 align-items-center'>
                    <p class='text-dark'>$messageUc</p>
                    <a href='form.php' class='btn btn-danger'>Back to Home Page</a>
                  </div>
                </div>
              </div>
            </div>
          ";
        }



        ?>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
      <script src="../js/app.js"></script>



</body>

</html>