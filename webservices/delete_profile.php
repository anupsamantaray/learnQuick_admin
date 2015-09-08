<?php 
    include_once('config.php');
    $arr=array();

       

            if(!empty($_POST['user_id']))
            {
           $user_id=$_POST['user_id'];
          
            $sql="delete  from `register` where `user_id`='".$user_id."'";
    
            
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
        else {
                $arr['code']='2';
              $arr['status']='Field is empty.';
              }      

           
       echo json_encode($arr);
?>