<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['user_is_company']) {
		header('Location: /en/restricted_area/');
		exit;
	}

?>


<section id="content">
<header>
	<hgroup>
		<h1>Results</h1>
	</hgroup>
</header>
<article>
<?php require_once('../../../data/results.php'); ?>
<table>
<tr>
<td>Name</td>
<td>Surname</td>
<td>Studies</td>
<td>C.V.</td>
</tr>
</table>
</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
