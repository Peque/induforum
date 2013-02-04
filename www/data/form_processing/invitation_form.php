<?php

	/*
	 * Sanitize aditional data (ex: $_GET variables or any other data
	 * that you might be using for MySQL queries and that has not
	 * been sanitized yet)
	 */
	$invitation_key=mysqli_real_escape_string($db, trim($_GET['key']));

	/*
	 * Form data has already been sanitized, so it should not be
	 * dangerous to use it for MySQL queries. Anyway, you should check
	 * that the data is in this variables is the one you are looking
	 * for: variable type, range...
	 *
	 * If you find an input error, you should set the variable
	 * $input_error['name'] to 1, being 'name' the name of the
	 * corresponding form input.
	 */

	/*
	 * If you find any other processing error, remember to set the
	 * variable $processing_error to '1'.
	 */

	$query = "select * from invitations where invitation_key='".$invitation_key."'";
	$result = mysqli_query($db, $query);

	// Check the invitation exists
	if (mysqli_num_rows($result)) {

		$row = mysqli_fetch_assoc($result);

		date_default_timezone_set('UTC');

		// Check the invitation can still be used
		if (!$row['used_by'] && strtotime($row['expiration']) > strtotime(date("Y-m-d H:i:s"))) {

			$query = "select * from users where id='".$sd['user']."'";
			$result = mysqli_query($db, $query);

			// Check the user name is not already in use
			if (mysqli_num_rows($result)) {

				echo $err_user_exist;
				unset($sd['user']);
				mysqli_free_result($result);

			} else {

				// Check passwords match
				if ($sd['pass'] == $sd['pass2']) {

					// Create the new user
					$query = "insert into users (id,password) values('".$sd['user']."','".hash('sha512', $db_salt.$sd['pass'])."')";
					$result = mysqli_query($db, $query);

					if ($result) {

						// Close the invitation
						$query = "update invitations set used_by='".$sd['user']."' where invitation_key='".$invitation_key."'";
						$result = mysqli_query($db, $query);
						unset($sd['user']);

						echo $info_user_added;

					} else {

						echo $errerr_writing_to_db;
						$processing_error = 1;

					}

				} else {

					echo $warn_passwords_not_match;
					$processing_error = 1;

				}

			}

		} else {

			if ($row['used_by']) {

				echo $err_invitation_used;
				$processing_error = 1;

			} else {

				echo $err_invitation_expired;
				$processing_error = 1;

			}

		}

	} else {

		echo $err_not_invited;
		$processing_error = 1;

	}


?>
