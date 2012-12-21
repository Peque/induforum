<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Account settings</h1>
	</hgroup>
</header>
<nav id="section_nav">
	<ul>
		<li><a href="#Log_out">1 - Log out</a></li>
		<li><a href="#Password_change">2 - Password change</a></li>
	</ul>
</nav>
<article>
	<header>
		<hgroup>
			<h1 id="Log_out">Log out</h1>
		</hgroup>
		<hr />
	</header>
	<p>To log out, click the button bellow:</p>
	<form action="/en/logout/" method="post">
		<input type="submit" value="Log out" accesskey="x" />
	</form>
</article>
<article>
	<header>
		<hgroup>
			<h1 id="Password_change">Password change</h1>
		</hgroup>
		<hr />
	</header>
	<p>For security reasons, we recommend you to change the default password.</p>

<?php

	if (isset($_POST['type']) && $_POST['type'] == 'password_change') {

		require_once('../config.php');

		// Connect to the database
		$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

		// Check for database connection errors
		if (mysqli_connect_errno()) {

			echo '<p class="error"><strong>Error: </strong>could not connect to the database. Please, try again later.</p>';

		}

		if (!mysqli_set_charset($db, 'utf8')) {

			echo '<p class="error"><strong>Error: </strong>could not set charset to UTF8. Please, try again later.</p>';

		}


		// Check if all fields have a non-empty value
		if ($_POST['old_pass'] != "" &&
			$_POST['new_pass'] != "" &&
			$_POST['new_pass_verif'] != "") {

			// New password verification
			if ($_POST['new_pass'] == $_POST['new_pass_verif']) {

				// Try to get data from the users database
				$query = "select * from students where student_number='".$_SESSION['user_id']."'";
				$result = mysqli_query($db, $query);
				$row = mysqli_fetch_assoc($result);

				if (hash('sha512', $db_salt.$_POST['old_pass']) == $row['password']) {

					$query = "update students set password='".hash('sha512', $db_salt.$_POST['new_pass'])."' where student_number='".$_SESSION['user_id']."'";
					$result = mysqli_query($db, $query);

					if ($result) echo '<p class="info">Your password has been changed successfuly!</p>';
					else echo '<p class="error"><strong>Error: </strong>could not write to the database. Please, try again later.</p>';

				} else {

					echo '<p class="warning">Wrong password! Please, provide your old password in order to change it.</p>';

				}

			} else {

				echo '<p class="warning">Passwords do not match!</p>';

			}

		} else {

			// Need to fill more fields in the form
			echo '<p class="warning">Please, fill all the required fields in the form!</p>';

		}

		// Close database connection
		mysqli_free_result($result);
		mysqli_close($db);

	}

?>

	<form action="" method="post">
		<fieldset>
			<legend>Change your password:</legend>
			<label for="form_old_pass" class="singleline">Old password: <span class="form_required" title="This field is required">*</span></label>
			<input type="password" maxlength="60" name="old_pass" id="form_old_pass" class="singleline" required="required" />
			<label for="form_new_pass" class="singleline">New password: <span class="form_required" title="This field is required">*</span></label>
			<input type="password" maxlength="60" name="new_pass" id="form_new_pass" class="singleline" required="required" />
			<label for="form_new_pass_verif" class="singleline">New password, again: <span class="form_required" title="This field is required">*</span></label>
			<input type="password" maxlength="60" name="new_pass_verif" id="form_new_pass_verif" class="singleline" required="required" />
		</fieldset>
		<input  type="hidden" name="type" value="password_change" />
		<input type="submit" value="Save" accesskey="x" />
	</form>

</article>
<footer>
	<p class="section_title">Account settings</p>
</footer>
</section>
