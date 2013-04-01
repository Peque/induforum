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

	$studies=mysqli_real_escape_string($db, trim($_POST['studies']));
	$higher_course=mysqli_real_escape_string($db, trim($_POST['higher_course']));
	$speciality=mysqli_real_escape_string($db, trim($_POST['speciality']));

	$english=mysqli_real_escape_string($db, trim($_POST['english']));
	$french=mysqli_real_escape_string($db, trim($_POST['french']));
	$italian=mysqli_real_escape_string($db, trim($_POST['italian']));
	$german=mysqli_real_escape_string($db, trim($_POST['german']));
	$portuguese=mysqli_real_escape_string($db, trim($_POST['portuguese']));
	$russian=mysqli_real_escape_string($db, trim($_POST['russian']));
	$swedish=mysqli_real_escape_string($db, trim($_POST['swedish']));
	$dutch=mysqli_real_escape_string($db, trim($_POST['dutch']));
	$chinese=mysqli_real_escape_string($db, trim($_POST['chinese']));

	$windows=mysqli_real_escape_string($db, trim($_POST['Windows']));
	$mac=mysqli_real_escape_string($db, trim($_POST['Mac']));
	$linux=mysqli_real_escape_string($db, trim($_POST['Linux']));
	$databases=mysqli_real_escape_string($db, trim($_POST['Databases']));
	$accounting=mysqli_real_escape_string($db, trim($_POST['accounting']));
	$cad=mysqli_real_escape_string($db, trim($_POST['cad']));
	$graphic=mysqli_real_escape_string($db, trim($_POST['Graphic']));
	$spreadsheet=mysqli_real_escape_string($db, trim($_POST['Spreadsheet']));
	$email=mysqli_real_escape_string($db, trim($_POST['Email']));
	$presentations=mysqli_real_escape_string($db, trim($_POST['Presentations']));
	$word=mysqli_real_escape_string($db, trim($_POST['Wordprocessors']));
	$programation=mysqli_real_escape_string($db, trim($_POST['Programation']));
	$simulation=mysqli_real_escape_string($db, trim($_POST['Simulation']));
	$communications=mysqli_real_escape_string($db, trim($_POST['Communications']));
	$mathematics=mysqli_real_escape_string($db, trim($_POST['Mathematics']));

	$worktime=mysqli_real_escape_string($db, trim($_POST['C_work_time']));

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
		if(!empty($array)) {
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
				if ($user==$antuser){
					$totalmonths+=$months;
					if ($totalmonths>=$time){	  
					$array2=array_intersect($array,(array)$user);
					if (empty($array2)) {
					$array=array_merge($array,(array)$user);
					
               }
	        	}
				}
				else { 
				$totalmonths=$months;
				if ($totalmonths>=$time){	  
					$array2=array_intersect($array,(array)$user);
					if (empty($array2)) {
					$array=array_merge($array,(array)$user);
					
               }
	        	}
				
				}
				
			}

	   }
		if(!empty($array)) {
			$array=implode(',',$array);
			return $array;
	    }

    }


