<?php

	if (isset($_POST['type']) && $_POST['type'] == 'login_form') {

		// Check if all fields have a non-empty value
		if ($_POST['user'] != "" &&
			$_POST['pass'] != "") {

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

			// Form data overrides any other data

			$spd['user'] = mysqli_real_escape_string($db, trim($_POST['user']));
			$spd['pass'] = mysqli_real_escape_string($db, trim($_POST['pass']));

			// Try to get data from the users database
			$query = "select * from users where id='".$spd['user']."'";
			$query_result = mysqli_query($db, $query);

			if (mysqli_num_rows($query_result)) {

				// $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($query_result);

				if ($spd['user'] == $row['id'] &&
				    hash('sha512', $db_salt.$spd['pass']) == $row['password']) {

					$_SESSION['user_id'] = $row['number'];

					// Check-in
					date_default_timezone_set('UTC');
					$query = "insert into session_log values ('".$_SESSION['user_id']."','".date("Y-m-d H:i:s")."');";
					$query_result = mysqli_query($db, $query);

					// Get user's permissions
					$query = "select * from permissions where user='".$_SESSION['user_id']."'";
					$query_result = mysqli_query($db, $query);

					if (mysqli_num_rows($query_result)) {

						$row = mysqli_fetch_assoc($query_result);

						$_SESSION['user_is_admin'] = $row['admin'];
						$_SESSION['user_is_company'] = $row['company'];
						$_SESSION['user_is_student'] = $row['student'];
						$_SESSION['user_in_organization'] = $row['organization'];
						$_SESSION['user_in_marketing'] = $row['marketing'];
						$_SESSION['user_in_sales'] = $row['sales'];
						$_SESSION['user_in_resources'] = $row['resources'];
						$_SESSION['user_in_technology'] = $row['technology'];

						if ($_SESSION['user_is_admin']) {
							header('Location: /account_settings/');
							exit;
						} else if ($_SESSION['user_is_student']) {
							header('Location: /students/participate/');
							exit;
						} else if ($_SESSION['user_is_company']) {
							header('Location: /companies/database/');
							exit;
						} else {
							header('Location: /account_settings/');
							exit;
						}

					} else {
						header('Location: /undef-permissions/');
						exit;
					}

				} else {
					echo $err_wrong_username_or_password;
				}

			} else {
				echo $err_wrong_username_or_password;
			}

			mysqli_free_result($query_result);

		} else {

			// Need to fill more fields in the form
			echo $warn_incomplete_form;

		}

	}

	// Close database connection
	mysqli_close($db);

?>
