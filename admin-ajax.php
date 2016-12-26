<?php
include 'includes/connect.php';
header('Access-Control-Allow-Origin: *');

$reply = array();
if(isset($_POST["submit_post"])){

	$personnel_id = $_POST['personnel_id'];
	$college_explode = $_POST['college'];
	$announcement_details = $_POST['announcement_details'];
	$explode_year = $_POST['batch_year'];
	$year_explode = explode(',', $explode_year);
	$college_explode = explode(',', $college_explode);


	foreach ($year_explode as $batch_id) {

		/*foreach ($college_explode as $directory_id) { */
 		
			$sql_batch = mysqli_query($con, "SELECT * FROM batch WHERE batch_id = '$batch_id' ");
			while ($row_batch = mysqli_fetch_assoc($sql_batch)) {
					//QUERY GOES HERE
				$reply[0] = array('message'=>'ok', 'id'=>$row_batch['batch_id']);	
			}
		}
	/*}*/	
		  		
	echo json_encode($reply);		
}


if (isset($_POST['UploadPhotos'])) {

	$PhotosDescription = $_POST['PhotosDescription'];
	$currentdate = date("Y/m/d");
	$current_time = date("h:i:sa");
	$username='alumni-'.rand(0,1000);
	$new_image_name = $username.".jpg";

	print_r(json_encode($_POST));
	print_r(json_encode($_FILES));
	
	//QUERY GOES HERE
	move_uploaded_file($_FILES["file"]["tmp_name"], "assets/img/upload/".$new_image_name);

	$sql = "INSERT INTO images(caption, name, time, date) VALUES('$PhotosDescription', '$new_image_name', '$current_time', '$currentdate')";

	if (mysqli_query($con,$sql))
	{
			
		$reply[0] = array('message'=>'ok');

	}else{
			$reply[0] = array('message'=>'not');	
		 }	
	
	echo json_encode($reply);
}	

/*-------------------------------------------------Submmit Activities*/

if(isset($_POST["sumbit_activities"])){

	$college_explode = $_POST['college'];
	$activities_details = $_POST['activities_details'];
	$explode_year = $_POST['batch_year'];
	$year_explode = explode(',', $explode_year);
	$college_explode = explode(',', $college_explode);
	$currentdate = date("Y/m/d");
	$current_time = date("h:i:sa");
	$replyResponse = []; 

	$counter=  0; 

	foreach ($year_explode as $batch_year) {

		foreach ($college_explode as $college) { 
 
			//QUERY GOES HERE
			$sql_college = mysqli_query($con,"SELECT * FROM college WHERE college_id = '".$college."'");
	  		while ($row_college= mysqli_fetch_assoc($sql_college)) {
						$sql_batch = "SELECT * FROM batch WHERE year = '".$batch_year."' AND college_id='".$row_college['college_id']."'";

				if ($result=mysqli_query($con,$sql_batch))
		  		{
		  			$rowcount=mysqli_num_rows($result);
		  			if($rowcount > 0) {  

		  			   while($row= mysqli_fetch_assoc($result)){
		  			   	$batch_id = $row['batch_id'];
		  			   	$sql_alumni = mysqli_query($con,"SELECT * FROM alumni WHERE batch_id = '".$batch_id."'");
		  			   		 
		  			   		 while($row_alumni= mysqli_fetch_assoc($sql_alumni)){
							 	$phonenumber = $row_alumni['contact_number'];

								mysqli_query($con,"INSERT INTO activities(batch_id, details, date, time, status) VALUES('$batch_id', '$activities_details', '$currentdate','$current_time', 0 )");					
							}
						} 

		  				// print "success"; 
		  				$replyResponse[$counter]['status'] = 'ok'; 

		  			} else {
		  				// print "not success";
						$replyResponse[$counter]['status'] = 'not'; 
		  			}
						$replyResponse[$counter]['college'] =  $row_college['name']; 
		  				$replyResponse[$counter]['year'] =  $batch_year; 
		  				$replyResponse[$counter]['phone_number'] =  $phonenumber; 

		  				$counter++; 

		  		} else {
		  			 print "invalid query"; 
		  		}
			}
		}
	}	
	echo json_encode($replyResponse);		
}

/*-------------------------------------------------END Submmit Activities*/

/*-------------------------------------------------Profile Information Activities*/

