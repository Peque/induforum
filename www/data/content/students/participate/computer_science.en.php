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
<article>
	<header>
		<hgroup>
			<h1 id="Resume">Resume</h1>
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

	if (isset($_POST['type']) && $_POST['type'] == 'student_computer_science') {

		// Form data overrides any other data

		$spd['windows'] = mysqli_real_escape_string($db, trim($_POST['windows']));
		$spd['mac'] = mysqli_real_escape_string($db, trim($_POST['mac']));
		$spd['linux'] = mysqli_real_escape_string($db, trim($_POST['linux']));
		$spd['data_bases'] = mysqli_real_escape_string($db, trim($_POST['data_bases']));
		$spd['finances_accounting'] = mysqli_real_escape_string($db, trim($_POST['finances_accounting']));
		$spd['cad'] = mysqli_real_escape_string($db, trim($_POST['cad']));
		$spd['graphic_design'] = mysqli_real_escape_string($db, trim($_POST['graphic_design']));
		$spd['spreadsheet'] = mysqli_real_escape_string($db, trim($_POST['spreadsheet']));
		$spd['email'] = mysqli_real_escape_string($db, trim($_POST['email']));
		$spd['maths_statistics'] = mysqli_real_escape_string($db, trim($_POST['maths_statistics']));
		$spd['presentations'] = mysqli_real_escape_string($db, trim($_POST['presentations']));
		$spd['word_processors'] = mysqli_real_escape_string($db, trim($_POST['word_processors']));
		$spd['programming_languages'] = mysqli_real_escape_string($db, trim($_POST['programming_languages']));
		$spd['simulation'] = mysqli_real_escape_string($db, trim($_POST['simulation']));
		$spd['communications_networks'] = mysqli_real_escape_string($db, trim($_POST['communications_networks']));

		// Check if all fields have a non-empty value


			// Try to add a new row
			$query = "insert into computing_experience values
									('".$student_number."',
									'".$spd['windows']."',
									'".$spd['mac']."',
									'".$spd['linux']."',
									'".$spd['data_bases']."',
									'".$spd['finances_accounting']."',
									'".$spd['cad']."',
									'".$spd['graphic_design']."',
									'".$spd['spreadsheet']."',
									'".$spd['email']."',
									'".$spd['maths_statistics']."',
									'".$spd['presentations']."',
									'".$spd['word_processors']."',
									'".$spd['programming_languages']."',
									'".$spd['simulation']."',
									'".$spd['communications_networks']."')";
			// Check if we wrote the new row, otherwise, data existed for this student
			$result = mysqli_query($db, $query);

			// If data existed for this student, update it
			if (!$result) {
				$query = "update computing_experience set
						   windows='".$spd['windows']."',
						   mac='".$spd['mac']."',
						   linux='".$spd['linux']."',
						   data_bases='".$spd['data_bases']."',
						   finances_accounting='".$spd['finances_accounting']."',
						   cad='".$spd['cad']."',
						   graphic_design='".$spd['graphic_design']."',
						   spreadsheet='".$spd['spreadsheet']."',
						   email='".$spd['email']."',
						   maths_statistics='".$spd['maths_statistics']."',
						   presentations='".$spd['presentations']."',
						   word_processors='".$spd['word_processors']."',
						   programming_languages='".$spd['programming_languages']."',
						   simulation='".$spd['simulation']."',
						   communications_networks='".$spd['communications_networks']."'
						   where student_number='".$student_number."'";
				$result = mysqli_query($db, $query);
			}

			// Inform the user about the operation
			if ($result) echo '<p class="info">Data saved successfuly.</p>';
			else echo '<p class="error"><strong>Error: </strong>could not write to the database. Please, try again later.</p>';

	} else {

		// Try to get data from the database
		$query = "select * from computing_experience where student_number='".$student_number."'";
		$result = mysqli_query($db, $query);

		if ($result) {

			$num_results = mysqli_num_rows($result);

			for ($i=0; $i<$num_results; $i++) { // $num_results should be 1 in this case

				$row = mysqli_fetch_assoc($result);

				$spd['windows'] = $row['windows'];
				$spd['mac'] = $row['mac'];
				$spd['linux'] = $row['linux'];
				$spd['data_bases'] = $row['data_bases'];
				$spd['finances_accounting'] = $row['finances_accounting'];
				$spd['cad'] = $row['cad'];
				$spd['graphic_design'] = $row['graphic_design'];
				$spd['spreadsheet'] = $row['spreadsheet'];
				$spd['email'] = $row['email'];
				$spd['maths_statistics'] = $row['maths_statistics'];
				$spd['presentations'] = $row['presentations'];
				$spd['word_processors'] = $row['word_processors'];
				$spd['programming_languages'] = $row['programming_languages'];
				$spd['simulation'] = $row['phone'];
				$spd['communications_networks'] = $row['communications_networks'];

			}

		}

	}

	// Close database connection
	mysqli_free_result($result);
	mysqli_close($db);

