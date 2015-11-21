<?php
if(isset($_POST['email'])){
	$a=$_POST['email'];
	 $path= "users/".$a;
        if(!is_dir($path)){
              mkdir($path);
            }
        $path=$path."/programs";
        if(!is_dir($path)){
              mkdir($path);
            }
$files1 = scandir($path);
echo json_encode( $files1);}
?>