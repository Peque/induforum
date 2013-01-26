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
<nav id="section_nav">
	<ul>
		<li><a href="#Log_out">1 - Cerrar sesión</a></li>
		<li><a href="#Password_change">2 - Cambiar contraseña</a></li>
	</ul>
</nav>
<article>
	<header>
		<hgroup>
			<h1 id="Log_out">Cerrar sesión</h1>
		</hgroup>
		<hr />
	</header>
	<p>Para cerrar la sesión, haz click en el siguiente botón:</p>
	<form action="/es/logout/" method="post">
		<input type="submit" value="Cerrar sesión" accesskey="x" />
	</form>
</article>
<article>
	<header>
		<hgroup>
			<h1 id="Password_change">Cambiar contraseña</h1>
		</hgroup>
		<hr />
	</header>
	<p>Por razones de seguridad, te recomendamos cambiar la contraseña por defecto.</p>

<?php require_once('../data/account_settings.php'); ?>

	<form action="" method="post">
		<fieldset>
			<legend>Cambia tu contraseña:</legend>
			<label for="form_old_pass" class="singleline">Antigua contraseña: <span class="form_required" title="This field is required">*</span></label>
			<input type="password" maxlength="60" name="old_pass" id="form_old_pass" class="singleline" required="required" />
			<label for="form_new_pass" class="singleline">Nueva contraseña: <span class="form_required" title="This field is required">*</span></label>
			<input type="password" maxlength="60" name="new_pass" id="form_new_pass" class="singleline" required="required" />
			<label for="form_new_pass_verif" class="singleline">Nueva contraseña, otra vez: <span class="form_required" title="This field is required">*</span></label>
			<input type="password" maxlength="60" name="new_pass_verif" id="form_new_pass_verif" class="singleline" required="required" />
		</fieldset>
		<input  type="hidden" name="type" value="password_change" />
		<input type="submit" value="Guardar" accesskey="x" />
	</form>

</article>
<footer>
	<p class="section_title">Configuración de cuenta</p>
</footer>
</section>
