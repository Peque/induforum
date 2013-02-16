<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check permissions
	if (!isset($_SESSION['user_can_share_permissions']) || !$_SESSION['user_can_share_permissions']) {
		header('Location: /en/restricted_area/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Account settings</h1>
	</hgroup>
</header>
<article>
	<nav class="tabs_nav">
		<ul>
			<li><a href="/en/account_settings/session/">Session</a></li>
			<li><a href="/en/account_settings/password/">Password</a></li>
<?php
	if (isset($_SESSION['user_can_invite']) && $_SESSION['user_can_invite']) {
		echo '<li><a href="/en/account_settings/invite/">Invite</a></li>';
	}
	if (isset($_SESSION['user_can_share_permissions']) && $_SESSION['user_can_share_permissions']) {
		echo '<li class="current">Permissions</li>';
	}
	if (isset($_SESSION['user_can_view_statistics']) && $_SESSION['user_can_view_statistics']) {
		echo '<li><a href="/en/account_settings/statistics/">Statistics</a></li>';
	}
?>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>
	<p>You can invite other people to join us. Notice that all this actions will be registered and associated with your user for security reasons, so try to invite only people you trust.</p>
	<p>After inviting somebody, notice the user wont have any permissions. Once the user is registered, you can give him/her at most your own permissions.</p>

<?php

	require_once(strstr(getcwd(), '/build', 1).'/data/form_to_db.php');

	if (form_to_db('invite', array('email*'))) {

?>

	<form action="" method="post">
		<fieldset>
			<legend>Invitation form:</legend>
			<label for="form_email" class="singleline">Your friend's email: <span class="form_required" title="This field is required">*</span></label>
			<input type="email" maxlength="60" name="email" id="form_email" class="singleline" required="required" />
		</fieldset>
		<input  type="hidden" name="type" value="invite" />
		<input type="submit" value="Invite" accesskey="x" />
	</form>

<?php

	}

?>

</article>
<footer>
	<p class="section_title">Account settings</p>
</footer>
</section>