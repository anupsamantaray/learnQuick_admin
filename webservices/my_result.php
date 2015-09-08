<?php 
    include_once('config.php');
    $arr=array();

        
           $user_id=$_POST['user_id']; 
           
          
            
            $sql="select `result`,`level`,`time_stamp`,`subject_name`,`chapter_name` from `result`,`tbl_subjects`,`tbl_chapters` where `user_id`='".$user_id."' AND `result`.`sub_id`=`tbl_subjects`.`sub_id` AND `result`.`chap_id`=`tbl_chapters`.`chap_id`";

            $stmt=$link->query($sql);
            $row=$stmt->rowCount();

            if($row > 0)
            {   
			    $arr['code']='1';
            	$arr['status']='success';
            	
				while($rs=$stmt->fetch(PDO::FETCH_ASSOC))
            	{
            	   $arr['list'][]=$rs;	
            	   
                  
                }
            	


            }
      

    	    else
    	    {

    	    	$arr['code']='0';
            	$arr['status']='No data found';
    	    }
           
 
           
		   echo json_encode($arr);
?>