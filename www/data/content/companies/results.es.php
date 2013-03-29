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
		<h1>Resultados</h1>
	</hgroup>
</header>
<article>

<table>
<tr>
<td>ID</td>
<td>CV</td>
</tr>
<?php require_once('../../data/results.php');
?>
</table> 
<?php
function array_envia($array) {
    $tmp = serialize($array);
    $tmp = urlencode($tmp);
    return $tmp;
}
$array=array_envia($array);
echo '<a href="/zip.php?array=$array">Descargar todos los resultados</a>';?>
</article>
<footer>
	<p class="section_title">Base de datos de CV</p>
</footer>
</section>
