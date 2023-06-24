<?php
session_start();
require_once "../functions/combine.php";

// $_SESSION["user"] = [
//   "username" => "AbidinGulsun06",
//   "firstname" => "Abidin",
//   "lastname" => "Gulsun",
//   "age" => "24"
// ];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Session) Lessons</title>
  <link href="../css/main.css" rel="stylesheet">
</head>

<body class="p-2">

  <div class="card mt-3">
    <div class="card-body">

      <form action="<?php echo htmlspecialchars('result.php'); ?>" method="POST">

        <div class="form-group d-flex align-items-center">
          <label>Username</label>
          <input type="text" class="form-control mx-1" name="userName">
        </div>

        <div class="form-group d-flex mt-3 align-items-center">
          <label>password:</label>
          <input type="password" class="form-control mx-1" name="password">
        </div>

        <div class="form-check my-2">
          <input class="form-check-input" type="checkbox" name="rememberMe">
          <label class="form-check-label">Beni Hatırla</label>
        </div>
        <button class="btn btn-success mt-3" type="submit">Login</button>

      </form>

    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="../js/app.js"></script>
</body>

</html>