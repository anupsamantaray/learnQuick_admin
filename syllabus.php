<?php 
include_once('classes/config.php');
include_once('classes/admin.php');
include_once('new_config.php');

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
                    <strong>Content Detail</strong>
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
					<form method="post" action="#" name="submit" enctype="multipart/form-data">

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
							  <select class="form-control" name="category" style="display:none;" id="category">
								<option defualt value="0">Select Category</option>
								<option value="Video">Explanation (Video)</option>
								<option value="Document">Note (Pdf)</option>
								<option value="Image">Memory Card (Images)</option>
								
							  </select>
							</div>

						  </div>
						</div></br>
						<div class="text-center" style="position:reletive;top:500px">
						  <input type="submit" class="btn btn-primary" name="show" id="show" value="Show">
						  
						</div>
					</form>
                    <!-- Details-->

                     <p id="pp"></p>

              </br><div class="table-responsive">
                            <table id="list" class="data-table-column-filter table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                              <thead>
                                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name
                                  : activate to sort column descending" style="width: 409px;">
                                  Chapter
                                </th>
                            
                         
                          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="
                          Status
                          : activate to sort column ascending" style="width: 217px;">
                            Action
                        </th></tr>
                      </thead>

                       
        <tbody role="alert" aria-live="polite" aria-relevant="all">
       
          
  <?php

$standard = $_POST['standard'];
$subject = $_POST['subject'];
$chapter = $_POST['chapter'];
$category = $_POST['category'];
  

    if($category=='Image')
    {
      $stmt = $conn->prepare("SELECT `image_name` FROM `tbl_image` where `standard_id`='".$standard."' AND `sub_id`='".$subject."' AND `chap_id`='".$chapter."'");
    
    $stmt->execute();
    $row=$stmt->rowCount();
    if($row)
    {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
                    
      	echo "<tr><td>";?>

      	<img src="upload/images/<?php echo $row['image_name'];?>" width="80px" height="100px">

      

      	 
     <?php echo "</td><td>" ?>

      <button type="button" class="btn btn-warning" onclick="i_delete('<?php echo $row['image_name'];?>')">Delete</button>
      
  
   <?php } 

   echo "</td><tr>"; 
}
else
{
  echo "No data found";
}
}

else


 if($category=='Document')
    {
      $stmt = $conn->prepare("SELECT `doc_name` FROM `tbl_docs` where `standard_id`='".$standard."' AND `sub_id`='".$subject."' AND `chap_id`='".$chapter."'"); 
    
    $stmt->execute();
    $row=$stmt->rowCount();
    if($row)
    {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
                    
      	echo "<tr><td>";?>

     <?php 

     echo $row['doc_name']."</td><td>" ?>

 
     

      <button type="button" class="btn btn-warning" onclick="d_delete('<?php echo $row['doc_name'];?>')">Delete</button>

  <?php } 

  echo "</td><tr>"; 
}
else
{
  echo "No data found";
}

}



else


if($category=='Video')
    {
      $stmt = $conn->prepare("SELECT `video_name` FROM `tbl_video` where `standard_id`='".$standard."' AND `sub_id`='".$subject."' AND `chap_id`='".$chapter."'"); 
    
    $stmt->execute();

    $row=$stmt->rowCount();
    if($row)
    {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
                    
      	echo "<tr><td>";?>

     <?php 

     echo $row['video_name']."</td><td>" ?>

  

      <button type="button" class="btn btn-warning" onclick="v_delete('<?php echo $row['video_name'];?>')">Delete</button>

  <?php } 

  echo "</td><tr>"; 
}
else
{
  echo "No data found";

}

}  

else
{

  echo "Select Category";
}
$conn = null; 

?>

     
       </tbody>
                    </table>
                  </div> 
                  
                  
                    <!-- End of Details-->

                    
                 

                </div><!--/panel-body-->
              </div>
            </div><!--/panel-->


          </div><!--/col-->
        </div><!--/row-->

      </div>   
    </div>

    <!-- /Main -->
    <script type="text/javascript">
  function i_delete(i)
      {
		  if (confirm("Are you sure you want to delete")) {
         var dataString = 'i_name='+ i;
         $.ajax({
          type: "POST",
          url:"ajax.php?action=i_delete",
          data: dataString,
          cache: false,
          success: function(html){
            $("#pp").html(html);
			alert('Successfully Deleted');
			location.reload();
          }

		  });
		  }
	  else
	  {
		  return true;
	  }
     
  }

function d_delete(d)
      {
         if (confirm("Are you sure you want to delete")) {
         var dataString = 'd_name='+ d;
         $.ajax({
          type: "POST",
          url:"ajax.php?action=d_delete",
          data: dataString,
          cache: false,
          success: function(html){
            $("#pp").html(html);
			alert('Successfully Deleted');
			location.reload();
          }
        });
		 }
	  else
	  {
		  return true;
	  }
  }

function v_delete(v)
      {
		if (confirm("Are you sure you want to delete")) {
      
         var dataString = 'v_name='+ v;
         $.ajax({
          type: "POST",
          url:"ajax.php?action=v_delete",
          data: dataString,
          cache: false,
          success: function(html){
            $("#pp").html(html);
			alert('Successfully Deleted');
			location.reload();
          }

        });
		}
	  else
	  {
		  return true;
	  }
  }


    </script>


   

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

         std_id= $(this).val();
        
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

        sub_id= $(this).val();
        
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
	  
	  
	  $('#show').click(function()
		{
			var standard = $('#standard').val();
			var sub = $('#subject').val();
            var chap= $('#chapter').val();
            var cat = $('#category').val();
           if(standard != '0') 
			{
			   if(sub != '0')
				{
				  if(chap !='0')
					{
					  if(cat !='0')
						{
							return true;
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