<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Form Verilerini Toptan Almak) Lessons</title>
  <link href="../css/main.css" rel="stylesheet">

</head>

<body style="font-size:18px ;">
  <?php require "../functions/safe.php"; ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card mt-3">
          <div class="card-body">

            <form action="result.php" method="POST" name="firstForm">
              <div class="form-group row mb-3">
                <label class="form-label col-lg-3">Adınız</label>
                <div class="col-lg-9">
                  <input type="name" name="firstName" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="form-label  col-lg-3">Soyadınız</label>
                <div class="col-lg-9">
                  <input type="lastname" name="lastName" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="form-label  col-lg-3">E Posta Adresiniz</label>
                <div class="col-lg-9">
                  <input type="email" name="eMail" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="form-label col-lg-3">Ülkeniz</label>
                <div class="col-lg-9">
                  <input type="text" name="country" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <button type="submit" class="btn btn-danger w-25 d-block mt-3">Gönder</button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- <div class="col-lg-6">
        <div class="card mt-3">
          <div class="card-body">

            <form action="result2.php" method="POST" name="secondForm">
              <div class="form-group row mb-3">
                <label class="form-label col-lg-3">Adınız</label>
                <div class="col-lg-9">
                  <input type="name" name="firstName" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="form-label  col-lg-3">Soyadınız</label>
                <div class="col-lg-9">
                  <input type="lastname" name="lastName" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="form-label  col-lg-3">E Posta Adresiniz</label>
                <div class="col-lg-9">
                  <input type="email" name="eMail" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="form-label col-lg-3">Ülkeniz</label>
                <div class="col-lg-9">
                  <input type="text" name="country" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <button type="submit" class="btn btn-danger w-25 d-block mt-3">Gönder</button>
              </div>
            </form>

          </div>
        </div>
      </div> -->
    </div>
  </div>





  </div>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="../js/app.js"></script>
</body>

</html>