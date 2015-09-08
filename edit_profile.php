<?php
require_once('classes/config.php');
require_once('classes/admin.php');
require_once('classes/commonFunctions.php');
 
$obj = new Admin();
$obj2 = new commonFunctions();
 
if(!$obj->isAdminLoggedIn())
{
	header("Location: login.php");
	exit(0);
}
else
{
	$admin_id = $_SESSION['admin_id'];
}

$error = false;
$err_msg = "";
$msg = '';

$err_msg_start = '<div class="alert">
					  <button type="button" class="close btn-warning" data-dismiss="alert">&times;</button>
					  <strong>';
					  
$err_msg_end = '</strong></div>';					  

if(isset($_POST['btnSubmit']))
{
	$username = strip_tags(trim($_POST['username']));
	$email = trim($_POST['email']);
	$fname = strip_tags(trim($_POST['fname']));
	$lname = strip_tags(trim($_POST['lname']));
	$bday = trim($_POST['bday']);
	$bmonth = trim($_POST['bmonth']);
	$byear = trim($_POST['byear']);
    $gender = trim($_POST['gender']);
	$address = trim($_POST['address']);
	$contact_no = trim($_POST['contact_no']);
	
	if($username == '')
	{
		$error = true;
		$err_msg = $err_msg_start.'Please Enter Username'.$err_msg_end;
	}
	elseif(!preg_match("/^[a-zA-Z0-9\.\_]+$/",$username)  )
	{
		$error = true;
		$err_msg = $err_msg_start.'Please Enter Valid Username[a-z,0-9,.,_]'.$err_msg_end;
	}
	elseif($obj->chkAdminUsernameExists_edit($username,$admin_id))
	{
		$error = true;
		$err_msg = $err_msg_start.'This Username Already Exists'.$err_msg_end;
	}
	
	
	
	if($email == '')
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please Enter Email'.$err_msg_end;
	}
	elseif(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please Enter Valid Email'.$err_msg_end;
	}
	elseif($obj->chkAdminEmailExists_edit($email,$admin_id))
	{
		$error = true;
		$err_msg .= $err_msg_start.'This Email Already Exists'.$err_msg_end;
	}
	
	
	if($fname == '')
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please Enter First Name'.$err_msg_end;
	}
	elseif(!preg_match("/^[a-zA-Z\'\ ]+$/",$fname)  )
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please Enter Valid First Name'.$err_msg_end;
	}
	
	if($lname == '')
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please Enter Last Name'.$err_msg_end;
	}
	elseif(!preg_match("/^[a-zA-Z\'\ ]+$/",$lname)  )
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please Enter Valid Last Name'.$err_msg_end;
	}
	
	if($bmonth == '' || $bday == '' || $byear == '') 
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please Select Valid date'.$err_msg_end;
	}
	elseif(!checkdate($bmonth,$bday,$byear) )
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please Select Valid date'.$err_msg_end;
	}
	else
	{
		$dob = $bday.'-'.$bmonth.'-'.$byear;
	}
 
	
	if($contact_no != '')
	{
		if( ( !is_numeric($contact_no) ) || ( strlen($contact_no) != 10 ) )
		{
			$error = true;
			$err_msg .= $err_msg_start.'Please Enter Valid 10 digits numbers only'.$err_msg_end;
		}
		elseif(!preg_match("/^[0-9]+$/",$contact_no)  )
		{
			$error = true;
			$err_msg .= $err_msg_start.'Please Enter Valid 10 digits numbers only'.$err_msg_end;
		}
	}	
	
	if($address == '')
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please Enter Address'.$err_msg_end;
	}
	
	if(!$error)
	{
		
		if($obj->updateAdminUser($admin_id,$username,$email,$fname,$lname,$dob,$gender,$address,$contact_no))
		{
			$msg = '<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Record Updated Successfully!</strong>
					</div>';
			//header('location: index.php');
		}
		else
		{
			$error = true;
			$err_msg = $err_msg_start."Currently there is some problem.Please try again later.".$err_msg_end;
		}
	}
}
else
{
	list($return,$username,$email,$fname,$lname,$dob,$country,$state,$city,$contact_no,$address,$status,$admin_group_id) = $obj->getAdminUserDetails($admin_id);
	if($dob != '')
	{
		$temp = explode("-",$dob);
		$bday = $temp[2];
		$bmonth = $temp[1];
		$byear = $temp[0];
	}
}	
?>


<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Dashboard </title>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/style1.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>