if(isset($_POST["select_profile"]))
{
	$alumni_id = $_POST['alumni_id'];

	$sql_alumni = " SELECT * FROM alumni WHERE alumni_id ='$alumni_id' ";

	if($result_alumni=mysqli_query($con,$sql_alumni))
	{
		while ($row_alumni = mysqli_fetch_assoc($result_alumni)) 
		{

			$result_batch = mysqli_query($con, " SELECT * FROM batch WHERE batch_id = '".$row_alumni['batch_id']."' ");
			while ($row_batch = mysqli_fetch_assoc($result_batch)) 
			{
					
				$result_college = mysqli_query($con, " SELECT * FROM college WHERE college_id = '".$row_batch['college_id']."' ");

				while ($row_college = mysqli_fetch_assoc($result_college)) 
					{

					$fname = $row_alumni['fname'];
					$mname = $row_alumni['mname'];
					$lname = $row_alumni['lname'];
					$suffix = $row_alumni['suffix'];
					$course = $row_alumni['course'];
					$rank = $row_alumni['rank'];
					$username = $row_alumni['username'];
					$email = $row_alumni['email'];
					$directory = $row_college['name'];		
					$one = $row_alumni['id_no_one'];
					$two = $row_alumni['id_no_two'];
					$three = $row_alumni['id_no_three'];
					$bday = $row_alumni['bday'];
					$age = $row_alumni['age'];
					$gender = $row_alumni['gender'];
					$scholarship = $row_alumni['scholarship'];
					$year = $row_batch['year'];
					$religion = $row_alumni['religion'];
					$address = $row_alumni['address'];
					$contact_number = $row_alumni['contact_number'];
					$work_position = $row_alumni['work_position'];
					$company_name = $row_alumni['company_name'];
					$company_address = $row_alumni['company_address'];
					$date_hired = $row_alumni['date_hired'];

					$reply[0] = array(
									  'message' => 'ok', 
									  'fullname' => $fname." ".$mname." ".$lname." ".$suffix, 
									  'course' => $course,
									  'rank' => $rank,
									  'username' => $username,
									  'email' => $email, 
									  'directory' => $directory, 
									  'alumni_id_no' => $one." ".$two." ".$three,
									  'bday' => $bday,
									  'age' => $age,
									  'gender' => $gender,
									  'scholarship' => $scholarship,
									  'year' => $year,
									  'religion' => $religion,
									  'address' => $address,
									  'phonenumber' => $contact_number,
									  'work_position' => $work_position,
									  'company_name' => $company_name,
									  'company_address' => $company_address,
									  'date_hired' => $date_hired
									); 
				}
			}
		}
		
 	}
	echo json_encode($reply);
}

/*-------------------------------------------------DELETE Information Activities*/
if (isset($_POST['delete_alumni_profile'])) 
{
	$alumni_id = $_POST['alumni_id'];

	$sql_alumni = "DELETE FROM alumni WHERE alumni_id ='$alumni_id' ";

	if (mysqli_query($con, $sql_alumni)) 
	{
		$reply[0] = array('message'=>'ok');
	}
	else 
	{
		$reply[0] = array('message'=>'not');
	}

	echo json_encode($reply);
}

/*------------------------------------------------ADD BATCH YEAR*/

if (isset($_POST['Add_year_Button'])) 
{
	$year = $_POST['year'];
	//QUERY GOES HERE
		$sql = mysqli_query($con," SELECT * FROM batch WHERE year = '$year' ");

		if (mysqli_num_rows($sql)>0){
			$reply[0] = array('message'=>'not');

		} else {
				mysqli_query($con,"INSERT INTO batch(year) VALUES('$year')");

			$reply[0] = array('message'=>'ok');	
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

 	$sql = "SELECT * FROM alumni WHERE id_no_one = '".$id_one."' AND id_no_two = '".$id_two."' AND id_no_three = '".$id_three."' ";

    if (mysqli_num_rows(mysqli_query($con,$sql))>0)
    {
        $reply[0] = array('message'=>'not');
        
    } 
    else 
    {
        mysqli_query($con,"INSERT INTO alumni(id_no_one, id_no_two, id_no_three) VALUES('$id_one', '$id_two', '$id_three')");
        $reply[0] = array('message'=>'ok');
    }
    echo json_encode($reply); 
}


?>


