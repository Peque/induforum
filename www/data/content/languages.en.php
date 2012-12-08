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

	if (isset($_POST['type']) && $_POST['type'] == 'student_languages	') {

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
						<p class="p_language">
							Check the languages you know.You can add more languages.
						</p>
							<input type="checkbox" name="language" value="english" id="english" 			  	class="singleline"/>
							<label for="english" class="singlelinetitle">English</label>
							<input type="checkbox" name="language" value="french" id="french" 			  	class="singleline"/>
							<label for="french" class="singlelinetitle">French</label>
							<input type="checkbox" name="language" value="german" id="german" 			  	class="singleline"/>
							<label for="german" class="singlelinetitle">German</label>
							<input type="checkbox" name="language" value="italian" id="italian" 			  	class="singleline"/>
							<label for="italian" class="singlelinetitle">Italian</label>
							<label for="other" class="singlelinetitle">Other</label>
							<select name="other" id="other" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
							<label for="english" class="singlelinetitle">English</label>
							<label for="englishspoken_interaction" class="singleline">Spoken Interaction</label>
							<select name="spoken_interaction" id="englishspoken_interaction" class="singleline">
								<option value="">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="englishspoken_production" class="singleline">Spoken Production</label>
							<select name="spoken_production" id="englishspoken_production" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="englishreading" class="singleline">Reading</label>
							<select name="reading" id="englishreading" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="englishwriting" class="singleline">Writing</label>
							<select name="writing" id="englishwriting" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							<label for="englishlistening" class="singleline">Listening</label>
							<select name="listening" id="englishlistening" class="singleline">
								<option value="noreply">No reply</option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
							
<!--
							<label for="french" class="singlelinetitle">French</label>
							<label for="frenchspeaking" class="singleline">Speaking</label>
							<select name="frenchspeaking" id="frenchspeaking" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="frenchwriting" class="singleline">Writing</label>
							<select name="frenchwriting" id="frenchwriting" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="frenchtranslation" class="singleline">Translation</label>
							<select name="frenchtranslation" id="frenchtranslation" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="frenchtechnical" class="singleline">Technical</label>
							<select name="frenchtechnical" id="frenchtechnical" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="german" class="singlelinetitle">German</label>
							<label for="germanspeaking" class="singleline">Speaking</label>
							<select name="germanspeaking" id="germanspeaking" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="germanwriting" class="singleline">Writing</label>
							<select name="germanwriting" id="germanwriting" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="germantranslation" class="singleline">Translation</label>
							<select name="germantranslation" id="germantranslation" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="germantechnical" class="singleline">Technical</label>
							<select name="germantechnical" id="germantechnical" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="italian" class="singlelinetitle">Italian</label>
							<label for="italianspeaking" class="singleline">Speaking</label>
							<select name="italianspeaking" id="italianspeaking" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="italianwriting" class="singleline">Writing</label>
							<select name="italianwriting" id="italianwriting" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="italiantranslation" class="singleline">Translation</label>
							<select name="italiantranslation" id="italiantranslation" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="italiantechnical" class="singleline">Technical</label>
							<select name="italiantechnical" id="italiantechnical" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="other1" class="singlelinetitle">Other</label>
							<input type="text" name="other1" id="other1" class="singleline"/>
							<label for="other1speaking" class="singleline">Speaking</label>
							<select name="other1speaking" id="other1speaking" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="other1writing" class="singleline">Writing</label>
							<select name="other1writing" id="other1writing" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="other1translation" class="singleline">Translation</label>
							<select name="other1translation" id="other1translation" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<label for="other1technical" class="singleline">Technical</label>
							<select name="other1technical" id="other1technical" class="singleline">
								<option value="noreply">  </option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
-->
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
