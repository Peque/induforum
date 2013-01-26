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

	if (isset($_POST['type']) && $_POST['type'] == 'student_academic_data') {

		// Form data overrides any other data

		$spd['studies'] = mysqli_real_escape_string($db, trim($_POST['studies']));
		$spd['higher_course'] = mysqli_real_escape_string($db, trim($_POST['higher_course']));
		$spd['speciality'] = mysqli_real_escape_string($db, trim($_POST['speciality']));
		$spd['begin_year'] = mysqli_real_escape_string($db, trim($_POST['begin_year']));
		$spd['additional_information'] = mysqli_real_escape_string($db, trim($_POST['additional_information']));

		// Check if all fields have a non-empty value
		if ($spd['studies'] != "" &&
			$spd['higher_course'] != "" &&
			$spd['speciality'] != "" &&
			$spd['begin_year'] != "") {

			// Try to add a new row
			$query = "insert into students_academic_data values
									('".$user_number."',
									'".$spd['studies']."',
									'".$spd['higher_course']."',
									'".$spd['speciality']."',
									'".$spd['begin_year']."',
									'".$spd['additional_information']."')";
			// Check if we wrote the new row, otherwise, data existed for this student
			$result = mysqli_query($db, $query);

			// If data existed for this student, update it
			if (!$result) {
				$query = "update students_academic_data set
						   studies='".$spd['studies']."',
						   higher_course='".$spd['higher_course']."',
						   speciality='".$spd['speciality']."',
						   begin_year='".$spd['begin_year']."',
						   additional_information='".$spd['additional_information']."'
						   where user='".$user_number."'";
				$result = mysqli_query($db, $query);
			}

			// Inform the user about the operation
			if ($result) echo $info_data_saved;
			else echo $err_writing_to_db;

		} else {

			// Need to fill more fields in the form
			echo $warn_incomplete_form;

		}

	} else {

		// Try to get data from the database
		$query = "select * from students_academic_data where user='".$user_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) { // $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($result);

				$spd['studies'] = $row['studies'];
				$spd['higher_course'] = $row['higher_course'];
				$spd['speciality'] = $row['speciality'];
				$spd['begin_year'] = $row['begin_year'];
				$spd['additional_information'] = $row['additional_information'];
			}

		}

	}

	// Close database connection
	mysqli_free_result($result);
	mysqli_close($db);

?>
