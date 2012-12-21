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

<?php

	if (isset($_POST['type']) && $_POST['type'] == 'password_change') {

		require_once('../config.php');

		// Connect to the database
		$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

		// Check for database connection errors
		if (mysqli_connect_errno()) {

			echo '<p class="error"><strong>Error: </strong>could not connect to the database. Please, try again later.</p>';

		}

		if (!mysqli_set_charset($db, 'utf8')) {

			echo '<p class="error"><strong>Error: </strong>could not set charset to UTF8. Please, try again later.</p>';

		}


		// Check if all fields have a non-empty value
		if ($_POST['old_pass'] != "" &&
			$_POST['new_pass'] != "" &&
			$_POST['new_pass_verif'] != "") {

			// New password verification
			if ($_POST['new_pass'] == $_POST['new_pass_verif']) {

				// Try to get data from the users database
				$query = "select * from students where student_number='".$_SESSION['user_id']."'";
				$result = mysqli_query($db, $query);
				$row = mysqli_fetch_assoc($result);

				if (hash('sha512', $db_salt.$_POST['old_pass']) == $row['password']) {

					$query = "update students set password='".hash('sha512', $db_salt.$_POST['new_pass'])."' where student_number='".$_SESSION['user_id']."'";
					$result = mysqli_query($db, $query);

					if ($result) echo '<p class="info">¡Tu contraseña ha sido modificada correctamente!</p>';
					else echo '<p class="error"><strong>Error: </strong>no se pudo escribir en la base de datos. Por favor, inténtalo más tarde.</p>';

				} else {

					echo '<p class="warning">¡Contraseña incorrecta! Por favor, proporciona tu antigua contraseña para poder cambiarla.</p>';

				}

			} else {

				echo '<p class="warning">¡Las contraseñas no coinciden!</p>';

			}

		} else {

			// Need to fill more fields in the form
			echo '<p class="warning">¡Por favor, rellena todos los campos requeridos!</p>';

		}

		// Close database connection
		mysqli_free_result($result);
		mysqli_close($db);

	}

?>

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
