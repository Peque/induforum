<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /es/login/');
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
			<li><a href="/es/account_settings/password/">Password</a></li>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>
	<p>Para cerrar la sesión, haz click en el siguiente botón:</p>
	<form action="/es/logout/" method="post">
		<input type="submit" value="Cerrar sesión" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Configuración de cuenta</p>
</footer>
</section>
