<?php
session_start();
include_once('includes/connection.php');
if(isset($_SESSION['login'])){
	if(isset($_GET['file'])){
		$path = $_GET['path'];
		$file = $_GET['file'];
		if(isset($_GET['action'])){
			$action = $_GET['action'];
			if($action=='yes'){
				unlink($file);
				header("Location: main.php?file=$path");
			}elseif($action=='no'){
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
		<h2 class="small">Do you really want to delete <b><?php echo $file; ?></b>?</h2>
		<?php echo "<h4><a href='delete.php?file=$file&action=yes&path=$path'>Yes</a></h4>"."<h4><a href='delete.php?file=$file&action=no'>No</a></h4>" ?>
	</body>
</html>
<?php
}else{
	header('Location: main.php');
}
}else{
	header('Location: index.php');
}
?>