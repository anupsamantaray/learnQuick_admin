<?php 
include_once('classes/config.php');
include_once('classes/admin.php');
$obj= new Admin();
$error=false;
$err_msg_start = '<div class="alert" style="background-color:red;">
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
                                     <!--Add Chapter-->
									 
<?php

if(isset($_POST['submit2']))
{

  if(!empty($_POST['subject1']))
   {  
       $chapter=$_POST['chapter'];
     
       $selected_Sub_id = $_POST['subject1'];
       
	   $checkResult=$obj->checkChapterName($chapter,$selected_Sub_id);
	  if(!$checkResult)
	  {
	   $sqlch="insert into `tbl_chapters` values('','$selected_Sub_id ','$chapter')";
	   
	   $stmtch=mysql_query($sqlch,$link);

		if($stmtch)
		{
			$error = false;
			$msg = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Chapter Added Successfully!</strong></div>';
		}
		else
		{
			$error = true;
			$err_msg=$err_msg_start."Something went wrong. Please try again after some time.".$err_msg_end;
		}
	  }
	  else
	  {
		   echo "<script>alert('Chapter Already Exists')</script>";
	  }
	}
}
?>								 
									 <!--End Add Chapter-->
							 
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
	<div class="container-fluid" style="margin-top:0px;background-color:#3E3B3C">
		<div class="row" style="margin-top: 65px;">
			<div class="col-md-2">
				<!-- Left column -->
				<?php  include_once('includes/side_nav.php'); ?>
			</div><!-- /col-3 -->
					
			<div class="col-md-10">

					<!-- column 2 -->
					
					
	</br>

					<hr>
				<div class="row" style="    width: 1110	px;margin-left: -0.1px;">
						<!-- center left-->
						
		
		
														<!-- ADD Chapter -->
		
					<div class="row">
						<!-- center left-->
						<div class="col-md-12">
							<div class="panel panel-default panel-condensed" id="userPane" style="width: 1109;">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-11">
											<a href="#"><strong><i class="glyphicon glyphicon-book"></i> Add Chapter</strong></a>
										</div>
										
									</div>
								</div>
								<div id="userBody" class="panel-collaps collapse in">
									
									<div class="panel-body">
			<!-- Standard list-->
										<?php 
									if(!$error) {
										echo $msg;
									   }else if($error){
										echo $err_msg;
									   } 
										?>
										<form method="POST" action="#">


											<div class="col-md-3">
												<select class="form-control standard1" name="standard1" id="standard1">
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
											</br></br></br>
											<div class="col-md-3">
											<select class="form-control subject1" name="subject1" id="subject1">
											<option defualt value=0>Select Subject</option>
											</select>
											</div>


											<div class="col-md-3">
											 <input type="text" class="form-control" id="usr" name="chapter" placeholder="Add Chapter">
											</div>


											<INPUT type="submit" class="btn btn-primary" name="submit2" value="Add Chapter" id="adChap"></button>
										</form>
									</div><!--/col-->
								</div><!--/row-->
							</div><!--/col-span-9-->
						</div>
					</div>                                       <!--End of ADD Chapter -->

		<!-- /Main -->
			
				</div>
			</div>
		</div>
	</div>
	<?php include_once('includes/footer.php');  ?>
<script type="text/javascript">
	$(document).ready(function(){
		
		 $('#adChap').click(function()
		{
			var standard = $('#standard1').val();
			var subject = $('#subject1').val();
			
           if(standard != '0') 
			{
				if(subject != '0')
				{
					var usr = $('#usr').val().trim().length;
					if(usr > 0) 
					{
						return true;	
					}
					else
					{
						alert("Please Enter Proper Chapter Name!");
						$('#usr').val("");
						return false;
					}
				}
				else
				{
					alert("Please Select Subject.");
					return false;
				}
					
			}
			else
			{
				alert("Please Select Standard.");
				return false;
			}
		});
		
		
		$(".standard1").change(function(){
			//$(".subject").show();
			var id = $(this).val();
			var dataString = 'id='+ id;
			$.ajax({
				type: "POST",
				url:"ajax.php?action=changeSubject",
				data: dataString,
				cache: false,
				success: function(html){
					$(".subject1").html(html);
				}

			});

		});

	});
</script>

</body>
</html>