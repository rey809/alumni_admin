<?php

    /**
     * @param $database
     * @param $id_no_one
     * @param $id_no_two
     * @param $id_no_three
     * @return mixed
     * $alumni_id = getAlumniIdNumber($database, 'AC16', '1234', '5678');
       print_r($alumni_id);
     */
    function getAlumniIdNumber($database, $id_no_one, $id_no_two, $id_no_three)
    {
        //  start query to database via mysql crud
        $database->select('alumni', '*', null, "id_no_one =  '$id_no_one' and id_no_two = '$id_no_two' and id_no_three = '$id_no_three' ");

        // print_r($database->getResult());
        // get result after select query above
        return $database->getResult()[0]['alumni_id'];
    }

    function insertAlumniBatchYear($database, $year)
    {

       if(!isAlumniBatchYearExist($database,  $year)) 
       {
             return $database->insert('batch', array('year'=>$year));
        } else {
            return false;
        }
    }    

    /**
     * @param $database
     * @param $id_no_one
     * @param $id_no_two
     * @param $id_no_three
     * @return mixed
     * $alumni = getAlumni($database, 'AC16', '1234', '5678');
       print_r($alumni);
     */
    function getAlumni($database, $id_no_one, $id_no_two, $id_no_three)
    {
        //  start query to database via mysql crud
        $database->select('alumni', '*', null, "id_no_one =  '$id_no_one' and id_no_two = '$id_no_two' and id_no_three = '$id_no_three' ");

        // get result after select query above
        return $database->getResult();
    }



    /**
     * @param $database
     * @param null $username
     * @return bool
     *
     * ex:
     * $status = isUsernameExist($database, 'rrr1');
     *
     *   if($status == true) {
     *   print "user exist";
     *   } else {
     *   print "not exust";
     *   }
     */
    function isUsernameExist($database, $username=null)
    {
        $database->select('alumni', '*', null, " username = '$username'" );
        $res = $database->getResult();

        if(count($res) > 0) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param $database
     * @param null $email
     * @return bool
     *   $status = isEmailExist($database, 'rey.onekrsadas@gmail.com111');
     *   if($status == true) {
     *   print "mail exist";
     *   } else {
     *   print "not exust";
     *    }
     */
    function isEmailExist($database, $email=null)
    {
        $database->select('alumni', '*', null, " email = '$email'" );
        $res = $database->getResult();

        if(count($res) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $database
     * @param null $email
     * @return bool
     *   $status = isAlumniBatchYearExist($database, '2000');
     *   if($status == true) {
     *   print "mail exist";
     *   } else {
     *   print "not exust";
     *   }
     */
    function isAlumniBatchYearExist($database, $year){
        $database->select('batch', '*', null, " year = '$year'" );
        $res = $database->getResult();

        if(count($res) > 0) {
            return true;
        } else {
            return false;
        }        
    }

    /**
     * @param $database
     * @param null $email
     * @return bool
     *   $status = isIdNumberExist($database, 'AC12', '3456', '7890');
     *   if($status == true) {
     *   print "mail exist";
     *   } else {
     *   print "not exust";
     *   }
     */
    function isIdNumberExist($database, $id_no_one, $id_no_two, $id_no_three)
    {
        $database->select('alumni', '*', null, "id_no_one =  '$id_no_one' and id_no_two = '$id_no_two' and id_no_three = '$id_no_three' and username='' and email='' ");
        $res = $database->getResult();

        if(count($res) > 0) {
            return true;
        } else {
            return false;
        }

    }


    function insertAlumni($database, $alumni=array())
    {
        // many information
    }

    /**
     * @param $database
     * @param $id_no_one
     * @param $id_no_two
     * @param $id_no_three
     * @return bool
     * $status =  insertAlumniIdNumber($database, 'AC12', '3456', '78901');
     *   if($status == true) {
     *   print "idn inserted";
     *   } else {
     *   print "idn exist, not inserted";
     *   }
     */
    function insertAlumniIdNumber($database, $id_no_one, $id_no_two, $id_no_three)
    {
        if(!isIdNumberExist($database,  $id_no_one, $id_no_two, $id_no_three)) {
            return $database->insert('alumni', array('id_no_one'=>$id_no_one,'id_no_two'=>$id_no_two,'id_no_three'=>$id_no_three));
        } else {
            return false;
        }
    }

    /**
     * @param $database
     * @param array $alumniInfoParam
     * @param $id_no_one
     * @param $id_no_two
     * @param $id_no_three
     * @return mixed
     * $status = updateAlumniInformation($database, array('username'=>'rey', 'password'=>md5('password')), 'AC12', '3456', '7890');
     * if($status == true) {
     * print "update successfully";
     * } else {
     * print "failed to update";
     * }
     */
    function updateAlumniInformation($database, $alumniInfoParam=array(), $id_no_one, $id_no_two, $id_no_three)
    {

        // update alumni information
        $database->update(
            'alumni',
            $alumniInfoParam,
            " id_no_one = '$id_no_one' and id_no_two = '$id_no_two' and id_no_three = '$id_no_three'"
        );


       return $database->getResult();

        // insert alumni batch


        // insert alumni college

    }

    /**
     * @param $database
     * @param array $alumniBatchParam
     * @return mixed
     * $status = insertAlumniCollege($database, array('alumni_id'=>getAlumniIdNumber($database, 'AC16', '1234', '5678'), 'batch_id'=>getBatchIdByYear($database, 2000)));
        print_r($status);
        if($status == true) {
        print "update successfully";
        } else {
        print "failed to update";
        }
     */
    function insertAlumniBatch($database, $alumniBatchParam=array())
    {
        
        $database->insert('alumni_batch',$alumniBatchParam);

        return $database->getResult();

    }

    /**
     * @param $database
     * @param array $alumniCollegeParam
     * @return mixed
     *
     *  $status = insertAlumniCollege($database, array('alumni_id'=>getAlumniIdNumber($database, 'AC16', '1234', '5678'), 'directory_id'=>getDirectoryIdByYear($database, 'CBA')));
        print_r($status);
        if($status == true) {
        print "update successfully";
        } else {
        print "failed to update";
        }
     */
    function insertAlumniCollege($database, $alumniCollegeParam=array())
    {
        $database->insert('alumni_directory',$alumniCollegeParam);

        return $database->getResult();
    }

/**
 * @param $database
 * @param $year
 * @return mixed
 * $status = getBatchIdByYear($database, '4765');
 * print_r($status);
 */
    function getBacthIdByYear($database, $year)
    {
        $database->select('batch', '*', null, "year = '$year'");


        return $database->getResult()[0]['batch_id'];
    }

/**
 * @param $database
 * @param $name
 * @return mixed
 * $status = getDirectoryIdByYear($database, 'CBA');
   print_r($status);
 */
    function getDirectoryIdByYear($database, $name)
    {
        $database->select('directory', '*', null, "name = '$name'");
        $response = $database->getResult(); 
        // print_r( $response); 


        if(count($response)  > 0) {
            // print "not empty";
            return $response[0]['directory_id'];    
        } else {
            // print "empty";
            return false;
        }
        
    }

    /**
     * @param $database
     * @param $id_no_one
     * @param $id_no_two
     * @param $id_no_three
     * @return bool
     * $officer = isAlumniOfficer($database, 'AC16', '1234', '5678');
        if($officer == true) {
        print "officer";
        } else {
        print "not iffucer";
        }
     */
    function isAlumniOfficer($database, $id_no_one, $id_no_two, $id_no_three)
    {
        $alumni = getAlumni($database, $id_no_one, $id_no_two, $id_no_three);

        if($alumni[0]['rank'] == 'Officer') {
            return true;
        } else {
            return false;
        }
    }

    function postComment()
    {
        //
    }

    /**
     * @param $database
     * @param array $announcementInfo
     * @return mixed
     * $status = postAnnouncement($database, array('personnel_id'=>1, 'alumni_id'=>0, 'batch_id'=>1, 'college_id'=>1, 'details'=>'This is alright post.'));
        if($status == true) {
        print "announcement posted";
        } else {
        print "announcement not posted";
        }

     */
    function insertAnnouncement($database, $announcementInfo=array())
    {
        $database->insert('announcementInfo', $announcementInfo);

        return $database->getResult();

 
    }

    /**
     * @param $database
     * @param array $announcementInfo
     * @return mixed
     * $status = postActivities($database, array('personnel_id'=>1, 'alumni_id'=>0, 'batch_id'=>1, 'college_id'=>1, 'details'=>'This is alright post.'));
        if($status == true) {
        print "activities posted";
        } else {
        print "activities not posted";
        }

     */
    function insertActivities($database, $activitiesInfo=array())
    {
        $database->insert('activities', $activitiesInfo);

        return $database->getResult();
 
    }

    /**
     * @param $database
     * @param $email
     * @return mixed
     * $personel_id = getPersonnelIdByEmail($database, 'test@gmail.com');
        print $personel_id;
     */
    function getPersonnelIdByEmail($database, $email)
    {
        //  start query to database via mysql crud
        $database->select('personnel', '*', null, " email ='$email' ");

        // get result after select query above
        return $database->getResult()[0]['personnel_id'];
    }

    function getAlumniInformation($database, $alumni_id){

        $database->select('alumni', '*', null, " alumni_id ='$alumni_id ' ");

        return $database->getResult();
    }

    function getAlumniBatchId($database, $alumni_id){
        $database->select('alumni_batch', '*', null, " alumni_id ='$alumni_id ' ");

        return $database->getResult();       
    }

    function getAlumniBatchYear($database, $batch_id){
        $database->select('batch', '*', null, " batch_id ='$batch_id ' ");

        return $database->getResult();       
    }

    function getAlumniDirectoryId($database, $alumni_id){
        $database->select('alumni_directory', '*', null, " alumni_id ='$alumni_id ' ");
            
        return $database->getResult();       
    }

    function getAlumniDirectoryName($database, $directory_id){

        $database->select('directory', '*', null, " directory_id ='$directory_id ' ");
            
        return $database->getResult();       
    }

    function deteteAlumniinfo($database, $alumni_id){
        
        $database->delete('alumni', "alumni_id = '$alumni_id' ");
         return $database->getResult();  
    }

    function insertImage($database, $imageInfo=array())
    {
        $database->insert('alumni_gallery', $imageInfo);

        return $database->getResult();

 
    }

    // function getAllAnnouncementDetails($database){

    //     $database->select('announcement', '*', null");
            
    //     return $database->getResult();       
    // }
