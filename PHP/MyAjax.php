<?php
require_once  'core/init.php';
require './js/PHPMailer-master/src/Exception.php';
require './js/PHPMailer-master/src/PHPMailer.php';
require './js/PHPMailer-master/src/SMTP.php';
require_once PATH . '/login/securimage/securimage.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use sifirdanphp\Input;
use sifirdanphp\Session;
use sifirdanphp\Token;
use sifirdanphp\Validate;

if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) != 'xmlhttprequest') {
  die("bu sayfaya giriş yetkiniz yoktur");
}

$data = [];
$page = $_GET['mypage'];
switch ($page) {

  case 'MemberDel':
    $ID = $_POST['ID'];
    $disable = 2;
    $del = $db->Update("UPDATE members SET MemberDisplay=? WHERE MemberID=?", array($disable, $ID));

    if ($del) {
      $db->myCommit();
      $data["success"] = "$ID Kayıt silindi";
    } else {
      $db->myRollBack();
      $data["danger"] = "Kayıt silme başarısız";
    }

    echo json_encode($data);
    break;

  case 'InsertAnn':

    $title = $_POST['annTitle'];
    $content = $_POST['content'];
    if (empty($title) or empty($content)) {
      $data["warning"] =  "Lütfen Boş alan bırakmayın";
    } else {
      $add = $db->Insert("INSERT INTO announcment SET AnnTitle=?,AnnContent=?", array($title, $content));
      if ($add) {
        $data["success"] = "Kayıt Eklendi";
      } else {
        $data["danger"] = "Kayıt eklenirken bir hata oluştu";
      }
    }
    echo json_encode($data);
    break;

  case 'InsertMember':

    $MemberName = $_POST['MemberName'];
    $MemberLastname = $_POST['MemberLastname'];
    $MemberEmail = $_POST['MemberEmail'];
    $MemberPassword = $_POST['MemberPassword'];
    $MemberGender = $_POST['MemberGender'];
    $MemberPicture = $_POST['MemberPicture'];
    $MemberDisplay = $_POST['MemberDisplay'];

    if (empty($MemberName) or empty($MemberLastname)) {
      $data["warning"] =  "Lütfen Boş alan bırakmayın";
    } else {
      $add = $db->Insert(
        "INSERT INTO 
        members SET 
        MemberName=?,
        MemberLastname=?,
        MemberEmail=?,
        MemberPassword=?,
        MemberGender=?,
        MemberPicture=?,
        MemberDisplay=?",
        array($MemberName, $MemberLastname, $MemberEmail, $MemberPassword, $MemberGender, $MemberPicture, $MemberDisplay)
      );
      if ($add) {
        $db->myCommit();
        $data["success"] = "Kayıt Güncellendi";
      } else {
        $db->myRollBack();
        $data["danger"] = "Kayıt Güncellenirken bir hata oluştu";
      }
    }
    echo json_encode($data);
    break;


  case 'SendContact':
    //Bu adres üzerinden kontrol edilebilir
    //https://www.codingnepalweb.com/configure-xampp-to-send-mail-from-localhost/
    //https://robocraze.com/blogs/post/send-an-html-mail-through-php-mailer-and-localhost

    //Bu adress üzerinden mail gönderen adresin şifresini ayarlamak gerekiyor 16 haneli kodu almadan mail gönderilmez 2022 versiyonda.
    //https://support.google.com/accounts/answer/185833?hl=en#:~:text=Create%20%26%20use%20App%20Passwords

    $mail = new PHPMailer(true);

    $yourName = $_POST['yourName'];
    $yourEmail = $_POST['yourEmail'];
    $yourSubject = $_POST['yourSubject'];
    $content = $_POST['content'];

    try {
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'abidingln6336@gmail.com';
      $mail->Password = 'anspubwmtehdadwm';
      $mail->SMTPSecure = 'tls';
      $mail->CharSet = "UTF-8";
      $mail->Port = 587;

      $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
        )
      );

      $mail->setFrom('abidingln6336@gmail.com', 'SenderName');
      $mail->addAddress($yourEmail);
      $mail->addReplyTo('abidingln6336@gmail.com', 'SenderName');

      $mail->isHTML(true);
      $mail->Subject = $yourSubject;
      $mail->msgHTML("<p><b>Adınız: $yourName </b></p><p><b>Epostanız: $yourEmail</b></p><p><b>Mesajınız: $content</b></p>");

      $mail->send();
      $data['success'] = 'Mesajınız iletildi';
    } catch (Exception $e) {
      $data['danger'] = "Mesajınız gönderilemedi: {$mail->ErrorInfo}";
    }
    echo json_encode($data);
    break;

  case 'ForgotPass':
    if ($_POST) {
      $yourEmail = trim($_POST['yourEmail']);
      if (empty($yourEmail)) {
        $data["warning"] = "Lütfen boş alan bırakmayın";
      } else {
        if (!filter_var($yourEmail, FILTER_VALIDATE_EMAIL)) {
          $data['warning'] = "Lütfen eposta formatını doğru giriniz";
        } else {
          $isHave = $db->getRows("SELECT MemberID from members where MemberEmail=?", array($yourEmail));
          if (empty($isHave)) {
            $data['warning'] = "Lütfen eposta adresinizi kontrol ediniz.";
          } else {
            $mail = new PHPMailer(true);
            $mycode = uniqid();
            $mylink = "http://localhost/PHP/forgotPassword/forgotPass.php?secretcode=" . $mycode;

            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'abidingln6336@gmail.com';
            $mail->Password = 'anspubwmtehdadwm';
            $mail->SMTPSecure = 'tls';
            $mail->CharSet = "UTF-8";
            $mail->Port = 587;

            $mail->SMTPOptions = array(
              'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
              )
            );

            $mail->setFrom('abidingln6336@gmail.com', 'SenderName');
            $mail->addAddress($yourEmail);
            $mail->addReplyTo('abidingln6336@gmail.com', 'SenderName');

            $mail->isHTML(true);
            $mail->Subject = "şifre talebi";
            $mail->msgHTML("<p>Yeni şifre için linke tıklayın $mylink</p>");

            if ($mail->send()) {

              $data['success'] = "Şifre Değişikliği için epostanıza gelen linke tıklayın: $yourEmail";
              $data['link'] = "https://mail.google.com/";
              $db->Update("UPDATE members SET PasswordCode=? WHERE MemberEmail=?", array($mycode, $yourEmail));
            } else {
              $data['danger'] = "Mesajınız iletilemedi {$mail->ErrorInfo}";
            }
          }
        }
      }
    }
    echo json_encode($data);
    break;

  case 'RememberPass':
    if ($_POST) {
      $yourEmail = trim($_POST['yourEmail']);
      $yourPassword = trim($_POST['yourPassword']);
      $yourPassword2 = trim($_POST['yourPassword2']);
      $code = trim($_POST['myCode']);
      if (empty($yourEmail) or empty($yourPassword) or empty($yourPassword2)) {
        $data["warning"] = "Lütfen boş alan bırakmayın";
      } else {
        if (!filter_var($yourEmail, FILTER_VALIDATE_EMAIL)) {
          $data['warning'] = "Lütfen eposta formatını doğru giriniz";
        } else {
          $isHave = $db->getRows("SELECT MemberID from members where MemberEmail=?", array($yourEmail));
          if (empty($isHave)) {
            $data['warning'] = "Lütfen eposta adresinizi kontrol ediniz.";
          } else {
            if ($yourPassword != $yourPassword2) {
              $data['warning'] = "Şifreler Uyuşmuyor";
            } else {
              $isHaveCode = $db->getColumn("SELECT PasswordCode from members where MemberEmail=? AND PasswordCode=?", array($yourEmail, $code));
              if (!$isHaveCode) {
                // $db->myRollBack();
                $data['danger'] = "Mail ile gerekli parametreler oluşmadı!";
              } else {
                // $db->myCommit();
                $yourPassword = md5(md5(md5(sha1($yourPassword))));
                $data['success'] = "Şifreniz Değiştirildi";
                $db->Update("UPDATE members SET PasswordCode=?,MemberPassword=? WHERE MemberEmail=?", array(NULL, $yourPassword, $yourEmail));
              }
            }
          }
        }
      }
    }
    echo json_encode($data);
    break;

  case 'Look':

    if (Input::control("POST")) {
      if (Token::control(Input::security("myToken"))) {
        $content = Input::security("content");
        $data['success'] = "İşlem Başarılı";
        $data['result'] = Input::security("myToken") . "<br>" . Session::get("PHPToken") . $content;
      } else {
        $data['danger'] = "Yetkisiz işlem";
      }
    }

    echo json_encode($data);
    break;

  case 'filesUp':
    $test = Input::security("name");
    if ($_FILES['myFile']['name'] != '') {
      $fileName = $_FILES['myFile']['name'];
      $fileSize = $_FILES['myFile']['size'];
      $fileTmp = $_FILES['myFile']['tmp_name'];
      $extension = pathinfo($fileName, PATHINFO_EXTENSION);
      $validExtensions = ['png', 'jpg', 'gif', 'jpeg', 'webp', 'PNG', 'JPG', 'JPEG', 'WEBP'];
      if (getimagesize($fileTmp) === false) {
        $data['warning'] = "Yüklediğiniz dosya resim değil lütfen resim formatından yükleyiniz.";
      } else {
        if (!in_array($extension, $validExtensions)) {
          $data['warning'] = "png, jpg, gif, jpeg, webp uzantıları dışında dosya yüklenemez";
        } else {
          $newName = md5(rand()) . '_' . $test . '_' . time() . '.' . $extension;
          $myPath = PATH . '/dropzone/images/' . $newName;
          if ($fileSize > 1500000) {
            $data['warning'] = "resim boyunutuz 1.5 MB'dan fazla olamaz";
          } else {
            $info = getimagesize($fileTmp);
            if ($info[0] < 250) {
              $data['warning'] = "resim genişliği 250 PX'dan az olamaz";
            } else {
              if ($info[1] < 250) {
                $data['warning'] = "resim boyu 250 PX'dan az olamaz";
              } else {
                if (move_uploaded_file($fileTmp, $myPath)) {
                  $data['success'] = "Resim yüklendi";
                } //dosya yüklendimi
              } //yükseklik kontrolü
            } //genişlik kontrolü
          } //dosya boyutu kontrolü
        } //dosya uzantı kontrolü
      } //dosya bir resimmi kontrolü
    } else {
      $data['danger'] = "Herhangi bir dosya seçmediniz";
    }

    echo json_encode($data);
    break;

  case 'filesUpMulti':
    $test = Input::security("test");
    if ($_FILES['myFile']['name'] != '') {
      $total = count($_FILES['myFile']['name']);

      for ($i = 0; $i < $total; $i++) {
        $fileName = $_FILES['myFile']['name'][$i];
        $fileSize = $_FILES['myFile']['size'][$i];
        $fileTmp = $_FILES['myFile']['tmp_name'][$i];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $validExtensions = ['png', 'jpg', 'gif', 'jpeg', 'webp', 'PNG', 'JPG', 'JPEG', 'WEBP'];
        if (getimagesize($fileTmp) === false) {
          $data['warning'] = "Yüklediğiniz dosya resim değil lütfen resim formatından yükleyiniz.";
        } else {
          if (!in_array($extension, $validExtensions)) {
            $data['warning'] = "png, jpg, gif, jpeg, webp uzantıları dışında dosya yüklenemez";
          } else {
            $newName = md5(rand()) . '_' . $test . '_' . time() . '.' . $extension;
            $myPath = PATH . '/dropzone/images/' . $newName;
            if ($fileSize > 1500000) {
              $data['warning'] = "resim boyunutuz 1.5 MB'dan fazla olamaz";
            } else {
              $info = getimagesize($fileTmp);
              if ($info[0] < 250) {
                $data['warning'] = "resim genişliği 250 PX'dan az olamaz";
              } else {
                if ($info[1] < 250) {
                  $data['warning'] = "resim boyu 250 PX'dan az olamaz";
                } else {
                  if (move_uploaded_file($fileTmp, $myPath)) {
                    $data['success'] = "Resim yüklendi";
                  } //dosya yüklendimi
                } //yükseklik kontrolü
              } //genişlik kontrolü
            } //dosya boyutu kontrolü
          } //dosya uzantı kontrolü
        } //dosya bir resimmi kontrolü
      } //for end
    } else {
      $data['danger'] = "Herhangi bir dosya seçmediniz";
    }
    echo json_encode($data);
    break;

  case 'language':
    $dil = Input::security('dil');
    Session::create("themeLang", $dil);
    break;

  case 'login':

    if (Input::control("POST")) {
      if (Token::control(Input::security('ufToken'))) {
        $email = Input::security("email");
        $password = Input::security("password");
        $code = Input::security("code");
        $required = Validate::required($email, $password, $code);
        if ($required) {
          $data['warning'] = "Tüm alanları eksiksiz doldurun";
        } else {
          if (Validate::Min($email, 8)) {
            $data['warning'] = "Eposta En az 8 karakterli olmalıdır";
          } else {
            if (Validate::Min($password, 8)) {
              $data['warning'] = "Şifre En az 8 karakterli olmalıdır";
            } else {
              if (Validate::Min($code, 6)) {
                $data['warning'] = "Doğrulama kodu En az 6 karakterli olmalıdır";
              } else {
                if (Validate::Max($email, 100)) {
                  $data['warning'] = "Eposta En fazla 100 karakterli olmalıdır";
                } else {
                  if (Validate::Max($password, 20)) {
                    $data['warning'] = "Şifre En fazla 20 karakterli olmalıdır";
                  } else {
                    if (Validate::Max($code, 6)) {
                      $data['warning'] = "Doğrulama kodu En fazla 6 karakterli olmalıdır";
                    } else {
                      $securimage = new Securimage();
                      if ($securimage->check($code) == false) {
                        $data['warning'] = "Doğrulama kodu hatalıdır.";
                      } else {
                        if (Validate::Email($email)) {
                          $data['danger'] = "Eposta Fromatı geçersizdir";
                        } else {

                          $giris = $db->getOneRow("SELECT * FROM members 
                          where MemberEmail=? and MemberPassword=? and MemberDisplay=?", array($email, $password, 1));
                          if ($giris) {
                            session_regenerate_id(true);
                            Session::create('MemberID', $giris->MemberID);
                            Session::create("sID", md5(uniqid()));
                            $db->myCommit();
                            $data['success'] = "Giriş Başarılı";
                          } else {
                            $db->myRollBack();
                            $data['danger'] = "Email Veya şifre hatalı";
                          }
                        } //eposta format kontrolü
                      } //doğrulama kodu kontrolü
                    } //güvenlik kodu max 6 hane 
                  } //şifre en fazla 20 hane
                } //eposta en fazla 100 hane
              } //doğrulama kodu en az 6 hane
            } //şifre en az 8 hane 
          } //email en faz 8 hane
        } //alanlar boşmu dolumu
      } else {
        $data['danger'] = "Yetkisiz Token girişi";
      } //gelen token eşitmi
    } else {
      $data['danger'] = "Yetkisiz Giriş";
    }

    echo json_encode($data);
    break;

  case 'sort':
    $list = $_POST['list'];
    $output = array();
    parse_str($list, $output);
    $result = $output['order'];

    foreach ($result as $key => $value) {
      $db->Update("UPDATE menu_tr SET
                  MenuOrder=?
                  WHERE MenuID=?", array($key + 1, $value));
    }
    $list = $db->getRows("SELECT * FROM menu_tr ORDER BY MenuOrder ASC");
    $send = '';
    foreach ($list as $items) {
      $send .= '<tr id="order-' . $items->MenuID . '">
                <td scope="row">' . $items->MenuOrder . '</th>
                <td>' . $items->MenuName . ' </td>
               </tr>';
    }
    echo $send;
    $db->myCommit();

    break;


  default:
    break;
}
