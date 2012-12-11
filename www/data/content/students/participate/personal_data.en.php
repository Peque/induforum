<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check user privileges
	if ($_SESSION['type'] != 'student_session') {
		header('Location: /en/restricted_area/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Participation</h1>
	</hgroup>
</header>
<nav id="section_nav">
	<ul>
		<li><a href="#Sections">1 - Sections</a></li>
		<li><a href="#Personal_data">2 - Personal data</a></li>
	</ul>
</nav>
<article>
	<header>
		<hgroup>
			<h1 id="Sections">Sections</h1>
		</hgroup>
		<hr />
	</header>
	<ul>
		<li><a href="/en/students/participate/personal_data/">Personal data</a></li>
		<li><a href="/en/students/participate/academic_data/">Academic data</a></li>
		<li><a href="/en/students/participate/languages/">Languages</a></li>
		<li><a href="/en/students/participate/proffessional_experience/">Proffessional experience</a></li>
		<li><a href="/en/students/participate/computer_science/">Computer science</a></li>
	</ul>
</article>
<article>
	<header>
		<hgroup>
			<h1 id="Personal_data">Personal data</h1>
		</hgroup>
		<hr />
	</header>

<?php

	$student_number = $_SESSION['user_id'];

	require_once('../../../config.php');

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
		$spd['birthyear'] = mysqli_real_escape_string($db, trim($_POST['birthyear']));
		$spd['birthmonth'] = mysqli_real_escape_string($db, trim($_POST['birthmonth']));
		$spd['birthday'] = mysqli_real_escape_string($db, trim($_POST['birthday']));
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
			$spd['birthyear'] != "" &&
			$spd['birthmonth'] != "" &&
			$spd['birthday'] != "" &&
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
									'".$spd['birthyear']."-".$spd['birthmonth']."-".$spd['birthday']."',
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
						   birth='".$spd['birthyear']."-".$spd['birthmonth']."-".$spd['birthday']."',
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
				$birth=	explode('-',$row['birth']);
				$spd['birthyear'] = $birth[0];
				$spd['birthmonth'] = $birth[1];
				$spd['birthday'] = $birth[2];
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
				<p class="title">
					General data:
				</p>
				<label for="form_name" class="singleline">Name: <span class="form_required" title="This field is required">*</span></label>
				<input type="text" maxlength="30" name="name" id="form_name" class="singleline" required="required" value="<?php if (isset($spd['name'])) echo $spd['name']; ?>" />
				<label for="form_surname" class="singleline">Surname: <span class="form_required" title="This field is required">*</span></label>
				<input type="text" maxlength="60" name="surname" id="form_surname" class="singleline" required="required" value="<?php if (isset($spd['surname'])) echo $spd['surname']; ?>" />
				<label for="birthdate" class="singleline">Birth date:<span class="form_required" title="This field is required">*</span></label>
				<select name="birthday" id="birthdate"  required="required" class="singleline">
					<option value=""></option>
					<option value="01" <?php if (isset($spd['birthday'])&&$spd['birthday']=="01") echo 'selected="selected"'?>>01</option>
					<option value="02" <?php if (isset($spd['birthday'])&&$spd['birthday']=="02") echo 'selected="selected"'?>>02</option>
					<option value="03" <?php if (isset($spd['birthday'])&&$spd['birthday']=="03") echo 'selected="selected"'?>>03</option>
					<option value="04" <?php if (isset($spd['birthday'])&&$spd['birthday']=="04") echo 'selected="selected"'?>>04</option>
					<option value="05" <?php if (isset($spd['birthday'])&&$spd['birthday']=="05") echo 'selected="selected"'?>>05</option>
					<option value="06" <?php if (isset($spd['birthday'])&&$spd['birthday']=="06") echo 'selected="selected"'?>>06</option>
					<option value="07" <?php if (isset($spd['birthday'])&&$spd['birthday']=="07") echo 'selected="selected"'?>>07</option>
					<option value="08" <?php if (isset($spd['birthday'])&&$spd['birthday']=="08") echo 'selected="selected"'?>>08</option>
					<option value="09" <?php if (isset($spd['birthday'])&&$spd['birthday']=="09") echo 'selected="selected"'?>>09</option>
					<option value="10" <?php if (isset($spd['birthday'])&&$spd['birthday']=="10") echo 'selected="selected"'?>>10</option>
					<option value="11" <?php if (isset($spd['birthday'])&&$spd['birthday']=="11") echo 'selected="selected"'?>>11</option>
					<option value="12" <?php if (isset($spd['birthday'])&&$spd['birthday']=="12") echo 'selected="selected"'?>>12</option>
					<option value="13" <?php if (isset($spd['birthday'])&&$spd['birthday']=="13") echo 'selected="selected"'?>>13</option>
					<option value="14" <?php if (isset($spd['birthday'])&&$spd['birthday']=="14") echo 'selected="selected"'?>>14</option>
					<option value="15" <?php if (isset($spd['birthday'])&&$spd['birthday']=="15") echo 'selected="selected"'?>>15</option>
					<option value="16" <?php if (isset($spd['birthday'])&&$spd['birthday']=="16") echo 'selected="selected"'?>>16</option>
					<option value="17" <?php if (isset($spd['birthday'])&&$spd['birthday']=="17") echo 'selected="selected"'?>>17</option>
					<option value="18" <?php if (isset($spd['birthday'])&&$spd['birthday']=="18") echo 'selected="selected"'?>>18</option>
					<option value="19" <?php if (isset($spd['birthday'])&&$spd['birthday']=="19") echo 'selected="selected"'?>>19</option>
					<option value="20" <?php if (isset($spd['birthday'])&&$spd['birthday']=="20") echo 'selected="selected"'?>>20</option>
					<option value="21" <?php if (isset($spd['birthday'])&&$spd['birthday']=="21") echo 'selected="selected"'?>>21</option>
					<option value="22" <?php if (isset($spd['birthday'])&&$spd['birthday']=="22") echo 'selected="selected"'?>>22</option>
					<option value="23" <?php if (isset($spd['birthday'])&&$spd['birthday']=="23") echo 'selected="selected"'?>>23</option>
					<option value="24" <?php if (isset($spd['birthday'])&&$spd['birthday']=="24") echo 'selected="selected"'?>>24</option>
					<option value="25" <?php if (isset($spd['birthday'])&&$spd['birthday']=="25") echo 'selected="selected"'?>>25</option>
					<option value="26" <?php if (isset($spd['birthday'])&&$spd['birthday']=="26") echo 'selected="selected"'?>>26</option>
					<option value="27" <?php if (isset($spd['birthday'])&&$spd['birthday']=="27") echo 'selected="selected"'?>>27</option>
					<option value="28" <?php if (isset($spd['birthday'])&&$spd['birthday']=="28") echo 'selected="selected"'?>>28</option>
					<option value="29" <?php if (isset($spd['birthday'])&&$spd['birthday']=="29") echo 'selected="selected"'?>>29</option>
					<option value="30" <?php if (isset($spd['birthday'])&&$spd['birthday']=="30") echo 'selected="selected"'?>>30</option>
					<option value="31" <?php if (isset($spd['birthday'])&&$spd['birthday']=="31") echo 'selected="selected"'?>>31</option>
				</select>
				<select name="birthmonth"  required="required" class="singleline">
					<option value=""></option>
					<option value="01" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="01") echo 'selected="selected"'?>>01</option>
					<option value="02" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="02") echo 'selected="selected"'?>>02</option>
					<option value="03" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="03") echo 'selected="selected"'?>>03</option>
					<option value="04" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="04") echo 'selected="selected"'?>>04</option>
					<option value="05" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="05") echo 'selected="selected"'?>>05</option>
					<option value="06" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="06") echo 'selected="selected"'?>>06</option>
					<option value="07" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="07") echo 'selected="selected"'?>>07</option>
					<option value="08" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="08") echo 'selected="selected"'?>>08</option>
					<option value="09" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="09") echo 'selected="selected"'?>>09</option>
					<option value="10" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="10") echo 'selected="selected"'?>>10</option>
					<option value="11" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="11") echo 'selected="selected"'?>>11</option>
					<option value="12" <?php if (isset($spd['birthmonth'])&&$spd['birthmonth']=="12") echo 'selected="selected"'?>>12</option>
				</select>
				<select name="birthyear"  required="required" class="singleline">
					<option value=""></option>
					<option value="1980" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1980") echo 'selected="selected"'?>>1980</option>
					<option value="1981" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1981") echo 'selected="selected"'?>>1981</option>
					<option value="1982" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1982") echo 'selected="selected"'?>>1982</option>
					<option value="1983" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1983") echo 'selected="selected"'?>>1983</option>
					<option value="1984" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1984") echo 'selected="selected"'?>>1984</option>
					<option value="1985" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1985") echo 'selected="selected"'?>>1985</option>
					<option value="1986" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1986") echo 'selected="selected"'?>>1986</option>
					<option value="1987" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1987") echo 'selected="selected"'?>>1987</option>
					<option value="1988" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1988") echo 'selected="selected"'?>>1988</option>
					<option value="1989" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1989") echo 'selected="selected"'?>>1989</option>
					<option value="1990" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1990") echo 'selected="selected"'?>>1990</option>
					<option value="1991" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1991") echo 'selected="selected"'?>>1991</option>
					<option value="1992" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1992") echo 'selected="selected"'?>>1992</option>
					<option value="1993" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1993") echo 'selected="selected"'?>>1993</option>
					<option value="1994" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1994") echo 'selected="selected"'?>>1994</option>
					<option value="1995" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1995") echo 'selected="selected"'?>>1995</option>
					<option value="1996" <?php if (isset($spd['birthyear'])&&$spd['birthyear']=="1996") echo 'selected="selected"'?>>1996</option>
				</select>
			</div>
			<div class="form_wrapper">
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
		</fieldset>
		<input  type="hidden" name="type" value="student_personal_data" />
		<input type="submit" value="Save" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
