<?php 
  session_start(); 
  require 'includes/connect.php';
  
  if(!$_SESSION['username'])  
  { 
      header("Location: director-login.php"); 
  } 

$query = "SELECT * FROM personnel WHERE username = '".$_SESSION['username']."'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
		
		$personnel_id = $row['personnel_id'];	
        $username = $row['username'];
include 'includes/header.php'; 
?>

<style type="text/css">
	    #selectedFiles img {
        max-width: 200px; 
        max-height: 200px;
        float: left;
        margin-bottom:10px;
    }

.btn-small {
    height: 24px;
    line-height: 24px;
    padding: 0 0.5rem;
}
</style>
<input type="hidden" id="hidden_id" name="hidden_id">
<input type="file" id="files" name="files" multiple style="visibility: hidden;">
  <div id="test1" class="col s12">
  <!-- 	<div class="container"> -->
  		
			<table id="alumni" class="display responsive no-wrap" width="100%">
		        <thead>
		            <tr>
		                <th>Full Name</th>
		                <th>College & Course</th>
		                <th>Gender</th>
		                <th>Contacts</th>
		                <th>Info.</th>
		                <th>Delete</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>Full Name</th>
		                <th>College & Course</th>
		                <th>Gender</th>
		                <th>Contacts</th>
		                <th>Info.</th>
		                <th>Delete</th>
		            </tr>
		        </tfoot>
		        <tbody>
		        <?php
		        $sql_alumni = mysqli_query($con, "SELECT * FROM alumni WHERE id_no_one !='' AND id_no_two !='' AND id_no_three != '' AND fname !='' ");
		        	while ($row_alumni = mysqli_fetch_assoc($sql_alumni)) {
		        ?>
			            <tr>
			                <td><?php echo $row_alumni['fname']." ".$row_alumni['mname']." ".$row_alumni['lname']; ?></td>
			                <td><?php echo $row_alumni['course']; ?></td>
			                <td><?php echo $row_alumni['gender']; ?></td>
			                <td><?php echo $row_alumni['contact_number']; ?></td>
			                <td><a class="waves-effect waves-light btn btn-small profileview" id="<?php echo $row_alumni['alumni_id']; ?>" href="#modal1"><i class="material-icons">assignment_ind</i></a></td>
			                <td><button type="button" class="waves-effect waves-light btn btn-small delete_alumni_profile" id="<?php echo $row_alumni['alumni_id']; ?>" ><i class="material-icons">delete_forever</i></button></td>
			            </tr>
		        <?php
		        	}
		        ?>
		        </tbody>
    		</table>

   <!--  </div> -->
  </div>
<!-- ---------------------------END OF VIEW OF ALL ALUMNI---------------------------------- -->
<div id="test2" class="col s12">
  	<div class="container">

  	    <div class="page-header">
  	    <div class="container">
    		<h5>HEADER FOR ANNOUNCEMENT</h5>
    	 </div>
		</div>
			<!-- profile-page-wall-share -->
        <div id="profile-page-wall-share" class="row">
            <div class="col s11 offset-s1">
                <ul class="tabs tab-profile z-depth-1 light-blue">
                      <li class="tab col s4"><a class="white-text waves-effect waves-light 	active" href="#UpdateAnnouncement"><i class="material-icons" style="font-size:20px;">border_color</i> Announcement</a>
                      </li>                    
                </ul>
                <h6 id="idhere">append here </h6>
                    <!-- UpdateAnnouncement-->
                <div id="UpdateAnnouncement" class="tab-content col s12  grey lighten-4">
                    <div class="row">
                        <div class="col s1"><br>
                          <img src="assets/img/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
                        <div class="input-field col s10">
                          <textarea row="2" class="materialize-textarea" id="announcement_detail"></textarea>
                          <label for="textarea" class="">What's on your mind?</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 share-icons">
                        <div class="input-field col s12 m7 right-align">
							    <select multiple id="college_name_announcement">
							      <option value="" disabled selected>Choose College</option>
							      <?php
							      	$sql_directory = mysqli_query($con,"SELECT * FROM directory");
							      	while($row_directory =mysqli_fetch_assoc($sql_directory)){
							      ?>
							      		<option value="<?php echo $row_directory['directory_id']; ?>"><?php echo $row_directory['name']; ?></option>
							      <?php
							  		}
							      ?>
							    </select>
							    <label>College Select</label>
  							</div>
                        </div>
                        <div class="col s12 m6 right-align">
                           <!-- Dropdown Trigger -->
							<div class="input-field col s12 m7 right-align">
							    <select multiple id="batch_year_announcement">
							      <option value="" disabled selected>Choose Batch</option>
							      <?php
							      	$sql_batch = mysqli_query($con,"SELECT * FROM batch");
							      	while($row_batch=mysqli_fetch_assoc($sql_batch)){
							      ?>
							      <option value="<?php echo $row_batch['batch_id']; ?>"><?php echo $row_batch['year']; ?></option>
							      <?php
							      	}
							      ?>
							    </select>
							    <label>Batch Select</label>
  							</div>
								<br>
                            <button class="waves-effect waves-light btn" id="AnnouncementDetails"><i class="material-icons">rate_review</i>Post</button>
                        </div>

                    </div>
		  		</div>    
		  	</div>
  		</div>
    </div>
  </div> 

