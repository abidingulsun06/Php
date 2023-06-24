<?php require_once 'pages/header.php'; ?>


<div class="container mt-3">
  <form id="FrmContact" method="POST">

    <div class="form-group">
      <label>Adınız</label>
      <input type="name" class="form-control" id="yourName" name="yourName">
    </div>

    <div class="form-group">
      <label>Epostanız</label>
      <input type="Email" class="form-control" id="yourEmail" name="yourEmail">
    </div>

    <div class="form-group">
      <label>Konu</label>
      <input type="text" class="form-control" id="yourSubject" name="yourSubject">
    </div>

    <div class="form-group">
      <label>Mesajınız</label>
      <textarea type="text" class="form-control" id="content" name="content" rows="10"></textarea>
    </div>

    <button type="button" class="btn btn-success" onclick="SendForm('FrmContact','SendContact');"><span class="myload"></span>Kaydet</button>
  </form>
</div>

<?php require_once 'pages/footer.php';
