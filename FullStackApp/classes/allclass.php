<?php
spl_autoload_register(function ($className) {
  $prefix = 'fullStackApp\\';
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
