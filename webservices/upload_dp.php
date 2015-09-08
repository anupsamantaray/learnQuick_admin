<?php
include_once('config.php');
$arr= array();

if(isset($_FILES['image']))
{
    
    $file_name = $_FILES['image']['name'];
 
    $file_tmp =$_FILES['image']['tmp_name'];
   
        if( move_uploaded_file($file_tmp,"images/".$file_name))
       {
           $arr['code']='1';
           $arr['status']='Success';
    }
    else
    {
        $arr['code']='0';
        $arr['status']='Fail';
    }
}
else
{
        $arr['code']='2';
        $arr['status']='Select image';  
}
echo json_encode( $arr);

?>