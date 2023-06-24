<?php

use fullStackApp\Input;
use fullStackApp\Session;
use fullStackApp\Token;
use fullStackApp\Validate;

require_once  'core/init.php';

$data = [];
$page = $_GET['mypage'];
switch ($page) {

  case 'login':
    if (Input::control("POST")) {
      if (Token::control($_POST['ufToken'])) {
        $email =  Input::security('email');
        $password = Input::security('password');
        $required = Validate::required($email, $password);
        if ($required) {
          $data['warning'] = 'Tüm alanları eksiksiz doldurun';
        } else {
          if (Validate::Min($email, 8)) {
            $data['warning'] = 'Email adresiniz en az 8 karakter olmalıdır';
          } else {
            if (Validate::Min($password, 8)) {
              $data['warning'] = 'Şifreniz en az 8 karakter olmalıdır';
            } else {
              if (Validate::Max($email, 60)) {
                $data['warning'] = 'Email adresiniz en fazla 60 karakter olmalıdır';
              } else {
                if (Validate::Max($password, 25)) {
                  $data['warning'] = 'Şifreniz en fazla 25 karakter olmalıdır';
                } else {
                  if (Validate::Email($email)) {
                    $data['warning'] = 'Email formatınız hatalıdır';
                  } else {
                    //$password = md5(md5(md5(sha1($password))));

                    $giris = $db->getRow('SELECT * FROM members where MemberEmail=? AND MemberPassword=? AND MemberDisplay=?', array($email, $password, 1));

                    if ($giris) {
                      session_regenerate_id(true);
                      Session::create('MemberID', $giris->MemberID);
                      Session::create("sID", md5(uniqid()));
                      $data['success'] = "$giris->MemberID Giriş Başarılı";
                    } else {
                      $data['danger'] = "$email $password $giris->MemberID  Kullanıcı adı yada şifre hatalı";
                    }
                  }
                }
              }
            }
          }
        }
      } else {
        $data['danger'] = "Yetkisiz Token girişi";
      } //gelen token eşitmi
    } else {
      $data['danger'] = "Yetkisiz Giriş";
    }
    echo json_encode($data);
    break;

  case 'InsertMember':

    if (Input::control("POST")) {
      $MemberName =  Input::security('MemberName');
      $MemberLastname = Input::security('MemberLastname');
      $MemberEmail = Input::security('MemberEmail');
      $MemberGender = Input::security('MemberGender');
      $MemberDisplay = Input::security('MemberDisplay');

      $add = $db->Insert(
        "INSERT INTO 
        members SET 
        MemberName=?,
        MemberLastname=?,
        MemberEmail=?,
        MemberGender=?,
        MemberDisplay=?",
        array($MemberName, $MemberLastname, $MemberEmail, $MemberGender, $MemberDisplay)
      );

      if ($add) {
        $data['success'] = 'Ekleme işlemi başarılı';
      } else {
        $data['warning'] = 'Üye Eklenirken bir hata meydana geldi';
      }
    } else {
      $data['danger'] = "Yetkisiz Giriş";
    }
    echo json_encode($data);
    break;
}
