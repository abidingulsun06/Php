<?php

use sifirdanphp\db\DataBase;

require_once 'classes/allClass.php';
require_once '../functions/combine.php';
$db = new DataBase();

$operation = $_GET["page"];

switch ($operation) {
  case 'InsertMember':

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = security("MemberUsername");
      $name = security("MemberName");
      $lastname = security("MemberLastname");
      $email = security("MemberEmail");
      $pass = security("MemberPassword");
      $memberage = security("MemberAge");
      $country = security("MemberCountry");
      $birthday = security("MemberBirthday");
      $membergender = security("MemberGender");
      $confirm = security("MemberContract");
      $picture = security("myFile");
      if ($confirm != 'on') {
        $message = "Lütfen Sözleşmeyi onaylayın:::danger";
      } else {
        if (empty($username) or empty($name) or empty($lastname) or empty($email) or empty($memberage) or empty($birthday) or empty($membergender)) {
          $message = "Lütfen Boş alan bırakmayın:::warning";
        } else {
          if (($country) == null) {
            $message = "Lütfen Şehir Seçin:::warning";
          } else {
            if (strlen($username) < 3) {
              $message = "Kullanıcı adınızz 3 karakterden az olamaz:::warning";
            } else {
              if (strlen($pass) < 8) {
                $message = "Şifreniz 8 karakterden az olamaz:::warning";
              } else {
                if (strlen($username) > 40) {
                  $message = "Kullanıcı Adınız 40 karakterden fazla olamaz:::warning";
                } else {
                  if (strlen($pass) > 25) {
                    $message = "Şifreniz 25 karakterden fazla olamaz:::warning";
                  } else {
                    if (($memberage) < 1 or ($memberage) > 120) {
                      $message = "Yaşınız 1'den küçük 120'den büyük olamaz:::warning";
                    } else {
                      if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                        $message = "İsminizi doğru giriniz";
                      } else {
                        if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                          $message = "Soy İsminizi doğru giriniz:::warning";
                        } else {
                          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $message = "Eposta formatınızın doğruluğunu kontrol edin:::warning";
                          } else {
                            if (!preg_match('/^(?=.*[A-ZİĞÜÖŞÇ])(?=.*[a-zşğöıüç])(?=.*[0-9]).{8,20}/u', $pass)) {
                              $message = "Şifreniz büyük küçük harf ve sayı içermeli ve en az 8 karakterden oluşmalıdır:::warning";
                            } else {
                              $pass = md5(md5(md5(md5(sha1($pass)))));
                              $isHave = $db->getColumn("SELECT 
                              MemberID 
                              FROM members
                              Where MemberEmail=? 
                              And MemberUsername=?", array($email, $username));
                              if ($isHave) {
                                $message = "Bu kullanıcı adı ve email kullanılmaktadır:::danger";
                              } else {

                                if ($_FILES["myFile"]["name"] == '') {
                                  $message = "Kullanıcı resmini boş bırakmayın:::warning";
                                } else {
                                  $fileName = $_FILES["myFile"]["name"];
                                  $fileTmp = $_FILES["myFile"]["tmp_name"];
                                  $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                                  $newName = rand() . "_" . time() . '.' . $ext;
                                  $myPath = 'uploads/' . $newName;
                                  if (move_uploaded_file($fileTmp, $myPath)) {

                                    $add = $db->Insert("INSERT INTO members SET 
                                      MemberUsername=?,
                                      MemberName=?,
                                      MemberLastname=?,
                                      MemberEmail=?,
                                      MemberPassword=?,
                                      MemberAge=?,
                                      CityName=?,
                                      MemberBirthday=?,
                                      MemberGender=?,
                                      MemberPicture=?", array($username, $name, $lastname, $email, $pass, $memberage, $country, $birthday, $membergender, $newName));
                                    if ($add) {
                                      $message = ("Kayıt Eklendi:::success");
                                    } else {
                                      $message = "Kayıt eklenirken bir hata meydana geldi:::danger";
                                    } //Nesne ekle

                                  } //file path ekle

                                } //File check
                              } //email-username check
                            } //şifre kontrol
                          } //Email check
                        } //soyisim kontrolü
                      } //isim kontrolü
                    } //yaş kontrol
                  } //pass max 25
                } //kullanıcı adı max 40
              } //pass min 8
            } //Kullanıcı adı 3 karakter kontrol
          } //şehir kontrolü
        } //Veriler boş geçilemez kontrolü
      } //sözleşme onay check

    }
    echo $message;
    break;

  case 'SaveMember':
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $user = str_replace(' ', '', $user = security("MemberUsername"));
      $name = ConvertLetter($name = security("MemberName"), "ucwords");
      $lastname = ConvertLetter($lastname = security("MemberLastname"), "firstUpper");
      $email = str_replace(' ', '', strtolower($email = security("MemberEmail")));
      $pass = security("MemberPassword");
      $age = security("MemberAge");
      $country = security("MemberCountry");
      $birthday = security("MemberBirthday");
      $gender = security("MemberGender");
      $confirm = security("MemberContract");

      if ($confirm != 'on') {
        $message = ":::Lütfen Sözleşmeyi onaylayın:::danger";
      } else {
        if (empty($user) or empty($name) or empty($lastname) or empty($email) or empty($age) or empty($birthday) or empty($gender)) {
          $message = ":::Lütfen Boş alan bırakmayın:::warning";
        } else {
          if (($country) == null) {
            $message = ":::Lütfen Şehir Seçin:::warning";
          } else {
            if (strlen($user) < 3) {
              $message = ":::Kullanıcı adınızz 3 karakterden az olamaz:::warning";
            } else {
              if (strlen($pass) < 8) {
                $message = ":::Şifreniz 8 karakterden az olamaz:::warning";
              } else {
                if (strlen($user) > 40) {
                  $message = ":::Kullanıcı Adınız 40 karakterden fazla olamaz:::warning";
                } else {
                  if (strlen($pass) > 25) {
                    $message = ":::Şifreniz 25 karakterden fazla olamaz:::warning";
                  } else {
                    if (($age) < 1 or ($age) > 120) {
                      $message = ":::Yaşınız 1'den küçük 120'den büyük olamaz:::warning";
                    } else {
                      if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                        $message = ":::İsminizi doğru giriniz";
                      } else {
                        if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                          $message = ":::Soy İsminizi doğru giriniz:::warning";
                        } else {
                          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $message = ":::Eposta formatınızın doğruluğunu kontrol edin:::warning";
                          } else {
                            if (!preg_match('/^(?=.*[A-ZİĞÜÖŞÇ])(?=.*[a-zşğöıüç])(?=.*[0-9]).{8,20}/u', $pass)) {
                              $message = ":::Şifreniz büyük küçük harf ve sayı içermeli ve en az 8 karakterden oluşmalıdır:::warning";
                            } else {
                              $pass = md5(md5(md5(md5(sha1($pass)))));
                              $isHave = $db->getColumn("SELECT 
                                  MemberID 
                                  FROM members
                                  Where MemberEmail=? 
                                  And MemberUsername=?", array($email, $user));
                              if ($isHave) {
                                $message = ":::Bu kullanıcı adı ve email kullanılmaktadır:::danger";
                              } else {
                                $add = $db->Insert("INSERT INTO members SET 
                                          MemberUsername=?,
                                          MemberName=?,
                                          MemberLastname=?,
                                          MemberEmail=?,
                                          MemberPassword=?,
                                          MemberAge=?,
                                          CityName=?,
                                          MemberBirthday=?,
                                          MemberGender=?", array($user, $name, $lastname, $email, $pass, $age, $country, $birthday, $gender));
                                if ($add) {
                                  $myquery = $db->getRows("SELECT * FROM members");
                                  foreach ($myquery as $values) {

                                    $message .= '<tr id="' . $values->MemberID . '">
                                    <th scope="row">' . $values->MemberID . '</th>
                                    <th> ' . $values->MemberUsername  . '</th>
                                    <td> ' . $values->MemberName . '</td>
                                    <td> ' . $values->MemberLastname  . '</td>
                                    <td> ' . $values->MemberEmail . '</td>
                                    <td> ' . $values->MemberPassword . '</td>
                                    <td> ' . $values->MemberAge . '</td>
                                    <td> ' . $values->CityName . '</td>
                                    <td> ' . $values->MemberBirthday . '</td>
                                    <td> ';
                                    if ($values->MemberGender == "M") $message .= 'Erkek';
                                    else $message .= 'Kadın';
                                    $message .= '</td>

                                    <td><img style="width: 60px; border-radius: 50%;" src="uploads/' . $values->MemberPicture . '"></td>

                                    <td><a href="update.php?ID=' . $values->MemberID . '" class="btn-update"><i class="bi bi-pencil-square"></i></a></td>

                                    <td><a id="liveToastBtn" href="jacascript:void(0)" onclick="RemoveAll("DelMember","' . $values->MemberID . '")" class="delete">
                                    <i class="bi bi-trash3"></i></a></td>

                                  </tr>';
                                  }
                                  $message .= ":::Kayıt Eklendi:::success";
                                } else {
                                  $message = ":::Kayıt eklenirken bir hata meydana geldi:::danger";
                                } //Nesne ekle
                              } //email-username check
                            } //şifre kontrol
                          } //Email check
                        } //soyisim kontrolü
                      } //isim kontrolü
                    } //yaş kontrol
                  } //pass max 25
                } //kullanıcı adı max 40
              } //pass min 8
            } //Kullanıcı adı 3 karakter kontrol
          } //şehir kontrolü
        } //Veriler boş geçilemez kontrolü
      } //sözleşme onay check

    }
    echo $message;

    break;

  case 'UpdateMember':
    $ID = htmlspecialchars($_GET["ID"]);
    $members = $db->getOneRow("SELECT * FROM members WHERE MemberID=?", array($ID));
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = security("MemberUsername");
      $name = security("MemberName");
      $lastname = security("MemberLastname");
      $email = security("MemberEmail");
      $memberage = security("MemberAge");
      $country = security("MemberCountry");
      $birthday = security("MemberBirthday");
      $membergender = security("MemberGender");
      $confirm = security("MemberContract");
      if ($confirm != 'on') {
        $message = "Lütfen Sözleşmeyi onaylayın:::danger";
      } else {
        if (empty($username) or empty($name) or empty($lastname) or empty($email) or empty($memberage) or empty($birthday) or empty($membergender)) {
          $message = "Lütfen Boş alan bırakmayın:::warning";
        } else {
          if (($country) == null) {
            $message = "Lütfen Şehir Seçin:::warning";
          } else {
            if (strlen($username) < 3) {
              $message = "Kullanıcı adınızz 3 karakterden az olamaz:::warning";
            } else {
              if (strlen($username) > 40) {
                $message = "Kullanıcı Adınız 40 karakterden fazla olamaz:::warning";
              } else {
                if (($memberage) < 1 or ($memberage) > 120) {
                  $message = "Yaşınız 1'den küçük 120'den büyük olamaz:::warning";
                } else {
                  if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                    $message = "İsminizi doğru giriniz";
                  } else {
                    if (!preg_match('/^[a-zA-ZıİğĞüÜöÖşŞçÇ\s]+$/u', $name)) {
                      $message = "Soy İsminizi doğru giriniz:::warning";
                    } else {
                      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $message = "Eposta formatınızın doğruluğunu kontrol edin:::warning";
                      } else {
                        $isHave = $db->getColumn("SELECT MemberID FROM members Where MemberEmail=? And MemberUsername=? and MemberID !=?", array($email, $username, $ID));
                        if ($isHave) {
                          $message = "Bu kullanıcı adı ve email kullanılmaktadır:::danger";
                        } else {
                          $update = $db->Update("UPDATE members SET 
                                      MemberUsername=?,
                                      MemberName=?,
                                      MemberLastname=?,
                                      MemberEmail=?,
                                      MemberAge=?,
                                      CityName=?,
                                      MemberBirthday=?,
                                      MemberGender=?
                                      WHERE MemberID=?", array($username, $name, $lastname, $email, $memberage, $country, $birthday, $membergender, $ID));
                          if ($update) {
                            $message = ("Kayıt Güncellendi:::success");
                          } else {
                            $message = "Kayıt Güncellenirken bir hata meydana geldi:::danger";
                          } //Nesne Güncelle
                        } //email-username check
                      } //Email check
                    } //soyisim kontrolü
                  } //isim kontrolü
                } //yaş kontrol
              } //kullanıcı adı max 40
            } //Kullanıcı adı 3 karakter kontrol
          } //şehir kontrolü
        } //Veriler boş geçilemez kontrolü
      } //sözleşme onay check
    }
    echo $message;
    break;

  case 'DelMember':
    $ID = intval($_GET['ID']);
    $del = $db->Delete('DELETE FROM members WHERE MemberID=?', array($ID));
    if ($del) {
      $message = "Kayıt silindi:::success";
    } else {
      $message = "Kayıt silme işlemi başarısız:::danger";
    }
    echo $message;
    break;


  case 'fill':
    $ID = $_POST["myID"];
    $myOption = '';
    $myOption = "<option value='0'>ilçe seç</option>";
    $city = $db->getRows("SELECT * FROM town WHERE CityID=?", array($ID));

    foreach ($city as $items) {
      $myOption .= "<option value='$items->TownID'>" . $items->TownName . "</option>";
    }
    echo $myOption;
    break;
  case 'showRecords':
    sleep(2);
    $ID = $_POST["ID"];
    $total = $db->getColumn("SELECT COUNT(*) FROM pictures where PictureID < ? order by PictureID desc", array($ID));
    $limit = 6;
    $gallery = $db->getRows("SELECT * FROM pictures Where PictureID < ? order by PictureID desc LIMIT $limit", array($ID));

    $message .= '<div class="row justify-content-center">';
    foreach ($gallery as $values) {
      $myID = $values->PictureID;
      $message .= '<div class="col-md-3 mb-5">
        <img class="img-fluid" src="images/' . $values->PictureURL . '">
      </div>';
    }
    $message .= '</div>';
    if ($total > $limit) {
      $message .= '<div class="text-center col-12" id="BtnImage_' . $myID . '">
      <button class="btn btn-primary btn-lg btn-block px-5 show-more" type="button" id="' . $myID . '">Daha Fazla Göster</button>
    </div>';
    }
    echo $message;
    break;
  case 'CodeControl':

    $code = $_POST["code"];
    include_once  './securimage/securimage.php';
    $securimage = new Securimage();

    if ($securimage->check($code) == false) {
      $message = "güvenlik kodu hatalı:::warning";
    } else {
      $message = "Güvenlik kodu doğru:::success";
    }

    echo $message;

    break;
}
