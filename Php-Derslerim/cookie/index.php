<?php
$dbPass = "827ccb0eea8a706c4c34a16891f84e7b";
$dbUser = "php";
require "../functions/safe.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = security($_POST['userName']);
  $password = md5(security($_POST['password']));
  $remember = $_POST['rememberMe'];
  if (isset($remember)) {
    $myTime = time() + (60 * 60);
    $myCookie1 = setcookie("username", $username, $myTime, "/", null, null, true);
    $myCookie2 = setcookie("password", $password, $myTime,  "/", null, null, true);
    if (($myCookie1 == true) && ($myCookie2 == true)) {
      $message = '<div class="alert alert-success mt-3" role="alert">Cookie sorunsuz oluşturuldu!</div>';
    } else {
      $message = '<div class="alert alert-warning mt-3" role="alert">Cookie oluşturulurken bir hata meydana geldi!</div>';
    }
  } else {
    $message = '<div class="alert alert-danger mt-3" role="alert">Lütfen Cookie oluşturmaya izin verin!</div>';
  }
  //cookie silme
  if (isset($_POST["deleteCookie"])) {
    setcookie("username", " ", time() - 60, "/");
    setcookie("password", " ", time() - 360, "/");
    $message = '<div class="alert alert-info mt-3" role="alert">Cookie sorunsuz silindi!</div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Cookie) Lessons</title>
  <link href="../css/main.css" rel="stylesheet">
</head>

<body class="p-2">

  <div class="card mt-3">
    <div class="card-body">
      <?php
      if ($dbPass == $_COOKIE["password"] && $dbUser == $_COOKIE["username"]) {
        echo '<div class="alert alert-warning mt-3" role="alert">Hoşgeldiniz (' . $_COOKIE["username"] . ')</div>';
      } else {
      ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

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
          <button class="btn btn-success mt-3" type="submit">Cookie</button>
          <button class="btn btn-danger mt-3" type="submit" name="deleteCookie">Cookie Delete</button>
        </form>
      <?php } ?>


    </div>
  </div>

  <div class="card mt-3">
    <div class="card-body">
      <?php
      if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        echo '<div class="alert alert-success mt-3" role="alert">';
        foreach ($_COOKIE as $key => $value) {
          echo $key . ": " . $value . "<br>";
        }
        echo  "</div>";
      } else {
        echo '<div class="alert alert-warning mt-3" role="alert">Herhangi bir cookie oluşturmadınız!</div>';
      }
      echo $message;
      echo $myMessage;
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="../js/app.js"></script>
</body>

</html>