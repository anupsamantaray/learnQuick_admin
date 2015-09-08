<?php 
include_once('classes/config.php');
include_once('classes/admin.php');
include "utilities/constant.php"; 

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
<?php
	$errorData = array();
	$prd_id = $_REQUEST["prd_id"];
	$isValidUpload=true;
	// Insert into database
	
	if( $_POST ) {
		
		$file		 = $_FILES["flImage"]["name"];
	
		$oldPic		 = $_POST['hid_filename'];
		
		$isBlank = false;
		if( !$isBlank ) {
		// upload icons
		if( isset( $_FILES["flImage"] ) and $_FILES["flImage"] != ''  ) {
			$fileName = time().$_FILES["flImage"]["name"];
			$size = $_FILES['flImage']["size"];
			$size = ($size/1024)/1024; // converting in MB
			$MAX_FILESIZE= MAX_FILESIZE;
			if( move_uploaded_file( $_FILES["flImage"]["tmp_name"], "upload/images/" . $fileName ) ) {
				
				list($width, $height) = getimagesize( "upload/images/".$fileName );
				if( $width < MIN_ENTRY_RESOLUTION_WIDTH || $height < MIN_ENTRY_RESOLUTION_HEIGHT) {
						$isValidUpload = false;
				} else {
						// script to generate the thumbnail of the image
						//$pic=new Thumbnail();
						//$pic->filename	="upload/images/".$fileName;
						//$pic->maxW=400;
						//$pic->SetNewWH();
						//$pic->MakeNew();
						//$pic->FinirPImage();
						
						if($oldPic!=''){
							$link="upload/images/".$oldPic;
							//$thum="../uploadCompanyImage/image/image_".$oldPic;
							unlink($link);
							unlink($thum);
						}
					}
				}else{
					$fileName = $_POST['hid_filename'];
				}
				if( $isValidUpload===true ){
				mysql_query( 
				"UPDATE tbl_image SET 
					image_name='".$fileName."'
					WHERE image_id ='".$prd_id."'" ) or die(mysql_error());
				print("<script>window.location='content_details_page_new.php'</script>");
				
				}
			}
		}
	}
	else {
		if( isset( $prd_id ) ) {
			$q = "SELECT * FROM  tbl_image WHERE image_id='".$_REQUEST["prd_id"]."'";
			$QUERY_PRODUCT = mysql_query( $q );
			$RESULT = mysql_fetch_assoc( $QUERY_PRODUCT );
			$logo			= $RESULT["image_name"];
			
		}
	}
	
?>
	
<div class="cotainer" style="width:100%;margin:0px;">
	<?php  include_once('includes/header.php'); ?>
</div>
<div class="container-fluid" style="margin-top:0px;background-color:#3E3B3C;" >
	<div class="row" style="margin-top: 65px;">
		<div class="col-md-2">
			<?php  include_once('includes/side_nav.php'); ?>
		</div>
		<div class="col-md-10">
			</br>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default panel-condensed" id="userPane">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-11">
									<strong>Edit Image</strong>
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
								<form  name="form1" id="form1" method="POST" action="<?PHP echo $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data" >
								<input type="hidden" name="prd_id" id="prd_id" value="<?=$prd_id?>" />
									</br>
									<div class="col-md-6">
										<input type="hidden" name="hid_filename" id="hid_filename" value="<?php echo $logo;?>"  class=""  width="100" height="100" />
										<img src="upload/images/<?php echo $logo;?>" width="100" height="100" style="margin-bottom:10px;" />
										<input type="file" name="flImage" id="" style="width:200px; margin-bottom:15px;">
									
									<input type="submit" class="btn btn-primary" name="submit" id="updateChap" value="Update">
									
									<input type="button" value="Back"  class="btn btn-primary" onclick="javascript:history.back();"/>
									</div>
									
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<div style="margin-top:500px">
	<?php include_once('includes/footer.php');  ?>
</div>
</div></div>
</body>
</html>