<!-- ------------------------------------END OF ANNOUNCEMENT----------------------------------- -->  
<div id="test3" class="col s12">
  	<div class="container">

  	  	<div class="page-header">
	  	    <div class="container">
	    		<h5>HEADER FOR ACTIVITIES</h5>
	    	</div>
		</div>
		<!-- profile-page-wall-share -->
        <div id="profile-page-wall-share" class="row">
            <div class="col s11 offset-s1">
                <ul class="tabs tab-profile z-depth-1 light-blue">
                      <li class="tab"><a class="white-text waves-effect waves-light active" href="#UpdateActivities"><i class="material-icons" style="font-size:20px;">border_color</i> Activities</a>
                      </li>
                      <li class="tab"><a class="white-text waves-effect waves-light" href="#AddActivitiesPhotos"><i class="material-icons" style="font-size:20px;">add_a_photo</i> Add Photos</a>
                      </li>
                      <li class="tab"><a class="white-text waves-effect waves-light" href="#AddActivitiesFiles"><i class="material-icons" style="font-size:20px;">attach_file</i> Upload Files</a>
                      </li>                      
                </ul>

                
					<!-- UpdateActivities-->
                <div id="UpdateActivities" class="tab-content col s12  grey lighten-4">
                    <h6 id="activities_status">append</h6>
                    <div class="row">
                        <div class="col s1"><br>
                          <img src="assets/img/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
                        <div class="input-field col s10">
                          <textarea row="2" class="materialize-textarea" id="activities_details"></textarea>
                          <label for="activities" class="">What's on your mind?</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 share-icons">
                        	<div class="input-field col s12 m7 right-align">
							    <select multiple id="college_name_activities">
							      <option value="" disabled selected>Choose College</option>
							      <?php
							      	$sql_directory = mysqli_query($con,"SELECT * FROM directory");
							      	while($row_directory=mysqli_fetch_assoc($sql_directory)){
							      ?>
							      		<option value="<?php echo $row_directory['directory_id']; ?>"><?php echo $row_directory['name']; ?></option>
							      <?php
							  		}
							      ?>
							    </select>
							    <label>College Select</label>
  							</div>
                        </div>
						<div class="col s12 m6 right-align">
                           <!-- Dropdown Trigger -->
							<div class="input-field col s12 m7 right-align">
							    <select multiple id="batch_year_activities">
							      <option value="" disabled selected>Choose Batch</option>
							      <?php
							      	$sql_batch = mysqli_query($con,"SELECT * year FROM batch");
							      	while($row_batch=mysqli_fetch_assoc($sql_batch)){
							      ?>
							      <option value="<?php echo $row_batch['batch_id']; ?>"><?php echo $row_batch['year']; ?></option>
							      <?php
							      	}
							      ?>
							    </select>
							    <label>Batch Select</label>
  							</div>
								<br>
                            <button class="waves-effect waves-light btn right-align" id="Submit_Activities"><i class="material-icons">rate_review</i>Post</button>
						</div>
                    </div>
      
                </div>
                    <!-- AddPhotos-->
                <div id="AddActivitiesPhotos" class="tab-content col s12  grey lighten-4">
                    <div class="row">
                        <div class="col s1"><br>
                          <img src="assets/img/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
                        <div class="input-field col s10">
                          <textarea id="PhotosDescription" row="2" class="materialize-textarea"></textarea>
                          <label for="textarea" class="">Share your favorites photos!</label>
                        </div>
                    </div>

                    <div class="row">
	                    <div class="container">
	                    	<div id="selectedFiles"></div> <!-- ------------DISPLAY IMAGE HERE BEFOR UPLOAD-->
	                    </div>
                        <div class="input-field col s5 m8 right-align">
							<button class="waves-effect waves-light btn right-align" onclick="$('#files').click()"><i class="material-icons">add_a_photo</i></button>
  						</div>
                           <!-- Dropdown Trigger -->
						<div class="input-field col s5 m3 right-align"> <button class="waves-effect waves-light btn right-align" id="UploadPhoto"><i class="material-icons">rate_review</i>Post</button>
  						</div>
                    </div>   
                </div>	
                                    <!-- AddFiles-->
                <div id="AddActivitiesFiles" class="tab-content col s12  grey lighten-4">
                    <div class="row">
                        <div class="col s1"><br>
                          <img src="assets/img/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
                        <div class="input-field col s10">
                          <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                          <label for="textarea" class="">Share your files. </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s5 m3 right-align">
							    <select>
							      <option value="" disabled selected>Choose College</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							      <option value="3">Option 3</option>
							    </select>
							    <label>College Select</label>
  							</div>
                           <!-- Dropdown Trigger -->
							<div class="input-field col s5 m3 right-align">
							    <select>
							      <option value="" disabled selected>Choose Batch</option>
							      <option value="1">Option 1</option>
							      <option value="2">Option 2</option>
							      <option value="3">Option 3</option>
							    </select>
							    <label>Batch Select</label>
  							</div>
							
							<div class="input-field col s3 m3 right-align">
	                            <button class="waves-effect waves-light btn"><i class="material-icons">attach_file</i></button>
                        	</div>
                        	<div class="input-field col s3 m2 right-align">
	                            <button class="waves-effect waves-light btn"><i class="material-icons">rate_review</i>Post</button>
                        	</div>
                    	</div>	
            		</div> 
            	</div>
            </div>   
        </div>
 	
 	</div>
