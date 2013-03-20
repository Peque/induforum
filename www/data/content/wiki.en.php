<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check permissions
	if (!isset($_SESSION['wiki_permissions']) || !$_SESSION['wiki_permissions']) {
		header('Location: /en/restricted_area/');
		exit;
	}

	$page = preg_replace('@^(/)?(.*)/$@', '\2', $_GET['page']);

	$file_en = strstr(getcwd(), '/build', 1).'/data/content/'.$page.'.en.reset';
	$file_es = strstr(getcwd(), '/build', 1).'/data/content/'.$page.'.es.reset';

	unset($cmd_output);
	unset($protected_file);

	if (!file_exists(strstr(getcwd(), '/build', 1).'/data/content/'.$page.'.en.php') && !file_exists(strstr(getcwd(), '/build', 1).'/data/content/'.$page.'.es.php')) {

		if (isset($_POST['type']) && $_POST['type'] == 'wiki_form') {
			// Write English wiki file
			file_put_contents($file_en, '% TITLE='.$_POST['title_en']."\n");
			file_put_contents($file_en, '% SUBTITLE='.$_POST['subtitle_en']."\n", FILE_APPEND);
			file_put_contents($file_en, '% DESCRIPTION='.$_POST['description_en']."\n", FILE_APPEND);
			file_put_contents($file_en, '% KEYWORDS='.$_POST['keywords_en']."\n", FILE_APPEND);
			file_put_contents($file_en, preg_replace('/(\r\n)|(\r)/', "\n", $_POST['wiki_content_en']), FILE_APPEND);

			// Write Spanish wiki file
			file_put_contents($file_es, '% TITLE='.$_POST['title_es']."\n");
			file_put_contents($file_es, '% SUBTITLE='.$_POST['subtitle_es']."\n", FILE_APPEND);
			file_put_contents($file_es, '% DESCRIPTION='.$_POST['description_es']."\n", FILE_APPEND);
			file_put_contents($file_es, '% KEYWORDS='.$_POST['keywords_es']."\n", FILE_APPEND);
			file_put_contents($file_es, preg_replace('/(\r\n)|(\r)/', "\n", $_POST['wiki_content_es']), FILE_APPEND);

			// Generate those files in the build directory
			$command = strstr(getcwd(), '/build', 1)."/generate ".$page.'.en.reset 2>&1';
			exec($command, $cmd_output);
			$command = strstr(getcwd(), '/build', 1)."/generate ".$page.'.es.reset 2>&1';
			exec($command, $cmd_output);
		}

	} else {

		$protected_file = 1;

	}

	$file_content_en = file($file_en);
	$file_comments_en = preg_grep('/^[%].*/', $file_content_en);
	$file_data_en = array();

	$i = 0;
	while (in_array($file_content_en[$i], $file_comments_en)) {
		if (strstr($file_content_en[$i], '% TITLE=')) $file_data_en[0] = preg_replace('@%.*=(.*)$@', '\1', $file_content_en[$i]);
		else if (strstr($file_content_en[$i], '% SUBTITLE=')) $file_data_en[1] = preg_replace('@%.*=(.*)$@', '\1', $file_content_en[$i]);
		else if (strstr($file_content_en[$i], '% DESCRIPTION=')) $file_data_en[2] = preg_replace('@%.*=(.*)$@', '\1', $file_content_en[$i]);
		else if (strstr($file_content_en[$i], '% KEYWORDS=')) $file_data_en[3] = preg_replace('@%.*=(.*)$@', '\1', $file_content_en[$i]);
		unset($file_content_en[$i]);
		$i++;
	}

	$file_content_es = file($file_es);
	$file_comments_es = preg_grep('/^[%].*/', $file_content_es);
	$file_data_es = array();

	$i = 0;
	while (in_array($file_content_es[$i], $file_comments_es)) {
		if (strstr($file_content_es[$i], '% TITLE=')) $file_data_es[0] = preg_replace('@%.*=(.*)$@', '\1', $file_content_es[$i]);
		else if (strstr($file_content_es[$i], '% SUBTITLE=')) $file_data_es[1] = preg_replace('@%.*=(.*)$@', '\1', $file_content_es[$i]);
		else if (strstr($file_content_es[$i], '% DESCRIPTION=')) $file_data_es[2] = preg_replace('@%.*=(.*)$@', '\1', $file_content_es[$i]);
		else if (strstr($file_content_es[$i], '% KEYWORDS=')) $file_data_es[3] = preg_replace('@%.*=(.*)$@', '\1', $file_content_es[$i]);
		unset($file_content_es[$i]);
		$i++;
	}


