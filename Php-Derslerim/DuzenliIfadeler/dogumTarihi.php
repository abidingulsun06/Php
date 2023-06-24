<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Tarih kontrol REGEX) Lessons</title>
  <style>
    ul {
      list-style-type: none !important;
    }
  </style>
  <link href="../css/main.css" rel="stylesheet">
</head>

<?php require "../functions/safe.php"; ?>
<div class="row p-2">

  <div class="col-lg-6">
    <div class="mt-3 card">
      <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="form-group">
            <label for="">Bir cümle girin</label>
            <input type="text" class="form-control" name="myText">
            <small class="form-text text-muted">Doğ. Tar. Formatı (26.02.1998)</small>
          </div>
          <button class="btn btn-danger mt-3" type="submit">Gönder</button>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="mt-3 card">
      <div class="card-body" style="display: inline;">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $text = security($_POST['myText']);
          if (empty($text)) {
            echo '<div class="alert alert-danger mt-3" role="alert">Herhangi bir cümle girmediniz!</div>';
          } else {
            $pattern = "/^\s?\d{1,2}\.\d{1,2}\.\d{4}$/";
            $result = preg_match($pattern, $text, $takeBirth);
            if ($result == 1) {
              $smash = explode(".", $text);
              $day = (int)$smash[0];
              $mounth = (int)$smash[1];
              $year = (int)$smash[2];
              if (($day < 1) || ($day > 31)) {
                echo '<div class="alert alert-danger mt-3" role="alert">Girilen Gün 1\'den az 31\'den çok olamaz!</div>';
              } elseif (($mounth < 1) || ($mounth > 12)) {
                echo '<div class="alert alert-danger mt-3" role="alert">Girilen Ay 1\'den az 12\'den çok olamaz!</div>';
              } elseif ($year > date("Y")) {
                echo '<div class="alert alert-danger mt-3" role="alert">Girilen yıl ' . date("Y") . '\'den büyük olamaz lütfen bir önceki yılı giriniz.</div>';
              } else {
                echo '<div class="alert alert-success mt-3" role="alert">' . $takeBirth[0] . '</div>';
              }
            } else {
              echo '<div class="alert alert-danger mt-3" role="alert">Girilen Tarih Formatı Geçerli Değil</div>';
            }
          }
        }
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