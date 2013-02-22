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
<article>
	<nav class="tabs_nav">
		<ul>
			<li class="current">Session</li>
			<li><a href="/en/account_settings/password/">Password</a></li>
<?php
	if (isset($_SESSION['invitations_permissions']) && $_SESSION['invitations_permissions']) {
		echo '<li><a href="/en/account_settings/invite/">Invite</a></li>';
	}
	if (isset($_SESSION['permissions_permissions']) && $_SESSION['permissions_permissions']) {
		echo '<li><a href="/en/account_settings/permissions/">Permissions</a></li>';
	}
	if (isset($_SESSION['statistics_permissions']) && $_SESSION['statistics_permissions']) {
		echo '<li><a href="/en/account_settings/statistics/">Statistics</a></li>';
	}
?>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>
	<p>To log out, click the button bellow:</p>
	<form action="/en/logout/" method="post">
		<input type="submit" value="Log out" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Account settings</p>
</footer>
</section>
