<?php

	$user_number = $_SESSION['user_id'];

	require_once('../../config.php');
	require_once('../../data/messages.php');

	// Connect to the database
	$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
	// Check for database connection errors
	if (mysqli_connect_errno()) {

		echo $err_db_connection_error;

	}

	if (!mysqli_set_charset($db, 'utf8')) {

		echo $err_db_charset_error;

	}

// Define var:

	// Academic

	if (isset($_POST['C_studies'])) $studies=mysqli_real_escape_string($db, trim($_POST['C_studies']));
	else $studies="";
	if (isset($_POST['C_higher_course'])) $higher_course=mysqli_real_escape_string($db, trim($_POST['C_higher_course']));
	else $higher_course="";
	if (isset($_POST['C_speciality'])) $speciality=mysqli_real_escape_string($db, trim($_POST['C_speciality']));
	else $speciality="";

	// Languages

	if (isset($_POST['english'])) $english=mysqli_real_escape_string($db, trim($_POST['english']));
	else $english="";
	if (isset($_POST['french'])) $french=mysqli_real_escape_string($db, trim($_POST['french']));
	else $french="";
	if (isset($_POST['italian'])) $italian=mysqli_real_escape_string($db, trim($_POST['italian']));
	else $italian="";
	if (isset($_POST['german'])) $german=mysqli_real_escape_string($db, trim($_POST['german']));
	else $german="";
	if (isset($_POST['portuguese'])) $portuguese=mysqli_real_escape_string($db, trim($_POST['portuguese']));
	else $portuguese="";
	if (isset($_POST['russian'])) $russian=mysqli_real_escape_string($db, trim($_POST['russian']));
	else $russian="";
	if (isset($_POST['swedish'])) $swedish=mysqli_real_escape_string($db, trim($_POST['swedish']));
	else $swedish="";
	if (isset($_POST['dutch'])) $dutch=mysqli_real_escape_string($db, trim($_POST['dutch']));
	else $dutch="";
	if (isset($_POST['chinese'])) $chinese=mysqli_real_escape_string($db, trim($_POST['chinese']));
	else $chinese="";

	// Computing

	if (isset($_POST['Windows'])) $windows=mysqli_real_escape_string($db, trim($_POST['Windows']));
	else $windows="";
	if (isset($_POST['Mac'])) $mac=mysqli_real_escape_string($db, trim($_POST['Mac']));
	else $mac="";
	if (isset($_POST['Linux'])) $linux=mysqli_real_escape_string($db, trim($_POST['Linux']));
	else $linux="";
	if (isset($_POST['Databases'])) $databases=mysqli_real_escape_string($db, trim($_POST['Databases']));
	else $databases="";
	if (isset($_POST['accounting'])) $accounting=mysqli_real_escape_string($db, trim($_POST['accounting']));
	else $accounting="";
	if (isset($_POST['cad'])) $cad=mysqli_real_escape_string($db, trim($_POST['cad']));
	else $cad="";
	if (isset($_POST['Graphic'])) $graphic=mysqli_real_escape_string($db, trim($_POST['Graphic']));
	else $graphic="";
	if (isset($_POST['Spreadsheet'])) $spreadsheet=mysqli_real_escape_string($db, trim($_POST['Spreadsheet']));
	else $spreadsheet="";
	if (isset($_POST['Email'])) $email=mysqli_real_escape_string($db, trim($_POST['Email']));
	else $email="";
	if (isset($_POST['Presentations'])) $presentations=mysqli_real_escape_string($db, trim($_POST['Presentations']));
	else $presentations="";
	if (isset($_POST['Wordprocessors'])) $word=mysqli_real_escape_string($db, trim($_POST['Wordprocessors']));
	else $word="";
	if (isset($_POST['Programation'])) $programation=mysqli_real_escape_string($db, trim($_POST['Programation']));
	else $programation="";
	if (isset($_POST['Simulation'])) $simulation=mysqli_real_escape_string($db, trim($_POST['Simulation']));
	else $simulation="";
	if (isset($_POST['Communications'])) $communications=mysqli_real_escape_string($db, trim($_POST['Communications']));
	else $communications="";
	if (isset($_POST['Mathematics'])) $mathematics=mysqli_real_escape_string($db, trim($_POST['Mathematics']));
	else $mathematics="";

	// Professional experience

	if (isset($_POST['C_work_time'])) $worktime=mysqli_real_escape_string($db, trim($_POST['C_work_time']));
	else $worktime="";

	function finduser($db,$query) {

		$var = mysqli_query($db, $query);

		if ($var) {

			$array=array();
			$num_results = mysqli_num_rows($var);

			for ($i=0; $i<$num_results; $i++) {

				$row = mysqli_fetch_row($var);
				$user=$row[0];
				$array2=array_intersect($array,(array)$user);
				if (empty($array2)) {
					$array=array_merge($array,(array)$user);
				}

	        }

	    }

		if (!empty($array)) {

			$array=implode(',',$array);
			return $array;

	    }

    }

    function worktime($db,$query,$time) {

		$var = mysqli_query($db,$query);

		if ($var) {

			$array=array();
			$num_results = mysqli_num_rows($var);
			$user="";
			$totalmonths=0;

			for ($i=0; $i<$num_results; $i++) {

				$row = mysqli_fetch_row($var);
				$antuser=$user;
				$user=$row[0];
				$initialdate=explode('-',$row[1]);
				$initialyear=$initialdate[0];
				$initialmonth=$initialdate[1];
				$finaldate=explode('-',$row[2]);
				$finalyear=$finaldate[0];
				$finalmonth=$finaldate[1];
				$months=($finalyear-$initialyear)*12+($finalmonth-$initialmonth);
				if ($user==$antuser) {
					$totalmonths+=$months;
					if ($totalmonths>=$time) {
						$array2=array_intersect($array,(array)$user);
						if (empty($array2)) {
							$array=array_merge($array,(array)$user);
						}
					}
				}
				else {
					$totalmonths=$months;
					if ($totalmonths>=$time) {
						$array2=array_intersect($array,(array)$user);
						if (empty($array2)) {
							$array=array_merge($array,(array)$user);
						}
					}
				}

			}
		}

		if (!empty($array)) {

			$array=implode(',',$array);
			return $array;

	    }

    }


