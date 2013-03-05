<?php
 
	$user_number = $_SESSION['user_id'];
	
	require_once('../../config.php');
	require_once('../../data/messages.php');
	
	// Connect to the database
	$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
	// Check for database connection errors
	if (mysqli_connect_errno()) {

		echo $err_db_connection_error;

	}
	
	if (!mysqli_set_charset($db, 'utf8')) {

		echo $err_db_charset_error;

	}

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
	
	$worktime=$_POST['C_work_time'];
	
	$query = "select * from students_personal_data where user='".$user_number."'";
	$result = mysqli_query($db, $query); 	
		if ($result) {

			$num_results = mysqli_num_rows($result);
			
			for ($i=0; $i<$num_results; $i++) { // $num_results should be 1 in this case

				$row = mysqli_fetch_row($result);
				$user=$row[0];
				$query = "select * from students_personal_data where user='".$user."'";
				$result2=mysqli_query($db, $query);
				$personal=mysqli_fetch_row($result2);
				echo $personal[1];
			}

		}
		echo "<tr>
<td>Name</td>
<td>Surname</td>
<td>Course</td>
<td>Degree</td>
<td>CV</td>
</tr>"
			
	?>
<!-- mysql> select * from students_academic_data where user in (select user from students_personal_data where name='Coloma Maria') and studies='industrialengineering';
 -->


<!--mysql>select * from students_academic_data where studies='$C_studies' AND higher_course=$C_higher_course AND speciality='$C_speciality';


mysql> select * from students_academic_data where studies='industrialengineering' AND higher_course=5 -->
