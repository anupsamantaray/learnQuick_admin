<?php 
    include_once('config.php');
    $arr=array();
           
			$sql="SELECT `tbl_result_temp`.`user_id`,`standard`,`result`,`username`,`image` FROM `tbl_result_temp` ,  `register` 
WHERE  `tbl_result_temp`.`user_id` = `register`.`user_id` 
ORDER BY `result` desc 
LIMIT 3";
		
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
            	$arr['status']='Fail';
    	    }
           
		   echo json_encode($arr);
?>