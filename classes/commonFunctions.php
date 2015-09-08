<?php
require_once 'config.php';
class commonFunctions
{
	function __construct() 
	{
	}
	
	public function debuglog($stringData)
	{
		$logFile = "debuglog_commonfunctions_".date("Y-m-d").".txt";
		$fh = fopen($logFile, 'a');
		fwrite($fh, "\n\n----------------------------------------------------\nDEBUG_START - time: ".date("Y-m-d H:i:s")."\n".$stringData."\nDEBUG_END - time: ".date("Y-m-d H:i:s")."\n----------------------------------------------------\n\n");
		fclose($fh);	
    }
	
	public function getMonthOptions($month,$start_month='1',$end_month='12')
	{
		$arr_month = array (
			1 => 'January',
			2 => 'February',
			3 => 'March',
			4 => 'April',
			5 => 'May',
			6 => 'June',
			7 => 'July',
			8 => 'August',
			9 => 'September',
			10 => 'October',
			11 => 'November',
			12 => 'December'
		);
	
		$option_str = '';
		foreach($arr_month as $k => $v )
		{
			if( ($k >= $start_month) && ($k <= $end_month) )
			{
				if($k == $month)
				{
					$selected = ' selected ';
				}
				else
				{
					$selected = '';
				}
				$option_str .= '<option value="'.$k.'" '.$selected.' >'.$v.'</option>';
			}	
		}	
		return $option_str;
	}
	
