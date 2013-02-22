<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /es/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['student_permissions']) {
		header('Location: /es/restricted_area/');
		exit;
	}

	header('Location: /es/students/participate/personal_data/');

?>
