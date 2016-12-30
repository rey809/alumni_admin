<?php
	header('Access-Control-Allow-Origin: *'); 
    require('../alumni_admin/includes/db/Database.php'); 
    require('../alumni_admin/includes/db/database_functions.php');
    $database = new Database();
    $database->connect();
 
	$reply = array();

if(isset($_POST["submit_post"]))
{

	$personnel_id = $_POST['personnel_id'];
	$college_explode = $_POST['college'];
	$announcement_details = $_POST['announcement_details'];
	$explode_year = $_POST['batch_year'];
	$year_explode = explode(',', $explode_year);
	$college_explode = explode(',', $college_explode);
	$currentdate = date("Y/m/d");
	$current_time = date("h:i:sa");
 
	foreach ($year_explode as $batch_id)
	{

		foreach ($college_explode as $directory_id) 
		{ 
 		
			$status = insertAnnouncement($database,
				 array(
					  'personnel_id'=>$personnel_id ,
					  'alumni_id'=>0, 
					  'batch_id'=>$batch_id, 
					  'directory_id'=>$directory_id,
					  'details'=>$announcement_details,
					  'date'=>$currentdate,
					  'time'=>$current_time
				  	)
			);
		
			if($status == true)
			{
				$reply[0] = array('message'=>'ok');
			}
			else 
			{
				$reply[0] = array('message'=>'not');
			}
			
		}
	}	
		  		
	echo json_encode($reply);		
}


if (isset($_POST['UploadPhotos'])) {

	$PhotosDescription = $_POST['PhotosDescription'];
	$currentdate = date("Y/m/d");
	$current_time = date("h:i:sa");
	$username='alumni-'.rand(0,1000);
	$new_image_name = $username.".jpg";

	json_encode($_FILES);
	
	//QUERY GOES HERE
	move_uploaded_file($_FILES["file"]["tmp_name"], "assets/img/upload/".$new_image_name);

	$status = insertImage($database,
				 array(
					  'gallery_name'=>$new_image_name,
					  'details'=>$PhotosDescription, 
					  'date'=>$currentdate,
					  'time'=>$current_time
				  	)
			);
			if($status == true)
			{
				$reply[0] = array('message'=>'ok');
			}
			else 
			{
				$reply[0] = array('message'=>'not');
			}
/*	$sql = "INSERT INTO images(caption, name, time, date) VALUES('$PhotosDescription', '$new_image_name', '$current_time', '$currentdate')";

	if (mysqli_query($con,$sql))
	{
			
		$reply[0] = array('message'=>'ok');

	}else{
			$reply[0] = array('message'=>'not');	
		 }	*/
	
	echo json_encode($reply);
}	

/*-------------------------------------------------Submmit Activities*/

if(isset($_POST["submit_activities"])){

	$personnel_id = $_POST['personnel_id'];
	$college_explode = $_POST['college'];
	$activities_details = $_POST['activities_details'];
	$explode_year = $_POST['batch_year'];
	$year_explode = explode(',', $explode_year);
	$college_explode = explode(',', $college_explode);
	$currentdate = date("Y/m/d");
	$current_time = date("h:i:sa");

	foreach ($year_explode as $batch_id) 
	{

		foreach ($college_explode as $directory_id) 
		{

/*		print($batch_id."OKkk".$directory_id);
 exit;*/
			$status = insertActivities($database, array('personnel_id'=>$personnel_id, 'batch_id'=>$batch_id, 'directory_id'=>$directory_id, 'details'=>$activities_details, 'date'=>$currentdate, 'time'=>$current_time));

			if($status == true)
			{
				$reply[0] = array('message'=>'ok');
			}
			else 
			{
				$reply[0] = array('message'=>'not');
			}

		}
	}
	echo json_encode($reply);
		
}

/*-------------------------------------------------END Submmit Activities*/

/*-------------------------------------------------Profile Information Activities*/

