<?php 
    include_once('config.php');
    $arr=array();

$user_id ="";

    if(isset($_POST['user_id']))
    {
    	if(!empty($_POST['user_id']))
		 {
		 
		$user_id = $_POST['user_id'];
      

          
            $sql="SELECT `username`,`mobile`,`email`,`address`,`image` FROM `register` where `user_id`='".$user_id."'";
            
            $stmt=$link->query($sql);
            $row=$stmt->rowCount();
            if($row > 0)
            {   
			    $arr['code']='1';
            	$arr['status']='success';
            	
				while($rs=$stmt->fetch(PDO::FETCH_ASSOC))
            	{
            	   $arr['list']=$rs;	
            	}
            	

            }
    	    else
    	    {
    	    	$arr['code']='0';
            	$arr['status']='no data available';
    	    }
        }
        else {
              	$arr['code']='2';
            	$arr['status']='Field is empty.';
              }      
 }
           
		   echo json_encode($arr);
?>