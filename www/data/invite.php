<?php

	// Check if post data exists to be processed
	if (isset($_POST['type']) && $_POST['type'] == 'invitation_form') {

		// Check if all required fields have a non-empty value
		if ($_POST['email'] != "") {

			require_once('../../config.php');
			require_once('../../data/messages.php');

			// Connect to the database
			$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

			// Check for database connection errors
			if (mysqli_connect_errno()) {

				echo $err_db_connection_error;

			} else {

				// Try to set charset
				if (!mysqli_set_charset($db, 'utf8')) {

					echo $err_db_charset_error;

				} else {

					// Sanitize data
					$sd['email'] = mysqli_real_escape_string($db, trim($_POST['email']));

					// Create invitation
					date_default_timezone_set('UTC');
					$expiration_date = date("Y-m-d H:i:s", strtotime("+2 days"));
					$invitation_key = hash('sha512', $sd['email'].$expiration_date);

					$query = "insert into invitations (user,invitation_key,expiration) values ('".$_SESSION['user_id']."','".$invitation_key."','".$expiration_date."')";
					$result = mysqli_query($db, $query);

					if ($result) {

						echo $invitation_created;
						echo '<p class="warning">Share <a href="/invitation/?key='.$invitation_key.'">the invitation link that has been created</a> with your friend for him/her to accept it.</p>';

					} else {

						echo $err_writing_to_db;

					}

				}

				// Close database connection
				mysqli_close($db);

			}

		} else {

			// Need to fill more fields in the form
			echo $warn_incomplete_form;

		}

	}

?>