?>

<section id="content">
<header>
	<hgroup>
		<h1>Edit</h1>
	</hgroup>
</header>
<article>

<?php

	if (isset($protected_file)) {

?>

<p class="error">Sorry, you can not edit this file.</p>
<p>It may be a system file. Remember users can only edit wiki files. Please, select a different one.</p>
<p>If you think this file should be edited, contact a developer or join the project and help us developing this website!</p>

<?php

	} else {

		if (isset($cmd_output)) {

?>

<form class="wiki_edit_cmd">
	<textarea><?php foreach ($cmd_output as $line) echo "$line\n"; ?></textarea>
</form>

<?php

		}

?>

<form action="" method="post" class="wiki_edit">
	<div id="left_column">
		<h1>English</h1>
		<hr />
		<label for="form_title_en">Title: <span class="form_required" title="This field is required">*</span></label>
		<input name="title_en" id="form_title_en" type="text" required="required" value="<?php if (isset($file_data_en[0])) echo $file_data_en[0]; ?>" />
		<label for="form_subtitle_en">Subtitle:</label>
		<input name="subtitle_en" id="form_subtitle_en" type="text" value="<?php if (isset($file_data_en[1])) echo $file_data_en[1]; ?>" />
		<label for="form_description_en">Description: <span class="form_required" title="This field is required">*</span></label>
		<input name="description_en" id="form_description_en" type="text" required="required" value="<?php if (isset($file_data_en[2])) echo $file_data_en[2]; ?>" />
		<label for="form_keywords_en">Keywords: <span class="form_required" title="This field is required">*</span></label>
		<input name="keywords_en" id="form_keywords_en" type="text" required="required" value="<?php if (isset($file_data_en[3])) echo $file_data_en[3]; ?>" />
		<textarea name="wiki_content_en"><?php echo implode($file_content_en); ?></textarea>
	</div>
	<div id="right_column">
		<h1>Español</h1>
		<hr />
		<label for="form_title_es">Título: <span class="form_required" title="This field is required">*</span></label>
		<input name="title_es" id="form_title_es" type="text" required="required" value="<?php if (isset($file_data_es[0])) echo $file_data_es[0]; ?>" />
		<label for="form_subtitle_es">Subtítulo:</label>
		<input name="subtitle_es" id="form_subtitle_es" type="text" value="<?php if (isset($file_data_es[1])) echo $file_data_es[1]; ?>" />
		<label for="form_description_es">Descripción: <span class="form_required" title="This field is required">*</span></label>
		<input name="description_es" id="form_description_es" type="text" required="required" value="<?php if (isset($file_data_es[2])) echo $file_data_es[2]; ?>" />
		<label for="form_keywords_es">Palabras clave: <span class="form_required" title="This field is required">*</span></label>
		<input name="keywords_es" id="form_keywords_es" type="text" required="required" value="<?php if (isset($file_data_es[3])) echo $file_data_es[3]; ?>" />
		<textarea name="wiki_content_es"><?php echo implode($file_content_es); ?></textarea>
	</div>
	<input  type="hidden" name="type" value="wiki_form" />
	<input type="submit" value="Save" accesskey="x" />
</form>

<?php

	}

?>

</article>
<footer>
	<p class="section_title">Edit</p>
</footer>
</section>
