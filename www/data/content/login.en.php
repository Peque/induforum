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
	<p>
		If you have a trouble to register, contact to:
		 <code><em>dep.tecnologico</em><span class="display-none">@anti-spam</span><em>@induforum.es</em></code>
	</p>

<?php require_once('../data/login.php'); ?>

	<form action="" method="post">
		<fieldset>
			<legend>Log in:</legend>
			<div class="form_warp">
				<label for="form_user" class="singleline">User: <span class="form_required" title="This field is required">*</span></label>
				<input type="text" maxlength="30" name="user" id="form_user" class="singleline" required="required" value="<?php if (isset($spd['user'])) echo $spd['user']; ?>" />
				<label for="form_pass" class="singleline">Password: <span class="form_required" title="This field is required">*</span></label>
				<input type="password" maxlength="60" name="pass" id="form_pass" class="singleline" required="required" />
			</div>
		</fieldset>
		<input type="hidden" name="type" value="login_form" />
		<input type="submit" value="Log in" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Log in</p>

</footer>

</section>


