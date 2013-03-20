<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /es/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['company_permissions']) {
		header('Location: /es/restricted_area/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Base de datos de CV</h1>
	</hgroup>
</header>
<article>

	<form action="/en/companies/results.es.php" method="post">

			<legend>Filtro de CV<legend>
			<fieldset>
			<legend>Academico</legend>
				<div class="form_wrapper">
				<label for="degree" class="singleline">Título:</label>
				<select name="C_studies" id="degree" class="singleline">
					<option value="">Cualquiera</option>
					<option value="industrialengineering" >Ingenieria Industrial</option>
					<option value="chemicalengineering">Ingenieria Química</option>
					<option value="organizationengineering">Ingenieria Organización Industrial</option>
					<option value="electronicengineering">Ingeniero Automática y Electrónica Industrial</option>
					<option value="industrialtechengineering">Grado en Ingeniería en Tecnologías Industriales</option>
					<option value="electricengineering">Grado en Ingeniería Eléctrica</option>
					<option value="automaticengineering">Grado en Ingeniería Electrónica Industrial y Automática</option>
					<option value="mechanicalengineering">Grado en Ingeniería Mecánica</option>
					<option value="orgnizationgradeengineering">Grado en Ingeniería de Organización</option>
					<option value="chemicalgradeengineering">Grado en Ingeniería Química</option>
					<option value="energyengineering">Grado en Ingeniería de la Energía</option>
				</select>




				<label for="course" class="singleline">Curso más alto:</label>
				<select name="C_higher_course" id="course" class="singleline">
					<option value="">Cualquier curso</option>
					<option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" >5</option>
				</select>

				<label for="speciality" class="singleline">Especialidad:</label>
					<select name="C_speciality" id="speciality" class="singleline">
						<option value="">Cualquier especialidad</option>
						<option value="Electric" >Eléctrica</option>
						<option value="Mechanic" >Mecánica - Máquinas</option>
						<option value="Electronic">Electrónica - Automática</option>
						<option value="Construction" >Mecánica - Construcción</option>
						<option value="Material" >Materiales</option>
						<option value="Organization">Organización Industrial</option>
						<option value="Chemical" >Química Industrial y Medio Ambiente</option>
						<option value="Energetic" >Técnicas Energéticas</option>
						<option value="Manufacturing">Fabricación</option>

					</select>
				</div>

			</fieldset>
			<fieldset>

				<legend>Languages</legend>

				<div class="form_checkbox">
				<input name="english" id="english" value="english" type="checkbox"/>
				<label for="english" class="checkbox">Inglés</label> <br>

				<input type="checkbox" name="french" value="french" id="french"/>
				<label for="french" class="checkbox">Francés</label> <br>

				<input type="checkbox" name="german" value="german" id="german"/>
				<label for="german" class="checkbox">Alemán</label> <br>

				<input type="checkbox" name="italian" value="italian" id="italian"/>
				<label for="italian" class="checkbox">Italiano</label> <br>

				<input type="checkbox" name="portuguese" value="portuguese" id="portuguese"/>
				<label for="portuguese" class="checkbox">Portugues</label> <br>

				<input type="checkbox" name="russian" value="russian" id="russian"/>
				<label for="russian" class="checkbox">Ruso</label> <br>

				<input type="checkbox" name="swedish" value="swedish" id="swedish"/>
				<label for="swedish" class="checkbox">Sueco</label> <br>

				<input type="checkbox" name="dutch" value="dutch" id="dutch"/>
				<label for="dutch" class="checkbox">Holandés</label> <br>

				<input type="checkbox" name="chinese" value="chinese" id="chinese"/>
				<label for="chinese" class="checkbox">Chino</label> <br>

				</div>
			</fieldset>


			<fieldset>

				<legend>Informática</legend>

				<div class="form_checkbox">
				<input type="checkbox" name="Windows" value="2 id="SO_Windows"/>
			    <label for="SO_Windows" class="checkbox">Windows</label> <br>

				<input type="checkbox" name="Mac" value="2" id="SO_Mac"/>
     			<label for="SO_Mac" class="checkbox">Mac</label> <br>

				<input type="checkbox" name="Linux" value="2" id="SO_Linux"/>
				<label for="SO_Linux" class="checkbox">Linux</label> <br>


				<input type="checkbox" name="Databases" value="2" id="Data_bases"/>
				<label for="Data_bases" class="checkbox">Bases de datos</label> <br>
				
				<input type="checkbox" name="accounting/" value="2" id="Accounting/Finances"/>
				<label for="Accounting/Finances" class="checkbox">Contabilidad/Finanzas</label> <br>

				<input type="checkbox" name="cad" value="2" id="Computer-aided_design"/>
				<label for="Computer-aided_desig" class="checkbox">Diseño asistido por ordenador</label> <br>


				<input type="checkbox" name="Graphic" value="2" id="Graphic_Design"/>
				<label for="Graphic_Design" class="checkbox">Diseño Gráfico</label> <br>

				<input type="checkbox" name="Spreadsheet" value="2" id="Spreadsheet"/>
				<label for="Spreadsheet" class="checkbox">Hojas de cálculo</label> <br>
				
				<input type="checkbox" name="Email" value="2" id="Email">
				<label for="Email" class="checkbox">Email</label> <br>

				<input type="checkbox" name="Mathematics" value="2" id="Mathematics/Statistics"/>
				<label for="Mathematics/Statistics" class="checkbox">Matemáticas/Estadística</label> <br>

				<input type="checkbox" name="Presentations" value="2" id="Presentations"/>
				<label for="Presentations" class="checkbox">Presentaciones</label> <br>

				<input type="checkbox" name="Wordprocessors" value="2" id="Word_processors"/>
				<label for="Word_processors" class="checkbox">Procesador de textos</label> <br>


				<input type="checkbox" name="Programation" value="2" id="Programation"/>
				<label for="Programation" class="checkbox">Programación</label> <br>

				<input type="checkbox" name="Simulation" value="2" id="Simulation"/>
				<label for="Simulation" class="checkbox">Simulación</label> <br>
				<input type="checkbox" name="Communications" value="2" id="Communications_and_networks"/>
				<label for="Communications_and_networks" class="checkbox">Redes y comunicaciones</label> <br>

			</div>
			</fieldset>


			<fieldset>
				<legend>Experiencia profesional</legend>
				<div class="form_wrapper">

				<label for="work_time" class="singleline">Experiencia:</label>
				<select name="C_work_time" id="work_time" class="singleline">
					<option value="0">Cualquiera</option>
					<option value="3" >Al menos 3 meses</option>
					<option value="6" >Al menos 6 meses</option>
					<option value="12" >Al menos 1 año</option>
					<option value="24" >Al menos 2 años</option>
				</select>
				</div>
			</fieldset>
			<input type="submit" value="Search" accesskey="x" />




		

	</form>
</article>
<footer>
	<p class="section_title">Base de datos de CV</p>
</footer>
</section>
