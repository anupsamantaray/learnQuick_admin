<?php
require_once 'config.php';
class Admin
{
	function __construct() 
	{
	}
	
	 
	
	public function chkValidAdmin($admin_id)
	{
		global $link;
		$return = false;
			
		$sql = "SELECT * FROM `tbladmin` WHERE `admin_id` = '".$admin_id."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;	
		}
		return $return;
	}
	
	public function isAdminLoggedIn()
	{
		global $link;
		$return = false;
		if( isset($_SESSION['admin_id']) && ($_SESSION['admin_id'] > 0) && ($_SESSION['admin_id'] != '') )
		{
			$admin_id = $_SESSION['admin_id'];
			if($this->chkValidAdmin($admin_id))
			{
				$return = true;	
			}	
		}
		return $return;
	}
	
	public function chkValidAdminLogin($username,$password)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tbladmin` WHERE `username` = '".$username."' AND `password` = '".$password."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{   
			$return = true;
		}
		return $return;
	}
	
	public function chkValidAdminCurrentPassword($password,$admin_id)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tbladmin` WHERE `admin_id` = '".$admin_id."' AND `password` = '".$password."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	function doAdminLogin($username)
	{
		global $link;
		$return = false;
		
		$admin_id = $this->getAdminId($username);
		$fname = $this->getAdminFirstName($username);
		$lname = $this->getAdminLastName($username);
		$email = $this->getAdminEmail($username);
		 
		
		if($admin_id > 0)
		{
			$return = true;	
			$_SESSION['admin_id'] = $admin_id;
			$_SESSION['admin_username'] = $username; 
			$_SESSION['admin_fname'] = $fname;
			$_SESSION['admin_lname'] = $lname;
			$_SESSION['admin_email'] = $email;
		}	
		return $return;
	}

	
	function doAdminLogout()
	{
		global $link;
		$return = true;	
		
		$_SESSION['admin_id'] = '';
		$_SESSION['admin_username'] = '';
		$_SESSION['admin_fname'] = '';
		$_SESSION['admin_lname'] = '';
		$_SESSION['admin_email'] = '';
		unset($_SESSION['admin_id']);
		unset($_SESSION['admin_username']);
		unset($_SESSION['admin_fname']);
		unset($_SESSION['admin_lname']);
		unset($_SESSION['admin_email']);
		 
		session_destroy();
		session_start();
		session_regenerate_id();
		$new_sessionid = session_id();
		
		return $return;
	}
	
	public function getAdminId($username)
	{
		global $link;
		$admin_id = 0;
		
		$sql = "SELECT * FROM `tbladmin` WHERE `username` = '".$username."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$admin_id = $row['admin_id'];
		}
		return $admin_id;
	}
	
	public function getAdminFirstName($username)
	{
		global $link;
		$fname = '';
		
		$sql = "SELECT * FROM `tbladmin` WHERE `username` = '".$username."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$fname = stripslashes($row['fname']);
		}
		return $fname;
	}
	
   
	public function getAdminLastName($username)
	{
		global $link;
		$lname = '';
		
		$sql = "SELECT * FROM `tbladmin` WHERE `username` = '".$username."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$lname = stripslashes($row['lname']);
		}
		return $lname;
	}
	
	public function getAdminEmail($username)
	{
		global $link;
		$email = '';
		
		$sql = "SELECT * FROM `tbladmin` WHERE `username` = '".$username."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$email = stripslashes($row['email']);
		}
		return $email;
	}
	
	public function getAdminEmailById($admin_id)
	{
		global $link;
		$email = '';
		
		$sql = "SELECT * FROM `tbladmin` WHERE `admin_id` = '".$admin_id."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$email = stripslashes($row['email']);
		}
		return $email;
	}
	
	public function getAdminUsername($admin_id)
	{
		global $link;
		$username = '';
		
		$sql = "SELECT * FROM `tbladmin` WHERE `admin_id` = '".$admin_id."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$username = stripslashes($row['username']);
		}
		return $username;
	}
	
	public function getAdminFullNameById($admin_id)
	{
		global $link;
		$name = '';
		
		$sql = "SELECT * FROM `tbladmin` WHERE `admin_id` = '".$admin_id."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$fname = stripslashes($row['fname']);
			$lname = stripslashes($row['lname']);
			$name = $fname.' '.$lname;
		}
		return $name;
	}
	
	 
	
	public function getAdminUserDetails($admin_id)
	{
		global $link;
		
		$return = false;
		$username = '';
		$email = '';
		$fname = '';
		$lname = '';
		$dob = '';
		$country = '';
		$state = '';
		$city = '';
		$contact_no = '';
		$address = '';
		$status = 0;
		$admin_group_id = 0;
		
		$sql = "SELECT * FROM `tbladmin` WHERE `admin_id` = '".$admin_id."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$return = true;
			$username = stripslashes($row['username']);
			$email = $row['email'];
			$fname = stripslashes($row['fname']);
			$lname = stripslashes($row['lname']);
			$dob = $row['dob'];
			$country = stripslashes($row['country']);
			$state = stripslashes($row['state']);
			$city = stripslashes($row['city']);
			$contact_no = $row['contact_no'];
			$address = stripslashes($row['address']);
			$status = $row['status'];
			$admin_group_id = $row['admin_group_id'];
		}	
		return array($return,$username,$email,$fname,$lname,$dob,$country,$state,$city,$contact_no,$address,$status,$admin_group_id);
	}
	
	public function updateAdminUser($admin_id,$username,$email,$fname,$lname,$dob,$gender,$address,$contact_no)
	{
		global $link;
		$return = false;
		
		$sql = "UPDATE `tbladmin` set `username` = '".addslashes($username)."' , `email` = '".$email."' , `fname` = '".addslashes($fname)."' , `lname` = '".addslashes($lname)."', `dob` = '".$dob."', `gender` = '".$gender."', `address` = '".addslashes($address)."',  `contact_no` ='".$contact_no."'  WHERE `admin_id` = '".$admin_id."'";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;	
			$_SESSION['admin_username'] = $username;
			$_SESSION['admin_fname'] = stripslashes($fname);
			$_SESSION['admin_lname'] = stripslashes($lname);
			$_SESSION['admin_email'] = $email;
		}
		return $return;
	}

    public function updateCommitte($id,$filename,$name,$designation,$email,$mobile,$address)
    {
    	global $link;
    	$return = false;

    	$sql = "UPDATE `committee` set `filename` = '".addslashes($filename)."' , `name` = '".addslashes($name)."' , `designation` = '".$designation."' , `address` = '".addslashes($address)."',  `contact` ='".$mobile."', `email`= '".addslashes($email)."' WHERE `id` = '".$id."'";
    	$result = mysql_query($sql,$link);
    	if($result)
    	{
    		$return = true;
    	}
    	return $return;
    }

     public function updateHelplin($user_id,$helperdesg,$mobile,$alt_mobile)
    {
    	global $link;
    	$return = false;

    	$sql = "UPDATE `helpline` set `help_name` = '".addslashes($helperdesg)."' , `help_contact` = '".addslashes($mobile)."', `help_alt_contact`= '".addslashes($alt_mobile)."' WHERE `help_id` = '".$user_id."'";
    	$result = mysql_query($sql,$link);
    	if($result)
    	{
    		$return = true;
    	}
    	return $return;
    }
   


	
	public function updateAdminPassword($admin_id,$password)
	{
		global $link;
		$return = false;
		
		$sql = "UPDATE `tbladmin` set `password` = '".$password."' WHERE `admin_id` = '".$admin_id."'";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;	
			
		}
		return $return;
	}
	
	public function chkAdminUsernameExists_edit($username,$admin_id)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tbladmin` WHERE `username` = '".$username."' AND `admin_id` != '".$admin_id."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	public function chkAdminEmailExists_edit($email,$admin_id)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tbladmin` WHERE `email` = '".$email."' AND `admin_id` != '".$admin_id."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	public function checkChapterName($chapter,$selected_Sub_id)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tbl_chapters` WHERE `sub_id` = '".$selected_Sub_id."' AND `chapter_name` = '".$chapter."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}

	public function getMode()
	{
		global $link;
		$return = false;
		
		$sql = "SELECT mode FROM `tbl_hof_mode` WHERE `id`=1";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
		}
		return $row['mode'];
	}
	 
	 
	public function getQuestionById($id=null)
	{
		global $link;
		$return = false;
		
		$sql ="SELECT * FROM `questions` where `q_id`=$id";
		
		$result = mysql_query($sql,$link);
		
		
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
		}
		return $row;
	}
	
	public function getSubjectById($id=null)
	{
		global $link;
		$return = false;
		
		$sql ="SELECT * FROM `tbl_subjects` where `sub_id`=$id";
		
		$result = mysql_query($sql,$link);
		
		
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
		}
		return $row;
	}
	
	public function getChapterById($id=null)
	{
		global $link;
		$return = false;
		
		$sql ="SELECT * FROM `tbl_chapters` where `chap_id`=$id";
		
		$result = mysql_query($sql,$link);
		
		
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
		}
		return $row;
	}
	
	public function updateQuestion($sql=null)
	{
		global $link;
		$return = false;
		
		$result = mysql_query($sql);
		if($result)
		{
			$return = true;	
			
		}
		return $return;
	}
	
	public function updateSubject($sql=null)
	{
		global $link;
		$return = false;
		
		$result = mysql_query($sql);
		if($result)
		{
			$return = true;	
			
		}
		return $return;
	}
	
	
	public function getAllUsers()
	{
		global $link;
		$arr_records = array();
		$sql = " SELECT * FROM `register` where 1 ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$arr_records[] = $row;

			}	
		}
				
		return $arr_records;
	}


	 

	public function getAllOrderLIst($link,$search='')
	{
		global $link;
		$arr_records = array();
		
		$sql = "SELECT register.name as name,order.order_id as orderid,order.name as ordername, order.add1 as add1, order.add2 as add2, order.landmark as landmark, order.pin as pin, order.mobile as mobile, order.city as city,order.image_name FROM `register` JOIN `order` ON register.user_id = order.user_id";
		if($search != '')
		{
           $sql .= " WHERE register.name LIKE '%".$search."%' ";     
		}
		$sql .= "ORDER BY order.order_id DESC";

		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$arr_records[] = $row;
			}	
		}
				
		return $arr_records;
	}


	public function getAllOrderLIstt()
	{
		global $link;
		$arr_records = array();
		
		$sql = "SELECT register.name as name ,order.name as ordername,order.order_id as orderid, order.add1 as add1, order.add2 as add2, order.landmark as landmark, order.pin as pin, order.mobile as mobile, order.city as city,order.image_name, order.status as status FROM `register` JOIN `order` ON register.user_id = order.user_id ORDER BY order.order_id DESC";
		 
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$arr_records[] = $row;
			}	
		}
				
		return $arr_records;
	}


        
       public function getnamebyid($id)
        {
          global $link;
		$arr_records = array();
		
		 $sql = "SELECT * FROM `registration_details` WHERE `id`= '".$id."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_assoc($result);
                        
			 $name=$row['name'];	
		}
				
		return $name;  
        }


        public function getAllContents()
	{
		global $link;
		$arr_records = array();
		
		$sql = "SELECT * FROM `chat_room` WHERE  1 ORDER BY `id` DESC ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$arr_records[] = $row;
			}	
		}
				
		return $arr_records;
	}
	
	public function deleteUser($user_id)
	{
		global $link;
		$return = false;
		
		$sql = "UPDATE `tblusers` set `deleted` = '1' WHERE `user_id` = '".$user_id."'";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;	
			
		}
		return $return;
	}
	
	
	public function getAllOrders()
	{
		global $link;
		$arr_records = array();
		
		$sql = "SELECT * FROM `tblorders` ORDER BY `order_date` DESC";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$arr_records[] = $row;
			}	
		}
				
		return $arr_records;
	}

	public function getAllStandard()
	{
		global $link;
		$arr=array();

		$sql="SELECT * from `tbl_standard` where 1";
		$stmt=mysql_query($sql,$link);
        if( ($stmt) && (mysql_num_rows($stmt) > 0) )
		{
			while($row = mysql_fetch_array($stmt))
			{
				$arr[] = $row;
			}	
		}
		return $arr;

	}
	

	 
	     
}

?>