</div> 

  <div id="test4" class="col s12">
  	<div class="container">
  					<table id="scholar" class="display responsive no-wrap" width="100%">
		        <thead>
		            <tr>
		                <th>Name</th>
		                <th>Position</th>
		                <th>Office</th>
		                <th>Age</th>
		                <th>Start date</th>
		                <th>Salary</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>Name</th>
		                <th>Position</th>
		                <th>Office</th>
		                <th>Age</th>
		                <th>Start date</th>
		                <th>Salary</th>
		            </tr>
		        </tfoot>
		        <tbody>
		            <tr>
		                <td>Tiger Nixon</td>
		                <td>System Architect</td>
		                <td>Edinburgh</td>
		                <td>61</td>
		                <td>2011/04/25</td>
		                <td>$320,800</td>
		            </tr>
		            <tr>
		                <td>Garrett Winters</td>
		                <td>Accountant</td>
		                <td>Tokyo</td>
		                <td>63</td>
		                <td>2011/07/25</td>
		                <td>$170,750</td>
		            </tr>
		        </tbody>
    		</table>
  	</div>
  </div>
  <div id="test5" class="col s12">
  	<div class="container">
  		
  	  	<div class="page-header">
	  	    <div class="container">
	    		<h5>HEADER FOR BATCH ALUMNI ID NO.</h5>
	    	</div>
		</div>
		<!-- profile-page-wall-share -->
        <div id="profile-page-wall-share" class="row">
            <div class="col s11 offset-s1">
                <ul class="tabs tab-profile z-depth-1 light-blue">
                      <li class="tab"><a class="white-text waves-effect waves-light active" href="#AddBatch"><i class="material-icons" style="font-size:20px;">event_available</i>Add Batch Year</a>
                      </li>
                      <li class="tab"><a class="white-text waves-effect waves-light" href="#AddID"><i class="material-icons" style="font-size:20px;">add_box</i> Generate Alumni ID no.</a>
                      </li>                     
                </ul>
                                <!-- --------------------------AddBatch---------------------->
                <div id="AddBatch" class="tab-content col s12  grey lighten-4">
                    <div class="row">
                        <div class="col s1"><br>
                          <img src="assets/img/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
                        <div class="input-field col s12 m7">
				           <input id="add_year" type="text" class="validate">
				           <label for="add_year">Year</label>
                        </div>
	                    <div class="row">
	                        <div class="input-field col s12 m3 right-align">
								<button class="waves-effect waves-light btn" id="Add_year"><i class="material-icons">rate_review</i>Submit</button>
	  						</div>
	                    </div>
                    </div>	
            	</div> 
                                <!-- --------------------------AddAlumniID---------------------->
                <div id="AddID" class="tab-content col s12  grey lighten-4">
                    <div class="row">
                        <div class="col s1"><br>
                          <img src="assets/img/avatar.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
						<?php
							$sql_alumni = mysqli_query($con, "SELECT id_no_one, id_no_two, id_no_three FROM alumni ORDER BY alumni_id DESC LIMIT 1");

							$row_alumni = mysqli_fetch_assoc($sql_alumni);
						?>
                         <div class="input-field col s12 m3">
                            <input id="id_no_one" type="text" class="validate">
          					<label for="id_no_one"><?php echo $row_alumni['id_no_one']; ?></label>
                        </div>
                            <div class="input-field col s12 m3">
                            <input id="id_no_two" type="text" class="validate">
          					<label for="id_no_two"><?php echo $row_alumni['id_no_two']; ?></label>
                        </div>
                        <div class="input-field col s12 m3">
                            <input id="id_no_three" type="text" class="validate">
          					<label for="id_no_three"><?php echo $row_alumni['id_no_three']; ?></label>
                        </div>
                        <div class="row">
                         <div class="input-field col s12 m2 right-align">
							<button class="waves-effect waves-light btn" id="Add_Alumni_ID"><i class="material-icons">rate_review</i>Create</button>
                        </div>
                        </div>
                    </div>	
            	</div> 
  			</div>
  		</div>
  	</div>
  </div>
  <!-- --------------------------Activities---------------------->
