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

	// Create invitation
	date_default_timezone_set('UTC');
	$expiration_date = date("Y-m-d H:i:s", strtotime("+2 days"));
	$invitation_key = hash('sha512', $sd['email'].$expiration_date);

	$query = "insert into invitations (user,invitation_key,expiration) values ('".$_SESSION['user_id']."','".$invitation_key."','".$expiration_date."')";
	$result = mysqli_query($db, $query);

	if ($result) {

		require_once(strstr(getcwd(), '/build', 1).'/data/class.phpmailer.php');

		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = $email_host;
		$mail->Port = 465;
		$mail->Username = $email_user;
		$mail->Password = $email_pass;
		$mail->SetFrom($email_from_mail, $email_from_name);
		$mail->Subject = "NO REPLY";
		$mail->Body = "You have been invited to Reset! Use the link bellow to register:\n\nhttp://".$_SERVER['HTTP_HOST']."/invitation/?key=".$invitation_key;
		$mail->AddAddress($sd['email']);

		if ($mail->Send()) {
			echo $invitation_created;
		} else {
			echo $err_sending_mail;
			echo '<p class="warning">Share <a href="/invitation/?key='.$invitation_key.'">the invitation link that has been created</a> with your friend for him/her to accept it. Remember the invitation can only be used once and will expire in <strong>48 hours</strong>.</p>';
		}

	} else {

		echo $err_writing_to_db;
		$processing_error = 1;

	}

?>
