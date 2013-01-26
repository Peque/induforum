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

<?php require_once('../data/account_settings.php'); ?>

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
