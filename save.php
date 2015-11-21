<?php

if(isset($_POST['textbox'])&&isset($_POST['email'])&&isset($_POST['filename'])) {
	  $a = $_POST['textbox'];
	  $filename=$_POST['filename'];
        $email = $_POST['email'];
        $path= "users/".$email;
        if(!is_dir($path)){
              mkdir($path);
            }
        $path=$path."/programs";
        if(!is_dir($path)){
              mkdir($path);
            }

        $myFile = $path."/".$filename;
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $a);
        fclose($fh);
    }

?>
