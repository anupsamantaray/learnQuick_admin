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
                    <strong> List Chapter</strong>
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
							  <select class="form-control standard1" name="standard" id="standard1">
								<option defualt value='0'>Select standard</option>
								<?php
								$data=$obj->getAllStandard();
								if(count($data) > 0)
								{
								  $i=1;
								  foreach ($data as $key => $value){
									?>
									<option value="<?php echo $value['standard_id']; ?>"><?php echo $value['standard']; ?></option>
									<?php
									$i++;  
								  }
								}
								?>
							  </select>
							</div>
						</div>
						<div class="row">
						<br/>
							<div class="col-md-3">
							<select class="form-control subject1" name="subject" id="subject1">
								<option defualt value='0'>Select Subject</option>
							</select>
							</div>
						</div>
                    </div></br>
                    <div class="text-center" style="position:reletive;top:500px">
                      <input type="submit" class="btn btn-primary" name="show" id="show1" value="Show">
                      
                    </div>

                    <!-- Details-->

              </br><div class="table-responsive">
                            <table id="list" class="data-table-column-filter table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
								<tr>
									<th>Subject</th>
									<th>Chapter Name</th>
									<th>Action</th>
								</tr>
							</thead>

                       
        <tbody role="alert" aria-live="polite" aria-relevant="all">
          
  <?php
if(isset($_POST['show']) && !empty($_POST['show'])){
$sub_id = $_POST['subject'];

$sql ="SELECT tc.*,ts.* FROM `tbl_chapters` as tc left join `tbl_subjects` as ts  on tc.sub_id=ts.sub_id where tc.`sub_id`='".$sub_id."'";
$result = $conn->query($sql);

if (($result->rowCount()) > 0) {
   
    while($row = $result->fetch(PDO::FETCH_ASSOC)) 
    {   
      	echo "<tr><td>".$row["subject_name"]."</td><td>".$row["chapter_name"]."</td><td><a href=updateChapter.php?id=".$row["chap_id"].">Update</a> | <a onclick='delete_chap(".$row['chap_id'].")'>Delete</a></td><tr>";
    }
    
} else {
    echo "<script>alert('No Record Found')</script>";
}
}



    ?>



       </tbody>
                    </table>
                  </div> 
                  
                  
                    <!-- End of Details-->

                    
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
		
		$(".standard1").change(function(){
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
	
	  $('#show1').click(function(){
			var standard = $('#standard1').val();
			var subject = $('#subject1').val();
			
           if(standard != '0') 
			{
				if(subject != '0')
				{
					return true;
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
    });
	
	function delete_chap(i)
		{
			if (confirm("Are you sure you want to delete"))
			{
			var dataString = 'chapter_id='+ i;
			$.ajax({
					type: "POST",
					url:"ajax.php?action=chapter_delete",
					data: dataString,
					cache: false,
					success: function(html){
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

</body>
</html>