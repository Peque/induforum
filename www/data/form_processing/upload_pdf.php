<?php

	/*
	 * Sanitize aditional data (ex: $_GET variables or any other data
	 * that you might be using for MySQL queries and that has not
	 * been sanitized yet)
	 */

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

	if (isset($_FILES["resume"]) && $_FILES["resume"]["error"] == 0) {

		if ($_FILES["resume"]["size"] < 1000000) {

			if ($_FILES["resume"]["type"] == "application/pdf") {

				if (!move_uploaded_file($_FILES["resume"]["tmp_name"], strstr(getcwd(), '/build', 1).'/uploads/'.$_SESSION['user_id'])) {

					echo $error_uploading_file;
					$processing_error = 1;

				}

			} else {

				echo $error_wrong_file_type;
				echo '<p class="warning">-- File type must be PDF --</p>';
				$processing_error = 1;

			}

		} else {

			echo $error_file_too_large;
			echo '<p class="warning">-- MAX_SIZE = 1000000 Bytes --</p>';
			$processing_error = 1;

		}

	} else {

		echo $_FILES["resume"];
		echo $_FILES["resume"]["error"];
		echo $error_uploading_file;
		$processing_error = 1;

	}

?>
