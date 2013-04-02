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

<?php require_once('../../data/results.php');?> 
<?php
if (isset($_POST['type']) && $_POST['type'] == 'create_zip') {
        require_once('../../data/zip.php');
}
?>
<p>
	Number of results: <?php echo ($num_results+1);
	$_SESSION['array2'] =$array;?>
</p>

<form action="./" method="post">
    <input name="type" type="hidden" value="create_zip">
    <input name="enviar" type="submit" value="Download">
</form>

</article>
<footer>
	<p class="section_title">CV Data Base</p>
</footer>
</section>
