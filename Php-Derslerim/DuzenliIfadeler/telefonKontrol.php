<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Telefon kontrol REGEX) Lessons</title>
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
          $text = $_POST['myText'];
          if (empty($text)) {
            echo '<div class="alert alert-danger mt-3" role="alert">Herhangi bir cümle girmediniz!</div>';
          } else {
            $patternNumber = "/[^\d ]/";
            if (preg_match($patternNumber, $text) == 1) {
              echo '<div class="alert alert-warning mt-3" role="alert">Lütfen sadece rakamsal veriler girin!</div>';
            } else {
              $length = preg_replace("/\s+/", "", $text);
              $length = trim($length);
              if (!(strlen($length) > 9 && strlen($length) < 12)) {
                echo '<div class="alert alert-warning mt-3" role="alert">Telefon numarası 10 veya 11 haneli olabilir</div>';
              } else {
                $pattern = "/ ?0?\s?5[0-9]{2}\s?[0-9]{3}\s?[0-9]{2}\s?[0-9]{2}\s?/";
                $result = preg_match($pattern, $text, $takeNumber);
                if ($result == 1) {
                  echo '<div class="alert alert-success mt-3" role="alert">' . $takeNumber[0] . '</div>';
                } else {
                  echo '<div class="alert alert-danger mt-3" role="alert">Girilen Metinde Telefon Numarası Mevcut Değil!</div>';
                }
              }
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