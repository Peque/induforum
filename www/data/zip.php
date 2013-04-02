<?php

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

$filename=strstr(getcwd(), '/build', 1).'/uploads/CV.zip';
unlink($filename);
$array2=$_SESSION['array2'];
$number_results=count($array2);
for ($i=0;$i<$number_results;$i++){
	$path=strstr(getcwd(), '/build', 1).'/uploads/'.$array2[$i];
	if(!(file_exists($path))){
		$user=$array2[$i];
		require_once(strstr(getcwd(), '/build', 1).'/data/pdf.php');
		$pdf->Output($path.'.pdf','F');
	}
}
$zip = new ZipArchive();

if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("Descarga fallida");
}
for ($i=0;$i<$number_results;$i++){
	$str=strstr(getcwd(), '/build', 1).'/uploads/'.$array2[$i];
	if(file_exists($str)){
		$zip->addFile($str,$array2[$i].'.pdf');

	}elseif(file_exists($str.'.pdf')){
		$zip->addFile($str.'.pdf',$array2[$i].'.pdf');
	}
}
if($zip->close()!==true){
exit("Descarga fallida");
}
for ($i=0;$i<$number_results;$i++){
	$path=strstr(getcwd(), '/build', 1).'/uploads/'.$array2[$i];
	if(file_exists($path.'.pdf')){
		unlink($path.'.pdf');
	}
}
header("Content-Type: application/zip");
header("Content-Disposition: attachment; filename=CV.zip");
readfile($filename);
?>
