<?php 
include_once('classes/config.php');
include_once('classes/admin.php');
$obj= new Admin();
$error=false;
$err_msg_start = '<div class="alert" style="background-color:red;text-color:white;">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>';
                      
$err_msg_end = '</strong></div>'; 

if(!$obj->isAdminLoggedIn())
{
	header("Location: login.php");
	exit(0);
} 
else
{
	$admin_id = $_SESSION['admin_id'];
}



?>

<?php


if(isset($_GET['submit']))
{ 
	$selected_val = $_GET['standard']; 



	if(!empty($_GET['subject']) && !empty($selected_val))
	{  
		$sub=$_GET['subject'];
		
		$sql="select * from `tbl_subjects` where `subject_name` ='".$sub."' AND `standard`='".$selected_val."'";

		$stmt=mysql_query($sql,$link);

		if(mysql_num_rows($stmt)>0)	  
		{
			$error = true;
			$err_msg=$err_msg_start."Subject Already Exists".$err_msg_end;
		}

		else
		{

			$sqlqq="insert into `tbl_subjects` values('','$selected_val','$sub')";
			
			$stmtqq=mysql_query($sqlqq,$link);
			if($stmtqq)
			{
				$error = false;
				$msg = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Subject Added Successfully!</strong></div>';
			}

		}
	}


	else
	{
		//echo "Select standard and Enter Subject.";

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
	<div class="container-fluid" style="margin-top:0px;background-color:#3E3B3C;" >
		<div class="row" style="margin-top: 65px;">
			<div class="col-md-2">
				<!-- Left column -->
				<?php  include_once('includes/side_nav.php'); ?>
			</div><!-- /col-3 -->
			<div class="col-md-10">

				<!-- column 2 -->
				
			</br>

			<hr>
			<div class="row">
				<!-- center left-->
				<div class="col-md-12">
					<div class="panel panel-default panel-condensed" id="userPane">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-11">
									<a href="#"><strong><i class="glyphicon glyphicon-book"></i> Add Subject </strong></a>
								</div>

							</div>
						</div>
						<div id="userBody" class="panel-collaps collapse in">

							<div class="panel-body">
								
								<?php 
								if(!$error) {
									echo $msg;
								   }else if($error){
								   	echo $err_msg;
								   } 
									?>
								<!-- standard list in subject-->


								<form method="GET" action="#">


									<div class="col-md-3">
										<select class="form-control standard" name="standard" id="standard1">
											<option defualt value=0>Select standard</option>
											<?php
											$data=$obj->getAllStandard();
											if(count($data) > 0)
											{
												$i=1;
												foreach ($data as $key => $value) {
													?>
													<option value="<?php echo $value['standard_id']; ?>"><?php echo $value['standard']; ?></option>
													<?php
													$i++;	 
												}
											}

											?>



										</select>


									</div>
								</br></br>
							</br>
							<div class="col-md-3">
								<input type="text" class="form-control" id="usr" name="subject" placeholder="Add Subject">
							</div>

							<INPUT type="submit" class="btn btn-primary" name="submit" value="Add Subject" id="submit1">
							</form>






						</div><!--/col-->
					</div><!--/row-->

				</div><!--/col-span-9-->
			</div>
			

			
		<!-- /Main -->


	
</div>

		
	</div>
	<div style="margin-top:500px">
		<?php include_once('includes/footer.php');  ?>
	</div>
<script src="js/jquery-1.7.2.min.js"></script> 

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

	  $('#submit1').click(function()
		{
			var standard = $('#standard1').val();
			
           if(standard != '0') 
			{	
				var usr = $('#usr').val().trim().length;
				if(usr > 0) 
				{
					return true;	
				}
				else
				{
					alert("Please Enter Proper Subject Name!");
					$('#usr').val("");
					return false;
				}
			}
			else
			{
				alert("Please Select Standard.");
				return false;
			}	
		});
    });
  </script>
</body>
</html>