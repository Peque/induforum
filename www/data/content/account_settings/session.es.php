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
		<h1>Configuración de cuenta</h1>
	</hgroup>
</header>
<article>
	<nav class="tabs_nav">
		<ul>
			<li class="current">Sesión</li>
			<li><a href="/es/account_settings/password/">Contraseña</a></li>
<?php
	if (isset($_SESSION['invitations_permissions']) && $_SESSION['invitations_permissions']) {
		echo '<li><a href="/es/account_settings/invite/">Invitar</a></li>';
	}
	if (isset($_SESSION['statistics_permissions']) && $_SESSION['statistics_permissions']) {
		echo '<li><a href="/es/account_settings/statistics/">Estadísticas</a></li>';
	}
?>
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
