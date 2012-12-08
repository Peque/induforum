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

	if (isset($_POST['type']) && $_POST['type'] == 'student_languages') {

		// Form data overrides any other data

		$spd['language'] = mysqli_real_escape_string($db, trim($_POST['language']));
		$spd['listening'] = mysqli_real_escape_string($db, trim($_POST['listening']));
		$spd['reading'] = mysqli_real_escape_string($db, trim($_POST['reading']));
		$spd['spoken_interaction'] = mysqli_real_escape_string($db, trim($_POST['spoken_interaction']));
		$spd['spoken_production'] = mysqli_real_escape_string($db, trim($_POST['spoken_production']));
		$spd['writing'] = mysqli_real_escape_string($db, trim($_POST['writing']));
		// Check if all fields have a non-empty value
		if ($spd['language'] != "" &&
			$spd['listening'] != "" &&
			$spd['reading'] != "" &&
			$spd['spoken_interaction'] != "" &&
			$spd['spoken_production'] != "" &&
			$spd['writing'] != "") {

			// Try to add a new row
			$query = "insert into languages values
									('".$student_number."',
									'".$spd['language']."',
									'".$spd['listening']."',
									'".$spd['reading']."',
									'".$spd['spoken_interaction']."',
									'".$spd['spoken_production']."',
									'".$spd['writing']."')";
			// Check if we wrote the new row, otherwise, data existed for this student
			$result = mysqli_query($db, $query);

			// If data existed for this student, update it
			if (!$result) {
				$query = "update languages set
						   language='".$spd['language']."',
						   listening='".$spd['listening']."',
						   reading='".$spd['reading']."',
						   spoken_interaction='".$spd['spoken_interaction']."',
						   spoken_production='".$spd['spoken_production']."',
						   writing='".$spd['writing']."'
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
		$query = "select * from languages where student_number='".$student_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) { // $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($result);

				$spd['language'] = $row['language'];
				$spd['listening'] = $row['listening'];
				$spd['reading'] = $row['reading'];
				$spd['spoken_interaction'] = $row['spoken_interaction'];
				$spd['spoken_production'] = $row['spoken_production'];
				$spd['writing'] = $row['writing'];
			
			}

		}

	}

	// Close database connection
	mysqli_free_result($result);
	mysqli_close($db);

?>

	<form action="" method="post">
		<fieldset>
				<legend>Languages</legend>
					<div class="form_wrapper">
						<label for="form_languages" class="singleline">Number of languages:<span class="form_required" title="This field is required">*</span></label>
							<select name="languages" id="form_languages" class="singleline" required="required">
								<option value=""></option>
								<option value="1">1 </option>
								<option value="2">2 </option>
								<option value="3">3 </option>
								<option value="4">4 </option>
								<option value="5">5 </option>
							</select>
							<label for="form_language1" class="singleline">Language<span class="form_required" title="This field is required">*</span></label>
							<select name="language1" id="form_language1" class="singleline" required="required">
								<option value=""></option>
								<option value="english">English</option>
								<option value="french">French</option>
								<option value="german">German</option>
								<option value="italian">Italian</option>
								<option value="portuguese">Portuguese</option>
								<option value="russian">Russian</option>
								<option value="swedish">Swedish</option>
								<option value="dutch">Dutch</option>
								<option value="chinese">Chinese</option>
							</select>
							<label for="spoken_interaction1" class="singleline">Spoken Interaction</label>
							<select name="spoken_interaction1" id="spoken_interaction1" class="singleline">
								<option value="">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="spoken_production1" class="singleline">Spoken Production</label>
							<select name="spoken_production1" id="spoken_production1" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="reading1" class="singleline">Reading</label>
							<select name="reading1" id="reading1" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="writing1" class="singleline">Writing</label>
							<select name="writing1" id="writing1" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="listening1" class="singleline">Listening</label>
							<select name="listening1" id="listening1" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="form_language2" class="singleline">Language</label>
							<select name="language2" id="form_language2" class="singleline" >
								<option value=""></option>
								<option value="english">English</option>
								<option value="french">French</option>
								<option value="german">German</option>
								<option value="italian">Italian</option>
								<option value="portuguese">Portuguese</option>
								<option value="russian">Russian</option>
								<option value="swedish">Swedish</option>
								<option value="dutch">Dutch</option>
								<option value="chinese">Chinese</option>
							</select>
							<label for="spoken_interaction2" class="singleline">Spoken Interaction</label>
							<select name="spoken_interaction2" id="spoken_interaction2" class="singleline">
								<option value="">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="spoken_production2" class="singleline">Spoken Production</label>
							<select name="spoken_production2" id="spoken_production2" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="reading2" class="singleline">Reading</label>
							<select name="reading2" id="reading2" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="writing2" class="singleline">Writing</label>
							<select name="writing2" id="writing2" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="listening2" class="singleline">Listening</label>
							<select name="listening2" id="listening2" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="form_language3" class="singleline">Language</label>
							<select name="language3" id="form_language3" class="singleline" >
								<option value=""></option>
								<option value="english">English</option>
								<option value="french">French</option>
								<option value="german">German</option>
								<option value="italian">Italian</option>
								<option value="portuguese">Portuguese</option>
								<option value="russian">Russian</option>
								<option value="swedish">Swedish</option>
								<option value="dutch">Dutch</option>
								<option value="chinese">Chinese</option>
							</select>
							<label for="spoken_interaction3" class="singleline">Spoken Interaction</label>
							<select name="spoken_interaction3" id="spoken_interaction3" class="singleline">
								<option value="">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="spoken_production3" class="singleline">Spoken Production</label>
							<select name="spoken_production3" id="spoken_production3" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="reading3" class="singleline">Reading</label>
							<select name="reading3" id="reading3" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="writing3" class="singleline">Writing</label>
							<select name="writing3" id="writing3" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="listening3" class="singleline">Listening</label>
							<select name="listening3" id="listening3" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>

					</div>
			</fieldset>
		<input  type="hidden" name="type" value="student_languages" />
		<input type="submit" value="Save" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
