<?php 
include_once('config.php');

$arr= array();

	$username = $_POST['username'];
	$mobile = $_POST['mobileNo'];
	$email = $_POST['emailId'];
	$address = $_POST['address'];
	$password = $_POST['password'];
    $image=$_POST['image'];


    $sql1="select `mobile` from `register` where `mobile`='".$mobile."'";
    $stmt1=$link->query($sql1);
    $row1=$stmt1->rowCount();
    if($row1 > 0)
    {
        $arr['code']='3';
        $arr['status']='Mobile No. exists'; 
     }   
     else
     {

    $sql="select `email` from `register` where `email`='".$email."'";
    $stmt=$link->query($sql);
    $row=$stmt->rowCount();
    if($row > 0)
    {
        $arr['code']='4';
        $arr['status']='Email exists';
    }
    else
    {

	$sql="INSERT INTO `register` values('','$username','$mobile','$address','$email','$password','$image','1',NOW())";
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
		$arr['status']='fail';
	}
  }
}
 $result=json_encode($arr);
 echo $result;

?>