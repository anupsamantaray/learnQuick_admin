<?php 
include_once('classes/config.php');
include_once('classes/admin.php');
$obj= new Admin();
$error=false;

$err_msg_start = '<div class="alert">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>';
$err_msg_end = '</strong></div>';      
if(!$obj->isAdminLoggedIn()){
	header("Location: login.php");
	exit(0);
	}else{
		$admin_id = $_SESSION['admin_id'];
	}

if(isset($_POST['submit'])){
	$standard  = $_POST['standard'];
	$subject   =  $_POST['subject'];
	$chapter   = $_POST['chapter'];
	$category  = $_POST['category']; 
	
if($standard != 'Select Standard'){
   for($i=1;$i<=4;$i++) {   
		$file_name = $_FILES["file".$i]["name"];
	if($file_name == ""){
		continue;
	}
	$_FILES["file".$i]["name"]=time().$file_name;
	$folder="upload/";
	$file_name=$_FILES["file".$i]["name"];
		if($category=="Video"){
			$FileType = pathinfo($file_name,PATHINFO_EXTENSION);
			if($FileType != "3gp" && $FileType != "mp3" && $FileType != "mp4"&& $FileType != "avi" && $FileType != "swf" ){
				$msg = '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Select correct video type.</strong>
						</div>';
				break;    
			}else{
				move_uploaded_file($_FILES["file".$i]["tmp_name"] , "upload/videos/".$_FILES["file".$i]["name"]);
				$sql="INSERT INTO `tbl_video` VALUES ('','".addslashes($chapter)."','".addslashes($subject)."','".addslashes($standard)."','".addslashes($file_name)."')";  
			}
		}elseif ($category=="Image") {
			$imageFileType = pathinfo($file_name,PATHINFO_EXTENSION);
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
				$msg = '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>File is not an image.</strong>
						</div>';
				break;
			}else{
				move_uploaded_file($_FILES["file".$i]["tmp_name"] , "upload/images/".$_FILES["file".$i]["name"]);
				 $sql="INSERT INTO `tbl_image` VALUES ('','".addslashes($chapter)."','".addslashes($subject)."','".addslashes($standard)."','".addslashes($file_name)."')";
			}
		}
		elseif ($category=="Document"){
			$docFileType = pathinfo($file_name,PATHINFO_EXTENSION);
			if($docFileType != "pdf") {
				$msg = '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>File is not a pdf.</strong>
						</div>';
				break;
			}else{
				move_uploaded_file($_FILES["file".$i]["tmp_name"] , "upload/docs/".$_FILES["file".$i]["name"]);
				$sql="INSERT INTO `tbl_docs` VALUES ('','".addslashes($chapter)."','".addslashes($subject)."','".addslashes($standard)."','".addslashes($file_name)."')";
			}
		}
		$result = mysql_query($sql,$link);  
		if($result){
			$msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> Uploaded Successfully!</strong>
		</div>';
		//header('location: index.php');
		}else{
			$error = true;
			$err_msg = $err_msg_start."Currently there is some problem.Please try again later.".$err_msg_end;
		} 
	}  
}else{
	$msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Select Mandatory Fields!</strong>
		</div>';
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
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
</head>
<body>
	<!-- header -->
<div class="cotainer" style="width:100%;margin:0px;">
	<?php  include_once('includes/header.php'); ?>
</div>
	<!-- /Header -->

	<!-- Main -->
<div class="container-fluid" style="margin-top:0px;background-color:#3E3B3C" >
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
									<strong> Content upload</strong>
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
								<form method="post" action="#" name="frmupload" enctype="multipart/form-data">
									<div class="controls" style="line-height: 18px;">
										<div class="row">
											<div class="col-md-3">
												<select class="form-control" name="standard" id="standard" required="required">
													<option defualt value="0">Select Standard</option>
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
												<!--select class="form-control subject" name="subject" required="required" id="subject" style="display:none;">
													<option defualt value="0">Select Subject</option>
												</select-->
												<select class="form-control subject" name="subject" required="required" id="subject">
													<option defualt value="0">Select Subject</option>
												</select>
											</div>
											<div class="col-md-3">
												<!--select class="form-control chapter" name="chapter" id="chapter" style="display:none;">
													<option defualt value="0">Select Chapters</option>
												</select-->
												<select class="form-control chapter" name="chapter" id="chapter">
													<option defualt value="0">Select Chapters</option>
												</select>
											</div>
											<!--div class="col-md-3">
												<select class="form-control" name="category" id="category" style="display:none;">
													<option defualt value="0">Select Category</option>
													<option value="Video">Explanation (Video) </option>
													<option value="Document">Note (Pdf)</option>
													<option value="Image">Memory Card(Images)</option>
												</select>
											</div-->
											<div class="col-md-3">
												<select class="form-control" name="category" id="category">
													<option defualt value="0">Select Category</option>
													<option value="Video" class="subcat" style="display:none;">Explanation (Video) </option>
													<option value="Document" class="subcat" style="display:none;">Note (Pdf)</option>
													<option value="Image" class="subcat" style="display:none;">Memory Card(Images)</option>
												</select>
											</div>
											
										</div>
									</div>
									<!-- jumbotron -->
									<div class="jumbotron" style="margin-top:30px;">
										<div class="row" >
											<div class="col-md-3" id="div1">
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height:80px;"></div>
													<div>
														<span class="btn btn-default btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span><input type="file" name="file1"></span>
														<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													</div>
												</div>
											</div>
											<button class="btn btn-primary" name="button1" id="button1">Upload More</button>
											<div class="col-md-3" id="div2" style="display:none;">
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height:80px;"></div>
													<div>
														<span class="btn btn-default btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span><input type="file" name="file2"></span>
														<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													</div>
												</div>
											</div>
											<button class="btn btn-primary" name="button2" id="button2" style="display:none;">Upload More</button>
											<button class="btn btn-primary" name="button2" id="button2" style="display:none;">Upload More</button>
											<div class="col-md-3" id="div3" style="display:none;">
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height:80px;">  </div>
													<div>
														<span class="btn btn-default btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span><input type="file" name="file3"></span>
														<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													</div>
												</div>
											</div>
											<button class="btn btn-primary" name="button3" id="button3" style="display:none;">Upload More</button>
											<div class="col-md-3" id="div4" style="display:none;">
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height:80px;">  </div>
													<div>
														<span class="btn btn-default btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span><input type="file" name="file4"></span>
														<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="text-center">
										<input type="submit" class="btn btn-primary" name="submit" id="submit1" value="Upload">
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
	$("#standard").change(function(){
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
		//$(".chapter").show();
		$("#chapter").html('<option value="">Loading...</option>');	// ourcoading
		
		//$('[name="category"]').show();
		var id = $(this).val();
		var dataString = 'id='+ id;

		$.ajax({
			type:"POST",
			url:"ajax.php?action=AddChapter",
			data: dataString,
			cache: false,
			success:function(html){
				$(".chapter").html(html);
				$('.subcat').show();//ourcode
			}
		}); 
	});
	$("#button1").click(function(){
		$('#div2').show();
		$('#div2').addClass('required');
		$("#button1").hide();
		$("#button2").show();
		return false;
	})
	$("#button2").click(function(){
		$('#div3').show();
		$('#div3').addClass('required');
		$("#button2").hide();
		$("#button3").show();
		return false;
	})
	$("#button3").click(function(){
		$('#div4').show();
		$('#div4').addClass('required');
		$("#button3").hide();
		return false;
	})
	$("#submit1").click(function(){
		var standard = $('#standard').val();
		var sub = $('#subject').val();
		var chap= $('#chapter').val();
		var cat = $('#category').val();
		if(standard != '0'){
			if(sub != '0'){
			  if(chap !='0'){
				  if(cat !='0'){
						if($('#div1').children().hasClass('fileinput-new') ){
							alert('Please Upload Files');
							return false;
						}
						if($('#div2').hasClass('required') && $('#div2').children().hasClass('fileinput-new') ){
							alert('Please Upload Files');
							return false;
						}
						if($('#div3').hasClass('required') && $('#div3').children().hasClass('fileinput-new') ){
							alert('Please Upload Files');
							return false;
						}
						if($('#div4').hasClass('required') && $('#div4').children().hasClass('fileinput-new') ){
							alert('Please Upload Files');
							return false;
						}else{
							return true;
						}
					}else{
						alert("Please Select Category!");
						return false;
					}
				}else{
					alert("Please Select Chapter!");
					return false;
				}					  
			}
			else{
				alert("Please Select Subject!");
				return false;
			}
		}else{
			alert("Please Select Standard.");
			return false;
		}
	});
});
</script>
</body>
</html>