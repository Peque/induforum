<?php

	if (isset($_POST['type']) && $_POST['type'] == 'password_change') {

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


		// Check if all fields have a non-empty value
		if ($_POST['old_pass'] != "" &&
			$_POST['new_pass'] != "" &&
			$_POST['new_pass_verif'] != "") {

			// New password verification
			if ($_POST['new_pass'] == $_POST['new_pass_verif']) {

				// Try to get data from the users database
				$query = "select * from users where number='".$_SESSION['user_id']."'";
				$result = mysqli_query($db, $query);
				$row = mysqli_fetch_assoc($result);

				if (hash('sha512', $db_salt.$_POST['old_pass']) == $row['password']) {

					$query = "update users set password='".hash('sha512', $db_salt.$_POST['new_pass'])."' where number='".$_SESSION['user_id']."'";
					$result = mysqli_query($db, $query);

					if ($result) echo $info_password_changed;
					else echo $err_writing_to_db;

				} else {

					echo $warn_wrong_old_password;

				}

				mysqli_free_result($result);

			} else {

				echo $warn_passwords_not_match;

			}

		} else {

			// Need to fill more fields in the form
			echo $warn_incomplete_form;

		}

		// Close database connection
		mysqli_close($db);

	}

?>
