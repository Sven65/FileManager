<?php
session_start();
include_once('includes/connection.php');
if(isset($_SESSION['login'])){
	if(isset($_GET['path'])){
		$path = $_GET['path'];
	}else{
		header('Location: main.php');
	}
	if(isset($_GET['name']) and isset($_GET['content'])){
		$name = $path."/".$_GET['name'];
		$cont = $_GET['content'];
		if(file_exists($name)){
			header("Location: edit.php?file=$name");
		}else{
			file_put_contents($name, $cont);
			header("Location: main.php?file=$path");
		}
	}else{
?>
<html>
	<head>
		<title>FMS</title>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<link rel="stylesheet" type="text/css" href="assets/style.css">
	</head>
	<body>
		<div id="toolbar2">
			<div id="back" class="tool"><a href="main.php">&larr;Back</a></div>
			<div id="save" title="Save" class="tool" onclick="javascript:document.forms[0].submit()"></div>
		</div>
		<form action="newFile.php" action="post">
			<input type="hidden" name="path" value=<?php echo $path ?>>
			<input type="text" class="text1" placeholder="Filename" name="name"><br>
			<textarea name="content" placeholder="Content"></textarea>
		</form>
	</body>
</html>
<?php
}
}else{
	header('Location: index.php');
}
?>