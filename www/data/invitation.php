<?php

	// Check if post data exists to be processed
	if (isset($_POST['type']) && $_POST['type'] == 'register_form') {

		// Check if all required fields have a non-empty value
		if ($_POST['user'] != "" &&
		    $_POST['pass'] != "" &&
		    $_POST['pass2'] != "") {

			require_once('../config.php');
			require_once('../data/messages.php');

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

					$query = "select * from invitations where invitation_key='".$_GET['key']."'";
					$result = mysqli_query($db, $query);

					// Check the invitation exists
					if (mysqli_num_rows($result)) {

						$row = mysqli_fetch_assoc($result);

						date_default_timezone_set('UTC');

						// Check the invitation can still be used
						if (!$row['used_by'] && strtotime($row['expiration']) > strtotime(date("Y-m-d H:i:s"))) {

							// Sanitize data
							$sd['user'] = mysqli_real_escape_string($db, trim($_POST['user']));
							$sd['pass'] = mysqli_real_escape_string($db, trim($_POST['pass']));
							$sd['pass2'] = mysqli_real_escape_string($db, trim($_POST['pass2']));

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
										$query = "update invitations set used_by='".$sd['user']."' where invitation_key='".$_GET['key']."'";
										$result = mysqli_query($db, $query);
										unset($sd['user']);

										echo $info_user_added;

									} else {

										echo $errerr_writing_to_db;

									}

								} else {

									echo $warn_passwords_not_match;

								}

							}

						} else {

							if ($row['used_by']) {

								echo $err_invitation_used;

							} else {

								echo $err_invitation_expired;

							}

						}

						$result = mysqli_query($db, $query);

					} else {

						echo $err_not_invited;

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
