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
	<header>
		<hgroup>
			<h1 id="Change_your_password">Change your password</h1>
		</hgroup>
		<hr />
	</header>

<p>You can not change your password... yet!</p>

<p>But you can close your session!</p>

<form action="/en/logout/" method="post">
	<input type="submit" value="Log out" accesskey="x" />
</form>

</article>
<footer>
	<p class="section_title">Account settings</p>
</footer>
</section>
