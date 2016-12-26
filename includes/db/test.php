<?php
    require('database_functions.php');
    require('Database.php');
    $database = new Database();
    $database->connect();



//$response = getAlumniIdNumber($database, 'AC13-1234-5678');
//print "<pre>";
//print_r($response);
//print " id number " . $response[0]['alumni_id'];




//$status = isIdNumberExist($database, 'AC12', '3456', '7890');

//$status =  insertAlumniIdNumber($database, 'AC12', '3456', '78901');
//$status = updateAlumniInformation($database, array('username'=>'rey', 'password'=>md5('password')), 'AC12', '3456', '7890');


//$status = insertAlumniCollege($database, array('alumni_id'=>1, 'directory_id'=>2));
//insertAlumniCollege($database, $alumniCollegeParam=array())
//$status = getBatchIdByYear($database, '4765');
//$status = getDirectoryIdByYear($database, 'CBA');
//$alumni = getAlumniIdNumber($database, 'AC16', '1234', '5678');
//$alumni = getAlumni($database, 'AC16', '1234', '5678');
//$officer = isAlumniOfficer($database, 'AC16', '1234', '5678');

//$status = postAnnouncement($database, array('personnel_id'=>1, 'alumni_id'=>0, 'batch_id'=>1, 'college_id'=>1, 'details'=>'This is alright post.'));
$personel_id = getPersonnelIdByEmail($database, 'test@gmail.com');
print $personel_id;
exit;
if($status == true) {
    print "announcement posted";
} else {
    print "announcement not posted";
}



//print_r($status);
//if($status == true) {
//    print "update successfully";
//} else {
//    print "failed to update";
//}