<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'htaylail');
define('DB_NAME', 'training_crud');

$pdoOptions = array(
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

//connection code
$pdo  = new PDO(
    'mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME,
    DB_USERNAME,
    DB_PASSWORD,
    $pdoOptions

);

?>