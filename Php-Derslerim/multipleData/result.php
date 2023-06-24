<!DOCTYPE html>
<?php
require "../functions/safe.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = security($_POST['firstname']);
  $language = $_POST['languages'];
  $message = "Yetkiniz Var!";
  $message = "<ul class='list-group'>";
  foreach ($language as $value) {
    $message .= "<li class='list-group-item'>$value</li>";
  };
  $message .= "</ul>";

?>
  <html lang='en'>

  <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Php (Multiple form result) Lessons</title>
    <style>
      body {
        padding: 0 !important;
        margin: 0 !important;
        color: #5e5e5e !important;
      }

      ul,
      li {
        color: #5e5e5e !important;
      }
    </style>
  </head>

  <body style='font-size:22px;'>
    <div class='p-2 card'>
      <div class='card-body'>
        <?php
        echo  "Adınız: " . $name . "<br><br>" . "Bildiğiniz Diller: " . $message;
        ?>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="../js/app.js"></script>



  </body>

  </html>
<?php
} else {
  echo "Bu sayfayı görüntüleme yetkiniz yoktur<br>";
} ?>