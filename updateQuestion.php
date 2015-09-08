<?php 
include_once('classes/config.php');
include_once('classes/admin.php');

$obj= new Admin();
$error=false;
$err_msg_start = '<div class="alert">
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
	
	$qid=$_GET['id'];
	$getQuestion=$obj->getQuestionById($qid);

	if(isset($_POST['submit']))
	{
		$que  = $_POST['que'];
		$opt1  = $_POST['opt1'];
		$opt2   =  $_POST['opt2'];
		$opt3   = $_POST['opt3'];
		$opt4  = $_POST['opt4']; 
		$category = $_POST['category']; 
		
		$ans1=$_POST['ans1'];
		$ans2=$_POST['ans2'];
		$ans3=$_POST['ans3'];
		$ans4=$_POST['ans4'];
		
		if(isset($ans1) && !empty($ans1))
		{
			$ans=$ans1;
		}
		else if(isset($ans2) && !empty($ans2))
		{
			$ans=$ans2;
		}
		else if(isset($ans3) && !empty($ans3))
		{
			$ans=$ans3;
		}
		else if(isset($ans4) && !empty($ans4))
		{
			$ans=$ans4;
		}
		else
		{
			$ans='';
		}
		
		$id=$_POST['qid'];
		
		$sql="update `questions` set `question`='$que',a='$opt1',b='$opt2',c='$opt3',d='$opt4',`ans`='$ans',`level`='$category',  `time_stamp`=NOW() where `q_id`='$qid'";
		
		//print_r($sql);die;
		
		
		$result=$obj->updateQuestion($sql);

	   if($result)
	   {
			echo "<script>alert('Successfully Updated')</script>";
			$getQuestion=$obj->getQuestionById($qid);
	   }
	   else
	   {
		   //header("Location: updateQuestion.php?id=".$qid);
		   echo "<script>alert('Failed')</script>";
	   }
	   
	}


	?>

	<!DOCTYPE <!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title>Admin Dashboard </title>


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/style1.css" type="text/css">

		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
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
				<!-- <ul class="list-inline pull-right">
					<li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span> Add User</a></li>
				</ul> -->
				<a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> School Admin </strong></a>

				<hr>

				<div class="row">
					<!-- center left-->
					<div class="col-md-12">
						<div class="panel panel-default panel-condensed" id="userPanel">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-11">
										<strong>Update Question</strong>
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
									<?php 
									
									?>
									<form method="post" action="#" name="frmquiz" id="frmquiz" enctype="multipart/form-data">
										<input type="hidden" name="qid" value="<?php echo $qid;?>">
										<div class="form-group">
											<p><strong>Question:</strong></p>
											<textarea class="form-control" rows="2" id="comment" name="que"><?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['question']; }else{}?></textarea>
										</div>
									</br>
									<!--options-->
									<strong>Options:</strong><p></p>

									<div>
										<div>
											
											<?php if(isset($getQuestion) && !empty($getQuestion) && $getQuestion['a']==$getQuestion['ans']){?>
											<input type="checkbox" name="ans1" class="ans1" checked="checked" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['a']; }else{}?>"/><?php }else {?><input type="checkbox" name="ans1" class="ans1" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['a']; }else{}?>"/><?php }?>
											<input type="text" name="opt1" id="opt1" size="30" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['a']; }else{}?>"></br> <p></p>
											
											<?php if(isset($getQuestion) && !empty($getQuestion) && $getQuestion['b']==$getQuestion['ans']){?>
											<input type="checkbox" name="ans2" class="ans2" checked="checked" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['b']; }else{}?>"/><?php }else {?><input type="checkbox" name="ans2" class="ans2" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['b']; }else{}?>"/><?php }?>
											<input type="text" name="opt2" id="opt2" size="30" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['b']; }else{}?>"></br> <p></p>
											
											<?php if(isset($getQuestion) && !empty($getQuestion) && $getQuestion['c']==$getQuestion['ans']){?>
											<input type="checkbox" name="ans3" class="ans3" checked="checked" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['c']; }else{}?>"/><?php }else {?><input type="checkbox" name="ans3" class="ans3" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['c']; }else{}?>"/><?php }?>
											<input type="text" name="opt3" id="opt3" size="30" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['c']; }else{}?>"></br> <p></p>
											
											<?php if(isset($getQuestion) && !empty($getQuestion) && $getQuestion['d']==$getQuestion['ans']){?>
											<input type="checkbox" name="ans4" class="ans4" checked="checked" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['d']; }else{}?>"/><?php }else {?><input type="checkbox" name="ans4" class="ans4" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['d']; }else{}?>"/><?php }?>
											<input type="text" name="opt4" id="opt4" size="30" value="<?php if(isset($getQuestion) && !empty($getQuestion)){ print $getQuestion['d']; }else{}?>"></br> <p></p> 	
										</div>
									</div> 
									<strong>Level:</strong><p></p>
									<div class="col-md-2">
										<select class="form-control" name="category" id="category">
											<option defualt value="0">Select Category</option>
											<?php if(isset($getQuestion) && !empty($getQuestion) && $getQuestion['level']=='S'){?>
											<option value="S" Selected="selected">Simple</option><?php }else{?><option value="S">Simple</option><?php }?>
											<?php if(isset($getQuestion) && !empty($getQuestion) && $getQuestion['level']=='M'){?>
											<option value="M" Selected="selected">Medium</option><?php }else{?><option value="M">Medium</option><?php }?>
											<?php if(isset($getQuestion) && !empty($getQuestion) && $getQuestion['level']=='H'){?>
											<option value="H" Selected="selected">High</option><?php }else{?><option value="H">High</option><?php }?>
										</select>
									</div>
									<!--options-->

									<div class="text-center">
										<input type="submit" class="btn btn-primary" name="submit" id="submit">
										<button type="button" class="btn btn-danger" onClick="document.location.href='/learnQuick_admin/my_questions.php';">Cancel</button>
									</div>

								</form>







							</div><!--/panel-body-->
						</div>
					</div><!--/panel-->



				</div><!--/col-->
			</div><!--/row-->

		</div>	 
	</div>

	<!-- /Main -->

	<?php include_once('includes/footer.php');  ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script src="js/jquery-1.7.2.min.js"></script> 

<script src="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$('#submit').click(function()
		{	
			var quest = $('textarea#comment').val();
			

			if(quest!='')
			{
				var n = $( "input:checked" ).length;
				if(n!=1)
				{
					alert("Please Select the Answer!");
					return false;
				}
				else
				{
					$(this).submit();
					/*
					if($('.ans1').is(":checked"))
					{
						var ans = $('#opt1').val();
					}else if($('.ans2').is(":checked"))
					{
						var ans = $('#opt2').val();
					}else if($('.ans3').is(":checked"))
					{
						var ans = $('#opt3').val();
					}else if($('.ans4').is(":checked"))
					{
						var ans = $('#opt4').val();
					}


					var datastring=$('#frmquiz').serialize()+'&ans='+ans;
					alert(datastring);
							$.ajax({
									type:"POST",
									url:"ajax.php?action=UpdateQuestions",
									data: datastring,
									success:function(html){
										return false;
										window.location.href="updateQuestion.php?id=<?php echo $qid;?>";
									}

								});*/

				}
			}
			else
			{
				alert("Please Enter Question!");
				return false;
			}
		 			
		});
});	 
</script>

</body>
</html>