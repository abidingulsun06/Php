<?php

use fullStackApp\routing;
use fullStackApp\Session;

require_once 'pages/header.php';

if (!Session::get("sID")) {
  routing::go('index.php');
} else {
?>

  <div class="row m-0 m-0">
    <div class="col-lg-2 col-md-3 p-0">
      <?php require_once 'pages/AdminNavbar.php'; ?>
    </div>

    <div class="col-lg-10 col-md-9">
      <h1>Wellcome Admin</h1>
    </div>

  </div>
<?php } ?>

<?php require_once 'pages/footer.php'; ?>