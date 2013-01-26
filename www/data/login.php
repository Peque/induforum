<?php

	require_once('../config.php');
	require_once('../data/messages.php');

	// Connect to the database
	$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

	// Check for database connection errors
	if (mysqli_connect_errno()) {

		echo $err_db_connection_error;

	}

	if (!mysqli_set_charset($db, 'utf8')) {

		echo $err_db_charset_error;

	}

	if (isset($_POST['type']) && $_POST['type'] == 'login_form') {

		// Form data overrides any other data

		$spd['user'] = mysqli_real_escape_string($db, trim($_POST['user']));
		$spd['pass'] = mysqli_real_escape_string($db, trim($_POST['pass']));

		// Check if all fields have a non-empty value
		if ($spd['user'] != "" &&
			$spd['pass'] != "") {

			// Try to get data from the users database
			$query = "select * from users where id='".$spd['user']."'";
			$users_result = mysqli_query($db, $query);

			if (mysqli_num_rows($users_result)) {

				// $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($users_result);

				if ($spd['user'] == $row['id'] &&
				    hash('sha512', $db_salt.$spd['pass']) == $row['password']) {
					$_SESSION['user_id'] = $row['number'];
					$_SESSION['type'] = 'student_session';
					header('Location: /es/students/participate/');
					exit;
				} else {
					echo $err_wrong_username_or_password;
				}

			} else {
				echo $err_wrong_username_or_password;
			}

			mysqli_free_result($users_result);

		} else {

			// Need to fill more fields in the form
			echo $warn_incomplete_form;

		}

	}

	// Close database connection
	mysqli_close($db);

?>
