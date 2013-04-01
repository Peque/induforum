<?php

	$user_number = $_SESSION['user_id'];
	require_once(strstr(getcwd(), '/build', 1).'/config.php');
	require_once(strstr(getcwd(), '/build', 1).'/data/messages.php');

	// Connect to the database
	$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
	// Check for database connection errors
	if (mysqli_connect_errno()) {

		echo $err_db_connection_error;

	}

	if (!mysqli_set_charset($db, 'utf8')) {

		echo $err_db_charset_error;

	}
$query = "select * from students_personal_data where user=$user";
$var = mysqli_query($db, $query);
if ($var) {
$row = mysqli_fetch_row($var);
$nombre=utf8_decode($row[1]);
$apellido=utf8_decode($row[2]);
$birth=$row[3];
$country=utf8_decode($row[4]);
$province=utf8_decode($row[5]);
$city=utf8_decode($row[6]);
$street=utf8_decode($row[7]);
$zip=$row[8];
$phone=$row[9];
$mail=utf8_decode($row[10]);
}
$query = "select * from students_academic_data where user=$user";
$var = mysqli_query($db, $query);
if ($var) {
$row = mysqli_fetch_row($var);
$studies=utf8_decode($row[1]);
$higher_course=utf8_decode($row[2]);
$speciality=$row[3];
$begin_year=utf8_decode($row[4]);
$additional_info=utf8_decode($row[5]);
}
switch ($studies) {
    case "industrialengineering":
        $studies=utf8_decode("Ingeniería Industrial");
        break;
    case "chemicalengineering":
        $studies=utf8_decode("Ingeniería Química");
        break;
    case "organizationengineering":
        $studies=utf8_decode("Ingeniería Organización Industrial");
        break;
    case "electronicengineering":
    	  $studies=utf8_decode("Ingeniería Automática");
        break;
    case "industrialtechengineering":
    	  $studies=utf8_decode("Grado en Ingeniería en Tecnologías Industriales");
        break;
    case "electricengineering":
    	  $studies=utf8_decode("Grado en Ingeniería Eléctrica");
        break;
    case "automaticengineering":
    	  $studies=utf8_decode("Grado en Ingeniería Electrónica");
        break;
    case "mechanicalengineering":
    	  $studies=utf8_decode("Grado en Ingeniería Mecánica");
        break;
    case "orgnizationgradeengineering":
    	  $studies=utf8_decode("Grado en Ingeniería de Organización");
        break;
    case "chemicalgradeengineering":
    	  $studies=utf8_decode("Grado en Ingeniería Química");
        break;
    case "energyengineering":
    	  $studies=utf8_decode("Grado en Ingeniería de la Energía");
        break;
}
switch ($speciality) {
    case "Electric":
        $speciality=utf8_decode("Eléctrica");
        break;
    case "Mechanic":
        $speciality=utf8_decode("Mecánica-Máquinas");
        break;
    case "Electronic":
        $speciality=utf8_decode("Electrónica-Automática");
        break;
    case "Construction":
    	  $speciality=utf8_decode("Mecánica-Construcción");
        break;
    case "Material":
    	  $speciality=utf8_decode("Materiales");
        break;
    case "Organization":
    	  $speciality=utf8_decode("Organización Industrial");
        break;
    case "Chemical":
    	  $speciality=utf8_decode("Química Industrial");
        break;
    case "Energetic":
    	  $speciality=utf8_decode("Técnicas Energéticas");
        break;
    case "Manufacturing":
    	  $speciality=utf8_decode("Fabricación");
        break;
        
}
$query = "select * from students_languages where user=$user";
$var = mysqli_query($db, $query);
if ($var) {
$num_results = mysqli_num_rows($var);
for ($i=0; $i<$num_results; $i++) {
	$row = mysqli_fetch_row($var);
	$language[$i]=$row[1];
	$listening[$i]=$row[2];
	$reading[$i]=$row[3];
	$spoken_production[$i]=$row[5];
	$writing[$i]=$row[6];
switch ($language[$i]) {
    case "english":
        $language[$i]=utf8_decode("Inglés");
        break;
    case "french":
        $language[$i]=utf8_decode("Francés");
        break;
    case "german":
        $language[$i]=utf8_decode("Alemán");
        break;
    case "italian":
    	  $language[$i]=utf8_decode("Italiano");
        break;
    case "portuguese":
    	  $language[$i]=utf8_decode("Portugués");
        break;
    case "russian":
    	  $language[$i]=utf8_decode("Ruso");
        break;
    case "swedish":
    	  $language[$i]=utf8_decode("Sueco");
        break;
    case "dutch":
    	  $language[$i]=utf8_decode("Holandés");
        break;
    case "chinese":
    	  $language[$i]=utf8_decode("Chino");
        break;
        
}
}
}
$query = "select * from students_computing_experience where user=$user";
$var = mysqli_query($db, $query);
if ($var) {
$row = mysqli_fetch_row($var);
$windows=$row[1];
$mac=$row[2];
$linux=$row[3];
$database=$row[4];
$finances_accounting=$row[5];
$cad=$row[6];
$graphic_design=$row[6];
$spreadsheet=$row[7];
$email=$row[8];
$math=$row[9];
$presentation=$row[10];
$word_processors=$row[11];
$programming_language=$row[12];
$simulation=$row[13];
$communication=$row[14];
}
function valor($program){
	switch ($program) {
    case 2:
        return Bajo;
        break;
    case 3:
        return Medio;
        break;
    case 4:
        return Alto;
        break;
    case 5:
    	  return Experto;
        break;
}
}
$query = "select * from students_work_experience where user=$user";
$var = mysqli_query($db, $query);
if ($var) {
$num_results1 = mysqli_num_rows($var);
for ($i=0; $i<$num_results1; $i++) {
	$row = mysqli_fetch_row($var);
	$initialdate[$i]=explode("-",utf8_decode($row[1]));
	$finaldate[$i]=explode("-",utf8_decode($row[2]));
	$company[$i]=$row[3];
	$job[$i]=utf8_decode($row[4]);
}
}
require_once(strstr(getcwd(), '/build', 1).'/data/fpdf/fpdf.php');
$pdf=new FPDF();
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Helvetica','U',20);
$pdf->Cell(40,25,'Curriculum Vitae',0,1,'L');
$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(10,20,'Datos personales',0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(50,10,'Nombre y apellidos',0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(40,10,$nombre." ".$apellido,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Año de nacimiento');
$pdf->Cell(50,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(40,10,$birth,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(50,10,'Pais',0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(40,10,$country,0,1,'L');
$pdf->SetY($pdf->GetY()+10);
$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(40,20,'Lugar de residencia y contacto',0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Dirección');
$pdf->Cell(30,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(80,10,$street,0,0,'L');
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(30,10,'Localidad',0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(60,10,$city,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(30,10,'Provincia',0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(80,10,$province,0,0,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Código Postal');
$pdf->Cell(30,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(60,10,$zip,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Móvil');
$pdf->Cell(30,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(60,10,$phone,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(30,10,'Email',0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(60,10,$mail,0,1,'L');
$pdf->SetY($pdf->GetY()+10);
$pdf->SetFont('Helvetica','B',14);
$str=utf8_decode('Formación');
$pdf->Cell(40,20,$str,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Titulación');
$pdf->Cell(30,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(100,10,$studies,0,0,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Año de inicio');
$pdf->Cell(30,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(30,10,$begin_year,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Especialidad');
$pdf->Cell(30,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(100,10,$speciality,0,0,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Curso');
$pdf->Cell(30,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(50,10,$higher_course,0,1,'L');
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',14);
$str=utf8_decode('Idiomas');
$pdf->Cell(40,20,$str,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Idioma');
$pdf->Cell(20,10,$str,0,0,'L');
$str=utf8_decode('Expresión oral');
$pdf->Cell(35,10,$str,0,0,'L');
$str=utf8_decode('Comprensión lectora');
$pdf->Cell(45,10,$str,0,0,'L');
$str=utf8_decode('Expresión escrita');
$pdf->Cell(40,10,$str,0,0,'L');
$str=utf8_decode('Comprensión auditiva');
$pdf->Cell(40,10,$str,0,1,'L');
for ($j=0;$j<$num_results; $j++) {
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(20,10,$language[$j],0,0,'L');
$pdf->Cell(35,10,$spoken_production[$j],0,0,'L');
$pdf->Cell(45,10,$reading[$j],0,0,'L');
$pdf->Cell(40,10,$writing[$j],0,0,'L');
$pdf->Cell(40,10,$listening[$j],0,1,'L');
}
$pdf->SetY($pdf->GetY()+10);

$pdf->SetFont('Helvetica','B',14);
$str=utf8_decode('Informática');
$pdf->Cell(40,20,$str,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Aplicación');
$pdf->Cell(50,10,$str,0,0,'L');
$str=utf8_decode('Nivel');
$pdf->Cell(40,10,$str,0,0,'L');
$str=utf8_decode('Aplicación');
$pdf->Cell(50,10,$str,0,0,'L');
$str=utf8_decode('Nivel');
$pdf->Cell(40,10,$str,0,1,'L');
$i=0;
if ($windows>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('SO Windows');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($windows);
$pdf->Cell(40,10,$str,0,0,'L');
$i++;
}
if ($mac>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('SO Mac');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($mac);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($linux>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('SO Linux');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($linux);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($database>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Bases de datos');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($database);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($finances_accounting>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Finanzas');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($finances_accounting);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($cad>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('CAD');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($cad);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($graphic_design>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Diseño Gráfico');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($graphic_design);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($spreadsheet>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Hojas de Cálculo');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($spreadsheet);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($email>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Email');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($email);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($math>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Matemáticas');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($math);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($presentation>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Presentaciones');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($presentation);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($word_processors>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Procesador de textos');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($word_processors);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($programming_language>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Programación');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($programming_language);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($simulation>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Simulación');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($simulation);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
if ($communication>1){
$pdf->SetFont('Helvetica','',12);
$str=utf8_decode('Redes');
$pdf->Cell(50,10,$str,0,0,'L');
$str=valor($communication);
$pdf->Cell(40,10,$str,0,$i%2,'L');
$i++;
}
$pdf->SetY($pdf->GetY()+10);
$pdf->SetFont('Helvetica','B',14);
$str=utf8_decode('Experiencia Profesional');
$pdf->Cell(40,20,$str,0,1,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Fecha Inicio');
$pdf->Cell(30,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Fecha Fin');
$pdf->Cell(30,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Empresa');
$pdf->Cell(70,10,$str,0,0,'L');
$pdf->SetFont('Helvetica','B',12);
$str=utf8_decode('Puesto');
$pdf->Cell(50,10,$str,0,1,'L');
for ($j=0;$j<$num_results1; $j++) {
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(30,10,$initialdate[$j][0]."-".$initialdate[$j][1],0,0,'L');
$pdf->Cell(30,10,$finaldate[$j][0]."-".$finaldate[$j][1],0,0,'L');
$str=utf8_decode($company[$j]);
$pdf->Cell(70,10,$str,0,0,'L');
$str=utf8_decode($job[$j]);
$pdf->Cell(50,10,$str,0,1,'L');
}





$pdf->Output();

?> 
