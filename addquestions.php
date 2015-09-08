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

	if(isset($_POST['submit']))
	{
		$opt1  = $_POST['opt1'];
		$opt2   =  $_POST['opt2'];
		$opt3   = $_POST['opt3'];
		$opt4  = $_POST['opt4']; 
		$ans=$_POST['ans'];
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
										<strong>Add Questions</strong>
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
									if(!$error) {
										echo $msg;
									}else{
										echo $err_msg;
									} 
									?>
									<form method="post" action="#" name="frmquiz" id="frmquiz" enctype="multipart/form-data">

										<div class="controls" style="line-height: 18px;">
											<div class="row">

												<div class="col-md-3">
													<select class="form-control standard" name="standard" id="standard">
														<option defualt value="0">Select standard</option>
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

												<div class="col-md-3">
													<select class="form-control subject" name="subject" id="subject" style="display:none;">
														<option defualt value="0">Select subject</option>
													</select>
												</div>

												<div class="col-md-3">
													<select class="form-control chapter" name="chapter" id="chapter" style="display:none;">
														<option defualt value="0">Select chapters</option>
													</select>
												</div>

												<div class="col-md-3">
													<select class="form-control" name="category" id="category" style="display:none;">
														<option defualt value="0">Select Category</option>
														<option value="S">Simple</option>
														<option value="M">Medium</option>
														<option value="H">High</option>
													</select>
												</div>

											</div>
										</div></br>
										<div class="form-group">
											<p><strong>Question:</strong></p>
											<textarea class="form-control" rows="2" id="comment" name="que"></textarea>
										</div>
									</br>
									<!--options-->
									<strong>Options:</strong><p></p>

									<div>
										<div>
											<input type="radio" name="ans" class="ans1"  value="opt1"/> <input type="text" name="opt1" id="opt1" size="30"></br> <p></p>
											<input type="radio" name="ans" class="ans2" value="opt2"/> <input type="text" name="opt2" id="opt2" size="30"></br> <p></p>
											<input type="radio" name="ans" class="ans3" value="opt3"/> <input type="text" name="opt3" id="opt3" size="30"></br> <p></p>
											<input type="radio" name="ans" class="ans4" value="opt4"/> <input type="text" name="opt4" id="opt4" size="30"></br> <p></p> 	
										</div>
									</div>   
									<!--options-->

									<div class="text-center">
										<input type="submit" class="btn btn-primary" name="submit" id="submit"></button>
										<a href="uploadContent.php"><button type="submit" class="btn btn-danger">Cancel</button></a>
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
		
		
		$(".standard").change(function(){
			$(".subject").show();
			var id = $(this).val();
			var dataString = 'id='+ id;
			$.ajax({
				type: "POST",
				url:"ajax.php?action=changeSubject",
				data: dataString,
				cache: false,
				success: function(html){
					$(".subject").html(html);
				}

			});

		});

		$(".subject").change(function(){
			$(".chapter").show();
			$('[name="category"]').show();
			var id = $(this).val();
			var dataString = 'id='+ id;

			$.ajax({
				type:"POST",
				url:"ajax.php?action=AddChapter",
				data: dataString,
				cache: false,
				success:function(html){
					$(".chapter").html(html);
				}

			}); 

		});

		$('#submit').click(function()
		{
			var standard = $('#standard').val();
			var sub = $('#subject').val();
            var chap= $('#chapter').val();
            var cat = $('#category').val();
			var quest = $('textarea#comment').val();
			quest = jQuery.trim(quest);
			
           if(standard != '0') 
			{
			   if(sub != '0')
				{
				  if(chap !='0')
					{
					  if(cat !='0')
						{
							if(quest!='')
							{
								var op1 = $('#opt1').val();
								op1 = jQuery.trim(op1);
								
								var op2 = $('#opt2').val();
								op2 = jQuery.trim(op2);
								
								var op3 = $('#opt3').val();
								op3 = jQuery.trim(op3);
								
								var op4 = $('#opt4').val();
								op4 = jQuery.trim(op4);
			
								
								if(op1!="" && op2!="" && op3!="" && op4!="") 
								{
									if($('.ans1').is(":checked") || $('.ans2').is(":checked") || $('.ans3').is(":checked") || $('.ans4').is(":checked"))
									{
										if($('.ans1').is(":checked"))
										{					
											var ans = $('#opt1').val();
										}
										else if($('.ans2').is(":checked"))
										{
											var ans = $('#opt2').val();
										}
										else if($('.ans3').is(":checked"))
										{
											var ans = $('#opt3').val();
										}
										else if($('.ans4').is(":checked"))
										{
											var ans = $('#opt4').val();
										}
										
										
										var datastring=$('#frmquiz').serialize()+'&ans='+ans;
										
										//alert(datastring);
												$.ajax({
														type:"POST",
														url:"ajax.php?action=AddQuestions",
														data: datastring,
														success:function(html){
															
															window.location.reload();
															alert(html);
														}

													});	
									}
									else
									{
										alert("Please Select one Answers!");
										return false;
									}
								}
								else
								{
									alert("Please Enter Proper Answers!");
									return false;
								}
								
								
								//var n = $( "input:radio").length;
								//alert (n);
								/*if(!($('.ans').is(':checked')))
								{
									alert("Please Select the Answer!");
									return false;
								}
								else
								{*/
									//var ans1=$(".ans").val();
									//var ans =  $('#'+ans1).val();
									

								//}
							}
							else
							{
								alert("Please Enter Question!");
								return false;
							}
						}
						else
						{
							alert("Please select Category!");
							return false;
						}
					}
					else
					{
						alert("Please select Chapter!");
						return false;
					}					  
				}
				else
				{
					alert("Please select Subject!");
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