<body color:red>
	<!-- header -->
	<div class="cotainer" style="width:100%;margin:0px;">
		<?php  include_once('includes/header.php'); ?>
	</div>
	<!-- /Header -->

	<!-- Main -->
	
		

	</div>
	<div class="container-fluid" style="margin-top:0px;background-color:#3E3B3C;">
		<div class="row" style="margin-top: 65px;">
			<div class="col-md-2" >
				<!-- Left column -->
				<?php  include_once('includes/side_nav.php'); ?>
			</div><!-- /col-3 -->
			<div class="col-md-10">

				<!-- column 2 -->
				
				<a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> School Admin </strong></a>

				<hr>

				
				<!-- panel starts here -->

				<div class="panel panel-default">

					<div class="panel-heading custom_class" style="background-color:#FC563B; ">
						<h2 class="panel-title">Update Admin Profile </h2>
					</div>
					<div class="panel-body"> 
					

					 
                                    <?php
									if($msg != '')
									{ ?>
										<p class=""><?php echo $msg;?></p>
									<?php
									} ?>  
                                    <?php
									if($error)
									{ ?>
										 <?php echo $err_msg;?><br /><br />  
										 
									<?php
									} ?>  
									<div class="jumbotron" style="margin-top:0px;">
                                    <form action="#" method="post" class="form-horizontal" role="form"   enctype="multipart/form-data" >
                                    <table align="center" width="100%" class="table-responsive" border="0"   cellpadding="0" cellspacing="0" id="id-form">
                                    <tbody>
                                        <tr>
                                            <td width="20%" align="right"><strong>Username</strong></td>
                                            <td width="5%" align="center"><strong>:</strong></td>
                                            <td width="75%" align="left"><input name="username" class="form-control" type="text" id="username" value="<?php echo $username; ?>" style="width:200px;" ></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" align="right"><strong>Email</strong></td>
                                            <td width="5%" align="center"><strong>:</strong></td>
                                            <td width="75%" align="left">
                                                <input name="email" id="email" class="form-control" type="text" value="<?php echo $email;?>" style="width:200px;"  />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" align="right"><strong>First Name</strong></td>
                                            <td width="5%" align="center"><strong>:</strong></td>
                                            <td width="75%" align="left">
                                                <input name="fname" id="fname" class="form-control" type="text" value="<?php echo $fname;?>" style="width:200px;"  />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" align="right"><strong>Last Name</strong></td>
                                            <td width="5%" align="center"><strong>:</strong></td>
                                            <td width="75%" align="left">
                                                <input name="lname" id="lname" class="form-control" type="text" value="<?php echo $lname;?>" style="width:200px;"  />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" align="right"><strong>Gender</strong></td>
                                            <td width="5%" align="center"><strong>:</strong></td>
                                            <td width="75%" align="left">
                                                <input name="gender" id="gender" class="form-control" type="radio" value="M" style="width:20px;" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'M') echo ' checked="checked"';?> required />Male &nbsp;&nbsp;&nbsp;
                                                <input name="gender" id="gender" class="form-control" type="radio" value="F" style="width:20px;"  required/>Female
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" align="right" valign="top"><strong>DOB</strong></td>
                                            <td width="5%" align="center" valign="top"><strong>:</strong></td>
                                            <td width="75%" align="left">
                                                <select name="bday" id="bday" class="styledselect-day">
                                                    <option value="">Day</option>
                                                <?php
                                                for($i=1;$i<=31;$i++)
                                                { ?>
                                                    <option value="<?php echo $i;?>" <?php if($i == $bday) {?> selected="selected" <?php } ?>><?php echo $i;?></option>	
                                                <?php
                                                } ?>	
                                                </select>
                                                <select name="bmonth" id="bmonth" class="styledselect-month">
                                                    <option value="">Month</option>
                                                    <?php echo $obj2->getMonthOptions($bmonth); ?>
                                                </select>
                                                <select name="byear" id="byear" class="styledselect-year">
                                                    <option value="">Year</option>
                                                <?php
                                                for($i=2000;$i>=1950;$i--)
                                                { ?>
                                                    <option value="<?php echo $i;?>" <?php if($i == $byear) {?> selected="selected" <?php } ?>><?php echo $i;?></option>	
                                                <?php
                                                } ?>	
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" align="right"><strong>Address</strong></td>
                                            <td width="5%" align="center"><strong>:</strong></td>
                                            <td width="75%" align="left">
                                                <textarea name="address" id="address" class="form-control" rows="5" style="width:300px;" ><?php echo $address;?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td align="left"><input type="Submit" name="btnSubmit" class=" btn btn-success" value="Submit" class="form-submit" /></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    </form>
                               
						 
						 
	</div>
	<!--div class table responsive ends here -->
</div>
<!-- panel body ends here -->
</div>
<!-- panel ends here -->	
</div>



				</div><!--/col-->
			</div><!--/row-->

		</div><!--/col-span-9-->
	</div>

	<!-- /Main -->

	<?php include_once('includes/footer.php');  ?>

	<div class="modal" id="addWidgetModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Add User</h4>
				</div>
				<div class="modal-body">

					 




				</div>
				<div class="modal-footer">
					<a href="#" data-dismiss="modal" class="btn btn-danger">Cancel</a>
					<a href="#" class="btn btn-primary">Save User</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dalog -->
	</div><!-- /.modal -->
</div>
 
     

</body>
</html>