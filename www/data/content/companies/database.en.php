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
		<h1>CV Data base</h1>
	</hgroup>
</header>
<article>

	<form action="/en/companies/results/" method="post">

			<legend>CV Filter<legend>
			<fieldset>
			<legend>Academic</legend>
				<div class="form_wrapper">
				<label for="degree" class="singleline">Degree:</label>
				<select name="C_studies" id="degree" class="singleline">
					<option value="">Default: Any degree</option>
					<option value="industrialengineering" >Industrial Engineering</option>
					<option value="chemicalengineering">Chemical Engineering</option>
					<option value="organizationengineering">Industrial Organization Engineering</option>
					<option value="electronicengineering">Industrial Electronic Engineering </option>
					<option value="industrialtechengineering">Industrial Technologies Engineering Grade</option>
					<option value="electricengineering">Electric Engineering Grade</option>
					<option value="automaticengineering">Industrial Electronic Engineering Grade</option>
					<option value="mechanicalengineering">Mechanical Engineering Grade</option>
					<option value="orgnizationgradeengineering">Organization Engineering Grade</option>
					<option value="chemicalgradeengineering">Chemical Engineering Grade</option>
					<option value="energyengineering">Energy Engineering Grade</option>
				</select>




				<label for="course" class="singleline">Higher course:</label>
				<select name="C_higher_course" id="course" class="singleline">
					<option value="">Default: Any course</option>
					<option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" >5</option>
				</select>

				<label for="speciality" class="singleline">Speciality:</label>
					<select name="C_speciality" id="speciality" class="singleline">
						<option value="">Default: Any speciality</option>
						<option value="Electric" >Electric</option>
						<option value="Mechanic" >Mechanic - Machines</option>
						<option value="Electronic">Electronic</option>
						<option value="Construction" >Mechanic - Construction</option>
						<option value="Material" >Materials</option>
						<option value="Organization">Industrial Organization</option>
						<option value="Chemical" >Industrial Chemistry</option>
						<option value="Energetic" >Energetic Technics</option>
						<option value="Manufacturing">Manufacturing</option>

					</select>
				</div>

			</fieldset>
			<fieldset>

				<legend>Languages</legend>

				<div class="form_checkbox">
				<input name="english" id="english" value="english" type="checkbox"/>
				<label for="english" class="checkbox">English</label> <br>

				<input type="checkbox" name="french" value="french" id="french"/>
				<label for="french" class="checkbox">French</label> <br>

				<input type="checkbox" name="german" value="german" id="german"/>
				<label for="german" class="checkbox">German</label> <br>

				<input type="checkbox" name="italian" value="italian" id="italian"/>
				<label for="italian" class="checkbox">Italian</label> <br>

				<input type="checkbox" name="portuguese" value="portuguese" id="portuguese"/>
				<label for="portuguese" class="checkbox">Portuguese</label> <br>

				<input type="checkbox" name="russian" value="russian" id="russian"/>
				<label for="russian" class="checkbox">Russian</label> <br>

				<input type="checkbox" name="swedish" value="swedish" id="swedish"/>
				<label for="swedish" class="checkbox">Swedish</label> <br>

				<input type="checkbox" name="dutch" value="dutch" id="dutch"/>
				<label for="dutch" class="checkbox">Dutch</label> <br>

				<input type="checkbox" name="chinese" value="chinese" id="chinese"/>
				<label for="chinese" class="checkbox">Chinese</label> <br>

				</div>
			</fieldset>


			<fieldset>

				<legend>Computing</legend>

				<div class="form_checkbox">
				<input type="checkbox" name="Windows" value="2" id="SO_Windows"/>
			    <label for="SO_Windows" class="checkbox">Windows OS:</label> <br>

				<input type="checkbox" name="Mac" value="2" id="SO_Mac"/>
     			<label for="SO_Mac" class="checkbox">Mac OS</label> <br>

				<input type="checkbox" name="Linux" value="2" id="SO_Linux"/>
				<label for="SO_Linux" class="checkbox">Linux OS</label> <br>


				<input type="checkbox" name="Databases" value="2" id="Data_bases"/>
				<label for="Data_bases" class="checkbox">Data Bases</label> <br>
				
				<input type="checkbox" name="accounting/" value="2" id="Accounting/Finances"/>
				<label for="Accounting/Finances" class="checkbox">Accounting/Finances</label> <br>

				<input type="checkbox" name="cad" value="2" id="Computer-aided_design"/>
				<label for="Computer-aided_design" class="checkbox">Computer-aided desig</label> <br>


				<input type="checkbox" name="Graphic" value="2" id="Graphic_Design"/>
				<label for="Graphic_Design" class="checkbox">Graphic design</label> <br>

				<input type="checkbox" name="Spreadsheet" value="2" id="Spreadsheet"/>
				<label for="Spreadsheet" class="checkbox">Spreadsheet</label> <br>

				<input type="checkbox" name="Email" value="2" id="Email">
				<label for="Email" class="checkbox">Email</label> <br>


				<input type="checkbox" name="Mathematics" value="2" id="Mathematics/Statistics"/>
				<label for="Mathematics/Statistics" class="checkbox">Mathematics/Statistics</label> <br>

				<input type="checkbox" name="Presentations" value="2" id="Presentations"/>
				<label for="Presentations" class="checkbox">Presentations</label> <br>

				<input type="checkbox" name="Wordprocessors" value="2" id="Word_processors"/>
				<label for="Word_processors" class="checkbox">Word processors</label> <br>


				<input type="checkbox" name="Programation" value="2" id="Programation"/>
				<label for="Programation" class="checkbox">Programation</label> <br>

				<input type="checkbox" name="Simulation" value="2" id="Simulation"/>
				<label for="Simulation" class="checkbox">Simulation</label> <br>

				<input type="checkbox" name="Communications" value="2" id="Communications_and_networks"/>
				<label for="Communications_and_networks" class="checkbox">Communications and networks</label> <br>

			</div>
			</fieldset>


			<fieldset>
				<legend>Proffessional experience</legend>
				<div class="form_wrapper">

				<label for="work_time" class="singleline">Work activity:</label>
				<select name="C_work_time" id="work_time" class="singleline">
					<option value="0">Default: Any</option>
					<option value="3" >At least 3 months</option>
					<option value="6" >At least 6 months</option>
					<option value="12" >At least 1 year</option>
					<option value="24" >At least 2 year</option>
				</select>
				</div>
			</fieldset>
			<input type="submit" value="Search" accesskey="x" />




	


	</form>
</article>
<footer>
	<p class="section_title">CV Data base</p>
</footer>
</section>
