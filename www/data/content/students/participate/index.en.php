<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['student_permissions']) {
		header('Location: /en/restricted_area/');
		exit;
	}

	header('Location: /en/students/participate/personal_data/');

?>
