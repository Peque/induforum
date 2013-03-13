<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /es/login/');
		exit;
	}

	// Check user privileges
	if (file_exists(strstr(getcwd(), '/build', 1).'/uploads/'.$_SESSION['user_id'])) {
		header("Content-type: application/pdf");
		header('Content-Disposition: attachment; filename="' . $_SESSION['user_id'] . '.pdf"');readfile(strstr(getcwd(), '/build', 1).'/uploads/'.$_SESSION['user_id']);
	} else {

?>

<section id="content">
<header>
	<hgroup>
		<h1>Descargar</h1>
	</hgroup>
</header>
<article>
	<p class="error">Ningún archivo disponible para el usuario.</p>
</article>
<footer>
	<p class="section_title">Descargar</p>
</footer>
</section>
<?php

	}

?>
