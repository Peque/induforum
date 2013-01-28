<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['user_is_company']) {
		header('Location: /en/restricted_area/');
		exit;
	}

?>
