<?php

	session_start();

	// Check user logged in
	if (isset($_SESSION['user_id'])) {
		header('Location: /es/account_settings/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Iniciar sesión</h1>
	</hgroup>
</header>
<article>
	<header>
		<hgroup>
			<h1 id="Formulario_de_acceso">Formulario de acceso</h1>
		</hgroup>
		<hr />
	</header>
	<p>
		Si eres estudiante, utiliza tu <strong>número de matrícula</strong> como <em>Usuario</em> y tu <strong>DNI</strong> como <em>Contraseña</em> (incluyendo ceros y excluyendo la letra de verificación).
	</p>

<?php require_once('../data/login.php'); ?>

	<form action="" method="post">
		<fieldset>
			<legend>Log in:</legend>
			<div class="form_warp">
				<label for="form_user" class="singleline">Usuario: <span class="form_required" title="This field is required">*</span></label>
				<input type="text" maxlength="30" name="user" id="form_user" class="singleline" required="required" value="<?php if (isset($spd['user'])) echo $spd['user']; ?>" />
				<label for="form_pass" class="singleline">Contraseña: <span class="form_required" title="This field is required">*</span></label>
				<input type="password" maxlength="60" name="pass" id="form_pass" class="singleline" required="required" />
			</div>
		</fieldset>
		<input type="hidden" name="type" value="login_form" />
		<input type="submit" value="Entrar" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Iniciar sesión</p>

</footer>

</section>


