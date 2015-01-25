<?php

include_once('../includes/connection.php');

if(isset($_POST['name']) and isset($_POST['pass'])){
	$name = $_POST['name'];
	$pass = md5($_POST['pass']);
	$query = $pdo->prepare("INSERT INTO users(user_name, password) VALUES(?,?)");

	$query->bindValue(1, $name);
	$query->bindValue(2, $pass);

	if($query->execute()){
		header('Location: ../finish.php');
	}
}

?>
<html>
	<head>
		<title>FMS - Install</title>
		<link rel="stylesheet" type="text/css" href="../assets/style.css">
	</head>
	<body>
		<h2>Enter your prefered login details:</h2>
		<form action="user.php" method="POST">
			<input type="text" name="name" placeholder="Username"><br>
			<input type="password" name="pass" placeholder="Password"><br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>