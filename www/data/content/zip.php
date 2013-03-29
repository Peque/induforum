<?
function array_recibe($url_array) {
    $tmp = stripslashes($url_array);
    $tmp = urldecode($tmp);
    $tmp = unserialize($tmp);
   return $tmp;
}
$array=$_GET['array'];
echo "$array";
$array=array_recibe($array);
$zip = new ZipArchive();
$filename = "CV.zip";
$num_results=count($array); 
if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("cannot open <$filename>\n");
}
for ($i=0;$i<$num_results;$i++){
$str=strstr(getcwd(), '/build', 1).'/uploads/'.$array[$i].'.pdf';
$zip->addFile($str);
echo $str;
  
}
exit();
$zip->close();
header("Content-Type: application/zip"); 
header("Content-Disposition: attachment; filename=CV.zip"); 
readfile($filename); 
?>
