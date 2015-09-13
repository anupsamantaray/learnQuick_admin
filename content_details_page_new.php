<?php 
include_once('classes/config.php');
//include_once('classes/admin.php');
include_once('classes/admin-new.php');
include_once('new_config.php');
include_once('errorRenderer.php');

$id=$_REQUEST["id"];
//delete from table
if(isset($_REQUEST['act']) and $_REQUEST['act']=="deleteIMG"){
	if(isset($_REQUEST['id'])){
		$delId=$_REQUEST['id'];
		$resul= "Select * from tbl_image WHERE image_id='".$delId."'";
		$rs=mysql_query($resul);
		$fetch=mysql_fetch_assoc($rs);
		$image=$fetch['image_name'];
		if($image!=''){
			$link="upload/images/".$image;
			//$thum="uploadCompanyImage/image/image_".$image;
			if(file_exists($link))
				unlink($link);
			//unlink($thum);
		}
		mysql_query("DELETE FROM  tbl_image WHERE image_id='".$delId."'");
		//$errorData="Request deleted successfully.";
		header('Location:content_details_page_new.php?dele=1');
	}
}

// delete from video table

if(isset($_REQUEST['act']) and $_REQUEST['act']=="deleteVDO"){
	if(isset($_REQUEST['ids'])){
		$delId=$_REQUEST['ids'];
		
		$resul= "Select * from tbl_video WHERE video_id='".$delId."'";
		$rs=mysql_query($resul);
		$fetch=mysql_fetch_assoc($rs);
		$image=$fetch['video_name'];
		if($image!=''){
			$link="upload/videos/".$image;
			//$thum="uploadCompanyImage/image/image_".$image;
			if(file_exists($link))
			unlink($link);
			//unlink($thum);
		}
		mysql_query("DELETE FROM  tbl_video WHERE video_id='".$delId."'");
		//$errorData="Request deleted successfully.";
		header('Location:content_details_page_new.php?dele=1');
	}
}

// delete from doc table

if(isset($_REQUEST['act']) and $_REQUEST['act']=="deleteDOC"){
	if(isset($_REQUEST['idss'])){
		$delId=$_REQUEST['idss'];
		
		$resul= "Select * from tbl_docs WHERE doc_id='".$delId."'";
		$rs=mysql_query($resul);
		$fetch=mysql_fetch_assoc($rs);
		$image=$fetch['doc_name'];
		if($image!=''){
			$link="upload/docs/".$image;
			//$thum="uploadCompanyImage/image/image_".$image;
			if(file_exists($link))
			unlink($link);
			//unlink($thum);
		}
		mysql_query("DELETE FROM  tbl_docs WHERE doc_id='".$delId."'");
		//$errorData="Request deleted successfully.";
		header('Location:content_details_page_new.php?dele=1');
	}
}

?>
<script type="application/javascript">
function confirmDelete() {
	if( confirm( "Do you really want to delete this request ?" ) ) {
		return true;
	} else {
		return false;
	}
}

function confirmDelete2() {
	if( confirm( "Do you really want to delete this request ?" ) ) {
		return true;
	} else {
		return false;
	}
}

function confirmDelete3() {
	if( confirm( "Do you really want to delete this request ?" ) ) {
		return true;
	} else {
		return false;
	}
}
</script>
<?php

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

<!-----------------Priloder-------------------->
	<div class="priloder preloader" style="display:none;">
		<i class="fa-li fa fa-spinner fa-spin" style="color:#fff; font-size:72px; margin: 22% 0 0 56%;"></i>
	</div>
<!-----------------Priloder-------------------->

<div class="cotainer" style="width:100%;margin:0px;">
	<?php  include_once('includes/header.php'); ?>
