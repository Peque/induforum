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

	if (isset($_POST['type']) && $_POST['type'] == 'student_personal_data') {

		// Form data overrides any other data

		$spd['name'] = mysqli_real_escape_string($db, trim($_POST['name']));
		$spd['surname'] = mysqli_real_escape_string($db, trim($_POST['surname']));
		$spd['birthyear'] = mysqli_real_escape_string($db, trim($_POST['birthyear']));
		$spd['birthmonth'] = mysqli_real_escape_string($db, trim($_POST['birthmonth']));
		$spd['birthday'] = mysqli_real_escape_string($db, trim($_POST['birthday']));
		$spd['country'] = mysqli_real_escape_string($db, trim($_POST['country']));
		$spd['province'] = mysqli_real_escape_string($db, trim($_POST['province']));
		$spd['city'] = mysqli_real_escape_string($db, trim($_POST['city']));
		$spd['street'] = mysqli_real_escape_string($db, trim($_POST['street']));
		$spd['zip'] = mysqli_real_escape_string($db, trim($_POST['zip']));
		$spd['phone'] = mysqli_real_escape_string($db, trim($_POST['phone']));
		$spd['email'] = mysqli_real_escape_string($db, trim($_POST['email']));

		// Check if all fields have a non-empty value
		if ($spd['name'] != "" &&
			$spd['surname'] != "" &&
			$spd['birthyear'] != "" &&
			$spd['birthmonth'] != "" &&
			$spd['birthday'] != "" &&
			$spd['country'] != "" &&
			$spd['province'] != "" &&
			$spd['city'] != "" &&
			$spd['street'] != "" &&
			$spd['zip'] != "" &&
			$spd['phone'] != "" &&
			$spd['email'] != "") {

			// Try to add a new row
			$query = "insert into students_personal_data values
									('".$user_number."',
									'".$spd['name']."',
									'".$spd['surname']."',
									'".$spd['birthyear']."-".$spd['birthmonth']."-".$spd['birthday']."',
									'".$spd['country']."',
									'".$spd['province']."',
									'".$spd['city']."',
									'".$spd['street']."',
									'".$spd['zip']."',
									'".$spd['phone']."',
									'".$spd['email']."')";
			// Check if we wrote the new row, otherwise, data existed for this student
			$result = mysqli_query($db, $query);

			// If data existed for this student, update it
			if (!$result) {
				$query = "update students_personal_data set
						   name='".$spd['name']."',
						   surname='".$spd['surname']."',
						   birth='".$spd['birthyear']."-".$spd['birthmonth']."-".$spd['birthday']."',
						   country='".$spd['country']."',
						   province='".$spd['province']."',
						   city='".$spd['city']."',
						   street='".$spd['street']."',
						   zip='".$spd['zip']."',
						   phone='".$spd['phone']."',
						   email='".$spd['email']."'
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
		$query = "select * from students_personal_data where user='".$user_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) { // $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($result);

				$spd['name'] = $row['name'];
				$spd['surname'] = $row['surname'];
				$birth=	explode('-',$row['birth']);
				$spd['birthyear'] = $birth[0];
				$spd['birthmonth'] = $birth[1];
				$spd['birthday'] = $birth[2];
				$spd['country'] = $row['country'];
				$spd['province'] = $row['province'];
				$spd['city'] = $row['city'];
				$spd['street'] = $row['street'];
				$spd['zip'] = $row['zip'];
				$spd['phone'] = $row['phone'];
				$spd['email'] = $row['email'];

			}

		}

	}

	// Close database connection

	mysqli_free_result($result);
	mysqli_close($db);

?>
