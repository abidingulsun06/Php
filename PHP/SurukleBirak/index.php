<?php require_once 'pages/header.php'; ?>



<div class="card">
  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <td>Menu Sort</td>
            <td>Menu Name</td>
          </tr>
        </thead>
        <tbody class="sortable" id="result">
          <?php $list = $db->getRows("SELECT * FROM menu_tr ORDER BY MenuOrder ASC");
          foreach ($list as $items) {
          ?>

            <tr id="order-<?= $items->MenuID; ?>">
              <td scope="row"><?= $items->MenuOrder; ?></th>
              <td><?= $items->MenuName; ?></td>
            </tr>

          <?php } ?>

        </tbody>
      </table>
    </div>

  </div>
</div>


<?php require_once 'pages/footer.php'; ?>