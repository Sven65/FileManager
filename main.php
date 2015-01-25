<?php

session_start();

include_once('includes/connection.php');

if(isset($_SESSION['login'])){
	include_once('includes/filetype.php');
	$ft = new fileType();
?>

<html>
	<head>
		<title>FMS</title>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<link rel="stylesheet" type="text/css" href="assets/img.css">
	</head>
	<body>
		<?php
			if(isset($_GET['file'])){
				if(strpos($_GET['file'], '../')){
					$path = $_GET['file'];
					$path = str_replace('../', '', $path);
				}else{
					$path = $_GET['file'];
				}
			}else{
			$path = '../';
			}
			if(is_dir($path)){
			$files = scandir($path);
			echo "<h1>Path: <b>".$path."</b></h1><br><a href='logout.php'>Logout</a> | <a href='newFile.php?path=$path'>New File</a> | <a href='newDir.php?path=$path'>New Directory</a> | <a href='upload.php?path=$path'>Upload</a><hr>";
			foreach($files as $item){
				$type = $ft->getFileType($item);
				if($type!="dir"){
					$target = "blank";
				}else{
					$target = "";
				}
				echo "<div class='p$type pitem'><span class='text'><a href='main.php?file=$path/$item' target=$target>".$item."</a></span> ";
				if($type!="dir" and $type!="zip" and $type!="gif" and $type!="ico" and $type!="png"){
					echo " &nbsp; | <span class='edit'><a href='edit.php?file=$path/$item&path=$path'>Edit</a></span> &nbsp;";
				}
					if($type!="dir"){
						echo " | <span class='del'><a href='delete.php?file=$path/$item&path=$path'>Delete</a></span> ";
						echo " | <span class='download'><a href='download.php?path=$path&file=$item'>Download</a></span> ";
						echo " | <span class='rename'><a href='rename.php?file=$path&name=$item'>Rename</a></span></div>";
					}else{
						echo "</div>";
					}
					echo "<br>";
			}
		}else{
			header("Location: $path");
		}
		?>
	</body>
</html>

<?php
}else{

	if(isset($_POST['name']) and isset($_POST['pass'])){
		$name = $_POST['name'];
		$pass = md5($_POST['pass']);

		$query = $pdo->prepare("SELECT * FROM users WHERE user_name=? AND password=?");

		$query->bindValue(1, $name);
		$query->bindValue(2, $pass);

		$query->execute();

		$num = $query->rowCount();

		if($num==1){
			$_SESSION['login'] = true;
			header('Location: main.php');
		}else{
			header('Location: index.php');
		}
	}else{
		header('Location: index.php');
	}
}
?>