?>

	<form action="" method="post">
			<fieldset>
				<legend>Computer science</legend>
							<label for="windows" class="singleline">
							Windows (Use of Windows OS)<br>
							</label>
							<select name="windows" id="windows" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['windows'])&&$spd['windows']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['windows'])&&$spd['windows']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['windows'])&&$spd['windows']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['windows'])&&$spd['windows']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['windows'])&&$spd['windows']=="5") echo 'selected="selected"'?>>Expert</option>

							</select>
							<label for="mac" class="singleline">
							Mac application (Use of Mac OS)<br>
							</label>
							<select name="mac" id="mac" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['mac'])&&$spd['mac']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['mac'])&&$spd['mac']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['mac'])&&$spd['mac']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['mac'])&&$spd['mac']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['mac'])&&$spd['mac']=="5") echo 'selected="selected"'?>>Expert</option>

							</select>
							<label for="linux" class="singleline">
							Linux application (Use of Linux OS)<br>
							</label>
							<select name="linux" id="linux" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['linux'])&&$spd['linux']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['linux'])&&$spd['linux']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['linux'])&&$spd['linux']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['linux'])&&$spd['linux']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['linux'])&&$spd['linux']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="data_bases" class="singleline">
							Data bases (Access,SQL...)<br>
							</label>
							<select name="data_bases" id="data_bases" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['data_bases'])&&$spd['data_bases']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['data_bases'])&&$spd['data_bases']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['data_bases'])&&$spd['data_bases']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['data_bases'])&&$spd['data_bases']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['data_bases'])&&$spd['data_bases']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="finances_accounting" class="singleline">
							Accounting/Finances (Contaplus...)<br>
							</label>
							<select name="finances_accounting" id="finances_accounting" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['finances_accounting'])&&$spd['finances_accounting']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['finances_accounting'])&&$spd['finances_accounting']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['finances_accounting'])&&$spd['finances_accounting']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['finances_accounting'])&&$spd['finances_accounting']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['finances_accounting'])&&$spd['finances_accounting']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="cad" class="singleline">
							Computer-aided design (CAD programs...)<br>
							</label>
							<select name="cad" id="cad" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['cad'])&&$spd['cad']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['cad'])&&$spd['cad']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['cad'])&&$spd['cad']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['cad'])&&$spd['cad']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['cad'])&&$spd['cad']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="graphic_design" class="singleline">
							Graphic Design/Photographic retouching<br>(PhotoShop,CorelDraw...)<br>
							</label>
							<select name="graphic_design" id="graphic_design" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['graphic_design'])&&$spd['graphic_design']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['graphic_design'])&&$spd['graphic_design']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['graphic_design'])&&$spd['graphic_design']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['graphic_design'])&&$spd['graphic_design']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['graphic_design'])&&$spd['graphic_design']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="spreadsheet" class="singleline">
							Spreadsheet (Excel,Lotus...)<br>
							</label>
							<select name="spreadsheet" id="spreadsheet" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['spreadsheet'])&&$spd['spreadsheet']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['spreadsheet'])&&$spd['spreadsheet']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['spreadsheet'])&&$spd['spreadsheet']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['spreadsheet'])&&$spd['spreadsheet']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['spreadsheet'])&&$spd['spreadsheet']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="email" class="singleline">
							Email (Eudora,Outlook...)<br>
							</label>
							<select name="email" id="email" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['email'])&&$spd['email']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['email'])&&$spd['email']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['email'])&&$spd['email']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['email'])&&$spd['email']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['email'])&&$spd['email']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="maths_statistics" class="singleline">
							Mathematics/Statistics<br>(Matlab,MathCAD...)<br>
							</label>
							<select name="maths_statistics" id="maths_statistics" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['maths_statistics'])&&$spd['maths_statistics']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['maths_statistics'])&&$spd['maths_statistics']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['maths_statistics'])&&$spd['maths_statistics']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['maths_statistics'])&&$spd['maths_statistics']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['maths_statistics'])&&$spd['maths_statistics']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="presentations" class="singleline">
							Presentations (PowerPoint...)<br>
							</label>
							<select name="presentations" id="presentations" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['presentations'])&&$spd['presentations']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['presentations'])&&$spd['presentations']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['presentations'])&&$spd['presentations']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['presentations'])&&$spd['presentations']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['presentations'])&&$spd['presentations']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="word_processors" class="singleline">
							Word processors (Word...)<br>
							</label>
							<select name="word_processors" id="word_processors" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['word_processors'])&&$spd['word_processors']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['word_processors'])&&$spd['word_processors']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['word_processors'])&&$spd['word_processors']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['word_processors'])&&$spd['word_processors']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['word_processors'])&&$spd['word_processors']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="programming_languages" class="singleline">
							Programation (Java,C...)<br>
							</label>
							<select name="programming_languages" id="programming_languages" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['programming_languages'])&&$spd['programming_languages']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['programming_languages'])&&$spd['programming_languages']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['programming_languages'])&&$spd['programming_languages']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['programming_languages'])&&$spd['programming_languages']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['programming_languages'])&&$spd['programming_languages']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="simulation" class="singleline">
							Simulation (PSpice,Simplorer...)<br>
							</label>
							<select name="simulation" id="simulation" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['simulation'])&&$spd['simulation']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['simulation'])&&$spd['simulation']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['simulation'])&&$spd['simulation']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['simulation'])&&$spd['simulation']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['simulation'])&&$spd['simulation']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
							<label for="communications_networks" class="singleline">
							Communications and networks<br>(Mozilla,Opera,Chrome...)<br>
							</label>
							<select name="communications_networks" id="communications_networks" class="singleline">
								<option value="0">No reply</option>
								<option value="1" <?php if (isset($spd['communications_networks'])&&$spd['communications_networks']=="1") echo 'selected="selected"'?>>Null</option>
								<option value="2" <?php if (isset($spd['communications_networks'])&&$spd['communications_networks']=="2") echo 'selected="selected"'?>>Low</option>
								<option value="3" <?php if (isset($spd['communications_networks'])&&$spd['communications_networks']=="3") echo 'selected="selected"'?>>Intermediate</option>
								<option value="4" <?php if (isset($spd['communications_networks'])&&$spd['communications_networks']=="4") echo 'selected="selected"'?>>High</option>
								<option value="5" <?php if (isset($spd['communications_networks'])&&$spd['communications_networks']=="5") echo 'selected="selected"'?>>Expert</option>
							</select>
			</fieldset>
		<input  type="hidden" name="type" value="student_computer_science" />
		<input type="submit" value="Save" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
