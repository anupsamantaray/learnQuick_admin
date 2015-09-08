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
                    <strong>Hall of fame</strong>
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
							<div class="col-md-3" id="radioBut">
								<?php $getMode=$obj->getMode();	
								if($getMode=='auto')
								{?>
									<input type="radio" name="mode" value="auto" checked="checked">&nbsp;&nbsp;Auto</input>&nbsp;&nbsp;&nbsp;
									<input type="radio" name="mode" value="manual">&nbsp;&nbsp;Manual</input>
								<?php 
								}
								else if($getMode=='manual')
								{?>
									<input type="radio" name="mode" value="auto">Auto</input>&nbsp;&nbsp;&nbsp;
									<input type="radio" name="mode" value="manual" checked="checked">&nbsp;&nbsp;Manual</input>
								<?php 
								}?>
							</div>
						</div>
						<br/>
					  
					  <div class="row">

                        <div class="col-md-3">
                          <select class="form-control standard" name="standard" id="standard">
                            <option defualt>Select standard</option>
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
                            <option defualt>Select subject</option>
                          </select>
                        </div>

                          <!--<div class="col-md-3">
                          <select class="form-control chapter" name="chapter" id="chapter" style="display:none;">
                            <option defualt>Select chapters</option>
                          </select>
                        </div>

                        <div class="col-md-3">
							<select class="form-control" name="category" id="category" style="display:none;">
								<option defualt value="0">Select Category</option>
								<option value="S">Simple</option>
								<option value="M">Medium</option>
								<option value="H">High</option>
							</select>
						</div>-->
                      </div>
                    </div></br>
                    <div class="text-center" style="position:reletive;top:500px">
                      <input type="submit" class="btn btn-primary" name="Show" id="show" value="Show">
                      <a href="halloffame.php"><button type="submit" class="btn btn-danger">Cancel</button></a>
                    </div>

                    <!-- Details-->

              </br><div class="table-responsive">
                            <table id="list" class="data-table-column-filter table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
							<tr>
							<th></th>
							<th>Name</th>
							<th>Level</th>
							<th>Result</th>
							<th>Time</th>
							</tr>
							</thead>

                       <?php echo $mode;?>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
          
  <?php

$standard = $_POST['standard'];
$subject = $_POST['subject'];
//$chapter = $_POST['chapter'];
//$caregory = $_POST['caregory'];
$mode = $_POST['mode'];
$sql ="SELECT `res_id`,`standard`,`sub_id`,`result`.`user_id` as ruid,`result`.`user_id`,`chap_id`,`level`,`result`,`result`.`time_stamp` as rts,`result`.`time_stamp`,`username` FROM `result`,`register` where `standard`='".$standard."' AND `sub_id`='".$subject."' AND  `result`.`user_id`=`register`.`user_id` order by `result`.`result` desc " ;

$result = $conn->query($sql);


if (($result->rowCount()) > 0) {
   if($mode=='auto')
   {
		while($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
						
			echo "<tr><td></td><td>".$row["username"]."</td><td>".$row["level"]."</td><td>" .$row['result']."</td><td>".$row['time_stamp']."</td><tr>";

		}
   }
   else if('manual')
   {
	   while($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
						
			echo "<tr><td><input type='checkbox' name='selectedStudent' id='selectedStudent' value='".$row['ruid'].','.$row['standard'].','.$row['sub_id'].','.$row['level'].','.$row['result'].','.$row['rts']."'></td><td>".$row["username"]."</td><td>".$row["level"]."</td><td>" .$row['result']."</td><td>".$row['time_stamp']."</td><tr>";

		}
   }
    
} else {
    echo "0 results";
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
	  
	$("input:checkbox[name=selectedStudent]").change(function () {	
		if($(this).is(':checked'))
		{
			 //alert($(this).val()); // checked
		 
			var dataString = 'postVal='+ $(this).val();
			$.ajax({
			  type: "POST",
			  url:"ajax.php?action=manualHallOfFame",
			  data: dataString,
			  cache: false,
			  success: function(e){
				alert(e);
			  }

			});
		 
		}
		else{}
	});
	
	$("input:radio[name=mode]").change(function () {	
			
			var dataString = 'mode='+ $(this).val();
			$.ajax({
			  type: "POST",
			  url:"ajax.php?action=updateHofMode",
			  data: dataString,
			  cache: false,
			  success: function(e){
				alert(e);
			  }

			});
	});

    });
  </script>

</body>
</html>