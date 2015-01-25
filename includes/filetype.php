<?php
class fileType{

	public function getFileType($file){
		$type = pathinfo($file, PATHINFO_EXTENSION);
		if(!$type){
			$type = "dir";
		}
		return $type;
	}
}
?>