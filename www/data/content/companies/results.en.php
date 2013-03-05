<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['company_permissions']) {
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
<td>Name</td>
<td>Surname</td>
<td>Course</td>
<td>Degree</td>
<td>CV</td>
</tr>


<?php require_once('../../data/results.php');?>

</table> 

</article>
<footer>
	<p class="section_title">CV Data Base</p>
</footer>
</section>
