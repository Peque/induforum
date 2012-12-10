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
	<header>
		<hgroup>
			<h1 id="Cambia_tu_contraseña">Cambia tu contraseña</h1>
		</hgroup>
		<hr />
	</header>

<p>No puedes cambiar tu contraseña... ¡todavía!</p>

<p>¡Pero puedes cerrar tu sesión!</p>

<form action="/es/logout/" method="post">
	<input type="submit" value="Log out" accesskey="x" />
</form>

</article>
<footer>
	<p class="section_title">Configuración de cuenta</p>
</footer>
</section>
