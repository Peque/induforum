<?php

	session_start();

	// Check user logged in
	if (isset($_SESSION['user_id'])) {
		header('Location: /en/account_settings/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Log in</h1>
	</hgroup>
</header>
<article>
	<header>
		<hgroup>
			<h1 id="Acess_form">Access form</h1>
		</hgroup>
		<hr />
	</header>
	<p>
		If you are a student, use your <strong>registration number</strong> as <em>User</em> and your <strong>ID</strong> as <em>Password</em> (including zeros and excluding the verification letter).
	</p>

<?php

	require_once(strstr(getcwd(), '/build', 1).'/data/form_to_db.php');

	if (form_to_db('login', array('user*', 'pass*'))) {

?>

	<form action="" method="post">
		<fieldset>
			<legend>Log in:</legend>
			<div class="form_warp">
				<label for="form_user" class="singleline">User: <span class="form_required" title="This field is required">*</span></label>
				<input type="text" maxlength="30" name="user" id="form_user" class="singleline" required="required" value="<?php if (isset($sd['user'])) echo $sd['user']; ?>" />
				<label for="form_pass" class="singleline">Password: <span class="form_required" title="This field is required">*</span></label>
				<input type="password" maxlength="60" name="pass" id="form_pass" class="singleline" required="required" />
			</div>
		</fieldset>
		<input type="hidden" name="type" value="login" />
		<input type="submit" value="Log in" accesskey="x" />
	</form>

<?php

	} else {

		if (!isset($_SESSION['user_do_not_have_permissions'])) {
			if ($_SESSION['user_is_admin']) {
				header('Location: /en/account_settings/');
				exit;
			} else if ($_SESSION['user_is_student']) {
				header('Location: /en/students/participate/');
				exit;
			} else if ($_SESSION['user_is_company']) {
				header('Location: /en/companies/database/');
				exit;
			} else {
				header('Location: /en/account_settings/');
				exit;
			}
		} else {
			header('Location: /en/undef-permissions/');
			exit;
		}

	}

?>

</article>
<footer>
	<p class="section_title">Log in</p>

</footer>

</section>


