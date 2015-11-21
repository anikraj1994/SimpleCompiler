<?php

  if(isset($_POST['textbox'])&&isset($_POST['email'])&&isset($_POST['input'])) { //only do file operations when appropriate
        $a = $_POST['textbox'];
        $i=$_POST['input'];
        $email = $_POST['email'];
        $path= "users/".$email;
        if(!is_dir($path)){
              mkdir($path);
            }


            $fileArray = array(
                $path."/temp.c",
                $path."/tempe.txt",
                $path."/tempr.txt",
                $path."/a.out"
            );

            foreach ($fileArray as $value) {
                if (file_exists($value)) {
                    unlink($value);
                } else {
                    // code when file not found
                }
            }







        $myFile = $path."/temp.c";
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $a);
        fclose($fh);
        $myFile = $path."/tempi.txt";
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $i);
        fclose($fh);

$err=call("gcc temp.c","users/".$email."/");
//echo shell_exec("hello2");
//echo passthru("hello2");
//exec($path.'/./a.out',$output,$rv);
$output=execi('./a.out',"users/".$email."/",0.1);

$b = $output;

 $myFile = $path."/tempr.txt";
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $b);
        fclose($fh);
$e = $err;

 $myFile = $path."/tempe.txt";
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $e);
        fclose($fh);
}



function call($cmd,$userdir){
$descriptorspec = array(
    0 => array("pipe", "r"), // STDIN
    1 => array("pipe", "w"), // STDOUT
    2 => array("pipe", "w"), // STDERR
);
$cwd = getcwd()."/".$userdir;
$env = null;
$output="";
$proc = proc_open($cmd, $descriptorspec, $pipes, $cwd, $env);
if (is_resource($proc)) {
    $output=$output."<pre>".stream_get_contents($pipes[1])."</pre>";
    
    $output=$output."<pre>".stream_get_contents($pipes[2])."</pre>";
    $return_value = proc_close($proc);
    $output=$output. "Exited with status: {$return_value}";
    return $output;
}}
function execi($cmd,$userdir,$timeout){ $starttime = microtime();
$descriptorspec = array(
    0 => array("pipe", "r"), // STDIN
    1 => array("pipe", "w"), // STDOUT
    2 => array("pipe", "w"), // STDERR
);
$cwd = getcwd()."/".$userdir;
$env = null;
$output="";
$proc = proc_open($cmd, $descriptorspec, $pipes, $cwd, $env);
 $handle = fopen($userdir."tempi.txt", "r");
    if ($handle) {
    while (($line = fgets($handle)) !== false) {
        fwrite($pipes[0],$line);
        
    }
        fclose($pipes[0]);
    fclose($handle);
} 
 while(microtime() < $starttime + $timeout) //until the current time is greater than our start time, plus the timeout
    {
        $status = proc_get_status($proc);
        if($status['running']){
            if (is_resource($proc)) {
              $output=$output."<pre>".stream_get_contents($pipes[1])."</pre>";
               $output=$output."<pre>".stream_get_contents($pipes[2])."</pre>";
           }}
        else{
            $time =microtime()-$starttime;
                       return $output."  time to execute = ".$time; //command completed :)

        }
    }
    proc_terminate($proc);
    return 'timeout !!';
    // fwrite($pipes[0], '10');
  //  fclose($pipes[0]);

   
   // $return_value = proc_close($proc);
    
}
//print_r($results)
?>