if(isset($_POST["select_profile"]))
{
	$alumni_id = $_POST['alumni_id'];
	
	$status = getAlumniInformation($database, $alumni_id);

/*print ("<pre>");
	print_r($status);
print("</pre>");

*/
			if($status == true)
			{
 				
 				 $batch_id = myGetAlumniBatchYearId($database, $alumni_id);
				 $batch_year = myGetAlumniBatchYear($database, $batch_id);
				 $directory_id = myGetAlumniDirectoryId($database, $alumni_id);
				 $directory_name = myGetAlumniDirectoryName($database, $directory_id);

				  $birthDate = date('m/d/Y',strtotime($status[0]['bday']));
				  $birthDate = explode("/", $birthDate);
				  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
				    ? ((date("Y") - $birthDate[2]) - 1)
				    : (date("Y") - $birthDate[2]));

					$fullname = $status[0]['fname']." ".$status[0]['mname']." ".$status[0]['lname']." ".$status[0]['suffix']; 
					$course = $status[0]['course'];
					$rank = $status[0]['rank'];
					$username = $status[0]['username'];
					$email = $status[0]['email']; 
					//$rank = $[0]['rank'];  directory
					$alumni_id_no = $status[0]['id_no_one']." ".$status[0]['id_no_two']." ".$status[0]['id_no_three'];
					$bday = date('m/d/Y',strtotime($status[0]['bday']));
					$gender = $status[0]['gender'];
					$scholar = $status[0]['scholar'];
					$religion = $status[0]['religion'];
					$address = $status[0]['address'];
					$contact_number = $status[0]['contact_number'];
					$work_position = $status[0]['work_position'];
					$company = $status[0]['company'];
					$company_address = $status[0]['company_address'];
					$date_hired = $status[0]['date_hired'];
 
					$reply[0] = array
					(
						'message'=>'ok', 
						'fullname'=>$fullname, 
						'course'=>$course, 
						'rank'=>$rank, 
						'username'=>$username, 
						'email'=>$email,
						'directory_name'=>$directory_name,
						'alumni_id_no'=>$alumni_id_no, 
						'bday'=>$bday, 
						'age'=>$age,
						'gender'=>$gender,
						'year'=>$batch_year,
						'scholar'=>$scholar,
						'religion'=>$religion,
						'address'=>$address,
						'contact_number'=>$contact_number,
						'work_position'=>$work_position,
						'company'=>$company,
						'company_address'=>$company_address,
						'date_hired'=>$date_hired,
					);
						 
			}
			else 
			{
				$reply[0] = array('message'=>'not');
			}	
	echo json_encode($reply);
}

/*-------------------------------------------------DELETE Information Activities*/
if (isset($_POST['delete_alumni_profile'])) 
{
	$alumni_id = $_POST['alumni_id'];

	$status = deteteAlumniinfo($database, $alumni_id);
			if($status == true)
			{
				$reply[0] = array('message'=>'ok');
			}
			else 
			{
				$reply[0] = array('message'=>'not');
			}
	echo json_encode($reply);	
	/*$sql_alumni = "DELETE FROM alumni WHERE alumni_id ='$alumni_id' ";

	if (mysqli_query($con, $sql_alumni)) 
	{
		$reply[0] = array('message'=>'ok');
	}
	else 
	{
		$reply[0] = array('message'=>'not');
	}

	echo json_encode($reply);*/
}

/*------------------------------------------------ADD BATCH YEAR*/

if (isset($_POST['Add_year_Button'])) 
{
	$year = $_POST['year'];

	//QUERY GOES HERE
	$status = insertAlumniBatchYear($database, $year);

	if($status == true)
	{
		$reply[0] = array('message'=>'ok');
	}
	else 
	{
		$reply[0] = array('message'=>'not');
	}
    echo json_encode($reply);
	
}
/*------------------------------------------------END OF ADD BATCH YEAR*/

/*------------------------------------------------ADD ALUMNI ID NUMBER*/
if (isset($_POST['Add_Alumni_ID'])) 
{
	$id_one = $_POST['id_no_one'];
	$id_two = $_POST['id_no_two'];
	$id_three = $_POST['id_no_three'];

	$status = insertAlumniIdNumber($database, $id_one, $id_two, $id_three);

	if($status == true)
	{
		$reply[0] = array('message'=>'ok');
	}
	else 
	{
		$reply[0] = array('message'=>'not');
	}
    echo json_encode($reply); 
}







function myGetAlumniBatchYearId($database, $alumni_id)
{

	$status = getAlumniBatchId($database, $alumni_id);
	return $status[0]['batch_id'];
}

function myGetAlumniBatchYear($database, $batch_id)
{

	$status = getAlumniBatchYear($database, $batch_id);
	return $status[0]['year'];
}

function myGetAlumniDirectoryId($database, $alumni_id){

	$status = getAlumniDirectoryId($database, $alumni_id);
	return $status[0]['directory_id'];
}

function myGetAlumniDirectoryName($database, $directory_id){

	$status = getAlumniDirectoryName($database, $directory_id);
	return $status[0]['name'];	
}
?>


