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
			<li class="current">Professional</li>
			<li><a href="/en/students/participate/computer_science/">Computing</a></li>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>

<?php require_once('../../../data/professional_experience.php'); ?>

	<form action="" method="post">
		<fieldset>
			<legend>Proffessional experience</legend>
			<div class="form_wrapper">
				<label for="form_jobs" class="singleline">Number of jobs:<span class="form_required" title="This field is required">*</span></label>
				<select name="jobs" id="form_jobs" class="singleline" required="required">
					<option value=""></option>
					<option value="1" <?php if (isset($num_results)&&$num_results=="1") echo 'selected="selected"'?>>1 </option>
					<option value="2" <?php if (isset($num_results)&&$num_results=="2") echo 'selected="selected"'?>>2 </option>
					<option value="3" <?php if (isset($num_results)&&$num_results=="3") echo 'selected="selected"'?>>3 </option>
				</select>
			</div>
			<div class="form_wrapper">
				<label for="initialdate0" class="singleline">Initial date:<span class="form_required" title="This field is required">*</span></label>
				<select name="initial_month0" id="initialdate0" class="singleline" required="required">
					<option value=""></option>
					<option value="01" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="01") echo 'selected="selected"'?>>January</option>
					<option value="02" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="02") echo 'selected="selected"'?>>February</option>
					<option value="03" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="03") echo 'selected="selected"'?>>March</option>
					<option value="04" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="04") echo 'selected="selected"'?>>April</option>
					<option value="05" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="05") echo 'selected="selected"'?>>May</option>
					<option value="06" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="06") echo 'selected="selected"'?>>June</option>
					<option value="07" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="07") echo 'selected="selected"'?>>July</option>
					<option value="08" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="08") echo 'selected="selected"'?>>August</option>
					<option value="09" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="09") echo 'selected="selected"'?>>September</option>
					<option value="10" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="10") echo 'selected="selected"'?>>October</option>
					<option value="11" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="11") echo 'selected="selected"'?>>November</option>
					<option value="12" <?php if (isset($initialmonth[0])&&$initialmonth[0]=="12") echo 'selected="selected"'?>>December</option>
				</select>
				<select name="initial_year0" id="initialyear0" class="singleline" required="required" >
					<option value=""></option>
					<option value="2000" <?php if (isset($initialyear[0])&&$initialyear[0]=="2000") echo 'selected="selected"'?>>2000</option>
					<option value="2001" <?php if (isset($initialyear[0])&&$initialyear[0]=="2001") echo 'selected="selected"'?>>2001</option>
					<option value="2002" <?php if (isset($initialyear[0])&&$initialyear[0]=="2002") echo 'selected="selected"'?>>2002</option>
					<option value="2003" <?php if (isset($initialyear[0])&&$initialyear[0]=="2003") echo 'selected="selected"'?>>2003</option>
					<option value="2004" <?php if (isset($initialyear[0])&&$initialyear[0]=="2004") echo 'selected="selected"'?>>2004</option>
					<option value="2005" <?php if (isset($initialyear[0])&&$initialyear[0]=="2005") echo 'selected="selected"'?>>2005</option>
					<option value="2006" <?php if (isset($initialyear[0])&&$initialyear[0]=="2006") echo 'selected="selected"'?>>2006</option>
					<option value="2007" <?php if (isset($initialyear[0])&&$initialyear[0]=="2007") echo 'selected="selected"'?>>2007</option>
					<option value="2008" <?php if (isset($initialyear[0])&&$initialyear[0]=="2008") echo 'selected="selected"'?>>2008</option>
					<option value="2009" <?php if (isset($initialyear[0])&&$initialyear[0]=="2009") echo 'selected="selected"'?>>2009</option>
					<option value="2010" <?php if (isset($initialyear[0])&&$initialyear[0]=="2010") echo 'selected="selected"'?>>2010</option>
					<option value="2011" <?php if (isset($initialyear[0])&&$initialyear[0]=="2011") echo 'selected="selected"'?>>2011</option>
					<option value="2012" <?php if (isset($initialyear[0])&&$initialyear[0]=="2012") echo 'selected="selected"'?>>2012</option>
					<option value="2013" <?php if (isset($initialyear[0])&&$initialyear[0]=="2013") echo 'selected="selected"'?>>2013</option>
				</select>
				<label for="finaldate0" class="singleline">Final Date:<span class="form_required" title="This field is required">*</span></label>
				<select name="final_month0" id="finaldate0" class="singleline" required="required">
					<option value=""></option>
					<option value="01" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="01") echo 'selected="selected"'?>>January</option>
					<option value="02" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="02") echo 'selected="selected"'?>>February</option>
					<option value="03" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="03") echo 'selected="selected"'?>>March</option>
					<option value="04" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="04") echo 'selected="selected"'?>>April</option>
					<option value="05" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="05") echo 'selected="selected"'?>>May</option>
					<option value="06" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="06") echo 'selected="selected"'?>>June</option>
					<option value="07" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="07") echo 'selected="selected"'?>>July</option>
					<option value="08" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="08") echo 'selected="selected"'?>>August</option>
					<option value="09" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="09") echo 'selected="selected"'?>>September</option>
					<option value="10" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="10") echo 'selected="selected"'?>>October</option>
					<option value="11" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="11") echo 'selected="selected"'?>>November</option>
					<option value="12" <?php if (isset($finalmonth[0])&&$finalmonth[0]=="12") echo 'selected="selected"'?>>December</option>
				</select>
				<select name="final_year0" id="finalyear0" class="singleline" required="required">
					<option value=""></option>
					<option value="2000" <?php if (isset($finalyear[0])&&$finalyear[0]=="2000") echo 'selected="selected"'?>>2000</option>
					<option value="2001" <?php if (isset($finalyear[0])&&$finalyear[0]=="2001") echo 'selected="selected"'?>>2001</option>
					<option value="2002" <?php if (isset($finalyear[0])&&$finalyear[0]=="2002") echo 'selected="selected"'?>>2002</option>
					<option value="2003" <?php if (isset($finalyear[0])&&$finalyear[0]=="2003") echo 'selected="selected"'?>>2003</option>
					<option value="2004" <?php if (isset($finalyear[0])&&$finalyear[0]=="2004") echo 'selected="selected"'?>>2004</option>
					<option value="2005" <?php if (isset($finalyear[0])&&$finalyear[0]=="2005") echo 'selected="selected"'?>>2005</option>
					<option value="2006" <?php if (isset($finalyear[0])&&$finalyear[0]=="2006") echo 'selected="selected"'?>>2006</option>
					<option value="2007" <?php if (isset($finalyear[0])&&$finalyear[0]=="2007") echo 'selected="selected"'?>>2007</option>
					<option value="2008" <?php if (isset($finalyear[0])&&$finalyear[0]=="2008") echo 'selected="selected"'?>>2008</option>
					<option value="2009" <?php if (isset($finalyear[0])&&$finalyear[0]=="2009") echo 'selected="selected"'?>>2009</option>
					<option value="2010" <?php if (isset($finalyear[0])&&$finalyear[0]=="2010") echo 'selected="selected"'?>>2010</option>
					<option value="2011" <?php if (isset($finalyear[0])&&$finalyear[0]=="2011") echo 'selected="selected"'?>>2011</option>
					<option value="2012" <?php if (isset($finalyear[0])&&$finalyear[0]=="2012") echo 'selected="selected"'?>>2012</option>
					<option value="2013" <?php if (isset($finalyear[0])&&$finalyear[0]=="2013") echo 'selected="selected"'?>>2013</option>
				</select>
				<label for="company0" class="singleline">Company or department:<span class="form_required" title="This field is required">*</span></label>
				<input type="text" maxlength="30" name="company0" id="company0" class="singleline" value="<?php if (isset($company[0])) echo $company[0]; ?>" required="required"/>
				<label for="job0" class="singleline">Job:<span class="form_required" title="This field is required">*</span></label>
				<input type="text" maxlength="60" name="job0" id="job0" class="singleline" value="<?php if (isset($job[0])) echo $job[0]; ?>" required="required"/>
				<label for="form_description0" class="singleline">Description:</label>
				<textarea name="description_experience0" id="form_description0" cols="50" rows="10" class="singleline"><?php if (isset($experience[0])) echo $experience[0]; ?></textarea>
			</div>
			<div class="form_wrapper">
				<label for="initialdate1" class="singleline">Initial date:</label>
				<select name="initial_month1" id="initialdate1" class="singleline" >
					<option value=""></option>
					<option value="01" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="01") echo 'selected="selected"'?>>January</option>
					<option value="02" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="02") echo 'selected="selected"'?>>February</option>
					<option value="03" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="03") echo 'selected="selected"'?>>March</option>
					<option value="04" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="04") echo 'selected="selected"'?>>April</option>
					<option value="05" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="05") echo 'selected="selected"'?>>May</option>
					<option value="06" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="06") echo 'selected="selected"'?>>June</option>
					<option value="07" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="07") echo 'selected="selected"'?>>July</option>
					<option value="08" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="08") echo 'selected="selected"'?>>August</option>
					<option value="09" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="09") echo 'selected="selected"'?>>September</option>
					<option value="10" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="10") echo 'selected="selected"'?>>October</option>
					<option value="11" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="11") echo 'selected="selected"'?>>November</option>
					<option value="12" <?php if (isset($initialmonth[1])&&$initialmonth[1]=="12") echo 'selected="selected"'?>>December</option>
				</select>
				<select name="initial_year1" id="initialyear1" class="singleline" >
					<option value=""></option>
					<option value="2000" <?php if (isset($initialyear[1])&&$initialyear[1]=="2000") echo 'selected="selected"'?>>2000</option>
					<option value="2001" <?php if (isset($initialyear[1])&&$initialyear[1]=="2001") echo 'selected="selected"'?>>2001</option>
					<option value="2002" <?php if (isset($initialyear[1])&&$initialyear[1]=="2002") echo 'selected="selected"'?>>2002</option>
					<option value="2003" <?php if (isset($initialyear[1])&&$initialyear[1]=="2003") echo 'selected="selected"'?>>2003</option>
					<option value="2004" <?php if (isset($initialyear[1])&&$initialyear[1]=="2004") echo 'selected="selected"'?>>2004</option>
					<option value="2005" <?php if (isset($initialyear[1])&&$initialyear[1]=="2005") echo 'selected="selected"'?>>2005</option>
					<option value="2006" <?php if (isset($initialyear[1])&&$initialyear[1]=="2006") echo 'selected="selected"'?>>2006</option>
					<option value="2007" <?php if (isset($initialyear[1])&&$initialyear[1]=="2007") echo 'selected="selected"'?>>2007</option>
					<option value="2008" <?php if (isset($initialyear[1])&&$initialyear[1]=="2008") echo 'selected="selected"'?>>2008</option>
					<option value="2009" <?php if (isset($initialyear[1])&&$initialyear[1]=="2009") echo 'selected="selected"'?>>2009</option>
					<option value="2010" <?php if (isset($initialyear[1])&&$initialyear[1]=="2010") echo 'selected="selected"'?>>2010</option>
					<option value="2011" <?php if (isset($initialyear[1])&&$initialyear[1]=="2011") echo 'selected="selected"'?>>2011</option>
					<option value="2012" <?php if (isset($initialyear[1])&&$initialyear[1]=="2012") echo 'selected="selected"'?>>2012</option>
					<option value="2013" <?php if (isset($initialyear[1])&&$initialyear[1]=="2013") echo 'selected="selected"'?>>2013</option>
				</select>
				<label for="finaldate1" class="singleline">Final Date:</label>
				<select name="final_month1" id="finaldate1" class="singleline">
					<option value=""></option>
					<option value="01" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="01") echo 'selected="selected"'?>>January</option>
					<option value="02" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="02") echo 'selected="selected"'?>>February</option>
					<option value="03" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="03") echo 'selected="selected"'?>>March</option>
					<option value="04" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="04") echo 'selected="selected"'?>>April</option>
					<option value="05" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="05") echo 'selected="selected"'?>>May</option>
					<option value="06" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="06") echo 'selected="selected"'?>>June</option>
					<option value="07" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="07") echo 'selected="selected"'?>>July</option>
					<option value="08" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="08") echo 'selected="selected"'?>>August</option>
					<option value="09" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="09") echo 'selected="selected"'?>>September</option>
					<option value="10" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="10") echo 'selected="selected"'?>>October</option>
					<option value="11" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="11") echo 'selected="selected"'?>>November</option>
					<option value="12" <?php if (isset($finalmonth[1])&&$finalmonth[1]=="12") echo 'selected="selected"'?>>December</option>
				</select>
				<select name="final_year1" id="finalyear1" class="singleline" >
					<option value=""></option>
					<option value="2000" <?php if (isset($finalyear[1])&&$finalyear[1]=="2000") echo 'selected="selected"'?>>2000</option>
					<option value="2001" <?php if (isset($finalyear[1])&&$finalyear[1]=="2001") echo 'selected="selected"'?>>2001</option>
					<option value="2002" <?php if (isset($finalyear[1])&&$finalyear[1]=="2002") echo 'selected="selected"'?>>2002</option>
					<option value="2003" <?php if (isset($finalyear[1])&&$finalyear[1]=="2003") echo 'selected="selected"'?>>2003</option>
					<option value="2004" <?php if (isset($finalyear[1])&&$finalyear[1]=="2004") echo 'selected="selected"'?>>2004</option>
					<option value="2005" <?php if (isset($finalyear[1])&&$finalyear[1]=="2005") echo 'selected="selected"'?>>2005</option>
					<option value="2006" <?php if (isset($finalyear[1])&&$finalyear[1]=="2006") echo 'selected="selected"'?>>2006</option>
					<option value="2007" <?php if (isset($finalyear[1])&&$finalyear[1]=="2007") echo 'selected="selected"'?>>2007</option>
					<option value="2008" <?php if (isset($finalyear[1])&&$finalyear[1]=="2008") echo 'selected="selected"'?>>2008</option>
					<option value="2009" <?php if (isset($finalyear[1])&&$finalyear[1]=="2009") echo 'selected="selected"'?>>2009</option>
					<option value="2010" <?php if (isset($finalyear[1])&&$finalyear[1]=="2010") echo 'selected="selected"'?>>2010</option>
					<option value="2011" <?php if (isset($finalyear[1])&&$finalyear[1]=="2011") echo 'selected="selected"'?>>2011</option>
					<option value="2012" <?php if (isset($finalyear[1])&&$finalyear[1]=="2012") echo 'selected="selected"'?>>2012</option>
					<option value="2013" <?php if (isset($finalyear[1])&&$finalyear[1]=="2013") echo 'selected="selected"'?>>2013</option>
				</select>
				<label for="company1" class="singleline">Company or department:</label>
				<input type="text" maxlength="30" name="company1" id="company1" class="singleline" value="<?php if (isset($company[1])) echo $company[1]; ?>" />
				<label for="job1" class="singleline">Job:</label>
				<input type="text" maxlength="60" name="job1" id="job1" class="singleline" value="<?php if (isset($job[1])) echo $job[1]; ?>" />
				<label for="form_description1" class="singleline">Description:</label>
				<textarea name="description_experience1" id="form_description1" cols="50" rows="10" class="singleline"><?php if (isset($experience[1])) echo $experience[1]; ?></textarea>
			</div>
			<div class="form_wrapper">
				<label for="initialdate2" class="singleline">Initial date:</label>
				<select name="initial_month2" id="initialdate2" class="singleline" >
					<option value=""></option>
					<option value="01" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="01") echo 'selected="selected"'?>>January</option>
					<option value="02" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="02") echo 'selected="selected"'?>>February</option>
					<option value="03" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="03") echo 'selected="selected"'?>>March</option>
					<option value="04" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="04") echo 'selected="selected"'?>>April</option>
					<option value="05" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="05") echo 'selected="selected"'?>>May</option>
					<option value="06" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="06") echo 'selected="selected"'?>>June</option>
					<option value="07" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="07") echo 'selected="selected"'?>>July</option>
					<option value="08" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="08") echo 'selected="selected"'?>>August</option>
					<option value="09" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="09") echo 'selected="selected"'?>>September</option>
					<option value="10" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="10") echo 'selected="selected"'?>>October</option>
					<option value="11" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="11") echo 'selected="selected"'?>>November</option>
					<option value="12" <?php if (isset($initialmonth[2])&&$initialmonth[2]=="12") echo 'selected="selected"'?>>December</option>
				</select>
				<select name="initial_year2" id="initialyear2" class="singleline" >
					<option value=""></option>
					<option value="2000" <?php if (isset($initialyear[2])&&$initialyear[2]=="2000") echo 'selected="selected"'?>>2000</option>
					<option value="2001" <?php if (isset($initialyear[2])&&$initialyear[2]=="2001") echo 'selected="selected"'?>>2001</option>
					<option value="2002" <?php if (isset($initialyear[2])&&$initialyear[2]=="2002") echo 'selected="selected"'?>>2002</option>
					<option value="2003" <?php if (isset($initialyear[2])&&$initialyear[2]=="2003") echo 'selected="selected"'?>>2003</option>
					<option value="2004" <?php if (isset($initialyear[2])&&$initialyear[2]=="2004") echo 'selected="selected"'?>>2004</option>
					<option value="2005" <?php if (isset($initialyear[2])&&$initialyear[2]=="2005") echo 'selected="selected"'?>>2005</option>
					<option value="2006" <?php if (isset($initialyear[2])&&$initialyear[2]=="2006") echo 'selected="selected"'?>>2006</option>
					<option value="2007" <?php if (isset($initialyear[2])&&$initialyear[2]=="2007") echo 'selected="selected"'?>>2007</option>
					<option value="2008" <?php if (isset($initialyear[2])&&$initialyear[2]=="2008") echo 'selected="selected"'?>>2008</option>
					<option value="2009" <?php if (isset($initialyear[2])&&$initialyear[2]=="2009") echo 'selected="selected"'?>>2009</option>
					<option value="2010" <?php if (isset($initialyear[2])&&$initialyear[2]=="2010") echo 'selected="selected"'?>>2010</option>
					<option value="2011" <?php if (isset($initialyear[2])&&$initialyear[2]=="2011") echo 'selected="selected"'?>>2011</option>
					<option value="2012" <?php if (isset($initialyear[2])&&$initialyear[2]=="2012") echo 'selected="selected"'?>>2012</option>
					<option value="2013" <?php if (isset($initialyear[2])&&$initialyear[2]=="2013") echo 'selected="selected"'?>>2013</option>
				</select>
				<label for="finaldate2" class="singleline">Final Date:</label>
				<select name="final_month2" id="finaldate2" class="singleline">
					<option value=""></option>
					<option value="01" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="01") echo 'selected="selected"'?>>January</option>
					<option value="02" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="02") echo 'selected="selected"'?>>February</option>
					<option value="03" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="03") echo 'selected="selected"'?>>March</option>
					<option value="04" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="04") echo 'selected="selected"'?>>April</option>
					<option value="05" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="05") echo 'selected="selected"'?>>May</option>
					<option value="06" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="06") echo 'selected="selected"'?>>June</option>
					<option value="07" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="07") echo 'selected="selected"'?>>July</option>
					<option value="08" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="08") echo 'selected="selected"'?>>August</option>
					<option value="09" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="09") echo 'selected="selected"'?>>September</option>
					<option value="10" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="10") echo 'selected="selected"'?>>October</option>
					<option value="11" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="11") echo 'selected="selected"'?>>November</option>
					<option value="12" <?php if (isset($finalmonth[2])&&$finalmonth[2]=="12") echo 'selected="selected"'?>>December</option>
				</select>
				<select name="final_year2" id="finalyear2" class="singleline" >
					<option value=""></option>
					<option value="2000" <?php if (isset($finalyear[2])&&$finalyear[2]=="2000") echo 'selected="selected"'?>>2000</option>
					<option value="2001" <?php if (isset($finalyear[2])&&$finalyear[2]=="2001") echo 'selected="selected"'?>>2001</option>
					<option value="2002" <?php if (isset($finalyear[2])&&$finalyear[2]=="2002") echo 'selected="selected"'?>>2002</option>
					<option value="2003" <?php if (isset($finalyear[2])&&$finalyear[2]=="2003") echo 'selected="selected"'?>>2003</option>
					<option value="2004" <?php if (isset($finalyear[2])&&$finalyear[2]=="2004") echo 'selected="selected"'?>>2004</option>
					<option value="2005" <?php if (isset($finalyear[2])&&$finalyear[2]=="2005") echo 'selected="selected"'?>>2005</option>
					<option value="2006" <?php if (isset($finalyear[2])&&$finalyear[2]=="2006") echo 'selected="selected"'?>>2006</option>
					<option value="2007" <?php if (isset($finalyear[2])&&$finalyear[2]=="2007") echo 'selected="selected"'?>>2007</option>
					<option value="2008" <?php if (isset($finalyear[2])&&$finalyear[2]=="2008") echo 'selected="selected"'?>>2008</option>
					<option value="2009" <?php if (isset($finalyear[2])&&$finalyear[2]=="2009") echo 'selected="selected"'?>>2009</option>
					<option value="2010" <?php if (isset($finalyear[2])&&$finalyear[2]=="2010") echo 'selected="selected"'?>>2010</option>
					<option value="2011" <?php if (isset($finalyear[2])&&$finalyear[2]=="2011") echo 'selected="selected"'?>>2011</option>
					<option value="2012" <?php if (isset($finalyear[2])&&$finalyear[2]=="2012") echo 'selected="selected"'?>>2012</option>
					<option value="2013" <?php if (isset($finalyear[2])&&$finalyear[2]=="2013") echo 'selected="selected"'?>>2013</option>
				</select>
				<label for="company2" class="singleline">Company or department:</label>
				<input type="text" maxlength="30" name="company2" id="company2" class="singleline" value="<?php if (isset($company[2])) echo $company[2]; ?>" />
				<label for="job2" class="singleline">Job:</label>
				<input type="text" maxlength="60" name="job2" id="job2" class="singleline" value="<?php if (isset($job[2])) echo $job[2]; ?>" />
				<label for="form_description2" class="singleline">Description:</label>
				<textarea name="description_experience2" id="form_description2" cols="50" rows="10" class="singleline"><?php if (isset($experience[2])) echo $experience[2]; ?></textarea>
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
