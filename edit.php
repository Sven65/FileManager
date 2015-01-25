<?php
session_start();
include_once("includes/connection.php");
	if(isset($_SESSION['login'])){
	if(isset($_GET['file'])){
		if(file_exists($_GET['file'])){
			$file = $_GET['file'];
			$content = file_get_contents($file);
			$path = $_GET['path'];
		}else{
			header('Location: main.php');
		}
		}else{
			if(isset($_POST['fileCont']) and isset($_POST['fileName'])){
				$file = $_POST['fileName'];
				$cont = $_POST['fileCont'];
				$path = $_POST['path'];
				file_put_contents($file, $cont);
				header("Location: edit.php?file=$file");
			}else{
				header('Location: main.php');
			}
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
			<div id="back" class="tool"><a href="main.php?file=<?php echo $path; ?>">&larr;Back</a></div>
			<div id="save" title="Save" class="tool" onclick="javascript:document.forms[0].submit()"></div>
		</div>
		<form action="edit.php" method="POST">
			<input type="hidden" name="path" value=<?php echo $path; ?>>
			<input type="hidden" name="fileName" id="fileName" value="<?php echo $file; ?>">
			<textarea name="fileCont"><?php echo $content ?></textarea>
		</form>
	</body>
</html>
<?php
}else{
	header('Location: index.php');
}