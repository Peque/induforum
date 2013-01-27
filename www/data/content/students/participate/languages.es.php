<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /es/login/');
		exit;
	}

	// Check user privileges
	if ($_SESSION['type'] != 'student_session') {
		header('Location: /es/restricted_area/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Participación</h1>
	</hgroup>
</header>
<article>
	<nav class="tabs_nav">
		<ul>
			<li><a href="/es/students/participate/personal_data/">Personal</a></li>
			<li><a href="/es/students/participate/academic_data/">Académico</a></li>
			<li class="current">Idiomas</li>
			<li><a href="/es/students/participate/professional_experience/">Profesional</a></li>
			<li><a href="/es/students/participate/computer_science/">Infomática</a></li>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>

	<p>
		<strong>Nota importante:</strong> Niveles de acuerdo con el <a href="http://es.wikipedia.org/wiki/Marco_com%C3%BAn_europeo_de_referencia_para_las_lenguas">Marco Común Europeo de Referencia para las Lenguas</a> (MCERL).
	</p>

<?php require_once('../../../data/languages.php'); ?>

	<form action="" method="post">
		<fieldset>
		<legend>Idiomas</legend>
			<div class="form_wrapper">
				<label for="form_languages" class="singleline">Numero de idiomas:<span class="form_required" title="This field is required">*</span></label>
				<select name="languages" id="form_languages" class="singleline" required="required">
					<option value=""></option>
					<option value="1" <?php if (isset($num_results)&&$num_results=="1") echo 'selected="selected"'?>>1 </option>
					<option value="2" <?php if (isset($num_results)&&$num_results=="2") echo 'selected="selected"'?>>2 </option>
					<option value="3" <?php if (isset($num_results)&&$num_results=="3") echo 'selected="selected"'?>>3 </option>
				</select>
			</div>
			<div class="form_wrapper">
				<label for="form_language0" class="singleline">Idioma:<span class="form_required" title="This field is required">*</span></label>
				<select name="language0" id="form_language0" class="singleline" required="required">
					<option value=""></option>
					<option value="english" <?php if (isset($language[0])&&$language[0]=="english") echo 'selected="selected"'?>>Inglés</option>
					<option value="french" <?php if (isset($language[0])&&$language[0]=="french") echo 'selected="selected"'?>>Francés</option>
					<option value="german" <?php if (isset($language[0])&&$language[0]=="german") echo 'selected="selected"'?>>Alemán</option>
					<option value="italian" <?php if (isset($language[0])&&$language[0]=="italian") echo 'selected="selected"'?>>Italiano</option>
					<option value="portuguese" <?php if (isset($language[0])&&$language[0]=="portuguese") echo 'selected="selected"'?>>Portugués</option>
					<option value="russian" <?php if (isset($language[0])&&$language[0]=="russian") echo 'selected="selected"'?>>Ruso</option>
					<option value="swedish" <?php if (isset($language[0])&&$language[0]=="swedish") echo 'selected="selected"'?>>Sueco</option>
					<option value="dutch" <?php if (isset($language[0])&&$language[0]=="dutch") echo 'selected="selected"'?>>Holandés</option>
					<option value="chinese" <?php if (isset($language[0])&&$language[0]=="chinese") echo 'selected="selected"'?>>Chino</option>
				</select>
				<label for="spoken_interaction0" class="singleline">Interacción oral</label>
				<select name="spoken_interaction0" id="spoken_interaction0" class="singleline">
					<option value=""></option>
					<option value="A1" <?php if (isset($interaction[0])&&$interaction[0]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($interaction[0])&&$interaction[0]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($interaction[0])&&$interaction[0]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($interaction[0])&&$interaction[0]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($interaction[0])&&$interaction[0]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($interaction[0])&&$interaction[0]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="spoken_production0" class="singleline">Expresión oral</label>
				<select name="spoken_production0" id="spoken_production0" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($production[0])&&$production[0]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($production[0])&&$production[0]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($production[0])&&$production[0]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($production[0])&&$production[0]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($production[0])&&$production[0]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($production[0])&&$production[0]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="reading0" class="singleline">Comprensión de lectura</label>
				<select name="reading0" id="reading0" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($reading[0])&&$reading[0]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($reading[0])&&$reading[0]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($reading[0])&&$reading[0]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($reading[0])&&$reading[0]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($reading[0])&&$reading[0]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($reading[0])&&$reading[0]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="writing0" class="singleline">Expresión escrita</label>
				<select name="writing0" id="writing0" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($writing[0])&&$writing[0]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($writing[0])&&$writing[0]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($writing[0])&&$writing[0]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($writing[0])&&$writing[0]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($writing[0])&&$writing[0]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($writing[0])&&$writing[0]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="listening0" class="singleline">Comprensión auditiva</label>
				<select name="listening0" id="listening0" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($listening[0])&&$listening[0]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($listening[0])&&$listening[0]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($listening[0])&&$listening[0]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($listening[0])&&$listening[0]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($listening[0])&&$listening[0]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($listening[0])&&$listening[0]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
			</div>
			<div class="form_wrapper">
				<label for="form_language1" class="singleline">Idioma:</label>
				<select name="language1" id="form_language1" class="singleline" >
					<option value=""></option>
					<option value="english" <?php if (isset($language[1])&&$language[1]=="english") echo 'selected="selected"'?>>Inglés</option>
					<option value="french" <?php if (isset($language[1])&&$language[1]=="french") echo 'selected="selected"'?>>Francés</option>
					<option value="german" <?php if (isset($language[1])&&$language[1]=="german") echo 'selected="selected"'?>>Alemán</option>
					<option value="italian" <?php if (isset($language[1])&&$language[1]=="italian") echo 'selected="selected"'?>>Italiano</option>
					<option value="portuguese" <?php if (isset($language[1])&&$language[1]=="portuguese") echo 'selected="selected"'?>>Portugués</option>
					<option value="russian" <?php if (isset($language[1])&&$language[1]=="russian") echo 'selected="selected"'?>>Ruso</option>
					<option value="swedish" <?php if (isset($language[1])&&$language[1]=="swedish") echo 'selected="selected"'?>>Sueco</option>
					<option value="dutch" <?php if (isset($language[1])&&$language[1]=="dutch") echo 'selected="selected"'?>>Holandés</option>
					<option value="chinese" <?php if (isset($language[1])&&$language[1]=="chinese") echo 'selected="selected"'?>>Chino</option>
				</select>
				<label for="spoken_interaction1" class="singleline">Interacción oral</label>
				<select name="spoken_interaction1" id="spoken_interaction1" class="singleline">
					<option value=""></option>
					<option value="A1" <?php if (isset($interaction[1])&&$interaction[1]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($interaction[1])&&$interaction[1]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($interaction[1])&&$interaction[1]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($interaction[1])&&$interaction[1]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($interaction[1])&&$interaction[1]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($interaction[1])&&$interaction[1]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="spoken_production1" class="singleline">Expresión oral</label>
				<select name="spoken_production1" id="spoken_production1" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($production[1])&&$production[1]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($production[1])&&$production[1]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($production[1])&&$production[1]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($production[1])&&$production[1]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($production[1])&&$production[1]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($production[1])&&$production[1]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="reading1" class="singleline">Comprensión de lectura</label>
				<select name="reading1" id="reading1" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($reading[1])&&$reading[1]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($reading[1])&&$reading[1]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($reading[1])&&$reading[1]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($reading[1])&&$reading[1]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($reading[1])&&$reading[1]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($reading[1])&&$reading[1]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="writing1" class="singleline">Expresión escrita</label>
				<select name="writing1" id="writing1" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($writing[1])&&$writing[1]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($writing[1])&&$writing[1]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($writing[1])&&$writing[1]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($writing[1])&&$writing[1]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($writing[1])&&$writing[1]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($writing[1])&&$writing[1]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="listening1" class="singleline">Comprensión auditiva</label>
				<select name="listening1" id="listening1" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($listening[1])&&$listening[1]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($listening[1])&&$listening[1]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($listening[1])&&$listening[1]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($listening[1])&&$listening[1]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($listening[1])&&$listening[1]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($listening[1])&&$listening[1]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
			</div>
			<div class="form_wrapper">
				<label for="form_language2" class="singleline">Idioma:</label>
				<select name="language2" id="form_language2" class="singleline" >
					<option value=""></option>
					<option value="english" <?php if (isset($language[2])&&$language[2]=="english") echo 'selected="selected"'?>>Inglés</option>
					<option value="french" <?php if (isset($language[2])&&$language[2]=="french") echo 'selected="selected"'?>>Francés</option>
					<option value="german" <?php if (isset($language[2])&&$language[2]=="german") echo 'selected="selected"'?>>Alemán</option>
					<option value="italian" <?php if (isset($language[2])&&$language[2]=="italian") echo 'selected="selected"'?>>Italiano</option>
					<option value="portuguese" <?php if (isset($language[2])&&$language[2]=="portuguese") echo 'selected="selected"'?>>Portugués</option>
					<option value="russian" <?php if (isset($language[2])&&$language[2]=="russian") echo 'selected="selected"'?>>Ruso</option>
					<option value="swedish" <?php if (isset($language[2])&&$language[2]=="swedish") echo 'selected="selected"'?>>Sueco</option>
					<option value="dutch" <?php if (isset($language[2])&&$language[2]=="dutch") echo 'selected="selected"'?>>Holandés</option>
					<option value="chinese" <?php if (isset($language[2])&&$language[2]=="chinese") echo 'selected="selected"'?>>Chino</option>
				</select>
				<label for="spoken_interaction2" class="singleline">Interacción oral	</label>
				<select name="spoken_interaction2" id="spoken_interaction2" class="singleline">
					<option value=""></option>
					<option value="A1" <?php if (isset($interaction[2])&&$interaction[2]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($interaction[2])&&$interaction[2]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($interaction[2])&&$interaction[2]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($interaction[2])&&$interaction[2]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($interaction[2])&&$interaction[2]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($interaction[2])&&$interaction[2]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="spoken_production2" class="singleline">Expresión oral</label>
				<select name="spoken_production2" id="spoken_production2" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($production[2])&&$production[2]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($production[2])&&$production[2]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($production[2])&&$production[2]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($production[2])&&$production[2]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($production[2])&&$production[2]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($production[2])&&$production[2]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="reading2" class="singleline">Comprensión de lectura</label>
				<select name="reading2" id="reading2" class="singleline">
								<option value="noreply"></option>
					<option value="A1" <?php if (isset($reading[2])&&$reading[2]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($reading[2])&&$reading[2]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($reading[2])&&$reading[2]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($reading[2])&&$reading[2]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($reading[2])&&$reading[2]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($reading[2])&&$reading[2]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="writing2" class="singleline">Expresión escrita</label>
				<select name="writing2" id="writing2" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($writing[2])&&$writing[2]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($writing[2])&&$writing[2]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($writing[2])&&$writing[2]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($writing[2])&&$writing[2]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($writing[2])&&$writing[2]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($writing[2])&&$writing[2]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
				<label for="listening2" class="singleline">Comprensión auditiva</label>
				<select name="listening2" id="listening2" class="singleline">
					<option value="noreply"></option>
					<option value="A1" <?php if (isset($listening[2])&&$listening[2]=="A1") echo 'selected="selected"'?>>A1</option>
					<option value="A2" <?php if (isset($listening[2])&&$listening[2]=="A2") echo 'selected="selected"'?>>A2</option>
					<option value="B1" <?php if (isset($listening[2])&&$listening[2]=="B1") echo 'selected="selected"'?>>B1</option>
					<option value="B2" <?php if (isset($listening[2])&&$listening[2]=="B2") echo 'selected="selected"'?>>B2</option>
					<option value="C1" <?php if (isset($listening[2])&&$listening[2]=="C1") echo 'selected="selected"'?>>C1</option>
					<option value="C2" <?php if (isset($listening[2])&&$listening[2]=="C2") echo 'selected="selected"'?>>C2</option>
				</select>
			</div>
		</fieldset>
		<input  type="hidden" name="type" value="student_languages" />
		<input type="submit" value="Save" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Participación</p>
</footer>
</section>