// Resolving:

	// Academic

	$query = "select user from students_academic_data";

	if ($studies!="") {
		$query.= " where studies='".$studies."'";
	}

	if ($higher_course!="" and $studies!="") {
		$query.= " and higher_course='".$higher_course."'";
	} elseif ($higher_course!="") {
		$query.= " where higher_course='".$higher_course."'";
	}

	if ($speciality!="" and ($studies!="" or $higher_course!="")) {
		$query.= " and speciality='".$speciality."'";
	} elseif ($speciality!="") {
		$query.= " where speciality='".$speciality."'";
	}

	$array=finduser($db,$query);

	// Languages

	$query = "select user from students_languages where user in (".$array.")";

	if ($english!="") {
		$query.= " and language='".$english."'";
		$array=finduser($db,$query);
	}

	$query = "select user from students_languages where user in (".$array.")";

	if ($french!="") {
		$query.= " and language='".$french."'";
		$array=finduser($db,$query);
	}

	$query = "select user from students_languages where user in (".$array.")";

	if ($italian!="") {
		$query.= " and language='".$italian."'";
		$array=finduser($db,$query);
	}

	$query = "select user from students_languages where user in (".$array.")";

	if ($german!="") {
		$query.= " and language='".$german."'";
		$array=finduser($db,$query);
	}

	$query = "select user from students_languages where user in (".$array.")";

	if ($portuguese!="") {
		$query.= " and language='".$portuguese."'";
		$array=finduser($db,$query);
	}

	$query = "select user from students_languages where user in (".$array.")";

	if ($russian!="") {
		$query.= " and language='".$russian."'";
		$array=finduser($db,$query);
	}

	$query = "select user from students_languages where user in (".$array.")";

	if ($swedish!="") {
		$query.= " and language='".$swedish."'";
		$array=finduser($db,$query);
	}

	$query = "select user from students_languages where user in (".$array.")";

	if ($dutch!="") {
		$query.= " and language='".$dutch."'";
		$array=finduser($db,$query);
	}

	$query = "select user from students_languages where user in (".$array.")";

	if ($chinese!="") {
		$query.= " and language='".$chinese."'";
		$array=finduser($db,$query);
	}


	// Computing experience

	$query= "select user from students_computing_experience where user in (".$array.")";

	if ($windows!="")         $query .= " and windows>=2 ";
	if ($mac!="")             $query .= " and mac>=2 ";
	if ($linux!="")           $query .= " and linux>=2 ";
	if ($databases!="")       $query .= " and data_bases>=2 ";
	if ($accounting!="")      $query .= " and finances_accounting>=2 ";
	if ($cad!="")             $query .= " and cad>=2 ";
	if ($graphic!="")         $query .= " and graphic_design>=2 ";
	if ($spreadsheet!="")     $query .= " and spreadsheet>=2 ";
	if ($email!="")           $query .= " and email>=2 ";
	if ($presentations!="")   $query .= " and presentations>=2 ";
	if ($word!="")            $query .= " and word_processors>=2 ";
	if ($programation!="")    $query .= " and programming_languages>=2 ";
	if ($simulation!="")      $query .= " and simulation>=2 ";
	if ($communications!="")  $query .= " and communications_networks>=2 ";
	if ($mathematics!="")     $query .= " and maths_statistics>=2 ";

	$array=finduser($db,$query);

	// Work time

	if ($worktime!=0) {
		$query = "select * from students_work_experience where user in (".$array.")";
		$array=worktime($db,$query,$worktime);
	}
	$query = "select * from students_personal_data where user in (".$array.")";
	$result = mysqli_query($db, $query);

	// Show results:

	if ($result) {

		$num_results = mysqli_num_rows($result);
		
	}
	
	$array=explode(',',$array);

?>


