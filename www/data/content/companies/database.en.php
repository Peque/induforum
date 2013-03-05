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

	<form action="/en/companies/results" method="post">
	
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
				<input type="checkbox" name="Windows" value="SO Windows" id="SO_Windows"/>
			    <label for="SO_Windows" class="checkbox">SO Windows:</label> <br>

				<input type="checkbox" name="Mac" value="SO Mac" id="SO_Mac"/>
     			<label for="SO_Mac" class="checkbox">SO Mac</label> <br>

				<input type="checkbox" name="Linux" value="SO Linux" id="SO_Linux"/>
				<label for="SO_Linux" class="checkbox">SO Linux</label> <br>


				<input type="checkbox" name="Databases" value="Data bases" id="Data_bases"/>

				<input type="checkbox" name="accounting/" value="Accounting/Finances" id="Accounting/Finances"/>
				<label for="Accounting/Finances" class="checkbox">Accounting/Finances</label> <br>

				<input type="checkbox" name="cad" value="Computer-aided design" id="Computer-aided_design"/>
				<label for="Computer-aided_desig" class="checkbox">Computer-aided desig</label> <br>


				<input type="checkbox" name="Graphic" value="Graphic Design" id="Graphic_Design"/>
				<label for="Graphic_Design" class="checkbox">Graphic design</label> <br>

				<input type="checkbox" name="Spreadsheet" value="Spreadsheet" id="Spreadsheet"/>

				<input type="checkbox" name="Email" value="Email" id="Email">
				<label for="Email" class="checkbox">Email</label> <br>


				<input type="checkbox" name="Mathematics" value="Mathematics/Statistics" id="Mathematics/Statistics"/>
				<label for="Mathematics/Statistics" class="checkbox">Mathematics/Statistics</label> <br>

				<input type="checkbox" name="Presentations" value="Presentations" id="Presentations"/>
				<label for="Presentations" class="checkbox">Presentations</label> <br>

				<input type="checkbox" name="Wordprocessors" value="Word processors" id="Word_processors"/>
				<label for="Word_processors" class="checkbox">Word processors</label> <br>


				<input type="checkbox" name="Programation" value="Programation" id="Programation"/>
				<label for="Programation" class="checkbox">Programation</label> <br>

				<input type="checkbox" name="Simulation" value="Simulation" id="Simulation"/>

				<input type="checkbox" name="Communications" value="Communications and networks" id="Communications_and_networks"/>
				<label for="Communications_and_networks" class="checkbox">Communications and networks</label> <br>

			</div>
			</fieldset>


			<fieldset>
				<legend>Proffessional experience</legend>
				<div class="form_wrapper">

				<label for="work_time" class="singleline">Work activity:</label>
				<select name="C_work_time" id="work_time" class="singleline">
					<option value="">Default: Any</option>
					<option value="1" >3 months or less</option>
					<option value="2" >6 months or less</option>
					<option value="3" >1 year or less</option>
					<option value="4" >2 year or less</option>
					<option value="3" >More than 2 years</option>
				</select>
				</div>
			</fieldset>
			<input type="submit" value="Search" accesskey="x" />

			
			

		<!--		<fieldset>
				<legend>Driver license</legend>
				<div class="form_wrapper">
				<label for="driver_license" class="singleline">Driver license:</label>
				<input type="radio" name="driver_license" value="Yes" />
				<input type="radio" name="driver_license" value="No" />
				</div>
				</fieldset>

			
			<input type="submit" value="Search" accesskey="x"  /> -->
			

	</form>
</article>
<footer>
	<p class="section_title">CV Data base</p>
</footer>
</section>
