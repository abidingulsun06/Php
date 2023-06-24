<?php
session_start();
require_once "../functions/combine.php";
require_once "classes/routing.php";

$myIp = $_SERVER["REMOTE_ADDR"];
$myBrowser = $_SERVER["HTTP_USER_AGENT"];

if (isset($_SESSION['LogedIn']) && isset($_SESSION['LogedIn']) === true && $myIp == $_SESSION["LoginIP"] && $_SESSION["userAgent"] == $myBrowser) {
  $message = '<div class="alert alert-success"> Success Wellcome <span style="color:gren";>"' . $_SESSION["userName"] . '"</span></div>';
  $log = "<a href='exit.php' class='btn btn-outline-danger'>Logout</a>";
  echo '<script>document.write(document.cookie);</script>';
} else {
  routing::go("exit.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Session profile.php) Lessons</title>
  <link href="../css/main.css" rel="stylesheet">
</head>

<body class="p-2">

  <div class="card mt-3">
    <div class="card-body">
      <?php
      echo $message . $log;
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="../js/app.js"></script>
</body>

</html>