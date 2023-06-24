<?php

namespace sifirdanphp\db;

use Exception;
use PDO;
use PDOException;

class db
{
  private $MYSQL_HOST = 'localhost';
  private $MYSQL_USER = 'root';
  private $MYSQL_PASS = '';
  private $MYSQL_DB;
  private $stmt = null;
  /* 
    çoklu veri tabanı bağlantısı
    private $MYSQL_DB2 = 'kongre';
    $SQL2 = "mysql:host=" . $this->MYSQL_HOST . ";dbname=" . $this->MYSQL_DB2;
    $this->pdo = new PDO($SQL2, $this->MYSQL_USER, $this->MYSQL_PASS);
  */
  private $CHARSET = "UTF8";
  private $COLLATION = "utf8_general_ci";
  private $pdo = null;

  private function ConnectDb()
  {
    $this->SetMyDb('sifirdanphp');
    $SQL = "mysql:host=" . $this->MYSQL_HOST . ";dbname=" . $this->getMyDb();
    //$SQL = "mysql:host=" . $this->MYSQL_HOST;
    try {
      $this->pdo = new PDO($SQL, $this->MYSQL_USER, $this->MYSQL_PASS);
      $this->pdo->exec("SET NAMES '" . $this->CHARSET . "' COLLATE '" . $this->COLLATION . "'");
      $this->pdo->exec("SET CHARACTER SET '" . $this->CHARSET . "'");
      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
      echo "<div class='alert alert-success'>" . $this->getMyDb() . " Veritabanı bağlantısı sağlandı</div>";
    } catch (PDOException $e) {
      die("Pdo ile veri tabanına ulaşılamadı:" . $e->getMessage());
    }
  }

  public function __construct()
  {
    $this->ConnectDb();
  }

  function getTable($query)
  {
    //   if (is_null($params)) {
    //     $this->stmt = $this->pdo->query($query);
    //   }
    // } else {
    $this->stmt = $this->pdo->prepare($query);
    return $this->stmt;
  }



  //Veritabanı oluşturma
  public function CreateDB($query)
  {
    try {
      $myDb = $this->pdo->query($query . ' CHARACTER SET ' . $this->CHARSET . ' COLLATE ' . $this->COLLATION);

      echo "<div class='alert alert-success'>" . $this->MYSQL_DB . " Veritabanı başarı ile oluşturuldu.</div>";

      return $myDb;
    } catch (Exception $e) {
      $e = "<div class='alert alert-danger'>" . $this->getMyDb() . " veritabanı zaten mevcut! Yada veritabanı adı girilmedi!</div>";
      echo $e;
    }
  }

  //Tablo oluşturma
  public function TableOpertions($query)
  {
    try {
      $myTable = $this->pdo->query($query);
      echo "<div class='alert alert-success'>Tablo işlemi başarılı SİLİNDİ,GÜNCELLENDİ,ADI DEĞİŞTİRİLDİ,BİR BAŞKA VERİTABANINA TAŞINDI YENİ TABLO YADA VERİTABANI OLUŞTURULDU.</div>";

      return $myTable;
    } catch (PDOException $e) {
      echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    }
  }

  public function Maintenance($query)
  {
    $myTable = $this->pdo->query($query);
    $myTable->setFetchMode(PDO::FETCH_NUM);
    return $myTable;
  }



  public function SetMyDb($MYSQL_DB)
  {
    $this->MYSQL_DB = $MYSQL_DB;
  }

  public function getMyDb()
  {
    return $this->MYSQL_DB;
  }

  public function __destruct()
  {
    $this->pdo = null;
  }
}
