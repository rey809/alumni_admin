$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered

    $('.modal').modal();


 });

$("#AnnouncementDetails").click(function(){
	var personnel_id = sessionStorage.getItem('personnel_id');
	var announcement_details = $("#announcement_detail").val();
	var college = $("#college_name_announcement").val();
	var batch_year = $("#batch_year_announcement").val();
	var submit_post;
	var dataString = 'announcement_details='+announcement_details+'&batch_year='+batch_year+"&college="+college+'&personnel_id='+personnel_id+"&submit_post="+submit_post;
	if (announcement_details==''||college==''||batch_year=='') {
		alert('Fill all fields');
	}else{	
	
	 	$.ajax
	    ({
			type: "POST",
			url: "admin-ajax.php",
			data: dataString,  
			success: function(result)
			{
				var result=$.parseJSON(result);
				$.each(result, function(i, field)
				{
				    if(field.message == "ok")
				    {
				       console.log("Successfully Posted");
				    }
				    else
				    {
				       alert('Unsuccessful delete profile !');  
				    }
				});
			}
		});
		}
	/*}*/
/*	 else if(batch_year==''&&college!=''){
	 	var submit_post_college;
var dataString = 'announcement_details='+announcement_details+'&college='+college+"&submit_post_college="+submit_post_college; 	
					$.ajax({
			        type: "POST",
			        url: "admin-ajax.php",
			        data: dataString,  
			            success: function(result){
			            	var result=$.parseJSON(result);
			                $.each(result, function(i, field){
			                  if(field.message == "ok"){
			                  	alert('Successfully okkk new Controls');
			                  	console.log(field.mgs);
			                   }
			            else{
			                alert('Field to Generate new Controls');  
			            }
			        });
			    }
			});
	}
	else if (college!=''&&batch_year!='') {
		alert('naay sulod and duha');
	}else{
		alert("walay sulod")
	} */
}); 



$("#Submit_Activities").click(function(){
	var personnel_id = sessionStorage.getItem('personnel_id');
	var activities_details = $("#activities_details").val();
	var college = $("#college_name_activities").val();
	var batch_year = $("#batch_year_activities").val();
	var submit_activities;
	var dataString = 'personnel_id='+personnel_id+'&activities_details='+activities_details+'&batch_year='+batch_year+"&college="+college+"&submit_activities="+submit_activities;

	if (activities_details==''||college==''||batch_year=='') {
		alert('Fill all fields');
	}else{	
	
	 	$.ajax
	    ({
			type: "POST",
			url: "admin-ajax.php",
			data: dataString,  
			success: function(result)
			{
				var result=$.parseJSON(result);
				$.each(result, function(i, field)
				{
				    if(field.message == "ok")	
				    {
				       console.log("Successfully Posted");
				    }
				    else
				    {
				       alert('Unsuccessful delete profile !');  
				    }
				});
			}
		});
	}
}); 


/*-------------------------------------Modal Button Para Madisplay Ang Alumni Information*/
$(".profileview").click(function()
{

	var select_profile;
	var temp = $(this).attr("id");
    $("#hidden_id").val(temp);
    var dataString = 'alumni_id='+temp+'&select_profile='+select_profile;
    
    $.ajax
    ({
		type: "POST",
		url: "admin-ajax.php",
		data: dataString,  
		success: function(result)
		{
			var result=$.parseJSON(result);
			$.each(result, function(i, field)
			{
			    if(field.message == "ok")
			    {
			        document.getElementById("Fullname").innerHTML = field.fullname;
			        document.getElementById("Course").innerHTML = field.course;
			        document.getElementById("Rank").innerHTML = field.rank;
			        document.getElementById("default_linked_to").innerHTML = field.rank;
			        document.getElementById("username").innerHTML = field.username;
			        document.getElementById("email").innerHTML = field.email;
			        document.getElementById("directory").innerHTML = field.directory_name;
			        document.getElementById("alumni_id_no").innerHTML = field.alumni_id_no;
			        document.getElementById("bday").innerHTML = field.bday;
			        document.getElementById("age").innerHTML = field.age;
			        document.getElementById("gender").innerHTML = field.gender;
			        document.getElementById("scholar").innerHTML = field.scholar;
			        document.getElementById("alumni_year_graduated").innerHTML = field.year;
			        document.getElementById("Religion").innerHTML = field.religion;
			        document.getElementById("Address").innerHTML = field.address;
			        document.getElementById("Phonenumber").innerHTML = field.contact_number;
			        document.getElementById("Position").innerHTML = field.work_position;
			        document.getElementById("CompanyName").innerHTML = field.company;
			        document.getElementById("CompanyAddress").innerHTML = field.company_address;
			        document.getElementById("DateHired").innerHTML = field.date_hired;	
			    }
			    else
			    {
			       alert('Field to Generate new Controls');  
			    }
			});
		}
	});
    
}); 

