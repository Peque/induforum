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

	if (isset($_POST['type']) && $_POST['type'] == 'student_proffesional_experience') {
		//Try to delete all rows
			$query = "delete from students_work_experience where user='".$user_number."'";
			mysqli_query($db, $query);

			$writing_success = 1;
			$num_results = mysqli_real_escape_string($db, trim($_POST['jobs']));

		// Form data overrides any other data
		for ($j=0;$j<$num_results;$j++){
		$initialmonth[$j] = mysqli_real_escape_string($db, trim($_POST['initial_month'.$j]));
		$initialyear[$j] = mysqli_real_escape_string($db, trim($_POST['initial_year'.$j]));
		$finalmonth[$j] = mysqli_real_escape_string($db, trim($_POST['final_month'.$j]));
		$finalyear[$j] = mysqli_real_escape_string($db, trim($_POST['final_year'.$j]));
		$company[$j] = mysqli_real_escape_string($db, trim($_POST['company'.$j]));
		$job[$j] = mysqli_real_escape_string($db, trim($_POST['job'.$j]));
		$experience[$j] = mysqli_real_escape_string($db, trim($_POST['description_experience'.$j]));
		// Check if all fields have a non-empty value
		if ($initialmonth[$j] != "" &&
			$initialyear[$j] != "" &&
			$finalmonth[$j] != "" &&
			$finalyear[$j] != "" &&
			$company[$j] != "" &&
			$job[$j] != "" ) {


			// Try to add a new row
			$query = "insert into students_work_experience values
									('".$user_number."',
									'".$initialyear[$j]."-".$initialmonth[$j]."-"."00"."',
									'".$finalyear[$j]."-".$finalmonth[$j]."-"."00"."',
									'".$company[$j]."',
									'".$job[$j]."',
									'".$experience[$j]."')";

			$result = mysqli_query($db, $query);
			// Inform the user about the operation
			if (!$result) $writing_success = 0;

			// Don't show escaped data in the form
			$experience[$j] = trim($_POST['description_experience'.$j]);


		} else {

			// Need to fill more fields in the form
			echo $warn_incomplete_form;

		}
	}
		if ($writing_success) echo $info_data_saved;
		else echo $err_writing_to_db;


	} else {

		// Try to get data from the database
		$query = "select * from students_work_experience where user='".$user_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) {

				$row = mysqli_fetch_assoc($result);
				$initialdate[$i]=	explode('-',$row['initial_date']);
				$initialyear[$i] =$initialdate[$i][0] ;
				$initialmonth[$i] =$initialdate[$i][1] ;
				$finaldate[$i]=	explode('-',$row['final_date']);
				$finalyear[$i] = $finaldate[$i][0];
				$finalmonth[$i] = $finaldate[$i][1];
				$company[$i] = $row['company'];
				$job[$i] = $row['job'];
				$experience[$i] = $row['description_experience'];

			}

		}

	}

	// Close database connection
	mysqli_free_result($result);
	mysqli_close($db);

?>
