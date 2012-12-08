<?php

	session_start();

	if (!isset($_SESSION['user_id'])) {
		header('Location: /login');
		exit;
	}

?>

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
	$student_number = $_SESSION['user_id'];

	require_once('../config.php');

	// Connect to the database
	$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

	// Check for database connection errors
	if (mysqli_connect_errno()) {

		echo '<p class="error"><strong>Error: </strong>could not connect to the database. Please, try again later.</p>';

	}

	if (!mysqli_set_charset($db, 'utf8')) {

		echo '<p class="error"><strong>Error: </strong>could not set charset to UTF8. Please, try again later.</p>';

	}

	if (isset($_POST['type']) && $_POST['type'] == 'student_personal_data') {

		// Form data overrides any other data

		$spd['name'] = mysqli_real_escape_string($db, trim($_POST['name']));
		$spd['surname'] = mysqli_real_escape_string($db, trim($_POST['surname']));
		$spd['birth'] = mysqli_real_escape_string($db, trim($_POST['birth']));
		$spd['country'] = mysqli_real_escape_string($db, trim($_POST['country']));
		$spd['province'] = mysqli_real_escape_string($db, trim($_POST['province']));
		$spd['city'] = mysqli_real_escape_string($db, trim($_POST['city']));
		$spd['street'] = mysqli_real_escape_string($db, trim($_POST['street']));
		$spd['zip'] = mysqli_real_escape_string($db, trim($_POST['zip']));
		$spd['phone'] = mysqli_real_escape_string($db, trim($_POST['phone']));
		$spd['email'] = mysqli_real_escape_string($db, trim($_POST['email']));

		// Check if all fields have a non-empty value
		if ($spd['name'] != "" &&
			$spd['surname'] != "" &&
			$spd['birth'] != "" &&
			$spd['country'] != "" &&
			$spd['province'] != "" &&
			$spd['city'] != "" &&
			$spd['street'] != "" &&
			$spd['zip'] != "" &&
			$spd['phone'] != "" &&
			$spd['email'] != "") {

			// Try to add a new row
			$query = "insert into personal_data values
									('".$student_number."',
									'".$spd['name']."',
									'".$spd['surname']."',
									'".$spd['birth']."',
									'".$spd['country']."',
									'".$spd['province']."',
									'".$spd['city']."',
									'".$spd['street']."',
									'".$spd['zip']."',
									'".$spd['phone']."',
									'".$spd['email']."')";
			// Check if we wrote the new row, otherwise, data existed for this student
			$result = mysqli_query($db, $query);

			// If data existed for this student, update it
			if (!$result) {
				$query = "update personal_data set
						   name='".$spd['name']."',
						   surname='".$spd['surname']."',
						   birth='".$spd['birth']."',
						   country='".$spd['country']."',
						   province='".$spd['province']."',
						   city='".$spd['city']."',
						   street='".$spd['street']."',
						   zip='".$spd['zip']."',
						   phone='".$spd['phone']."',
						   email='".$spd['email']."'
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
		$query = "select * from personal_data where student_number='".$student_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) { // $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($result);

				$spd['name'] = $row['name'];
				$spd['surname'] = $row['surname'];
				$spd['birth'] = $row['birth'];
				$spd['country'] = $row['country'];
				$spd['province'] = $row['province'];
				$spd['city'] = $row['city'];
				$spd['street'] = $row['street'];
				$spd['zip'] = $row['zip'];
				$spd['phone'] = $row['phone'];
				$spd['email'] = $row['email'];

			}

		}

	}

	// Close database connection
	mysqli_free_result($result);
	mysqli_close($db);

?>

	<form action="" method="post">
		<fieldset>
			<legend>Personal data:</legend>
			<div class="form_wrapper">
				<div class="form_warp">
					<p class="title">
						General data:
					</p>
					<label for="form_name" class="singleline">Name: <span class="form_required" title="This field is required">*</span></label>
					<input type="text" maxlength="30" name="name" id="form_name" class="singleline" required="required" value="<?php if (isset($spd['name'])) echo $spd['name']; ?>" />
					<label for="form_surname" class="singleline">Surname: <span class="form_required" title="This field is required">*</span></label>
					<input type="text" maxlength="60" name="surname" id="form_surname" class="singleline" required="required" value="<?php if (isset($spd['surname'])) echo $spd['surname']; ?>" />
					<label for="form_birth" class="singleline">Birth: <span class="form_required" title="This field is required">*</span></label>
					<input type="text" maxlength="60" name="birth" id="form_birth" class="singleline" required="required" value="<?php if (isset($spd['birth'])) echo $spd['birth']; ?>" />
				</div>
				<div class="form_warp">
					<p class="title">
						Place of residence and contact info:
					</p>
					<label for="form_country" class="singleline">Country/Region: <span class="form_required" title="This field is required">*</span></label>
					<input type="text" maxlength="20" name="country" id="form_country" class="singleline" required="required" value="<?php if (isset($spd['country'])) echo $spd['country']; ?>" />
					<label for="form_province" class="singleline">Province/State: <span class="form_required" title="This field is required">*</span></label>
					<input type="text" maxlength="20" name="province" id="form_province" class="singleline" required="required" value="<?php if (isset($spd['province'])) echo $spd['province']; ?>" />
					<label for="form_city" class="singleline">City: <span class="form_required" title="This field is required">*</span></label>
					<input type="text" maxlength="20" name="city" id="form_city" class="singleline" required="required" value="<?php if (isset($spd['city'])) echo $spd['city']; ?>" />
					<label for="form_street" class="singleline">Street: <span class="form_required" title="This field is required">*</span></label>
					<input type="text" maxlength="50" name="street" id="form_street" class="singleline" required="required" value="<?php if (isset($spd['street'])) echo $spd['street']; ?>" />
					<label for="form_zip" class="singleline">ZIP: <span class="form_required" title="This field is required">*</span></label>
					<input type="text" maxlength="20" name="zip" id="form_zip" class="singleline" required="required" value="<?php if (isset($spd['zip'])) echo $spd['zip']; ?>" />
					<label for="form_phone" class="singleline">Phone number: <span class="form_required" title="This field is required">*</span></label>
					<input type="text" maxlength="20" name="phone" id="form_phone" class="singleline" required="required" value="<?php if (isset($spd['phone'])) echo $spd['phone']; ?>" />
					<label for="form_email" class="singleline">Email: <span class="form_required" title="This field is required">*</span></label>
					<input type="email" maxlength="50" name="email" id="form_email" class="singleline" required="required" value="<?php if (isset($spd['email'])) echo $spd['email']; ?>" />
				</div>
			</div>
		</fieldset>
		<input  type="hidden" name="type" value="student_personal_data" />
		<input type="submit" value="Save" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
