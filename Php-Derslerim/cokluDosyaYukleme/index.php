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
  <?php require "../functions/safe.php"; ?>
  <div class="p-5 alert alert-info">
    <div class="row">
      <div class="col-lg-6">
        <form action="<?= htmlspecialchars('result.php'); ?>" enctype="multipart/form-data" method="POST">
          <div class="mb-3">
            <input class="form-control" type="file" name="myFile[]" multiple>
          </div>
          <button type="submit" class="btn btn-success d-block" name="control">Gönder</button>
        </form>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="../js/app.js"></script>
</body>

</html>