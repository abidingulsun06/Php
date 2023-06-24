<?php require_once 'pages/header.php'; ?>

<div class="card">
  <div class="card-body">
    <h1 class="text-center text-danger">Dropzone Sürükle bırak</h1>

    <form class="dropzone" id="loadfile" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="test" id="test" value="testInput">
    </form>
  </div>
</div>

<?php require_once 'pages/footer.php'; ?>