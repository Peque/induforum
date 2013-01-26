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

	if (isset($_POST['type']) && $_POST['type'] == 'student_computer_science') {

		// Form data overrides any other data

		$spd['windows'] = mysqli_real_escape_string($db, trim($_POST['windows']));
		$spd['mac'] = mysqli_real_escape_string($db, trim($_POST['mac']));
		$spd['linux'] = mysqli_real_escape_string($db, trim($_POST['linux']));
		$spd['data_bases'] = mysqli_real_escape_string($db, trim($_POST['data_bases']));
		$spd['finances_accounting'] = mysqli_real_escape_string($db, trim($_POST['finances_accounting']));
		$spd['cad'] = mysqli_real_escape_string($db, trim($_POST['cad']));
		$spd['graphic_design'] = mysqli_real_escape_string($db, trim($_POST['graphic_design']));
		$spd['spreadsheet'] = mysqli_real_escape_string($db, trim($_POST['spreadsheet']));
		$spd['email'] = mysqli_real_escape_string($db, trim($_POST['email']));
		$spd['maths_statistics'] = mysqli_real_escape_string($db, trim($_POST['maths_statistics']));
		$spd['presentations'] = mysqli_real_escape_string($db, trim($_POST['presentations']));
		$spd['word_processors'] = mysqli_real_escape_string($db, trim($_POST['word_processors']));
		$spd['programming_languages'] = mysqli_real_escape_string($db, trim($_POST['programming_languages']));
		$spd['simulation'] = mysqli_real_escape_string($db, trim($_POST['simulation']));
		$spd['communications_networks'] = mysqli_real_escape_string($db, trim($_POST['communications_networks']));

		// Check if all fields have a non-empty value


			// Try to add a new row
			$query = "insert into students_computing_experience values
									('".$user_number."',
									'".$spd['windows']."',
									'".$spd['mac']."',
									'".$spd['linux']."',
									'".$spd['data_bases']."',
									'".$spd['finances_accounting']."',
									'".$spd['cad']."',
									'".$spd['graphic_design']."',
									'".$spd['spreadsheet']."',
									'".$spd['email']."',
									'".$spd['maths_statistics']."',
									'".$spd['presentations']."',
									'".$spd['word_processors']."',
									'".$spd['programming_languages']."',
									'".$spd['simulation']."',
									'".$spd['communications_networks']."')";
			// Check if we wrote the new row, otherwise, data existed for this student
			$result = mysqli_query($db, $query);

			// If data existed for this student, update it
			if (!$result) {
				$query = "update students_computing_experience set
						   windows='".$spd['windows']."',
						   mac='".$spd['mac']."',
						   linux='".$spd['linux']."',
						   data_bases='".$spd['data_bases']."',
						   finances_accounting='".$spd['finances_accounting']."',
						   cad='".$spd['cad']."',
						   graphic_design='".$spd['graphic_design']."',
						   spreadsheet='".$spd['spreadsheet']."',
						   email='".$spd['email']."',
						   maths_statistics='".$spd['maths_statistics']."',
						   presentations='".$spd['presentations']."',
						   word_processors='".$spd['word_processors']."',
						   programming_languages='".$spd['programming_languages']."',
						   simulation='".$spd['simulation']."',
						   communications_networks='".$spd['communications_networks']."'
						   where user='".$user_number."'";
				$result = mysqli_query($db, $query);
			}

			// Inform the user about the operation
			if ($result) echo $info_data_saved;
			else echo $err_writing_to_db;

	} else {

		// Try to get data from the database
		$query = "select * from students_computing_experience where user='".$user_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) { // $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($result);

				$spd['windows'] = $row['windows'];
				$spd['mac'] = $row['mac'];
				$spd['linux'] = $row['linux'];
				$spd['data_bases'] = $row['data_bases'];
				$spd['finances_accounting'] = $row['finances_accounting'];
				$spd['cad'] = $row['cad'];
				$spd['graphic_design'] = $row['graphic_design'];
				$spd['spreadsheet'] = $row['spreadsheet'];
				$spd['email'] = $row['email'];
				$spd['maths_statistics'] = $row['maths_statistics'];
				$spd['presentations'] = $row['presentations'];
				$spd['word_processors'] = $row['word_processors'];
				$spd['programming_languages'] = $row['programming_languages'];
				$spd['simulation'] = $row['phone'];
				$spd['communications_networks'] = $row['communications_networks'];

			}

		}

	}

	// Close database connection
	mysqli_free_result($result);
	mysqli_close($db);

?>
