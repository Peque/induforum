<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
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
		<h1>Download</h1>
	</hgroup>
</header>
<article>
	<p class="error">No file available for the user.</p>
</article>
<footer>
	<p class="section_title">Download</p>
</footer>
</section>
<?php

	}

?>
