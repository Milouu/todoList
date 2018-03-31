<?php

// Connection variables
define('DB_HOST', 'localhost');
define('DB_NAME', 'todolistdb');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_PASS', '');

try{
  
  // Database connection
  $pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT, DB_USER, DB_PASS);

  // Set fetch mode to object
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(Exception $e)
{
  die('Couldn\'t connect');
}

?>