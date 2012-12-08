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

	if (isset($_POST['type']) && $_POST['type'] == 'student_proffesional_experience') {

		// Form data overrides any other data

		$spd['initial_date'] = mysqli_real_escape_string($db, trim($_POST['initial_date']));
		$spd['final_date'] = mysqli_real_escape_string($db, trim($_POST['final_date']));
		$spd['company'] = mysqli_real_escape_string($db, trim($_POST['company']));
		$spd['job'] = mysqli_real_escape_string($db, trim($_POST['job']));
		$spd['description_experience'] = mysqli_real_escape_string($db, trim($_POST['description_experience']));
		// Check if all fields have a non-empty value
		if ($spd['initial_date'] != "" &&
			$spd['final_date'] != "" &&
			$spd['company'] != "" &&
			$spd['job'] != "" &&
			$spd['description_experience'] != "" ) {

			// Try to add a new row
			$query = "insert into work_experience values
									('".$student_number."',
									'".$spd['initial_date']."',
									'".$spd['final_date']."',
									'".$spd['company']."',
									'".$spd['job']."',
									'".$spd['description_experience']."')";
			// Check if we wrote the new row, otherwise, data existed for this student
			$result = mysqli_query($db, $query);

			// If data existed for this student, update it
			if (!$result) {
				$query = "update work_experience set
						   initial_date='".$spd['initial_date']."',
						   final_date='".$spd['final_date']."',
						   company='".$spd['company']."',
						   job='".$spd['job']."',
						   description_experience='".$spd['description_experience']."'
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
		$query = "select * from work_experience where student_number='".$student_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) { // $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($result);

				$spd['initial_date'] = $row['initial_date'];
				$spd['final_date'] = $row['final_date'];
				$spd['company'] = $row['company'];
				$spd['job'] = $row['job'];
				$spd['description_experience'] = $row['description_experience'];

			}

		}

	}

	// Close database connection
	mysqli_free_result($result);
	mysqli_close($db);

