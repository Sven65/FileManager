<?php
$host = 'localhost';
$dbname = 'fms2';
$name = 'root';
$pass = '';
try{
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $name, $pass);
global $pdo;
}catch(PDOException $e){
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>
