<?php 
     
    include_once('config.php');

    $code = array();
    
  
	
	
 
      if(!empty($_POST['email']) && !empty($_POST['password']) )
      {
	  
	  $email = $_POST['email'];
      $password = $_POST['password'];
    
     
    
    $sql = "SELECT * FROM `register` where `email` = '".$email."' AND `password` = '".$password."'";
    $stmt = $link->query($sql);
 	
    $id=$stmt->fetch(PDO::FETCH_ASSOC);
    
    $row = $stmt->rowCount();
       if($row > 0)
    {
      
    
     $code['code'] = '11';
     $code['status'] = 'successfully loggedIn';
     $code['user_id'] = $id['user_id'];
    }
    else
    {
     
    $sqluser =  "SELECT * FROM `register` where `email` = '".$email."'";

    $stmt = $link->query($sqluser);

    $rows = $stmt->rowCount();
   
    if($rows == 0)
     
    {
      $code['code']='01';
      $code['status']='Incorrect Username';
    }
    else
    {
      $code['code']='02';
      $code['status']='Incorrect Password';
    }  
  }
 }
 else
    {
      $code['code']='03';
      $code['status']='Fild is empty';
    } 


   echo json_encode($code);

?>