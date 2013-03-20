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

	$studies=$_POST['C_studies'];
	$higher_course=$_POST['C_higher_course'];
	$speciality=$_POST['C_speciality'];

	$english=$_POST['english'];
	$french=$_POST['french'];
	$italian=$_POST['italian'];
	$german=$_POST['german'];
	$portuguese=$_POST['portuguese'];
	$russian=$_POST['russian'];
	$swedish=$_POST['swedish'];
	$dutch=$_POST['dutch'];
	$chinese=$_POST['chinese'];

	$windows=$_POST['Windows'];
	$mac=$_POST['Mac'];
	$linux=$_POST['Linux'];
	$databases=$_POST['Databases'];
	$accounting=$_POST['accounting'];
	$cad=$_POST['cad'];
	$graphic=$_POST['Graphic'];
	$spreadsheet=$_POST['Spreadsheet'];
	$email=$_POST['Email'];
	$presentations=$_POST['Presentations'];
	$word=$_POST['Wordprocessors'];
	$programation=$_POST['Programation'];
	$simulation=$_POST['Simulation'];
	$communications=$_POST['Communications'];
	$mathematics=$_POST['Mathematics'];

	$worktime=$_POST['C_work_time'];

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
				echo "<tr><td>$user</td><td>CV</td></tr>";

			}

		}





	?>

 
