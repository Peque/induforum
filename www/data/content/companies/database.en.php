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



				<label for="english" class="checkbox">English:</label>
				<input type="checkbox" name="english" value="english" id="english">
				<label for="french" class="checkbox">french:</label>
				<input type="checkbox" name="french" value="french" id="french">
				<label for="german" class="checkbox">german:</label>
				<input type="checkbox" name="german" value="german" id="german">
				<label for="italian" class="checkbox">italian:</label>
				<input type="checkbox" name="italian" value="italian" id="italian">
				<label for="portuguese" class="checkbox">portuguese:</label>
				<input type="checkbox" name="portuguese" value="portuguese" id="portuguese">
				<label for="russian" class="checkbox">russian:</label>
				<input type="checkbox" name="russian" value="russian" id="russian">
				<label for="swedish" class="checkbox">swedish:</label>
				<input type="checkbox" name="swedish" value="swedish" id="swedish">
				<label for="dutch" class="checkbox">dutch:</label>
				<input type="checkbox" name="dutch" value="dutch" id="dutch">
				<label for="chinese" class="checkbox">chinese:</label>
				<input type="checkbox" name="chinese" value="chinese" id="chinese">





			    <label for="languages" class="checkbox">Languages:</label>
				<input type="checkbox" name="SO Windows" value="SO Windows" id="SO_Windows">
				<input type="checkbox" name="SO Mac" value="SO Mac" id="SO_Mac">
				<input type="checkbox" name="SO Linux" value="SO Linux" id="SO_Linux">
				<input type="checkbox" name="Data bases" value="Data bases" id="Data_bases">
				<input type="checkbox" name="ccounting/Finances" value="Accounting/Finances" id="Accounting/Finances">
				<input type="checkbox" name="omputer-aided design" value="Computer-aided design" id="Computer-aided_design">
				<input type="checkbox" name="Graphic Design" value="Graphic Design" id="Graphic_Design">
				<input type="checkbox" name="Spreadsheet" value="Spreadsheet" id="Spreadsheet">
				<input type="checkbox" name="Email" value="Email" id="Email">
				<input type="checkbox" name="Mathematics/Statistics" value="Mathematics/Statistics" id="Mathematics/Statistics">
				<input type="checkbox" name="Presentations" value="Presentations" id="Presentations">
				<input type="checkbox" name="Word processors" value="Word processors" id="Word_processors">
				<input type="checkbox" name="Programation" value="Programation" id="Programation">
				<input type="checkbox" name="Simulation" value="Simulation" id="Simulation">
				<input type="checkbox" name="Communications and networks" value="Communications and networks" id="Communications_and_networks">


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
