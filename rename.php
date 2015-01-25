<?php
session_start();
include_once('includes/connection.php');
if(isset($_SESSION['login'])){
	if(isset($_GET['file']) and isset($_GET['name'])){
		$path = $_GET['file'];
		$name = $path.$_GET['name'];
	}else{
		if(isset($_POST['newName']) and isset($_POST['file']) and isset($_POST['path'])){
			$newName = $_POST['path'].$_POST['newName'];
			$oldName = $_POST['file'];
			rename($oldName, $newName);
			header('Location: main.php');
		}
	}
?>
<html>
	<head>
		<title>FMS</title>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
	</head>
	<body>
		<div id="toolbar">
			<div class="back"><a href="main.php">&larr;Back</a></div>
		</div>
		Renaming <b><?php echo $name ?></b>
		<form action="rename.php" method="POST">
			<input type="hidden" name="file" value=<?php echo $name ?>>
			<input type="hidden" name="path" value=<?php echo $path ?>>
			<input type="text" name="newName" placeholder="New Name">
			<input type="submit" value="Submit">
		</form>
	</body>
</html>
<?php
}else{
	header('Location: index.php');
}
?>