<?php
include_once('../includes/connection.php');

$query = $pdo->prepare("CREATE TABLE users(id INT AUTO_INCREMENT PRIMARY KEY, user_name VARCHAR(255), password VARCHAR(255))");
	
$query->execute();

header('Location: user.php');

?>