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

		$spd['initial_month'] = mysqli_real_escape_string($db, trim($_POST['initial_month']));
		$spd['initial_year'] = mysqli_real_escape_string($db, trim($_POST['initial_year']));
		$spd['final_month'] = mysqli_real_escape_string($db, trim($_POST['final_month']));
		$spd['final_year'] = mysqli_real_escape_string($db, trim($_POST['final_year']));
		$spd['company'] = mysqli_real_escape_string($db, trim($_POST['company']));
		$spd['job'] = mysqli_real_escape_string($db, trim($_POST['job']));
		$spd['description_experience'] = mysqli_real_escape_string($db, trim($_POST['description_experience']));
		// Check if all fields have a non-empty value
		if ($spd['initial_month'] != "" &&
			$spd['initial_year'] != "" &&
			$spd['final_month'] != "" &&
			$spd['final_year'] != "" &&
			$spd['company'] != "" &&
			$spd['job'] != "" ) {

			// Try to add a new row
			$query = "insert into work_experience values
									('".$student_number."',
									'".$spd['initial_year']."-".$spd['initial_month']."-"."00"."',
									'".$spd['final_year']."-".$spd['final_month']."-"."00"."',
									'".$spd['company']."',
									'".$spd['job']."',
									'".$spd['description_experience']."')";
			// Check if we wrote the new row, otherwise, data existed for this student
			$result = mysqli_query($db, $query);

			// If data existed for this student, update it
			if (!$result) {
				$query = "update work_experience set
						   initial_date='".$spd['initial_year']."-".$spd['initial_month']."-"."00"."',
						   final_date='".$spd['final_year']."-".$spd['final_month']."-"."00"."',
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
				$initialdate=	explode('-',$row['initial_date']);
				$spd['initial_year'] =$initialdate[0] ;
				$spd['initial_month'] =$initialdate[1] ;
				$finaldate=	explode('-',$row['final_date']);
				$spd['final_year'] = $finaldate[0];
				$spd['final_month'] = $finaldate[1];
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
							<label for="form_jobs" class="singleline">Number of jobs:<span class="form_required" title="This field is required">*</span></label>
							<select name="jobs" id="form_jobs" class="singleline" required="required">
								<option value=""></option>
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
						<div>
							<label for="initialdate1" class="singleline">Initial date:<span class="form_required" title="This field is required">*</span></label>
  							<select name="initial_month1" id="initialdate1" class="singleline" required="required">
  								<option value=""></option>
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
  							<select name="initial_year1" id="initialyear1" class="singleline" required="required" >
  								<option value=""></option>
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
  							<label for="finaldate1" class="singleline">Final Date:<span class="form_required" title="This field is required">*</span></label>
  							<select name="final_month1" id="finaldate1" class="singleline" required="required">		
  								<option value=""></option>
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
  							<select name="final_year1" id="finalyear1" class="singleline" required="required">
  								<option value=""></option>
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
  							<label for="company1" class="singleline">Company or department:<span class="form_required" title="This field is required">*</span></label>
  							<input type="text" maxlength="60" name="company1" id="company1" class="singleline" value="<?php if (isset($spd['company'])) echo $spd['company']; ?>" required="required"/>
  							<label for="job1" class="singleline">Job:<span class="form_required" title="This field is required">*</span></label>
  							<input type="text" maxlength="60" name="job1" id="job1" class="singleline" value="<?php if (isset($spd['job'])) echo $spd['job']; ?>" required="required"/>
  							<label for="form_description1" class="singleline">Description:</label>
							<textarea name="description_experience1" id="form_description1" cols="50" rows="10" class="singleline"><?php if (isset($spd['description_experience'])) echo $spd['description_experience']; ?></textarea>
					</div>
							<div>
							<label for="initialdate2" class="singleline">Initial date:</label>
  							<select name="initial_month2" id="initialdate2" class="singleline" >
  								<option value=""></option>
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
  							<select name="initial_year2" id="initialyear2" class="singleline" >
  								<option value=""></option>
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
  							<label for="finaldate2" class="singleline">Final Date:</label>
  							<select name="final_month2" id="finaldate2" class="singleline">		
  								<option value=""></option>
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
  							<select name="final_year2" id="finalyear2" class="singleline" >
  								<option value=""></option>
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
  							<label for="company2" class="singleline">Company or department:</label>
  							<input type="text" maxlength="60" name="company2" id="company" class="singleline" value="<?php if (isset($spd['company'])) echo $spd['company']; ?>" />
  							<label for="job2" class="singleline">Job:</label>
  							<input type="text" maxlength="60" name="job2" id="job2" class="singleline" value="<?php if (isset($spd['job'])) echo $spd['job']; ?>" />
  							<label for="form_description2" class="singleline">Description:</label>
							<textarea name="description_experience2" id="form_description2" cols="50" rows="10" class="singleline"><?php if (isset($spd['description_experience'])) echo $spd['description_experience']; ?></textarea>
					</div>
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
