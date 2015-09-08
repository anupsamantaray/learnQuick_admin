<?php 
    include_once('config.php');
    $arr=array();


   
    	
      

          
            $sql="SELECT * FROM `tbl_subjects` where 1";
            
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
            	$arr['status']='no data available';
    	    }
           
 
           
		   echo json_encode($arr);
?>