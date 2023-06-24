<?php

use myProject\db\Database;

require_once 'theme/header.php'; ?>

<?php $db = new Database(); ?>

<div class="card my-3">
  <div class="card-body">

    <form method="POST" id="myForm">
      <div class="my-3 row">
        <label class="col-md-3 col-form-label" for="productName">Product Name:</label>
        <div class="col-md-9">
          <input type="name" class="form-control" placeholder="Enter a Product Name" name="productName" id="productName">
        </div>
      </div>

      <div class="my-3 row">
        <label class="col-md-3 col-form-label" for="supplierID">Supplier ID</label>
        <div class="col-md-9">
          <input type="number" class="form-control" name="supplierID" id="supplierID">
        </div>
      </div>

      <div class="my-3 row">
        <label class="col-md-3 col-form-label" for="categoryID">Category ID</label>
        <div class="col-md-9">
          <input type="number" class="form-control" name="categoryID" id="categoryID">
        </div>
      </div>

      <div class="my-3 row">
        <label class="col-md-3 col-form-label" for="quantityPerUnit">Quantity Per Unit</label>
        <div class="col-md-9">
          <input type="text" class="form-control" name="quantityPerUnit" id="quantityPerUnit">
        </div>
      </div>

      <div class="my-3 row">
        <label class="col-md-3 col-form-label" for="unitPrice">Unit Price</label>
        <div class="col-md-9">
          <input type="number" class="form-control" name="unitPrice" id="unitPrice">
        </div>
      </div>

      <div class="my-3 row">
        <label class="col-md-3 col-form-label" for="unitsInStock">Units In Stock</label>
        <div class="col-md-9">
          <input type="number" class="form-control" name="unitsInStock" id="unitsInStock">
        </div>
      </div>

      <div class="my-3 row">
        <label class="col-md-3 col-form-label" for="unitsOnOrder">Units On Order</label>
        <div class="col-md-9">
          <input type="number" class="form-control" name="unitsOnOrder" id="unitsOnOrder">
        </div>
      </div>

      <div class="my-3 row">
        <label class="col-md-3 col-form-label" for="reorderLevel">Reorder Level</label>
        <div class="col-md-9">
          <input type="number" class="form-control" name="reorderLevel" id="reorderLevel">
        </div>
      </div>

      <div class="my-3 row">
        <label class="col-md-3 col-form-label" for="discontinued">Discontinued</label>
        <div class="col-md-9">
          <input type="number" class="form-control" name="discontinued" id="discontinued">
        </div>
      </div>

      <div class="my-3 row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
          <div id="result"></div>
        </div>
      </div>

      <div class="my-3 row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
          <button class="btn btn-danger" type="submit" id="mysubmit" onclick="FillForm('myForm','InsertMember')">Add<span class="myload"></span></button>
        </div>
      </div>
    </form>

  </div>
</div>

<div class="card mt-3">
  <div class="card-body">

    <table class="table-responsive table-hover">
      <thead>
        <tr class="my-table">
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Supplier ID</th>
          <th>Category ID</th>
          <th>Quantity Per Unit</th>
          <th>Unit Price</th>
          <th>Units In Stock</th>
          <th>Units On Order</th>
          <th>Reorder Level</th>
          <th>Discontinued</th>
          <th>AddTime</th>
        </tr>
      </thead>


      <tbody id="tableResult">
        <?php

        $myProducts = $db->getRows("SELECT * FROM products");
        foreach ($myProducts as $items) {
        ?>
          <tr id="<?php echo $items->product_id ?>" class="my-table">
            <th scope="row"><?php echo $items->product_id ?></th>
            <th><?php echo $items->product_name ?></th>
            <th><?php echo $items->supplier_id ?></th>
            <th><?php echo $items->category_id ?></th>
            <th><?php echo $items->quantity_per_unit ?></th>
            <th><?php echo $items->unit_price ?></th>
            <th><?php echo $items->units_in_stock ?></th>
            <th><?php echo $items->units_on_order ?></th>
            <th><?php echo $items->reorder_level ?></th>
            <th><?php echo $items->discontinued ?></th>
            <th><?php echo $items->AddTime ?></th>
          </tr>

        <?php }
        ?>
      </tbody>


    </table>


  </div>
</div>


<?php require_once 'theme/footer.php'; ?>