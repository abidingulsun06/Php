<?php require_once 'pages/header.php'; ?>


<div class="container mt-3">
  <form id="FrmAddAnn" method="POST">

    <div class="form-group">
      <label>Duyuru Başlığı</label>
      <input type="text" class="form-control" id="annTitle" name="annTitle">
    </div>

    <div class="form-group">
      <label>İçerik</label>
      <textarea class="form-control" id="content" name="content" rows="10"></textarea>
    </div>

    <button type="button" class="btn btn-success" onclick="SendForm('FrmAddAnn','InsertAnn');"><span class="myload"></span>Kaydet</button>
  </form>
</div>

<?php require_once 'pages/footer.php'; ?>