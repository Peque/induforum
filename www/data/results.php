<?php

	$user_number = $_SESSION['user_id'];

	require_once('../../../config.php');
	require_once('../../../data/messages.php');

	// Connect to the database
	$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

	// Check for database connection errors
	if (mysqli_connect_errno()) {

		echo $err_db_connection_error;

	}

	if (!mysqli_set_charset($db, 'utf8')) {

		echo $err_db_charset_error;

	}
// create variables

$studies=$_POST['C_studies'];
$higher_course=$_POST['C_higher_course'];
$speciality=$_POST['C_speciality'];
$english=$_POST['english'];
$french=$_POST['french'];
$italian=$_POST['italian'];
$german=$_POST['german'];
$portuguese=$_POST['portuguese'];
$russian=$_POST['russian'];
$swedish=$_POST['swedish'];
$dutch=$_POST['dutch'];
$chinese=$_POST['chinese'];
$windows=$_POST['Windows'];
$mac=$_POST['Mac'];
$linux=$_POST['Linux'];
$databases=$_POST['Databases'];
$accounting=$_POST['accounting'];
$cad=$_POST['cad'];
$graphic=$_POST['Graphic'];
$spreadsheet=$_POST['Spreadsheet'];
$email=$_POST['Email'];
$presentations=$_POST['Presentations'];
$word=$_POST['Wordprocessors'];
$programation=$_POST['Programation'];
$simulation=$_POST['Simulation'];
$communications=$_POST['Communications'];
$mathematics=$_POST['Mathematics'];
$worktime=$_POST['C_work_time']
$num_resutls=2;
for ($i=0;$i<$num_results;$i++){
	echo <tr>
			<td>
			nombre
			</td>
			<td>
			nombre
			</td>
			<td>
			nombre
			</td>
			<td>
			nombre
			</td>
			<td>
			nombre
			</td>
			</tr>;
}
			
?>
<!-- mysql> select * from students_academic_data where user in (select user from students_personal_data where name='Coloma Maria') and studies='industrialengineering';
 -->


<!--mysql>select * from students_academic_data where studies='$C_studies' AND higher_course=$C_higher_course AND speciality='$C_speciality';


mysql> select * from students_academic_data where studies='industrialengineering' AND higher_course=5 -->;
