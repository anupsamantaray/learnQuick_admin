<?php
require_once('classes/config.php');
require_once('classes/admin.php');

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
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>';
					  
$err_msg_end = '</strong></div>';					  

if(isset($_POST['btnSubmit']))
{
	$opassword = strip_tags(trim($_POST['opassword']));
	$npassword = strip_tags(trim($_POST['npassword']));
	$cpassword = strip_tags(trim($_POST['cpassword']));
	
	if($opassword == '')
	{
		$error = true;
		$err_msg = $err_msg_start.'Please enter current password'.$err_msg_end;
	}
	elseif(!$obj->chkValidAdminCurrentPassword($opassword,$admin_id))
	{
		$error = true;
		$err_msg = $err_msg_start.'Please enter correct current password'.$err_msg_end;
	}
		
	if($npassword == '')
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please enter new password'.$err_msg_end;
	}
		
	if($cpassword == '')
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please enter confirm password'.$err_msg_end;
	}
	elseif($cpassword != $npassword  )
	{
		$error = true;
		$err_msg .= $err_msg_start.'Please enter same confirm password'.$err_msg_end;
	}
	
	if(!$error)
	{
		
		if($obj->updateAdminPassword($admin_id,$npassword))
		{
			$msg = '<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Password Updated Successfully!</strong>
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

<body>
    <!-- header -->
    <div class="cotainer" style="width:100%;margin:0px;">
        <?php  include_once('includes/header.php'); ?>
    </div>
    <!-- /Header -->

    <!-- Main -->
    <div class="container-fluid" style="margin-top:0px;" >
        <div class="row" style="margin-top: 65px;">
            <div class="col-md-2">
                <!-- Left column -->
                <ul class="list-unstyled">
                    <li class="nav-header">
                        <ul class="list-unstyled collapse in" id="userMenu">
                            <li><a href="#"><i class="glyphicon glyphicon-user"></i> My School Admin</a></li>
                            <li class="active"><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Admin</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Prof Dev</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-inbox"></i> Reporting</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /col-3 -->
            <div class="col-md-10">

                <!-- column 2 -->
                <h2>Admin Profile</h2>
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
                                        <p class="err_msg"><?php echo $err_msg;?><br /><br /></p>
                                        <div class="clear"></div>
                                    <?php
                                    } ?>  
                                    <form action="#" method="post" name="frmeditsalesuser" id="frmeditsalesuser" enctype="multipart/form-data" >
                                    <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" id="id-form">
                                    <tbody>
                                        <tr>
                                            <td width="20%" align="right"><strong>Current Password</strong></td>
                                            <td width="5%" align="center"><strong>:</strong></td>
                                            <td width="75%" align="left"><input name="opassword" class="span4 form-control" type="password" id="opassword" value="" style="width:200px;" ></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="right"><strong>New Password</strong></td>
                                            <td align="center"><strong>:</strong></td>
                                            <td align="left"><input name="npassword" class="form-control" type="password" id="npassword" value="" style="width:200px;" ></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td align="right"><strong>Confirm New Password</strong></td>
                                            <td align="center"><strong>:</strong></td>
                                            <td align="left"><input name="cpassword" class="span4 form-control" type="password" id="cpassword" value="" style="width:200px;" ></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td align="left"><input type="Submit" name="btnSubmit" value="Submit" class="btn btn-success" /></td>
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