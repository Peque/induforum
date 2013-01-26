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

	if (isset($_POST['type']) && $_POST['type'] == 'student_languages') {
		//Try to delete all rows
			$query = "delete from students_languages where user='".$user_number."'";
			mysqli_query($db, $query);

		$writing_success = 1;

		$num_results = mysqli_real_escape_string($db, trim($_POST['languages']));

		// Form data overrides any other data
		for ($j=0;$j<$num_results;$j++){

			$language[$j] = mysqli_real_escape_string($db, trim($_POST['language'.$j]));
			$listening[$j] = mysqli_real_escape_string($db, trim($_POST['listening'.$j]));
			$reading[$j] = mysqli_real_escape_string($db, trim($_POST['reading'.$j]));
			$interaction[$j] = mysqli_real_escape_string($db, trim($_POST['spoken_interaction'.$j]));
			$production[$j] = mysqli_real_escape_string($db, trim($_POST['spoken_production'.$j]));
			$writing[$j] = mysqli_real_escape_string($db, trim($_POST['writing'.$j]));

			// Check if all fields have a non-empty value
			if ($language[$j] != "" &&
				$listening[$j] != "" &&
				$reading[$j] != "" &&
				$interaction[$j] != "" &&
				$production[$j] != "" &&
				$writing[$j] != "") {

				// Try to add a new row
				$query = "insert into students_languages values
										('".$user_number."',
										'".$language[$j]."',
										'".$listening[$j]."',
										'".$reading[$j]."',
										'".$interaction[$j]."',
										'".$production[$j]."',
										'".$writing[$j]."')";


				$result = mysqli_query($db, $query);
				// Inform the user about the operation
				if (!$result) $writing_success = 0;

			} else {

				// Need to fill more fields in the form
				echo $warn_incomplete_form;

			}

		}

		if ($writing_success) echo $info_data_saved;
		else echo $err_writing_to_db;

	} else {

		// Try to get data from the database
		$query = "select * from students_languages where user='".$user_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) {

				$row = mysqli_fetch_assoc($result);

				$language[$i] = $row['language'];
				$listening[$i] = $row['listening'];
				$reading[$i] = $row['reading'];
				$interaction[$i] = $row['spoken_interaction'];
				$production[$i] = $row['spoken_production'];
				$writing[$i] = $row['writing'];

			}

		}

	}

	// Close database connection
	mysqli_free_result($result);
	mysqli_close($db);

?>
