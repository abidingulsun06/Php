<?php

namespace myProject\db;

use PDO;
use PDOException;

class Database
{

  private $MYSQL_HOST = "localhost";
  private $MYSQL_USER = "root";
  private $MYSQL_PASS = "";
  private $MYSQL_DB = "sifirdanphp";
  private $CHARSET = "UTF8";
  private $COLLATION = "utf8_general_ci";
  private $pdo = null;
  private $stmt = null;

  public function getErrorMessage(PDOException $e)
  {
    return  "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
  }

  public function getSuccessMessage($par)
  {
    return  "<div class='alert alert-success'>" . $par . "</div>";
  }

  private function myQuery($query, $params = null)
  {
    if (is_null($params)) {
      $this->stmt = $this->pdo->query($query);
    } else {
      $this->stmt = $this->pdo->prepare($query);
      $this->stmt->execute($params);
    }
    return $this->stmt;
  }

  function __construct()
  {
    $this->ConnectDb();
  }

  private function ConnectDb()
  {
    $SQL = "mysql:host=" . $this->MYSQL_HOST . ";dbname=" . $this->MYSQL_DB;
    try {
      $this->pdo = new PDO($SQL, $this->MYSQL_USER, $this->MYSQL_PASS);
      $this->pdo->exec("SET NAMES '" . $this->CHARSET . "' COLLATE '" . $this->COLLATION . "'");
      $this->pdo->exec("SET CHARACTER SET '" . $this->CHARSET . "'");
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      // echo "<div class='card my-3 p-3'>";
      // echo "<div class='alert alert-success mt-3'>" . $this->MYSQL_DB . " Veritabanı bağlantısı sağlandı</div>";
      // echo "</div>";
    } catch (\PDOException $e) {
      die("PDO ile veri tabanına ulaşılamadı" . $e->getMessage());
    }
  }



  //Veritabanı oluşturma
  public function CreateDB($query)
  {
    try {
      $myDb = $this->pdo->query($query . ' CHARACTER SET ' . $this->CHARSET . ' COLLATE ' . $this->COLLATION);

      echo $this->getSuccessMessage($this->MYSQL_DB);
      return $myDb;
    } catch (PDOException $e) {
      echo $this->getErrorMessage($e);
    }
  }

  //Tablo oluşturma
  public function TableOpertions($query)
  {
    try {
      $myTable = $this->pdo->query($query);
      echo $this->getSuccessMessage("Tablo İşlemi Islem Başarılı...");
      return $myTable;
    } catch (PDOException $e) {
      echo $this->getErrorMessage($e);
    }
  }


  //tüm Veriyi çekmek için
  function getRows($query, $params = null)
  {
    try {
      return $this->myQuery($query, $params)->fetchAll();
    } catch (PDOException $e) {
      echo  $this->getErrorMessage($e);
    }
  }

  //Tek sutun çağırmak için için
  function getOneRow($query, $params = null)
  {
    try {
      return $this->myQuery($query, $params)->fetch();
    } catch (PDOException $e) {
      echo  $this->getErrorMessage($e);
    }
  }

  //Tek colon çağırmak için için
  function getColumn($query, $params = null)
  {
    try {
      return $this->myQuery($query, $params)->fetchColumn();
    } catch (PDOException $e) {
      echo  $this->getErrorMessage($e);
    }
  }

  //Kayıt ekle
  public function Insert($query, $params = null)
  {
    try {
      $this->myQuery($query, $params);
      return $this->pdo->lastInsertId();
    } catch (PDOException $e) {
      echo $this->getErrorMessage($e);
    }
  }

  //Kayıt güncelle
  public function Update($query, $params = null)
  {
    try {
      return $this->myQuery($query, $params)->rowCount();
    } catch (PDOException $e) {
      echo $this->getErrorMessage($e);
    }
  }

  //Kayıt sil
  public function Delete($query, $params = null)
  {
    return $this->Update($query, $params);
  }

  //Tablo bakımı
  public function Maintenance()
  {
    $myTable = $this->pdo->query("SHOW TABLES");
    $myTable->setFetchMode(PDO::FETCH_NUM);
    if ($myTable) {
      foreach ($myTable as  $items) {
        $check = $this->pdo->query("CHECK TABLE " . $items[0]);
        $analyze = $this->pdo->query("ANALYZE TABLE " . $items[0]);
        $repair = $this->pdo->query("REAPIR TABLE " . $items[0]);
        $optimize = $this->pdo->query("OPTIMIZE TABLE " . $items[0]);
        if ($check == true && $analyze == true && $repair == true && $optimize == true) {
          echo $items[0] . ' adlı Tablonun bakımı yapıldı<br>';
        } else {
          echo ("Bir hata oluştu");
        }
      }
    }
  }

  public function limit($query, $p1, $p2 = null)
  {
    $this->stmt = $this->pdo->prepare($query);
    $this->stmt->bindParam(1, $p1, PDO::PARAM_INT);
    if (!is_null($p2))
      $this->stmt->bindParam(2, $p2, PDO::PARAM_INT);
    $this->stmt->execute();
    return $this->stmt->fetchAll();
  }
}
