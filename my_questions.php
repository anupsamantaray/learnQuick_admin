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
                    <strong>My Questions</strong>
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
                            <option defualt value='0'>Select standard</option>
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
                            <option defualt value='0'>Select subject</option>
                          </select>
                        </div>

                          <div class="col-md-3">
                          <select class="form-control chapter" name="chapter" id="chapter" style="display:none;">
                            <option defualt value='0'>Select chapters</option>
                          </select>
                        </div>


                        <!--<div class="col-md-3">
							<select class="form-control" name="category" id="category" style="display:none;">
								<option defualt value="0">Select Category</option>
								<option value="S">Simple</option>
								<option value="M">Medium</option>
								<option value="H">High</option>
							</select>
						</div>-->
<?php
$std = $_POST['standard'];
$subject = $_POST['subject'];
$chapter = $_POST['chapter'];

$sqln ="SELECT * FROM `tbl_subjects` where `sub_id`='".$subject."'";
$resultn = $conn->query($sqln);
$rown = $resultn->fetch(PDO::FETCH_ASSOC);
$subject_name=$rown['subject_name'];

$sqlc ="SELECT * FROM `tbl_chapters` where `chap_id`='".$chapter."'";
$resultc = $conn->query($sqlc);
$rowc = $resultc->fetch(PDO::FETCH_ASSOC);
$chapter_name=$rowc['chapter_name'];
?>
                      </div>
                      </br>
                    
                    <div class="text-center" style="position:reletive;top:500px">
                      <input type="submit" class="btn btn-primary" name="show" id="show1" value="Show">
                      
                    </div>
</br>
                    <!-- Details-->
 
                    <div class="table-responsive" style="" id="showMark"><!-- attendance table -->
                  <p style="text-decoration: none;"> Standard: <b><span style="color:red;"><?php echo $std;?></span></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Subject : <span style="color:red;"><b><?php echo $subject_name; ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           chapter : <span style="color:red;"><b> <?php echo $chapter_name; ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           </b>
           </p>
           </div>
            <hr>



              </br><div class="table-responsive">
                            <table id="list" class="data-table-column-filter table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                              <thead>
                       <tr>
        <th>Question</th>
        <th>Level</th>
        <th>A</th>
        <th>B</th>
        <th>C</th>
        <th>D</th>
        <th>Answer</th>
		<th>Update</th>
    <th>Delete</th>
              </tr>
                      </thead>

                       
        <tbody role="alert" aria-live="polite" aria-relevant="all">
          
  <?php
if(isset($_POST['show']) && !empty($_POST['show'])){
$standard = $_POST['standard'];
$subject = $_POST['subject'];
$chapter = $_POST['chapter'];
//$category = $_POST['category'];

$sql ="SELECT * FROM `questions` where `chap_id`='".$chapter."'";
$result = $conn->query($sql);

if (($result->rowCount()) > 0) {
   
    while($row = $result->fetch(PDO::FETCH_ASSOC)) 
    {   
      	echo "<tr><td>".$row["question"]."</td><td>".$row["level"]."</td><td>" .$row["a"]."</td><td>".$row["b"]."</td><td>".$row["c"]."</td><td>".$row["d"]."</td><td>".$row["ans"]."</td><td><a href=updateQuestion.php?id=".$row["q_id"].">Update</a></td>";
    ?>
	<td>
		<div class="text-center">
		  <a class="btn btn-success btn-xs" href="#" onclick="Qdelete(<?php echo $row['q_id'];?>)">
			<i class="glyphicon glyphicon-remove tooltips" data-original-title="Delete Q" title="Delete Q"></i>
		  </a>
		</div>
	</td>



<?php
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

 <script type="text/javascript">
function Qdelete(qid)
{
  var r=confirm("Are you sure?");
          if(r==false){
              return false;
           }
  
   var dataString = 'q_id='+ qid;
          
          $.ajax({
          type:"POST",
          url:"ajax.php?action=Qdelete",
          data: dataString,
          cache: false,
          success:function(resp){
            alert(resp);
            window.location.reload();
          }

        });

}


 </script>

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
	  
	  $('#show1').click(function(){
			var standard = $('#standard').val();
			var sub = $('#subject').val();
            var chap= $('#chapter').val();
			
           if(standard != '0') 
			{
			   if(sub != '0')
				{
				  if(chap !='0')
					{
						return true;	

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

      $(".subject").change(function(){
        $(".chapter").show();
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

    });
  </script>

</body>
</html>