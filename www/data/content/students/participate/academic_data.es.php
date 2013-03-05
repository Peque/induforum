<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /es/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['student_permissions']) {
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
			<li class="current">Académico</li>
			<li><a href="/es/students/participate/languages/">Idiomas</a></li>
			<li><a href="/es/students/participate/professional_experience/">Profesional</a></li>
			<li><a href="/es/students/participate/computer_science/">Infomática</a></li>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>

<?php require_once('../../../data/academic_data.php'); ?>

	<form action="" method="post">
		<fieldset>
			<legend>Formación académica:</legend>
			<div class="form_wrapper">
				<label for="form_degree" class="singleline">Titulo: <span class="form_required" title="This field is required">*</span></label>
				<select name="studies" id="form_degree" required="required" class="singleline">
					<option value=""></option>
					<option value="industrialengineering" <?php if (isset($spd['studies'])&&$spd['studies']=="industrialengineering") echo 'selected="selected"'?>>Ingenieria Industrial</option>
					<option value="chemicalengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="chemicalengineering") echo 'selected="selected"'?>>Ingenieria Química</option>
					<option value="organizationengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="organizationengineering") echo 'selected="selected"'?>>Ingenieria Organización Industrial</option>
					<option value="electronicengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="electronicengineering") echo 'selected="selected"'?>>Ingeniero Automática y Electrónica Industrial</option>
					<option value="industrialtechengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="industrialtechengineering") echo 'selected="selected"'?>>Grado en Ingeniería en Tecnologías Industriales</option>
					<option value="electricengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="electricengineering") echo 'selected="selected"'?>>Grado en Ingeniería Eléctrica</option>
					<option value="automaticengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="chemicalengineering") echo 'selected="selected"'?>>Grado en Ingeniería Electrónica Industrial y Automática</option>
					<option value="mechanicalengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="chemicalengineering") echo 'selected="selected"'?>>Grado en Ingeniería Mecánica</option>
					<option value="orgnizationgradeengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="chemicalengineering") echo 'selected="selected"'?>>Grado en Ingeniería de Organización</option>
					<option value="chemicalgradeengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="chemicalengineering") echo 'selected="selected"'?>>Grado en Ingeniería Química</option>
					<option value="energyengineering"<?php if (isset($spd['studies'])&&$spd['studies']=="chemicalengineering") echo 'selected="selected"'?>>Grado en Ingeniería de la Energía</option>


				</select>
				<label for="form_course" class="singleline">Curso más alto: <span class="form_required" title="This field is required">*</span></label>
				<select name="higher_course" id="form_course"  required="required" class="singleline">
					<option value=""></option>
					<option value="3" <?php if (isset($spd['higher_course'])&&$spd['higher_course']=="3") echo 'selected="selected"'?>>3</option>
					<option value="4" <?php if (isset($spd['higher_course'])&&$spd['higher_course']=="4") echo 'selected="selected"'?>>4</option>
					<option value="5" <?php if (isset($spd['higher_course'])&&$spd['higher_course']=="5") echo 'selected="selected"'?>>5</option>
				</select>
				<label for="form_speciality" class="singleline">Especialidad:<span class="form_required" title="This field is required">*</span></label>
					<select name="speciality" id="form_speciality" required="required" class="singleline">
						<option value=""></option>
						<option value="Electric" <?php if (isset($spd['speciality'])&&$spd['speciality']=="Electric") echo 'selected="selected"'?>>Eléctrica</option>
						<option value="Mechanic" <?php if (isset($spd['speciality'])&&$spd['speciality']=="Mechanic") echo 'selected="selected"'?>>Mecánica - Máquinas</option>
						<option value="Electronic"<?php if (isset($spd['speciality'])&&$spd['speciality']=="Electronic") echo 'selected="selected"'?>>Electrónica - Automática</option>
						<option value="Construction" <?php if (isset($spd['speciality'])&&$spd['speciality']=="Construction") echo 'selected="selected"'?>>Mecánica - Construcción</option>
						<option value="Material" <?php if (isset($spd['speciality'])&&$spd['speciality']=="Material") echo 'selected="selected"'?>>Materiales</option>
						<option value="Organization"<?php if (isset($spd['speciality'])&&$spd['speciality']=="Organization") echo 'selected="selected"'?>>Organización Industrial</option>
						<option value="Chemical" <?php if (isset($spd['speciality'])&&$spd['speciality']=="Chemical") echo 'selected="selected"'?>>Química Industrial y Medio Ambiente</option>
						<option value="Energetic" <?php if (isset($spd['speciality'])&&$spd['speciality']=="Energetic") echo 'selected="selected"'?>>Técnicas Energéticas</option>
						<option value="Manufacturing"<?php if (isset($spd['speciality'])&&$spd['speciality']=="Manufacturing") echo 'selected="selected"'?>>Fabricación</option>

					</select>
				<label for="form_startingyear" class="singleline">Año de comienzo:<span class="form_required" title="This field is required">*</span></label>
						<select name="begin_year" id="form_startingyear"  required="required" class="singleline">
							<option value=""></option>
							<option value="2000" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2005") echo 'selected="selected"'?>>2000</option>
							<option value="2001" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2006") echo 'selected="selected"'?>>2001</option>
							<option value="2002" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2007") echo 'selected="selected"'?>>2002</option>
							<option value="2003" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2008") echo 'selected="selected"'?>>2003</option>
							<option value="2004" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2009") echo 'selected="selected"'?>>2004</option>
							<option value="2005" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2005") echo 'selected="selected"'?>>2005</option>
							<option value="2006" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2006") echo 'selected="selected"'?>>2006</option>
							<option value="2007" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2007") echo 'selected="selected"'?>>2007</option>
							<option value="2008" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2008") echo 'selected="selected"'?>>2008</option>
							<option value="2009" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2009") echo 'selected="selected"'?>>2009</option>
							<option value="2010" <?php if (isset($spd['begin_year'])&&$spd['begin_year']=="2010") echo 'selected="selected"'?>>2010</option>
						</select>
				<label for="form_additionalinfo" class="singleline">Información adicional:</label>
				<textarea name="additional_information" id="form_additionalinfo" cols="50" rows="10" class="singleline"><?php if (isset($spd['additional_information'])) echo str_replace('\r\n',"\r\n",$spd['additional_information']); ?></textarea>
			</div>
		</fieldset>
		<input  type="hidden" name="type" value="student_academic_data" />
		<input type="submit" value="Save" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Participación</p>
</footer>
</section>
