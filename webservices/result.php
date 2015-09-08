<?php 
    include_once('config.php');
    $arr=array();

     

    if(isset($_POST['user_id']) && isset($_POST['level']) && isset($_POST['result']) && isset($_POST['chap_id'])  && isset($_POST['standard']) && isset($_POST['sub_id']))
    {
      
        $user_id = $_POST['user_id'];
        $level = $_POST['level'];
        $result = $_POST['result'];
        $chap_id = $_POST['chap_id'];
         $standard = $_POST['standard']; 
         $sub_id = $_POST['sub_id'];
               
          
        $sql="insert into `result` values('','$standard','$sub_id','$user_id','$chap_id','$level','$result',NOW())";

            
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
           
       echo json_encode($arr);
?>