<?

$array=$_POST['array'];
$array=stripslashes($array);
$array=unserialize($array);
$i=0;
$zip = new ZipArchive();
$filename=strstr(getcwd(), '/build', 1).'/uploads/CV.zip';
$num_results=count($array);
if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("Descarga fallida");
}
while($zip->deleteIndex($i)){
$i++;
}
$zip->close();
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
print_r("failed");
exit();
}
header("Content-Type: application/zip"); 
header("Content-Disposition: attachment; filename=CV.zip"); 
readfile($filename); 
?>
