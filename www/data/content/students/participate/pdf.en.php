<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['student_permissions']) {
		header('Location: /en/restricted_area/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Participation</h1>
	</hgroup>
</header>
<article>
	<nav class="tabs_nav">
		<ul>
			<li><a href="/en/students/participate/personal_data/">Personal</a></li>
			<li><a href="/en/students/participate/academic_data/">Academic</a></li>
			<li><a href="/en/students/participate/languages/">Languages</a></li>
			<li><a href="/en/students/participate/professional_experience/">Professional</a></li>
			<li><a href="/en/students/participate/computer_science/">Computing</a></li>
			<li class="current">PDF</li>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>

<?php

	require_once(strstr(getcwd(), '/build', 1).'/data/form_to_db.php');

	if (form_to_db('upload_pdf', array(''))) {

?>

<?php

	if (file_exists(strstr(getcwd(), '/build', 1).'/uploads/'.$_SESSION['user_id'])) {

?>

	<p class="warning">You have already uploaded a PDF. If you upload a new one, it will be overwritten. <a href="/en/download_resume/">Check your current upload</a>.</p>

<?php

	}

?>

	<p>You can select a local PDF with your resume to upload it to our system and make it available for the companies.</p>
	<form action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>PDF:</legend>
			<div class="form_wrapper">
				<label for="form_resume" class="singleline">File: <span class="form_required" title="This field is required">*</span></label>
				<input type="file" name="resume" id="form_resume" class="singleline" required="required" />
			</div>
		</fieldset>
		<input  type="hidden" name="type" value="upload_pdf" />
		<input type="submit" value="Upload" accesskey="x" />
	</form>

<?php

	} else {

?>

	<p class="info">Your PDF has been uploaded successfuly to the server! You can <a href="/en/download_resume/"> check your upload</a>.</p>

<?php

	}

?>

</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
