<section id="content">
<header>
	<hgroup>
		<h1>Invitation</h1>
	</hgroup>
</header>
<article>
	<header>
		<hgroup>
			<h1>Welcome!</h1>
		</hgroup>
		<hr />
	</header>
	<p>Please, introduce the required data below to add your user to our database.</p>

<?php

	require_once(strstr(getcwd(), '/build', 1).'/data/form_to_db.php');

	if (form_to_db('invitation_form', array('user*', 'pass*', 'pass2*'))) {

?>

	<form action="" method="post">
		<fieldset>
			<legend>User information:</legend>
			<div class="form_warp">
				<label for="form_user" class="singleline">User: <span class="form_required" title="This field is required">*</span></label>
				<input type="text" maxlength="30" name="user" id="form_user" class="singleline" required="required" value="<?php if (isset($sd['user'])) echo $sd['user']; ?>" />
				<label for="form_pass" class="singleline">Password: <span class="form_required" title="This field is required">*</span></label>
				<input type="password" maxlength="60" name="pass" id="form_pass" class="singleline" required="required" />
				<label for="form_pass2" class="singleline">Password (again): <span class="form_required" title="This field is required">*</span></label>
				<input type="password" maxlength="60" name="pass2" id="form_pass2" class="singleline" required="required" />
			</div>
		</fieldset>
		<input type="hidden" name="type" value="invitation_form" />
		<input type="submit" value="Register" accesskey="x" />
	</form>

<?php

	}

?>

</article>
<footer>
	<p class="section_title">Invitation<p>
</footer>
</section>
