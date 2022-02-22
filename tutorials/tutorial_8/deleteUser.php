<?php

require 'config.php';
$pdo_statement = $pdo->prepare("DELETE FROM users WHERE user_id = ".$_GET['user_id']);
$pdo_statement->execute();

header('Location:index.php');

?>