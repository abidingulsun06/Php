<?php
//Not: Namespace verilirken klasör adı ve namespace yol adı aynı olmalırıdır 
spl_autoload_register(function ($className) {
  $prefix = 'sifirdanphp\\';
  $base_dir = __DIR__ . "/";
  $length = strlen($prefix);
  if (strncmp($prefix, $className, $length) !== 0) {
    return;
  }
  $className = strtolower($className);
  $relative_class = substr($className, $length);
  $path = $base_dir . str_replace("\\", "/", $relative_class) . ".class.php";
  if (file_exists($path)) {
    require_once $path;
  } else {
    echo '<div class="mt-2 alert alert-danger">Belirtilen dizinde dosya mevcut değil</div>';
  }
});

//namespace sifirdanphp\meyve\fruit();


/*
  //spl_autoload_register ile .class isimlerini çekeriz
  //__DIR__Dizini bulur ve classları alır
  spl_autoload_register(function ($class) {
  //.class kullanmamız tercihtir kod değildir istersek .php ile bitirip classları o şekildede çağırabiliriz
  $path = __DIR__ . "/" . strtolower($class)  . ".class.php";
  if (file_exists($path)) {
    require_once $path;
  } else {
    echo '<div class="mt-2 alert alert-danger">Belirtilen dizinde dosya mevcut değil</div>';
  }
  });
*/
