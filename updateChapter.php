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

	$cid=$_GET['id'];
	$getChapter=$obj->getChapterById($cid);

?>

<?php


if(isset($_POST['submit']))
{ 

	if(isset($_POST['chapter']) && !empty($_POST['chapter']) && isset($_POST['chap_id']) && !empty($_POST['chap_id']))
	{  
		$chap=$_POST['chapter'];
		$chap_id=$_POST['chap_id'];
		
		$sql="update `tbl_chapters` set `chapter_name`='".$chap."' where `chap_id`='$chap_id'";
		$result=$obj->updateSubject($sql);

	   if($result)
	   {
			echo "<script>alert('Successfully Updated')</script>";
			$getChapter=$obj->getChapterById($cid);
	   }
	   else
	   {
		   //header("Location: updateQuestion.php?id=".$qid);
		   echo "<script>alert('Failed')</script>";
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
										<strong>Update Chapter</strong>
									</div>
									<div class="col-md-1">
										<a data-toggle="collapse" data-parent="userPanel" href="#userBody">
											<span class="glyphicon glyphicon-chevron-down"></span>
										</a>
									</div>
								</div>
							</div>
						<div id="userBody" class="panel-collaps collapse in">

							<div class="panel-body">
								
								


								<form method="POST" action="#">


							</br>
							<div class="col-md-6">
								<input type="hidden" name="chap_id" value="<?php echo $cid;?>">
								<input type="text" class="form-control" id="usr" name="chapter" placeholder="Update Chapter" value="<?php if(isset($getChapter) && !empty($getChapter)){ print $getChapter['chapter_name']; }else{}?>" required>
							</div>

							<INPUT type="submit" class="btn btn-primary" name="submit" id="updateChap" value="Update Chapter">
							</form>






						</div><!--/col-->
					</div><!--/row-->

				</div><!--/col-span-9-->
			</div>
			

			
		<!-- /Main -->


	
</div>

		
	</div>
	
	<script src="js/jquery-1.7.2.min.js"></script> 

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

	  $('#updateChap').click(function(){
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
		});
    });
  </script>
	
	
	<div style="margin-top:500px">
		<?php include_once('includes/footer.php');  ?>
	</div>

</body>
</html>