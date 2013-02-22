<?php

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

$C_studies=$_POST['C_stuedies'];
$C_higher_course=$_POST['C_higher_course'];
$C_speciality=$_POST['C_speciality'];



?>

<!-- mysql> select * from students_academic_data where user in (select user from students_personal_data where name='Coloma Maria') and studies='industrialengineering';
 -->


<!--mysql>select * from students_academic_data where studies='$C_studies' AND higher_course=$C_higher_course AND speciality='$C_speciality';


mysql> select * from students_academic_data where studies='industrialengineering' AND higher_course=5 -->;
