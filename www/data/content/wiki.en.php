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

	$file_content_en = file(strstr(getcwd(), '/build', 1).'/data/content/'.$page.'.en.reset');
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

	$file_content_es = file(strstr(getcwd(), '/build', 1).'/data/content/'.$page.'.es.reset');
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
<form class="wiki_edit">
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
		<textarea><?php echo implode($file_content_en); ?></textarea>
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
		<textarea><?php echo implode($file_content_es); ?></textarea>
	</div>
</form>
</article>
<footer>
	<p class="section_title">Edit</p>
</footer>
</section>
