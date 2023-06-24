<?php

use myProject\db\Database;

require_once 'classes/allClass.php';
require_once 'functions/combine.php';
$db = new Database();

$operation = $_GET["page"];

switch ($operation) {
  case 'InsertMember':
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["productName"];
      $supplierID = $_POST["supplierID"];
      $categoryID = $_POST["categoryID"];
      $quantityPerUnit = $_POST["quantityPerUnit"];
      $unitPrice = $_POST["unitPrice"];
      $unitsInStock = $_POST["unitsInStock"];
      $unitsOnOrder = $_POST["unitsOnOrder"];
      $reorderLevel = $_POST["reorderLevel"];
      $discontinued = $_POST["discontinued"];

      if (empty($name) or empty($unitPrice) or empty($categoryID)) {
        $message = ":::Lütfen Boş alan bırakmayın:::warning";
      } else {
        if (strlen($name) < 3) {
          $message = ":::Ürün Adı 3 karakterden az olamaz:::warning";
        } else {
          if (strlen($name) > 40) {
            $message = ":::Ürün Adınız 40 karakterden fazla olamaz:::warning";
          } else {
            $isHave = $db->getColumn("SELECT 
                              product_id 
                              FROM products
                              Where product_name=?", array($name));
            if ($isHave) {
              echo "Deneme";
              $message = ":::Bu ürün adı kullanılmaktadır:::danger";
            } else {
              $add = $db->Insert("INSERT INTO products SET 
                                      product_name=?,
                                      supplier_id=?,
                                      category_id=?,
                                      quantity_per_unit=?,
                                      unit_price=?,
                                      units_in_stock=?,
                                      units_on_order=?,
                                      reorder_level=?,
                                      discontinued=?", array($name, $supplierID, $categoryID, $quantityPerUnit, $unitPrice, $unitsInStock, $unitsOnOrder, $reorderLevel, $discontinued));
              if ($add) {
                $myProducts = $db->getRows("SELECT * FROM products");
                foreach ($myProducts as $items) {

                  $message .= '<tr id="' . $items->product_id . '">
                  <th scope="row">' . $items->product_id . '</th>
                  <th>' . $items->product_name . '</th>
                  <th> ' . $items->supplier_id  . '</th>
                  <th> ' . $items->category_id . '</th>
                  <th> ' . $items->quantity_per_unit  . '</th>
                  <th> ' . $items->unit_price . '</th>
                  <th> ' . $items->units_in_stock . '</th>
                  <th> ' . $items->units_on_order . '</th>
                  <th> ' . $items->reorder_level . '</th>
                  <th> ' . $items->discontinued . '</th>
                  <th> ' . $items->AddTime . '</th>
                </tr>';
                }
                $message .= ":::Kayıt Eklendi:::success";
              } else {
                $message = ":::Kayıt eklenirken bir hata meydana geldi:::danger";
              } //Nesne ekle
            } //ürün adı kontrol
          } //ürün adı adı 40 karakter kontrol
        } //Ürün Adınız 3
      } //Veriler boş geçilemez kontrolü

    }

    echo $message;
    break;
}
