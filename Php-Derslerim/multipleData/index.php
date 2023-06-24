<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Çoklu veri gönderme) Lessons</title>
  <link href="../css/main.css" rel="stylesheet">

</head>

<body style="font-size:18px ;">
  <?php require "../functions/safe.php"; ?>

  <div class="p-5 alert alert-info">
    <div class="row">
      <div class="col-lg-6">
        <form action="result.php" method="POST">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="name" name="firstname" class="form-control">
            <small class="text-muted">*Bu alan zorunludur</small>
          </div>

          <span>Bildiğiniz Diller: <br><br></span>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="php" name="languages[]">
            <label class="form-check-label">
              Php
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="reactjs" name="languages[]">
            <label class="form-check-label">
              React JS
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="javascript" name="languages[]">
            <label class="form-check-label">
              Javascript
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="nodejs" name="languages[]">
            <label class="form-check-label">
              Node JS
            </label>
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="java" name="languages[]">
            <label class="form-check-label">
              Java
            </label>
          </div>
          <button type="submit" class="btn btn-success d-block">Gönder</button>
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