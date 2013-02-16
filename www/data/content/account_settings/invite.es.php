<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /es/login/');
		exit;
	}

	// Check permissions
	if (!isset($_SESSION['user_can_invite']) || !$_SESSION['user_can_invite']) {
		header('Location: /es/restricted_area/');
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
			<li><a href="/es/account_settings/session/">Sesión</a></li>
			<li><a href="/es/account_settings/password/">Contraseña</a></li>
<?php
	if (isset($_SESSION['user_can_invite']) && $_SESSION['user_can_invite']) {
		echo '<li class="current">Invitar</li>';
	}
	if (isset($_SESSION['user_can_share_permissions']) && $_SESSION['user_can_share_permissions']) {
		echo '<li><a href="/es/account_settings/permissions/">Permisos</a></li>';
	}
	if (isset($_SESSION['user_can_view_statistics']) && $_SESSION['user_can_view_statistics']) {
		echo '<li><a href="/es/account_settings/statistics/">Estadísticas</a></li>';
	}
?>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>
	<p>Puedes invitar a otras personas a unirse a nosotros. Ten en cuenta que todas estas acciones serán registradas y asociadas a tu usuario por razones de seguridad, así que intenta invitar sólo a personas en quien confíes.</p>
	<p>Tras invitar a alguien, el usuario no tendrá ningún permiso. Una vez que el usuario se haya registrado, puedes darle hasta un máximo de tus mismos permisos.</p>

<?php

	require_once(strstr(getcwd(), '/build', 1).'/data/form_to_db.php');

	if (form_to_db('invite', array('email*'))) {

?>

	<form action="" method="post">
		<fieldset>
			<legend>Formulario de invitación:</legend>
			<label for="form_email" class="singleline">Correo electrónico de tu amig@: <span class="form_required" title="This field is required">*</span></label>
			<input type="email" maxlength="60" name="email" id="form_email" class="singleline" required="required" />
		</fieldset>
		<input  type="hidden" name="type" value="invite" />
		<input type="submit" value="Invitar" accesskey="x" />
	</form>

<?php

	}

?>

</article>
<footer>
	<p class="section_title">Configuración de cuenta</p>
</footer>
</section>
