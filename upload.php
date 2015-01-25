<?php
session_start();
include_once("includes/connection.php");
if(isset($_SESSION['login'])){
	if(isset($_GET['path'])){
		$path = $_GET['path'];
	}else{
		if(isset($_POST['path'])){
			$path = $_POST['path'];
			
				if($_FILES["file"]["error"]>0){
			  		echo "Error: " . $_FILES["file"]["error"] . "<br>";
			 	}else{
			      if(file_exists($path."/".$_FILES["file"]["name"])){
			      echo $_FILES["file"]["name"]." already exists.";
			      }else{
			      move_uploaded_file($_FILES["file"]["tmp_name"], $path."/". $_FILES["file"]["name"]);
			      echo "Stored in: ".$path."/".$_FILES["file"]["name"];
			      }
			  }
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
			<div id="back" class="tool"><a href="main.php?file=<?php echo $path ?>">&larr;Back</a></div>
		</div>
		<h4>Uploading to <?php echo $path; ?></h4>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="path" value=<?php echo $path; ?>>
			<input type="file" name="file" id="file"><br>
			<input type="submit" name="submit" value="Upload">
		</form>
	</body>
</html>
<?php
}else{
	header('Location: index.php');
}
?>