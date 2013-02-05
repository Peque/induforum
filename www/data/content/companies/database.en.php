<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['user_is_company']) {
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

	<form action="" method="post">
		<fieldset>
			<legend>CV Filter</legend>
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




				<input type="checkbox" name="C_languages" value="english" id="english">
				<input type="checkbox" name="C_languages" value="french" id="french">
				<input type="checkbox" name="C_languages" value="german" id="german">
				<input type="checkbox" name="C_languages" value="italian" id="italian">
				<input type="checkbox" name="C_languages" value="portuguese" id="portuguese">
				<input type="checkbox" name="C_languages" value="russian" id="russian">
				<input type="checkbox" name="C_languages" value="swedish" id="swedish">
				<input type="checkbox" name="C_languages" value="dutch" id="dutch">
				<input type="checkbox" name="C_languages" value="chinese" id="chinese">






				<input type="checkbox" name="C_computing" value="SO Windows" id="SO_Windows">
				<input type="checkbox" name="C_computing" value="SO Mac" id="SO_Mac">
				<input type="checkbox" name="C_computing" value="SO Linux" id="SO_Linux">
				<input type="checkbox" name="C_computing" value="Data bases" id="Data_bases">
				<input type="checkbox" name="C_computing" value="Accounting/Finances" id="Accounting/Finances">
				<input type="checkbox" name="C_computing" value="Computer-aided design" id="Computer-aided_design">
				<input type="checkbox" name="C_computing" value="Graphic Design" id="Graphic_Design">
				<input type="checkbox" name="C_computing" value="Spreadsheet" id="Spreadsheet">
				<input type="checkbox" name="C_computing" value="Email" id="Email">
				<input type="checkbox" name="C_computing" value="Mathematics/Statistics" id="Mathematics/Statistics">
				<input type="checkbox" name="C_computing" value="Presentations" id="Presentations">
				<input type="checkbox" name="C_computing" value="Word processors" id="Word_processors">
				<input type="checkbox" name="C_computing" value="Programation" id="Programation">
				<input type="checkbox" name="C_computing" value="Simulation" id="Simulation">
				<input type="checkbox" name="C_computing" value="Communications and networks" id="Communications_and_networks">


				<label for="work_time" class="singleline">Work activity:</label>
				<select name="C_work_time" id="work_time" class="singleline">
					<option value="">Default: Any</option>
					<option value="1" >3 months or less</option>
					<option value="2" >6 months or less</option>
					<option value="3" >1 year or less</option>
					<option value="4" >2 year or less</option>
					<option value="3" >More than 2 years</option>
				</select>



				<label for="driver_license" class="singleline">Driver license:</label>
				<input type="radio" name="driver_license" value="Yes" id="driver_license">
				<input type="radio" name="driver_license" value="No">





			</div>
		</fieldset>
		<input type="submit" value="Search" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">CV Data base</p>
</footer>
</section>
