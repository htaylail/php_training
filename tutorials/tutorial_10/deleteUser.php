<?php

require 'config.php';
$pdoStatement = $pdo->prepare("DELETE FROM users WHERE user_id = " . $_GET['user_id']);
$pdoStatement->execute();

header('Location:index.php');
?>