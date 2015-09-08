<?php
     include_once('config.php');
    
     $arr=array();
     $sub_id = "" ;
     if(isset($_POST['sub_id']))
     {
     	
     	$sub_id=$_POST['sub_id'];
   
     if( !empty($sub_id))
     {

     $sql="SELECT * FROM `tbl_chapters` where sub_id='".$sub_id."'";
   
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
		   $arr['code']='2';
     	   $arr['status']='No chapters available';
		}
		
	 }
     else{
     	   $arr['code']='0';
     	   $arr['status']='failed';
     }

     }
      echo json_encode($arr);
 ?>