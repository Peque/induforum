<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check user privileges
	if (!$_SESSION['student_permissions']) {
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
	<nav class="tabs_nav">
		<ul>
			<li><a href="/en/students/participate/personal_data/">Personal</a></li>
			<li><a href="/en/students/participate/academic_data/">Academic</a></li>
			<li><a href="/en/students/participate/languages/">Languages</a></li>
			<li><a href="/en/students/participate/professional_experience/">Professional</a></li>
			<li class="current">Computing</li>
			<li><a href="/en/students/participate/pdf/">PDF</a></li>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>

<?php require_once('../../../data/computer_science.php'); ?>

	<form action="" method="post">
		<fieldset>
			<legend>Computer science</legend>
			<div class="form_wrapper">
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
			</div>
		</fieldset>
		<input  type="hidden" name="type" value="student_computer_science" />
		<input type="submit" value="Save" accesskey="x" />
	</form>
</article>
<footer>
	<p class="section_title">Participation</p>
</footer>
</section>
