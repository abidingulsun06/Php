<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (globals) Lessons</title>
</head>

<body style="font-size:22px ;" class=" alert alert-dark">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <!-- Php form kullanma ilk ders
            <form action="globals.php" method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Text</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">şifreniz</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>

              <button type="submit" class="btn btn-success">Gönder</button> 
            </form>
             method yollarken aynı sayfa içinde methodu kullanma <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $email = $_POST['email'];
              $password = $_POST['password'];
              if (!empty($email)) {
                echo "Email: $email <br> İsim: $password";
              } else {
                echo "E posta yada Şifre boş bırakıldı";
              }
            } else {
              echo "Hatalı bir işlem yaptınız";
            }
        
        -->

      <form action="lesson.php" method="GET">
        <div class="mb-3">
          <label for="exampleInput1" class="form-label">Name</label>
          <input type="name" name="firstname" class="form-control" id="exampleInput1">
        </div>
        <div class="mb-3">
          <label for="exampleInput2" class="form-label">Last Name</label>
          <input type="password" name="lastname" class="form-control" id="exampleInput2">
        </div>

        <button type="submit" class="btn btn-success d-block">Gönder</button>


        <?php



        ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>