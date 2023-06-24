<?php require_once 'pages/header.php'; ?>

<div class="card mt-5">
  <div class="card-body">

    <form method="POST" id="FrmPassword2">
      <input type="hidden" id="myCode" name="myCode" value="<?= $_GET['secretcode']; ?>">
      <div class="form-group">
        <label>E-posta Doğrula</label>
        <input type="Email" class="form-control" id="yourEmail" name="yourEmail">
      </div>

      <div class="form-group my-5">
        <label>Yeni Şifreniz</label>
        <input type="password" class="form-control" id="yourPassword" name="yourPassword">
      </div>

      <div class="form-group">
        <label>Şifreniz Tekrar</label>
        <input type="password" class="form-control" id="yourPassword2" name="yourPassword2">
      </div>

      <button type="button" class="btn btn-success mt-3" onclick="SendForm('FrmPassword2','RememberPass');">
        <span class="myload"></span>Kaydet
      </button>
    </form>

  </div>
</div>

<?php require_once 'pages/footer.php'; ?>