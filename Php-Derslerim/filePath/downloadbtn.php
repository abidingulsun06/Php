<?php
require_once "theme/btnheader.php";
require "../functions/combine.php";
require "varaibles/varaibles.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["download"]) && !empty($_GET["download"])) {
    $fileName = security($_GET['download']);
    $myPath = "uploads/" . $fileName;
    if (file_exists($myPath)) {
      $ext = pathinfo($fileName, PATHINFO_EXTENSION);
      header("Content-Description: File Transfer");
      header("Content-Type: application/octet-stream");
      header("Content-Disposition: attachment; filename=" . uniqid() . "." . $ext);
      header("Content-Transfer-Encoding:binary");
      header("Expires:0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Pragma: public");
      header("Content-Length:" . filesize($myPath));
      ob_clean();
      flush();
      readfile($myPath);
      $message = '<div class="alert alert-success">İndirme Başarılı...  </div>';
      exit();
    } else {
      $message = '<div class="alert alert-danger">Böyle bir dosya bulunamadı! </div>';
    }
  } else {
    $message = '<div class="alert alert-warning alert-dismissible fade show">
    <p>Bu butona basmazsanız indirme işlemi yapamazsınız!</p>
    <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
} else {
  $message = '<div class="alert alert-danger">Yetkisiz Giriş!</div>';
}
?>


<div class="card mt-3">
  <div class="card-body">

    <?php echo $message; ?>

    <a href="downloadbtn.php?download=info.txt">
      <img src="https://archive.org/download/download-png/dl.png" alt="" style="width: 100px;">
    </a>

  </div>
</div>

<?php require_once "theme/footer.php"; ?>