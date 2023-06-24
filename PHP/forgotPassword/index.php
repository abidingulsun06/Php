<?php require_once 'pages/header.php'; ?>

<div class="card mt-5">
  <div class="card-body">

    <form method="POST" id="FrmPassword">

      <div class="form-group">
        <label>E-posta Adresiniz</label>
        <input type="Email" class="form-control" id="yourEmail" name="yourEmail">
      </div>
      <div class="form-group">
        <div class="mylink"></div>
      </div>
      <button type="button" class="btn btn-success mt-3" onclick="SendForm('FrmPassword','ForgotPass');">
        <span class="myload"></span>Kaydet
      </button>
    </form>

  </div>
</div>

<?php require_once 'pages/footer.php'; ?>