<section id="content">
<header>
	<hgroup>
		<h1>Participation</h1>
	</hgroup>
</header>
<article>
	<header>
		<hgroup>
			<h1 id="Resume">Resume</h1>
		</hgroup>
		<hr />
	</header>

<?php

	// TODO: student_number should be session dependant...
	$student_number = 1;
	$form_processed = 0;

	require_once('../config.php');

	// Connect to the database
	$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

	// Check for database connection errors
	if (mysqli_connect_errno()) {

		echo '<p class="error"><strong>Error: </strong>could not connect to the database. Please, try again later.</p>';

	}

	if (isset($_POST['type']) && $_POST['type'] == 'student_academic_data') {

		// Form data overrides any other data

		$spd['studies'] = mysqli_real_escape_string($db, trim($_POST['studies']));
		$spd['higher_course'] = mysqli_real_escape_string($db, trim($_POST['higher_course']));
		$spd['speciality'] = mysqli_real_escape_string($db, trim($_POST['speciality']));
		$spd['begin_year'] = mysqli_real_escape_string($db, trim($_POST['begin_year']));
		$spd['additional_information'] = mysqli_real_escape_string($db, trim($_POST['addtional_information']));

		// Check if all fields have a non-empty value
		if ($spd['studies'] != "" &&
			$spd['higher_course'] != "" &&
			$spd['speciality'] != "" &&
			$spd['begin_year'] != "" &&
			$spd['additional_information'] != "" &&) {

			// Try to add a new row
			$query = "insert into academic_data values
									('".$student_number."',
									'".$spd['studies']."',
									'".$spd['higher_course']."',
									'".$spd['speciality']."',
									'".$spd['begin_year']."',
									'".$spd['additional_information']."')";
			// Check if we wrote the new row, otherwise, data existed for this student
			$result = mysqli_query($db, $query);

			// If data existed for this student, update it
			if (!$result) {
				$query = "update academic_data set
						   studies='".$spd['studies']."',
						   higher_course='".$spd['higher_course']."',
						   speciality='".$spd['speciality']."',
						   begin_year='".$spd['begin_year']."',
						   additional_information='".$spd['additional_information']."'
						   where student_number='".$student_number."'";
				$result = mysqli_query($db, $query);
			}

			// Inform the user about the operation
			if ($result) echo '<p class="info">Data saved successfuly.</p>';
			else echo '<p class="error"><strong>Error: </strong>could not write to the database. Please, try again later.</p>';

		} else {

			// Need to fill more fields in the form
			echo '<p class="warning">Please, fill all the required fields in the form!</p>';

		}

	} else {

		// Try to get data from the database
		$query = "select * from academic_data where student_number='".$student_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) { // $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($result);

				$spd['studies'] = $row['studies'];
				$spd['higher_year'] = $row['higher_year'];
				$spd['speciality'] = $row['speciality'];
				$spd['begin_year'] = $row['begin_year'];
				$spd['additional_information'] = $row['additional_information'];
			}

		}

	}

	// Close database connection
	mysqli_free_result($result);
	mysqli_close($db);

?>

	<form action="" method="post">
		<fieldset>
			<legend>Academic training:</legend>
			<div class="form_wrapper">
				<div class="form_warp">
					<label for="form_degree" class="singleline">Degree: <span class="form_required" title="This field is required">*</span></label>
					<select name="degree" id="form_degree" value="<?php if (isset($spd['studies'])) echo $spd['studies']; ?>" required="required">
						<option value=""></option>
						<option value="industrialengineering">Industrial Engineering</option>
						<option value="chemicalengineering">Chemical Engineering</option>
					</select>
					<label for="form_course" class="singleline">Higher course: <span class="form_required" title="This field is required">*</span></label>
					<select name="higher_course" id="form_course" value="<?php if (isset($spd['higher_course'])) echo $spd['higher_course']; ?>" required="required">
						<option value=""></option>
						<option value="3">3</option>
						<option value="3">4</option>
						<option value="3">5</option>
					</select>
					<label for="form_speciality">Speciality:<span class="form_required" title="This field is required">*</span></label>
						<select name="speciality" id="form_speciality" value="<?php if (isset($spd['speciality'])) echo $spd['speciality']; ?>" required="required">
							<option value=""></option>
							<option value="Electric">Electric</option>
							<option value="Mechanic">Mechanic</option>
							<option value="Electronic">Electronic</option>
						</select>
					<label for="form_startingyear">Starting year:<span class="form_required" title="This field is required">*</span></label>
							<select name="begin_year" id="form_startingyear" value="<?php if (isset($spd['begin_year'])) echo $spd['begin_year']; ?>" required="required">
								<option value=""></option>
								<option value="2005">2005</option>
								<option value="2006">2006</option>
								<option value="2007">2007</option>
								<option value="2008">2008</option>
								<option value="2009">2009</option>
								<option value="2010">2010</option>
							</select>
					<label for="form_additionalinfo">Additional info:</label>
					<textarea name="additional_information" id="form_additionalinfo" cols="50" rows="10"><?php if (isset($spd['additional_information'])) echo $spd['additional_information']; ?></textarea>
				</div>
			</div>
		</fieldset>
		<input  type="hidden" name="type" value="student_academic_data" />
		<input type="submit" value="Save" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
