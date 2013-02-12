<?php

	// Error messages
	$err_db_connection_error='<p class="error"><strong>Error: </strong>could not connect to the database. Please, try again later.</p>';
	$err_db_charset_error='<p class="error"><strong>Error: </strong>could not set charset to UTF8. Please, try again later.</p>';
	$err_wrong_username_or_password='<p class="error"><strong>Error: </strong>Wrong user name or password. Please, try again.</p>';
	$err_writing_to_db='<p class="error"><strong>Error: </strong>could not write to the database. Please, try again later.</p>';
	$err_user_exist='<p class="error"><strong>Error: </strong> the username is already in use, please, select a different one.</p>';
	$err_not_invited='<p class="error"><strong>Error: </strong> the invitation you are trying to use does not exist. Please, ask for a new one.</p>';
	$err_invitation_used='<p class="error"><strong>Error: </strong> the invitation has already been used. Please, ask for a new one.</p>';
	$err_invitation_expired='<p class="error"><strong>Error: </strong> the invitation already expired. Please, ask for a new one.</p>';
	$err_wrong_form_type='<p class="error"><strong>Error: </strong> wrong form type. Please, contact the administrator.</p>';

	// Warning messages
	$warn_incomplete_form='<p class="warning">Please, fill all the required fields in the form!</p>';
	$warn_passwords_not_match='<p class="warning">Passwords do not match!</p>';
	$warn_wrong_old_password='<p class="warning">Incorrect password! Please, provide your old password in order to change it.</p>';
	$warn_undef_permissions='<p class="warning"><strong>Warning: </strong>you are registered in our database but your permissions are not defined yet. Please, ask somebody to give you permissions.</p>';

	// Information messages
	$info_password_changed='<p class="info">Your password has been changed successfuly!</p>';
	$info_data_saved='<p class="info">Data saved successfuly.</p>';
	$invitation_created='<p class="info">The invitation has been created. Your friend should receive it in the email soon. Remember the invitation can only be used once and will expire in <strong>48 hours</strong>.</p>';
	$info_user_added='<p class="info">Your user was successfully added to our database! You can now <a href="/login/">go to the login page</a>.</p>';

?>
