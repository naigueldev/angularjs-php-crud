<?php
  define('BASE_PATH', 'http://localhost/angularjs-php-crud/webservices');
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'angularjscrud');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');

  $con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if(mysqli_connect_errno()){
    echo('Failed to connect'.mysqli_connect_error());
    exit();
  }
?>
