<?php


session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['company_permissions']) {
		header('Location: /en/restricted_area/');
		exit;
	}


$array=$_POST['array'];
$array=str_replace('$','"',$array)
$array=stripslashes($array);
$array=unserialize($array);
$i=0;
$filename=strstr(getcwd(), '/build', 1).'/uploads/CV.zip';
unlink($filename);
$zip = new ZipArchive();
$num_results=count($array);
if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("Descarga fallida");
}
for ($i=0;$i<$num_results;$i++){
$str=strstr(getcwd(), '/build', 1).'/uploads/'.$array[$i];
if(file_exists($str)){
$zip->addFile($str,$array[$i].'.pdf');

}
}
if($zip->close()!==true){
exit("Descarga fallida");
}
header("Content-Type: application/zip"); 
header("Content-Disposition: attachment; filename=CV.zip"); 
readfile($filename); 
?>
