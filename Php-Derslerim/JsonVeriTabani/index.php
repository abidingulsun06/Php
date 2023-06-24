<?php

use sifirdanphp\db\DataBase;

require_once 'theme/header.php';
?>


<div class="card">
  <div class="card-body">
    <?php

    $db = new DataBase();

    //json Xml
    /*
        $ages = ["Abidin" => 24, "Ayşen" => 42, "Zümra" => 15];

        $jsonOBJ = '{
          "Abidin":24, 
          "Ayşen":42,
          "Zümra":15
          }';
        //json_decode bir json objesinin içindeki verileri obj->Abidin şeklinde çağırmamıza yardımcı olur  
        //Eğer true alırsa parametre json verisini bir array olarak alır
        $obj = json_decode($jsonOBJ, true);


        foreach ($obj as $key => $value) {
          echo $key . ":" . $value . "<br>";
        }

        echo json_encode($ages, JSON_UNESCAPED_UNICODE) . "<br>";

        $datas = json_decode(file_get_contents("data/test.json"), true);
        function readJson($text)
        {
        foreach ($text as $key => $value) {
        if (!is_array($value)) {
          echo $key . ":" . $value . "<br>";
        } else {
          readJson($value);
        }
        }
        }

        readJson($datas);

        libxml_use_internal_errors(true);
        $myXml = "<?xml version='1.0' encoding='UTF-8'?>
        <note>
          <to>Abidin</to>
          <from>Naciye</from>
          <heading>Hatırlatıcı</heading>
          <body>bu hafta sonu beni unutma!</body>
        </note>";


        //hatalı bir satır kodladıysak hata mesajlarını böyle çekebiliriz foreach ile
        $getxml = simplexml_load_string("note.xml");


        foreach ($getxml as $key => $value) {
          echo  $key . "=>" . $value . "<br>";
        }
        // if ($getxml === false) {
        //     echo 'Hatalar:<br>';
        //     foreach (libxml_get_errors() as  $value) {
        //       echo $value->message . "<br>";
        //     }
        //   } else {
        // }

    */

    //Veritabanı işlemleri
    /*
      //Tablo oluşturma
      //UNSIGNED verdiğimiz colon negatif değer alamaz
      $getTable = $db->TableOpertions("CREATE TABLE IF NOT EXISTS Uyeler (
      MemberID int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      MemberUsername varchar(60) NOT NULL UNIQUE KEY,
      MemberName varchar(60) NOT NULL,
      MemberLastname varchar(60) NOT NULL,
      MemberEmail varchar(90) NOT NULL UNIQUE KEY,
      MemberConfirm tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
      AddTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)
      ENGINE=InnoDB DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci");

      //members tablosu içindeki tüm verileri getirir
      //$getQuery = $db->TableOpertions("SELECT*FROM members");

      //tekli getirme SELECT MemberName,MemberLastname FROM members

      //sutuna takma isim verme SELECT MemberName as Ad FROM members

      //ID si 2den büyük 5 den kküçük olanlarını getir anlamındadır;
      //$myquery = $db->TableOpertions("SELECT*FROM members WHERE MemberID >2 and MemberID <5");

      //Parametre ile veri alma
      //$myquery = $db->getTable("SELECT*FROM members WHERE MemberID > ? and MemberID < ?", array($ID, $ID2));
      //bindparams(1,ID,int) diyerek çağırdığımı params 
      //$myquery = $db->getTable("SELECT*FROM members WHERE MemberID > ? and MemberID <= ?");

      //members tablosundan MemberConfirm =1 olanları getir
       SELECT * FROM members WHERE MemberConfirm = 1

      //members tablosundan memberconfirmi < 1 den küçük 1 tane sutunu getir
       getOneRow("SELECT * FROM members WHERE MemberConfirm < 1")

      //members tablosunda memberID si 8 olanı getirir
       $values = $db->getOneRow("SELECT * FROM members WHERE MemberID = ?", array($ID2));

      //members tablosundan MemberName colonlarını getirir yani sadece isimleri alırız
       $myquery = $db->getRows("SELECT MemberName FROM members");

      //members tablosondan MemberEmail ve MemberName colonlarını getirir
       $myquery = $db->getRows("SELECT MemberEmail,MemberName FROM members");

      //MemberEmail,MemberName colonu getir members tablosundan where id'si 7 olanı getir;
       $values = $db->getOneRow("SELECT MemberEmail,MemberName FROM members WHERE MemberID = ?", array($ID2));

      //MemberEmail,MemberName colonunu getir members tablosondan MemberName'i Abidin olanları getir
       $myquery = $db->getRows("SELECT MemberEmail,MemberName FROM members WHERE MemberName = ?", array("Abidin"));

      //memberusername colonunu getir members tablosundan memberusername'i gulsun06 olanları getir
       $myquery = $db->getColumn("SELECT MemberUsername FROM members WHERE MemberUsername = ?", array($name));

      //Tablo Kopyalama
      //Tablo içindeki verileri INSERT INTO test.people SELECT*FROM sifirdanphp.members şeklinde koyalaya biliriz

      //Sadece Tablo colonlarını kopyalayacaksak CREATE TABLE IF NOT EXISTS backupmembers LIKE members
      //NOT: tablo oluşturulmadan kod ile tablo içindeki veriler kopyalanamaz

      //Tablo ismi değiştirme RENAME TABLE kisiler to people
      // $getRename = $db->TableOpertions("RENAME TABLE kisiler to people");

      //Tablo taşıma kodları taşınırken adı da değişir
      //$getQuery = $db->TableOpertions("RENAME TABLE test.people To sifirdanphp.people");

      //DATABASE silme                                   
      //$getQuery = $db->TableOpertions("DROP DATABASE DENEME");

      //dataTABLE silme
      //$getQuery =  $db->TableOpertions("DROP TABLE messages");

      //Sutun ekle
      //Sorgunun son kısmına after colon adı vererek sonrasına ekleme komutumuzdur
      //Sorgunun son kısmına first eklersek sutun ilk başa eklenir
      //$getQuery =  $db->TableOpertions("ALTER TABLE members ADD MemberDeneme varchar(40) NOT NULL FIRST");

      //Sutun sil
      //$getQuery = $db->TableOpertions("ALTER TABLE members DROP COLUMN MemberDeneme");

      //Sutun güncelle
      //$getQuery = $db->TableOpertions("ALTER TABLE members CHANGE DENEME_STUNU varchar(40)");

      //sutun yapısını değiştir MODIFY
      //$getQuery = $db->TableOpertions("ALTER TABLE members DROP COLUMN DENEME_STUNU");

      //TABLO içindeki verilerin hepsini temizler sutunlar kalır
      //$getQuery = $db->TableOpertions("TRUNCATE TABLE members");

      //Tüm tabloları obje şeklinde listeler
      // $getQuery = $db->TableOpertions("SHOW TABLES");

      // foreach ($getQuery as  $items) {echo "<div class='alert alert-success'>" . $items->Tables_in_sifirdanphp . "</div>";}

      //Tüm tabloları array şeklinde listeler
      // $getQuery = $db->Maintenance("SHOW TABLES");
      // foreach ( $getQuery as  $value) {echo "<div class='alert alert-success'>" . $value[0] . "</div>"; }

      //Tablo içindeki stunları listeler
      // $getQuery = $db->Maintenance("SHOW COLUMNS FROM members");
      // foreach ($getQuery as $value) {
      //   echo "<div class='alert alert-success'>" . $value[0] . "</div>";}

      //PDO::FETCH_NUM ile verileri array olarak çekebiliriz

      //PDO::FETCH_ASSOC $key value olarak çalışır verileri array olarak verir

      //PDO::FETCH_BOTH $key value olarak çalışır verileri array olarak verir. fakat index değerlerinide döner yani 3 parça döner bize Key =1.index $value =1.index  key 2.index $value 3.index olarak gider 

      //PDO::FETCH_OBJECT ile verileri OBJECT olarak çekebiliriz  

      //FETCH_ASSOC  FETCH_NUM FETCH_ASSOC hemen hemen aynı mantıkta çalışır
      //Tekli veri çağırma
      $getQuery = $db->TableOpertions("SELECT*FROM members", PDO::FETCH_ASSOC);
      foreach ($getQuery as $value) {echo "Tekli veri Çağırdım:" . $value["MemberName"] . "-" . $value["MemberLastname"] . "-" . $value["MemberEmail"] . "<br><br>"; }

      //("SELECT * FROM members LIMIT 4") İLK DÖRT KAYDI GETİRİR

      //ASC YUKARIDAN AŞAĞIYA DESC AŞAĞIDAN YUKARIYA
      //("SELECT * FROM members ORDER BY MemberID DESC LIMIT 4") SON 4 KAYDI GETİRİR

      //("SELECT * FROM members ORDER BY MemberID  ASC LIMIT 1,4") 1 den başlayı 4 kayıt getir yani 2,3,4,5 gelecek

      //("SELECT * FROM members ORDER BY MemberID  ASC LIMIT ?,?", 0, 7);parametre alarak verileri 0,7 arasındakileri getirir günvenlik açığı olmasın diye limit func ile çağırıyoruz

      //("SELECT * FROM members ORDER BY MemberName DESC") isimi z-a ya sıralar 

      //"SELECT * FROM members WHERE MemberAge >24 ORDER BY MemberAge ASC" YAŞI 24 den büyük olanları küçüktek büyüğe sırala getir

      //"SELECT * FROM members WHERE MemberAge =31 or MemberAge = 42 ORDER BY MemberAge ASC" yaşı 31 ve 42 olanları getirir

      //"SELECT * FROM members WHERE MemberAge =42 or MemberName='ayşen'  ORDER BY MemberAge ASC" Yaşı 42 olup adı 'Ayşen' olanları getirir yaş sıralamasını küçükten büyüğe sıralar

      //("SELECT * FROM members WHERE MemberID IN(1,7,9,12) ") MemberID'si 1,7,9,12 olanları getiri

      //("SELECT * FROM members WHERE MemberName IN('abidin','ayşen') ") membername'i abidin ve ayşen olanları getirir

      //"SELECT * FROM members WHERE MemberAge LIKE '%3%' " MEMBERAGE İÇİNDE 3 İÇEREN YAŞLARI GETİRCEK YANİ 31 43 53 GİBİ
      //MemberName LIKE '%r%' içinde r geçen isimleri getirir
      //MemberName LIKE 'r%' " ismi r ile başlayanları getir
      //MemberName LIKE '%n' ismi ne ile bitinleri getirir

      //YAŞI 30 ile 33 arasındakileri getirir => "SELECT * FROM members WHERE MemberAge BETWEEN 30 AND 33"

      //Toplam kayıt sayısını almak için => $records = $db->getColumn("SELECT COUNT(MemberID) FROM members") 
      //echo "Toplam kayıt sayısı:  $records";

      //MİN DEĞERİ BÖYLE ALIRIZ => SELECT MIN(MemberID) FROM members 
      //MAX DEĞERİ BÖYLE ALIRIZ => SELECT MAX(MemberID) FROM members 
      //TOPLAM DEĞERİ BÖYLE ALIRIZ => SELECT SUM(MemberID) FROM members 
      //ORTALAMA DEĞERİ BÖYLE ALIRIZ => SELECT AVG(MemberID) FROM members 

      //Topluca verilerin max,min,toplam ve ortalamasını almak için sorgu böyledir...
      //SELECT MIN(MemberAge) AS 'MİNVALUE', MAX(`MemberAge`) AS 'MAXVALUE',SUM(`MemberAge`) AS 'SUMAGE',AVG(`MemberAge`) AS 'ORTALAMA' FROM members
      //atanan değişkenden veriyi çekebiliriz $degisken->db->getOneRow();
      //$degisken->MAXVALUE; GİBİ

      //MEMBERS tablosunun hepsini getirir products tablosuna join olur sonra members tablosundan memberıdyi getirir ve onun içine products tablosundan memberID'si memberid ye eşit olan verileri toplar bize tabloyu döner 
      SELECT * FROM members INNER JOIN products ON members.MemberID=products.MemberID

      //Burada ise sadece seçilen alanlarla birlikte ürünler tablosunu verir =>members.MemberID,members.MemberName,members.MemberLastname,members.MemberUsername 
      //SELECT members.MemberID,members.MemberName,members.MemberLastname,members.MemberUsername FROM members INNER JOIN products ON members.MemberID=products.MemberID

      //SELECT 
      members.MemberID,
      members.MemberName,members.MemberLastname,
      products.ProductName,products.ProductPrice 
      FROM members 
      INNER JOIN products ON members.MemberID=products.MemberID

      SELECT  
      members.MemberName,members.MemberLastname,members.MemberID,
      products.ProductID,products.MemberID,products.ProductName,products.ProductPrice 
      FROM members 
      LEFT JOIN products ON members.MemberID=products.MemberID
           
      //bu sorgu ile from kısmından sonra ilk tabloya göre verileri sıralar yani join olduğu tabloda eşleştiği key olmasa bile ilk önce Lefti değer aldığı için o değeri bize verir fakat RIGHT olarak sorguyu gerçekleştirirsek FROM'dan sonra 2.tabloyu yani products tablosunu sıralar eşleşen keyleri getirir
      
      //Bu sorgu ile aynı kolon adına sahip olup aynı numaralı idleri yada isimleri getirir 
      //SELECT * FROM members NATURAL JOIN products NATURAL JOIN comments

      //Tekrarlanan verileri getirmez mesela membarage 21 olan 2 veri varsa 1 tanesini getirir SELECT *FROM  members GROUP BY MemberAge"

      //Tekrarlanan soyisimleri getirmez ve soy isimleri a dan z ye sıralar SELECT *FROM  members GROUP BY MemberLastname order by MemberLastname asc

      //GROUP BY ile çağrılan veride where kullanılmaz onun yerine HAVING MemberID>10  kullanılır

      //!!!not büyük küçük harf dikkate alır
      //$updt = $db->Update("UPDATE products SET ProductName=REPLACE(ProductName,'Asus','MSI') where ProductID=?", array($id));
      //sorgusu ile replace edip i5 yazan yere i7 yazdıra biliriz UPDATE products SET ProductName=REPLACE(ProductName,'i5','i7')
 
      //Sorgusu ile soyadı kandaz haricindeki hepsini çeker not komutu ile SELECT*FROM members where not MemberLastname='kandaz'
 
      //Sorgusu ile null olanları yada not null olanları getirir SELECT*FROM members where MemberCountry is not null
 
      //Sorgusu ile membercountry kontrol edilir Eğer şehit verisi boşsa 'Şehir verisi yok' densin eğer varsa Else diyip 'Şehir verisi var' densin ve Bu işleme END  as ile bir isim verip koşulun sonucunu alabiliriz mesela burada MyCountry isminde tanımlanan veri bize şehir verisi varmı yokmu sonucunu dönecektir members  tablosu içinden
 
      //SELECT
      //MemberName,
      //MemberCountry,
      //CASE WHEN MemberCountry IS NULL THEN 'Şehir verisi yok'
      //ELSE 'Şehir verisi var'
      //END AS MyCountry
      //FROM members

      //Örnek
      //SELECT
      //MemberID,
      //MemberName,
      //MemberAge,
      //CASE WHEN MemberAge <= 33 THEN 'Genç yaş'
      //WHEN MemberAge >33 AND MemberAge <50 THEN 'Orta yaş'
      //ELSE 'Yaşlı'
      //END AS MyAges
      //FROM members ORDER BY MemberAge asc

      //procedure ile nesne ekle güncelle sil
      //$myInsert = $db->Insert("CALL InsertData(?,?)", array($name, $age));
      //$myUpdate = $db->Update("CALL UpdateData(?,?)", array($age, $id));
      //$myDelete = $db->Delete("CALL DeleteData(?)", array($id));

      //Sorgu ile productpricesi 1000'den büyük olanları getirir koşula göre pahalı yada ucuz gelir as rasult diyerek takma isim veririz. $myquery = $db->getRows("SELECT *,IF(ProductPrice >1000,'Pahalı','Ucuz') AS RESULT FROM products");


      //bu sorgu ile length komutu ile karakterleri sayarız mesela 15'den büyükse koşula göre veri 15 den büyük veya veri 15'den küçük koşulumuz gelir $myquery = $db->getRows("SELECT *,IF(LENGTH (ProductName) >15,'Veri 15 karakterden uzun','Veri 15 karakterden kısa') AS RESULT FROM products");

      //Sorgusu ile products içinde userıd Memberıd si eşit olan ve adı abidin olanları getirir... SELECT * FROM products WHERE UserID=(SELECT MemberID FROM members WHERE MemberName='Abidin')
    
    */

    //DataTable oluşturma
    function createTable($db)
    {
      $addDt = $db->TableOpertions("CREATE TABLE IF NOT EXISTS members (
          MemberID int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
          MemberUsername varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL UNIQUE KEY,
          MemberName varchar(60) NOT NULL,
          MemberLastname varchar(60) NOT NULL,
          MemberEmail varchar(90) NOT NULL UNIQUE KEY,
          MemberConfirm tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
          AddTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)
          ENGINE=InnoDB DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci");
      if ($addDt) {
        echo toastSuccess("Tablo eklendi işlemi başarılı");
      } else {
        echo toastError("Tablo eklenirken bir hata meydana geldi");
      }
    }

    //Veri Ekle
    function addMember($db, $par1, $par2, $par3, $par4, $par5, $par6, $par7, $par8)
    {
      $addMember = $db->Insert('INSERT INTO uyeler SET 
          MemberUsername=?,
          MemberName=?,
          MemberLastname=?,
          MemberEmail=?,
          MemberConfirm=?,
          MemberAge=?,
          MemberBirthday=?,
          MemberCountry=?
         ', $arr = array($par1, $par2, $par3, $par4, $par5, $par6, $par7, $par8));

      if ($addMember) {
        echo toastSuccess($arr[0] . " Ekleme işlemi başarılı");
      } else {
        echo toastError($arr[0] . " Ekleme işlemi başarısız");
      }
    }

    //ÜRÜN EKLE
    function addProduct($db, $par1, $par2, $par3)
    {
      $addProduct = $db->Insert('INSERT INTO comments SET 
          MemberID=?,
          ProductID=?,
          CommentMessage=?
         ', $arr = array($par1, $par2, $par3));

      if ($addProduct) {
        echo toastSuccess($arr[0] . " Ekleme işlemi başarılı");
      } else {
        echo toastError($arr[0] . " Ekleme işlemi başarısız");
      }
    }

    //COLON EKLE
    function addColumn($db)
    {
      $getQuery =  $db->TableOpertions("ALTER TABLE members ADD MemberPassword varchar(27) NOT NULL AFTER MemberEmail");

      if ($getQuery)
        echo toastSuccess("Colon ekleme başarılı");
      else
        echo toastError("Colon ekleme başarısız");
    }

    //Veri Güncelle
    function updateMember($db, $setColumn, $getColumn)
    {
      $updateMembers = $db->Update(
        'UPDATE products SET ProductName = ? WHERE ProductID = ?',
        $arr = array($setColumn, $getColumn)
      );

      if ($updateMembers) {
        echo toastSuccess($arr[0] . " Güncelleme işlemi başarılı");
      } else if ($arr[0] == $setColumn) {
        echo toastError($arr[0] . " Değeri zaten güncellenmiş");
      }
    }

    //Veri sil
    function deleteMember($db, $getID)
    {
      $deleteMember = $db->Delete('DELETE FROM uyeler WHERE MemberID=?', $arr = array($getID));

      if ($deleteMember) {
        echo toastSuccess($arr[0] . " Silme işlemi başarılı");
      } else {
        echo toastError($arr[0] . " Silme işlemi başarısız");
      }
    }

    ?>

    <!-- 
    <div class="card">
      <div class="card-body">

        <div class="alert alert-secondary">
          <p class="mt-2 text-dark">Members Tablosu</p>
        </div>

        <table class="table table-hover table-secondary table-responsive">

          <thead>
            <tr>
              <th>id</th>
              <th>Kullanıcı Adı</th>
              <th>Şifre</th>
              <th>İsim</th>
              <th>Soy İsim</th>
              <th>Email</th>
              <th>Onay</th>
              <th>Yaş</th>
              <th>Doğum Tarihi</th>
              <th>Eklenme Tarihi</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php

            $username = "Mehmet18";
            $name = "mehmet";
            $lastname = "gürsoy";
            $email = "gursoymehmet@gmail.com";
            $onay = 1;
            $yas = 39;
            $dogumtarihi = "01-01-1987";
            $country = "";

            $array = [$username, $name, $lastname, $email, $onay, $yas, $dogumtarihi, $country];
            //addMember($db, $username, $name, $lastname, $email, $onay, $yas, $dogumtarihi,$country);

            $myquery = $db->getRows("SELECT * FROM members");
            foreach ($myquery as $values) {
              $getConfirm = ($values->MemberConfirm == 1) ? '<div class="my-f1">Onaylı</div>' : '<div class="my-f2">Onay Bekliyor</div>';
              $getName = ConvertLetter($values->MemberName, "ucwords");
              $getLastname = ConvertLetter($values->MemberLastname, "firstUpper");
            ?>

              <tr>
                <th scope="row"><?php echo $values->MemberID ?></th>
                <td><?php echo $values->MemberUsername ?></td>
                <td><?php echo $values->MemberPassword ?></td>
                <td><?php echo $getName ?></td>
                <td><?php echo $getLastname ?></td>
                <td><?php echo $values->MemberEmail ?></td>
                <td><?php echo $getConfirm ?></td>
                <td><?php echo $values->MemberAge ?></td>
                <td><?php echo $values->MemberBirthday ?></td>
                <td><?php echo $values->AddTime ?></td>
                <td><button class='btn-update'><i class="fas fa-edit"></i></button></td>
                <td><button class="delete"><i class="fas fa-times"></i></button></td>
              </tr>

            <?php } ?>

          </tbody>
        </table>

      </div>
    </div>


    <div class="card my-5">
      <div class="card-body">

        <div class="alert alert-secondary">
          <p class="mt-2 text-dark">Ürünler Tablosu</p>
        </div>

        <table class="table table-hover table-secondary table-responsive">

          <thead>
            <tr>
              <th>Product ID</th>
              <th>Üye Adı</th>
              <th>Üye Soyadı</th>
              <th>Ürün Adı</th>
              <th>Ürün Fiyatı</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php
            $userıd = 2;
            $productıd = 3;
            $commentmessage = "Çokk beğendim!";

            //addProduct($db, $userıd, $productıd, $commentmessage);
            //deleteMember($db, $userıd);

            $myProducts = $db->getRows("SELECT  
            members.MemberName,
            members.MemberLastname,
            products.ProductID,
            products.ProductName,
            products.ProductPrice 
            FROM members 
            INNER JOIN products ON members.MemberID=products.UserID order by MemberName asc
           ");

            foreach ($myProducts as $values) {
              $getProductName =  ConvertLetter($values->ProductName, "ucwords");
              $MemberName =  ConvertLetter($values->MemberName, "firstUpper");
              $Lastname =  ConvertLetter($values->MemberLastname, "firstUpper");
            ?>

              <tr>
                <td scope="row"><?php echo $values->ProductID ?></td>
                <td><?php echo $MemberName ?></td>
                <td><?php echo $Lastname ?></td>
                <td><?php echo $getProductName ?></td>
                <td><?php echo $values->ProductPrice ?></td>
                <td><button class='btn-update'><i class="fas fa-edit"></i></button></td>
                <td><button class="delete"><i class="fas fa-times"></i></button></td>
              </tr>

            <?php } ?>

          </tbody>
        </table>

      </div>
    </div>


    <div class="card my-5">
      <div class="card-body">

        <div class="alert alert-secondary">
          <p class="mt-2 text-dark">Yorumlar Tablosu</p>
        </div>

        <table class="table table-hover table-secondary table-responsive">

          <thead>
            <tr>
              <th>CommentID</th>
              <th>Üye Adı</th>
              <th>Üye Soyadı</th>
              <th>Ürün Adı</th>
              <th>Ürün Fiyatı</th>
              <th>Yorum</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php
            //muamma oç
            //members.MemberName,
            // members.MemberLastname,
            // products.ProductName,
            // products.ProductPrice,
            // comments.CommentID,
            // comments.CommentMessage
            // FROM members
            // INNER JOIN products ON members.MemberID=products.UserID
            // INNER JOIN comments ON members.MemberID=comments.UserID AND
            // products.ProductID=comments.ProductID
            $myComments = $db->getRows("SELECT
            members.MemberName,
            members.MemberLastname,
            products.ProductName,
            products.ProductPrice,
            comments.CommentID,
            comments.CommentMessage
            FROM members
            INNER JOIN products ON members.MemberID=products.UserID
            INNER JOIN comments ON members.MemberID=comments.UserID AND
            products.ProductID=comments.ProductID order by MemberName asc");

            foreach ($myComments as $items) {
            ?>

              <tr>
                <td><?php echo $items->CommentID ?></td>
                <td><?php echo ConvertLetter($items->MemberName, "ucwords") ?></td>
                <td><?php echo ConvertLetter($items->MemberLastname, "ucwords")  ?></td>
                <td><?php echo $items->ProductName ?></td>
                <td><?php echo $items->ProductPrice ?></td>
                <td><?php echo $items->CommentMessage ?></td>
                <td><button class='btn-update'><i class="fas fa-edit"></i></button></td>
                <td><button class="delete"><i class="fas fa-times"></i></button></td>
              </tr>

            <?php } ?>

          </tbody>
        </table>

      </div>
    </div>
     -->


    <div class="card">
      <div class="card-body">

        <div class="alert alert-secondary">
          <p class="mt-2 text-dark">Uyeler Tablosu</p>
        </div>

        <table class="table table-hover table-secondary table-responsive">

          <thead>
            <tr>
              <th>#</th>
              <th>Üye Adı</th>
              <th>Üye Soyadı</th>
              <th>Üye Yaşı</th>
              <th>Email</th>
              <th>Şifre</th>
              <th>Memleket</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php
            //BU TRİGGER ASLINDA uyeler tablosundaki MemberID silindiği zaman yorumlar tablosuna git oradaki MemberID ye eşit olan UserID'yi sil diyoruz yani tetikliyoruz... DELETE FROM yorumlar WHERE UserID=OLD.MemberID

            $username = "Cemil06";
            $name = "Cemil";
            $lastname = "meriç";
            $email = "cemilmrc@gmail.com";
            $onay = 1;
            $yas = 39;
            $dogumtarihi = "01-01-1987";
            $country = "Ankara";

            //addMember($db, $username, $name, $lastname, $email, $onay, $yas, $dogumtarihi, $country);
            //addColumn($db);
            $myquery = $db->getRows("SELECT * FROM members");
            foreach ($myquery as $values) {
            ?>

              <tr>
                <th scope="row"><?php echo $values->MemberID ?></th>
                <td><?php echo $values->MemberName ?></td>
                <td><?php echo $values->MemberLastname ?></td>
                <td><?php echo $values->MemberAge ?></td>
                <td><?php echo $values->MemberEmail ?></td>
                <td><?php echo $values->MemberPassword ?></td>
                <td><?php echo $values->CityName ?></td>
                <td><button class='btn-update'><i class="bi bi-pencil-square"></i></button></td>
                <td><button class="delete"><i class="bi bi-trash3"></i></button></td>
              </tr>

            <?php }
            ?>

          </tbody>
        </table>

      </div>
    </div>


    <div class="card">
      <div class="card-body">

        <div class="alert alert-secondary">
          <p class="mt-2 text-dark">Yorumlar Tablosu</p>
        </div>

        <table class="table table-hover table-secondary table-responsive">

          <thead>
            <tr>
              <th>#</th>
              <th>UserID</th>
              <th>ProductID</th>
              <th>CommentMessage</th>
              <th>Açıklama</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php

            $myquery = $db->getRows("SELECT * FROM yorumlar");

            foreach ($myquery as $values) {
            ?>

              <tr>
                <th scope="row"><?php echo $values->CommentID ?></th>
                <td><?php echo $values->UserID ?></td>
                <td><?php echo $values->ProductID ?></td>
                <td><?php echo $values->CommentMessage ?></td>
                <td><?php echo $values->RESULT ?></td>
                <td><button class='btn-update'><i class="bi bi-pencil-square"></i></button></td>
                <td><button class="delete"><i class="bi bi-trash3"></i></button></td>
              </tr>

            <?php }
            ?>

          </tbody>
        </table>

      </div>
    </div>


  </div>
</div>

<?php require_once 'theme/footer.php'; ?>