// Resolving:

	$query = "select * from students_academic_data";
	if ($studies!=""){$query.= " where studies='".$studies."'";}

	if ($higher_course!="" and $studies!="") {$query.= " and higher_course='".$higher_course."'"; } elseif ($higher_course!="") {$query.= " where higher_course='".$higher_course."'"; }

	if ($speciality!="" and ($studies!="" or $higher_course!="")) {$query.= " and speciality='".$speciality."'"; } elseif ($speciality!="") {$query.= " where speciality='".$speciality."'"; }


	$array=finduser($db,$query);
	//Languages
	$query = "select * from students_languages where user in (".$array.")";

		if ($english!="") {
		$query.= " and language='".$english."'";
		$array=finduser($db,$query);
		}


	$query = "select * from students_languages where user in (".$array.")";


		if ($french!="") {
		$query.= " and language='".$french."'";
		$array=finduser($db,$query);

	}


	$query = "select * from students_languages where user in (".$array.")";

		if ($italian!="") {
		$query.= " and language='".$italian."'";
		$array=finduser($db,$query);}

	$query = "select * from students_languages where user in (".$array.")";

		if ($german!="") {
		$query.= " and language='".$german."'";
		$array=finduser($db,$query);}

	$query = "select * from students_languages where user in (".$array.")";

		if ($portuguese!="") {
		$query.= " and language='".$portuguese."'";
		$array=finduser($db,$query);
		}

	$query = "select * from students_languages where user in (".$array.")";

		if ($russian!="") {
		$query.= " and language='".$russian."'";
		$array=finduser($db,$query);
		}


	$query = "select * from students_languages where user in (".$array.")";

		if ($swedish!="") {
		$query.= " and language='".$swedish."'";
		$array=finduser($db,$query);
		}


	$query = "select * from students_languages where user in (".$array.")";

		if ($dutch!="") {
		$query.= " and language='".$dutch."'";
		$array=finduser($db,$query);
		}


	$query = "select * from students_languages where user in (".$array.")";


		if ($chinese!="") {
		$query.= " and language='".$chinese."'";
		$array=finduser($db,$query);
		}


	//Computing experience
	$query= "select * from students_computing_experience where user in (".$array.")";

		if ($windows!="") {
		$query.= " and windows>=2 ";
		$array=finduser($db,$query);

	}

		if ($mac!="") {
		$query.= " and mac>=2 ";
		$array=finduser($db,$query);

	}

		if ($linux!="") {
		$query.= " and linux>=2 ";
		$array=finduser($db,$query);

	}

		if ($databases!="") {
		$query.= " and databases>=2 ";
		$array=finduser($db,$query);

	}

		if ($accounting!="") {
		$query.= " and accounting>=2 ";
		$array=finduser($db,$query);

	}

		if ($cad!="") {
		$query.= " and cad>=2 ";
		$array=finduser($db,$query);

	}

		if ($graphic!="") {
		$query.= " and graphic>=2 ";
		$array=finduser($db,$query);

	}

		if ($spreadsheet!="") {
		$query.= " and spreadsheet>=2 ";
		$array=finduser($db,$query);

	}

		if ($email!="") {
		$query.= " and email>=2 ";
		$array=finduser($db,$query);

	}

		if ($presentations!="") {
		$query.= " and presentations>=2 ";
		$array=finduser($db,$query);

	}

		if ($word!="") {
		$query.= " and word>=2 ";
		$array=finduser($db,$query);

	}

		if ($programation!="") {
		$query.= " and programation>=2 ";
		$array=finduser($db,$query);

	}

		if ($simulation!="") {
		$query.= " and simulation>=2 ";
		$array=finduser($db,$query);

	}

		if ($communications!="") {
		$query.= " and communications>=2 ";
		$array=finduser($db,$query);

	}

		if ($mathematics!="") {
		$query.= " and mathematics>=2 ";
		$array=finduser($db,$query);

	}
	//Work time
	if ($worktime!=0){
	$query = "select * from students_work_experience where user in (".$array.")";
	$array=worktime($db,$query,$worktime);
	}
	$query = "select * from students_personal_data where user in (".$array.")";
	$result = mysqli_query($db, $query);

		//show results:
		if ($result) {

			$num_results = mysqli_num_rows($result);
			for ($i=0; $i<$num_results; $i++) {

				$row = mysqli_fetch_row($result);
				$user=$row[0];
				$query = "select * from students_personal_data where user='".$user."'";
				$result2=mysqli_query($db, $query);
				$personal=mysqli_fetch_row($result2);
				
				echo "<tr><td>$user</td>
				<td>" ;
				echo '<a href="../../download.php?user='.$user.'">CV</a>';
				echo "</td></tr>";

			}

		}





	?>

 
