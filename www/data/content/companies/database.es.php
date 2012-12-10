<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /es/login/');
		exit;
	}

	// Check user privileges
	if ($_SESSION['type'] != 'company_session') {
		header('Location: /es/restricted_area/');
		exit;
	}

?>
