<?php 
    include_once('config.php');
    $arr=array();
 

    $chap_id=$type="";

    if(isset($_POST['chap_id']) && isset($_POST['type']))
    {
    	$chap_id = $_POST['chap_id'];
    	$type = $_POST['type'];
    }
    
    if(!empty($chap_id) && !empty($type)) {

            if($type == 'video'){ 
    		$sql="SELECT `video_name` FROM `tbl_video` where `chap_id` = '".$chap_id."'";
            }elseif($type == 'image') {
            	$sql="SELECT `image_name` FROM `tbl_image` where `chap_id`= '".$chap_id."'";
            }elseif($type == 'docs') {
            	$sql="SELECT `doc_name` FROM `tbl_docs` where `chap_id` = '".$chap_id."'";
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
            	$arr['status']='no data available';
    	    }
        }
        else {
              	$arr['code']='2';
            	$arr['status']='Request is empty.';
              }      

              echo json_encode($arr);

           
?>