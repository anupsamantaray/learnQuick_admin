<?php 
    include_once('config.php');
    $arr=array();

        
			$level=$_POST['level'];
			$standard=$_POST['standard'];
			$sub_id=$_POST['sub_id']; 
           
			$sql1 = "SELECT mode FROM `tbl_hof_mode` WHERE `id`=1";
			$stmt1=$link->query($sql1);
			$rs1=$stmt1->fetch(PDO::FETCH_ASSOC);
		
			$mode=$rs1['mode'];
			if($mode=='auto')
			{
           
               // echo "auto";
                
            $sql="select `username`,`image`,`result`.`time_stamp`,`result` from `register`,`result` where `register`.`user_id`=`result`.`user_id` AND `result`.`standard`='".$standard."' AND `result`.`sub_id`='".$sub_id."' order by `result`.`result` DESC limit 10";
			 
			}
			else if($mode=='manual')
			{
                 //echo "manual";
                
				$sql="select `username`,`image`,`tbl_result_temp`.`time_stamp`,`result` from `register`,`tbl_result_temp` where `register`.`user_id`=`tbl_result_temp`.`user_id` AND `tbl_result_temp`.`standard`='".$standard."' AND `tbl_result_temp`.`sub_id`='".$sub_id."' order by `tbl_result_temp`.`result` DESC limit 10";
			 // echo $sql;
			}
		
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