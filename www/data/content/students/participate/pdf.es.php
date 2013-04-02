<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /es/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['student_permissions']) {
		header('Location: /es/restricted_area/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Participación</h1>
	</hgroup>
</header>
<article>
	<nav class="tabs_nav">
		<ul>
			<li><a href="/es/students/participate/personal_data/">Personal</a></li>
			<li><a href="/es/students/participate/academic_data/">Académico</a></li>
			<li><a href="/es/students/participate/languages/">Idiomas</a></li>
			<li><a href="/es/students/participate/professional_experience/">Profesional</a></li>
			<li><a href="/es/students/participate/computer_science/">Informática</a></li>
			<li class="current">PDF</li>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>

<?php

	require_once(strstr(getcwd(), '/build', 1).'/data/form_to_db.php');

	if (form_to_db('upload_pdf', array(''))) {

?>

<?php

	if (file_exists(strstr(getcwd(), '/build', 1).'/uploads/'.$_SESSION['user_id'])) {

?>

	<p class="warning">Ya has subido un PDF. Si subes uno nuevo, el antiguo será sobrescrito.</p>

<?php

	}

?>

	<p>Puedes seleccionar un PDF local con tu curriculum para subirlo a nuestro sistema y ponerlo a disposición de las empresas.</p>
	<form action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>PDF:</legend>
			<div class="form_wrapper">
				<label for="form_resume" class="singleline">Archivo: <span class="form_required" title="¡Este campo es obligatorio!">*</span></label>
				<input type="file" name="resume" id="form_resume" class="singleline" required="required" />
			</div>
		</fieldset>
		<input  type="hidden" name="type" value="upload_pdf" />
		<input type="submit" value="Subir" accesskey="x" />
	</form>

<?php

	} else {

?>

	<p class="info">¡Tu PDF se ha subido correctamente al servidor! Puedes <a href="/es/download_resume/"> verificar tu archivo</a>.</p>

<?php

	}

?>

</article>
<footer>
	<p class="section_title">Participación</p>
</footer>
</section>
