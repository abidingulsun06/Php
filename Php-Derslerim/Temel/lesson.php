<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (lesson) Lessons</title>
</head>

<body style="font-size:22px ;">
  <div class="alert alert-white">
    <div class="p-5">
      <?php

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        if (!empty($firstname) || !empty($lastname)) {
          echo '<div class="alert alert-info">Ad: ' . $firstname . '<br>Soyad: ' . $lastname . '</div>';
        } else {
          echo '<div class="alert alert-warning">İsim alanını boş bıraktınız </div>';
        }
      } else {
        echo  '<div class="alert alert-danger">Hatalı bir işlem yaptınız</div>';
      }


      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>