<?php
//setting header to json
header('Content-Type: application/json');
require 'config.php';

$pdo_statement = $pdo->prepare("SELECT user_id,name,age FROM users ORDER BY user_id");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//now print the data
print json_encode($data);
?>