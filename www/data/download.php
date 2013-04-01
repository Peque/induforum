<?php
$user=$_GET['user'];
if (file_exists(strstr(getcwd(), '/build', 1).'/uploads/'.$user)) {
header("Content-type: application/pdf");
header('Content-Disposition: attachment; filename="' . $user . '.pdf"');readfile(strstr(getcwd(), '/build', 1).'/uploads/'.$user);
}
else {
require_once(strstr(getcwd(), '/build', 1).'/data/pdf.php');
}?>
