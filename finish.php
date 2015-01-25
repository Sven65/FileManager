<?php

function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

deleteDir('install');

?>
<html>
	<head>
		<title>FMS - Install</title>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
	</head>
	<body>
		<h1>Congratulations! You are done with the installation!</h1>
		You can now go to your FMS installation folder and login.
	</body>
</html>
