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

<table>
<tr>
<td>row 1, cell 1</td>
<td>row 1, cell 2</td>
</tr>
<tr>
<td>row 2, cell 1</td>
<td>row 2, cell 2</td>
</tr>
</table> 
</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