/*-------------------------------------END Modal Button Para Madisplay Ang Alumni Information*/

/*-------------------------------------DELETE ALUMNI AJAX*/

$(".delete_alumni_profile").click(function()
{
	var delete_alumni_profile;
	var temp = $(this).attr("id");
    $("#hidden_id").val(temp);
	
	var dataString = 'alumni_id='+temp+'&delete_alumni_profile='+delete_alumni_profile;
	if(confirm("Are you sure you want to Delete This Alumni Profile ?"))
	{
	 	$.ajax
	    ({
			type: "POST",
			url: "admin-ajax.php",
			data: dataString,  
			success: function(result)
			{
				var result=$.parseJSON(result);
				$.each(result, function(i, field)
				{
				    if(field.message == "ok")
				    {
				       alert("Successfully profile deleted !")
				    }
				    else
				    {
				       alert('Unsuccessful delete profile !');  
				    }
				});
			}
		});
	}
});

/*------------------------------------------ADD YEAR AJAX*/
$("#Add_year").click(function()
{
	var Add_year_Button;
    var year = $("#add_year").val();
	var dataString = 'year='+year+'&Add_year_Button='+Add_year_Button;
	
	if(year=='')
	{
		alert("Please fill out this field");
	}
	else
	{	
	 	$.ajax
	    ({
			type: "POST",
			url: "admin-ajax.php",
			data: dataString,  
			success: function(result)
			{
				var result=$.parseJSON(result);
				$.each(result, function(i, field)
				{
				    if(field.message == "ok")
				    {
				        alert('Batch year successfully added !');  
				    }
				    else
				    {
				       alert('Batch Already Exists');  
				    }
				});
			}
		});
	}	
});

/*------------------------------------------ADD ALUMNI ID NUMBER*/
$("#Add_Alumni_ID").click(function()
{
	var Add_Alumni_ID;
    var id_no_one = $("#id_no_one").val();
    var id_no_two = $("#id_no_two ").val();
    var id_no_three = $("#id_no_three").val();
	var dataString = 'id_no_one='+id_no_one+'&id_no_two='+id_no_two+'&id_no_three='+id_no_three+'&Add_Alumni_ID='+Add_Alumni_ID;
	
	if(id_no_one=='' || id_no_two=='' || id_no_three=='')
	{
		alert("Please fill out this field");
	}
	else
	{	
	 	$.ajax
	    ({
			type: "POST",
			url: "admin-ajax.php",
			data: dataString,  
			success: function(result)
			{
				var result=$.parseJSON(result);
				$.each(result, function(i, field)
				{
				    if(field.message == "ok")
				    {
				        alert('Alumni ID number successfully added !');
				    }
				    else
				    {
				       alert('Alumni ID number Already Exists');  
				    }
				});
			}
		});
	}	
});

$(".update_activities").click(function()
{

	var update;
	var temp = $(this).attr("id");
    $("#activities_id").val(temp);
    var dataString = 'personnel_id='+temp+'&update='+update;
 
 //    $.ajax
 //    ({
	// 	type: "POST",
	// 	url: "admin-ajax.php",
	// 	data: dataString,  
	// 	success: function(result)
	// 	{
	// 		var result=$.parseJSON(result);
	// 		$.each(result, function(i, field)
	// 		{
	// 		    if(field.message == "ok")
	// 		    {
	// 		        document.getElementById("Fullname").innerHTML = field.fullname;
	// 		   	
	// 		    }
	// 		    else
	// 		    {
	// 		       alert('Field to Generate new Controls');  
	// 		    }
	// 		});
	// 	}
	// });
    
}); 
