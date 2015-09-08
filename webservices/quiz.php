<?php 
    include_once('config.php');
    $arr=array();

    

    if(isset($_POST['chap_id']) && isset($_POST['level']))
    {
      $chap_id = $_POST['chap_id'];
       $level = $_POST['level'];

               
        $sql="select * from `questions` where `chap_id`='".$chap_id."' AND `level`='".$level."'";

            
            $stmt=$link->query($sql);
            $row=$stmt->rowCount();
            if($row > 0)
            {   
               $arr['code']='1';
               $arr['status']='success';
			    
			    while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) 
               {
                  $arr['list'][]=$rs;
               }

               }
    	    else
    	    {
    	    	$arr['code']='0';
            	$arr['status']='Data not available';
    	    }
     }
           

           
		   echo json_encode($arr);
?>