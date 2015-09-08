<?php 
    include_once('config.php');
    $arr=array();

       
  

    if(!empty($_POST['user_id']) && !empty($_POST['username']) && !empty($_POST['mobile']) && !empty($_POST['email']) && !empty($_POST['address']))
	{		 
	   $user_id = $_POST['user_id'];
       $username = $_POST['username'];
	   $mobile =  $_POST['mobile'];
	   $email = $_POST['email'];
	   $address = $_POST['address'];
       $image=$_POST['image'];
          
          
        $sql1="select * from `register` where `user_id`='".$user_id."' AND `username`='".$username."' AND `mobile`='".$mobile."' AND `address`='".$address."' AND `email`='".$email."' AND `image`='".$image."' ";

          $stmt1=$link->query($sql1);
            $row1=$stmt1->rowCount();
            if($row1 > 0)
            {   
			    $arr['code']='3';
            	$arr['status']='Updated';
            }
              else
              {       



          if(!empty($image))
          {
            $sql="update `register` set `username`='".$username ."' ,`mobile`='".$mobile."',`address`='".$address."',`email`='".$email."', `image`='".$image."' where `user_id`='".$user_id."'";
		 }
		 else
		 {
		 	$sql="update `register` set `username`='".$username ."' ,`mobile`='".$mobile."',`address`='".$address."',`email`='".$email."' where `user_id`='".$user_id."'";
		 }
            
            $stmt=$link->query($sql);
            $row=$stmt->rowCount();
            if($row > 0)
            {   
			    $arr['code']='1';
            	$arr['status']='success';
            }
    	    else
    	    {
    	    	$arr['code']='0';
            	$arr['status']='Fail';
    	    }
        } 
       }
    
        else {
              	$arr['code']='2';
            	$arr['status']='Field is empty.';
              }      

           
		   echo json_encode($arr);
?>