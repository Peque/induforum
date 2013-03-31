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
<td>ID</td>
<td>CV</td>
</tr>


<?php require_once('../../data/results.php');?>

</table> 
<?php
$array=explode(",",$array);
$array=serialize($array);
echo 
'<form action="/zip/" method="post">
    <input name="array" type="hidden" value="'.str_replace('"','$',$array).'">
    <input name="enviar" type="submit" value="Download">
</form>' 
?>

</article>
<footer>
	<p class="section_title">CV Data Base</p>
</footer>
</section>