<input type="hidden" id="activities_id" name="activities_id">
	<div id="test6" class="col s12">
  		<div class="container">
  		<h3>Decline by Vp</h3>
  			<table id="notification" class="display responsive no-wrap" width="100%">
		        <thead>
		            <tr>
		                <th>Activities</th>
		   				<th>Update</th>
		   				<th>Delete</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>Activities</th>
				   		<th>Update</th>
		   				<th>Delete</th>
		            </tr>
		        </tfoot>
		        <tbody>
			        <?php
			        $status= mysqli_query($con, "SELECT * FROM activities where status=2");
			        	while ($row_status = mysqli_fetch_assoc($status)) {
			        ?>
				            <tr>
				                <td><?php echo $row_status['details']; ?></td>
				                <td><a class="waves-effect waves-light btn btn-small update_activities" id="<?php echo $row_status['activities_id']; ?>" href="#update-activities"><i class="material-icons">rate_review</i></a></td>
				                <td><button type="button" class="waves-effect waves-light btn btn-small delete_activities" id="<?php echo $row_status['activities_id']; ?>" ><i class="material-icons">delete_forever</i></button></td>
				            </tr>
			        <?php
			        	}
			        ?>                      
		        </tbody>
    		</table>
  		</div>
    </div>
<!-- --------------------------Start Modal---------------------->
<div id="update-activities" class="modal info_modal">
   <div class="modal-footer">
 	 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat right"><i class="material-icons">clear</i></a>
  </div>
    <div class="modal-content">
      <h4 class="center">Alumni Information</h4>
      	<div class="center"></div>
      		<table border="1" class="bordered">
      			<tr>
      				<td>Activity</td>
      				<td><input type="text" id="activities_details"></td>
      			</tr>
      		</table>
    </div>
    <div class="modal-footer">
      <button class="waves-effect waves-light btn">Update</
      button>
    </div>
  </div>
  
    <!-- Modal Structure -->
  <div id="modal1" class="modal info_modal">
   <div class="modal-footer">
  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat right"><i class="material-icons">clear</i></a>
  </div>
    <div class="modal-content">
      <h4 class="center">Alumni Information</h4>
            <div class="center">
      		<img src="assets/img/avatar.jpg" alt="" style="border-radius: 500%;">
      </div>
      	<table border="1" class="bordered">
      		<tr>
      			<td>Fullname :</td>
      			<td><span id="Fullname"></span></td>					<!-- ----------FULLNAME OF ALUMNI -->
      			<td>Course :</td>
      			<td><span id="Course"></span></td>           			<!-- ----------COURSE -->
      		</tr>

      		<tr>
      			<td>Position :</td>
      			<td><span id="Rank"></span></td>                        <!-- ----------RANK OF ALUMNI ASSIGN BY DIRECTOR -->
      			<td>Select :</td>
      			<td>
	      			<div class="input-field col s15">
	      				<select>
	      				 	<option id="default_linked_to" disabled selected>Choose your option</option>
	      					<option>Leader</option>
	      					<option>Leader</option>
	      				</select>
	      				<label>Materialize Select</label>
	      			</div>
      			</td>
      		</tr>

      		<tr>
      			<td>Username :</td>
      			<td><span id="username"></span></td>
      			<td>Email :</td>
      			<td><span id="email"></span></td>
      		</tr>

      		<tr>
      			<td>Directory :</td>
      			<td><span id="directory"></span></td>
      			<td>Alumni ID No. :</td>
      			<td><span id="alumni_id_no"></span></td>
      		</tr>

      		<tr>
      			<td>Birthday :</td>
      			<td><span id="bday"></span></td>
      			<td>Age :</td>
      			<td><span id="age"></span></td>
      		</tr>

      		<tr>
      			<td>Gender :</td>
      			<td><span id="gender"></span></td>
      			<td>Scholarships :</td>
      			<td><span id="scholar"></span></td>
      		</tr>

      		<tr>
      			<td>Year Graduated :</td>
      			<td><span id="alumni_year_graduated"></span></td>
      			<td>Religion :</td>
      			<td><span id="Religion"></span>c</td>
      		</tr>   

      		<tr>
      			<td>Address :</td>
      			<td><span id="Address"></span></td>
      			<td>Contact Number :</td>
      			<td><span id="Phonenumber"></span></td>
      		</tr>  

      		<tr>
      			<td>Work :</td>
      			<td><span id="Position"></span></td>
      			<td>Company Name :</td>
      			<td><span id="CompanyName"></span></td>
      		</tr>

      		<tr>
      			<td>Company Address :</td>
      			<td><span id="CompanyAddress"></span></td>
      			<td>Date Hired :</td>
      			<td><span id="DateHired"></span></td>
      		</tr>

      	</table>
    </div>
    <div class="modal-footer">
      <button class="waves-effect waves-light btn">Update</button>
    </div>
  </div>
<?php include 'includes/footer.php'; ?>
<style type="text/css">
	.info_modal{
		width: 75%;
	}
</style>

<script type="text/javascript">
$(document).ready(function(){
		  var username = <?php echo json_encode($username); ?>;
		  var personnel_id = <?php echo json_encode($personnel_id); ?>;
 			sessionStorage.setItem('username', username);
 			sessionStorage.setItem('personnel_id', personnel_id);

});
</script>