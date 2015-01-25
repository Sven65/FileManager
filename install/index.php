<?php

$file = "../includes/connection.php";
$file2 = "connection.php";

if(isset($_POST['host']) and isset($_POST['dbname']) and isset($_POST['name']) and isset($_POST['pass'])){
	$Host = $_POST['host'];
	$Dbname = $_POST['dbname'];
	$Name = $_POST['name'];
	$Pass = $_POST['pass'];

	if(empty($Pass)){
		$Pass = "";
	}

	$cont = array('<?php'."\n",
		'$host = '."'".$Host."'".';'."\n",
		'$dbname = '."'".$Dbname."'".';'."\n",
		'$name = '."'".$Name."'".';'."\n",
		'$pass = '."'".$Pass."'".';'."\n",
		'try{'."\n",
		'$pdo = new PDO("mysql:host=$host;dbname=$dbname", $name, $pass);'."\n",
		'global $pdo;'."\n",
		'}catch(PDOException $e){'."\n",
		'print "Error!: " . $e->getMessage() . "<br/>";'."\n",
		'die();'."\n",
		'}'."\n",
		'?>'
		);

	foreach($cont as $key=>$value){
		$data = implode('', $cont);
		file_put_contents($file, "$data\n");
		file_put_contents($file2, "$data\n");
	}

	header('Location: db.php');
}

?>
<html>
	<head>
		<title>FMS - Install</title>
		<link rel="stylesheet" type="text/css" href="../assets/style.css">
	</head>
	<body>
		<form action="index.php" method="POST">
			<input type="text" name="host" placeholder="Host"><br>
			<input type="text" name="dbname" placeholder="Database Name"><br>
			<input type="text" name="name" placeholder="mySQL Username"><br>
			<input type="password" name="pass" placeholder="mySQL Password"><br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>