</div>
<div class="container-fluid" style="margin-top:0px;background-color:#3E3B3C" >
	<div class="row" style="margin-top: 65px;">
		<div class="col-md-2">
			<?php  include_once('includes/side_nav.php'); ?>
		</div>
		<div class="col-md-10">
			<a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> School Admin </strong></a>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default panel-condensed" id="userPanel">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-11">
									<strong>Content Details</strong>
								</div>
								<div class="col-md-1">
									<a data-toggle="collapse" data-parent="userPanel" href="#userBody"><span class="glyphicon glyphicon-chevron-down"></span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="margin-top:10px;">
								<select class="form-control" name="standard" id="standard" required="required">
									<option default value="0">Select Standard</option>
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
							<div class="col-md-3" style="margin-top:10px;">
								<!--select class="form-control subject" name="subject" required="required" id="subject" style="display:none;">
									<option default value="0">Select Subject</option>
								</select-->
								<select class="form-control subject" name="subject" required="required" id="subject">
									<option default value="0">Select Subject</option>
								</select>
							</div>
							<div class="col-md-3" style="margin-top:10px;">
								<select class="form-control" name="category" id="category">
									<option default value="0">Select Category</option>
									<option value="Video">Explanation (Video)</option>
									<option value="Document">Note (Pdf)</option>
									<option value="Image">Memory Card (Images)</option>
									
								</select>
							</div>
						<div class="clr"></div>
						</div>
						
						<div id="userBody" class="panel-collaps collapse in" style="margin-top:10px;">
							<div class="panel-body">
								<?php 
								if(!$error) {
									echo $msg;
									}else{
										echo $err_msg;
									} 
								  ?>
								<p id="pp"></p>
								</br>
							
								<div class="table-responsive">
									<p id="fornored" style="display:none; align:center;"></p>
									<table id="list" class="data-table-column-filter table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
									<thead>								
									<font color="#ff0000"><? if(isset($_REQUEST['dele']) && $_REQUEST['dele']=='1'){ echo "Request deleted successfully." ;}?></font>
										<tr role="row">
											<th>Standard</th>
											<th>Chapter Name</th>
											<th>Subject</th>
											<th>Image/Pdf/video</th>
											<th style="width:152px;">Action</th>
										</tr>
									</thead>
									<tbody role="alert" aria-live="polite" aria-relevant="all" id="resltfromajax">
										<?php
										$stmt = $conn->prepare("SELECT tbl_image.image_name,tbl_image.image_id,tbl_subjects.subject_name,tbl_chapters.chapter_name,tbl_standard.standard FROM tbl_image,tbl_standard,tbl_chapters,tbl_subjects WHERE tbl_image.standard_id=tbl_standard.standard_id AND tbl_image.chap_id=tbl_chapters.chap_id AND tbl_image.sub_id=tbl_subjects.sub_id ORDER BY tbl_image.standard_id DESC");
										$stmt->execute();
											$row=$stmt->rowCount();
											if($row){
												while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
												echo "<tr><td>";?>
													<?php echo $row['standard']."</td><td>" ?>
													<?php echo $row['chapter_name']."</td><td>" ?>
													<?php echo $row['subject_name']."</td><td>" ?>
													<!--?php echo $row['image_name']."</td><td>" ?-->
													<?php echo "<img src='upload/images/".$row['image_name']."' width='150px' >"."</td><td>" ?>
													
													<!--button type="button" class="btn btn-warning" onclick="i_delete('<?php echo $row['image_id'];?>')">Delete</button-->
													
													<a href="edit_image.php?prd_id=<?php echo $row["image_id"]?>" title="Edit Company" class="btn btn-warning newbutton">Edit</a>

													<a href="<?=$_SERVER["PHP_SELF"]?>?act=deleteIMG&id=<?php echo $row['image_id'];?>" title="Delete The Request" onClick="return confirmDelete();" class="btn btn-warning newbutton">Delete</a>
												<?php 
												}
												echo "</td><tr>"; 
											}
											
											
											//$stmt2 = $conn->prepare("SELECT * FROM tbl_video");
											$stmt2 = $conn->prepare("SELECT tbl_video.video_name, tbl_video.video_id, tbl_subjects.subject_name,tbl_chapters.chapter_name,tbl_standard.standard FROM tbl_video,tbl_standard,tbl_chapters,tbl_subjects WHERE tbl_video.standard_id=tbl_standard.standard_id AND tbl_video.chap_id=tbl_chapters.chap_id AND tbl_video.sub_id=tbl_subjects.sub_id ORDER BY tbl_video.standard_id DESC");
											$stmt2->execute();
											
											$row1=$stmt2->rowCount();
											if($row1){
												while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
													echo "<tr><td>";?>
													<?php echo $row1['standard']."</td><td>" ?>
													<?php echo $row1['chapter_name']."</td><td>" ?>
													<?php echo $row1['subject_name']."</td><td>" ?>
													<?php echo $row1['video_name']."</td><td>" ?>
													  
												  <!--button type="button" class="btn btn-warning" onclick="v_delete('<?php echo $row1['video_name'];?>')">Delete</button-->
													
													<a href="edit_video.php?vdo_id=<?php echo $row1["video_id"]?>" title="Edit Video" class="btn btn-warning newbutton">Edit</a>
													
													
													<a href="<?=$_SERVER["PHP_SELF"]?>?act=deleteVDO&ids=<?php echo $row1['video_id'];?>" title="Delete The Request" onClick="return confirmDelete2();" class="btn btn-warning newbutton">Delete</a>	
												
												
													<?php 
												}
												echo "</td></tr>"; 
											}
																
											$stmt3 = $conn->prepare("SELECT tbl_docs.doc_name,tbl_docs.doc_id, tbl_subjects.subject_name,tbl_chapters.chapter_name,tbl_standard.standard FROM tbl_docs,tbl_standard,tbl_chapters,tbl_subjects WHERE tbl_docs.standard_id=tbl_standard.standard_id AND tbl_docs.chap_id=tbl_chapters.chap_id AND tbl_docs.sub_id=tbl_subjects.sub_id ORDER BY tbl_docs.standard_id DESC");
											$stmt3->execute();
											$row3=$stmt3->rowCount();
											if($row3){
												while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
													echo "<tr><td>";?>
													 <?php echo $row3['standard']."</td><td>" ?>
													 <?php echo $row3['chapter_name']."</td><td>" ?>
													 <?php echo $row3['subject_name']."</td><td>" ?>
													 <?php echo $row3['doc_name']."</td><td>" ?>
													<!--button type="button" class="btn btn-warning" onclick="v_delete('<?php echo $row3['doc_name']; ?>')">Delete</button-->
													
													<a href="edit_document.php?doc_id=<?php echo $row3["doc_id"]?>" title="Edit Document" class="btn btn-warning newbutton">Edit</a>
											  
													<a href="<?=$_SERVER["PHP_SELF"]?>?act=deleteDOC&idss=<?php echo $row3['doc_id'];?>" title="Delete The Request" onClick="return confirmDelete3();" class="btn btn-warning newbutton">Delete</a>
												<?php 
												}
												echo "</td></tr>"; 
											}
											?>
									</tbody>
									</table>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>   
    </div>
	<?php include_once('includes/footer.php');  ?>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#standard").change(function(){
		$(".preloader").show();
		$(".subject").show();
		var id = $(this).val();
		std_id= $(this).val();

		var dataString = 'id='+ id;
		$.ajax({
			type: "POST",
			url:"ajax.php?action=changeSubject",
			data: dataString,
			cache: false,
			success: function(html){
				$(".subject").html(html);
				$(".preloader").hide();
			}
		});
	});

	$(".subject").change(function(){
		//$(".preloader").show();
		$(".chapter").show();
        $('[name="category"]').show();
        var id = $(this).val();
        var dataString = 'id='+ id;

        sub_id= $(this).val();
		$.ajax({
          type:"POST",
          url:"ajax.php?action=AddChapter",
          data: dataString,
          cache: false,
          success:function(html){
            $(".chapter").html(html);
			//$(".preloader").hide();
          }
		}); 
	});
	$('#show').click(function(){
		var standard = $('#standard').val();
		var sub = $('#subject').val();
		var chap= $('#chapter').val();
		var cat = $('#category').val();
		if(standard != '0'){
		   if(sub != '0'){
			  if(chap !='0'){
				  if(cat !='0'){
						return true;
					}else{
						alert("Please select Category!");
						return false;
					}
				}else{
					alert("Please select Chapter!");
					return false;
				}					  
			}else{
				alert("Please select Subject!");
				return false;
			}
		}else{
			alert("Please Select Standard.");
			return false;
		}
	});
	$('#category').change(function(){
		var standard = $('#standard').val();
		var sub = $('#subject').val();
		var cat = $('#category').val();
		//console.log(sub);
		//console.log(cat);
		$("#resltfromajax").html('');
		if((standard != '0') && (sub != '0') && (cat != '0')){
			$(".preloader").show();
			var dataString = 'standard='+ standard  + '&sub='+ sub + '&cat=' + cat;
			/*dataString.append("standard",standard);
			dataString.append("sub",sub);
			dataString.append("cat",cat);*/
			$.ajax({
				type:"POST",
				url:"ajax.php?action=ForContactDetailsNew",
				data: dataString,
				cache: false,
				success:function(response){
					//$("#resltfromajax").append(html);
					var jsndata = JSON.parse(response);
					//console.log(jsndata.result[0].image_name);
					var reshtml = '';
					var resltdata = jsndata.result;
					//console.log(resltdata);
					if(resltdata.length==0){
						$("#list").hide();
						$("#fornored").html("No records available for your search query.");
						$("#fornored").show();
						$(".preloader").hide();
					}else{
						$("#list").show();
						$("#fornored").hide();
						for(var i=0;i<resltdata.length;i++){
							if(cat == 'Image'){
								reshtml += '<tr><td>'+resltdata[i].standard+'</td><td>'+resltdata[i].chapter_name+'</td><td>'+resltdata[i].subject_name+'</td><td><img src="upload/images/'+resltdata[i].image_name+'" width="100px" /></td><td><a href="edit_image.php?prd_id='+resltdata[i].image_id+'" title="Edit Company" class="btn btn-warning">Edit</a><a href="content_details_page_new.php?act=deleteIMG&id='+resltdata[i].image_id+'" title="Delete The Request" onClick="return confirmDelete();" class="btn btn-warning">Delete</a></td></tr>';
							}else if(cat == 'Video'){
								reshtml += '<tr><td>'+resltdata[i].standard+'</td><td>'+resltdata[i].chapter_name+'</td><td>'+resltdata[i].subject_name+'</td><td>'+resltdata[i].video_name+'</td><td><a href="edit_video.php?vdo_id='+resltdata[i].video_id+'" title="Edit Video" class="btn btn-warning">Edit</a><a href="content_details_page_new.php?act=deleteVDO&ids='+resltdata[i].video_id+'" title="Delete The Request" onClick="return confirmDelete();" class="btn btn-warning">Delete</a></td></tr>';
							}else if(cat == 'Document'){
								reshtml += '<tr><td>'+resltdata[i].standard+'</td><td>'+resltdata[i].chapter_name+'</td><td>'+resltdata[i].subject_name+'</td><td>'+resltdata[i].doc_name+'</td><td><a href="edit_document.php?doc_id='+resltdata[i].doc_id+'" title="Edit Document" class="btn btn-warning">Edit</a><a href="content_details_page_new.php?act=deleteDOC&idss='+resltdata[i].doc_id+'" title="Delete The Request" onClick="return confirmDelete();" class="btn btn-warning">Delete</a></td></tr>';
							}
						}
						$("#resltfromajax").append(reshtml);
						$(".preloader").hide();
					}
				}
			});
		}
	});
});
</script>