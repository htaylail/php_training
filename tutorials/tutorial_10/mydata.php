<?php
// setting header to json
header('Content-Type: application/json');
require 'config.php';

$pdStatement = $pdo->prepare("SELECT user_id, name, age FROM users ORDER BY user_id");
$pdStatement->execute();
$result = $pdStatement->fetchAll();
// loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

// print the data
print json_encode($data);
?>