<?php
if(isset($_GET['file'])){
     $file = $_GET['path']."/".$_GET['file'];
      $type = pathinfo($file, PATHINFO_EXTENSION);
      $File = str_replace($_GET['path'], '', $file);
          header("Cache-Control: public");
          header("Content-Description: File Transfer");
          header("Content-Disposition: attachment; filename=$File");
          header("Content-Type: application/$type");
          header("Content-Transfer-Encoding: binary");
          readfile($file);
      }        
 ?>