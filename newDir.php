<?php
session_start();
include_once('includes/connection.php');
if(isset($_SESSION['login'])){
	if(isset($_GET['path'])){
		$path = $_GET['path'];
	}else{
		header('Location: main.php');
	}
	if(isset($_GET['dirName'])){
		$dirName = $path."/".$_GET['dirName'];
		mkdir($dirName);
		header("Location: main.php?file=$dirName");
	}
?>
<html>
	<head>
		<title>FMS</title>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<link rel="stylesheet" type="text/css" href="assets/img.css">
	</head>
	<body>
		<div id="toolbar">
			<div id="back" class="tool"><a href="main.php">&larr;Back</a></div>
			<div id="save" title="Save" class="tool" onclick="javascript:document.forms[0].submit()"></div>
		</div>
		<h1>Make a new directory</h1>
		<form action="newDir.php" action="POST">
			<input type="hidden" name="path" value=<?php echo $path ?>>
			<input type="text" name="dirName" placeholder="Directory Name">
		</form>
	</body>
</html>
<?php
}else{
	header('Location: main.php');
}
?>