	public function chkEmailExists($email)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tblusers` WHERE `email` = '".$email."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	public function chkEmailExists_Edit($email,$user_id)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tblusers` WHERE `email` = '".$email."' AND `user_id` != '".$user_id."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	public function doSignup($first_name,$last_name,$email,$password,$gender,$phone,$address,$address2,$city,$pincode,$status)
	{
		global $link;
		$return = false;
		
		$sql = "INSERT INTO `tblusers` (`email`,`password`,`first_name`,`last_name`,`phone`,`gender`,`address`,`address2`,`city`,`pincode`,`status`) VALUES('".addslashes($email)."','".md5($password)."','".addslashes($first_name)."','".addslashes($last_name)."','".addslashes($phone)."','".addslashes($gender)."','".addslashes($address)."','".addslashes($address2)."','".addslashes($city)."','".addslashes($pincode)."','".addslashes($status)."')";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;	
		}
		return $return;
	}
	
	public function doSignupFB($first_name,$last_name,$email,$password,$gender,$phone,$address,$address2,$city,$pincode,$status,$oauth_provider)
	{
		global $link;
		$return = false;
		
		$sql = "INSERT INTO `tblusers` (`email`,`password`,`first_name`,`last_name`,`phone`,`gender`,`address`,`address2`,`city`,`pincode`,`status`,`oauth_provider`) VALUES('".addslashes($email)."','".md5($password)."','".addslashes($first_name)."','".addslashes($last_name)."','".addslashes($phone)."','".addslashes($gender)."','".addslashes($address)."','".addslashes($address2)."','".addslashes($city)."','".addslashes($pincode)."','".addslashes($status)."','".addslashes($oauth_provider)."')";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;	
		}
		return $return;
	}
	
	public function getUserDetails($user_id)
	{
		global $link;
		$arr_record = array();
				
		$sql = "SELECT * FROM `tblusers` WHERE `user_id` = '".$user_id."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$arr_record = $row;
		}
		return $arr_record;
	}
	
	public function updateUser($user_id,$first_name,$last_name,$gender,$address,$address2,$city,$pincode,$phone)
	{
		global $link;
		$return = false;
		
		$sql = "UPDATE `tblusers` set `first_name` = '".addslashes($first_name)."' , `last_name` = '".addslashes($last_name)."' , `phone` = '".addslashes($phone)."', `gender` = '".addslashes($gender)."', `address` = '".addslashes($address)."', `address2` = '".addslashes($address2)."', `city` = '".addslashes($city)."', `pincode` = '".addslashes($pincode)."' WHERE `user_id` = '".$user_id."'";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;	
		}
		return $return;
	}
	
	public function updateUserByAdmin($user_id,$first_name,$last_name,$email,$phone,$gender,$address,$address2,$city,$pincode,$status)
	{
		global $link;
		$return = false;
		
		$sql = "UPDATE `tblusers` set `first_name` = '".addslashes($first_name)."' , `last_name` = '".addslashes($last_name)."', `email` = '".addslashes($email)."',  `phone` = '".addslashes($phone)."', `gender` = '".addslashes($gender)."', `address` = '".addslashes($address)."', `address2` = '".addslashes($address2)."', `city` = '".addslashes($city)."', `pincode` = '".addslashes($pincode)."', `status` = '".addslashes($status)."' WHERE `user_id` = '".$user_id."'";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;	
		}
		return $return;
	}
	
	public function resetUserPassword($user_id,$password)
	{
		global $link;
		$return = false;
		
		$sql = "UPDATE `tblusers` set `password` = '".md5($password)."' WHERE `user_id` = '".$user_id."'";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;	
		}
		return $return;
	}
	
	public function doValiadteUser($email)
	{
		global $link;
		$return = false;
		
		$sql = "UPDATE `tblusers` SET `status` = '1' WHERE `email` = '".$email."'";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;	
		}
		return $return;
	}
	
	public function chkValidUserLogin($email,$password)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tblusers` WHERE `email` = '".$email."' AND `password` = '".md5($password)."' AND `status` = '1' AND `deleted` = '0' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	public function chkValidEmail($email)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tblusers` WHERE `email` = '".$email."' AND `deleted` = '0' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	function doUserLogin($email)
	{
		global $link;
		$return = false;
		
		$user_id = $this->getUserId($email);
		
		if($user_id > 0)
		{
			$return = true;	
			$_SESSION['user_id'] = $user_id;
			$_SESSION['username'] = $email; 
			$_SESSION['user_email'] = $email;
		}	
		return $return;
	}
	
	function doUserLogout()
	{
		global $link;
		$return = true;	
		
		$_SESSION['user_id'] = '';
		$_SESSION['username'] = '';
		$_SESSION['user_email'] = '';
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		unset($_SESSION['user_email']);
		session_destroy();
		session_start();
		session_regenerate_id();
		$new_sessionid = session_id();
		
		return $return;
	}
	
	public function getUserId($email)
	{
		global $link;
		$user_id = 0;
		
		$sql = "SELECT * FROM `tblusers` WHERE `email` = '".$email."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$user_id = $row['user_id'];
		}
		return $user_id;
	}
	
	public function getUserFullName($email)
	{
		global $link;
		$name = '';
		
		$sql = "SELECT * FROM `tblusers` WHERE `email` = '".$email."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$first_name = stripslashes($row['first_name']);
			$last_name = stripslashes($row['last_name']);
			$name = $first_name.' '.$last_name;
		}
		return $name;
	}
	
	public function getUserFirstName($user_id)
	{
		global $link;
		$first_name = '';
		
		$sql = "SELECT * FROM `tblusers` WHERE `user_id` = '".$user_id."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$first_name = stripslashes($row['first_name']);
		}
		return $first_name;
	}
	
	public function isUserLoggedIn()
	{
		global $link;
		$return = false;
		if( isset($_SESSION['user_id']) && ($_SESSION['user_id'] > 0) && ($_SESSION['user_id'] != '') )
		{
			$return = $this->chkValidUserId($_SESSION['user_id']);	
		}
		return $return;
	}
	
	public function chkValidUserId($user_id)
	{
		global $link;
		$return = false;
			
		$sql = "SELECT * FROM `tblusers` WHERE `user_id` = '".$user_id."' AND `status` = '1'  AND `deleted` = '0' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;	
		}
		return $return;
	}
	
	public function getPageDetails($page_id)
	{
		global $link;
		$arr_record = array();
				
		$sql = "SELECT * FROM `tblpages` WHERE `page_id` = '".$page_id."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$arr_record = $row;
		}
		return $arr_record;
	}
	
	public function getCategoryName($cat_id)
	{
		global $link;
		$category = '';
				
		$sql = "SELECT * FROM `tblcategories` WHERE `cat_id` = '".$cat_id."' AND `cat_deleted` = '0'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$category = stripslashes($row['category']);
		}
		
		return $category;
	}
	
	public function getTopCategoryId($cat_id)
	{
		global $link;
		$top_cat_id = '';
				
		$sql = "SELECT * FROM `tblcategories` WHERE `cat_id` = '".$cat_id."' AND `cat_deleted` = '0'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$top_cat_id = stripslashes($row['parent_cat_id']);
		}
		
		return $top_cat_id;
	}
	
	public function getParentCategoryOption($cat_id,$parent_cat_id)
	{
		global $link;
		$option_str = '';
		
		$sql = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '".$parent_cat_id."' AND `cat_deleted` = '0'  AND `cat_status` = '1'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				if($row['cat_id'] == $cat_id)
				{
					$selected = ' selected ';
				}
				else
				{
					$selected = '';
				}
				$option_str .= '<option value="'.$row['cat_id'].'" '.$selected.' >'.stripslashes($row['category']).'</option>';
			}
		}
		return $option_str;
	}
	
	public function getMainCategoryOptions($cat_id,$parent_cat_id)
	{
		global $link;
		$option_str = '';
		
		if($parent_cat_id != '')
		{
			$sql = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '".$parent_cat_id."' AND `cat_deleted` = '0'  AND `cat_status` = '1'";
			$result = mysql_query($sql,$link);
			if( ($result) && (mysql_num_rows($result) > 0) )
			{
				while($row = mysql_fetch_array($result))
				{
					if($row['cat_id'] == $cat_id)
					{
						$selected = ' selected ';
					}
					else
					{
						$selected = '';
					}
					$option_str .= '<option value="'.$row['cat_id'].'" '.$selected.' >'.stripslashes($row['category']).'</option>';
				}
			}
		}	
		return $option_str;
	}
	
	public function getSubCategoryOptions($cat_id,$parent_cat_id)
	{
		global $link;
		$option_str = '';
		
		if($parent_cat_id != '')
		{
			$sql = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '".$parent_cat_id."' AND `cat_deleted` = '0'  AND `cat_status` = '1'";
			$result = mysql_query($sql,$link);
			if( ($result) && (mysql_num_rows($result) > 0) )
			{
				while($row = mysql_fetch_array($result))
				{
					if($row['cat_id'] == $cat_id)
					{
						$selected = ' selected ';
					}
					else
					{
						$selected = '';
					}
					$option_str .= '<option value="'.$row['cat_id'].'" '.$selected.' >'.stripslashes($row['category']).'</option>';
				}
			}
		}	
		return $option_str;
	}
	
	public function getCatIdFromSEOURL($cat_url)
	{
		global $link;
		$cat_id = '';
		
		$sql = "SELECT * FROM `tblcategories` WHERE `cat_deleted` = '0'  AND `cat_status` = '1' AND `cat_url` = '".$cat_url."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$cat_id = $row['cat_id'];
			}
		}
		
		return $cat_id;
	}	
	
	public function getProdIdFromSEOURL($prod_url)
	{
		global $link;
		$chkDate = date('Y-m-d H:i:s');
		$prod_id = '';
				
		$sql = "SELECT * FROM `tblproducts` WHERE `prod_url` = '".$prod_url."' AND `prod_deleted` = '0' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."'";
		//echo'<br>'.$sql;
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$prod_id = $row['prod_id'];
			}
		}
		
		return $prod_id;
	}	
	
	public function getCategorySEOURL($cat_id)
	{
		global $link;
		$cat_url = '';
		
		$sql = "SELECT * FROM `tblcategories` WHERE `cat_deleted` = '0'  AND `cat_status` = '1' AND `cat_id` = '".$cat_id."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$cat_url = stripslashes($row['cat_url']);
			}
		}
		
		return $cat_url;
	}		
	
	public function getMainMenu()
	{
		global $link;
		$output = '';
		
		$sql = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '0' AND `cat_deleted` = '0'  AND `cat_status` = '1' AND `show_at_menu` = '1' ORDER BY `cat_order` ASC , `category` ASC";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$output .= '<ul id="nav">';
			while($row = mysql_fetch_array($result))
			{
				//$output .= '<li><a href="'.SITE_URL.'/all_deals.php?tcid='.$row['cat_id'].'">'.stripslashes($row['category']).'</a>';
				//$output .= '<li><a href="'.SITE_URL.'/category/'.$row['cat_id'].'-'.urlencode(stripslashes($row['category'])).'.html">'.stripslashes($row['category']).'</a>';
				$output .= '<li><a href="'.SITE_URL.'/'.stripslashes($row['cat_url']).'">'.stripslashes($row['category']).'</a>';
				
				$sql2 = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '".$row['cat_id']."' AND `cat_deleted` = '0'  AND `cat_status` = '1' AND `show_at_menu` = '1' ORDER BY `cat_order` ASC , `category` ASC";
				$result2 = mysql_query($sql2,$link);
				if( ($result2) && (mysql_num_rows($result2) > 0) )
				{
					$output .= '<span id="s1"></span>
								<ul class="subs">';
					while($row2 = mysql_fetch_array($result2))
					{
						$cat_image = stripslashes($row2['cat_image']);
						if($cat_image != '')
						{ 
							$cat_image_str = '<img border="0" src="'.SITE_URL.'/uploads/'.$cat_image.'" width="180" height="90" >';
						} 
						else
						{ 
							$cat_image_str = '<img border="0" src="'.SITE_URL.'/uploads/inac.jpg" width="180" height="90" >';
						} 
						
						
						$output .= '<li>';
						//$output .= '<div><a href="'.SITE_URL.'/all_deals.php?tcid='.$row['cat_id'].'&mcid='.$row2['cat_id'].'">'.$cat_image_str.'</a></div>';
						//$output .= '<div><a href="'.SITE_URL.'/all_deals.php?tcid='.$row['cat_id'].'&mcid='.$row2['cat_id'].'">'.stripslashes($row2['category']).'</a></div>';
						$output .= '<div><a href="'.SITE_URL.'/'.stripslashes($row2['cat_url']).'">'.$cat_image_str.'</a></div>';
						$output .= '<div style="padding-left:5px;"><a href="'.SITE_URL.'/'.stripslashes($row2['cat_url']).'">'.stripslashes($row2['category']).'</a></div>';
						
						$output .= '</li>';
						
						/*
						$output .= '<li><a href="'.SITE_URL.'/all_deals.php?tcid='.$row['cat_id'].'&mcid='.$row2['cat_id'].'">'.stripslashes($row2['category']).'</a>';
						$sql3 = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '".$row2['cat_id']."' AND `cat_deleted` = '0'  AND `cat_status` = '1' AND `show_at_menu` = '1' ORDER BY `cat_order` ASC , `category` ASC";
						$result3 = mysql_query($sql3,$link);
						if( ($result3) && (mysql_num_rows($result3) > 0) )
						{
							$output .= '<ul>';
							while($row3 = mysql_fetch_array($result3))
							{
								$output .= '<li><a href="'.SITE_URL.'/all_deals.php?tcid='.$row['cat_id'].'&mcid='.$row2['cat_id'].'&scid='.$row3['cat_id'].'">'.stripslashes($row3['category']).'</a></li>';
							}
							$output .= '</ul>';
						}
						$output .= '</li>';
						*/
						
					}
					$output .= '</ul>';
				}
				
				
				$output .= '</li>';
			}
				//$output .= '<li style="float:right;"><a href="'.SITE_URL.'/all_deals.php" style="border-right:0px; background:#da252d;">FabDeals</a></li>';
				$output .= '<li style="float:right;"><a href="'.SITE_URL.'/all_deals.php" style="">All Deals</a></li>';
			$output .= '</ul>';
		}
		return $output;
	}
	
	public function getQuickLinks()
	{
		global $link;
		$output = '';
		
		$sql = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '0' AND `cat_deleted` = '0'  AND `cat_status` = '1' ORDER BY `cat_order` ASC , `category` ASC";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				if($row['show_at_quick_link'] == '1')
				{
					$output .= '<a href="'.SITE_URL.'/'.stripslashes($row['cat_url']).'">'.stripslashes($row['category']).'</a> |';
				}	
					
				$sql2 = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '".$row['cat_id']."' AND `cat_deleted` = '0'  AND `cat_status` = '1' AND `show_at_quick_link` = '1' ORDER BY `cat_order` ASC , `category` ASC";
				$result2 = mysql_query($sql2,$link);
				if( ($result2) && (mysql_num_rows($result2) > 0) )
				{
					while($row2 = mysql_fetch_array($result2))
					{
						$output .= '<a href="'.SITE_URL.'/'.stripslashes($row2['cat_url']).'">'.stripslashes($row2['category']).'</a> |';
					}
				}
			}
			$output = substr($output,0,-1);
		}
		
		return $output;
	}
	
	public function getHomePageTodaysDealId()
	{
		global $link;
		$home_page_deal_id = 0;
		$chkDate = date('Y-m-d H:i:s');
				
		$sql = "SELECT * FROM `tblproducts` WHERE `home_main_deal` = '1' AND `prod_deleted` = '0' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."'   LIMIT 1";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$home_page_deal_id = stripslashes($row['prod_id']);
		}
		
		return $home_page_deal_id;
	}
	
	public function getProductDetails($prod_id)
	{
		global $link;
		$chkDate = date('Y-m-d H:i:s');
		$arr_record = array();
				
		$sql = "SELECT * FROM `tblproducts` WHERE `prod_id` = '".$prod_id."' AND `prod_deleted` = '0' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$arr_record = $row;
		}
		return $arr_record;
	}
	
	public function getProductImageDetails($pif_id)
	{
		global $link;
		$photo = '';
			
		$sql = "SELECT * FROM `tblprodimagefolders` WHERE `pif_id` = '".$pif_id."' ";
		//echo"<br>Testkk: sql = ".$sql;
		$result = mysql_query($sql,$link);
		if($result && mysql_num_rows($result) > 0)
		{
			$row = mysql_fetch_array($result);
			$photo = stripslashes($row['image_name']);	
		}
		return $photo;
	}
	
	public function imageResize($width, $height, $target) 
	{
		if ($width > $height) 
		{
			$percentage = ($target / $width);
		} 
		else 
		{
			$percentage = ($target / $height);
		}
		
		//gets the new value and applies the percentage, then rounds the value
		$new_width = round($width * $percentage);
		$new_height = round($height * $percentage);
		
		return array($new_width,$new_height); 
	}
	
	public function getHomePageTodaysDealCode()
	{
		$output = '';
		
		$home_page_deal_id = $this->getHomePageTodaysDealId();
		$arr_product_record = $this->getProductDetails($home_page_deal_id);
		if(count($arr_product_record) > 0)
		{
			$prod_name = $arr_product_record['prod_name'];
			$deal_type = $arr_product_record['deal_type'];
			$old_price = $arr_product_record['old_price'];
			$prod_price = $arr_product_record['prod_price'];
			$you_save_price = $old_price - $prod_price;
			$save_percent = round(( $you_save_price * 100 ) / $old_price);
			$pay_to_dh_price = $arr_product_record['pay_to_dh_price'];
			$pay_to_vender_price = $arr_product_record['pay_to_vender_price'];
			
			$start_time = $arr_product_record['start_time'];
			$end_time = $arr_product_record['end_time'];
			$photo_add = $arr_product_record['photo'];
			
			$prod_desc = $arr_product_record['prod_desc'];
			
			$prod_url = stripslashes($arr_product_record['prod_url']);
			
			$total_brought = $this->getTotalBotBroughtNo($home_page_deal_id);
			
			if($deal_type == '1')
			{
				$save_price_str = 'Balance Rs '.$pay_to_vender_price.' pay to merchant';
			}
			else
			{
				$pay_to_dh_price = $prod_price;
				$save_price_str = 'Was Rs '.$old_price.' &nbsp; you save Rs '.$you_save_price;
			}
					
			$output .= '<!--Left col Start-->
						<div class="fl col1">
							<div id="sidedealdetails" style="height:500px;">
								<div class="cufon aligncenter smalllabel" id="only">ONLY</div>
								<div class="aligncenter" id="mainprice"><a href="'.SITE_URL.'/'.$prod_url.'" class="cufonbold"><sup>Rs</sup> '.$pay_to_dh_price.'</a></div>
								<hr>
								<a href="#" onclick="addToDealCart(\''.$arr_product_record['prod_id'].'\',\'1\')" class="buynow"></a>
								<div class="cufonbold aligncenter" id="save">SAVE '.$save_percent .'%</div>
								<div class="cufon smalllabel" id="was" style="padding-bottom:7px">'.$save_price_str.'</div>
								<div class="cufon smalllabel" style="text-align:center;padding-bottom:6px">
									<a href="'.SITE_URL.'/'.$prod_url.'" style="color:orange;font-size:14px; color:#DA2128;">View deal...</a>
								</div>
								<hr>
								<div class="cufon aligncenter tinylabel">Time left:</div>
								<div id="timebox_wrap">
									<ul class="countdown">
										<li> 
											<span class="hours">00</span>
											<p class="hours_ref">Hours</p>
										</li>
										<li> 
											<span class="minutes">00</span>
											<p class="minutes_ref">Minutes</p>
										</li>
										<li> 
											<span class="seconds">00</span>
											<p class="seconds_ref">Seconds</p>
										</li>
									</ul>
									<script type="text/javascript" src="'.SITE_URL.'/js/jquery.downCount.js"></script> 
									<script class="source" type="text/javascript">
										$(\'.countdown\').downCount({
											date: \''.date('m/d/Y h:i:s',strtotime($end_time)).'\',
											offset: +10,
											site_url: \''.SITE_URL.'\',
										}, function () {
										});
									</script> 
								</div>
								<div id="indicator" ><img src="'.SITE_URL.'/images/front/latest/dealon.png" border=0 title="" alt=""></div>
								<div id="indicator_label" class="cufon" >The Deal is on</div>
								<div class="clear"></div>
								<div class="cufon" align="center" style="margin-bottom:10px; margin-top:3px; font-size:30px;"></div>
								<div >
                        <div class="cufon aligncenter tinylabel" id="sharedeal" style="float:left;">Share this deal:</div>';
									
									if($photo_add != '')
									{
										$arr_pif_id = explode(',',$photo_add);
										$temp_image = $this->getProductImageDetails($arr_pif_id[0]);
									}
									else
									{
										$temp_image = 'default_share_image.jpg';
									}
									
									$og_show_title = 'Dealhungama.com - '.$prod_name.' - Price - Rs '.$prod_price;
									$og_show_url = SITE_URL.'/'.$prod_url;
									$og_show_image = SITE_URL.'/uploads/'.$temp_image;
									$og_show_site_name = 'Dealhungama';
									$og_show_description = strip_tags($prod_desc);
									
									
				//$output .= '		<a href="javascript:fbShare(\''.$og_show_url.'\', \''.$og_show_title.'\', \''.$og_show_title.'\', \''.$og_show_image.'\',  520, 350)"><img src="'.SITE_URL.'/images/facebook.png" style="margin-bottom:-7px; margin-left:8px; border:0;" title="share this on facebook"></a>';
									
				$output .= '<div class="fb-share-button">
                        	<a href="javascript:fbShare(\''.$og_show_url.'\', \''.$og_show_title.'\', \''.$og_show_title.'\', \''.$og_show_image.'\',  520, 350)"><img src="'.SITE_URL.'/images/facebook.png" style="border:0;" title="share this on facebook"></a>
                        </div>';					
				//$output .= '		<div class="fb-share-button" data-href="'.$og_show_url.'"></div>';
				
				
				$output .= '<div class="tw-share-button">
                        	<a href="javascript:twShare(\''.$og_show_url.'\', \''.$og_show_title.'\',  520, 350)"><img src="'.SITE_URL.'/images/twitter.png" style="border:0;" title="share this on twitter"></a>
                        </div>   ';
									
									
				//$output .= '		<a href="http://www.twitter.com/dealhungama" target="_blank"><img src="'.SITE_URL.'/images/twitter.png " style="margin-bottom:-7px; margin-left:4px; border:0; " title="share this on twitter"></a>';
				
				
				$output .= '<div class="send-email-button"></div>';
				
				
				//$output .= '					<a href="#" target="_blank"><img src="'.SITE_URL.'/images/email.png " style="margin-bottom:-7px; margin-left:4px; border:0; " title="sent it to friends"></a> ';
				
				$output .= '				</div>
								<a class="smicon addthis_button_facebook"></a>
								<a class="smicon addthis_button_twitter"></a>
								<a class="smicon addthis_button_email"></a>
								<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
								<script type="text/javascript" src="../s7.addthis.com/js/250/addthis_widget.js#username=bajit"></script>
							</div>
						</div><!--Left col End-->
			
						<!--Middle col Start-->
						<div class="fr col2">
							<div id="dealtitle_overlay" style="background:#0a3151; font-size:18px; line-height:24px;">
								<div style="padding:12px">
									<h1 class="cufon">
										<span class="cufonbold" style="color:#ffffff;">Today\'s Deal:</span>'.$prod_name.'
									</h1>
								</div>
							</div>
			
							<div id="slides">
								<div class="slides_container">';
							if($photo_add != '')
							{
								$arr_pif_id = explode(',',$photo_add);
								for($i=0;$i<count($arr_pif_id);$i++)
								{
									$temp_image = $this->getProductImageDetails($arr_pif_id[$i]);
									$mysock1 = @getimagesize(SITE_PATH.'/uploads/'.$temp_image);
									$photo_width1 = $mysock1[0];
									$photo_height1 = $mysock1[1];
									
									if($photo_width1 == '')
									{
										$photo_width1 = '750';
									}
									
									if($photo_height1 == '')
									{
										$photo_height1 = '500';
									}	
									list($new_width1 , $new_height1) = $this->imageResize($photo_width1, $photo_height1, 750);
									if($arr_pif_id[$i] != '')
									{								
			$output .= '			<div class="slide">
										<a href="'.SITE_URL.'/'.$prod_url.'">
											<img border="0" width="'.$new_width1.'" height="'.$new_height1.'" src="'.SITE_URL.'/uploads/'.$temp_image.'" title="" alt="" />
										</a>
									</div>';
									}
								}	
							}			
			$output .= '		</div>
							</div>
						</div>'; 
		}	
		return $output;
	}
	
	public function setHomePageListingDeals()
	{
		global $link;
		$return = false;
		$chkDate = date('Y-m-d H:i:s');
		$arr_selected_deals = array();
		
		$sql = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '0' AND `cat_deleted` = '0' AND `cat_status` = '1' ORDER BY `cat_order` ASC , `category` ASC ";
		//echo '<br>'.$sql;
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				//$output .= $this->getHomePageCategoryDealCode($row['cat_id']);
				//$sql2 = "SELECT * FROM `tblproducts` WHERE `prod_deleted` = '0' AND `home_page_listing_deal` = '1' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."' ORDER BY `end_time` DESC   LIMIT 3";
				$sql2 = "SELECT * FROM `tblproducts` WHERE `top_cat_id` = '".$row['cat_id']."' AND `prod_deleted` = '0' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."' ORDER BY `end_time` DESC";
				//echo '<br>'.$sql;
				$result2 = mysql_query($sql2,$link);
				if( ($result2) && (mysql_num_rows($result2) > 0) )
				{
					$total_rec = mysql_num_rows($result2);
					$updated_count = 0;
					while($row2 = mysql_fetch_array($result2))
					{
						$prod_id = $row2['prod_id'];
						$home_page_listing_deal = $row2['home_page_listing_deal'];
						//$home_page_listing_deal_date = $row2['home_page_listing_deal_date'];
						if($total_rec <= 3)
						{
							$sql3 = "UPDATE `tblproducts` SET `home_page_listing_deal` = '1' WHERE `prod_id` = '".$prod_id."'";
							$result3 = mysql_query($sql3,$link);
						}
						else
						{
							if($home_page_listing_deal == '0')
							{
								if($updated_count < 3)
								{
									$sql3 = "UPDATE `tblproducts` SET `home_page_listing_deal` = '1' WHERE `prod_id` = '".$prod_id."'";
									$result3 = mysql_query($sql3,$link);
									$updated_count++;
								}
								
							}
						}
					}
								
				}
			}		
		}
		
		
		return $return;
	}
	
	
	public function getHomePageAllTopCategoryDealCode()
	{
		global $link;
		$output = '';
		
		$sql = "SELECT * FROM `tblcategories` WHERE `parent_cat_id` = '0' AND `cat_deleted` = '0' AND `cat_status` = '1' ORDER BY `cat_order` ASC , `category` ASC ";
		//echo '<br>'.$sql;
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$output .= $this->getHomePageCategoryDealCode($row['cat_id']);
			}		
		}
		return $output;
	}
	
	public function getHomePageCategoryDealCode($cat_id)
	{
		global $link;
		$output = '';
		$chkDate = date('Y-m-d H:i:s');
				
		$sql = "SELECT * FROM `tblproducts` WHERE `top_cat_id` = '".$cat_id."' AND `prod_deleted` = '0' AND `home_page_listing_deal` = '1' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."' ORDER BY `end_time` DESC   LIMIT 3";
		//echo '<br>'.$sql; 
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
		
			$cat_name = $this->getCategoryName($cat_id);
			$cat_url = $this->getCategorySEOURL($cat_id);
		$output .= '<div style="padding:20px 0 10px 0">
						<div class="header_main_area">
							<div class="header_area"><font class="header">'.$cat_name.' Deals</font> | <a href="'.SITE_URL.'/'.$cat_url.'" class="hover">View All Deals</a></div>
							<div class="info"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<!-- SIDE DEALS -->';		
			$i = 0;
			while($row = mysql_fetch_array($result))
			{
				if($i == 0)
				{
					$deal_class = 'deal_first';
				}
				else
				{
					$deal_class = 'deal';
				}	
				
				$old_price = $row['old_price'];
				$prod_price = $row['prod_price'];
				$you_save_price = $old_price - $prod_price;
				$save_percent = round(( $you_save_price * 100 ) / $old_price);
				$photo_add = $row['photo'];
				
				if($photo_add != '')
				{
					$arr_pif_id = explode(',',$photo_add);
					if($arr_pif_id[0] != '')
					{
						$temp_image = $this->getProductImageDetails($arr_pif_id[0]);
						$mysock1 = @getimagesize(SITE_PATH.'/uploads/'.$temp_image);
						$photo_width1 = $mysock1[0];
						$photo_height1 = $mysock1[1];
						
						if($photo_width1 == '')
						{
							$photo_width1 = '300';
						}
						
						if($photo_height1 == '')
						{
							$photo_height1 = '200';
						}	
						list($new_width1 , $new_height1) = $this->imageResize($photo_width1, $photo_height1, 300);
						$img_str = '<img border="0" width="'.$new_width1.'" height="'.$new_height1.'" src="'.SITE_URL.'/uploads/'.$temp_image.'" title="" alt="" />';
					}	
					else
					{
						$img_str = '<img border="0" width="300" height="200" src="'.SITE_URL.'/uploads/ina.jpg" title="" alt="" />';
					}	
				}	
				else
				{
					$img_str = '<img border="0" width="300" height="200" src="'.SITE_URL.'/uploads/ina.jpg" title="" alt="" />';
				}		
					
		$total_brought = $this->getTotalBotBroughtNo($row['prod_id']);		
		$output .= '<div class="'.$deal_class.'">
						<div class="dealtitle-wrap" >
							<h1 class="dealtitle cufon" ><a href="'.SITE_URL.'/'.$row['prod_url'].'" style="color:#fff">'.$row['prod_name'].'</a></h1>
						</div>
						<div class="pastdealimage">
							<a href="'.SITE_URL.'/'.$row['prod_url'].'">'.$img_str.'</a>
						</div>
						<div class="pastdealfooter">
							<a href="'.SITE_URL.'/'.$row['prod_url'].'" class="pastdeal_orange_viewdeal cufon">View Deal</a>';
		//$output .= '		<div class="show_bought cufon">'.$total_brought.'<br> Bought</div>';
		$output .= '		<div class="saved">
								<div class="cufon label">Actual Price</div>
								<div class="cufon number">Rs '.$old_price.'</div>
							</div>
							<div class="price" >
								<div class="cufon label">Discount</div>
								<div class="cufon number">'.$save_percent.'%</div>
								
							</div>
							<div class="saved">
								<div class="cufon label">You Pay</div>
								<div class="cufon number">Rs '.$prod_price.'</div>
							</div>
						</div>
					</div>';
		
				$i++;
			}
		$output .= '<div class="clear"></div>';
		}
		
		return $output;
	}
	
	public function chkIfTopCategory($cat_id)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tblcategories` WHERE `cat_id` = '".$cat_id."' AND `parent_cat_id` = '0' AND `cat_deleted` = '0'  ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	public function chkIfMainCategory($cat_id)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tblcategories` WHERE `cat_id` = '".$cat_id."' AND `parent_cat_id` > 0 AND `cat_deleted` = '0'  ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$sql2 = "SELECT * FROM `tblcategories` WHERE `cat_id` = '".$row['parent_cat_id']."' AND `parent_cat_id` = '0' AND `cat_deleted` = '0'  ";
			$result2 = mysql_query($sql2,$link);
			if( ($result2) && (mysql_num_rows($result2) > 0) )
			{
				$return = true;
			}
		}
		return $return;
	}
	
	public function getAllDealsCode($cat_id)
	{
		global $link;
		$output = '';
		$chkDate = date('Y-m-d H:i:s');
		
		if($this->chkIfTopCategory($cat_id))
		{
			$no_deals_cat = 'of '.$this->getCategoryName($cat_id);
			$str_sql_cat_id = " AND `top_cat_id` = '".$cat_id."' ";
		}
		elseif($this->chkIfMainCategory($cat_id))
		{
			$no_deals_cat = 'of '.$this->getCategoryName($this->getTopCategoryId($cat_id));
			$str_sql_cat_id = " AND `cat_id` = '".$cat_id."' ";
		}
		else
		{
			$no_deals_cat = '';
			$str_sql_cat_id = '';
		}
				
		$sql = "SELECT * FROM `tblproducts` WHERE `prod_deleted` = '0' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."' ".$str_sql_cat_id." ORDER BY `end_time` DESC";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$i = 0;
			while($row = mysql_fetch_array($result))
			{
				if($i % 3 == 0)
				{
					$deal_class = 'deal_first';
				}
				else
				{
					$deal_class = 'deal';
				}	
				
				$old_price = $row['old_price'];
				$prod_price = $row['prod_price'];
				$you_save_price = $old_price - $prod_price;
				$save_percent = round(( $you_save_price * 100 ) / $old_price);
				$photo_add = $row['photo'];
				
				if($photo_add != '')
				{
					$arr_pif_id = explode(',',$photo_add);
					if($arr_pif_id[0] != '')
					{
						$temp_image = $this->getProductImageDetails($arr_pif_id[0]);
						$mysock1 = @getimagesize(SITE_PATH.'/uploads/'.$temp_image);
						$photo_width1 = $mysock1[0];
						$photo_height1 = $mysock1[1];
						
						if($photo_width1 == '')
						{
							$photo_width1 = '300';
						}
						
						if($photo_height1 == '')
						{
							$photo_height1 = '200';
						}	
						list($new_width1 , $new_height1) = $this->imageResize($photo_width1, $photo_height1, 300);
						$img_str = '<img border="0" width="'.$new_width1.'" height="'.$new_height1.'" src="'.SITE_URL.'/uploads/'.$temp_image.'" title="" alt="" />';
					}	
					else
					{
						$img_str = '<img border="0" width="300" height="200" src="'.SITE_URL.'/uploads/ina.jpg" title="" alt="" />';
					}	
				}	
				else
				{
					$img_str = '<img border="0" width="300" height="200" src="'.SITE_URL.'/uploads/ina.jpg" title="" alt="" />';
				}		
					
		$total_brought = $this->getTotalBotBroughtNo($row['prod_id']);		
		$output .= '<div class="'.$deal_class.'">
						<div class="dealtitle-wrap" >
							<h1 class="dealtitle cufon" ><a href="'.SITE_URL.'/'.$row['prod_url'].'" style="color:#fff">'.$row['prod_name'].'</a></h1>
						</div>
						<div class="pastdealimage">
							<a href="'.SITE_URL.'/'.$row['prod_url'].'">'.$img_str.'</a>
						</div>
						<div class="pastdealfooter">
							<a href="'.SITE_URL.'/'.$row['prod_url'].'" class="pastdeal_orange_viewdeal cufon">View Deal</a>';
		//$output .= '		<div class="show_bought cufon">'.$total_brought.'<br> Bought</div>';
		$output .= '		<div class="saved">
								<div class="cufon label">Actual Price</div>
								<div class="cufon number">Rs '.$old_price.'</div>
							</div>
							<div class="price" >
								<div class="cufon label">Discount</div>
								<div class="cufon number">'.$save_percent.'%</div>
								
							</div>
							<div class="saved">
								<div class="cufon label">You Pay</div>
								<div class="cufon number">Rs '.$prod_price.'</div>
							</div>
						</div>
					</div>';
		
				$i++;
			}
		}
		else
		{
			//$output = '<div class="content_section"><div class="inner" style="min-height:100px;"><div style="height:270px; padding:10px;font-weight:bold;">We are sorry, we do not have any deals in Weekend Getaways right now.<br>Meanwhile you can check other deals '.$no_deals_cat.'.</div></div></div>';
			$output = '<div class="content_section"><div class="inner" style="min-height:100px;"><div style="height:270px; padding:10px;font-weight:bold;">We are working in this section to get new fresh deals for you, till that time you can explore other sections.</div></div></div>';
					
					
		}
		$output .= '<div class="clear"></div>';
		return $output;
	}
	
	public function getSimilarDealsCode($deal_id)
	{
		global $link;
		$output = '';
		$chkDate = date('Y-m-d H:i:s');
		
		$arr_product_record = $this->getProductDetails($deal_id);
		$top_cat_id = $arr_product_record['top_cat_id'];
		
		$sql = "SELECT * FROM `tblproducts` WHERE `top_cat_id` = '".$top_cat_id."' AND `prod_id` != '".$deal_id."'  AND `prod_deleted` = '0' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."' ORDER BY `end_time` DESC   LIMIT 3";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$i = 0;
			while($row = mysql_fetch_array($result))
			{
				//if($i == 0)
				//{
				//	$deal_class = 'deal_first';
				//}
				//else
				//{
				//	$deal_class = 'deal';
				//}	
				
				$deal_class = 'side_bar_deal';
				
				$old_price = $row['old_price'];
				$prod_price = $row['prod_price'];
				$you_save_price = $old_price - $prod_price;
				$save_percent = round(( $you_save_price * 100 ) / $old_price);
				$photo_add = $row['photo'];
				
				if($photo_add != '')
				{
					$arr_pif_id = explode(',',$photo_add);
					if($arr_pif_id[0] != '')
					{
						$temp_image = $this->getProductImageDetails($arr_pif_id[0]);
						$mysock1 = @getimagesize(SITE_PATH.'/uploads/'.$temp_image);
						$photo_width1 = $mysock1[0];
						$photo_height1 = $mysock1[1];
						
						if($photo_width1 == '')
						{
							//$photo_width1 = '300';
							$photo_width1 = '210';
						}
						
						if($photo_height1 == '')
						{
							//$photo_height1 = '200';
							$photo_height1 = '140';
						}	
						list($new_width1 , $new_height1) = $this->imageResize($photo_width1, $photo_height1, 210);
						$img_str = '<img border="0" width="'.$new_width1.'" height="'.$new_height1.'" src="'.SITE_URL.'/uploads/'.$temp_image.'" title="" alt="" />';
					}	
					else
					{
						$img_str = '<img border="0" width="210" height="140" src="'.SITE_URL.'/uploads/ina.jpg" title="" alt="" />';
					}	
				}	
				else
				{
					$img_str = '<img border="0" width="210" height="140" src="'.SITE_URL.'/uploads/ina.jpg" title="" alt="" />';
				}		
					
		$output .= '<div class="'.$deal_class.'">
							<div class="dealtitle-wrap" >
								<h1 class="dealtitle cufon" ><a href="'.SITE_URL.'/'.$row['prod_url'].'" style="color:#fff">'.$row['prod_name'].'</a></h1>
							</div>
							<div class="pastdealimage_sidebar">
								<a href="'.SITE_URL.'/'.$row['prod_url'].'">'.$img_str.'</a>
							</div>
							<div class="pastdealfooter_sidebar">
								<a href="'.SITE_URL.'/'.$row['prod_url'].'" class="pastdeal_orange_sidedeal cufon">View Deal</a>
								<div class="saved">
									<span class="cufon label">Actual Price:</span>
									<span class="cufon number">Rs '.$old_price.'</span>
								</div>
								<div class="price" >
									<span class="cufon label">Discount:</span>
									<span class="cufon number">'.$save_percent.'%</span>
									
								</div>
								<div class="saved">
									<span class="cufon label">You Pay:</span>
									<span class="cufon number">Rs '.$prod_price.'</span>
								</div>
							</div>
						</div>';
				$i++;
			}
		}
		$output .= '<div class="clear"></div>';
		return $output;
	}
	
	public function addToDealCart($cart_session_id,$prod_id,$prod_qty,$user_id)
	{
		global $link;
		$return = false;
		
		$arr_product_record = $this->getProductDetails($prod_id);
		$deal_type = $arr_product_record['deal_type'];
		$old_price = $arr_product_record['old_price'];
		$prod_price = $arr_product_record['prod_price'];
		$pay_to_dh_price = $arr_product_record['pay_to_dh_price'];
		$pay_to_vender_price = $arr_product_record['pay_to_vender_price'];
		
		if($deal_type == '1')
		{
			$amount = $pay_to_dh_price;
		}
		else
		{
			$amount = $prod_price;
			$pay_to_dh_price = $prod_price;
			$pay_to_vender_price = 0;
		}
		
		$prod_shipping_price = 0.00;
		$prod_gst_amount = 0.00;
		$prod_transaction_fees = 0.00;
		
		$prod_sub_total = $amount * $prod_qty;
		//$prod_gst_amount = 0.00 + ( DEFAULT_GST_AMOUNT * $prod_sub_total / 100 );
		//$prod_transaction_fees = 0.00 + ( DEFAULT_TRANSACTION_FEES * $prod_sub_total / 100 );
		
		$prod_total_amount = 0.00 + $prod_sub_total + $prod_gst_amount + $prod_transaction_fees + $prod_shipping_price;	
		$prod_net_payble_amount = $prod_total_amount;
		
		$sql = "SELECT * FROM `tblcart` WHERE `cart_session_id` = '".$cart_session_id."' AND `cart_status` = '0' ";
		//echo"<br>Testkk: sql = ".$sql;
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$cart_id = $row['cart_id'];
						
			$sql3 = "DELETE FROM `tblcart` WHERE `cart_session_id` = '".$cart_session_id."' AND `cart_status` = '0' ";
			//echo"<br>Testkk: sql3 = ".$sql3;
			$result3 = mysql_query($sql3,$link);
		}
		
		$sql2 = "INSERT INTO `tblcart`(`cart_session_id`,`prod_id`,`prod_qty`,`amount`,`prod_sub_total`,`prod_gst_amount`,`prod_transaction_fees`,`prod_fright`,`prod_total_amount`,`user_id`,`cart_status`,`prod_net_payble_amount`,`prod_price`,`old_price`,`deal_type`,`pay_to_dh_price`,`pay_to_vender_price`) VALUES('".$cart_session_id."','".$prod_id."','".$prod_qty."','".$amount."','".$prod_sub_total."','".$prod_gst_amount."','".$prod_transaction_fees."','".$prod_shipping_price."','".$prod_total_amount."','".$user_id."','0','".$prod_net_payble_amount."','".$prod_price."','".$old_price."','".$deal_type."','".$pay_to_dh_price."','".$pay_to_vender_price."') ";
		//echo"<br>Testkk: sql2 = ".$sql2;
		$result2 = mysql_query($sql2,$link);
		if($result2)
		{
			$return = true;		
		}
				
		return $return;
	}
	
	public function getDealCartItems()
	{
		global $link;
		
		$return = false;
		$arr_cart_id = array();
		$arr_cart_session_id = array();
		$arr_prod_id = array();
		$arr_prod_qty = array();
		$arr_amount = array();
		$arr_prod_sub_total = array();
		$arr_user_id = array();
		$arr_prod_price = array();
		$arr_old_price = array();
		$arr_deal_type = array();
		$arr_pay_to_dh_price = array();
		$arr_pay_to_vender_price = array();
		
		$sub_total = 0.00;
		$shipping_price = 0.00;
		$gst_amount = 0.00;
		$transaction_fees = 0.00;
		$total = 0.00;
		$net_payble_amount = 0.00;
		
		$cart_session_id = session_id();
		
		$sql2 = "SELECT * FROM `tblcart` WHERE `cart_session_id` = '".$cart_session_id."' AND `cart_status` = '0' ORDER BY cart_datetime ASC ";
		//echo"<br>Testkk: sql2 = ".$sql2;
		$result2 = mysql_query($sql2,$link);
		if( ($result2) && (mysql_num_rows($result2) > 0) )
		{
			$return = true;
			while($row2 = mysql_fetch_array($result2))
			{
				$arr_cart_id[] = $row2['cart_id'];
				$arr_cart_session_id[] = $row2['cart_session_id'];
				$arr_prod_id[] = $row2['prod_id'];
				$arr_prod_qty[] = $row2['prod_qty'];
				$arr_amount[] = $row2['amount'];
				$arr_prod_sub_total[] = $row2['prod_sub_total'];
				$arr_user_id[] = $row2['user_id'];
				$arr_prod_price[] = $row2['prod_price'];
				$arr_old_price[] = $row2['old_price'];
				$arr_deal_type[] = $row2['deal_type'];
				$arr_pay_to_dh_price[] = $row2['pay_to_dh_price'];
				$arr_pay_to_vender_price[] = $row2['pay_to_vender_price'];
				
				
				$sub_total += $row2['prod_sub_total'];
				$shipping_price += $row2['prod_fright'];
			}
			
			//$gst_amount = 0.00 + ( DEFAULT_GST_AMOUNT * $sub_total / 100 );
			//$transaction_fees = 0.00 + ( DEFAULT_TRANSACTION_FEES * $sub_total / 100 );
			
			$total = 0.00 + $sub_total + $gst_amount + $transaction_fees + $shipping_price;	
			$net_payble_amount = $total;
		}
				
		return array($return,$arr_cart_id,$arr_cart_session_id,$arr_prod_id,$arr_prod_qty,$arr_amount,$arr_prod_sub_total,$arr_user_id,$shipping_price,$sub_total,$gst_amount,$transaction_fees,$total,$net_payble_amount,$arr_prod_price,$arr_old_price,$arr_deal_type,$arr_pay_to_dh_price,$arr_pay_to_vender_price);
	} 
	
	public function getCartPage()
	{
		global $link;
		$output = '';
		
		return $output;
	}
	
	public function getUserShippingDetails($user_id)
	{
		global $link;
		$email = '';
		$shipping_name = '';
		$shipping_address = '';
		$shipping_city = '';
		$shipping_state = '';
		$shipping_country = '';
		$shipping_pincode = '';
		$shipping_phone_no = '';
		$billing_name = '';
		$billing_address = '';
		$billing_city = '';
		$billing_state = '';
		$billing_country = '';
		$billing_pincode = '';
		$billing_phone_no = '';
		
		
			$sql = "SELECT * FROM `tblusers` WHERE `user_id` = '".$user_id."' ";
			$result = mysql_query($sql,$link);
			
			if( ($result) && (mysql_num_rows($result) > 0) )
			{
				$row = mysql_fetch_array($result);
				$first_name = stripslashes($row['first_name']);
				$last_name = stripslashes($row['last_name']);
				$email = $row['email'];
				
				if($row['shipping_name'] == '')
				{
					$shipping_name = $first_name.' '.$last_name;
				}
				else
				{
					$shipping_name = stripslashes($row['shipping_name']);
				}
				
				if($row['shipping_phone_no'] == '')
				{
					$shipping_phone_no = $row['phone'];
				}
				else
				{
					$shipping_phone_no = stripslashes($row['shipping_phone_no']);
				}
				
				if($row['shipping_city'] == '')
				{
					$shipping_city = $row['city'];
				}
				else
				{
					$shipping_city = stripslashes($row['shipping_city']);
				}
				
				$shipping_address = stripslashes($row['shipping_address']);
				$shipping_city = stripslashes($row['shipping_city']);
				$shipping_state = stripslashes($row['shipping_state']);
				$shipping_country = $row['shipping_country'];
				$shipping_pincode = stripslashes($row['shipping_pincode']);
				
				
				if($row['billing_name'] == '')
				{
					$billing_name = $shipping_name;
				}
				else
				{
					$billing_name = stripslashes($row['billing_name']);
				}
				
				if($row['billing_address'] == '')
				{
					$billing_address = $shipping_address;
				}
				else
				{
					$billing_address = stripslashes($row['billing_address']);
				}
				
				if($row['billing_city'] == '')
				{
					$billing_city = $shipping_city;
				}
				else
				{
					$billing_city = stripslashes($row['billing_city']);
				}
				
				if($row['billing_state'] == '')
				{
					$billing_state = $shipping_state;
				}
				else
				{
					$billing_state = stripslashes($row['billing_state']);
				}	
				
				if($row['billing_country'] == '')
				{
					$billing_country = $shipping_country;
				}
				else
				{
					$billing_country = $row['billing_country'];
				}
				
				if($row['billing_pincode'] == '')
				{
					$billing_pincode = $shipping_pincode;
				}
				else
				{
					$billing_pincode = stripslashes($row['billing_pincode']);
				}	
				
				if($row['billing_phone_no'] == '')
				{
					$billing_phone_no = $shipping_phone_no;
				}
				else
				{
					$billing_phone_no = stripslashes($row['billing_phone_no']);
				}	
			}
			
		return array($email,$shipping_name,$shipping_address,$shipping_city,$shipping_state,$shipping_country,$shipping_pincode,$shipping_phone_no,$billing_name,$billing_address,$billing_city,$billing_state,$billing_country,$billing_pincode,$billing_phone_no);
	}
	
	public function saveShippingDetails($user_id,$shipping_name,$shipping_address,$shipping_city,$shipping_state,$shipping_country,$shipping_pincode,$shipping_phone_no,$billing_name,$billing_address,$billing_city,$billing_state,$billing_country,$billing_pincode,$billing_phone_no)
	{
		global $link;
		$return = false;
	
		$sql = "UPDATE `tblusers` SET `shipping_name` = '".addslashes($shipping_name)."',`shipping_address` = '".addslashes($shipping_address)."',`shipping_city` = '".addslashes($shipping_city)."',`shipping_state` = '".addslashes($shipping_state)."',`shipping_country` = '".addslashes($shipping_country)."',`shipping_pincode` = '".addslashes($shipping_pincode)."',`shipping_phone_no` = '".addslashes($shipping_phone_no)."',`billing_name` = '".addslashes($billing_name)."',`billing_address` = '".addslashes($billing_address)."',`billing_city` = '".addslashes($billing_city)."',`billing_state` = '".addslashes($billing_state)."',`billing_country` = '".addslashes($billing_country)."',`billing_pincode` = '".addslashes($billing_pincode)."',`billing_phone_no` = '".addslashes($billing_phone_no)."' WHERE `user_id` = '".$user_id."' ";
		$result = mysql_query($sql,$link);
		if($result)
		{
			$return = true;
		}	
		return $return;
	}
	
	public function genrateInvoiceNo($trans_type,$user_id,$prod_id)
	{
		$invoice = '';
		
		if($trans_type=='DHD' )
		{
			$four_digit_user_id = '0000';
			$strlen_user_id = strlen($user_id);
			
			if($strlen_user_id == 1)
			{
				$four_digit_user_id = '000'.$user_id;
			} 
			elseif($strlen_user_id == 2)
			{
				$four_digit_user_id = '00'.$user_id;
			}
			elseif($strlen_user_id == 3)
			{
				$four_digit_user_id = '0'.$user_id;
			}
			else
			{
				$four_digit_user_id = $user_id;
			} 
			$four_digit_prod_id = '0000';
			$strlen_prod_id = strlen($prod_id);
			
			if($strlen_prod_id == 1)
			{
				$four_digit_prod_id = '000'.$prod_id;
			} 
			elseif($strlen_prod_id == 2)
			{
				$four_digit_prod_id = '00'.$prod_id;
			}
			elseif($strlen_prod_id == 3)
			{
				$four_digit_prod_id = '0'.$prod_id;
			}
			else
			{
				$four_digit_prod_id = $prod_id;
			}
		}
		
		if($trans_type == 'DHD')
		{
			$eight_digit_random_no = mt_rand(10000000,99999999);
			$session_id = session_id();
			$invoice = $trans_type.$four_digit_user_id.$eight_digit_random_no.$session_id;
		}	
				 
		return $invoice;	
	}
	
	public function addToPayu($mihpayid,$cart_session_id,$invoice,$buyer_id,$arr_return_key,$arr_return_val)
	{
		global $link;
		$return = false;
		
		for($i=0;$i<count($arr_return_key);$i++)
		{
			$sql = "INSERT INTO `tblpayu` (`mihpayid`, `cart_session_id`, `invoice`, `buyer_id`, `return_key`, `return_val`) VALUES ('".$mihpayid."','".$cart_session_id."','".$invoice."','".$buyer_id."','".$arr_return_key[$i]."','".$arr_return_val[$i]."')";
			$result = mysql_query($sql,$link);
			if($result)
			{
				$return = true;
			}
		}	
		return $return;
	}
	
	public function chkValidCartSessionItems($cart_session_id)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tblcart` WHERE `cart_session_id` = '".$cart_session_id."' AND `cart_status` = '0' ";
		//echo $sql;
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	public function getTaxAmountsOFCart($cart_session_id)
	{
		global $link;
		$sub_total = 0;
		$gst_amount = 0;
		$transaction_fees = 0;
		$fright = 0;
		$total_amount = 0;
		$discount_amount = 0;
		$net_payble_amount = 0;
		$voucher_code = '';
		
		$sql = "SELECT * FROM `tblcart` WHERE `cart_session_id` = '".$cart_session_id."' AND `cart_status` = '0' ";
			
			//echo"<br>Testkk: sql = ".$sql;
			$result = mysql_query($sql,$link);
			
			if( ($result) && (mysql_num_rows($result) > 0) )
			{
				while($row = mysql_fetch_array($result))
				{
					$sub_total += $row['prod_sub_total'];
					$gst_amount += $row['prod_gst_amount'];
					$transaction_fees += $row['prod_transaction_fees'];
					$fright += $row['prod_fright'];
					$total_amount += $row['prod_total_amount'];
					$net_payble_amount = $row['prod_net_payble_amount'];
				}
			}
		
		return array($sub_total,$gst_amount,$transaction_fees,$fright,$total_amount,$net_payble_amount);
	}
	
	public function getOrderdate($order_id)
	{
		global $link;
		$order_date = '';
			
		$sql = "SELECT * FROM `tblorders` WHERE `order_id` = '".$order_id."'";
		//echo "<br>Testkk :".$sql;
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$order_date = $row['order_date'];
		}
		return $order_date;
	}
	
	public function GetProductQtyCart($invoice)
	{
		global $link;
		$return = false;
		$arr_prod_id = array();
		$arr_prod_qty = array();
		$sql = "SELECT * FROM `tblcart` WHERE `invoice` = '".$invoice."' AND `order_id` > 0 AND `cart_status` > 0";
		//echo $sql;
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
			while($row=mysql_fetch_array($result))
			{
				array_push ($arr_prod_id , $row['prod_id']);
				array_push ($arr_prod_qty , $row['prod_qty']);
			}
			
		}
		return array($arr_prod_id,$arr_prod_qty);
	}
	
	public function createOrder($invoice,$cart_session_id,$buyer_id,$buyer_name,$buyer_email,$buyer_address,$buyer_city,$buyer_state,$buyer_country,$buyer_pincode,$buyer_phone,$billing_name,$billing_address,$billing_city,$billing_state,$billing_country,$billing_pincode,$billing_phone_no,$sub_total,$gst_amount,$transaction_fees,$fright,$total_amount,$transaction_method,$net_payble_amount)
	{
		global $link;
		$order_id = 0;
		
		$net_payble_amount = $total_amount;
		
		$sql = "INSERT INTO `tblorders` (`invoice`,`cart_session_id`,`buyer_id`,`buyer_name`,`buyer_email`,`buyer_address`,`buyer_city`,`buyer_state`,`buyer_country`,`buyer_pincode`,`buyer_phone`,`billing_name`,`billing_address`,`billing_city`,`billing_state`,`billing_country`,`billing_pincode`,`billing_phone_no`,`sub_total`,`gst_amount`,`transaction_fees`,`fright`,`total_amount`,`order_status`,`transaction_method`,`net_payble_amount`) VALUES ('".$invoice."','".$cart_session_id."','".$buyer_id."','".addslashes($buyer_name)."','".addslashes($buyer_email)."','".addslashes($buyer_address)."','".addslashes($buyer_city)."','".addslashes($buyer_state)."','".addslashes($buyer_country)."','".addslashes($buyer_pincode)."','".addslashes($buyer_phone)."','".addslashes($billing_name)."','".addslashes($billing_address)."','".addslashes($billing_city)."','".addslashes($billing_state)."','".addslashes($billing_country)."','".addslashes($billing_pincode)."','".addslashes($billing_phone_no)."','".addslashes($sub_total)."','".addslashes($gst_amount)."','".addslashes($transaction_fees)."','".addslashes($fright)."','".addslashes($total_amount)."','0','".$transaction_method."','".$net_payble_amount."')";
		//echo "<br>Testkk sql = ".$sql;
		$result = mysql_query($sql,$link);
		if($result)
		{
			$order_id = mysql_insert_id($link);
			$order_date = $this->getOrderdate($order_id);
			
			
			$sql2 = "UPDATE `tblcart` SET `cart_status` = '1' , `user_id` = '".$buyer_id."' , `order_id` = '".$order_id."' ,`order_date` = '".$order_date."'  , `invoice` = '".$invoice."' , `prod_net_payble_amount` = '".$total_amount."',`checkout` = '2' WHERE `cart_session_id` = '".$cart_session_id."' AND `cart_status` = '0' ";
			//echo "<br>Testkk sql2 = ".$sql2;
			$result2 = mysql_query( $sql2,$link);
			if($result2)
			{
				list($arr_prod_id,$arr_prod_qty) = $this->GetProductQtyCart($invoice);
				for($i=0;$i<count($arr_prod_id);$i++)
				{
					$sql3 = "UPDATE `tblproducts` SET `prod_qty` =`prod_qty` - '".$arr_prod_qty[$i]."' WHERE `prod_id` = '".$arr_prod_id[$i]."'";
					$result3 = mysql_query($sql3,$link);
					if($result3)
					{
					  //nothing
					}
				}	
			}
		}	
		return $order_id;
	}
	
	public function getOrderDetails($order_id)
	{
		global $link;
		$arr_record = array();
				
		$sql = "SELECT * FROM `tblorders` AS tbo LEFT JOIN `tblcart` AS tbc ON tbo.order_id = tbc.order_id  WHERE tbo.order_id = '".$order_id."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$arr_record = $row;
		}
		return $arr_record;
	}
	
	public function getVoucherCode($order_id)
	{
		global $link;
		$subject = '';
		$output = '';
		
		$arr_order_details = $this->getOrderDetails($order_id);
		
		if(count($arr_order_details) > 0)
		{
		
			//$arr_user_details = $this->getUserDetails($user_id);
			
			
			$temp_user_name = explode(' ',$arr_order_details['buyer_name']);
			$fname = $temp_user_name[0];
			
			$arr_product_record = $this->getProductDetails($arr_order_details['prod_id']);
			$top_cat_name = $this->getCategoryName($arr_product_record['top_cat_id']);
			
			$deal_type = $arr_product_record['deal_type'];
			$pay_to_vender_price = $arr_product_record['pay_to_vender_price'];
			$prod_desc = $arr_product_record['prod_desc'];
			$voucher_valid_date = date('M jS Y',strtotime($arr_product_record['voucher_end_date'])).' at 11:59pm';
			if($deal_type == '1')
			{
				$pay_to_merchant = 'Pay at Merchant : Rs. '.$pay_to_vender_price.'\- ';
			}
			else
			{
				$pay_to_merchant = '';
			}
			
			$merchant_name = $arr_product_record['merchant_name'];
			$merchant_address = $arr_product_record['merchant_address'];
			$merchant_phone = $arr_product_record['merchant_phone'];
			$merchant_email = $arr_product_record['merchant_email'];
			if($merchant_name == '')
			{
				$merchant_name = 'Dealhungama';
				$merchant_address = 'SB-26, Highland Corporate Center, Kapurbawdi Junction,Ghodbunder Road,Thane (W) 400607';
				$merchant_phone = '+91 22 41005535';
				$merchant_email = 'contact@maptek.in';
			}
		
		$subject = 'Dealhungama: Your '.$top_cat_name.' Order Id:'.$arr_order_details['invoice'].' ';
		$output .= '<style type="text/css">
					<!--
					body {
						margin-left: 0px;
						margin-top: 0px;
						margin-right: 0px;
						margin-bottom: 0px;
						font-family:Arial, Helvetica, sans-serif;
						font-size:12px;
						color:#000000;
						line-height:18px;
					}
					-->
					</style>
					<table cellpadding="0" cellspacing="0" border="0" align="center" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#000000;line-height:18px;" >
						<tr>
							<td>
								<table width="650px" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
									<tr>
										<td align="center" valign="top" bgcolor="#ffffff" >
											<table width="630" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td align="left" valign="top">&nbsp;</td>
												</tr>
											</table>
											<table width="630" border="0" cellpadding="0" cellspacing="0">
												<tr>
													<td width="328" height="55" align="left" valign="top"><a href="#"><img src="'.SITE_URL.'/images/dh_logo.png" width="225" height="48" border="0"/></a> </td>
													<td width="302" height="55" align="right" valign="top" ><strong>022-4100 5535</strong><br />(10am to 6pm, 6days a week) '.date('d-m-Y').' </td>
												</tr>
											</table>
											<table width="630" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td align="left" valign="top">Dear '.$fname.',<br />Thanks you for shopping with us..</td>
												</tr>
											</table>
											<table width="630" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td align="left" valign="top">&nbsp;</td>
												</tr>
											</table>
											<table width="630" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td colspan="4" align="center" valign="top"><img src="'.SITE_URL.'/images/v-head.jpg" width="630" height="289" /></td>
												</tr>
												<tr>
												<td width="16" align="left" valign="top"><img src="'.SITE_URL.'/images/v-left.jpg" width="16" height="98" /></td>
												<td width="28" height="98" align="center" valign="top" bgcolor="#E6E6E6">&nbsp;</td>
												<td width="570" align="center" valign="top" bgcolor="#E6E6E6">
													<strong>'.$top_cat_name.'</strong><br />
													'.$arr_product_record['prod_name'].'<br />
													<strong>Vouchure Code: '.$arr_order_details['invoice'].' | '.$pay_to_merchant.'</strong><br />
													Valid till '.$voucher_valid_date.'
												</td>
												<td width="17" align="right" valign="top"><img src="'.SITE_URL.'/images/v-right.jpg" width="17" height="98" /></td>
												</tr>
												<tr>
												<td width="16" align="left" valign="top"><img src="'.SITE_URL.'/images/v-left.jpg" width="16" height="98" /></td>
												<td height="98" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">
												<strong>Merchant Name:'.$merchant_name.'</strong> <br />
												Address: '.$merchant_address.'<br />
												Tel: '.$merchant_phone.'<br />
												Email Id: '.$merchant_email.'
												</td>
												<td width="17" align="right" valign="top"><img src="'.SITE_URL.'/images/v-right.jpg" width="17" height="98" /></td>
												</tr>
												<tr>
												<td colspan="4" align="left" valign="top"><img src="'.SITE_URL.'/images/v-bot.jpg" width="630" height="14" /></td>
												</tr>
											</table>
											<table width="630" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td align="left" valign="top">&nbsp;</td>
												</tr>
											</table>
											<table width="630" border="0" cellspacing="0" cellpadding="0">
												<tr>
												<td align="left" valign="top">
													<strong>Product details are follows:</strong><br />
													'.$prod_desc.'<br />
													Order Id:'.$arr_order_details['invoice'].' | '.$pay_to_merchant.'<br />
													Valid till '.$voucher_valid_date.'
												</td>
												</tr>
											</table>
											<table width="630" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td align="left" valign="top">&nbsp;</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>';
		}
		return array($subject,$output);
	}
	
	public function getTotalUsersSaving()
	{
		global $link;
		$total_saving = 999.00;
		
		$sql = "SELECT * FROM `tblcart` WHERE `cart_status` > '0' AND `order_id` > '0'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			while($row = mysql_fetch_array($result))
			{
				$prod_price = $row['prod_price'];
				$old_price = $row['old_price'];
				$save_price = $old_price - $prod_price; 
				$total_saving = $total_saving + $save_price;
			}	
		}
		
		$total_saving = number_format($total_saving,2,'.',',');
		
		return $total_saving;
	}
	
	public function getTotalBotBroughtNo($prod_id)
	{
		global $link;
		$total_no = 1;
		
		$sql = "SELECT * FROM `tblcart` WHERE `prod_id` = '".$prod_id."' AND `cart_status` > '0' AND `order_id` > '0'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$total_no = mysql_num_rows($result);
		}
		
		$arr_product_record = $this->getProductDetails($prod_id);
		$start_date = date('Y-m-d',strtotime($arr_product_record['start_time']));
		//echo '<br>start_date = '.$start_date;		
		$now = time(); // or your date as well
		$datediff = abs( $now - strtotime($start_date) );
		$total_days = floor($datediff/(60*60*24));
		//echo '<br>total_days = '.$total_days;
		if($total_days > 0)
		{
			for($i=0;$i<=$total_days;$i++)
			{
				$total_no = $total_no + $i;
			}	
		}
		
		return $total_no;
	}
	
	public function chkEmailSubscribedExists($sub_email)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tblsubscribedemails` WHERE `sub_email` = '".$sub_email."'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	public function chkEmailSubscribed($sub_email)
	{
		global $link;
		$return = false;
		
		$sql = "SELECT * FROM `tblsubscribedemails` WHERE `sub_email` = '".$sub_email."' AND `se_status` = '1'";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$return = true;
		}
		return $return;
	}
	
	public function doEmailSubscribed($sub_email)
	{
		global $link;
		$return = false;
		
		$sql = "INSERT INTO `tblsubscribedemails` (`sub_email`,`se_status`) VALUE ('".$sub_email."','1')";
		$result = mysql_query($sql,$link);
		if(($result))
		{
			$return = true;
		}
		return $return;
	}
	
	public function updateEmailSubscribed($sub_email,$se_status)
	{
		global $link;
		$return = false;
		
		$sql = "UPDATE `tblsubscribedemails` SET  `se_status` = '".$se_status."' WHERE `sub_email` = '".$sub_email."'";
		$result = mysql_query($sql,$link);
		if(($result))
		{
			$return = true;
		}
		return $return;
	}
	
	function getSCTOrderStatusOptions($cart_status)
	{
		$option_str = '';
		$arr_status = array("0" => "Order Received" , "1" => "Shipped" , "2" => "Cancelled" , "3" => "Declined" , "4" => "Refunded" , "5" => "Completed");
		
		foreach($arr_status as $i => $val)
		{
			if($i == $cart_status)
			{
				$sel = ' selected ';
			}
			else
			{
				$sel = '';
			}
			$option_str .= '<option value="'.$i.'" '.$sel.'>'.$val.'</option>';
		}
		return $option_str;
	}

	public function getSCTOrderStatus($cart_status)
	{
		if($cart_status == '')
		{
			$cart_status = 0;
		}
		
		$arr_status = array("0" => "Order Received" , "1" => "Shipped" , "2" => "Cancelled" , "3" => "Declined" , "4" => "Refunded" , "5" => "Completed");
		
		foreach($arr_status as $i => $val)
		{
			if($i == $cart_status)
			{
				$status = $val;
				break;
			}
		}		
		return $status;
	}
	
	public function getViewOrderDetailsCode($order_type,$order_id)
	{
		global $link;
		$output = '';
		
		if($order_type == 'SCT')
		{
			//$sql = "SELECT * FROM `tblcart` AS tc LEFT JOIN `tblorders` AS tord ON tc.invoice = tord.invoice WHERE tc.cart_id = '".$order_id."'";
			$sql = "SELECT * FROM `tblorders` WHERE `order_id` = '".$order_id."'";
			//echo $sql;
			$result = mysql_query($sql,$link);
			
			if( ($result) && (mysql_num_rows($result) > 0) )
			{
				$row = mysql_fetch_array($result);
				$output .= '<div style="padding:5px;width:920px; height:500px; overflow:scroll; ">
								<table align="center" border="0" width="900" cellpadding="1" cellspacing="0">';
				
				$output .= '		<tr>
										<td width="15%" height="30" align="left" valign="middle" ><strong>Order No:</strong></td>
										<td width="35%" height="30" align="left" valign="middle" >'.$order_id.'</td>
										<td width="5%" height="30" align="left" valign="middle" >&nbsp;</td>
										<td width="15%" height="30" align="left" valign="middle" ><strong>Invoice No:</strong></td>
										<td width="35%" height="30" align="left" valign="middle" >'.stripslashes($row['invoice']).'</td>
									</tr>
									<tr>
										<td height="30" align="left" valign="middle" colspan="2" ><strong>Billing Details</strong></td>
										<td height="30" align="left" valign="middle" >&nbsp;</td>
										<td height="30" align="left" valign="middle" colspan="2" ><strong>Shipping Details</strong></td>
									</tr>
									<tr>
										<td height="30" align="left" valign="middle" ><strong>Billing Name:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['billing_name']).'</td>
										<td height="30" align="left" valign="middle" >&nbsp;</td>
										<td height="30" align="left" valign="middle" ><strong>Shipping Name:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['buyer_name']).'</td>
									</tr>
									<tr>
										<td height="30" align="left" valign="middle" ><strong>Billing Address:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['billing_address']).'</td>
										<td height="30" align="left" valign="middle" >&nbsp;</td>
										<td height="30" align="left" valign="middle" ><strong>Shipping Address:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['buyer_address']).'</td>
									</tr>
									<tr>
										<td height="30" align="left" valign="middle" ><strong>Billing City:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['billing_city']).'</td>
										<td height="30" align="left" valign="middle" >&nbsp;</td>
										<td height="30" align="left" valign="middle" ><strong>Shipping City:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['buyer_city']).'</td>
									</tr>
									<tr>
										<td height="30" align="left" valign="middle" ><strong>Billing State:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['billing_state']).'</td>
										<td height="30" align="left" valign="middle" >&nbsp;</td>
										<td height="30" align="left" valign="middle" ><strong>Shipping State:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['buyer_state']).'</td>
									</tr>
									<tr>
										<td height="30" align="left" valign="middle" ><strong>Billing Country:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['billing_country']).'</td>
										<td height="30" align="left" valign="middle" >&nbsp;</td>
										<td height="30" align="left" valign="middle" ><strong>Shipping Country:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['buyer_country']).'</td>
									</tr>
									<tr>
										<td height="30" align="left" valign="middle" ><strong>Billing Pincode:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['billing_pincode']).'</td>
										<td height="30" align="left" valign="middle" >&nbsp;</td>
										<td height="30" align="left" valign="middle" ><strong>Shipping Pincode:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['buyer_pincode']).'</td>
									</tr>
									<tr>
										<td height="30" align="left" valign="middle" ><strong>Billing Phone:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['billing_phone_no']).'</td>
										<td height="30" align="left" valign="middle" >&nbsp;</td>
										<td height="30" align="left" valign="middle" ><strong>Shipping Phone:</strong></td>
										<td height="30" align="left" valign="middle" >'.stripslashes($row['buyer_phone']).'</td>
									</tr>';		
				
				
								
				
									
				$sub_total = number_format($row['sub_total'],2);
				$gst_amount = number_format($row['gst_amount'],2);
				$transaction_fees = number_format($row['transaction_fees'],2);
				$shipping_price = number_format($row['fright'],2);
				$total = number_format($row['total_amount'],2);
				$cart_status = $row['order_status'];
				$tracking_code = stripslashes($row['tracking_code']);
				$order_notes = stripslashes($row['order_notes']);								
									
				$output .= '		<tr>
										<td colspan="5" height="30" align="left" valign="middle" >
											<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
												<tr>
													<td height="30" colspan="5" align="left" valign="middle" bgcolor="#CCCCCC" style="padding-left:20px;"><strong>Item Details</strong></td>
												</tr>
												<tr>
													<td width="15%" height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:20px;"><strong>Item No.</strong></td>
													<td width="45%" height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:5px;"><strong>Item Discription </strong></td>
													<td width="5%" height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:5px;"><strong>Qty.</strong></td>
													<td width="20%" height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:5px;"><strong>Unit Price</strong></td>
													<td width="15%" height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:5px;"><strong>Total Price</strong></td>
												</tr>';
												
				$sql2 = "SELECT * FROM `tblcart` WHERE `order_id` = '".$order_id."'";
				//echo $sql;
				$result2 = mysql_query($sql2,$link);
				if( ($result2) && (mysql_num_rows($result2) > 0) )
				{
					$j = 1;
					while($row2 = mysql_fetch_array($result2))
					{								
												
						$output .= '			<tr>
													<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:20px;">'.$j.'</td>
													<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;">'.$this->getProductName($row2['prod_id']).'</td>
													<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;">'.$row2['prod_qty'].'</td>
													<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;">Rs '.$row2['amount'].'</td>
													<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;">Rs '.$row2['prod_sub_total'].'</td>
												</tr>';
						$j++;						
					}
				}								
												
				$output .= '				</table>
											<table width="100%" border="0" cellpadding="0" cellspacing="0">
												<tr>
													<td width="60%" height="30" align="left" valign="middle" bgcolor="#FFFFFF">
														<form action="#" name="frmUpdateOrder" id="frmUpdateOrder" method="post">
														<input type="hidden" name="hdncart_id" id="hdncart_id" value="'.$order_id.'">
														<table width="100%" border="0" cellpadding="0" cellspacing="0">
															<tr>
																<td width="25%" height="20" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;">&nbsp;</td>
																<td width="75%" height="20" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;">&nbsp;</td>
																
															</tr>
															<tr>
																<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;"><strong>Order Status:</strong></td>
																<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;">
																	<select name="cart_status" id="cart_status">
																	'.$this->getSCTOrderStatusOptions($cart_status).'
																	</select>
																</td>
															</tr>
															<tr>
																<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;"><strong>Tracking Code:</strong></td>
																<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;"><input type="input" name="tracking_code" id="tracking_code" style="width:250px;" value="'.$tracking_code.'"></td>
															</tr>
															<tr>
																<td height="30" align="left" valign="top" bgcolor="#FFFFFF" style="padding-left:5px;"><strong>Order Notes:</strong></td>
																<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;"><textarea name="order_notes" id="order_notes" style="width:250px; height:100px;" >'.$order_notes.'</textarea></td>
															</tr>
															<tr>
																<td height="30" align="left" valign="top" bgcolor="#FFFFFF" style="padding-left:5px;">&nbsp;</td>
																<td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;"><input type="button" name="btnUpdateOrder" id="btnUpdateOrder" value="Save" onclick="updateSCTOrder(\'SCT\');"></td>
															</tr>
														</table>
														</form>
													</td>
													<td width="5%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="padding-left:5px;">&nbsp;</td>
													<td width="35%" height="30" align="left" valign="top" bgcolor="#FFFFFF">
														<table width="100%" border="0" cellpadding="0" cellspacing="1">
															<tr>
																<td width="57%" height="20" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;">&nbsp;</td>
																<td width="43%" height="20" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left:5px;">&nbsp;</td>
															</tr>
															<tr>
																<td height="30" align="left" valign="middle" bgcolor="#CCCCCC" style="padding-left:5px;"><strong>Sub Total</strong></td>
																<td height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:5px;">Rs '.$sub_total.'</td>
															</tr>';
				
				$output .= '								<tr>
																<td height="30" align="left" valign="middle" bgcolor="#CCCCCC" style="padding-left:5px;"><strong>GST 10%</strong></td>
																<td height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:5px;">Rs '.$gst_amount.'</td>
															</tr>';
				/*											
				$output .= '								<tr>
																<td height="30" align="left" valign="middle" bgcolor="#CCCCCC" style="padding-left:5px;"><strong>Transaction Fees</strong></td>
																<td height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:5px;">Rs '.$transaction_fees.'</td>
															</tr>';
				*/											
				$output .= '								<tr>
																<td height="30" align="left" valign="middle" bgcolor="#CCCCCC" style="padding-left:5px;"><strong>Fright</strong></td>
																<td height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:5px;">Rs '.$shipping_price.'</td>
															</tr>
															<tr>
																<td height="30" align="left" valign="middle" bgcolor="#CCCCCC" style="padding-left:5px;"><strong>Total</strong></td>
																<td height="30" align="left" valign="middle" bgcolor="#E4E4E4" style="padding-left:5px;">Rs '.$total.'</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>';	
				$output .= '			</td>
									<tr>
								</table>
							</div>';
			}
		}
		
		return $output;
	}
	
	public function getProductName($prod_id)
	{
		global $link;
		$prod_name = '';
				
		$sql = "SELECT * FROM `tblproducts` WHERE `prod_id` = '".$prod_id."' ";
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			$row = mysql_fetch_array($result);
			$prod_name = stripslashes($row['prod_name']);
		}
		return $prod_name;
	}   
	
	public function getSideBarDealsCode()
	{
		global $link;
		$output = '';
		$chkDate = date('Y-m-d H:i:s');
		
		$arr_top_cat_id = array(8,9,10);
		
		for($i=0;$i<count($arr_top_cat_id);$i++)
		{
		
			$sql = "SELECT * FROM `tblproducts` WHERE `prod_deleted` = '0' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."' AND `top_cat_id` = '".$arr_top_cat_id[$i]."' ORDER BY rand() LIMIT 1";
			//echo '<br>'.$sql;
			$result = mysql_query($sql,$link);
			if( ($result) && (mysql_num_rows($result) > 0) )
			{
				while($row = mysql_fetch_array($result))
				{
					$deal_class = 'side_bar_deal';
					
					$old_price = $row['old_price'];
					$prod_price = $row['prod_price'];
					$you_save_price = $old_price - $prod_price;
					$save_percent = round(( $you_save_price * 100 ) / $old_price);
					$photo_add = $row['photo'];
					
					if($photo_add != '')
					{
						$arr_pif_id = explode(',',$photo_add);
						if($arr_pif_id[0] != '')
						{
							$temp_image = $this->getProductImageDetails($arr_pif_id[0]);
							$mysock1 = @getimagesize(SITE_PATH.'/uploads/'.$temp_image);
							$photo_width1 = $mysock1[0];
							$photo_height1 = $mysock1[1];
							
							if($photo_width1 == '')
							{
								$photo_width1 = '210';
							}
							
							if($photo_height1 == '')
							{
								$photo_height1 = '140';
							}	
							list($new_width1 , $new_height1) = $this->imageResize($photo_width1, $photo_height1, 210);
							$img_str = '<img border="0" width="'.$new_width1.'" height="'.$new_height1.'" src="'.SITE_URL.'/uploads/'.$temp_image.'" title="" alt="" />';
						}	
						else
						{
							$img_str = '<img border="0" width="210" height="140" src="'.SITE_URL.'/uploads/ina.jpg" title="" alt="" />';
						}	
					}	
					else
					{
						$img_str = '<img border="0" width="210" height="140" src="'.SITE_URL.'/uploads/ina.jpg" title="" alt="" />';
					}		
						
					
			$output .= '<div class="'.$deal_class.'">
							<div class="dealtitle-wrap" >
								<h1 class="dealtitle cufon" ><a href="'.SITE_URL.'/'.$row['prod_url'].'" style="color:#fff">'.$row['prod_name'].'</a></h1>
							</div>
							<div class="pastdealimage_sidebar">
								<a href="'.SITE_URL.'/'.$row['prod_url'].'">'.$img_str.'</a>
							</div>
							<div class="pastdealfooter_sidebar">
								<a href="'.SITE_URL.'/'.$row['prod_url'].'" class="pastdeal_orange_sidedeal cufon">View Deal</a>
								<div class="saved">
									<span class="cufon label">Actual Price:</span>
									<span class="cufon number">Rs '.$old_price.'</span>
								</div>
								<div class="price" >
									<span class="cufon label">Discount:</span>
									<span class="cufon number">'.$save_percent.'%</span>
									
								</div>
								<div class="saved">
									<span class="cufon label">You Pay:</span>
									<span class="cufon number">Rs '.$prod_price.'</span>
								</div>
							</div>
						</div>';
				}
				$output .= '<div class="clear"></div>';
			}
		}	
		return $output;
	}
	
	public function getAllsearchResultDeals()
	{
		global $link;
		$output = '';
		$chkDate = date('Y-m-d H:i:s');
		
		
		$sql = "SELECT * FROM `tblproducts` WHERE `prod_deleted` = '0' AND `prod_status` = '1' AND `start_time` <= '".$chkDate."' AND `end_time` >= '".$chkDate."' ORDER BY prod_name ASC";
		//echo '<br>'.$sql;
		$result = mysql_query($sql,$link);
		if( ($result) && (mysql_num_rows($result) > 0) )
		{
			//$output = '{';
			while($row = mysql_fetch_array($result))
			{
				$prod_name = $row['prod_name'];
				$prod_url = SITE_URL.'/'.$row['prod_url'];
				
				$output .= '{value: "'.$prod_name.'",label: "'.$prod_name.'",url: "'.$prod_url.'"},';
			}
			$output = substr($output,0,-1);
			//$output .= '}';
		}	
		else
		{
			$output = '{}';
		}	
		return $output;
	}
}
?>