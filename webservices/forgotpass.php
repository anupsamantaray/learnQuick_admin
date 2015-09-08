<?php 
require_once('config.php');
require_once('emailer/class.phpmailer.php');
require_once('mailFunction.php');

$arr=array();
$email='';

$subject="Password Info";

if(isset($_POST['email']))
{
	$email=$_POST['email'];

$sql="SELECT * FROM `register` where `email`='".$email."'";
$stmt=$link->query($sql);
$row=$stmt->rowCount();
if($row > 0)
 {
 	while($rs=$stmt->fetch(PDO::FETCH_ASSOC))
 	{
 		$name=$rs['username'];
 		$password=$rs['password'];
 	}

 	$to=$email;
   $body='<p>Dear <b>'.$name.',</b><br><br>Your Password is:<b>'.$password.'</b></p>';    
   sendMail1($subject, $body, $to);
   

   $arr['code']='1';
   $arr['status']='Password has been sent to your EmailId';
   
   

}
else
{
	$arr['code']='0';
	$arr['status']='EmailId does not Exist.';
}

}
echo json_encode($arr);
 

?>