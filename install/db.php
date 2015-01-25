<?php
include_once('connection.php');

global $dbname;

$query = $pdo->prepare("CREATE DATABASE $dbname");

$query->execute();

header('Location: table.php');
?>