?>

	<form action="" method="post">
		<fieldset>
				<legend>Proffessional experience</legend>
					<div class="form_wrapper">
						<div class="proffessionalexperience">
							<label for="form_jobs" class="singleline">Number of jobs:</label>
							<select name="jobs" id="form_jobs" class="singleline">
								<option value="0">0</option>
								<option value="1">1 </option>
								<option value="2">2 </option>
								<option value="3">3 </option>
								<option value="4">4 </option>
								<option value="5">5 </option>
								<option value="6">6 </option>
								<option value="7">7 </option>
								<option value="8">8 </option>
								<option value="9">9 </option>
								<option value="10">10 </option>
							</select>
						</div>
							<label for="initialmonth" class="singleline">Initial month:</label>
  							<select name="initial_month" id="initialmonth" class="singleline">
  								<option value="01" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="01") echo 'selected="selected"'?>>01</option>
  								<option value="02" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="02") echo 'selected="selected"'?>>02</option>
  								<option value="03" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="03") echo 'selected="selected"'?>>03</option>
  								<option value="04" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="04") echo 'selected="selected"'?>>04</option>
  								<option value="05" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="05") echo 'selected="selected"'?>>05</option>
  								<option value="06" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="06") echo 'selected="selected"'?>>06</option>
  								<option value="07" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="07") echo 'selected="selected"'?>>07</option>
  								<option value="08" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="08") echo 'selected="selected"'?>>08</option>
  								<option value="09" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="09") echo 'selected="selected"'?>>09</option>
  								<option value="10" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="10") echo 'selected="selected"'?>>10</option>
  								<option value="11" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="11") echo 'selected="selected"'?>>11</option>
  								<option value="12" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="12") echo 'selected="selected"'?>>12</option>
  							</select>
  							<label for="initialyear" class="singleline">Initial year:</label>
  							<select name="initial_year" id="initialyear" class="singleline">
  								<option value="2000" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2000") echo 'selected="selected"'?>>2000</option>
								<option value="2001" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2001") echo 'selected="selected"'?>>2001</option>
								<option value="2002" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2002") echo 'selected="selected"'?>>2002</option>
								<option value="2003" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2003") echo 'selected="selected"'?>>2003</option>
								<option value="2004" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2004") echo 'selected="selected"'?>>2004</option>
  								<option value="2005" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2005") echo 'selected="selected"'?>>2005</option>
								<option value="2006" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2006") echo 'selected="selected"'?>>2006</option>
								<option value="2007" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2007") echo 'selected="selected"'?>>2007</option>
								<option value="2008" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2008") echo 'selected="selected"'?>>2008</option>
								<option value="2009" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2009") echo 'selected="selected"'?>>2009</option>
								<option value="2010" <?php if (isset($spd['initial_date'])&&$spd['initial_date']=="2010") echo 'selected="selected"'?>>2010</option>
							</select>
  							<label for="finalmonth" class="singleline">Final Date:</label>
  							<select name="final_month" id="finalmonth" class="singleline">
  								<option value="01" <?php if (isset($spd['final_date'])&&$spd['final_date']=="01") echo 'selected="selected"'?>>01</option>
  								<option value="02" <?php if (isset($spd['final_date'])&&$spd['final_date']=="02") echo 'selected="selected"'?>>02</option>
  								<option value="03" <?php if (isset($spd['final_date'])&&$spd['final_date']=="03") echo 'selected="selected"'?>>03</option>
  								<option value="04" <?php if (isset($spd['final_date'])&&$spd['final_date']=="04") echo 'selected="selected"'?>>04</option>
  								<option value="05" <?php if (isset($spd['final_date'])&&$spd['final_date']=="05") echo 'selected="selected"'?>>05</option>
  								<option value="06" <?php if (isset($spd['final_date'])&&$spd['final_date']=="06") echo 'selected="selected"'?>>06</option>
  								<option value="07" <?php if (isset($spd['final_date'])&&$spd['final_date']=="07") echo 'selected="selected"'?>>07</option>
  								<option value="08" <?php if (isset($spd['final_date'])&&$spd['final_date']=="08") echo 'selected="selected"'?>>08</option>
  								<option value="09" <?php if (isset($spd['final_date'])&&$spd['final_date']=="09") echo 'selected="selected"'?>>09</option>
  								<option value="10" <?php if (isset($spd['final_date'])&&$spd['final_date']=="10") echo 'selected="selected"'?>>10</option>
  								<option value="11" <?php if (isset($spd['final_date'])&&$spd['final_date']=="11") echo 'selected="selected"'?>>11</option>
  								<option value="12" <?php if (isset($spd['final_date'])&&$spd['final_date']=="12") echo 'selected="selected"'?>>12</option>
  							</select>
  							<label for="finalyear" class="singleline">Final year:</label>
  							<select name="final_year" id="finalyear" class="singleline">
  								<option value="2000" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2000") echo 'selected="selected"'?>>2000</option>
								<option value="2001" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2001") echo 'selected="selected"'?>>2001</option>
								<option value="2002" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2002") echo 'selected="selected"'?>>2002</option>
								<option value="2003" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2003") echo 'selected="selected"'?>>2003</option>
								<option value="2004" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2004") echo 'selected="selected"'?>>2004</option>
  								<option value="2005" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2005") echo 'selected="selected"'?>>2005</option>
								<option value="2006" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2006") echo 'selected="selected"'?>>2006</option>
								<option value="2007" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2007") echo 'selected="selected"'?>>2007</option>
								<option value="2008" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2008") echo 'selected="selected"'?>>2008</option>
								<option value="2009" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2009") echo 'selected="selected"'?>>2009</option>
								<option value="2010" <?php if (isset($spd['final_date'])&&$spd['final_date']=="2010") echo 'selected="selected"'?>>2010</option>
							</select>
  							<label for="company" class="singleline">Company or department:</label>
  							<input type="text" maxlength="60" name="company" id="company" class="singleline" value="<?php if (isset($spd['company'])) echo $spd['company']; ?>" />
  							<label for="job" class="singleline">Job:</label>
  							<input type="text" maxlength="60" name="job" id="job" class="singleline" value="<?php if (isset($spd['job'])) echo $spd['job']; ?>"/>
  							<label for="form_description" class="singleline">Description:</label>
							<textarea name="description_experience" id="form_description" cols="50" rows="10" class="singleline"><?php if (isset($spd['description_experience'])) echo $spd['description_experience']; ?></textarea>
  					</div>
			</fieldset>
		<input  type="hidden" name="type" value="student_proffesional_experience" />
		<input type="submit" value="Save" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
